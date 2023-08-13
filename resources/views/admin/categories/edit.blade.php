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
                      <li class="breadcrumb-item active">Edit Category</li>
                  </ol>
              </div>
              <h4 class="page-title">Edit Category <b>{{ $data->tittle }}</b></h4>
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
                  <h4 class="header-title">Category Details</h4>
                  <form method="post" action="{{ url('updatecategory') }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                     {{ csrf_field() }}
                     <input type="hidden" value="{{ $data->id }}" name="id">
                      <div class="form-group mb-3">
                          <label for="validationCustom01">Category Tittle</label>
                          <input type="text" class="form-control" name="tittle" id="validationCustom01"
                              value="{{ $data->tittle }}" required>
                          <div class="valid-feedback">
                              Looks good!
                          </div>
                      </div>
                      <div class="form-group mb-3">
                          <label for="validationCustom02">Short Description</label>
                          <textarea id="validationCustom02" name="description" class="form-control" placeholder="Enter Short Description" id="shortdescription" rows="10" required>{{ $data->description }}</textarea>
                          <div class="valid-feedback">
                              Looks good!
                          </div>
                      </div>
                      <button class="btn btn-primary" type="submit">Update Category</button>
                  </form>   

              </div> <!-- end card-body-->
          </div> <!-- end card-->
      </div> <!-- end col-->
      <div class="col-lg-6">
          <div class="card">
              <div class="card-body">
                  <h4 class="header-title">Category Tumbnail Image</h4>
                  <div class="row">
                      <div class="col-lg-6 col-md-12">
                          <form method="post" action="{{ url('updatecategorythumbnail') }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                             {{ csrf_field() }}
                             <input type="hidden" value="{{ $data->id }}" name="id">
                              <div class="form-group mb-3">
                                  <label for="validationCustom03">Thumbnail Image</label>
                                  <input style="height: 45px;" name="thumbnailimage" type="file" class="form-control" id="validationCustom09"
                                       required>
                                  <div class="invalid-feedback">
                                      Please attach image file.
                                  </div>
                              </div>
                              <button class="btn btn-primary" type="submit">Update Category Thumbnail</button>
                          </form> 
                      </div>
                      <div class="col-lg-6 col-md-6">
                          <div style="width: 100%;height: 200px;border: 1px solid #DDD"> <img style="width: 100%;height: 100%;" src="{{ url('public/images/') }}/{{$data->thumbnail}}"> </div>
                      </div>
                  </div>
                    

              </div> <!-- end card-body-->
          </div> <!-- end card-->
      </div> <!-- end col-->

  </div>
  <!-- end row -->

</div> <!-- container -->
@endsection