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
            <form id="edit-quiz-type" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Quiz Type
                                <span class="text-danger">*</span></label>
                                <input type="hidden" name="editId" class="form-control" placeholder="Enter editId" value="{{ $quiz_type_details[0]['id'] }}">
                                <input type="text" name="quiz_type" class="form-control" placeholder="Enter Quiz type" value="{{ $quiz_type_details[0]['name'] }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Quiz priority
                                <span class="text-danger">*</span></label>
                                <input type="text" name="quiz_priority" class="form-control onlyNumber" placeholder="Enter quiz priority" value="{{ $quiz_type_details[0]['priority'] }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Country<span class="text-danger">*</span></label>
                                <div class="radio-inline" style="margin-top:10px">
                                    <label class="radio radio-lg radio-success" >
                                    <input type="radio" name="country" class="radio-btn" value="usa" {{ $quiz_type_details[0]['country'] == 'usa' ? 'checked="checked"': ''}} />
                                    <span></span>USA</label>
                                    <label class="radio radio-lg radio-success" >
                                    <input type="radio" name="country" class="radio-btn" value="other" {{ $quiz_type_details[0]['country'] == 'other' ? 'checked="checked"': ''}}/>
                                    <span></span>Other</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status<span class="text-danger">*</span></label>
                                <div class="radio-inline" style="margin-top:10px">
                                    <label class="radio radio-lg radio-success" >
                                    <input type="radio" name="status" class="radio-btn" value="Y" {{ $quiz_type_details[0]['status'] == 'Y' ? 'checked="checked"': ''}}/>
                                    <span></span>Active</label>
                                    <label class="radio radio-lg radio-danger" >
                                    <input type="radio" name="status" class="radio-btn" value="N" {{ $quiz_type_details[0]['status'] == 'N' ? 'checked="checked"': ''}}/>
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

