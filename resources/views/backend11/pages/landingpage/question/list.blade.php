@extends('backend.layout.layout')
@section('section')

 <!-- Container-fluid starts-->
 <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div>
                    {{-- <h4>HTML (DOM) sourced data</h4> --}}
                    <a href="{{ route('landing-page-question-add') }}" class="btn btn-primary" type="button" style="float: right">Add Question</a>
                    <br><br>
                </div>

                <div class="table-responsive">
                    <table border="1" class="display" id="question-answer" style="width:100%">
                        @csrf
                        <thead>
                            <tr>
                            <th>Sr. No</th>
                            <th>Question</th>
                            <th>Action</th>
                            </tr>
                        </thead>


                    </table>
                </div>

            </div>
        </div>

      </div>
    </div>
  </div>
  <!-- Container-fluid Ends-->
@endsection
