@extends('chat.app')


@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col" class="text-left">Уведомление</th>
        </tr>
        </thead>
        @foreach($notifications as $notification)
        <tr>
            @if($notification->read > 0)
            <td id="yes" class="table-active" ><h4><a href="{{route('account',$notification->user->id)}}">{{$notification->user->name}}</a></h4> <h4 class="grey-spec">{{$notification->text}}</h4></td>
            @else
            <td id="none" class="table-danger"> <h4><a href="{{route('account',$notification->user->id)}}">{{$notification->user->name}}</a></h4><h4 class="grey-spec">{{$notification->text}}</h4></td>
            @endif
        </tr>
    @endforeach
    </table>
@stop
