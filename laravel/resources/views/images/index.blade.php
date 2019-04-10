@extends('layouts.app')
@section('content')
    @foreach($images as $image)
        <div class="post-content">
            <div class="post-container">
                <img src="{{asset('/storage/'.$image->user->avatar)}}" alt="user" class="profile-photo-md pull-left" />
                <div class="post-detail">
                    <div class="user-info">
                        <h5><a href="timeline.html" class="profile-link">{{$image->user->name}}</a> <span class="following">following</span></h5>
                        <p class="text-muted">Published {{$image->created_at->diffforHumans()}}</p>
                    </div>
                        @if($image->user->id == \Illuminate\Support\Facades\Auth::id())
                            <a role="button" href="{{route('image.delete',$image->id)}}" class="delete-post"><i class="fa fa-times" aria-hidden="true"></i></a>
                        @endif
                    <img src="{{asset('/storage/'.$image->photo)}}" alt="post-image" class="img-responsive post-image" />
                </div>
            </div>
        </div>
    @endforeach
@stop
