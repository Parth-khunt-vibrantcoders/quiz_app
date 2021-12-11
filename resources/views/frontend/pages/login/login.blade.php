@extends('frontend.layouts.login_layout')
@section('section')
<div class="side-bar">
    <div class="side-bar-inner">
        <header>
            <div class="container">
                <div class="header-top">
                    <div class="logo-menu">
                        <button class="menu-open" type=""><i class="fal fa-angle-left"></i></button>
                        <div class="logo">
                            {{-- <img src="{{ asset('public/frontend/images/logo.png' ) }}"> --}}
                        </div>
                    </div>
                </div>
            </div>
        </header><!-- /header -->

        <div class="sidebar-menu">
            <div class="sidebar-menu-head">
                <div class="logo">

                </div>
                <div class="theme-switch-wrapper">
                    <label class="theme-switch" for="checkbox">
                        <input type="checkbox" id="checkbox" />
                        <div class="slider round"></div>
                      </label>
                </div>
            </div>
            <ul>
                <li><a href="">Menu 1</a></li>
                <li><a href="">Menu 2</a></li>
                <li><a href="">Menu 3</a></li>
                <li><a href="">Menu 4</a></li>
            </ul>
            <div class="submit-btn">
                <p>Join qzop to play quiz and earn coins</p>
                <button type="submit" class="btn">Join Now</button>
            </div>
        </div>

        <section>
            <div class="container">
                <div class="login-head">
                    <h2>Join qzop now!</h2>
                    <p>Play qzop and Win Coins</p>
                </div>
                <form method="POST" id="user-login">
                    @csrf
                    <div class="input-form">
                        <div class="form-group">
                            <label>Enter register email</label>
                            <div class="input-group">
                                <span class="icon-box"><i class="fa fa-envelope"></i></span>
                                <input type="text" class="form-control" placeholder="Please enter register email" name="email">
                            </div>
                        </div>
                    </div>

                    <div class="input-form">
                        <div class="form-group">
                            <label>Enter Password</label>
                            <div class="input-group">
                                <span class="icon-box"><i class="fa fa-key"></i></span>
                                <input type="password" class="form-control" placeholder="Please enter your password" name="password">
                            </div>
                        </div>
                    </div>

                    <div class="submit-btn">
                        <button type="submit" class="btn">CONTINUE</button>
                    </div>

                </form>
                    <div class="sign-login">
                        <a href="{{ route('sign-up',['id' => $adId]) }}">Create New Account</a>
                    </div>


                <div class="login-content">
                    <h3>Play Qzop and Win Coins!</h3>
                    <ul>
                        <li>Play Quizzes in 25+ categories like GK, Sports, Bollywood, Business, Cricket & more!</li>
                        <li>Compete with lakhs of other players!</li>
                        <li>Win coins for every game</li>
                        <li>Trusted by millions of other quiz enthusiasts like YOU!</li>
                    </ul>
                </div>
            </div>
        </section>
    </div>
</div>
@include('frontend.includes.body_footer')
@endsection
