@php
$currentRoute = Route::current()->getName();
$data = [];
Session::forget('user_coin');


if (!empty(Auth()->guard('users')->user())) {
   $data = Auth()->guard('users')->user();
}

if(!empty($data)){
    Session::forget('user_coin');
    session(['user_coin' => $data['coins']]);
}else{
    if(session('user_coin')){
        session([ 'user_coin' => session('user_coin') ]);
    }else{
        session(['user_coin' => 1000 ]);
    }
}
@endphp

<header>
    <div class="container">
        <div class="header-top">
            <div class="logo-menu">
                <button class="menu-open" type=""><i class="fal fa-signal-alt-3"></i></button>
                <div class="logo">

                </div>
            </div>
            <div class="wallet-icon">
                <div class="wallet-box">
                    <i class="fas fa-coins"></i>
                    <div class="wallet-box-text">
                        <small>Coins</small>
                        <p>{{ session('user_coin') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header><!-- /header -->
