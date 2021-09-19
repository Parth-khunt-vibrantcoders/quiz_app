@extends('backend.layout.login_layout')
@section('section')
<!-- page-wrapper Start-->
<section>
   <div class="container-fluid">
      <div class="row">
         <div class="col-xl-7"><img class="bg-img-cover bg-center" src="{{ asset('public/backend/assets/images/login/2.jpg') }}" alt="looginpage"></div>
            <div class="col-xl-5 p-0">
                <div class="login-card">
                    <form class="theme-form login-form " id="login-form" enctype="multipart/form-data" method="POST">
                        @csrf
                            <h4>Login</h4>
                            <h6>Welcome back! Log in to your account.</h6>
                            <div class="form-group">
                                <label>Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="icon-email"></i>
                                    </span>
                                    <input class="form-control" type="email" name="email" placeholder="Please enter your register mail" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="icon-lock"></i>
                                    </span>
                                    <input class="form-control" type="password" name="password"  placeholder="Please enter your password">
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" type="submit">Sign in</button>
                            </div>
                    </form>
                </div>
            </div>
      </div>
   </div>
</section>
<!-- page-wrapper end-->
@endsection
