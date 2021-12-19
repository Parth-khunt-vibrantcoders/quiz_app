@extends('backend.layouts.layout')
@section('section')



<div class="row">
    <div class="col-md-12">
        @csrf
        <!--begin::Card-->
        <div class="card card-custom gutter-b">

            <div class="card-body">
                <!--begin: Datatable-->
                <table class="table table-bordered table-checkable"  id="adsense-users-list">
                    <thead>
                        <tr>
                            <th>Sr. No</th>
                            <th>User Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>No of Users</th>
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
