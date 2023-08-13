@extends('layouts.app')
@section('title')
<title>Dashboard</title>
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
              <h3>Dashboard</h3>
              <p>Edit, modify, and boost your profile.</p>
          </div>
      </div>
    </div>

    <div class="container vh-70">
        <div class="row">
            <div class="col-md-3">
                @include('pages.lawyerAuth.navbar')
            </div>
            <div class="col-md-9 pt-3">
                <div class="row">
                    <div class="col-md-12">
                        @if($data->approve_profile == 0)
                        <div class="alert alert-danger alert-dismissible d-flex justify-content-between align-items-center p-2">
                          <div class="font-13 pl-2">
                              Your profile Isn't complete.Please review all the detail before going live.
                          </div>
                          <div>
                              <a href="{{url('profile/lawyer')}}" class="btn btn-light font-13" >Complete Now</a>
                          </div>
                        </div>
                        @endif  
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card boost-profile-card">
                            <div class="card-body">
                                <div class="d-flex flex-column">
                                    <div>
                                        <h4>Boost Profile</h4>
                                        <p>Boost your profile to get more leads.</p>
                                    </div>
                                    <div class="mt-5">
                                        @if($data->approve_profile == 0)
                                        <a class="javascript:void(0)">Boost Now</a>
                                        @else
                                        <a href="{{url('profile/boost')}}">Boost Now</a>
                                       @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card p-2 radius-cs">
                            <div class="card-body">
                                <div class="d-flex flex-column">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 27 27" fill="none">
                                          <path d="M17.3138 5.86125L18.9 9.03374C19.1138 9.47249 19.6876 9.88874 20.1713 9.97874L23.0401 10.4512C24.8738 10.755 25.3013 12.0825 23.9851 13.41L21.7463 15.6487C21.375 16.02 21.1613 16.7512 21.2851 17.28L21.9263 20.0475C22.4326 22.23 21.2626 23.085 19.3388 21.9375L16.6501 20.34C16.1663 20.0475 15.3563 20.0475 14.8726 20.34L12.1838 21.9375C10.2601 23.0737 9.09006 22.23 9.59631 20.0475L10.2376 17.28C10.3613 16.7625 10.1476 16.0312 9.77632 15.6487L7.53758 13.41C6.22133 12.0937 6.64883 10.7662 8.48258 10.4512L11.3513 9.97874C11.8351 9.89999 12.4088 9.47249 12.6226 9.03374L14.2088 5.86125C15.0526 4.14 16.4476 4.14 17.3138 5.86125Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                          <path d="M9 5.625H2.25" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                          <path d="M5.625 21.375H2.25" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                          <path d="M3.375 13.5H2.25" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <div class="mt-4">
                                        <h4>300</h4>
                                        <p>Profile Views <span class="text-danger">(+20%)</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card p-2 radius-cs">
                            <div class="card-body">
                                <div class="d-flex flex-column">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 27 27" fill="none">
                                          <path d="M17.3138 5.86125L18.9 9.03374C19.1138 9.47249 19.6876 9.88874 20.1713 9.97874L23.0401 10.4512C24.8738 10.755 25.3013 12.0825 23.9851 13.41L21.7463 15.6487C21.375 16.02 21.1613 16.7512 21.2851 17.28L21.9263 20.0475C22.4326 22.23 21.2626 23.085 19.3388 21.9375L16.6501 20.34C16.1663 20.0475 15.3563 20.0475 14.8726 20.34L12.1838 21.9375C10.2601 23.0737 9.09006 22.23 9.59631 20.0475L10.2376 17.28C10.3613 16.7625 10.1476 16.0312 9.77632 15.6487L7.53758 13.41C6.22133 12.0937 6.64883 10.7662 8.48258 10.4512L11.3513 9.97874C11.8351 9.89999 12.4088 9.47249 12.6226 9.03374L14.2088 5.86125C15.0526 4.14 16.4476 4.14 17.3138 5.86125Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                          <path d="M9 5.625H2.25" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                          <path d="M5.625 21.375H2.25" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                          <path d="M3.375 13.5H2.25" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <div class="mt-4">
                                        <h4>300</h4>
                                        <p>Profile Views <span class="text-danger">(+20%)</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="card mb-3" id="">
                            <div class="card-body padd-30">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="card-title">Recent Review</h4>
                                    </div>
                                </div>
                                <div class="row">
                                 <table class="table">
                                    <thead></thead>
                                      <tbody>
                                        @if(count($review) > 0)          
                                        @foreach($review as $r)      
                                        <tr>
                                          <td>
                                             <div class="d-flex align-items-center">
                                                <div class="symbol symbol-50 symbol-light-dark bg-light-primary">
                                                    <div class="symbol-label font-size-h5 bg-light-primary">
                                                        <img  src="{{ url('public/images/imagplaceholder.jpg') }}" height="50" width="50" class="rounded">
                                                        
                                                    </div>
                                                </div>
                                                <div class="ml-2">
                                                    <span class="text-dark-75 font-weight-bold line-height-sm d-block pb-2">{{$r->name}}</span>
                                                    <a href="#" class="text-muted text-hover-primary">{{ \Carbon\Carbon::parse($r->created_at)->format('M d Y')}}</a>
                                                         
                                                </div>
                                            </div>
                                          </td>
                                          <td><p class="show-read-more">{{Str::limit($r->review,100)}}</p></td>
                                          <td>
                                               @for ($i = 1; $i < 6; $i++)
                                                @if ($r->rattings >= $i)
                                                <i class="las la-star" style="color:#FF4545;"></i>
                                                @endif
                                               @endfor 
                                          </td>
                                          <td>
                                              <button class="btn btn-light" type="button">Request Change</button>
                                          </td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <p class="ml-3">No Review Found</p>
                                        @endif
                                      
                                      </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                <div class="modal-body"></div>
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