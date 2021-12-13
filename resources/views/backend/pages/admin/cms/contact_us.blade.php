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
            <form id="contact-us" enctype="multipart/form-data" method="POST">
                @csrf
                <input class="form-control" type="hidden" aria-label="file example" name="editId" value="{{ $details[0]['id'] }}">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Contact Us
                                <span class="text-danger">*</span></label>
                                <textarea name="content" class="form-control" placeholder="Enter quiz rules" >{{ $details[0]['text'] }}</textarea>
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
