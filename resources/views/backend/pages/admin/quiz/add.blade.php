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
            <form id="add-quiz" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3"></div>

                        <div class="col-md-6 text-center">
                            <div class="form-group">
                                <label class="">Profile Image</label>
                                <div class="text-center">
                                    <div class="image-input image-input-outline" id="kt_image_1">
                                        <div class="image-input-wrapper my-avtar" style="background-image: url({{ asset('public/uploads/quiz/no-image.png') }})"></div>

                                        <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change profile image">
                                            <i class="fas fa-pen icon-xs text-muted"></i>
                                            <input type="file" name="image" class="file-input" accept="image/*"  required />
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

                        <div class="col-md-3"></div>
                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Quiz Type
                                <span class="text-danger">*</span></label>

                                <select class="form-control select2" id="quiz_type"  name="quiz_type">
                                    <option value="">Select your quiz type</option>

                                     @foreach ($quiz_type as $key => $value)
                                         <option value="{{ $value['id'] }}" >{{ $value['name'] }}</option>
                                     @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Quiz Category
                                <span class="text-danger">*</span></label>
                                <select class="form-control select2" id="quiz_category"  name="quiz_category">
                                    <option value="">Select quiz category</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Quiz name
                                <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" placeholder="Enter quiz name" >
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Quiz Entry Fee
                                <span class="text-danger">*</span></label>
                                <input type="text" name="fee" class="form-control onlyNumber" placeholder="Enter quiz Fee" >
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Quiz Prize
                                <span class="text-danger">*</span></label>
                                <input type="text" name="prize" class="form-control onlyNumber" placeholder="Enter quiz prize" >
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Quiz Winner Announcement
                                <span class="text-danger">*</span></label>
                                <input class="form-control" name="time" id="time" readonly="readonly" placeholder="Select winner announcement time" type="text" />
                            </div>
                        </div>
                    </div>

                    <div class="row/">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status<span class="text-danger">*</span></label>
                                <div class="radio-inline" style="margin-top:10px">
                                    <label class="radio radio-lg radio-success" >
                                    <input type="radio" name="status" class="radio-btn" value="Y" checked="checked"/>
                                    <span></span>Active</label>
                                    <label class="radio radio-lg radio-danger" >
                                    <input type="radio" name="status" class="radio-btn" value="N"/>
                                    <span></span>Inactive</label>
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

