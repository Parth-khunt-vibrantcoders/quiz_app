@extends('backend.layouts.layout')
@section('section')
@php
if (!empty(Auth()->guard('admin')->user())) {
    $data = Auth()->guard('admin')->user();
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
                <form id="change-password" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Old Password
                                <span class="text-danger">*</span></label>
                                <input class="form-control" id="editId" type="hidden" name="editId" placeholder="Please enter user id" value="{{ $data['id'] }}" >
                                <input class="form-control" id="db_password" type="hidden" name="db_password" placeholder="Please enter user id" value="{{ $data['password'] }}" >
                                <input type="password" name="old_password" id="old_password" class="form-control" placeholder="Please enter old passsword">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>New Password
                                <span class="text-danger">*</span></label>
                                <input id="new_password" type="password" name="new_password" placeholder="Please enter new passsword"   class="form-control" >
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Email
                                <span class="text-danger">*</span></label>
                                <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Please enter confirm passsword">
                            </div>
                        </div>



                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary mr-2 submitbtn">Save Changes</button>
                        <button type="reset" class="btn btn-secondary">Cancel</button>
                    </div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Card-->

        </div>

    </div>

@endsection
