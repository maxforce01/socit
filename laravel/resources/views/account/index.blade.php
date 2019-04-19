@extends('layouts.account.app')
@section('content')
    @if($user->id == \Illuminate\Support\Facades\Auth::user()->id)
        @include('partials.add-post')
    @endif
    @foreach($posts as $post)
        @if($post->isLesson())
            <div class="post-content">
                <div class="post-container">
                    <img src="{{asset('/storage/'.$user->avatar)}}" alt="user" class="profile-photo-md pull-left" />
                    <div class="post-detail">
                        <div class="user-info">
                           <h5><a href="{{route('account',$user->id)}}" class="profile-link">{{$user->name}}</a>  @if($user->isRepost($post))  <span class="following">reposted by {{$post->authorId['name']}}</span></h5> @else<span class="following">following</span></h5> @endif
                            <p class="text-muted">Published {{$post->created_at->diffforHumans()}}</p>
                        </div>
                        @if($user->id == \Illuminate\Support\Facades\Auth::id())
                            <a role="button"  class="delete-post" href="{{route('unrepost',$post->id)}}"><i class="fa fa-times" aria-hidden="true"></i></a>
                        @endif
                        @if(!empty($post->image))
                            <a href="{{url('/post/'.$post->slug)}}">
                                <img src="{{asset('/storage/'.$post->image)}}" alt="post-image" class="img-responsive post-image" />
                            </a>
                        @endif
                        <div class="line-divider"></div>
                        @if(\Illuminate\Support\Facades\Auth::user()->hasLikedPost($post))
                            <likes :counter= "{{$post->likes->count()}}" :post_id="{{$post->id}}" @if(\Illuminate\Support\Facades\Auth::user()->id != $post->author_id && !\Illuminate\Support\Facades\Auth::user()->isRepost($post)) :flag_rep="true" @else :flag_rep="false" @endif :flag="true" ></likes>
                        @else
                            <likes :counter= "{{$post->likes->count()}}" :post_id="{{$post->id}}" @if(\Illuminate\Support\Facades\Auth::user()->id != $post->author_id && !\Illuminate\Support\Facades\Auth::user()->isRepost($post)) :flag_rep="true" @else :flag_rep="false" @endif :flag="true" ></likes>
                        @endif
                        <a href="{{url('/post/'.$post->slug)}}">
                            <div class="post-text">
                                <p>{!!$post->body!!}<i class="em em-anguished"></i> <i class="em em-anguished"></i> <i class="em em-anguished"></i></p>
                            </div>
                        </a>
                        @if(!empty($post->tags))
                            <ul class="">
                                @foreach($post->tags as $tag)
                                    <a class="post-tag" href="">{{$tag->name}}</a>
                                @endforeach
                            </ul>
                            <div class="line-divider"></div>
                        @endif

                    </div>
                </div>
            </div>
        @endif



        @if($post->isHelp())
            <div class="post-content">
                <div class="post-container">
                    <img src="{{asset('/storage/'.$user->avatar)}}" alt="user" class="profile-photo-md pull-left" />
                    <div class="post-detail">
                        <div class="user-info">
                            <h5><a href="{{route('account',$user->id)}}" class="profile-link">{{$user->name}}</a> @if($user->isRepost($post))  <span class="following">reposted by {{$post->authorId['name']}}</span></h5> @else<span class="following">following</span></h5> @endif
                            <p class="text-muted">Published {{$post->created_at->diffforHumans()}}</p>
                        </div>
                        @if($user->id == \Illuminate\Support\Facades\Auth::id())
                            <a role="button" href="{{route('unrepost',$post->id)}}" class="delete-post"><i class="fa fa-times" aria-hidden="true"></i></a>
                        @endif
                        <a href="{{url('/post/'.$post->slug)}}">
                            <div class="post-text">
                                <p>{!!$post->body!!}<i class="em em-anguished"></i> <i class="em em-anguished"></i> <i class="em em-anguished"></i></p>
                            </div>
                        </a>
                        @if(\Illuminate\Support\Facades\Auth::user()->hasLikedPost($post))
                            <likes :counter= "{{$post->likes->count()}}" :post_id="{{$post->id}}" @if(\Illuminate\Support\Facades\Auth::user()->id != $post->author_id && !\Illuminate\Support\Facades\Auth::user()->isRepost($post)) :flag_rep="true" @else :flag_rep="false" @endif :flag="true" ></likes>
                        @else
                            <likes :counter= "{{$post->likes->count()}}" :post_id="{{$post->id}}" @if(\Illuminate\Support\Facades\Auth::user()->id != $post->author_id && !\Illuminate\Support\Facades\Auth::user()->isRepost($post)) :flag_rep="true" @else :flag_rep="false" @endif :flag="true" ></likes>
                        @endif
                        @if(!empty($post->tags))
                            <ul class="">
                                @foreach($post->tags as $tag)
                                    <a class="post-tag" href="">{{$tag->name}}</a>
                                @endforeach
                            </ul>
                            <div class="line-divider"></div>
                        @endif
                    </div>
                </div>
            </div>
        @endif
        @if($post->isNews())
            <div class="post-content">
                <div class="post-container">
                    <img src="{{asset('/storage/'.$user->avatar)}}" alt="user" class="profile-photo-md pull-left" />
                    <div class="post-detail">
                        @if($user->id == \Illuminate\Support\Facades\Auth::id())
                            <a role="button" href="{{route('unrepost',$post->id)}}" class="delete-post"><i class="fa fa-times" aria-hidden="true"></i></a>
                        @endif
                            <div class="user-info">
                                <h5><a href="{{route('account',$user->id)}}" class="profile-link">{{$user->name}}</a> @if($user->isRepost($post))  <span class="following">reposted by {{$post->authorId['name']}}</span></h5> @else<span class="following">following</span></h5> @endif
                                <p class="text-muted">Published {{$post->created_at->diffforHumans()}}</p>
                            </div>
                        <a href="{{url('/post/'.$post->slug)}}">
                            @if(!empty($post->image))
                                <img src="{{asset('/storage/'.$post->image)}}" alt="post-image" class="img-responsive post-image" />
                            @endif
                        </a>
                        <div class="line-divider"></div>
                        @if(\Illuminate\Support\Facades\Auth::user()->hasLikedPost($post))
                            <likes :counter= "{{$post->likes->count()}}" :post_id="{{$post->id}}" @if(\Illuminate\Support\Facades\Auth::user()->id != $post->author_id && !\Illuminate\Support\Facades\Auth::user()->isRepost($post)) :flag_rep="true" @else :flag_rep="false" @endif :flag="true" ></likes>
                        @else
                            <likes :counter= "{{$post->likes->count()}}" :post_id="{{$post->id}}" @if(\Illuminate\Support\Facades\Auth::user()->id != $post->author_id && !\Illuminate\Support\Facades\Auth::user()->isRepost($post)) :flag_rep="true" @else :flag_rep="false" @endif :flag="true" ></likes>
                        @endif
                        <a href="{{url('/post/'.$post->slug)}}">
                            <div class="post-text">
                                <p>{!!$post->body!!}<i class="em em-anguished"></i> <i class="em em-anguished"></i> <i class="em em-anguished"></i></p>
                            </div></a>

                        @if(!empty($post->tags))
                            <ul>
                                @foreach($post->tags as $tag)
                                    <a class="post-tag" href="">{{$tag->name}}</a>
                                @endforeach
                            </ul>
                            <div class="line-divider"></div>
                        @endif
                          <comments :coments="{{$post->last_comments}}" :auth="{{\Illuminate\Support\Facades\Auth::user()->id}}" :post_id="{{$post->id}}"></comments>
                    </div>
                </div>
            </div>
        @endif

    @endforeach
@stop

