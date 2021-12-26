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
                    <a href="{{ route('users-management-add') }}" class="btn btn-primary font-weight-bolder">
                        Add New User
                    </a>
                    <!--end::Button-->
                </div>


            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                <table class="table table-bordered table-checkable"  id="adsense-users-list">
                    <thead>
                        <tr>
                            <th>Sr. No</th>
                            <th>User Image</th>
                            <th>U.Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Ph. No</th>
                            <th>DOJ</th>
                            <th>Active Users</th>
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
