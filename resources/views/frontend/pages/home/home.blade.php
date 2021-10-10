<!DOCTYPE html>
<html>
	@include('frontend.include.header')
	<body>

		<div class="side-bar">
			<div class="side-bar-inner">
				<section>
					<div class="container">
						<div class="login-head">
							<h2>Let’s Get Started</h2>
							<p>Share your Prefrence to get <i class="fas fa-coins"></i> 100 coins free!</p>
						</div>
						<form>
							<div class="question-head">
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($question_list as $key => $value)
                                    <div class="{{ $i == 1 ? '' : 'hidden'}} questiondiv">
                                        <h6>Question {{$i}} <small>/ 2</small></h6>
                                        <h2>{{ $value['question']}}</h2>
                                        <input type="hidden" id="question{{$i}}" value="{{ $value['right_answer'] }}">
                                        <ul>
                                            <li class="answerui" id="question{{$i}}{{ $value['right_answer'] }}">
                                                <label>
                                                    <input type="radio" class="answer-btn" data-question="{{$i}}" value="1" id="1" name="age-rang">
                                                    <span>{{ $value['answer1']}} </span>
                                                </label>
                                            </li>
                                            <li class="answerui" id="question{{$i}}{{ $value['right_answer'] }}">
                                                <label>
                                                    <input type="radio" class="answer-btn" data-question="{{$i}}" value="2" id="2" name="age-rang">
                                                    <span>{{ $value['answer2']}} </span>
                                                </label>
                                            </li>
                                            <li class="answerui" id="question{{$i}}{{ $value['right_answer'] }}">
                                                <label>
                                                    <input type="radio" class="answer-btn" data-question="{{$i}}" value="3" id="3" name="age-rang">
                                                    <span>{{ $value['answer3']}} </span>
                                                </label>
                                            </li>
                                            <li class="answerui" id="question{{$i}}{{ $value['right_answer'] }}">
                                                <label>
                                                    <input type="radio" class="answer-btn" data-question="{{$i}}" value="4" id="4" name="age-rang">
                                                    <span>{{ $value['answer4']}} </span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
								<div class="sign-login">
									<a href="{{ route('sign-in') }}">Sign Up · Login</a>
								</div>
							</div>
						</form>
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
		<div class="desktop">
			<div class="desktop-inner">
				<div class="">
					<img src="{{ asset('public/uploads/landingpages/'.$image->image ) }}">
				</div>
				<div class="desktop-logo">
					<img src="{{ asset('public/frontend/images/desktop-logo.png') }}">
					<p>Play Quiz, <b>Win Coins !</b></p>
				</div>
			</div>
		</div>
    @include('frontend.include.footer')
	</body>
</html>
