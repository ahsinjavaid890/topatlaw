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
                      <li class="breadcrumb-item active">Edit Nomination</li>
                  </ol>
              </div>
              <h4 class="page-title">Edit Nomination {{ $data->name }}</h4>
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
                  <h4 class="header-title">Nomination Details</h4>
                  <form method="post" action="{{ url('updatenomination') }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                     {{ csrf_field() }}
                     <input type="hidden" value="{{ $data->id }}" name="id">
                      <div class="form-group mb-3">
                          <label for="validationCustom01">Select Service</label>
                          <select id="service" class="form-control" name="serviceid" required="">
                              <option value="">Select Service</option>
                              <?php foreach(DB::table('categories')->where('status' , 1)->get() as $r){ ?>
                                <option @if($r->id == $data->serviceid)selected @endif value="{{ $r->id }}">{{ $r->tittle }}</option>
                              <?php }  ?>
                          </select>
                          <div class="valid-feedback">
                              Looks good!
                          </div>
                      </div>
                      <div class="form-group mb-3">
                          <label for="validationCustom01">Select City</label>
                          <select id="cities" class="form-control" name="cityid" required="">
                              <option value="">Select Service</option>
                              <?php foreach(DB::table('cities')->where('status' , 1)->get() as $r){ ?>
                                <option @if($r->id == $data->cityid)selected @endif value="{{ $r->id }}">{{ $r->tittle }}</option>
                              <?php }  ?>
                          </select>
                          <div class="valid-feedback">
                              Looks good!
                          </div>
                      </div>
                      <div class="form-group mb-3">
                          <label for="validationCustom01">Name</label>
                          <input type="text" class="form-control" name="name" id="validationCustom01"
                              placeholder="Blog Tittle" value="{{ $data->name }}" required>
                          <div class="valid-feedback">
                              Looks good!
                          </div>
                      </div>
                      <div class="form-group mb-3">
                          <label for="validationCustom02">Bio</label>
                          <textarea id="validationCustom02" name="bio" class="form-control" placeholder="Enter Short Description" id="shortdescription" required>{{ $data->bio }}</textarea>
                          <div class="valid-feedback">
                              Looks good!
                          </div>
                      </div>
                      <div class="form-group mb-3">
                          <label for="validationCustom01">Email</label>
                          <input type="text" class="form-control" name="emailaddress" id="validationCustom01"
                              placeholder="Blog Tittle" value="{{ $data->emailaddress }}" required>
                          <div class="valid-feedback">
                              Looks good!
                          </div>
                      </div>
                      <div class="form-group mb-3">
                          <label for="validationCustom01">Phone</label>
                          <input type="text" class="form-control" name="phonenumber" id="validationCustom01"
                              placeholder="Blog Tittle" value="{{ $data->phonenumber }}" required>
                          <div class="valid-feedback">
                              Looks good!
                          </div>
                      </div>
                      <div class="form-group mb-3">
                          <label for="validationCustom01">Website</label>
                          <input type="text" class="form-control" name="website" id="validationCustom01"
                              placeholder="Blog Tittle" value="{{ $data->website }}" required>
                          <div class="valid-feedback">
                              Looks good!
                          </div>
                      </div>
                      <div class="form-group mb-3">
                          <label for="validationCustom01">Votes</label>
                          <input type="number" class="form-control" name="votes" id="validationCustom01"
                              placeholder="Blog Tittle" value="{{ $data->votes }}" required>
                          <div class="valid-feedback">
                              Looks good!
                          </div>
                      </div>
                      <h4 class="header-title">Lawyer Ratings</h4>
                            <div class="form-group mb-3">
                                <label for="validationCustom11">Rating Based on Experience</label>
                                <input type="text" maxlength="4" data-toggle="maxlength" value="{{ $data->r_experience }}" class="form-control" name="ratting_experience" id="validationCustom11"
                                    placeholder="Rating Based on Experience" >
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <small style="color: red;">Rate Out of <b>12.5</b></small>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom12">Rating Based on Personal Assessment</label>
                                <input type="text" class="form-control" maxlength="4" data-toggle="maxlength" value="{{ $data->r_personal }}" class="form-control" name="ratting_assesments" id="validationCustom12"
                                    placeholder="Rating Based on Personal Assessment" >
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <small style="color: red;">Rate Out of <b>12.5</b></small>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom13">Rating Based on Online Reviews</label>
                                <input type="text" maxlength="4" data-toggle="maxlength" value="{{ $data->r_online_reviews }}" class="form-control" name="ratting_reviews" id="validationCustom13"
                                    placeholder="Rating Based on Online Reviews" >
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <small style="color: red;">Rate Out of <b>12.5</b></small>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom14">Rating Based on Online Profiles</label>
                                <input type="text" maxlength="4" data-toggle="maxlength" value="{{ $data->r_online_profiles }}" class="form-control" name="ratting_profiles" id="validationCustom14"
                                    placeholder="Rating Based on Online Profiles" >
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <small style="color: red;">Rate Out of <b>12.5</b></small>
                            </div>
                      <button class="btn btn-primary" type="submit">Update Nomination</button>
                  </form>   

              </div> <!-- end card-body-->
          </div> <!-- end card-->
      </div> <!-- end col-->
      <div class="col-lg-3">
            <div class="card">
              <div class="card-body">
                  <h4 class="header-title">Nomination Image</h4>
                  <form method="post" action="{{ url('updatenominationimage') }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                     {{ csrf_field() }}
                     <input type="hidden" value="{{ $data->id }}" name="id">
                      <div class="form-group mb-3">
                          <label for="validationCustom01">Nomination Image</label>
                          <input  required=""  class="form-control" type="file" style="height: 45px;" name="image" required="">
                          <div class="valid-feedback">
                              Looks good!
                          </div>
                      </div>
                      <button class="btn btn-primary" type="submit">Update Nomination Image</button>
                  </form>   
              </div> <!-- end card-body-->
          </div> <!-- end card-->
      </div>

  </div>
  <!-- end row -->

</div> <!-- container -->
<script type="text/javascript">
$( "#service" ).change(function() {
    var value = $('#service').val();
    $.ajax({
        type: "GET",
        url: "{{ url('getcities') }}/"+value,
        success: function(resp) {
          $('#cities').html(resp);
        }
    });
});
</script>
@endsection