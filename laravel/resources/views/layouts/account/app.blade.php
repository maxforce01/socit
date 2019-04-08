<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset("toastr.css")}}">
    <link rel="stylesheet" href="{{asset('toastr.scss')}}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('css/ionicons.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!--Favicon-->
    <link rel="shortcut icon" type="image/png" href="{{asset('images/fav.png')}}"/>
    <style>
        .dropdown:hover > .dropdown-menu {
            display: block;
        }
        .tagcloud {
            float:left;
            width:300px;
            margin-top:20px;
            margin-right:10px;
        }

        .tagcloud a {
            font-size:13px;
            color:#999;
            border-radius: 3px;
            background: #333;
            border-bottom:2px solid #888;
            margin:5px;
            padding:5px 5px 7px;
            float:left;
            -moz-transition: all 0.2s 0.01s ease-in;
            -o-transition: all 0.2s 0.01s ease-in;
            -webkit-transition: all 0.2s 0.01s ease-in;
        }

        .tagcloud a:hover {
            color:#fff;
            background-color:#FF6766;
            -webkit-transform: rotate(5deg);
            -moz-transform: rotate(5deg);
            -o-transform: rotate(5deg);
        }
    </style>
</head>
<body>
<div>
@include('layouts.header')
    <div id="app">
        <div class="container">
            @include('layouts.account.timeline')
            <div id="page-contents">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-7">
                        <div class="create-post">
                            <div class="row">
                                <div class="col-md-7 col-sm-7">
                                    <div class="form-group">
                                        <img src="http://placehold.it/300x300" alt="" class="profile-photo-md" />
                                        <textarea name="texts" id="exampleTextarea" cols="30" rows="1" class="form-control" placeholder="Write what you wish"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-5 col-sm-5">
                                    <div class="tools">
                                        <ul class="publishing-tools list-inline">
                                            <li><a href="#"><i class="ion-compose"></i></a></li>
                                            <li><a href="#"><i class="ion-images"></i></a></li>
                                            <li><a href="#"><i class="ion-ios-videocam"></i></a></li>
                                            <li><a href="#"><i class="ion-map"></i></a></li>
                                        </ul>
                                        <button class="btn btn-primary pull-right">Publish</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @yield('content')
                    </div>
                     @include('layouts.right_bar')
                </div>
            </div>
        </div>
    </div>
@include('layouts.footer')
</div>
<script type="text/javascript" src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.appear.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.incremental-counter.js')}}"></script>
<script type="text/javascript" src="{{asset('js/script.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
</body>
</html>
