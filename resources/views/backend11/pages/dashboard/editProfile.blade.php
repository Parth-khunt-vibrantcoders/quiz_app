@extends('backend.layout.layout')
@section('section')
@php
    if (!empty(Auth()->guard('admin')->user())) {
        $data = Auth()->guard('admin')->user();
    }
    // ccd($data);
@endphp
 <!-- Container-fluid starts-->
 <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">

          <div class="card-body">
            <form id="edit-profile" enctype="multipart/form-data" method="POST">
                @csrf

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label" for="first_name">First name</label>
                        <input class="form-control" id="editId" type="hidden" name="editId" placeholder="Please enter user id" value="{{ $data['id'] }}" >
                        <input class="form-control" id="first_name" type="text" name="first_name" placeholder="Please enter first name" value="{{ $data['first_name'] }}" >
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="last_name">Last name</label>
                        <input class="form-control" id="last_name" type="text" name="last_name" placeholder="Please enter last name" value="{{ $data['last_name'] }}" >
                    </div>
                </div>
                <br>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control" id="email" type="text" name="email" placeholder="Please enter first name" value="{{ $data['email']}}" >
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="profile_image">ProfileImage</label>
                        <input class="form-control" type="file" aria-label="file example" name="profile_image">
                    </div>
                </div>


                <br>
                <button class="btn btn-primary submitbtn" type="submit">Edit Save</button>

            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
  <!-- Container-fluid Ends-->
@endsection
