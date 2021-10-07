@extends('backend.layouts.layout')
@section('section')
@php
if (!empty(Auth()->guard('admin')->user())) {
    $data = Auth()->guard('admin')->user();
}
if(file_exists( public_path().'/uploads/userprofile/'.$data['userimage']) && $data['userimage'] != ''){
    $image = url("public/uploads/userprofile/".$data['userimage']);
}else{
    $image = url("public/uploads/userprofile/default.jpg");
}

@endphp

    <div class="row">
        <div class="col-md-12">
            <!--begin::Card-->
            <div class="card card-custom gutter-b example example-compact">
                <div class="card-header">
                    <h3 class="card-title">{{ $header['title'] }}</h3>
                </div>
                <!--begin::Form-->
                <form id="edit-profile" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>First name
                                <span class="text-danger">*</span></label>
                                {{-- <input class="form-control" id="editId" type="hidden" name="editId" placeholder="Please enter user id" value="{{ $data['id'] }}" > --}}
                                {{-- <input type="text" name="first_name" placeholder="Please enter first name" value="{{ $data['first_name'] }}" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" /> --}}
                                <input type="text" name="first_name" class="form-control" placeholder="Enter your first name" value="{{ $data['first_name'] }}">

                                <input type="hidden" name="editId" class="form-control" value="{{ $data['id'] }}">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Last Name
                                <span class="text-danger">*</span></label>
                                <input type="text" name="last_name" class="form-control" placeholder="Enter your last name" value="{{ $data['last_name'] }}">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Email
                                <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" placeholder="Enter your email" value="{{ $data['email'] }}">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Profile Image</label>
                                <div class="">
                                    <div class="image-input image-input-outline" id="kt_image_1">
                                        <div class="image-input-wrapper my-avtar" style="background-image: url({{ $image }})"></div>

                                        <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change profile image">
                                            <i class="fas fa-pen icon-xs text-muted"></i>
                                            <input type="file" name="userimage" accept=".png, .jpg, .jpeg" />
                                            <input type="hidden" name="profile_avatar_remove" />
                                        </label>
                                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel profile image">
                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                        </span>
                                    </div>
                                    <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary mr-2 submitbtn">Save Change</button>
                        <button type="reset" class="btn btn-secondary">Cancel</button>
                    </div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Card-->

        </div>

    </div>

@endsection
