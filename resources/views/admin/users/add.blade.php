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
                    Add New Admin
                </div>
                <div class="card-body">
                <form method="POST" action="{{ url('addnewadmin') }}">
                        @csrf
                      <div class="form-group">
                          <label for="name" class="">{{ __('Name') }}</label>
                          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                      </div>

                      <div class="form-group">
                          <label>{{ __('E-Mail Address') }}</label>
                          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                      </div>
                      <div class="form-group">
                          <label>{{ __('Select Country') }}</label>
                          <select style="width: 100%;" class="form-control" name="country">
                              <option value="">Select Country</option>
                              @foreach(DB::table('country')->get() as $r)
                              <option value="{{$r->name}}">{{$r->name}}</option>
                              @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                          <label>{{ __('Contact Number') }}</label>
                          <input type="text" class="form-control" name="contactnumber">
                      </div>
                      <div class="form-group">
                          <label>{{ __('Password') }}</label>
                          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                      </div>
                      <button class="btn btn-primary" type="submit">Add New Admin</button>
                  </form>
                </div>
              </div>
          </div>
        </div>
        

      </div>
      <!-- /.container-fluid -->

    </div>        
    <!-- /.content-wrapper -->
    @endsection