
@extends('frontend.layouts.layout')
@section('section')
<section>
    <div class="container">
        <div class="score-main">
            <div class="result-title">
                <h4>Result</h4>
            </div>
            <div class="git-icon">
                <img src="{{ asset('public/uploads/resultpages/'.$result_page_image['image']) }}">
            </div>
            <div class="congratulations-title">
                <h4>Congratulations!</h4>
            </div>
            <div class="score-box-main">
                <p>Your Score</p>
                <h3><span>{{ $score }}</span> / 500</h3>
                <p>Earned Coins</p>
                <span class="span-text"><i class="fas fa-coins"></i> {{ $coins }}</span>
                <button type="button" data-toggle="modal" data-target="#exampleModal">View point system</button>
            </div>
        </div>
    </div>
</section>
@endsection
