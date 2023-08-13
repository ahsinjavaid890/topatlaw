@extends('layouts.app')
@section('title')
<title>{{ $data->name }} {{ $service->tittle }} Lawyer in {{ $city->tittle }}</title>
<style>
    .olt
    {
        overflow: hidden !important;
        text-overflow: ellipsis !important;
        display: -webkit-box !important;
        -webkit-line-clamp: 1 !important;
        -webkit-box-orient: vertical !important
    }
</style>

@endsection
@section('content') 
<div class="attorney-details pt-100 pb-70 mt-70">
        <div class="container faq-area">
        	<div class="row">
        		<div class="col-md-12">
        			<nav aria-label="breadcrumb">
					  <ol class="breadcrumb">
					    <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
					    <li class="breadcrumb-item"><a href="{{ url('lawyers/') }}/{{ $service->url }}">{{ $service->tittle }}</a></li>
					    <li class="breadcrumb-item"><a href="{{ url('lawyers/') }}/{{ $service->url }}/{{ $city->url }}">{{ $city->tittle }}</a></li>
					    <li class="breadcrumb-item active" aria-current="page">Best {{ $service->tittle }} Lawyer in {{ $city->tittle }}</li>
					    <li class="breadcrumb-item active" aria-current="page">{{ $data->name }}</li>
					  </ol>
					</nav>
        		</div>
        	</div>
			@if(session()->has('message'))
        <div class="alert alert-success alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session()->get('message') }}
        </div>
    @endif
            <div class="row mt-3">
                <div class="col-lg-4">
                    <div class="attor-details-item">
                    	@if($data->image == 'noimage.jpg')
                    	<img src="{{ url('public/images/imagplaceholder.jpg') }}" alt="{{ $data->name }}">
                    	@else
                        <img src="{{ url('public/images') }}/{{ $data->image }}" alt="{{ $data->name }}">
                        @endif
                        <div class="attor-details-left">
                            <div class="attor-social-details">
                                <h3 class="pt-5">Contact Info</h3>
                                @if(!empty($data->website))
                                    
                                        
                                        <a href="{{ $data->website }}">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <span style="color:black" class="text-gray">Website:</span>
                                                </div>
                                                <div class="col-md-9">
                                                    <span class="olt">{{ $data->website }}</span>
                                                </div>
                                            </div> 
                                        </a>
                                            
                                    
                                    @endif
                                
                            	@if(!empty($data->phonenumber || $data->emailaddress || $data->officeaddress))
                                	<h3 class="pt-5">Contact info</h3>
                                @endif
                                <ul>
                                	@if(!empty($data->phonenumber))
                                    <li>
                                        <i class="las la-phone-volume"></i>
                                        <a href="tel:{{ $data->phonenumber }}">
                                            Call : {{ $data->phonenumber }}
                                        </a>
                                    </li>
                                    @endif
                                    @if(!empty($data->emailaddress))
                                    <li>
                                        <i class="las la-envelope"></i>
                                        <a href="#">
                                            <span class="__cf_email__" data-cfemail="325a575e5e5d7253465d405c1c515d5f">{{ $data->emailaddress }}</span>
                                        </a>
                                    </li>
                                    @endif
                                    @if(!empty($data->officeaddress))
                                    <li>
                                        <i class="las la-map-marker"></i>
                                        {{ $data->officeaddress }}
                                    </li>
                                    @endif
                                    
                                    
                                </ul>
                                <div class="row mt-4">
                                	<div class="col-md-12">
                                		<ul class="social-links-profile">
                                			<!--@if(!empty($data->facebook))-->
		                                 <!--   <li>-->
		                                 <!--       <a href="{{ $data->facebook }}" target="_blank">-->
		                                 <!--           <i class="lab la-facebook-f"></i>-->
		                                 <!--       </a>-->
		                                 <!--   </li>-->
		                                 <!--   @endif-->
		                                 <!--   @if(!empty($data->twitter))-->
		                                 <!--   <li>-->
		                                 <!--       <a href="{{ $data->twitter }}" target="_blank">-->
		                                 <!--           <i class="lab la-twitter"></i>-->
		                                 <!--       </a>-->
		                                 <!--   </li>-->
		                                 <!--   @endif-->
		                                    @if(!empty($data->linkdlin))
		                                    <li>
		                                        <a href="{{ $data->linkdlin }}" target="_blank">
		                                            <i class="lab la-linkedin-in"></i>
		                                        </a>
		                                    </li>
		                                    @endif
		                                </ul>
                                	</div>
                                </div>
                                @if(!empty($data->field1))
                                	<h3 class="pt-1">Aditional Links</h3>
                                @endif
                                <ul>
                                	
                                	@if(!empty($data->field1))
                                    <li>
                                        <i class="las la-link"></i>
                                        <a href="{{ $data->link1 }}">
                                            {{ $data->field1 }}
                                        </a>
                                    </li>
                                    @endif
                                    @if(!empty($data->field2))
                                    <li>
                                        <i class="las la-link"></i>
                                        <a href="{{ $data->link2 }}">
                                            {{ $data->field2 }}
                                        </a>
                                    </li>
                                    @endif
                                    @if(!empty($data->field3))
                                    <li>
                                        <i class="las la-link"></i>
                                        <a href="{{ $data->link3 }}">
                                            {{ $data->field3 }}
                                        </a>
                                    </li>
                                    @endif
                                    @if(!empty($data->field4))
                                    <li>
                                        <i class="las la-link"></i>
                                        <a href="{{ $data->link4 }}">
                                            {{ $data->field4 }}
                                        </a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="card bg-danger text-white">
                    	<div class="card-body p-4">
                    		@if(!session()->has('user'))
                    			<p class="line-height-1">
                    				<a class="link-request" href="{{url('register/')}}">Create an account</a> to access/edit your profile
									and display our top ten rated seal on your 
									website.
                    			</p>
                    		@else
                    			<p class="line-height-1">
                    				<a class="link-request" href="{{url('register/')}}">Request</a> to access/edit your profile
									and display our top ten rated seal on your 
									website.
                    			</p>
                    		@endif 
                    	</div>
                    </div> -->


                </div>
                <div class="col-lg-8">
                    <div class="attor-details-item">
                        <div class="attor-details-right">
                            <div class="attor-details-name">
                                <h2>{{ $data->name }}</h2>
                                <span>{{ $data->tagline }}</span>
                                <p>{{ $data->education }}</p>
                            </div>
                            <div class="attor-details-things">
                                {!! $data->bio !!}
                            </div>

                            <div class="row">
                            	<div class="col-md-9 offset-md-1">
                            		<div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
		                                
		                            </div> <canvas id="chart-line" width="299" height="200" class="chartjs-render-monitor" style="display: block; width: 299px; height: 200px;"></canvas>
                            	</div>
                        
                            </div>
                            
                            <div class="mr-5 mt-3 text-center">
		            		<p class=" text-center">Full List of Top Rated Lawyers in <a href="{{ url('lawyers/') }}/{{ $service->url }}/{{ $city->url }}"> {{ $city->tittle }}</a></p>
		            	</div>
                            
                         

                        </div>
                    </div>    
				
		            <div class="row">
		            	<div class="col-md-6 mt-5 mb-2">
		            		<h3>Review <small>({{ $lawyerreviews->count() }})</small></h3>
		            	</div>

						
		            	<div class="col-md-6 text-right mt-5 mb-2">
		            		@if(!DB::table('lawyers')->where('id',session()->get('user'))->where('url',$url)->exists())
		            			<button type="submit" class="default-btn-one mr-2" data-toggle="collapse" data-target="#demo">Add Review</button>
		            		@endif

		            		<button type="submit" class="btn-secondary default-btn-one" data-toggle="modal" data-target="#exampleModal">Claim Profile</button>
		            	</div>
						
		            	<!-- Modal -->
						<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLabel">Claim Profile</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
							<form action="{{url('claim-profile')}}" method="post">
								@csrf
						        <div class="form-group">
						        	<label class="lable-control">Enter Your name</label>
						        	<input type="text" class="form-control" placeholder="" name="name" required>
						        </div>

						        <div class="form-group">
						        	<label class="lable-control">Email address</label>
						        	<input type="text" class="form-control" placeholder="" name="email" required>
						        </div>

						        <div class="form-group">
						        	<label class="lable-control">Phone number</label>
						        	<input type="text" class="form-control" placeholder="" name="phone">
						        </div>

						        <div class="form-group">
						        	<label class="lable-control">Tell Us a little about yourself</label>
						        	<textarea class="form-control" name="description" rows="5"></textarea>
						        </div>
								<input type="text" hidden="hidden" name="username" value="{{$data->url}}">
								<input type="text"  hidden="hidden" name="userid" value="{{$data->id}}">
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-secondary p-2" data-dismiss="modal">Close</button>
						        <button type="submit" class="btn btn-danger p-2">Submit Now</button>
						      </div>
							  </form>
						    </div>
						  </div>
						</div>
						

		            </div>
					
		            <div class="contact-form pd-30 collapse" id="demo">
		                <form id="addreview"  method="get">
		                	{{ csrf_field() }}
		                	<input type="hidden" value="{{ $data->id }}" name="id" id="id">
		                    <div class="section-title">
		                        <h4>Review your lawyer</h4>
		                    </div>

		                    <input type="hidden" id="selectedratting" name="ratingstar">

		                    <div class="row mb-3">
		                    	<div class="col-md-12 text-left">
		                    		<div class="starrating risingstar d-flex justify-content-center flex-row-reverse">
						            <input type="radio" class="ratingstar" onclick="setratting(5)" id="star5" name="rating" value="5" /><label for="star5" title="5 star">5</label>
						            <input type="radio" class="ratingstar" onclick="setratting(4)" id="star4" name="rating" value="4" /><label for="star4" title="4 star">4</label>
						            <input type="radio" class="ratingstar" onclick="setratting(3)" id="star3" name="rating" value="3" /><label for="star3" title="3 star">3</label>
						            <input type="radio" class="ratingstar" onclick="setratting(2)" id="star2" name="rating" value="2" /><label for="star2" title="2 star">2</label>
						            <input type="radio" class="ratingstar" onclick="setratting(1)" id="star1" name="rating" value="1" /><label for="star1" title="1 star">1</label>
						        </div>
		                    	</div>
		                    </div>
		                    <div class="row">
		                        <div class="col-md-6">
		                            <div class="form-group">
		                                <input type="text" name="name" class="form-control" id="name" required data-error="Please enter your name" placeholder="Your Name">
		                                <div class="help-block with-errors"></div>
		                                <i class="las la-user"></i>
		                            </div>
		                        </div>
		                        <div class="col-md-6">
		                            <div class="form-group">
		                                <input type="email" name="email" class="form-control" id="email" required data-error="Please enter your email" placeholder="Email Address">
		                                <div class="help-block with-errors"></div>
		                                <i class="las la-envelope"></i>
		                            </div>
		                        </div>
		                        <div class="col-lg-12 col-md-12">
		                            <div class="form-group">
		                                <textarea name="review" id="review" class="form-control" cols="30" rows="6" required data-error="Please enter your message" placeholder="Write your Review"></textarea>
		                                <div class="help-block with-errors"></div>
		                                <i class="las la-edit"></i>
		                            </div>
		                        </div>
		                        <div class="col-lg-12 col-md-12">
		                            <div class="form-group">
		                        <div class="g-recaptcha brochure__form__captcha" data-sitekey="6LezaykaAAAAADCdkFXrW6JUmuS9z25BmgPp0Nr8"></div>
		                        	</div>
		                        	<div style="color: red;" class="captchaerror"></div>
		                        </div>
		                        <div class="col-lg-12 col-md-12 mt-3">
		                            <button type="submit" class="default-btn-one">Submit Review</button>
		                            <div id="msgSubmit" class="h3 text-center hidden"></div>
		                            <div class="clearfix"></div>
		                        </div>
		                    </div>
		                </form>
		            </div>

		            <div class="row mt-3">
		            	<div class="col-md-12">
		            		@foreach($lawyerreviews as $r)
		            		<div class="card mb-3">
		            			<div class="card-body pd-review">
		            				<div class="row">
		            					<div class="col-md-8 col-12">
		            						<p>Posted by <b>{{ $r->name }}</b></p>
				                            <div class="ratings-attorney mt-1">
				                            	@if($r->rattings == 1)
				                                <i class="las la-star"></i>
				                                @endif
				                                @if($r->rattings == 2)
				                                <i class="las la-star"></i>
				                                <i class="las la-star"></i>
				                                @endif
				                                @if($r->rattings == 3)
				                                <i class="las la-star"></i>
				                                <i class="las la-star"></i>
				                                <i class="las la-star"></i>
				                                @endif
				                                @if($r->rattings == 4)
				                                <i class="las la-star"></i>
				                                <i class="las la-star"></i>
				                                <i class="las la-star"></i>
				                                <i class="las la-star"></i>
				                                @endif
				                                @if($r->rattings == 5)
				                                <i class="las la-star"></i>
				                                <i class="las la-star"></i>
				                                <i class="las la-star"></i>
				                                <i class="las la-star"></i>
				                                <i class="las la-star"></i>
				                                @endif
				                            </div>
		            					</div>
		            					<div class="col-md-4 col-4 text-right">
				                            <small class="mt-10">{{ date('M d , Y', strtotime($r->created_at)) }}</small>
		            					</div>
		            				</div>

		                            <div class="row mt-2">
		                            	<div class="col-md-12">
		                            		<p>
				                            	{{ $r->review }} 
				                            </p>
		                            	</div>
		                            </div>
		            			</div>
		            		</div>
		            		@endforeach
		            	</div>
		            </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    	function setratting(id)
	    {
	    	$('#selectedratting').val(id);
	    }
	    $(document).ready(function() {
	        var ctx = $("#chart-line");
	        var myLineChart = new Chart(ctx, {
	            type: 'pie',
	            data: {
	                labels: ["Experience", "Our Assessment", "Online Reviews", "Online Profiles"],
	                datasets: [{
	                    data: [{{ $data->r_experience }}, {{ $data->r_personal }}, {{ $data->r_online_reviews }}, {{ $data->r_online_profiles }}],
	                    backgroundColor: ["rgba(255, 0, 0, 0.5)", "rgba(100, 255, 0, 0.5)", "rgba(200, 50, 255, 0.5)", "rgba(0, 100, 255, 0.5)"]
	                }]
	            },
	            options: {
	                title: {
	                    display: true
	                }
	            }
	        });
	    });


	    function submitFormreview() {
	    // 	  if(grecaptcha.getResponse() == "") {
			  //   $('.captchaerror').html('Captcha is Missing')
			  // } else {
		    $.ajax({
		        type:"POST",
		        url:"{{ url('addlawyerreview') }}",
		        data:new FormData(document.getElementById("addreview")),
		        contentType:!1,
		        cache:!1,
		        processData:!1,
	            success: function(text) {
	                if (text == "success") {
	                    formSuccessreview();
	                } else {
	                    formErrorreview();
	                    submitMSGreview(false, text);
	                }
	            }
		    });
		// }
		}
	function formSuccessreview() {
        $("#addreview")[0].reset();
        submitMSGreview(true, "Thanks for Reviewing")
        location.reload();
    }

    function formErrorreview() {
        $("#addreview").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
            $(this).removeClass();
        });
    }

    function submitMSGreview(valid, msg) {
        if (valid) {
            var msgClasses = "h4 tada animated text-success";
        } else {
            var msgClasses = "h4 text-danger";
        }
        $("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
    }
	</script>
@endsection