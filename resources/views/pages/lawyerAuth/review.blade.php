@extends('layouts.app')
@section('title')
<title>My Review</title>
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
              <h3>My Reviews</h3>
              <p>Check reviews from your clients and request changes.</p>
          </div>
      </div>
    </div>

    <div class="container vh-70 mt-4 mb-4">
        <div class="row mt-5">
            <div class="col-md-3">
                 @include('pages.lawyerAuth.navbar')
            </div>
            <div class="col-md-9">
                <div class="card mb-3" id="section1">
                    <div class="card-body padd-30">
                        
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="card-title">My Review</h5>
                                <p>Invite your clients to leave reviews on your live page. </p>
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

                                <table class="table">
                                  <thead>
                                 
                                  </thead>
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
                                    @endif
                                  
                                  </tbody>
                                </table>
                              </div> <!-- end col-->

                          </div>
                          <!-- end row -->

                        </div> <!-- container -->
                       
                    </div>
                </div>
                <div id="passwordSection" class="mb-5 mb-5 mt-5"></div>
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
  
  <script>
$(document).ready(function(){
	var maxLength = 100;
	$(".show-read-more").each(function(){
		var myStr = $(this).text();
		if($.trim(myStr).length > maxLength){
			var newStr = myStr.substring(0, maxLength);
			var removedStr = myStr.substring(maxLength, $.trim(myStr).length);
			$(this).empty().html(newStr);
			$(this).append(' <a href="javascript:void(0);" class="read-more">Read More...</a>');
			$(this).append('<span class="more-text">' + removedStr + '</span>');
		}
	});
	$(".read-more").click(function(){
		$(this).siblings(".more-text").contents().unwrap();
		$(this).remove();
	});
});
</script>
@endsection