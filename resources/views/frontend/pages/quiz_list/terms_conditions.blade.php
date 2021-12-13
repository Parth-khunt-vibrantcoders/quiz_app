@extends('frontend.layouts.layout')
@section('section')

<section>
    <div class="container">
        <div class="quiz-list-main">
            <div class="quiz-list-box">
                <div class="quiz-list-box-content quiz-category" style="width: 100% !important">


                    {!! $details[0]['text'] !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
