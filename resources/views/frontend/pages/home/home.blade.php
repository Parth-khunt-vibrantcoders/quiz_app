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
								<h6>Question 1 <small>/ 2</small></h6>
								<h2>Select your Age Rang</h2>
								<ul>
									<li>
										<label>
											<input type="radio" name="age-rang">
											<span>10 - 15</span>
										</label>
									</li>
									<li class="wrong-ans">
										<label>
											<input type="radio" name="age-rang">
											<span>15 - 20</span>
										</label>
									</li>
									<li class="right-ans">
										<label>
											<input type="radio" name="age-rang">
											<span>20 - 25</span>
										</label>
									</li>
									<li>
										<label>
											<input type="radio" name="age-rang">
											<span>25 to Up</span>
										</label>
									</li>
								</ul>
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
					<img src="{{ asset('public/frontend/images/man-getting.jpg') }}">
				</div>
				<div class="desktop-logo">
					<img src="{{ asset('public/frontend/images/desktop-logo.png') }}">
					<p>Play Quiz, <b>Win Coins !</b></p>
				</div>
			</div>
		</div>

	</body>
</html>
