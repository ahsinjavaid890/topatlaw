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
                      <li class="breadcrumb-item active">All Categories</li>
                  </ol>
              </div>
              <h4 class="page-title">All Categories</h4>
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
      <div class="col-lg-12">
          <div class="card">
              <div class="card-body">
                <table id="basic-datatable" class="table table-bordered">
                  <thead>
                    <tr>
                       <th>Thumbnail</th>
                       <th>Name</th> 
                       <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $r)
                    <tr>
                        <td> <img class="img-fluid rounded" width="200" src="{{ url('public/images/') }}/{{$r->thumbnail}}"> </div></td>
                        <td>{{$r->tittle}}</td>
                        <td style="text-align: center;">
                          <a href="{{ url('admin/editcategory') }}/{{ $r->id }}">
                            <button class="btn btn-sm btn-primary">Edit</button>
                          </a>
                          <a onclick="return confirm('Are You Sure You want to Delete This')" href="{{ url('admin/deletecategory') }}/{{ $r->id }}">
                          <button class="btn btn-sm btn-danger">Delete</button>
                          </a>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div> <!-- end card-body-->
          </div> <!-- end card-->
      </div> <!-- end col-->

  </div>
  <!-- end row -->

</div> <!-- container -->.
@endsection