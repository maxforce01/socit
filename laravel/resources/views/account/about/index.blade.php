@extends('layouts.account.app')

@section('content')
    <div class="about-profile">
        <div class="about-content-block">
            <h4 class="grey"><i class="ion-ios-information-outline icon-in-title"></i>Personal Information</h4>
            <p>{{$user->about}}</p>
            @if(!empty($user->Birth))
            <h4 class="grey"><i class="ion-ios-information-outline icon-in-title"></i>Birth</h4>
            <p>{{$user->Birth->format('d F Y')}}</p>
                @endif
        </div>
        <div class="about-content-block">
            <h4 class="grey"><i class="ion-ios-briefcase-outline icon-in-title"></i>Work Experiences</h4>
            @foreach($user->jobs as $job)
                @if(!empty($job))
                <div class="organization">
                    @if($user->id == \Illuminate\Support\Facades\Auth::user()->id)
                    <a href="{{route('edit.work',$job)}}" class="btn btn-xs btn-info pull-right">Редактировать</a>
                    @endif
                        <div class="work-info">
                        <h5>{{$job->company}}</h5>
                        <p>{{$job->position}} - <span class="text-grey">{{$job->start->format('d F Y')}} to @if($job->end == null) present @else {{$job->end->format('d F Y')}} @endif</span></p>
                    </div>
                </div>
                @endif
             @endforeach
            @if($user->id == \Illuminate\Support\Facades\Auth::user()->id)
            <a href="{{route('create.work')}}" class="btn btn-info pull-right">Добавить</a>
            @endif
        </div>
        <br>
        <div class="about-content-block">
            <h4 class="grey"><i class="ion-ios-location-outline icon-in-title"></i>Location</h4>
            <h5>Country</h5>
            <p>{{$user->country}}</p>
            <h5>City</h5>
            <p>{{$user->city}}</p>
        </div>
            @if(!empty($user->interests))
                <div class="about-content-block">
                    <h4 class="grey"><i class="ion-ios-heart-outline icon-in-title"></i>Interests</h4>
                    <ul class="interests list-inline">
                    @foreach($user->interests as $tag)
                       <li><a class="post-tag" href="{{route('post.tag',$tag->id)}}">{{$tag->name}}</a></li>
                    @endforeach
                    </ul>
                </div>
            @endif
        <div class="about-content-block">
            <h4 class="grey"><i class="ion-ios-chatbubble-outline icon-in-title"></i>Language</h4>
            <ul>
                @foreach($user->languages as $language)
                    <li><a href="">{{$language->language}}</a></li>
                 @endforeach
            </ul>
        </div>
    </div>
    @if($user->id == \Illuminate\Support\Facades\Auth::user()->id)
        <a href="{{route('edit.profile')}}" class="btn btn-success pull-right">Редактировать</a>
        <a href="{{route('password')}}" class="btn btn-success pull-right">Изменить пароль</a>
    @endif
@stop
