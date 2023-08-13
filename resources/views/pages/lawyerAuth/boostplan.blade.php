@extends('layouts.app')
@section('title')
<title>Boost Plan</title>
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

    <div class="page-header d-flex align-items-center justify-content-left" style="height: 200px; margin-top: 5%;">
      <div class="container">
          <div class="" style="width:75%; margin-left: 25%;">
              <h3>Boots Profile</h3>
              <p>Subscribe below to boost your profile.</p>
          </div>
      </div>
    </div>
   
    <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include('pages.lawyerAuth.navbar')
                </div>
                <div class="col-md-9">
                    <div class="card mb-3" id="section1">
                        <div class="card-body padd-30">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="card-title">Select a Plan</h5>
                                    <p>Only 3 profiles are featured on top of the category page.</p>
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
                                
                                
                           <div class="card-body card border-primary  " style="float:right;width: 23rem">
                                <h5 class="card-title">What's in {{$checkplan->plan_title}} plan ? </h5>
                                <span class="text-dark mt-2 p-1"><i class="fa fa-check-circle mr-2"></i>{{$checkplan->planfeature}}</span>
                               <span class="text-dark  mt-2 p-1"><i class="fa fa-check-circle mr-2"></i>{{$checkplan->planfeature_1}}</span>
                               <span class="text-dark mt-2 p-1"><i class="fa fa-check-circle mr-2"></i>{{$checkplan->planfeature_2}}</span>
                               <span class="text-dark mt-2 p-1 "><i class="fa fa-check-circle mr-2"></i>{{$checkplan->planfeature_3}}</span>
                               <span class="text-dark mt-2 p-1 "><i class="fa fa-check-circle mr-2"></i>Please contact us if you need a more customized solution for all your digital marketing needs, including content marketing and SEO support.</span>    
                            </div>
 
                              <div class="row">
                                  
 
                                @foreach($plan as $p)
                                <div class="col-md-8">
                               
                                <div class="card border-primary mb-3" style="width: 22rem;">
                                  <div class="card-body m-2">
                                 <div class="float-right ">${{$p->plan_price}}/{{$p->plan_type}} Days</div>

                                <div class="form-check ">
                                  <input class="form-check-input mt-4" @if($p->id == $checkplan->id) checked @endif @foreach($lawyerplan as $l)@if($l->plan_id == $p->id) disabled @endif @endforeach type="radio" onclick="getplan({{$p->id}},'{{$p->plan_price}}')" name="flexRadioDefault" id="radio">
                                  <label class="form-check-label" for="flexRadioDefault1">
                                      {{$p->plan_title}}
                                      <br>
                                      {{$p->plan_detail}}
                                  <span class="text-dark-75 font-weight-bold line-height-sm d-block"></span>
                                   <span class="text-dark d-block "></span>


                                      </label>
                                    

                                    </div>
                    
                                      
                                      
                                  </div> 
                                  </div>
                                  
                                  
                                  
                                  </div>
                                  
                            
                                                        
                                  @endforeach
                             <div class="col-md-12">
                                 
                                 
                           <div class="card border-primary mb-3" style="width: 22rem;">
                                 <div class="card-body m-2">
                                 
                                 <div class="float-right"> 
                                  <button class="btn btn-dark"   data-toggle="modal" data-target="#exampleModalPlancustom" >
                                        Contact Us
                                    </button>
                                 </div>

                             

                                  <span class="text-dark-75 font-weight-bold line-height-sm d-block">Custom needs</span>
                                  <span class="text-dark d-block ">Contact Us for custome needs</span>


                                  </div> 
                                  </div>
                                  </div>
                                  
                                 
                         
                                
                                <div class="col-md-12 text-right">
                                      <button class="btn btn-light"  type="button" onclick="cancelplan();">
                                        Cancel
                                    </button>
                                   
                                   
                                     @if(count($lawyerplan) > 0)
                                    <button class="default-btn-one planmodal"     data-toggle="modal" data-target="#exampleModalPlan" >
                                        Upgrade Plan
                                    </button>
                                    @else
                                    <button class="default-btn-one planmodal"     data-toggle="modal" data-target="#exampleModalPlan" >
                                        Select Plan
                                    </button>
                                    @endif
                                   
                                    
                                </div>
                              </div>
                              
                                <div class="modal fade" id="exampleModalPlan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Select Areas</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                    <form method="post" action="{{ url('savelawyerplan') }}" id="updateLawyer"  class="needs-validation P-3" novalidate>
                                            @csrf
                                    <input type="hidden" id="plan_id" name="plan_id">  
                                    
                                       <input type="hidden" id="discountprice" name="planprice">  

                                      <div class="modal-body">
                                        <div class="alert alert-success alert-dismissible">
                                          <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
                                          15% discount for more then 1 area
                                            
                                        </div>
                                        <div class="row">
                                      <div class="col-md-12">
                                        <div class="form-group mb-3">
                                        <label for="validationCustom01">Choose Practise Area</label>
                                        <select id="service" name="categoryid[]" class="form-control select-field"   required>
                                             <option value="" selected>Select Service</option>
                                             <?php foreach(DB::table('categories')->where('status' , 1)->get() as $r){ ?>
                                              <option value="{{ $r->id }}">{{ $r->tittle }}</option>
                                             <?php }  ?>
                                            </select>
                                             </div>
                                            </div>
                                                                        
                                            <div class="col-md-12">
                                            <div class="form-group">
                                            <label for="validationCustom01">City</label>
                                            <br>
                                            <select id="cities" class="form-control"  name="cityid[]" required>
                                           
                                            </select>
                                            </div>
                                            </div>
                                            
                                             <div class="col-md-12">
                                                                           
                                            <a href="javascript:void(0);" class="add_button btn text-black btn-light w-100 " title="Add field">Add More Area</a>

                                                                            
                                            </div>
                                                                        
                                            </div>
                                            
                                            <div class="col-md-12 field_wrapper"></div>

                                
                                        <div class="d-flex">
                                          <div class="mr-auto p-2 ">Area Selected</div>
                                          <div class="p-2 area"></div>
                                          
                                        </div>
                                        <div class="d-flex">
                                          <div class="mr-auto p-2">Discount Applied</div>
                                          <div class="p-2 discount">0%</div>
                                          
                                        </div>
                                        <div class="d-flex">
                                          <div class="mr-auto p-2">Total Price</div>
                                          <div class="p-2" id="price">$ </div>
                                          
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="submit" class="btn default-btn-one">Continue</button>
                                      </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>

                                         
                                         
                                <div class="modal fade" id="exampleModalPlancustom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Custom Detail</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                    <form method="post" action="{{ url('savelawyerplancustom') }}" id="updateLawyer"  class="needs-validation P-3" novalidate>
                                    @csrf
                                      <div class="modal-body">
                                        <div class="row">
                                          <div class="form-group mb-3 col-md-12">
                                              <label for="validationCustom03">Full Name</label>
                                              <input name="name" type="text"  class="form-control" id="validation9"required>
                                          </div>
                                           <div class="form-group mb-3 col-md-12">
                                              <label for="validationCustom01">Contact Number</label>
                                              <input name="contact" type="tel"  class="form-control" id="validation9" required>
                                              <div class="valid-feedback">
                                                  Looks good!
                                              </div>
                                          </div>
                                          
                                          <div class="form-group mb-3 col-md-12">
                                              <label for="validationCustom02">Short Description</label>
                                              <textarea id="validationCustom02" name="description" class="form-control" placeholder="Enter Short Description" id="shortdescription" required></textarea>
                                              <div class="valid-feedback">
                                                  Looks good!
                                              </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="submit" class="btn default-btn-one">Continue</button>
                                      </div>
                                      </form>
                                    </div>
                                  </div>
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
        
          function getplan(id,price)
          {
            
           $('#price').html('$'+price);
           $('#plan_id').val(id);
           $('#discountprice').val(price);

           $('.planmodal').prop('disabled',false);


          }
          
          function cancelplan()
          {
        var radio = document.getElementById("radio");
        radio.checked = false;
         
         
           $('.planmodal').prop('disabled',true);

              
          }
          
          	$(document).ready(function(){
          	    var id="{{$checkplan->id}}";
          	    var p= "{{$checkplan->plan_price}}";
		        getplan(id,p);
	     	});  



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
		

		$(document).on('change', '.select-field', function() {
        var selectedCount = $('.select-field option:selected').length;
        console.log('Selected options count:', selectedCount);
        $('.area').html(selectedCount);
        var price = $('#discountprice').val();
        if(selectedCount > 1)
        { 
            var discount = (15*100/100);
            var newprice = (price - (15*100/100)); 
            $('#price').html('$'+newprice);
            $('.discount').html('15% '+ (-discount));

        }else{
         $('#price').html('$'+price);
          $('.discount').html('0%');

        }
    });
    
    
	
		

	
		$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    
    var jsonData = <?php echo DB::table('categories')->where('status' , 1)->get() ?>;
    
 var selectOptions = '';
    for (var i = 0; i < jsonData.length; i++) {
        selectOptions += '<option value="' + jsonData[i].id + '">' + jsonData[i].tittle + '</option>';
    }
    var fieldHTML = '<div class="d-flex w-100 mb-3"><select id="service" name="categoryid[]" onchange="getcity(this.value)" class="form-control mt-3 category mr-4 select-field"><option value="">Select Service</option>' + selectOptions + '</select> <select id="cities" class="form-control city mt-3" required name="cityid[]" ></select><a href="javascript:void(0);" class="remove_button btn btn-danger mt-4 ml-1 h-25"><i class="las la-trash"></i></a></div>';
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
    var selectedCount = $('.select-field option:selected').length;
        var newcount = selectedCount--;
        $('.area').html(newcount);
        
        var price = $('#discountprice').val();
        if(newcount <= 1)
        { 
          
          $('#price').html('$'+price);
          $('.discount').html('0%');
        }
        

        
       
    });
});

   
               function getcity(val)
               {
               var categoryID = val;
             
               if(categoryID) {
                   $.ajax({
                         url: '/getCourse/'+categoryID,
                       type: "GET",
                       data : {},
                       dataType: "json",
                       success:function(data)
                       {
                         if(data){
                           $('.city').empty();
                           var selectData = '';
                            $.each(data, function(key, course){
                            selectData += '<option hidden value="">Choose City</option>'; 
                               selectData += '<option value="' + course.id  + '">' + course.tittle + '</option>';

                            });
                            
                            $('.city').append(selectData);
                            
                        }else{
                          
                        }
                     }
                   });
               }else{
                 $('#state').empty();
               }
               }
               
  
            
        
  </script>
@endsection