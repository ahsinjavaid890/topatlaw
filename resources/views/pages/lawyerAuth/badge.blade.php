@extends('layouts.app')
@section('title')
<title>Badge</title>
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
              <h3>Badges</h3>
              <p>Claim and Display the Top10 Rated Badge on your Website.</p>
          </div>
      </div>
    </div>

    <div class="container vh-70 mt-4 mb-4">
        <div class="row mt-5">
            <div class="col-md-3">
                 @include('pages.lawyerAuth.navbar')
            </div>
            <div class="col-md-9">
                <div class="row">
                    @foreach($pics as $key=>$pic)
                        @if($key%2==0)
                
                        @endif
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <img id="" onclick="getCodeForLogo($(this).attr('src'))" src="{{ url('public/embededLogo/') }}/{{$pic}}" style="width: 100%; height: 150px; object-fit:contain;" class="mr-2" alt="">
                                </div>
                                <button onclick="getCodeForLogo($(this).attr('src'))" class="btn btn-secondary rounded-circle copy-button">
                                    <i class="las la-copy"></i>
                                </button>
                            </div>
                        </div>
                     @endforeach
                </div>

                <div id="passwordSection" class="mb-5 mb-5 mt-5"></div>
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
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Embed Code</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ">
                    <div class="row">
                        <div class="col-6">
                            <input onkeyup="dimensions($(this).val(),'h')" id="height" type="number"class="form-control"  placeholder="Height" >
                        </div>
                        <div class="col-6">
                            <input onkeyup="dimensions($(this).val(),'w')" id="width" type="number" class="form-control" placeholder="Width" >
                        </div>   
                        <input type="text" hidden  name="" id="srcimg">
                        <input type="text" style="display:none;" id="modifiedCode" >    
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <pre id="codeEmbed"></pre>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                <button type="button" onclick="copyCode()" id="copyCode" disabled class="default-btn-one">Copy Code</button>
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