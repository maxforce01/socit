<div class="timeline">
    <div class="timeline-cover">

        <!--Timeline Menu for Large Screens-->
        <div class="timeline-nav-bar hidden-sm hidden-xs">
            <div class="row">
                <div class="col-md-3">
                    <div class="profile-info">
                        <img src="{{asset('/storage/'.$user->avatar)}}" alt="" class="img-responsive profile-photo" />
                        <h3>{{$user->name}}</h3>
                        <p class="text-muted">Creative Director</p>
                    </div>
                </div>
                <div class="col-md-9">
                    <ul class="list-inline profile-menu">
                        <li><a href="{{route('user',$user->id)}}" class="active">Лента</a></li>
                        <li><a href="timeline-about.html">About</a></li>
                        <li><a href="{{route('gallery',$user->id)}}">Альбом</a></li>
                        <li><a href="{{route('videos',$user->id)}}">Видео</a></li>
                        <li><a href="{{route('subscriptions.user',$user->id)}}">Подписчики</a></li>
                    </ul>
                    <ul class="follow-me list-inline">
                        <li>@if(\Illuminate\Support\Facades\Auth::user()->id != $user->id)
                                @if(!\Illuminate\Support\Facades\Auth::user()->isSubscribe($user))
                                    <subscribe :user="{{$user}}" :flag="false" ></subscribe>
                                @else
                                    <subscribe :user="{{$user}}" :flag="true" ></subscribe>
                                @endif
                            @endif</li>
                        <li>{{$user->subscribers->count()}} people following</li>

                    </ul>
                </div>
            </div>
        </div><!--Timeline Menu for Large Screens End-->

        <!--Timeline Menu for Small Screens-->
        <div class="navbar-mobile hidden-lg hidden-md">
            <div class="profile-info">
                <img src="{{asset('/storage/'.$user->avatar)}}" alt="" class="img-responsive profile-photo" />
                <h4>{{$user->name}}</h4>
                <p class="text-muted">Creative Director</p>
            </div>
            <div class="mobile-menu">
                <ul class="list-inline">
                        <li><a href="{{route('user',$user->id)}}" class="active">Лента</a></li>
                        <li><a href="timeline-about.html">About</a></li>
                        <li><a href="{{route('gallery',$user->id)}}">Альбом</a></li>
                        <li><a href="{{route('videos',$user->id)}}">Видео</a></li>
                        <li><a href="{{route('subscriptions.user',$user->id)}}">Подписчики</a></li>
                </ul>
                @if(\Illuminate\Support\Facades\Auth::user()->id != $user->id)
                @if(!\Illuminate\Support\Facades\Auth::user()->isSubscribe($user))
                    <subscribe :user="{{$user}}" :flag="false" ></subscribe>
                @else
                    <subscribe :user="{{$user}}" :flag="true" ></subscribe>
                @endif
                @endif
            </div>
        </div>
    </div>
</div>

