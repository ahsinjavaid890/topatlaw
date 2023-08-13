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
                      <li class="breadcrumb-item active">All Lawyers</li>
                  </ol>
              </div>
              <h4 class="page-title">
            
              </h4>
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
                       <th>Name</th>
                       <th>Email</th>
                       <th>Phone number</th>
                       <th >Description</th>
                       <th>claimed profile username</th> 
                       <th>Lawyer Profile </th>
                       <th>Approve claming person</th>
                       <th>Delete </th>
                      <?php  $null='';?>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($getProfiles as $profile)
                    <tr>
                        <td>{{$profile->name ?? ''}}</td>
                        <td>{{$profile->email ?? ''}}</td>
                        <td>{{$profile->phone ?? ''}}</td>
                      <td>  <button type="button" onclick="$('.modal-body').text('{{json_encode($profile->description) ?? $null}}')" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Show more
                      </button> </td>
                      <td><a target="_blank" href="{{url('lawyer')}}/{{$profile->claimed_username ?? ''}}">{{$profile->claimed_username ?? ''}}</a></td>
                        <td><a target="_blank" href="{{url('admin/editlawyer')}}/{{$profile->claimed_user ?? ''}}" class="btn btn-primary">View claimed lawyer profile</a></td>
                        <td> <a class="btn btn-info" href="{{url('admin/profile_claimed_approve')}}/{{$profile->email ?? ''}}/{{$profile->claimed_user ?? ''}}/{{$profile->id}}">Aprove claiming person</a> </td>
                        <td><a href="{{url('admin/profile_claimed_delete')}}/{{$profile->id}}">Delete</a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div> <!-- end card-body-->
          </div> <!-- end card-->
      </div> <!-- end col-->

  </div>
  <!-- end row -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Description</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div> <!-- container -->

<script type="text/javascript">
 
</script>
@endsection