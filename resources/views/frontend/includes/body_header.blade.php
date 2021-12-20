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

<header>
    <div class="container">
        <div class="header-top">
            <div class="logo-menu">
                <button class="menu-open" type=""><i class="fal fa-signal-alt-3"></i></button>
                <input type="hidden" id="logoadd" value="{{ $_GET['id']}}">
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
