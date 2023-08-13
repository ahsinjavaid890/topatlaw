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
                      <li class="breadcrumb-item active">Add Lawyer</li>
                  </ol>
              </div>
              <h4 class="page-title">Add New Lawyer</h4>
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
                  <h4 class="header-title">Lawyer Details</h4>
                  <form method="post" action="{{ url('createlawyer') }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                     {{ csrf_field() }}
                     <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group mb-3">
                                <label for="validationCustom01">Featured or Top Lawyer</label>
                                <select  class="form-control" name="featuredortop" required="">
                                    <option value="">Select One</option>
                                    <option value="1">Featured</option>
                                    <option value="2">Top Lawyer</option>
                                </select>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom01">Select Service</label>
                                <select id="service" class="form-control" name="serviceid" required="">
                                    <option value="">Select Service</option>
                                    <?php foreach(DB::table('categories')->where('status' , 1)->get() as $r){ ?>
                                      <option value="{{ $r->id }}">{{ $r->tittle }}</option>
                                    <?php }  ?>
                                </select>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom01">Select City</label>
                                <select id="cities" class="form-control" name="cityid" required="">
                                    
                                </select>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom01">Name</label>
                                <input type="text" class="form-control" name="name" id="validationCustom01"
                                    placeholder="Lawyer Name" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom017">Tagline</label>
                                <input type="text" class="form-control"  name="tagline" id="validationCustom017"
                                    placeholder="Tagline">
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom018">Education</label>
                                <input type="text" class="form-control"  name="education" id="validationCustom018"
                                    placeholder="Education">
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom15">Lawyer Image</label>
                                <input type="file" class="form-control" style="height: 45px;" name="image" id="validationCustom15"
                                    placeholder="Category Tittle">
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom02">Bio</label>
                                <textarea name="bio"></textarea>
                                <script>
                                        CKEDITOR.replace( 'bio' );
                                </script>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom03">Office Address</label>
                                <input type="text" class="form-control" name="officeaddress" id="validationCustom03"
                                    placeholder="Office Address">
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom04">Phone No</label>
                                <input type="text" class="form-control" name="phoneno" id="validationCustom04"
                                    placeholder="Phone No">
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom05">Email Address</label>
                                <input type="email" class="form-control" name="email" id="validationCustom05"
                                    placeholder="Email Address">
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <h3 class="header-title">Lawyer Ratings</h3>
                            <div class="form-group mb-3">
                                <label for="validationCustom11">Rating Based on Experience</label>
                                <input type="text"  class="form-control" name="ratting_experience" id="quantity"
                                    placeholder="Rating Based on Experience out of 100" required>
                                <div id="errmsg">
                                   
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom12">Rating Based on Personal Assessment</label>
                                <input type="text" class="form-control" name="ratting_assesments" id="quantity2"
                                    placeholder="Rating Based on Personal Assessment out of 100" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom13">Rating Based on Online Reviews</label>
                                <input type="text" min="0" max="12" class="form-control" name="ratting_reviews" id="quantity3"
                                    placeholder="Rating Based on Online Reviews out of 100" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom14">Rating Based on Online Profiles</label>
                                <input type="text" class="form-control" name="ratting_profiles" id="quantity4"
                                    placeholder="Rating Based on Online Profiles out of 100" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group mb-3">
                                <label for="validationCustom06">Website Link</label>
                                <input type="text" class="form-control" name="websitelink" id="validationCustom06"
                                    placeholder="Website Link">
                                <div class="valid-feedback">
                                  Website Link is Optional
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom07">Fax Number</label>
                                <input type="text" class="form-control" name="fax" id="validationCustom07"
                                    placeholder="Fax Number">
                                <div class="valid-feedback">
                                  Fax Number is Optional
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom08">Facebook Profile Link</label>
                                <input type="text" class="form-control" name="facebook" id="validationCustom08"
                                    placeholder="Facebook Profile Link">
                                <div class="valid-feedback">
                                  Facebook Profile Link is Optional
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom09">Twitter Profile Link</label>
                                <input type="text" class="form-control" name="twitter" id="validationCustom09"
                                    placeholder="Twitter Profile Link">
                                <div class="valid-feedback">
                                  Twitter Profile Link is Optional
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom10">Linkdlin Profile Link</label>
                                <input type="text" class="form-control" name="linkdlin" id="validationCustom10"
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
                                        <input type="text" class="form-control" name="field1" id="validationCustom10"
                                            placeholder="Field Name 1">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom10">Link 1</label>
                                        <input type="text" class="form-control" name="link1" id="validationCustom10"
                                            placeholder="Link 1">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom10">Field Name 2</label>
                                        <input type="text" class="form-control" name="field2" id="validationCustom10"
                                            placeholder="Field Name 2">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom10">Link 2</label>
                                        <input type="text" class="form-control" name="link2" id="validationCustom10"
                                            placeholder="Link 2">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom10">Field Name 3</label>
                                        <input type="text" class="form-control" name="field3" id="validationCustom10"
                                            placeholder="Field Name 3">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom10">Link 3</label>
                                        <input type="text" class="form-control" name="link3" id="validationCustom10"
                                            placeholder="Link 3">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom10">Field Name 4</label>
                                        <input type="text" class="form-control" name="field4" id="validationCustom10"
                                            placeholder="Field Name 4">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom10">Link 4</label>
                                        <input type="text" class="form-control" name="link4" id="validationCustom10"
                                            placeholder="Link 4">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                     </div>
                        <button id="disabled" style="display: none;" class="btn btn-primary" disabled>Create New Lawyer</button>
                      <button id="submitbutton" class="btn btn-primary" type="submit">Create New Lawyer</button>
                  </form>   

              </div> <!-- end card-body-->
          </div> <!-- end card-->
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

$("#quantity").keyup(function(){
    var value = $('#quantity').val();
    if(value > 100)
    {
        $('#quantity').val(100);
    }
}); 
$("#quantity2").keyup(function(){
    var value = $('#quantity2').val();
    if(value > 100)
    {
        $('#quantity2').val(100);
    }
}); 
$("#quantity3").keyup(function(){
    var value = $('#quantity3').val();
    if(value > 100)
    {
        $('#quantity3').val(100);
    }
}); 
$("#quantity4").keyup(function(){
    var value = $('#quantity4').val();
    if(value > 100)
    {
        $('#quantity4').val(100);
    }
}); 
</script>
@endsection