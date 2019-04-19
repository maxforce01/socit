@extends('layouts.account.app')
@section('content')
    <form action="{{route('update.work')}}" method="post" enctype="multipart/form-data">
        @include('partials.add-edit-work')
        <button class="btn btn-success pull-right" type="submit">Сохранить</button>
    </form>
@stop
