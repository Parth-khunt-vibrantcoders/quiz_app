@extends('backend.layouts.layout')
@section('section')


<div class="row">
    <div class="col-md-12">
        @csrf
        <!--begin::Card-->
        <div class="card card-custom gutter-b">
            <div class="card-header flex-wrap py-3">
                <div class="card-title">
                    <h3 class="card-label">{{ $header['title'] }}</h3>
                </div>


                <div class="card-toolbar">
                    <!--begin::Button-->
                    <a href="{{ route('admin-question-add') }}" class="btn btn-primary font-weight-bolder">
                        Add Question
                    </a>
                    <!--end::Button-->
                </div>


            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                <table class="table table-bordered table-checkable"  id="question-list">
                    <thead>
                        <tr>
                            <th>Sr. No</th>
                            <th>Quiz Type</th>
                            <th>Quiz Category</th>
                            <th>Quiz</th>
                            <th>Question</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                    </tbody>
                </table>
                <!--end: Datatable-->
            </div>
        </div>
        <!--end::Card-->
    </div>
</div>


@endsection
