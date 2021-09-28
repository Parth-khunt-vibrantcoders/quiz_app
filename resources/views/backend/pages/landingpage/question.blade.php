@extends('backend.layout.layout')
@section('section')

 <!-- Container-fluid starts-->
 <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">

          <div class="card-body">
            <form id="landing-page-question" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-12">

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
