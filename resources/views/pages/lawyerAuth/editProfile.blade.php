@extends('layouts.app')
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
                      <li class="breadcrumb-item active">Edit Lawyer</li>
                  </ol>
              </div>
              <h4 class="page-title">Edit Lawyer {{ $data->name }}</h4>
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
      <div class="col-lg-12">
          <div class="card">
              <div class="card-body">
                  <h4 class="header-title">Lawyer Details
                      @if(isset($data->registeredBy)&&$data->registeredBy=='lawyer')
                      <span class="float-right ">
                      <input type="checkbox" @if($data->status==1) value="0" checked @else value="1" @endif id="approveLawyer" onclick="approveLawyer($(this).val(),{{$data->id}})" style="-webkit-transform: scale(1.5, 1.5);">
                          <label for="approveLawyer"> &nbsp;Approve Lawyer</label>
                         
                      </span>
                      @endif
                  </h4>
                  <form method="post" action="{{ url('updatelawyer') }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                     {{ csrf_field() }}
                     <input type="hidden" value="{{ $data->id }}" name="id">
                     <div class="row">
                        <div class="col-lg-6 col-md-6">
                          <div class="form-group mb-3">
                                <label for="validationCustom01">Select Service</label>
                                <select id="service" disabled class="form-control"  required="">
                                    <option value="">Select Service</option>
                                    <?php foreach(DB::table('categories')->where('status' , 1)->get() as $r){ ?>
                                      <option @if($r->id == $data->categoryid)selected @endif value="{{ $r->id }}">{{ $r->tittle }}</option>
                                    <?php }  ?>
                                </select>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom01">Select City</label>
                                <select id="cities" class="form-control"  name="cityid" required="">
                                    <option value="">Select Service</option>
                                    <?php foreach(DB::table('cities')->where('status' , 1)->get() as $r){ ?>
                                      <option @if($r->id == $data->citiyid)selected @endif value="{{ $r->id }}">{{ $r->tittle }}</option>
                                    <?php }  ?>
                                </select>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom01">Name</label>
                                <input type="text" class="form-control" value="{{ $data->name }}" name="name" id="validationCustom01"
                                    placeholder="Category Tittle" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom01">Tagline</label>
                                <input type="text" class="form-control" value="{{ $data->tagline }}" name="tagline" id="validationCustom01"
                                    placeholder="Tagline" >
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom01">Education</label>
                                <input type="text" class="form-control" value="{{ $data->education }}" name="education" id="validationCustom01"
                                    placeholder="Education" >
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom02">Bio</label>
                                <textarea id="validationCustom02" name="bio" class="form-control" placeholder="Enter Short Description" id="shortdescription" >{{ $data->bio }}</textarea>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <script>
                                        CKEDITOR.replace( 'bio' );
                                </script>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom03">Office Address</label>
                                <input type="text" class="form-control" value="{{ $data->officeaddress }}" name="officeaddress" id="validationCustom03"
                                    placeholder="Office Address" >
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom04">Phone No</label>
                                <input type="text" class="form-control" value="{{ $data->phonenumber }}" name="phoneno" id="validationCustom04"
                                    placeholder="Phone No" >
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom05">Email Address</label>
                                <input type="email" class="form-control" name="email" id="validationCustom05"
                                    placeholder="Email Address" value="{{ $data->emailaddress }}" >
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <h4 class="header-title">Lawyer Ratings</h4>
                            <div class="form-group mb-3">
                                <label for="validationCustom11">Rating Based on Experience</label>
                                <input type="text" disabled maxlength="4" data-toggle="maxlength" value="{{ $data->r_experience }}" class="form-control"  id="validationCustom11"
                                    placeholder="Rating Based on Experience" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <small style="color: red;">Rate Out of <b>100</b></small>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom12">Rating Based on Personal Assessment</label>
                                <input type="text" disabled class="form-control" maxlength="4" data-toggle="maxlength" value="{{ $data->r_personal }}" class="form-control"  id="validationCustom12"
                                    placeholder="Rating Based on Personal Assessment" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <small style="color: red;">Rate Out of <b>100</b></small>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom13">Rating Based on Online Reviews</label>
                                <input type="text" disabled maxlength="4" data-toggle="maxlength" value="{{ $data->r_online_reviews }}" class="form-control"  id="validationCustom13"
                                    placeholder="Rating Based on Online Reviews" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <small style="color: red;">Rate Out of <b>100</b></small>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom14">Rating Based on Online Profiles</label>
                                <input type="text" disabled maxlength="4" data-toggle="maxlength" value="{{ $data->r_online_profiles }}" class="form-control"  id="validationCustom14"
                                    placeholder="Rating Based on Online Profiles" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <small style="color: red;">Rate Out of <b>100</b></small>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group mb-3">
                                <label for="validationCustom06">Website Link</label>
                                <input type="text" value="{{ $data->website }}" class="form-control" name="websitelink" id="validationCustom06"
                                    placeholder="Website Link">
                                <div class="valid-feedback">
                                  Website Link is Optional
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom07">Fax Number</label>
                                <input type="text" value="{{ $data->fax }}" class="form-control" name="fax" id="validationCustom07"
                                    placeholder="Fax Number">
                                <div class="valid-feedback">
                                  Fax Number is Optional
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom08">Facebook Profile Link</label>
                                <input type="text" value="{{ $data->facebook }}" class="form-control" name="facebook" id="validationCustom08"
                                    placeholder="Facebook Profile Link">
                                <div class="valid-feedback">
                                  Facebook Profile Link is Optional
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom09">Twitter Profile Link</label>
                                <input type="text" value="{{ $data->twitter }}" class="form-control" name="twitter" id="validationCustom09"
                                    placeholder="Twitter Profile Link">
                                <div class="valid-feedback">
                                  Twitter Profile Link is Optional
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom10">Linkdlin Profile Link</label>
                                <input type="text" value="{{ $data->linkdlin }}" class="form-control" name="linkdlin" id="validationCustom10"
                                    placeholder="Linkdlin Profile Link">
                                <div class="valid-feedback">
                                  Linkdlin Profile Link is Optional
                                </div>
                            </div>
                            <h3 class="header-title">Aditional Links</h3>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom10">Field Name 1</label>
                                        <input type="text" value="{{ $data->field1 }}" class="form-control" name="field1" id="validationCustom10"
                                            placeholder="Field Name 1">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom10">Link 1</label>
                                        <input type="text" value="{{ $data->link1 }}" class="form-control" name="link1" id="validationCustom10"
                                            placeholder="Link 1">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom10">Field Name 2</label>
                                        <input value="{{ $data->field2 }}" type="text" class="form-control" name="field2" id="validationCustom10"
                                            placeholder="Field Name 2">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom10">Link 2</label>
                                        <input value="{{ $data->link2 }}" type="text" class="form-control" name="link2" id="validationCustom10"
                                            placeholder="Link 2">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom10">Field Name 3</label>
                                        <input value="{{ $data->field3 }}" type="text" class="form-control" name="field3" id="validationCustom10"
                                            placeholder="Field Name 3">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom10">Link 3</label>
                                        <input value="{{ $data->link3 }}" type="text" class="form-control" name="link3" id="validationCustom10"
                                            placeholder="Link 3">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom10">Field Name 4</label>
                                        <input value="{{ $data->field4 }}" type="text" class="form-control" name="field4" id="validationCustom10"
                                            placeholder="Field Name 4">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom10">Link 4</label>
                                        <input value="{{ $data->link4 }}" type="text" class="form-control" name="link4" id="validationCustom10"
                                            placeholder="Link 4">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                     </div>
                      <button class="btn btn-primary" type="submit">Update Lawyer</button>
                  </form>   

              </div> <!-- end card-body-->
          </div> <!-- end card-->
          <div class="card">
              <div class="card-body">
                <h4 class="header-title">Update Lawyer Image</h4>
                <div class="row">
                      <div class="col-lg-6 col-md-12">
                          <form method="post" action="{{ url('updatelawyerimageByLawyer') }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                             {{ csrf_field() }}
                             <input type="hidden" value="{{ $data->id }}" name="id">
                              <div class="form-group mb-3">
                                  <label for="validationCustom03">Layer Image</label>
                                  <input style="height: 45px;" name="image" type="file" class="form-control" id="validationCustom09"
                                       required>
                                  <div class="invalid-feedback">
                                      Please attach image file.
                                  </div>
                              </div>
                              <button class="btn btn-primary" type="submit">Update Layer Image</button>
                          </form> 
                      </div>
                      <div class="col-lg-6 col-md-6">
                          <div style="width: 100%;height: 200px;border: 1px solid #DDD"> <img style="width: 100%;height: 100%;" src="{{ url('public/images/') }}/{{$data->image}}"> </div>
                      </div>
                  </div>
              </div>
          </div>
      </div> <!-- end col-->

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

function approveLawyer(val,id){
    window.location.href="{{url('admin/approveLawyers')}}/"+id+'/'+val;
}
</script>
@endsection