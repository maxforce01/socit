@extends('layouts.account.app')
@section('content')
    <form action="{{route('update.profile')}}" method="post" enctype="multipart/form-data">
        @include('partials.edit-profile')
        <button class="btn btn-success pull-right" type="submit">Сохранить</button>
    </form>
@stop
