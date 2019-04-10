@extends('layouts.account.app')
@section('content')
    @if($user->id == \Illuminate\Support\Facades\Auth::user()->id)
    @include('partials.add-photo')
    @endif
    <ul class="album-photos">
    @foreach($photos as $photo)
        <li>
            <div class="img-wrapper" data-toggle="modal" data-target=".photo-{{$photo->id}}">
                <img src="{{asset('/storage/'.$photo->photo)}}" alt="photo" />
            </div>
            <div class="modal fade photo-{{$photo->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <img src="{{asset('/storage/'.$photo->photo)}}" alt="photo" />
                    </div>
                </div>
            </div>
        </li>
    @endforeach
    </ul>
@endsection
