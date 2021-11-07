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
            <form id="add-question" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12">
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

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Quiz Category
                                <span class="text-danger">*</span></label>
                                <select class="form-control select2" id="quiz_category"  name="quiz_category">
                                    <option value="">Select quiz category</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Quiz
                                <span class="text-danger">*</span></label>
                                <select class="form-control select2" id="quiz_select" name="quiz">
                                    <option value="">Select quiz</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">

                                <div class="form-group">
                                    <label>Upload Excel File<span class="text-danger">*</span></label>
                                    <div></div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="file" id="customFile" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"/>
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
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
