@extends('backend.layout.layout')
@section('section')

 <!-- Container-fluid starts-->
 <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">

          <div class="card-body">
            <form id="res-page-image" enctype="multipart/form-data" method="POST">
                @csrf
                <input class="form-control" type="hidden" aria-label="file example" name="editId" value="{{ $details['id'] }}">

                <div class="row g-3">
                    <div class="col-md-12">
                        <img src="{{ asset('public/uploads/resultpages/'.$details['image'] )}}" style="border:3px solid #337467; padding: 10px; width: 200px;height: 200px;" alt="result_page_background_image">
                        <br><br><label class="form-label" for="profile_image">Image</label>
                        <input class="form-control" type="file" aria-label="file example" name="image">
                    </div>
                </div>


                <br>
                <button class="btn btn-primary submitbtn" type="submit">Edit Save</button>

            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
  <!-- Container-fluid Ends-->
@endsection
