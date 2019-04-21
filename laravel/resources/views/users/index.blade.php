@extends('layouts.app')

@section('content')
    <users :i_am="{{\Illuminate\Support\Facades\Auth::user()}}" :users="{{$users}}"></users>
@stop
