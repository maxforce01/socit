@extends('chat.app')

@section('content')

    <chat-app :user="{{ auth()->user() }}"></chat-app>

@stop
