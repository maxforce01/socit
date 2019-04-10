@extends('layouts.account.app')
@section('content')
    @if($user->id == \Illuminate\Support\Facades\Auth::user()->id)
    @include('partials.add-video')
    @endif
    <ul class="album-photos">
        @foreach($videos as $video)
            <li>
                <div class="img-wrapper" data-toggle="modal" data-target=".photo-{{$video->id}}">
                    <video width="320" height="240" controls>
                        <source src="{{asset('/storage/'.$video->video_path())}}" type="video/mp4">
                    </video>
                </div>
                <div class="modal fade photo-{{$video->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <video width="320" height="240" controls>
                                <source src="{{asset('/storage/'.$video->video_path())}}" type="video/mp4">
                            </video>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
@endsection
