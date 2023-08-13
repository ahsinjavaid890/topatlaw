@extends('admin.layouts.header')
@section('content')
<div id="content-wrapper">

      <div class="container-fluid">
        <h4 style="margin-left:13px;"></h4>
        @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="row">
          <div class="col-md-1">
            
          </div>
          <div class="col-md-10">
              <div class="card">
                <div class="card-header card-success">
                    All Users
                </div>
                <div class="card-body">
                    <table id="dataTable" class="table table-bordered">
                      <thead>
                        <tr>
                           <th>Name</th>
                           <th>Email</th>
                           <th>Contact</th>
                           <th>Country</th>
                           <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach(DB::table('users')->where('is_admin' , 1)->get() as $r){ ?>
                        <tr>
                            <td>{{$r->name}}</td>
                            <td>{{$r->email}}</td>
                            <td>{{$r->phonenumber}}</td>
                            <td>{{$r->country}}</td>
                            <td style="text-align: center;">
                              <button onclick="edituser({{ $r->id }})" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></button>
                              <a id="test" href="{{url('deletetestimonial')}}/{{$r->id}}">
                                <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
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


    <div class="modal fade" id="myModal">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">View User</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
              <form method="POST" action="{{ url('updateuser') }}">
                  {{ csrf_field() }}
                  <input type="hidden" name="id" id="userid">
                <div class="form-group">
                  <label>Update Name</label>
                  <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                  <label>Update Email</label>
                  <input type="text" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                  <label>Update Country</label>
                  <input type="text" class="form-control" id="country" name="country">
                </div>
                <div class="form-group">
                  <label>Update Contact Number</label>
                  <input type="text" class="form-control" id="phone" name="phone">
                </div>
                <!-- <div class="form-group">
                  <label>Block This User</label>
                  <select class="form-control" name="bloackuser">
                      <option>Select</option>
                      <option value="block">Block</option>
                      <option value="unblock">UnBlock</option>
                  </select>
                </div> -->
                <div class="form-group">
                  <input type="submit" class="btn btn-primary">
                </div>
                </form>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
      $(document).ready(function ($) {
          $("#test").click(function (e) {
              var answer = confirm('Are you sure that you want to Delete This?');
              if (!answer) {
                  e.preventDefault();
              }
          });
      });

      function edituser(id)
      {
        $.ajax({
          type:'GET',
          url:"{{ url('edituser') }}/"+id,
          datatype:'json',
          success: function(res)
          {
            $("#name").val(res.name);
            $("#email").val(res.email);
            $("#country").val(res.country);
            $("#phone").val(res.phonenumber);
            $("#userid").val(res.userid);
            $('#myModal').modal('show');
          }
         })
      }
    </script>
        
    <!-- /.content-wrapper -->
    @endsection