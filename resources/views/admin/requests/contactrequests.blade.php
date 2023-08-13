@extends('admin.layouts.app')
@section('content')
<div id="container-fluid">
  <!-- start page title -->
  <div class="row">
      <div class="col-12">
          <div class="page-title-box">
              <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                      <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                      <li class="breadcrumb-item active">All Messages</li>
                  </ol>
              </div>
              <h4 class="page-title">All Messages</h4>
          </div>
      </div>
  </div>
<!-- end page title -->
  <div class="container-fluid">
    <h4 style="margin-left:13px;"></h4>
    @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="row">
      <div class="col-md-12">
          <div class="card">
            <div class="card-header card-success">
                All Contact Messages
            </div>
            <div class="card-body">
                <table id="basic-datatable" class="table table-bordered">
                  <thead>
                    <tr>
                       <th>Name</th>
                       <th>Email</th>
                       <th>Phone Number</th>
                       <th>Date</th>
                       <th>View</th>
                    </tr>
                    </thead>
                  <tbody>
                    <?php foreach(DB::table('contacts')->orderBy('id')->get() as $r){ ?>
                    <tr>
                        <td>{{$r->name}}</td>
                        <td>{{$r->email}}</td>
                        <td>{{$r->phonenumber}}</td>
                        <td>{{$r->created_at}}</td> 
                        <td class="text-center"> 
                          <a onclick="viewbigdeal({{ $r->id }})" href="{{ url('admin/viewcontactrequests/') }}/{{ $r->id }}">
                          
                            <button class="btn btn-primary">View Request</button>
                          </a>
                        </td>
                    </tr>
                    <?php }  ?>
                  </tbody>
                </table>
            </div>
          </div>
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->
</div>       
@endsection