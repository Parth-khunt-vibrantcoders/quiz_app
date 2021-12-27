@extends('backend.layouts.layout')
@section('section')

<!--begin::Row-->
<div class="row">
    <div class="col-lg-12 col-xxl-12">
        <div class="card card-custom gutter-b">

            <div class="card-body">
                <!--begin::Body-->
                <div class="card-body p-0 position-relative overflow-hidden">
                    <!--begin::Chart-->
                    <div id="" class="card-rounded-bottom bg-danger" style="height: 100px"></div>
                    <!--end::Chart-->
                    <!--begin::Stats-->
                    <div class="card-spacer mt-n25">
                        <!--begin::Row-->
                        <div class="row m-0">
                            <div class="col-md-3">
                                <div class="col bg-light-info px-6 py-8 rounded-xl mr-7 mb-7">
                                    <span class="svg-icon svg-icon-3x svg-icon-info d-block my-2">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <span class="text-info font-weight-bold font-size-h6">No of Users</span><br>
                                    <span class="text-info font-weight-bold font-size-h6">{{ number_format($users_list) }}</span>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="col bg-light-danger px-6 py-8 rounded-xl mr-7 mb-7">
                                    <span class="svg-icon svg-icon-3x svg-icon-danger d-block my-2">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->

                                            <i class="fab fa-adversal fa-2x text-danger" aria-hidden="true"></i>

                                        <!--end::Svg Icon-->
                                    </span>
                                    <a href="#" class="text-danger font-weight-bold font-size-h6">No Of Adsense</a><br>
                                    <span class="text-danger font-weight-bold font-size-h6">{{ number_format($adsense_list) }}</span>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="col bg-light-warning px-6 py-8 rounded-xl mr-7 mb-7">
                                    <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                                                <path d="M12,16 C12.5522847,16 13,16.4477153 13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 C11,16.4477153 11.4477153,16 12,16 Z M10.591,14.868 L10.591,13.209 L11.851,13.209 C13.447,13.209 14.602,11.991 14.602,10.395 C14.602,8.799 13.447,7.581 11.851,7.581 C10.234,7.581 9.121,8.799 9.121,10.395 L7.336,10.395 C7.336,7.875 9.31,5.922 11.851,5.922 C14.392,5.922 16.387,7.875 16.387,10.395 C16.387,12.915 14.392,14.868 11.851,14.868 L10.591,14.868 Z" fill="#000000"/>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <a href="#" class="text-warning font-weight-bold font-size-h6">No Of Quiz</a><br>
                                    <a href="#" class="text-warning font-weight-bold font-size-h6">{{ number_format($quiz_list) }}</a>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="col bg-light-success px-6 py-8 rounded-xl mr-7 mb-7">
                                    <span class="svg-icon svg-icon-3x svg-icon-success d-block my-2">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
                                        <i class="fab fa-quora text-success fa-2x"></i>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <span class="text-success font-weight-bold font-size-h6">No Of Question</span><br>
                                    <span class="text-success font-weight-bold font-size-h6">{{ number_format($question_list) }}</span>
                                </div>
                            </div>
                        </div>
                        <!--end::Row-->

                    </div>
                    <!--end::Stats-->
                </div>
                <!--end::Body-->
            </div>
        </div>
    </div>

</div>
<!--end::Row-->



 <!--begin::Card-->
 <div class="card card-custom gutter-b">
    <div class="card-header flex-wrap py-3">
        <div class="card-title">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">Sales Summary Month Wise</span>
            </h3>
        </div>
    </div>
    <div class="card-body">
        <div class="row">

            <div class="col-md-3">
                <div class="form-group">
                    <label>Date</label>
                    <input class="form-control date" name="date" value="{{ isset($date) ? $date: date('d-M-Y') }}" type="text" placeholder="select date" id="datepicker_date" autocomplete="off"/>
                </div>
            </div>

            <div class="col-md-3">
                <label>&nbsp;</label>
                <div class="form-group">
                    <a class="btn btn-icon btn-primary search-btn" id="get_data">
                        <i class="flaticon-search"></i>
                    </a>

                    <a href="{{ route('my-dashboard') }}" class="btn btn-icon btn-danger clearSearch" id="clearSearch">
                        <i class="flaticon-cancel"></i>
                    </a>

                </div>

            </div>
        </div>
    </div>
    <div class="card-body">
        @csrf
        <!--begin: Datatable-->
        <table class="table table-bordered table-checkable" id="date-report">
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



@endsection
