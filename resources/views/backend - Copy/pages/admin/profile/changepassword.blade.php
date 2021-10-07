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


<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-adsense">

        <!--begin::Basic info-->
        <div class="card mb-5 mb-xl-10">
            <!--begin::Card header-->
            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                <!--begin::Card title-->
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0">Change Password</h3>
                </div>
                <!--end::Card title-->
            </div>
            <!--begin::Card header-->
            <!--begin::Content-->
            <div id="kt_account_profile_details" class="collapse show">
                <!--begin::Form-->
                <form id="change-password" enctype="multipart/form-data" method="POST">
                    @csrf
                    <!--begin::Card body-->
                    <div class="card-body border-top p-9">

                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-3 col-form-label required fw-bold fs-6">Old Password</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-9">
                                <!--begin::Row-->
                                <div class="row">
                                    <!--begin::Col-->
                                    <div class="col-lg-12 fv-row">
                                       <input class="form-control" id="editId" type="hidden" name="editId" placeholder="Please enter user id" value="{{ $data['id'] }}" >
                                        <input class="form-control" id="db_password" type="hidden" name="db_password" placeholder="Please enter user id" value="{{ $data['password'] }}" >
                                        <input id="old_password" type="password" name="old_password" placeholder="Please enter old passsword" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" />
                                    </div>
                                    <!--end::Col-->

                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-3 col-form-label required fw-bold fs-6">New Password</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-9 fv-row">
                                <input  class="form-control form-control-lg form-control-solid" id="new_password" type="password" name="new_password" placeholder="Please enter new passsword" />
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-3 col-form-label required fw-bold fs-6">Confirm Password</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-9 fv-row">
                                <input class="form-control form-control-lg form-control-solid" id="confirm_password" type="password" name="confirm_password" placeholder="Please enter confirm passsword" />
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->


                    </div>
                    <!--end::Card body-->
                    <!--begin::Actions-->
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                        <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save Changes</button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Content-->
        </div>

    </div>
    <!--end::Container-->
</div>
<!--end::Post-->

@endsection
