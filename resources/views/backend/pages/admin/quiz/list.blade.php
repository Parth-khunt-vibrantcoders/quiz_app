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
                    <a href="{{ route('admin-quiz-add') }}" class="btn btn-primary font-weight-bolder">
                        Add Quiz
                    </a>
                    <!--end::Button-->
                </div>


            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                <table class="table table-bordered table-checkable"  id="quiz-master">
                    <thead>
                        <tr>
                            <th>Sr. No</th>
                            <th>Quiz Type</th>
                            <th>Quiz Category</th>
                            <th>Quiz Name</th>
                            <th>Entry Fee</th>
                            <th>Wining Prize</th>
                            <th>Announcement Time</th>
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