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
                     <input type="hidden" value="@if(isset($data->lawyerApprovedid)){{$data->lawyerApprovedid}}@else{{ $data->id }}@endif" name="id">
                     <div class="row">
                        <div class="col-lg-6 col-md-6">
                          <div class="form-group mb-3">
                                <label for="validationCustom01">Select Service</label>
                                <select id="service" class="form-control"  name="serviceid" required="">
                                    <option value="">Select Service</option>
                                    <?php foreach(DB::table('categories')->where('status' , 1)->get() as $r){ ?>
                                      <option @if($r->id == $data->categoryid)selected @endif value="{{ $r->id }}">{{ $r->tittle }}</option>
                                    <?php }  ?>
                                </select>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                @if(isset($od->bio))
                                <p class="od odbio"><span class="text-success">Previous Approved Data : </span> {{DB::table('categories')->where('status' , 1)->where('id',$od->categoryid)->first()->tittle}}  <a href="javascript:void(0)" onclick="changeData('service','{{$od->categoryid}}')">use this!</a></p>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom01">Select City</label>
                                <select id="cities" class="form-control" name="cityid" required="">
                                    <option value="">Select Service</option>
                                    <?php foreach(DB::table('cities')->where('status' , 1)->get() as $r){ ?>
                                      <option @if($r->id == $data->citiyid) selected @endif value="{{ $r->id }}">{{ $r->tittle }}</option>
                                    <?php }  ?>
                                </select>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                @if(isset($od->citiyid))
                                <p class="od od{{$od->citiyid}}"><span class="text-success">Previous Approved Data : </span> {{DB::table('cities')->where('status' , 1)->where('id',$od->citiyid)->first()->tittle}} <a href="javascript:void(0)" onclick="changeData('cities',{{$od->citiyid}})">use this!</a></p>
                                @endif
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="validationCustom01">Name</label>
                                <input type="text" class="form-control" value="{{ $data->name }}" name="name" id="name"
                                    placeholder="Category Tittle" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                @if(isset($od->name))
                                <p class="od odname"><span class="text-success">Previous Approved Data : </span> {{$od->name}} <a href="javascript:void(0)" onclick="changeData('name','{{$od->name}}')">use this!</a></p>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom01">Tagline</label>
                                <input type="text" class="form-control" value="{{ $data->tagline }}" name="tagline" id="tagline"
                                    placeholder="Tagline" >
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                @if(isset($od->tagline))
                                <p class="od odname"><span class="text-success">Previous Approved Data : </span> {{$od->tagline}} <a href="javascript:void(0)" onclick="changeData('tagline','{{$od->tagline}}')">use this!</a></p>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom01">Education</label>
                                <input type="text" class="form-control" value="{{ $data->education }}" name="education" id="education"
                                    placeholder="Education" >
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                @if(isset($od->education))
                                <p class="od odeducation"><span class="text-success">Previous Approved Data : </span> {{$od->education}} <a href="javascript:void(0)" onclick="changeData('education','{{$od->education}}')">use this!</a></p>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom02">Bio</label>
                                <textarea id="validationCustom02" name="bio" class="form-control" placeholder="Enter Short Description" id="bioid" >{{ $data->bio }}</textarea>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <script>
                                        CKEDITOR.replace( 'bio' );
                                </script>
                                @if(isset($od->bio))
                                <p class="od odbio"><span class="text-success">Previous Approved Data : </span> {{$od->bio}} <a href="javascript:void(0)" onclick="changeData('bioid','{{$od->bio}}')">use this!</a></p>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom03">Office Address</label>
                                <input type="text" class="form-control" value="{{ $data->officeaddress }}" name="officeaddress" id="officeaddress"
                                    placeholder="Office Address" >
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                @if(isset($od->officeaddress))
                                <p class="od odofficeaddress"><span class="text-success">Previous Approved Data : </span> {{$od->officeaddress}} <a href="javascript:void(0)" onclick="changeData('officeaddress','{{$od->officeaddress}}')">use this!</a></p>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom04">Phone No</label>
                                <input type="text" class="form-control" value="{{ $data->phonenumber }}" name="phoneno" id="phonenumber"
                                    placeholder="Phone No" >
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                @if(isset($od->phonenumber))
                                <p class="od odphonenumber"><span class="text-success">Previous Approved Data : </span> {{$od->phonenumber}} <a href="javascript:void(0)" onclick="changeData('phonenumber','{{$od->phonenumber}}')">use this!</a></p>
                                @endif
                                
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom05">Email Address</label>
                                <input type="email" class="form-control" name="email" id="emailaddress"
                                    placeholder="Email Address" readonly value="{{ $data->emailaddress }}" >
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                @if(isset($od->emailaddress))
                                <p class="od odemailaddress"><span class="text-success">Previous Approved Data : </span> {{$od->emailaddress}} <a href="javascript:void(0)" onclick="changeData('emailaddress','{{$od->emailaddress}}')">use this!</a></p>
                                @endif
                            </div>
                            <h4 class="header-title">Lawyer Ratings</h4>
                            <div class="form-group mb-3">
                                <label for="validationCustom11">Rating Based on Experience</label>
                                <input type="text" maxlength="4" data-toggle="maxlength" value="{{ $data->r_experience }}" class="form-control" name="ratting_experience" id="validationCustom11"
                                    placeholder="Rating Based on Experience" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <small style="color: red;">Rate Out of <b>100</b></small>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom12">Rating Based on Personal Assessment</label>
                                <input type="text" class="form-control" maxlength="4" data-toggle="maxlength" value="{{ $data->r_personal }}" class="form-control" name="ratting_assesments" id="validationCustom12"
                                    placeholder="Rating Based on Personal Assessment" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <small style="color: red;">Rate Out of <b>100</b></small>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom13">Rating Based on Online Reviews</label>
                                <input type="text" maxlength="4" data-toggle="maxlength" value="{{ $data->r_online_reviews }}" class="form-control" name="ratting_reviews" id="validationCustom13"
                                    placeholder="Rating Based on Online Reviews" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <small style="color: red;">Rate Out of <b>100</b></small>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom14">Rating Based on Online Profiles</label>
                                <input type="text" maxlength="4" data-toggle="maxlength" value="{{ $data->r_online_profiles }}" class="form-control" name="ratting_profiles" id="validationCustom14"
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
                                <input type="text" value="{{ $data->website }}" class="form-control" name="websitelink" id="website"
                                    placeholder="Website Link">
                                <div class="valid-feedback">
                                  Website Link is Optional
                                </div>
                                @if(isset($od->website))
                                <p class="od odwebsite"><span class="text-success">Previous Approved Data : </span> {{$od->website}} <a href="javascript:void(0)" onclick="changeData('website','{{$od->website}}')">use this!</a></p>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom07">Fax Number</label>
                                <input type="text" value="{{ $data->fax }}" class="form-control" name="fax" id="fax"
                                    placeholder="Fax Number">
                                <div class="valid-feedback">
                                  Fax Number is Optional
                                </div>
                                @if(isset($od->fax))
                                <p class="od odfax"><span class="text-success">Previous Approved Data : </span> {{$od->fax}} <a href="javascript:void(0)" onclick="changeData('fax','{{$od->fax}}')">use this!</a></p>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom08">Facebook Profile Link</label>
                                <input type="text" value="{{ $data->facebook }}" class="form-control" name="facebook" id="facebook"
                                    placeholder="Facebook Profile Link">
                                <div class="valid-feedback">
                                  Facebook Profile Link is Optional
                                </div>
                                @if(isset($od->facebook))
                                <p class="od odfacebook"><span class="text-success">Previous Approved Data : </span> {{$od->facebook}} <a href="javascript:void(0)" onclick="changeData('facebook','{{$od->facebook}}')">use this!</a></p>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom09">Twitter Profile Link</label>
                                <input type="text" value="{{ $data->twitter }}" class="form-control" name="twitter" id="twitter"
                                    placeholder="Twitter Profile Link">
                                <div class="valid-feedback">
                                  Twitter Profile Link is Optional
                                </div>
                                @if(isset($od->twitter))
                                <p class="od odtwitter"><span class="text-success">Previous Approved Data : </span> {{$od->twitter}} <a href="javascript:void(0)" onclick="changeData('twitter','{{$od->twitter}}')">use this!</a></p>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom10">Linkdlin Profile Link</label>
                                <input type="text" value="{{ $data->linkdlin }}" class="form-control" name="linkdlin" id="linkdlin"
                                    placeholder="Linkdlin Profile Link">
                                <div class="valid-feedback">
                                  Linkdlin Profile Link is Optional
                                </div>
                                @if(isset($od->linkdlin))
                                <p class="od odlinkdlin"><span class="text-success">Previous Approved Data : </span> {{$od->linkdlin}} <a href="javascript:void(0)" onclick="changeData('linkdlin','{{$od->linkdlin}}')">use this!</a></p>
                                @endif
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
                                        <input value="{{ $data->field4 }}" type="text" class="form-control" name="field5" id="validationCustom10"
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
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom10">Password</label>
                                        <input onclick="document.getElementById('password').type='text'" style="font-size: 18px;" readonly value="{{ $data->password }}" type="password" class="form-control" name="field4" id="password"
                                           >
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
                          <form method="post" action="{{ url('updatelawyerimage') }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                             {{ csrf_field() }}
                             <input type="hidden" value="@if(isset($data->lawyerApprovedid)){{$data->lawyerApprovedid}}@else{{ $data->id }}@endif" name="id">
                              <div class="form-group mb-3">
                                  <label for="validationCustom03">Layer Image</label>
                                  <input style="height: 45px;" name="image" type="file" class="form-control" id="validationCustom09"
                                       >
                                  <div class="invalid-feedback">
                                      Please attach image file.
                                  </div>
                              </div>
                              <button class="btn btn-primary" type="submit">Update Layer Image</button>
                          </form> 
                      </div>
                      <div class="col-lg-6 col-md-6">
                          <div style="width: 100%;height: 200px;"> <img style="width: 100px;height: 100px; object-fit: cover" src="{{ url('public/images/') }}/{{$data->image}}"> </div>
                      </div>
                  </div>
              </div>
          </div>
      </div> <!-- end col-->

  </div>
  <!-- end row -->

</div> <!-- container -->

  <!-- select2 -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

  <!-- select2-bootstrap4-theme -->
  <link href="https://raw.githack.com/ttskch/select2-bootstrap4-theme/master/dist/select2-bootstrap4.css" rel="stylesheet"> <!-- for live demo page -->

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
@if(isset($data->lawyerApprovedid)&&$data->lawyerApprovedid==-1) <script>
$('input').prop('disabled',true);
$('select').prop('disabled',true);
$('button').prop('disabled',true);
$('textarea').prop('disabled',true);
$('input[type="checkbox"]').prop('disabled',false);
</script> @endif

<script>
   function changeData(uid,id){
       $('#'+uid).val(id).change();
   }

   $(function () {
  $('select').each(function () {
    $(this).select2({
      theme: 'bootstrap4',
      width: 'style',
      placeholder: $(this).attr('placeholder'),
      allowClear: Boolean($(this).data('allow-clear')),
    });
  });
});
</script>
@endsection