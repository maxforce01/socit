@extends('layouts.account.app')
@section('content')
    <form action="{{route('password.save')}}" method="post" enctype="multipart/form-data">
        @include('partials.password')
        <button class="btn btn-success pull-right" type="submit">Сохранить</button>
    </form>
@stop
