@extends('layouts.app')
@section('title')
<title>My Profile</title>
@endsection
@section('content')
<style>
    html {
  scroll-behavior: smooth;
}
    .user-list {
        list-style: none;
        padding: 0px;
        margin: 0px;
    }

    .user-list li a {
        color: black;
        padding: 12px 10px;
        display: block;
    }

    .user-list li a i {
        margin-right: 6px;
        font-size: 17px;
    }

    .user-list li:hover {
        background-color: #f3f3f3;
        cursor: hand;
        color: #c8242f;
    }

    .user-list li:hover a {
        color: #c8242f;
    }

    .padd-30 {
        padding: 28px;
    }

    .profile-image {
        width: 90px;
        height: 90px;
        border: 1px solid lightgray;
        background-size: cover;
        object-fit: cover;
        border-radius: 100px;

    }
    </style>
</head>

<body>
    <div class="preloader">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="lds-hourglass"></div>
            </div>
        </div>
    </div>
   
   <div class="page-header d-flex align-items-center justify-content-left" style="height: 200px; margin-top: 5%;">
      <div class="container">
          <div class="" style="width:75%; margin-left: 25%;">
              <h3>Professional Profile</h3>
              <p>Edit and modify your professional profile at TopatLaw.</p>
          </div>
      </div>
    </div>

    <div class="container vh-70 mt-4 mb-4">
        <div class="row">
            <div class="col-md-3">
                @include('pages.lawyerAuth.navbar')
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body p-card">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Personal Info</h4>
                                <p>Update public profile information.</p>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
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
                            </div>
                        </div>

                        <form method="post" action="{{ url('updateUnapprovedLawyer') }}" id="updateLawyer" enctype="multipart/form-data" class="needs-validation P-3" novalidate>
                            @csrf
                             <input type="hidden" value="{{ $data->id }}" name="id" >
                             <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom01">Full Name</label>
                                        <input type="text" class="form-control" value="{{ $data->name }}" name="name" id="validationCustom01"
                                            placeholder="Category Tittle" required>
                                    </div>
                                </div>
                                   <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom05">Email</label>
                                        <input readonly type="email" class="form-control" name="email" id="validationCustom05"
                                            placeholder="Email Address" value="{{ $data->emailaddress }}" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom04">Phone Number</label>
                                        <input type="text" class="form-control" value="{{ $data->phonenumber }}" name="phoneno" id="validationCustom04"
                                            placeholder="Phone No" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3 ">
                                        <label for="validationCustom01">Tagline</label>
                                        <input type="text" class="form-control" value="{{ $data->tagline }}" name="tagline" id="validationCustom01"
                                            placeholder="Tagline" >
                                    </div>
                                </div>

                                 <div class="col-md-12 mb-3 mt-3">
                                    <h5>Professional Info</h5>
                                    <hr>
                                </div>
                             

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom01">Choose Category</label>
                                        <select id="service" name="categoryid"  class="form-control"  required="">
                                            <option value="">Select Service</option>
                                            <?php foreach(DB::table('categories')->where('status' , 1)->get() as $r){ ?>
                                              <option @if($r->id == $data->categoryid)selected @endif value="{{ $r->id }}">{{ $r->tittle }}</option>
                                            <?php }  ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom01">Choose City</label>
                                        <select id="cities" class="form-control" name="cityid" required="">
                                            <option value="">Select Service</option>
                                            <?php foreach(DB::table('cities')->where('status' , 1)->get() as $r){ ?>
                                              <option @if($r->id == $data->citiyid)selected @endif value="{{ $r->id }}">{{ $r->tittle }}</option>
                                            <?php }  ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom01">Education</label>
                                        <input type="text" class="form-control" value="{{ $data->education }}" name="education" id="validationCustom01"
                                            >
                                    </div>
                                    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom06">Website Link</label>
                                        <input type="text" value="{{ $data->website }}" class="form-control" name="websitelink" id="validationCustom06"
                                           >
                                        <div class="valid-feedback">
                                          Website Link is Optional
                                        </div>
                                    </div>
                                </div>
                                <!--<div class="col-md-6">-->
                                <!--    <div class="form-group mb-3">-->
                                <!--        <label for="validationCustom07">Fax Number</label>-->
                                <!--        <input type="text" value="{{ $data->fax }}" class="form-control" name="fax" id="validationCustom07"-->
                                <!--            >-->
                                <!--        <div class="valid-feedback">-->
                                <!--          Fax Number is Optional-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--</div>-->
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom03">Address (Optional)</label>
                                        <input type="text" class="form-control" value="{{ $data->officeaddress }}" name="officeaddress" id="validationCustom03"
                                         >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom02">Profile Bio</label>
                                        <textarea id="validationCustom02" name="bio" class="form-control" id="shortdescription" >{{ $data->bio }}</textarea>
                                        <script>
                                                CKEDITOR.replace( 'bio' );
                                        </script>
                                    </div>
                                </div>
                                
                                <div class="col-md-12 mb-3 mt-3">
                                    <h5>Social Profiles</h5>
                                    <hr>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom08">Facebook (Optional)</label>
                                        <input type="text" value="{{ $data->facebook }}" class="form-control" name="facebook" id="validationCustom08"
                                            placeholder="">
                                        <div class="valid-feedback">
                                          Facebook Profile Link is Optional
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom09">Twitter (Optional)</label>
                                        <input type="text" value="{{ $data->twitter }}" class="form-control" name="twitter" id="validationCustom09"
                                            placeholder="">
                                        <div class="valid-feedback">
                                          Twitter Profile Link is Optional
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom10">Linkdlin (Optional)</label>
                                        <input type="text" value="{{ $data->linkdlin }}" class="form-control" name="linkdlin" id="validationCustom10"
                                            placeholder="">
                                        <div class="valid-feedback">
                                          Linkdlin Profile Link is Optional
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom10">Youtube (Optional)</label>
                                        <input type="text" value="{{ $data->youtube }}" class="form-control" name="youtube" id="validationCustom10"
                                            placeholder="">
                                        <div class="valid-feedback">
                                          Linkdlin Profile Link is Optional
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom10">Professional Profile (Optional)</label>
                                        <input type="text" value="{{ $data->professional }}" class="form-control" name="professional" id="validationCustom10"
                                            placeholder="">
                                        <div class="valid-feedback">
                                          Linkdlin Profile Link is Optional
                                        </div>
                                    </div>
                                </div>
                                @php
                                $MoreProfile = DB::table('lawyer_more_profile')->where('lawyer_id',$data->id)->get();
                                @endphp
                                @if(count($MoreProfile) > 0)
                                @foreach($MoreProfile as $p)
                                <input type="hidden" name="profie_id[]" value="{{$p->id}}">
                                 <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom10">Profile (Optional)</label>
                                        <input type="text" value="{{ $p->profile }}" class="form-control" name="updatemoreprofile[]" id="validationCustom10"
                                            placeholder="">
                                        <div class="valid-feedback">
                                          Linkdlin Profile Link is Optional
                                        </div>
                                    </div>
                                    
                                
                                </div>
                                @endforeach
                                @endif
                                 <div class="col-md-6 mt-4">
                                  <a href="javascript:void(0);" class="add_button btn text-black btn-light font-13" title="Add field">Add More Profile</a>
                                </div>
                               <div class="col-md-12 field_wrapper"></div>
                            </div>
                          </form>

                          <div class="row">
                                <div class="col-md-12 text-right">
                                    <button class="default-btn-one" onclick="$('#updateLawyer').submit()">
                                        Save Now
                                    </button>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


  <script>
    $( "#service" ).change(function() {
  //  var value = $('#service').val();
    var value = $('#service').val();
    $.ajax({
        type: "GET",
        url: "{{ url('getcitiesForLawyers') }}/"+value,
        success: function(resp) {
          $('#cities').html(resp);
        }
    });
    });
    function changepssword(){
            if($('#newpass').val()===$('#cpass').val()){
                $('#changepasswordbylawyer').submit();
            }
            else 
            {
                $('.pasword-alert').show();
            }
    }
    $('#section2').hide(); $('#section3').hide();
        function showSection(id){
           $('#section1').hide(); $('#section2').hide(); $('#section3').hide();
           $('#section'+id).show();
        }

        function getCodeForLogo(src){
           // alert(src);
           $('#exampleModal1').modal('show');
           $('#exampleModal').modal('hide');
           $('#srcimg').val(src);
           $('#codeEmbed').text('');
        }
        function dimensions(vals,type){
            if(type==='h'){

            }
            else if(type==='w'){

            }
            codeEmbed($('#height').val(),$('#width').val());
            $('#copyCode').text('Copy');
            $('#copyCode').prop('disabled',false);
        }
        function codeEmbed(h,w){
            var src=$('#srcimg').val();
           var code= ('<a target="_blank" href="{{url("lawyer")}}/{{$data->url}}">\n'+
           ' <img src="'+src+'" width="'+w+'" height="'+h+'">\n'+
           '</a>');
           $('#codeEmbed').text(code);
           $('#modifiedCode').val(code);
        }
        function copyCode(){
           // var $temp = $("<input>");
           $('#modifiedCode').show();
           setTimeout(function() {
            $('#modifiedCode').select();
            document.execCommand("copy");
            $('#modifiedCode').hide();
           }, 100);
           /// $("body").append($temp);
           
           // $temp.remove();
           $('#copyCode').text('Copied');
           $('#copyCode').prop('disabled',true);
        }
        
        $(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    // var fieldHTML = '<div class="row"><div class="col-md-8 mb-4"><div class="row"><div class="col-md-8"><div class="d-flex p-1 custom-file"><input type="file" name="orientationdocument[]" id="customFile" class="custom-file-input"><label class="custom-file-label" for="customFile">Choose file</label></div></div><div class="col-md-4"><a href="javascript:void(0);" class="remove_button btn btn-light-danger"><i class="fa fa-minus"></i></a></div></div></div></div>';
	var fieldHTML = '<div class="col-md-6"><div class="form-group"><label for="validationCustom10">Profile (Optional)</label><input type="text" name="moreprofile[]" class="form-control d-flex"/></div><a href="javascript:void(0);"  class="remove_button  btn btn-light"><i class="las la-minus"></i></a></div>';

	var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
       
  </script>
@endsection