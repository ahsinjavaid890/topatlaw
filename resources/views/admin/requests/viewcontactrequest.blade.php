@extends('admin.layouts.app')
@section('content')
<div id="content-wrapper">

      <div class="container-fluid">
        <h4 style="margin-left:13px;"></h4>
        <div class="row">
          <div class="col-md-1">
            
          </div>
          <div class="col-md-10">
              <div class="card">
                <div class="card-header card-success">
                   View Contact
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                           <th>Name</th>
                           <td>{{ $data->name }}</td>
                        </tr>
                        <tr>
                           <th>Email</th>
                           <td>{{ $data->email }}</td>
                        </tr>
                        <tr>
                           <th>Subject</th>
                           <td>{{ $data->subject }}</td>
                        </tr>
                        <tr>
                           <th>Date</th>
                           <td>{{ $data->created_at }}</td>
                        </tr>
                        <tr>
                           <th>Phone Number</th>
                           <td>{{ $data->phonenumber }}</td>
                        </tr>
                        <tr>
                           <th>Message</th>
                           <td>{{ $data->message }}</td>
                        </tr>
                       </thead>
            
                    </table>
                </div>
              </div>
          </div>
        </div>
        

      </div>
      <!-- /.container-fluid -->

    </div>       
@endsection