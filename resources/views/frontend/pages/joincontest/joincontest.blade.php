<!DOCTYPE html>
<html>
	@include('frontend.include.header')
	<body>


		<div class="side-bar">
			<div class="side-bar-inner">
                @include('frontend.include.body_header')



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
