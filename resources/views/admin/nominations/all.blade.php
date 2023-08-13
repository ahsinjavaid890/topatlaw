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
                      <li class="breadcrumb-item active">All Nominations</li>
                  </ol>
              </div>
              <h4 class="page-title">All Nominations</h4>
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
                       <th>Image</th>
                       <th>Name</th>
                       <th>Service Name</th>
                       <th>City Name</th>
                       <th>Email Address</th>
                       <th>Phone Number</th>
                       <th>Status</th> 
                       <th>Change Status</th>
                       <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $r)
                    <tr>
                        <td> <img class="img-fluid rounded" width="200" src="{{ url('public/images/') }}/{{$r->image}}"> </div></td>
                        <td>{{$r->name}}</td>
                        <td><?php echo DB::table('categories')->where('id', $r->serviceid)->first()->tittle; ?></td>
                        <td><?php echo DB::table('cities')->where('id', $r->cityid)->first()->tittle; ?></td>
                        <td>{{$r->emailaddress}}</td>
                        <td>{{$r->phonenumber}}</td>
                        <td>@if($r->status == 1)Approved @else Not Approved @endif</td>
                        <td><input onclick="changestatus({{$r->id}} ,  {{ $r->status }})" type="checkbox" <?php if($r->status == 1){echo 'checked'; } ?> value="{{ $r->status }}" id="status<?php echo $r->id; ?>" data-switch="primary"/>
                        <label for="status<?php echo $r->id; ?>" data-on-label="Yes" data-off-label="No"></label></td>
                        <td style="text-align: center;">
                          <a href="{{ url('admin/editnominations') }}/{{ $r->id }}">
                            <button class="btn btn-sm btn-primary">Edit</button>
                          </a>
                          <a onclick="return confirm('Are You Sure You want to Delete This')" href="{{ url('admin/deletenomination') }}/{{ $r->id }}">
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

</div> <!-- container -->

<script type="text/javascript">
  function changestatus(one,second)
  {
      $.ajax({
          type: "GET",
          url: "{{ url('changenominationstatus') }}/"+one+'/'+second,
          success: function(resp) {
           location.reload();
          }
      });
  }
</script>
@endsection