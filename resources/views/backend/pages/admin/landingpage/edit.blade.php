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
            <form id="edit-question" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Question
                                <span class="text-danger">*</span></label>
                                <textarea name="question" placeholder="Please enter question"  class="form-control" >{{ $details[0]['question']}}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Answer 1
                                <span class="text-danger">*</span></label>
                                <input type="text" name="answer1" class="form-control" value="{{ $details[0]['answer1']}}" placeholder="Enter your answer 1" >
                                <input type="hidden" name="editId" class="form-control" value="{{ $details[0]['id']}}"  >
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Answer 2
                                <span class="text-danger">*</span></label>
                                <input type="text" name="answer2" class="form-control" value="{{ $details[0]['answer2']}}" placeholder="Enter your answer 2" >
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Answer 3
                                <span class="text-danger">*</span></label>
                                <input type="text" name="answer3" class="form-control" value="{{ $details[0]['answer3']}}" placeholder="Enter your answer 3" >
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Answer 4
                                <span class="text-danger">*</span></label>
                                <input type="text" name="answer4" class="form-control" value="{{ $details[0]['answer4']}}" placeholder="Enter your answer 4" >
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Status<span class="text-danger">*</span></label>
                                <div class="radio-inline" style="margin-top:10px">
                                    <label class="radio radio-lg radio-success" >
                                    <input type="radio" name="status" class="radio-btn" value="Y" {{ $details[0]['status'] == "Y" ? 'checked="checked"' : '' }}/>
                                    <span></span>Active</label>
                                    <label class="radio radio-lg radio-danger" >
                                    <input type="radio" name="status" class="radio-btn" value="N" {{ $details[0]['status'] == "N" ? 'checked="checked"' : '' }}/>
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
