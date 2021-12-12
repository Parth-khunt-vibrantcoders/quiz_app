@php
$currentRoute = Route::current()->getName();
$data = [];

if (!empty(Auth()->guard('users')->user())) {
   $data = Auth()->guard('users')->user();
}
$ad_id = $_GET['id'] ;
@endphp

<div class="sidebar-menu">
    <div class="sidebar-menu-head">
        <div class="logo">

        </div>
        <div class="theme-switch-wrapper">
            <label class="theme-switch" for="checkbox">
                <input type="checkbox" id="checkbox" />
                <div class="slider round"></div>
              </label>
        </div>
    </div>
    <ul>
        <li>
            <a href="{{ route('quiz-list')}}">
                <i class="fa fa-home" aria-hidden="true"></i>Home
            </a>
        </li>
        <li>
            <a href="">
                <i class="fa fa-handshake" aria-hidden="true"></i>Partner with us
            </a>
        </li>
        <li>
            <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>Contact us
            </a>
        </li>
        <li>
            <a href="{{ route('quiz-rules') }}">
                <i class="fa fa-flag" aria-hidden="true"></i>Qzop Rules
            </a>
        </li>
        <li>
            <a href="{{ route('privacy-policy') }}">
                <i class="fa fa-lock" aria-hidden="true"></i>Privacy Policy
            </a>
        </li>
    </ul>
    <div class="submit-btn">
        <p>Join qzop to play quiz and earn coins</p>
        @if (!empty($data))
            <a href="{{ route('logout', ['id' => $ad_id]) }}">
                <button type="submit" class="btn">Logout</button>
            </a>
        @else
            <a href="{{ route('sign-in', ['id' => $ad_id]) }}">
                <button type="submit" class="btn">Join Now</button>
            </a>
        @endif
    </div>
</div>
