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
              @if(Request::is('admin/requestLawyers'))
              Signup Requests
              @elseif(Request::is('admin/editrequestLawyers'))
              Edit Requests
              @else
               All Lawyers
               @endif
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
                       <th>Lawyer Image</th>
                       <th>Name</th>
                       <th>Service Name</th>
                       <th>City Name</th> 
                       <th>Approved Reviews</th>
                       @if(Request::is('admin/alllawyers'))
                       <th>Top Lawyers</th>
                       <th>Featured</th>
                      @endif
                       <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $r)
                    <tr>
                        <td> <img class="img-fluid rounded" width="30px" src="{{ url('public/images/') }}/{{$r->image}}"> </div></td>
                        <td>{{$r->name}}</td>
                        <td><?php echo DB::table('categories')->where('status' , 1)->where('id', $r->categoryid)->first()->tittle; ?></td>
                        <td><?php echo DB::table('cities')->where('status' , 1)->where('id', $r->citiyid)->first()->tittle; ?></td>
                        <td><?php echo DB::table('lawyerreviews')->where('status' , 1)->where('lawyers_id' , $r->id)->count(); ?> Review</td>
                        @if(Request::is('admin/alllawyers'))
                        <td><input onclick="toplawyers({{$r->id}} ,  {{ $r->toplawyers }})" type="checkbox" <?php if($r->toplawyers == 1){echo 'checked'; } ?> value="{{ $r->toplawyers }}" id="toplawyers<?php echo $r->id; ?>" data-switch="primary"/>
                       
                        <label for="toplawyers<?php echo $r->id; ?>" data-on-label="Yes" data-off-label="No"></label></td>
                        <td><input onclick="featured({{$r->id}} ,  {{ $r->featured }})" type="checkbox" <?php if($r->featured == 1){echo 'checked'; } ?> value="{{ $r->featured }}" id="featuredlawyers<?php echo $r->id; ?>" data-switch="primary"/>
                        <label for="featuredlawyers<?php echo $r->id; ?>" data-on-label="Yes" data-off-label="No"></label></td>
                        @endif
                        <td style="text-align: center;">
                        @if(Request::is('admin/requestLawyers')||Request::is('admin/editrequestLawyers'))
                        <a href="{{ url('admin/editlawyer') }}/{{$r->id}}/true">
                         @else 
                         <a href="{{ url('admin/editlawyer') }}/@if($r->registeredBy=='lawyer'){{DB::table('unapprovedlawyers')->where('lawyerApprovedid',$r->id)->first()->id}}/true @else{{ $r->id }}@endif">

                         @endif
                          <button class="btn btn-sm btn-primary">Edit</button>
                          </a>
                          <a onclick="return confirm('Are You Sure You want to Delete This')" href="{{ url('admin/deletelawyer') }}/{{ $r->id }}">
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
  function featured(one,second)
  {
      $.ajax({
          type: "GET",
          url: "{{ url('changetofeatured') }}/"+one+'/'+second,
          success: function(resp) {
             if(resp == 'error'){
              alert('This Lawyer is already Top Ten Lawyers');
              location.reload();
             }else{
              location.reload();
             } 
          }
      });
  }
  function toplawyers(one,second)
  {
      $.ajax({
          type: "GET",
          url: "{{ url('toplawyers') }}/"+one+'/'+second,
          success: function(resp) {
            if(resp == 'error'){
            alert('This Lawyer is already Featured Lawyers');
            location.reload();
           }else{
            location.reload();
           } 
          }
      });
  }
</script>
@endsection