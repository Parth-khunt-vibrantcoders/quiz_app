<!DOCTYPE html>
<html>
	@include('frontend.includes.header')

    @php
        $currentRoute = Route::current()->getName();
        $data = [];

        if (!empty(Auth()->guard('users')->user())) {
        $data = Auth()->guard('users')->user();
        }

        if(!empty($data)){
            session()->put('user_coin',  get_users_coin($data['id']));
        }else{
            if(session()->has('user_coin')){
                session()->put('user_coin', session('user_coin'));
            }else{
                session()->put('user_coin', 1000);
            }
        }
    @endphp

	<body>
		@yield('section')
        @include('frontend.includes.body_footer')
        @include('frontend.includes.footer')
	</body>
</html>
