@extends('backend.layouts.layout')
@section('section')


<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-fluid">

        <!--begin::Basic info-->
        <div class="card mb-5 mb-xl-10">
            <!--begin::Card header-->
            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                <!--begin::Card title-->
                <div class="card-title m-0">
                    <span class="card-label fw-bolder fs-3 mb-1">Adsense users-list</span>
                </div>
                <!--end::Card title-->
                <!--begin::Card title-->

                <div class="card-title m-0" style="text-align: right">
                    <a href="{{ route('users-management-add') }}">
                        <button class="btn btn-danger">
                            <i class="fas fa-plus-circle"></i>Add New User
                        </button>
                    </a>
                </div>
                <!--end::Card title-->


            </div>

            <!--begin::Body-->
            <div class="card-body py-3">
                <!--begin::Table container-->
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3" id="adsense-users-list">
                        <!--begin::Table head-->@csrf
                        <thead>
                            <tr class="fw-bolder text-muted">
                                <th>Sr. No</th>
                                <th>User Image</th>
                                <th>Unique Id</th>
                                <th>Name</th>
                                <th>Ph. No</th>
                                <th>Pan Number</th>
                                <th>DOJ</th>
                                <th>Active</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody>

                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Table container-->
            </div>
            <!--begin::Body-->
        </div>

    </div>
    <!--end::Container-->
</div>
<!--end::Post-->


@endsection
