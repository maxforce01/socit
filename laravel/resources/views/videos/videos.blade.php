@extends('layouts.app')
@section('content')
    @foreach($videos as $video)
        <div class="post-content">
            <div class="post-container">
                <img src="{{asset('/storage/'.$video->user->avatar)}}" alt="user" class="profile-photo-md pull-left" />
                <div class="post-detail">
                    <div class="user-info">
                        <h5><a href="{{route('account',$video->user->id)}}" class="profile-link">{{$video->user->name}}</a> <span class="following">following</span></h5>
                        <p class="text-muted">Published {{$video->created_at->diffforHumans()}}</p>
                    </div>
                        @if($video->user->id == \Illuminate\Support\Facades\Auth::id())
                            <a role="button" href="{{route('video.delete',$video->id)}}" class="delete-post"><i class="fa fa-times" aria-hidden="true"></i></a>
                        @endif
                    <video width="320" height="240" controls>
                        <source src="{{asset('/storage/'.$video->video_path())}}" type="video/mp4">
                    </video>
                </div>
            </div>
        </div>
    @endforeach
@stop
