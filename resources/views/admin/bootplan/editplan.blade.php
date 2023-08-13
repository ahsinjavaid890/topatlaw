@extends('admin.layouts.app')
@section('content')
<!-- Start Content-->
<div class="container-fluid">

    
  <!-- start page title -->
  <div class="row">
      <div class="col-12">
          <div class="page-title-box">
              <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                      <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                      <li class="breadcrumb-item active">Edit Boost Plan</li>
                  </ol>
              </div>
              <h4 class="page-title">Edit Boost Plan <b>{{ $data->plan_title }}</b></h4>
          </div>
      </div>
  </div>
  <!-- end page title -->
    @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session()->get('message') }}
        </div>
    @endif
  <div class="row">

      <div class="col-lg-6">
          <div class="card">
              <div class="card-body">
                  <h4 class="header-title">Plan Details</h4>
                  <form method="post" action="{{ url('updateplan') }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                     {{ csrf_field() }}
                     <input type="hidden" value="{{ $data->id }}" name="id">
                      <div class="form-group mb-3">
                          <label for="validationCustom01">Plan Tittle</label>
                          <input type="text" class="form-control" name="tittle" id="validationCustom01"
                              value="{{ $data->plan_title }}" required>
                          <div class="valid-feedback">
                              Looks good!
                          </div>
                      </div>
                         <div class="form-group mb-3">
                          <label for="validationCustom03">Plan Price ($)</label>
                          <input name="price" type="text" value="{{$data->plan_price}}" class="form-control" id="validation9"
                               required>
                          <div class="invalid-feedback">
                              Please attach image file.
                          </div>
                      </div>
                       <div class="form-group mb-3">
                          <label for="validationCustom01">Plan Days</label>
                          <input name="plan_days" type="text" value="{{$data->plan_type}}" class="form-control" id="validation9" required>
                          <div class="valid-feedback">
                              Looks good!
                          </div>
                      </div>
                      <div class="form-group mb-3">
                          <label for="validationCustom02">Short Description</label>
                          <textarea id="validationCustom02" name="description" class="form-control" placeholder="Enter Short Description" id="shortdescription" rows="2" required>{{ $data->plan_detail }}</textarea>
                          <div class="valid-feedback">
                              Looks good!
                          </div>
                      </div>
                      
                        <div class="form-group mb-3">
                          <label for="validationCustom01">Plan Feature</label>
                          <input name="plan_feature" type="text" value="{{$data->planfeature}}" class="form-control" id="validation9">
                          <div class="valid-feedback">
                              Looks good!
                          </div>
                      </div>
                       <div class="form-group mb-3">
                          <label for="validationCustom01">Plan Feature</label>
                          <input name="planfeature_1" type="text" value="{{$data->planfeature_1}}" class="form-control" id="validation9" >
                          <div class="valid-feedback">
                              Looks good!
                          </div>
                      </div>
                       <div class="form-group mb-3">
                          <label for="validationCustom01">Plan Feature</label>
                          <input name="planfeature_2" type="text" value="{{$data->planfeature_2}}" class="form-control" id="validation9" >
                          <div class="valid-feedback">
                              Looks good!
                          </div>
                      </div>
                       <div class="form-group mb-3">
                          <label for="validationCustom01">Plan Feature</label>
                          <input name="planfeature_3" type="text" value="{{$data->planfeature_3}}" class="form-control" id="validation9" >
                          <div class="valid-feedback">
                              Looks good!
                          </div>
                      </div>
                      <button class="btn btn-primary" type="submit">Update</button>
                  </form>   

              </div> <!-- end card-body-->
          </div> <!-- end card-->
      </div> <!-- end col-->


  </div>
  <!-- end row -->

</div> <!-- container -->
@endsection