@extends('layouts.app')

@section('content')
    @foreach($users as $user)
        @if(\Illuminate\Support\Facades\Auth::user()->id == $user->id)
            @continue
        @endif
            @if(!\Illuminate\Support\Facades\Auth::user()->isSubscribe($user))
                <user :path="{{json_encode(str_replace(substr("\a", 0,1),"/",asset('/storage/'.$user->avatar)))}}" :user="{{$user}}" :flag="false" ></user>
                @else
                <user :path="{{json_encode(str_replace(substr("\a", 0,1),"/",asset('/storage/'.$user->avatar)))}}" :user="{{$user}}" :flag="true" ></user>
            @endif
    @endforeach
@stop
