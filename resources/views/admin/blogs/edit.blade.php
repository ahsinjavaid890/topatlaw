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
                      <li class="breadcrumb-item active">Edit Blog</li>
                  </ol>
              </div>
              <h4 class="page-title">Edit Blog {{ $data->tittle }}</h4>
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
                  <h4 class="header-title">Blog Details</h4>
                  <form method="post" action="{{ url('updateblog') }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                     {{ csrf_field() }}
                     <input type="hidden" value="{{ $data->id }}" name="id">
                      <div class="form-group mb-3">
                          <label for="validationCustom01">Blog Tittle</label>
                          <input type="text" class="form-control" name="tittle" id="validationCustom01"
                              placeholder="Blog Tittle" value="{{ $data->tittle }}" required>
                          <div class="valid-feedback">
                              Looks good!
                          </div>
                      </div>

                      <div class="form-group mb-3">
                          <label for="validationCustom02">Short Description</label>
                          <textarea id="validationCustom02" name="blogshortdescription" class="form-control" placeholder="Enter Short Description" id="shortdescription" required>{{ $data->shortdescription }}</textarea>
                          <div class="valid-feedback">
                              Looks good!
                          </div>
                      </div>
                      <div class="form-group mb-3">
                          <label for="validationCustom01">Blog Date</label>
                          <input type="date" class="form-control" value="{{ $data->blogdate }}" name="blogdate" id="validationCustom01"
                              placeholder="City Tittle" required>
                          <div class="valid-feedback">
                              Looks good!
                          </div>
                      </div>
                      <div class="form-group mb-3">
                          <label for="validationCustom03">Blog</label>
                          <textarea name="blog" >{{ $data->description }}</textarea>
                          <script>
                                  CKEDITOR.replace( 'blog' );
                          </script>
                      </div>
                      <button class="btn btn-primary" type="submit">Update Blog</button>
                  </form>   

              </div> <!-- end card-body-->
          </div> <!-- end card-->
      </div> <!-- end col-->
      <div class="col-lg-3">
            <div class="card">
              <div class="card-body">
                  <h4 class="header-title">Blog Image</h4>
                  <form method="post" action="{{ url('updateblogimage') }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                     {{ csrf_field() }}
                     <input type="hidden" value="{{ $data->id }}" name="id">
                      <div class="form-group mb-3">
                          <label for="validationCustom01">Blog Image</label>
                          <input  required=""  class="form-control" type="file" style="height: 45px;" name="image" required="">
                          <div class="valid-feedback">
                              Looks good!
                          </div>
                      </div>
                      <button class="btn btn-primary" type="submit">Update Blog Image</button>
                  </form>   
              </div> <!-- end card-body-->
          </div> <!-- end card-->
      </div>

  </div>
  <!-- end row -->

</div> <!-- container -->
@endsection