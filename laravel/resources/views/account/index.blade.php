@extends('layouts.account.app')
@section('content')
    @foreach($posts as $post)
        @if($post->isLesson())
            @if($user->isRepost($post))
            <div class="post-content">
                <div class="post-date hidden-xs hidden-sm">
                    <h5>{{$user->name}}</h5>
                    <p class="text-grey">{{$post->created_at->diffforHumans()}}</p>
                </div><!--Post Date End-->
                <div class="post-container">
                    <img src="{{asset('/storage/'.$user->avatar)}}" alt="user" class="profile-photo-md pull-left" />
                    <div class="post-detail">
                        <div class="user-info">
                            <h5><a href="#" class="profile-link">{{$user->name}}</a> <span class="following">reposted by {{$post->authorId['name']}}</span></h5>
                        </div>
                        @if($user->id == \Illuminate\Support\Facades\Auth::id())
                            <a role="button"  class="delete-post" href="{{route('unrepost',$post->id)}}"><i class="fa fa-times" aria-hidden="true"></i></a>
                        @endif
                        @else
                            <div class="post-content">
                            <div class="post-date hidden-xs hidden-sm">
                                <h5>{{$post->authorId['name']}}</h5>
                                <p class="text-grey">{{$post->created_at->diffforHumans()}}</p>
                            </div><!--Post Date End-->
                            <div class="post-container">
                                <img src="{{asset('/storage/'.$post->authorId['avatar'])}}" alt="user" class="profile-photo-md pull-left" />
                                <div class="post-detail">
                                    <div class="user-info">
                                        <h5><a href="#" class="profile-link">{{$post->authorId['name']}}</a> <span class="following">following</span></h5>
                                    </div>
                                    @if($user->id == \Illuminate\Support\Facades\Auth::id())
                                        <a class="delete-post" role="button" href="{{route('post.delete',$post->id)}}"><i class="fa fa-times" aria-hidden="true"></i></a>
                                    @endif
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
            @if($user->isRepost($post))
            <div class="post-content">
                <div class="post-date hidden-xs hidden-sm">
                    <h5>{{$user->name}}</h5>
                    <p class="text-grey">{{$post->created_at->diffforHumans()}}</p>
                </div><!--Post Date End-->
                <div class="post-container">
                    <img src="{{asset('/storage/'.$user->avatar)}}" alt="user" class="profile-photo-md pull-left" />
                    <div class="post-detail">
                        <div class="user-info">
                            <h5><a href="#" class="profile-link">{{$user->name}}</a> <span class="following">reposted by {{$post->authorId['name']}}</span></h5>
                        </div>
                        @if($user->id == \Illuminate\Support\Facades\Auth::id())
                            <a role="button" href="{{route('unrepost',$post->id)}}" class="delete-post"><i class="fa fa-times" aria-hidden="true"></i></a>
                        @endif
                        @else
                            <div class="post-content">
                                <div class="post-date hidden-xs hidden-sm">
                                    <h5>{{$post->authorId['name']}}</h5>
                                    <p class="text-grey">{{$post->created_at->diffforHumans()}}</p>
                                </div><!--Post Date End-->
                                <div class="post-container">
                                    <img src="{{asset('/storage/'.$post->authorId['avatar'])}}" alt="user" class="profile-photo-md pull-left" />
                                    <div class="post-detail">
                                        <div class="user-info">
                                            <h5><a href="#" class="profile-link">{{$post->authorId['name']}}</a> <span class="following">following</span></h5>
                                        </div>
                                        @if($user->id == \Illuminate\Support\Facades\Auth::id())
                                            <a role="button" href="{{route('post.delete',$post->id)}}" class="delete-post"><i class="fa fa-times" aria-hidden="true"></i></a>
                                        @endif
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
            @if($user->isRepost($post))
            <div class="post-content">
                <div class="post-date hidden-xs hidden-sm">
                    <h5>{{$user->name}}</h5>
                    <p class="text-grey">{{$post->created_at->diffforHumans()}}</p>
                </div><!--Post Date End-->
                <div class="post-container">
                    <img src="{{asset('/storage/'.$user->avatar)}}" alt="user" class="profile-photo-md pull-left" />
                    <div class="post-detail">
                        @if($user->id == \Illuminate\Support\Facades\Auth::id())
                            <a role="button" href="{{route('unrepost',$post->id)}}" class="delete-post"><i class="fa fa-times" aria-hidden="true"></i></a>
                        @endif
                            <div class="user-info">
                            <h5><a href="#" class="profile-link">{{$user->name}}</a> <span class="following">reposed by {{$post->authorId['name']}}</span></h5>
                        </div>
                            @else
                                <div class="post-content">
                                    <div class="post-date hidden-xs hidden-sm">
                                        <h5>{{$post->authorId['name']}}</h5>
                                        <p class="text-grey">{{$post->created_at->diffforHumans()}}</p>
                                    </div><!--Post Date End-->
                                    <div class="post-container">
                                        <img src="{{asset('/storage/'.$post->authorId['avatar'])}}" alt="user" class="profile-photo-md pull-left" />
                                        <div class="post-detail">
                                            @if($user->id == \Illuminate\Support\Facades\Auth::id())
                                                <a role="button" href="{{route('post.delete',$post->id)}}" class="delete-post"><i class="fa fa-times" aria-hidden="true"></i></a>
                                           @endif
                                            <div class="user-info">
                                                <h5><a href="#" class="profile-link">{{$post->authorId['name']}}</a> <span class="following">following</span></h5>
                                            </div>
                             @endif
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

                        @foreach($post->last_comments as $comment)
                            <div class="post-comment">
                                <img src="{{asset('/storage/'.$comment->user->avatar)}}" alt="" class="profile-photo-sm" />
                                <h4><a href="#" class="profile-link">{{$comment->user->name}}:</a></h4>
                                <h4 class="grey-spec">{{$comment->title}}</h4>
                                @if($comment->user->id == \Illuminate\Support\Facades\Auth::id())
                                    <a role="button" href="{{route('comments',$comment->id)}}" class="delete-coment"><i class="fa fa-times" aria-hidden="true"></i></a>
                                @endif
                            </div>
                            <p>({{ $comment->created_at->diffforHumans() }})</p>
                        @endforeach
                        <form class="post-comment" action="{{route('comment')}}" method="post">
                            <input type="text"  data-emojiable="true" name="title" class="form-control" placeholder="Post a comment">
                            <input type="hidden" name="user_id" value="{{Auth::id()}}">
                            <input type="hidden" name="post_id" value="{{$post->id}}">
                            <button type="submit" class="btn btn-primary btn-xs"><i class="fa fa-check" aria-hidden="true"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
@stop
