<!DOCTYPE html>
<html>
    @php
        $currentRoute = Route::current()->getName();
    @endphp

	@include('frontend.includes.header')

	<body>
        <div class="side-bar">
			<div class="side-bar-inner">

                {{-- @if ($currentRoute != 'play-contest') --}}
                    @include('frontend.includes.body_header')
                {{-- @endif --}}

				@include('frontend.includes.sidebar')

				@yield('section')

			</div>
		</div>

        @include('frontend.includes.body_footer')

        @include('frontend.includes.footer')

	</body>
</html>
