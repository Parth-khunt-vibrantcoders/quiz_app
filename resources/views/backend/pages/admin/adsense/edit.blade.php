@extends('backend.layouts.layout')
@section('section')
@php
    if(file_exists( public_path().'/uploads/adsense/'.$details[0]['image']) && $details[0]['image'] != ''){
        $image = url("public/uploads/adsense/".$details[0]['image']);
    }else{
        $image = url("public/uploads/adsense/default.jpg");
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
            <form id="edit-adsense" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Unique Id
                                <span class="text-danger">*</span></label>
                                <input type="hidden" name="editId" placeholder="Please enter first name" value="{{ $details[0]['id'] }}" class="form-control"  >
                                <input type="text" disabled placeholder="Please enter unique id" value="{{ $details[0]['uniqe_id'] }}" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>First name
                                <span class="text-danger">*</span></label>
                                <input type="text" name="first_name" placeholder="Please enter first name" value="{{ $details[0]['first_name'] }}" class="form-control"  >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Last name
                                <span class="text-danger">*</span></label>
                                <input type="text" name="last_name" placeholder="Please enter last name"  value="{{ $details[0]['last_name'] }}" class="form-control"  >
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email
                                <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" value="{{ $details[0]['email'] }}" placeholder="Enter your email" >
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Mobile Number
                                <span class="text-danger">*</span></label>
                                <input type="text" name="mo_no" placeholder="Please enter mobile number"  value="{{ $details[0]['phone_number'] }}" class="form-control onlyNumber"  >
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Note
                                <span class="text-danger">*</span></label>
                                <textarea  rows="2" class="form-control" placeholder="Please enter note" name="note" >{{ $details[0]['note'] }}</textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Adseanse Script
                                <span class="text-danger">*</span></label>
                                <textarea  rows="2" class="form-control"name="adseanse_script" placeholder="Please enter adseanse Script" >{{ $details[0]['script'] }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status<span class="text-danger">*</span></label>
                                <div class="radio-inline" style="margin-top:10px">
                                    <label class="radio radio-lg radio-success" >
                                    <input type="radio" name="status" class="radio-btn" value="Y" {{ $details[0]['is_active'] == "Y" ? 'checked="checked"' : '' }}/>
                                    <span></span>Active</label>
                                    <label class="radio radio-lg radio-danger" >
                                    <input type="radio" name="status" class="radio-btn" value="N" {{ $details[0]['is_active'] == "N" ? 'checked="checked"' : '' }}/>
                                    <span></span>Inactive</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Profile Image</label>
                                <div class="">
                                    <div class="image-input image-input-outline" id="kt_image_1">
                                        <div class="image-input-wrapper my-avtar" style="background-image: url({{ $image }})"></div>

                                        <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change profile image">
                                            <i class="fas fa-pen icon-xs text-muted"></i>
                                            <input type="file" name="profile_image" accept=".png, .jpg, .jpeg" />
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