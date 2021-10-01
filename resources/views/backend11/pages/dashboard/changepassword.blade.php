@extends('backend.layout.layout')
@section('section')
@php
if (!empty(Auth()->guard('admin')->user())) {
$data = Auth()->guard('admin')->user();
}
@endphp
<!-- Container-fluid starts-->
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-body">
               <form id="change-password" enctype="multipart/form-data" method="POST">
                  @csrf
                  <div class="form-group">
                     <label class="form-label" for="old_password">Old Password</label>
                     <input class="form-control" id="editId" type="hidden" name="editId" placeholder="Please enter user id" value="{{ $data['id'] }}" >
                     <input class="form-control" id="db_password" type="hidden" name="db_password" placeholder="Please enter user id" value="{{ $data['password'] }}" >
                     <input class="form-control" id="old_password" type="password" name="old_password" placeholder="Please enter old passsword" >
                  </div>
                  <div class="form-group">
                     <label class="form-label" for="new_password">New Password</label>
                     <input class="form-control" id="new_password" type="password" name="new_password" placeholder="Please enter new passsword"  >
                  </div>
                  <div class="form-group">
                     <label class="form-label" for="confirm_password">Confirm Password</label>
                     <input class="form-control" id="confirm_password" type="password" name="confirm_password" placeholder="Please enter confirm passsword"  >
                  </div>
                  <br>
                  <button class="btn btn-primary submitbtn" type="submit">Change Password</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Container-fluid Ends-->
@endsection
