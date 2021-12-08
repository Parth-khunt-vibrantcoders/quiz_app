<!DOCTYPE html>
<html>
	@include('frontend.includes.header')
	<body>
        <div class="side-bar">
			<div class="side-bar-inner">

                @include('frontend.includes.body_header')

				@include('frontend.includes.sidebar')

				@yield('section')
			</div>
		</div>

        @include('frontend.includes.body_footer')
        @include('frontend.includes.footer')

	</body>
</html>
