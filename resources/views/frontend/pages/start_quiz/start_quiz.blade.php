@extends('frontend.layouts.quiz_layout')
@section('section')
<div class="side-bar">
    <div class="side-bar-inner">
        <section>
            <div class="container">
                <center>
                    <div class="" style="margin-top: 50px !important;margin-bottom: 20px !important">
                        <img src="{{ asset('public/uploads/startquiz/'.$details->image ) }}">
                    </div>
                </center>

                <div class="login-head" style="padding: 0px 0px 20px 0px !important">
                    <h2>You have won 100 coins! <span style="color: #e6b520 !important; padding-bottom: 10px !important"> 👏 </span></h2>

                    <p style="font-size: 18px !important;margin-top: 10px; color: #C8789C3  !important">Play more quizzes and win more coins</p>
                </div>
                <div class="login-head" style="padding: 0px !important">
                    <a href="{{ route('quiz-list') }}">
                        <button class="my-btn" >LET'S START</button>
                    </a>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
