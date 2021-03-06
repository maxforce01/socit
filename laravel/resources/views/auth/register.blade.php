@extends('auth.layouts.app')

@section('content')
    <div id="lp-register">
        <div class="container wrapper">
            <div class="row">
                <div class="col-sm-5">
                    <div class="intro-texts">
                        <h1 class="text-white">Make Cool Friends !!!</h1>
                        <p>Friend Finder is a social network template that can be used to connect people. The template offers Landing pages, News Feed, Image/Video Feed, Chat Box, Timeline and lot more. <br /> <br />Why are you waiting for? Buy it now.</p>
                        <button class="btn btn-primary">Learn More</button>
                    </div>
                </div>
                <div class="col-sm-6 col-sm-offset-1">
                    <div class="reg-form-container">
                        <!--Registration Form Contents-->
                        <div class="tab-content">
                            <div class="tab-pane active" id="register">
                                <h3>Register Now !!!</h3>
                                <p class="text-muted">Be cool and join today. Meet millions</p>

                                <!--Register Form-->
                                <form name="registration_form" id='registration_form' class="form-inline" method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-xs-12">
                                            <label for="name" class="sr-only">Name</label>
                                            <input id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" name="name" value="{{ old('name') }}" title="Enter name" placeholder="name"/>
                                                @if ($errors->has('name'))
                                                    <span class="invalid-feedback" role="alert">
                                                             <strong>{{ $errors->first('name') }}</strong>
                                                     </span>
                                                @endif
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="form-group col-xs-12">
                                            <label for="email" class="sr-only">Email</label>
                                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" title="Enter Email" placeholder="Your Email" required>

                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="form-group col-xs-12">
                                            <label for="Password" class="sr-only">Password</label>
                                            <input placeholder="Password" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                            @endif
                                        </div>


                                        <div class="form-group col-xs-12">
                                            <label for="password-confirm" class="sr-only">Confirm Password</label>
                                            <input placeholder="Confirm" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-info">Register Now</button>
                                </form><!--Register Now Form Ends-->
                                <p><a href="{{url('login')}}">Already have an account?</a></p>
                            </div><!--Registration Form Contents Ends-->
                        </div>
                    </div>
                </div>
            </div>







@endsection
