@extends('frontend.layouts.layout')
@section('section')
<section>
    <div class="container">
        <div class="quiz-list-main">
            <div class="quiz-list-box">
                <div class="quiz-list-box-content" style="width: 100% !important">
                    <div class="logo-icon">
                        <img src="{{ asset('public/uploads/quiz/'.$quiz_details[0]['image']) }}">
                    </div>
                    <div class="play-now-head">
                        <span>{{ $quiz_details[0]['quiz_category']}}</span>
                        <h4 class="quiz-category">{{ $quiz_details[0]['name']}} <i class="fas fa-coins" style="color: #e89d1d;"></i> {{ $quiz_details[0]['prize']}}</h4>
                    </div>


                </div>
                <div class="container">
                    <div class="score-main">
                       <div class="git-icon">
                          <img src="{{ asset('public/frontend/images/oops.png') }}">
                       </div>
                       <div class="congratulations-title">
                        <h4>You don't have enough coins to play this Quiz. Play other Quizzes and earn coins.</h4>
                       </div>
                    </div>
                </div>

                <div class="quiz-list-box-footer">
                    <div class="play-btn full-btn">
                        <a href="{{ route('quiz-list' , ['id' => $adid])}}" >
                            <button type="button">Back to Home</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
