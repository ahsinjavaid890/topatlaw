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
                      <li class="breadcrumb-item active">User Profile</li>
                  </ol>
              </div>
              <h4 class="page-title">User Profile</h4>
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
        <div class="col-xl-4 col-lg-5">
            <div class="card text-center">
                <div class="card-body">
                    <h4 class="mb-0 mt-2">{{Auth::user()->name}}</h4>

                    <h4 class="mb-0 mt-2">{{Auth::user()->email}}</h4>
                </div> <!-- end card-body -->
            </div> <!-- end card -->

            <!-- Messages-->
        </div> <!-- end col-->
        <div class="col-xl-4 col-lg-5">
            <div class="card text-center">
                <div class="card-body">
                    <form method="POST" action="{{ url('updateprofile') }}">
                        {{ csrf_field() }}
                      <div class="form-group">
                        <label>Update Name</label>
                        <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}">
                      </div>
                      <div class="form-group">
                        <label>Update Email</label>
                        <input type="text" class="form-control" name="email" value="{{Auth::user()->email}}">
                      </div>
                      <div class="form-group">
                        <label>Update Country</label>
                        <input type="text" class="form-control" name="country" value="{{Auth::user()->country}}">
                      </div>
                      <div class="form-group">
                        <label>Update Contact Number</label>
                        <input type="text" class="form-control" name="phone" value="{{Auth::user()->phonenumber}}">
                      </div>
                      <div class="form-group">
                        <input type="submit" class="btn btn-primary">
                      </div>
                    </form>
                </div> <!-- end card-body -->
            </div>
              
        </div>
        <div class="col-xl-4 col-lg-5">
            <div class="card text-center">
                <div class="card-body">
                    <form method="POST" action="{{ url('updatepassword') }}">
                        {{ csrf_field() }}
                      <div class="form-group">
                        <label>Update password</label>
                        <input type="password" class="form-control" name="password">
                      </div>
                      <div class="form-group">
                        <input type="submit" class="btn btn-primary">
                      </div>
                    </form>
                </div> <!-- end card-body -->
            </div>
              
        </div>
    </div>

</div> <!-- container -->
@endsection