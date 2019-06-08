<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
use App\Notification;
use Illuminate\Http\Request;
use App\User;
use App\Message;
use Illuminate\Support\Facades\Auth;
use App\Notifications\newNotification;
class ContactsController extends Controller
{
    public function get()
    {
        // get all users except the authenticated one
        $contacts = Auth::user()->subscriptions;
        //$contacts = User::where('id', '!=', auth()->id())->get();
        // get a collection of items where sender_id is the user who sent us a message
        // and messages_count is the number of unread messages we have from him
        $unreadIds = Message::select(\DB::raw('`from` as sender_id, count(`from`) as messages_count'))
            ->where('to', auth()->id())
            ->where('read', false)
            ->groupBy('from')
            ->get();

        // add an unread key to each contact with the count of unread messages
        $contacts = $contacts->map(function($contact) use ($unreadIds) {
            $contactUnread = $unreadIds->where('sender_id', $contact->id)->first();

            $contact->unread = $contactUnread ? $contactUnread->messages_count : 0;

            return $contact;
        });


        return response()->json($contacts);
    }

    public function getMessagesFor($id)
    {
        // mark all messages with the selected contact as read
        Message::where('from', $id)->where('to', auth()->id())->update(['read' => true]);

        // get all messages between the authenticated user and the selected user
        $messages = Message::where(function($q) use ($id) {
            $q->where('from', auth()->id());
            $q->where('to', $id);
        })->orWhere(function($q) use ($id) {
            $q->where('from', $id);
            $q->where('to', auth()->id());
        })
        ->get();

        return response()->json($messages);
    }

    public function send(Request $request)
    {
        $message = new Message;
        $message->from = auth()->id();
        $message->to = $request->contact_id;
        $message->text = $request->text;
        $message->save();
        broadcast(new NewMessage($message));
        $notification = new Notification;
        $notification -> user_id = $request->contact_id;
        $notification->status = 0;
        $notification->from_user = Auth::user()->id;
        if(Auth::user()->isSubscribe(User::find($request->contact_id)))
            $notification ->text = " написал вам новое сообщение ";
        else
            $notification ->text =" написал вам новое сообщение. Подпишитесь на него если хотите прочитать ";
        $notification->save();
        broadcast(new NewMessage($notification));
        return response()->json($message);
    }
}
