@php
$currentRoute = Route::current()->getName();

if (!empty(Auth()->guard('admin')->user())) {
   $data = Auth()->guard('admin')->user();
}

if(file_exists( public_path().'/uploads/userprofile/'.$data['userimage']) && $data['userimage'] != ''){
    $image = url("public/uploads/userprofile/".$data['userimage']);
}else{
    $image = url("public/uploads/userprofile/default.jpg");
}
// print_r($data);
@endphp
<!-- Page Sidebar Start-->
<header class="main-nav">
    {{-- <div class="sidebar-user text-center">

        <img class="img-40 rounded-circle" src="{{ $image }}" alt="">
            <h6 class="mt-3 f-14 f-w-600">
                {{ $data['first_name'] }} {{ $data['last_name']}}
                <a href="{{ route('edit-profile') }}">
                    <i class="fa fa-pencil-square-o" title="Edit Profile"></i>
                </a>
            </h6>
        <p class="mb-0 font-roboto">{{ $data['email'] }}</p>

    </div> --}}
    <nav class="mt-3">
       <div class="main-navbar">
          <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>

          <div id="mainnav">
             <ul class="nav-menu custom-scrollbar">
                <li class="back-btn">
                   <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                </li>

                <li>
                    <a class="nav-link menu-title link-nav {{ $currentRoute == 'my-dashboard' ? 'my-active' : ''}}" href="{{ route('my-dashboard')}}">
                        <i data-feather="home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a class="nav-link menu-title link-nav {{ $currentRoute == 'edit-profile'  ? 'my-active' : ''}}" href="{{ route('edit-profile')}}">
                        <i data-feather="edit"></i>
                        <span>Edit Profile</span>
                    </a>
                </li>

                <li>
                    <a class="nav-link menu-title link-nav {{  $currentRoute == 'change-password' ? 'my-active' : ''}}" href="{{ route('change-password')}}">
                        <i data-feather="lock"></i>
                        <span>Change Password</span>
                    </a>
                </li>

                <li class="dropdown"><a class="nav-link menu-title {{  $currentRoute == 'landing-page-background-image' || $currentRoute == 'landing-page-question-list' || $currentRoute == 'landing-page-question-add' || $currentRoute == 'landing-page-question-edit'  ? 'my-active' : ''}}" href="javascript:void(0)">
                    <i data-feather="shopping-bag"></i>
                    <span>Landing Page</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="{{ route('landing-page-background-image') }}" class="{{  $currentRoute == 'landing-page-background-image'   ? 'sub-active active' : ''}}">Image</a></li>
                      <li><a href="{{  route('landing-page-question-list') }}" class="{{   $currentRoute == 'landing-page-question-list' || $currentRoute == 'landing-page-question-add' || $currentRoute == 'landing-page-question-edit'   ? 'sub-active active' : ''}}">Question</a></li>
                    </ul>
                </li>

                <li class="dropdown"><a class="nav-link menu-title {{  $currentRoute == 'result-background-image'   ? 'my-active' : ''}}" href="javascript:void(0)">
                    <i data-feather="shopping-bag"></i>
                    <span>Result Page</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="{{ route('result-background-image') }}" class="{{  $currentRoute == 'result-background-image'   ? 'sub-active active' : ''}}">Image</a></li>
                    </ul>
                </li>

             </ul>
          </div>

       </div>
    </nav>
 </header>
 <!-- Page Sidebar Ends-->
