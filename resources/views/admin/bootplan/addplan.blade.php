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
                      <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                      <li class="breadcrumb-item"><a href="users.html">Users</a></li>
                      <li class="breadcrumb-item active">Add User</li>
                  </ol>
              </div>
              <h4 class="page-title">Add New BoostPlan</h4>
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
    @if ($errors->any())
      <div class="alert alert-danger alert-dismissible">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
  <div class="row">

      <div class="col-lg-6">
          <div class="card">
              <div class="card-body">
                  <h4 class="header-title">Plan Details</h4>
                  <form method="post" action="{{ url('createplan') }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                     {{ csrf_field() }}
                      <div class="form-group mb-3">
                          <label for="validationCustom01">Plan Title</label>
                          <input type="text" class="form-control" name="tittle" id="validationCustom01"
                              placeholder="Tittle" required>
                          <div class="valid-feedback">
                              Looks good!
                          </div>
                      </div>
                          <div class="form-group mb-3">
                          <label for="validationCustom03">Plan Price ($)</label>
                          <input name="price" type="text"  class="form-control" id="validation9"
                               required>
                          <div class="invalid-feedback">
                              Please attach image file.
                          </div>
                      </div>
                       <div class="form-group mb-3">
                          <label for="validationCustom01">Plan Days</label>
                          <input name="plan_days" type="text"  class="form-control" id="validation9" required>
                          <div class="valid-feedback">
                              Looks good!
                          </div>
                      </div>
                      <div class="form-group mb-3">
                          <label for="validationCustom02">Short Description</label>
                          <textarea id="validationCustom02" name="description" class="form-control" placeholder="Enter Short Description" id="shortdescription" required></textarea>
                          <div class="valid-feedback">
                              Looks good!
                          </div>
                      </div>
                      
                            <div class="form-group mb-3">
                          <label for="validationCustom01">Plan Feature</label>
                          <input name="plan_feature" type="text" value="" class="form-control" id="validation9">
                          <div class="valid-feedback">
                              Looks good!
                          </div>
                      </div>
                       <div class="form-group mb-3">
                          <label for="validationCustom01">Plan Feature</label>
                          <input name="planfeature_1" type="text" value="" class="form-control" id="validation9" >
                          <div class="valid-feedback">
                              Looks good!
                          </div>
                      </div>
                       <div class="form-group mb-3">
                          <label for="validationCustom01">Plan Feature</label>
                          <input name="planfeature_2" type="text" value="" class="form-control" id="validation9" >
                          <div class="valid-feedback">
                              Looks good!
                          </div>
                      </div>
                       <div class="form-group mb-3">
                          <label for="validationCustom01">Plan Feature</label>
                          <input name="planfeature_3" type="text" value="" class="form-control" id="validation9" >
                          <div class="valid-feedback">
                              Looks good!
                          </div>
                      </div>

                 
                      <button class="btn btn-primary" type="submit">Submit Now</button>
                  </form>   

              </div> <!-- end card-body-->
          </div> <!-- end card-->
      </div> <!-- end col-->

  </div>
  <!-- end row -->

</div> <!-- container -->
@endsection