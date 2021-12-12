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
        <li><a href="">Menu 1</a></li>
        <li><a href="">Menu 2</a></li>
        <li><a href="">Menu 3</a></li>
        <li><a href="">Menu 4</a></li>



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
