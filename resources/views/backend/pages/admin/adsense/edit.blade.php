@extends('backend.layouts.layout')
@section('section')
@php
    if(file_exists( public_path().'/uploads/adsense/'.$details[0]['image']) && $details[0]['image'] != ''){
        $image = url("public/uploads/adsense/".$details[0]['image']);
    }else{
        $image = url("public/uploads/adsense/default.jpg");
    }
@endphp
<div class="post d-flex flex-column-fluid" id="kt_post">
   <div id="kt_content_container" class="container-fluid">
      <div class="card mb-5 mb-xl-10">
         <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
            <div class="card-title m-0">
               <h3 class="fw-bolder m-0">{{ $header['title']}}</h3>
            </div>
         </div>
         <div id="kt_account_profile_details" class="collapse show">
            <form id="edit-adsense" enctype="multipart/form-data" method="POST">
               @csrf
               <div class="card-body border-top p-9">
                  <div class="row mb-6">
                     <label class="col-lg-3 col-form-label fw-bold fs-6">Profile Image</label>
                     <div class="col-lg-9">
                        <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url({{ asset('public/backend/assets/media/avatars/blank.png') }})">
                           <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ $image }})"></div>
                           <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                           <i class="bi bi-pencil-fill fs-7"></i>
                           <input type="file" name="profile_image" accept=".png, .jpg, .jpeg" />
                           <input type="hidden" name="avatar_remove" />
                           </label>
                           <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                           <i class="bi bi-x fs-2"></i>
                           </span>
                           <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                           <i class="bi bi-x fs-2"></i>
                           </span>
                        </div>
                        <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                     </div>
                  </div>
                  <div class="row mb-6">
                     <label class="col-lg-3 col-form-label required fw-bold fs-6">Name</label>
                     <div class="col-lg-9">
                        <div class="row">
                           <div class="col-lg-12 fv-row">
                              <input type="text" value="{{ $details[0]['name'] }}" name="name" placeholder="Please enter name"  class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" />
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row mb-6">
                     <label class="col-lg-3 col-form-label required fw-bold fs-6">Mobile Number</label>
                     <div class="col-lg-9 fv-row">
                        <input type="text" value="{{ $details[0]['phone_number'] }}"  class="form-control form-control-lg form-control-solid" name="mo_no" placeholder="Please enter mobile number"  />
                     </div>
                  </div>
                  <div class="row mb-6">
                     <label class="col-lg-3 col-form-label required fw-bold fs-6">Pan Number</label>
                     <div class="col-lg-9 fv-row">
                        <input type="text" value="{{ $details[0]['pan_number'] }}"  class="form-control form-control-lg form-control-solid" name="pan_no" placeholder="Please enter pan number"  />
                        <input type="hidden" value="{{ $details[0]['id'] }}"  class="form-control form-control-lg form-control-solid" name="editid" placeholder="Please enter pan number"  />
                     </div>
                  </div>
                  <div class="row mb-6">
                     <label class="col-lg-3 col-form-label required fw-bold fs-6">Date of Joining</label>
                     <div class="col-lg-9 fv-row">
                        <input type="date" id="datepicker_date1" value="{{ $details[0]['doj'] }}"   class="form-control form-control-lg form-control-solid" name="doj" placeholder="Please enter date of joining"  />
                     </div>
                  </div>
                  <div class="row mb-6">
                     <label class="col-lg-3 col-form-label required fw-bold fs-6">Adseanse Script</label>
                     <div class="col-lg-9 fv-row">
                        <textarea  rows="4" class="form-control form-control-lg form-control-solid" name="adseanse_script" placeholder="Please enter adseanse Script">{{ $details[0]['script'] }}</textarea>
                     </div>
                  </div>
                  <div class="row mb-6">
                     <label class="col-lg-3 col-form-label  fw-bold fs-6">Note</label>
                     <div class="col-lg-9 fv-row">
                        <textarea  rows="4" class="form-control form-control-lg form-control-solid" placeholder="Please enter note" name="note">{{ $details[0]['note'] }}</textarea>
                     </div>
                  </div>
               </div>

               <div class="card-footer d-flex justify-content-end py-6 px-9">
                  <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                  <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save Changes</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection
