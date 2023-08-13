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
                      <li class="breadcrumb-item active">Add City</li>
                  </ol>
              </div>
              <h4 class="page-title">Add New City</h4>
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
                  <h4 class="header-title">City Details</h4>
                  <form method="post" action="{{ url('createcity') }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                     {{ csrf_field() }}
                     <div class="form-group mb-3">
                          <label for="validationCustom01">Select Service</label>
                          <select class="form-control" name="serviceid" required="">
                              <option value="">Select Service</option>
                              <?php foreach(DB::table('categories')->where('status' , 1)->get() as $r){ ?>
                                <option value="{{ $r->id }}">{{ $r->tittle }}</option>
                              <?php }  ?>
                          </select>
                          <div class="valid-feedback">
                              Looks good!
                          </div>
                      </div>
                      <div class="form-group mb-3">
                          <label for="validationCustom01">City Tittle</label>
                          <input type="text" class="form-control" name="tittle" id="validationCustom01"
                              placeholder="City Tittle" required>
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

                      <!-- <div class="form-group mb-3">
                          <label for="validationCustom03">Thumbnail Image</label>
                          <input style="height: 45px;" name="thumbnailimage" type="file" class="form-control" id="validationCustom09"
                               required>
                          <div class="invalid-feedback">
                              Please attach image file.
                          </div>
                      </div> -->
                      <button class="btn btn-primary" type="submit">Submit Now</button>
                  </form>   

              </div> <!-- end card-body-->
          </div> <!-- end card-->
      </div> <!-- end col-->

  </div>
  <!-- end row -->

</div> <!-- container -->
@endsection