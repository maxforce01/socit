<?php

namespace App\Events;

use App\Message;
use App\Notification;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

   public $message;
   public $notification;

    /**
     * Create a new event instance.
     *
     * @param Message $message
     * @param Notification $notification
     */
    public function __construct($param)
    {
        if($param instanceof Message)
        {
            $mess =  new Message;
            $mess = $param;
            $this->message = $mess;
        }
        else {
            $notif = new Notification;
            $notif = $param;
            $this->notification = $notif;
        }
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        if(!empty($this->message))
        return new PrivateChannel('messages.' . $this->message->to);
        else
            return new PrivateChannel('messages.' . $this->notification->user_id);
    }

    public function broadcastWith()
    {
        if(!empty($this->message)) {
            $this->message->load('fromContact');
            return ['message' => $this->message];
        }
        else{
            $this->notification->load('user');
            return ['notification' => $this->notification];
        }
    }
}
