@extends('layouts.app')
@section('title')
<title>Boost Checkout</title>
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
   
   .select2-container {
  min-width: 400px;
}

.select2-results__option {
  padding-right: 20px;
  vertical-align: middle;
}
.select2-results__option:before {
  content: "";
  display: inline-block;
  position: relative;
  height: 20px;
  width: 20px;
  border: 2px solid #e9e9e9;
  border-radius: 4px;
  background-color: #fff;
  margin-right: 20px;
  vertical-align: middle;
}
.select2-results__option[aria-selected=true]:before {
  font-family:fontAwesome;
  content: "\f00c";
  color: #fff;
  background-color: #f77750;
  border: 0;
  display: inline-block;
  padding-left: 3px;
}
.select2-container--default .select2-results__option[aria-selected=true] {
	background-color: #fff;
}
.select2-container--default .select2-results__option--highlighted[aria-selected] {
	background-color: #eaeaeb;
	color: #272727;
}
.select2-container--default .select2-selection--multiple {
	margin-bottom: 10px;
}
.select2-container--default.select2-container--open.select2-container--below .select2-selection--multiple {
	border-radius: 4px;
}
.select2-container--default.select2-container--focus .select2-selection--multiple {
	border-color: #f77750;
	border-width: 2px;
}
.select2-container--default .select2-selection--multiple {
	border-width: 2px;
}
.select2-container--open .select2-dropdown--below {
	
	border-radius: 6px;
	box-shadow: 0 0 10px rgba(0,0,0,0.5);

}
.select2-selection .select2-selection--multiple:after {
	content: 'hhghgh';
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
                                            <img style="width: 100px;height: 100px; border-radius: 100px; object-fit:cover;" src="{{ url('public/images/') }}/{{$data->image}}" class="profile-image">
                                        </div>
                                    </div>
                                    
                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <b>{{ $data->name }}</b>
                                            <p>{{ $data->emailaddress }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                                                          

                         @include('pages.lawyerAuth.navbar')
                            <hr>
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
                        <div class="modal-body">


                        

                      
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
                                    <h5 class="card-title">Fininlize Subscription</h5>
                                    
                                </div>
                            </div>
                            <hr>
                             <div class="col-md-12">
                                    <h5 class="card-title">Your Purchase Plan</h5>
                                    
                                </div>
                                 
                            <div class="container-fluid">
                              <!-- start page title -->
                              
                              <!-- end page title -->
                                @if(session()->has('message'))
                                    <div class="alert alert-success alert-dismissible">
                                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        {{ session()->get('message') }}
                                    </div>
                                @endif
                                <br />
                                
                               

                              <div class="row">
                                  <div class="col-lg-12">
                               
                                <div class="card border-primary mb-3 border border-dark" style="width: 100%;">
                                  <div class="card-body m-2">
                                 <div class="float-right">${{$lawyerplan->totalprice}}/{{$plan->plan_type}} Days</div>

  
                                  <span class="text-dark-75 font-weight-bold line-height-sm d-block">{{$plan->plan_title}}</span>
                                  <span class="text-dark d-block ">{{$plan->plan_detail}}</span>


                                      </label>
                                    

                                
                    
                                      
                                      
                                  </div> 
                                  </div>
                                  </div>
                                                        

                                
                                
                              </div>
                              
                                <form id="checkout-form">
                                  <div class="row mt-3">
                                       
                                        <div class="col-md-12 w-100">
                                           
                                            <div class="row">                                      
                                                <div style="display:none;" class="card-wrapper"></div>
                                                <div class="col-md-12 mb-3">
                                                    <div class="form-group">
                                                      <div class="textfield--float-label">
          <!-- Begin hosted fields section -->
                                                          <label class="hosted-field--label" for="card-number">
                                                            Credit Number
                                                          </label>
                                                            <div id="card-number" class="hosted-field"></div>
                                                          <!-- End hosted fields section -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <div class="form-group">
                                                        <div class="textfield--float-label">
          <!-- Begin hosted fields section -->
                                                  <label class="hosted-field--label" for="expiration-date">
                                                     <span class="icon">
                                                   </span>
                                                    Expiration Date</label>
                                                  <div id="expiration-date" class="hosted-field"></div>
                                                  <!-- End hosted fields section -->
                                                </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <div class="form-group">
                                                          <div class="textfield--float-label">
          <!-- Begin hosted fields section -->
                                                      <label class="hosted-field--label" for="cvv">
                                                        <span class="icon">
                                                          </span>
                                                          CVV</label>
                                                      <div id="cvv" class="hosted-field"></div>
                                                      
                                                      <!-- End hosted fields section -->
                                                    </div>
                                                    </div>
                                                </div>
                                                
                                                <div id="card_error" class="ml-2 text-danger"></div>
                                              
                                                <div class="col-md-12 mb-3">
                                                    <div class="form-group">
                                                        <label class="lable-control">Promo Code</label>
                                                        <input type="text" class="form-control" placeholder="Enter promo code" name="promo-code">
                                                    </div>
                                                </div>
                                                
                                    <div class="col-md-12">
                                        
                                            <label for="vehicle1" class="ml-2">
                                            <input type="checkbox" id="vehicle1" name="vehicle" value="Bike" class="mt-2" required>
                                            I agree the  <a href="https://topatlaw.com/terms" style="color:#c8242f;" target="_blank">Terms of Use</a> & <a href="https://topatlaw.com/privacypolicy" style="color:#c8242f;" target="_blank"> Privacy Policy.</a> </label>
                                        
                                    </div>
                                            <button class="pay-button thm-btn btn default-btn-one mr-5">Confirm and Pay</button>

                                            </div>
                                          
                                        </div>
                                          
                                    </div>
                                    </form>
                                    
    
 
                              <!-- end row -->

                            </div> <!-- container -->
                         
                        </div>
                        
                        
                    </div>
                    
<div class="modal fade p-5" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
 
      <div class="modal-body text-center p-5">
        <!-- Modal content goes here -->
        <img src="https://cdn-icons-png.flaticon.com/128/447/447992.png">
        
        <h6 class="message mt-2"></h6>
        <p>You Will receive Confirmation email with final details</p>
        <button type="button" class="btn default-btn-one" onclick="modal_close()">Got It</button>
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>

                    
    <div id="passwordSection" class="mb-5 mb-5 mt-5"></div>

              
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
        
          function getplan(id,price)
          {
            
           $('#price').html('$'+price);
           $('#plan_id').val(id);

           $('.planmodal').prop('disabled',false);


          }
          
          function cancelplan()
          {
        var radio = document.getElementById("radio");
        radio.checked = false;
         
         
           $('.planmodal').prop('disabled',true);

              
          }
          
          
            function modal_close()
          {
         
           window.location.href = '/profile/dashboard';
              
          }


  </script>
  
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" />

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
  <script>
      
		$(".js-select2").select2({
			closeOnSelect : false,
			placeholder : "",
			allowHtml: true,
			allowClear: true,
			tags: true // создает новые опции на лету
		});
  </script>
  
    <script src="https://js.braintreegateway.com/web/3.79.1/js/client.min.js"></script>
    <script src="https://js.braintreegateway.com/web/3.79.1/js/hosted-fields.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
            $(document).ready(function(){
            var url = "{{url('profile/client_token')}}";    
            $.get(url, function(response) {
                braintree.client.create({
                    authorization: response.clientToken
                }, function(err, clientInstance) {
                    if (err) {
                        console.error(err);
                        return;
                    }
                    
    var value = "{{$lawyerplan->totalprice}}";
    var planid = "{{$lawyerplan->id}}";
    var plan_id = "{{$plan->id}}";

                    braintree.hostedFields.create({
                        client: clientInstance,
                          styles: {
                                 'input': {
                                'color': '#282c37',
                                'font-size': '16px',
                                
                                'line-height': '3'
                              },
                                ':focus': {
                                    'color': 'black'
                                },
                                '.valid': {
                                    'color': 'black'
                                },
                                '.invalid': {
                                    'color': 'black'
                                }
                                },
                        fields: {
                            number: {
                                selector: '#card-number',
                                placeholder: '4111 1111 1111 1111'
                            },
                            cvv: {
                                selector: '#cvv',
                                placeholder: '123'
                            },
                            expirationDate: {
                                selector: '#expiration-date',
                                placeholder: 'MM/YYYY'
                            },
                          
                        }
                    }, function(err, hostedFieldsInstance) {
                        if (err) {
                            console.error(err);
                            return;
                        }
                        
                          

                        document.getElementById('checkout-form').addEventListener('submit', function(event) {
                            event.preventDefault();

                            hostedFieldsInstance.tokenize(function(err, payload) {
                                if (err) {
                                    console.error(err);
                                    $('#card_error').html(err.message);
                                    return;
                                }

                                var nonce = payload.nonce;
                                var urlnew = "{{url('boost/private-process-payment')}}";

                                $.get(urlnew, { nonce:nonce,value:value,planid:planid,plan_id:plan_id}, function(response) {
                                    if(response.success == true)
                                    {
                                        $('#card_error').html('');
                                       $('#myModal').modal('show');
                                        $('.message').html(response.message);
                                    
                                    }else
                                    {
                                       console.log(response.message); 
                                        
                                    }
                                    
                                });
                            });
                        });
                    });
                });
            });
        });
    </script>
    <style>
        <style>
#checkout-form {
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
}


/*--------------------
PANEL FORM
--------------------*/

.panel__content {
  padding: 1em 2em;
 
}

.textfield--float-label {
  width: 50%;
  float: left;
  display: inline-block;
  padding-right: 5px;
}






.hosted-field {
  height: 50px;
 
  display: block;
  color: black;
  border-bottom: 1px solid rgba(0, 0, 0, .26);
  border-top: 1px solid rgba(0, 0, 0, .26);
  border-left: 1px solid rgba(0, 0, 0, .26);
  border-right: 1px solid rgba(0, 0, 0, .26);
  width: 200%;
  font-size: 16px;
  padding: 16px;
  border-radius: 5px;
  
}

.pay-button {
  /*background: #ffd223;*/
  /*color: #ffd223;*/
  margin: 0 auto;
  border: 0;
  border-radius: 3px;
  padding: 1em 3em;
  font-size: 1em;
  text-transform: uppercase;
  box-shadow: 0 0 2px rgba(0, 0, 0, .12), 0 2px 2px rgba(0, 0, 0, .2);
}


/*--------------------
BT HOSTED FIELDS SPECIFIC 
--------------------*/

.braintree-hosted-fields-focused {
  border-bottom: 2px solid;
}
</style>
    
@endsection