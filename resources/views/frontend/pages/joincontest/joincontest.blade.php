@extends('frontend.layouts.layout')
@section('section')

<section>
    <div class="container">
        <div class="quiz-list-main">
            <div class="quiz-list-box">
                <div class="quiz-list-box-content" style="width: 100% !important">
                    <div class="box-img">
                        <div class="list-img">
                            <img src="{{ asset('public/uploads/quiz/'.$quiz_details[0]['image']) }}">
                        </div>
                    </div>
                    <div class="box-content">
                        <span>{{ $quiz_details[0]['quiz_category']}}</span>
                        <h4>{{ $quiz_details[0]['name']}} <i class="fas fa-coins"></i> {{ $quiz_details[0]['prize']}}</h4>
                    </div>
                    <ul>
                        <li>You've got 90 seconds to answer all questions</li>
                        <li>Answer as many questions as you can</li>
                        <li>Entry fee </li>
                    </ul>
                </div>
                <div class="quiz-list-box-footer">


                    <div class="play-btn full-btn">
                        <div class=" text-center " style="margin-bottom: 15px !important;color: var(--text-color);">Join now to save the coins you win! 👇</div>
                        <a href="{{ route('sign-in', ['id' => $adid])}}">
                            <button type="button">Play Now</button>
                        </a>
                        <div class=" text-center " style="color: var(--text-color); font-weight: bold !important ;margin-top: 15px !important; font-size: 12px !important">OR</div>

                        <br>
                        <a href="{{ route('play-contest', [$quiz_details[0]['slug'], 'id='.$adid])}}">
                            <div class=" text-center ">
                                <span class="guest-btn" >Play as Guest</span>
                            </div>
                        </a>

                    </div>
                </div>


            </div>
        </div>
    </div>
</section>

@endsection
