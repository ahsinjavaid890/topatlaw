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
   
    <div class="search-overlay">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="search-overlay-layer"></div>
                <div class="search-overlay-layer"></div>
                <div class="search-overlay-layer"></div>
                <div class="search-overlay-close">
                    <span class="search-overlay-close-line"></span>
                    <span class="search-overlay-close-line"></span>
                </div>
                <div class="search-overlay-form">
                    <form>
                        <input type="text" class="input-search" placeholder="Search here...">
                        <button type="submit"><i class='las la-search'></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="sign-in-area ptb-100">
        <div class="container"><br><br><br>
            <div class="row mt-5">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body padd-30">
                            <div class="row mb-3">
                                <div class="col-md-12 text-center">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <img style="width: 100%;height: 100%;" src="{{ url('public/images/') }}/{{$data->image}}" class="profile-image">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <b>{{ $data->url }}</b>
                                            <p>{{ $data->emailaddress }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <ul class="user-list">
                                <li><a href="javascript:void(0)" onclick="showSection(1);"><i class="las la-user"></i> My Profile</li></a>
                                <li><a href="javascript:void(0)" onclick="showSection(3);"><i class="las la-star"></i> Reviews</li></a>
                                <li><a href="javascript:void(0)" onclick="showSection(2);"><i class="las la-lock"></i> Security Settings</li></a>
                                <li><a href="{{url('logout/lawyer')}}"><i class="las la-sign-out-alt"></i> Logout</li></a>
                            </ul>
                            <hr>
                            <div class="btn btn-danger " data-toggle="modal" data-target="#exampleModal">Claim/Display the Top10 Rated Badge on Website</div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Select Logo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body bg-dark">
                        <?php //print_r($pics); ?>
                        @foreach($pics as $key=>$pic)
                        @if($key%2==0)
                        <hr>
                        @endif
                            <img id="" onclick="getCodeForLogo($(this).attr('src'))" src="{{ url('public/embededLogo/') }}/{{$pic}}" width="350" height="200" class="mr-2" alt="">
                        @endforeach
                        </div>
                        <!-- <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                        </div> -->
                    </div>
                    </div>
                    </div>
                    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Embed Code</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body ">
                            <div class="row">
                        <div class="col-6"><input onkeyup="dimensions($(this).val(),'h')" id="height" type="number"class="form-control"  placeholder="Height" ></div>
                        <div class="col-6"><input onkeyup="dimensions($(this).val(),'w')" id="width" type="number" class="form-control" placeholder="Width" ></div>   
                        <input type="text" hidden  name="" id="srcimg">
                        <input type="text" style="display:none;" id="modifiedCode" >    
                    </div>
                   
                        <pre id="codeEmbed">
           

                        </pre>
                        </div>
                        <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                        <button type="button" onclick="copyCode()" id="copyCode" disabled class="btn btn-primary">Copy Code</button>
                        </div>
                    </div>
                    </div>
                    </div>
                <div class="col-md-9">
                   <!--  <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                              Your changes has been received and it will be updated once we confirmed from ourside. 
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                              Password saved successfully
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                        </div>
                    </div> -->
                    <div class="card mb-3" id="section1">
                        <div class="card-body padd-30">
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="card-title">My Profile</h5>
                                    
                                </div>
                            </div>
                            <hr>
                            <div class="container-fluid">
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
          <div class="card">
              <div class="card-body">
                  
                  <form method="post" action="{{ url('updateUnapprovedLawyer') }}" id="updateLawyer" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                     <input type="hidden" value="{{ $data->id }}" name="id" >
                     <div class="row">
                        <div class="col-lg-6 col-md-6">
                          <div class="form-group mb-3">
                                <label for="validationCustom01">Select Category</label>
                                <select id="service" name="categoryid"  class="form-control"  required="">
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
                                <select id="cities" class="form-control" name="cityid" required="">
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
                            <div class="form-group mb-3 " hidden>
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
                            <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
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
                                <input  type="email" class="form-control" name="email" id="validationCustom05"
                                    placeholder="Email Address" value="{{ $data->emailaddress }}" >
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
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
                         
                           
                        </div>
                        
                     </div>
                      <!-- <button class="btn btn-primary" type="submit">Update Lawyer</button> -->
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
                              <button class="btn btn-danger" type="submit">Upload lawyer  Image</button>
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
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <button class="default-btn-one" onclick="$('#updateLawyer').submit()">
                                        Save Now
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="passwordSection" class="mb-5 mb-5 mt-5"></div>

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
                                        <input type="password" class="form-control"  name="oldpass">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="lable-control">New Password</label>
                                        <input type="password" class="form-control" id="newpass" name="newpass">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="lable-control">Confirm Password </label>
                                        <input type="password" class="form-control" id="cpass" name="cpass">
                                    </div>
                                </div>
                            </div>
                            </form>
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <button class="default-btn-one" onclick="changepssword()">
                                        Save Now
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="reviewsSection" class="mb-5 mb-5"></div>
                  
                    @if(isset($reviews))
                    @foreach($reviews as $r)
                    
                    <div class="card mb-3" id="section3">
                    <h3>Reviews</h3>
                        <div class="card-body pd-review">
                            <div class="row">
                                <div class="col-md-8 col-12">
                                    <p>Posted by <b>{{$r->name}}</b></p>
                                    <div class="ratings-attorney mt-1">
                                        @for($i=1;$i<=$r->rattings;$i++)
                                        <i class="las la-star"></i>
                                        @endfor
                                        @for($j=$i;$j<=5;$j++)
                                        <i class="lar la-star"></i>
                                        @endfor
                                    </div>
                                </div>
                                <div class="col-md-4 col-4 text-right">
                                    <small class="mt-10">{{$r->created_at}}</small>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <p>
                                       {{$r->review}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                   
                    @endforeach
                   
                 @endif
                 @if(count($reviews)==0)
                  <h1>no reviews!</h1>
                 @endif
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
       
  </script>
@endsection