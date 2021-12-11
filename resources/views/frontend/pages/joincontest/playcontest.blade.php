@extends('frontend.layouts.layout')
@section('section')

<section>
    <div class="container">
        <div class="play-top-head">
            <div class="logo-icon">
                <img src="{{ asset('public/uploads/quiz/'.$quiz_details[0]['image']) }}">
            </div>
            <div class="play-now-head">
                <span>{{ $quiz_details[0]['quiz_category']}}</span>
                <h4 class="quiz-category">{{ $quiz_details[0]['name']}} <i class="fas fa-coins" style="color: #e89d1d;"></i> {{ $quiz_details[0]['prize']}}</h4>
            </div>
        </div>
        <div class="progress-top">
            <div class="progress-main">
                <div class="question-head">
                    <h6>Question <span class="que-no">1 </span><small>/ {{ count($question_list) }}</small></h6>
                    <div class="progress">
                        <div class="bar-main">
                            <div class="timer">
                              <span class="second">00</span>
                            </div>
                        </div>
                       </div>
                </div>
            </div>
        </div>
        <input type="hidden" id="adid" value="{{ $adid }}">
        <form>
            <div class="question-head">
                @php
                    $i = 1;
                @endphp
                @foreach ($question_list as $key => $value)
                    <div class="{{ $i == 1 ? '' : 'hidden'}} questiondiv" id="question_answer{{$i}}">

                        <h2>{{ $value['question']}}</h2>
                        <input type="hidden" id="question{{$i}}" value="{{ $value['right_answer'] }}">

                        <ul>
                                @php
                                    $right_anser_id = 'right_answer'.$i ;
                                @endphp
                            <li class="answerui" >
                                <label>
                                    <input type="radio" id="{{  $value['right_answer'] == '1' ? $right_anser_id : '' }}" class="answer-btn" data-question="{{$i}}" value="1" id="1" name="age-rang">
                                    <span>{{ $value['answer1']}} </span>
                                </label>
                            </li>
                            <li class="answerui">
                                <label>
                                    <input type="radio" id="{{  $value['right_answer'] == '2' ? $right_anser_id : '' }}" class="answer-btn" data-question="{{$i}}" value="2" id="2" name="age-rang">
                                    <span>{{ $value['answer2']}} </span>
                                </label>
                            </li>
                            <li class="answerui">
                                <label>
                                    <input type="radio" id="{{  $value['right_answer'] == '3' ? $right_anser_id : '' }}" class="answer-btn" data-question="{{$i}}" value="3" id="3" name="age-rang">
                                    <span>{{ $value['answer3']}} </span>
                                </label>
                            </li>
                            <li class="answerui">
                                <label>
                                    <input type="radio" id="{{  $value['right_answer'] == '4' ? $right_anser_id : '' }}" class="answer-btn" data-question="{{$i}}" value="4" id="4" name="age-rang">
                                    <span>{{ $value['answer4']}} </span>
                                </label>
                            </li>
                        </ul>

                        <div class="your-score">
                            <input type="hidden" id="score-text" value="0">
                            <p>Your Score: <span class="score-text">0</span></p>
                        </div>
                    </div>
                    @php
                        $i++;
                    @endphp
                @endforeach

            </div>
        </form>
    </div>
</section>

@endsection
