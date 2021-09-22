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
    <div class="sidebar-user text-center">

        <img class="img-40 rounded-circle" src="{{ $image }}" alt="">
            <h6 class="mt-3 f-14 f-w-600">
                {{ $data['first_name'] }} {{ $data['last_name']}}
                <a href="{{ route('edit-profile') }}">
                    <i class="fa fa-pencil-square-o" title="Edit Profile"></i>
                </a>
            </h6>
        <p class="mb-0 font-roboto">{{ $data['email'] }}</p>

    </div>
    <nav>
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



             </ul>
          </div>

       </div>
    </nav>
 </header>
 <!-- Page Sidebar Ends-->
