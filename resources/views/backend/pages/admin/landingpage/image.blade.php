@extends('backend.layouts.layout')
@section('section')

<div class="row">
    <div class="col-md-12">
        <!--begin::Card-->
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">{{ $header['title'] }}</h3>
            </div>
            <!--begin::Form-->
            <form id="landing-page-image" enctype="multipart/form-data" method="POST">
                @csrf
                <input class="form-control" type="hidden" aria-label="file example" name="editId" value="{{ $details['id'] }}">
                <div class="card-body">

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Profile Image</label>
                            <div class="">
                                <div class="image-input image-input-outline" id="kt_image_1">
                                    <div class="image-input-wrapper my-avtar" style="background-image: url({{ asset('public/uploads/landingpages/'.$details['image'] )}})"></div>

                                    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change profile image">
                                        <i class="fas fa-pen icon-xs text-muted"></i>
                                        <input type="file" name="image" accept="image/*"  required />
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
