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
    
    .image-upload > input
{
    display: none;
}

.image-upload img
{
    width: 80px;
    cursor: pointer;
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
              <h3>My Profile</h3>
              <p>Edit and modify your TopatLaw profile.</p>
          </div>
      </div>
    </div>
   
    <div class="container vh-70 mt-4 mb-4">
            <div class="row">
                <div class="col-md-3">
                     @include('pages.lawyerAuth.navbar')
                </div>
                <div class="col-md-9">
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <button class="btn btn-white font-15 mr-3 btn-lg mb-2" onclick="showSection(1);" type="button">Profile Setting</button>
                            <button class="btn btn-white font-15 mr-3 btn-lg mb-2" onclick="showSection(2);" type="button">Password Setting</button>
                        </div>
                    </div>
                    <div class="card mb-3" id="section1">
                        <div class="card-body p-card">
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="card-title">My Profile</h4>
                                    <p>Manage your TopAtLaw profile.</p>
                                </div>
                            </div>
                            <hr>

                            <!-- start page title -->
                              
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
                                    <form method="post" action="{{ url('updatelawyerimageByLawyer') }}" enctype="multipart/form-data" class="needs-validation p-3" novalidate>
                                        @csrf
                                        <input type="hidden" value="{{ $data->id }}" name="id" >
                                        <input type="hidden" value="{{ $data->image }}" name="old_image" >

                                         <div class="row">
                                           <div class="col-lg-6 col-md-12" >
                                                <div class="image-upload">
                                                    <label for="file-input">
                                                        <img style="width: 100px;height: 100px; border-radius:100px;" class="image" src="{{ url('public/images/') }}/{{$data->image}}">
                                                    </label>
                                                
                                                    <input id="file-input" type="file" name="image" type="file" />
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="form-group mb-3">
                                                    <label for="validationCustom03">Layer Image</label>
                                                    <div class="invalid-feedback">
                                                        Please attach image file.
                                                    </div>
                                                </div>
                                            </div>
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
                                                        <label for="validationCustom04">Phone No</label>
                                                        <input type="text" class="form-control" value="{{ $data->phonenumber }}" name="phoneno" id="validationCustom04"
                                                            placeholder="Phone No" >
                                                    </div>
                                                </div>
                                            
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="validationCustom04">City</label>
                                                        <input type="text" class="form-control" value="{{ $data->city }}" name="city" id="validationCustom04"
                                                            placeholder="" >
                                                    </div>
                                                </div>
                                                
                                                 <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="validationCustom04">Services</label>
                                                        <input type="text" class="form-control" value="{{ $data->service }}" name="service" id="validationCustom04"
                                                            placeholder="" >
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
                                            
                                                <div class="col-md-12 text-right">
                                                    <button class="default-btn-one" type="submit">
                                                        Save Now
                                                    </button>
                                                </div>
                                            </div>
                                         </div>
                                      </form>
                                  </div> <!-- end col-->

                              </div>
                              <!-- end row -->

                        </div>
                    </div>
                    <div id="passwordSection"></div>

                     <div class="card mb-3" id="section2">
                            <div class="card-body padd-30">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="card-title">Security Settings</h5>
                                    </div>
                                </div>
                                <hr>
                                <div class="pasword-alert alert alert-danger alert-dismissible" style="display: none;">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                      Password does't match.
                                </div>
                                @if(session()->has('message'))
                                <div class="alert alert-success alert-dismissible">
                                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        {{ session()->get('message') }}
                                    </div>
                                @endif
                                <form action="{{url('updatePasswordByLawyer')}}" method="post" id="changepasswordbylawyer">
                                    <div class="row">
                                    <input type="hidden" value="{{ $data->id }}" name="id" >
                                                @csrf
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="lable-control">Old Password</label>
                                                <input type="password" class="form-control" required  name="oldpass">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="lable-control">New Password</label>
                                                <input type="password" class="form-control" required id="newpass" name="newpass">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="lable-control">Confirm Password </label>
                                                <input type="password" class="form-control" required id="cpass" name="cpass">
                                            </div>
                                        </div>
                                           <div class="col-md-12 text-right">
                                            <button class="default-btn-one"  type="submit">
                                                Save Now
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <div class="row">
                                 
                                </div>
                            </div>
                        </div>
                
                </div>
            </div>
        </div>
  <script>
  
  $('#file-input').change(function(){
    var curElement = $('.image');
    console.log(curElement);
    var reader = new FileReader();

    reader.onload = function (e) {
        // get loaded data and render thumbnail.
        curElement.attr('src', e.target.result);
    };

    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
});
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
       
  </script>
@endsection