@extends('layouts.app')
@section('title')
<title>Best {{ $service->tittle }} Lawyer in {{ $city->tittle }}</title>
@endsection
@section('content')
<div class="attorney-area ptb-100 mt-70">
<div class="container">
    <div class="section-title">
        <!-- <span>200 Members Found</span> -->
        <h2>Best {{ $service->tittle }} Lawyer in {{ $city->tittle }}</h2>
        @if(!session()->has('user'))
            <a href="{{url('register/')}}" class="mt-2 btn btn-outline-danger">Create Lawyer profile</a>
        @else

        @endif 
        
        @php
        $featured = DB::table('lawyerplan')->Join('lawyers','lawyers.id','=','lawyerplan.user_id')->where('lawyerplan.status', 1)
        ->Join('lawyerboost','lawyerplan.id','=','lawyerboost.lawyerplan_id')
        ->Where('lawyerboost.city',$city->id)
        ->Where('lawyerboost.service',$service->id)
        ->where('lawyerplan.plan_feature', 1)
        ->select('lawyers.*')
         ->groupBy('lawyerplan.user_id')
        ->get();
        
        @endphp
        
     
        
    </div>
        @if(count($featured) > 0)
        <div class="row mb-3 mt-3">
            <div class="col-md-12">
                <h5>Featured Lawyer</h5>
                <hr>
            </div>
        </div>
        @endif
     
     
     <div class="row">
      @if(count($featured) > 0)
        @foreach($featured as $r)            
       <div class="col-lg-6 col-sm-6">
            <a href="{{ url('lawyer') }}/{{ $r->url }}">
            <div class="card attorney-card">
                <div class="card-body">
                    <h1 class="mt-0 attorny-user mb-2 attorny-name-text">
                    	<u>{{ $r->name }}</u></h1>
                    <p>{{ $r->tagline }}</p>
                    <div>
                        <span>
                        	{!! Str::limit(strip_tags($r->bio), 130) !!}
                        </span>
                    </div> 
                </div>
            </div>
            </a>
        </div>
        @endforeach
        @endif
    </div>
    
    
    @if($toplawyerscount >= 1)
    <div class="row mb-3 mt-3">
        <div class="col-md-12">
            <h5>Top Ten Lawyers</h5>
            <hr>
        </div>
    </div>
    @endif
    <div class="row">
        @foreach($toplawyers as $r)
        <div class="col-lg-6 col-sm-6">
            <a href="{{ url('lawyer') }}/{{ $r->url }}">
            <div class="card attorney-card">
                <div class="card-body">
                    <h1 class="mt-0 attorny-user mb-2 attorny-name-text">
                    	<u>{{ $r->name }}</u></h1>
                    <p>{{ $r->tagline }}</p>
                    <div>
                        <span>
                        	{!! Str::limit(strip_tags($r->bio), 130) !!}
                        </span>
                    </div> 
                </div>
            </div>
            </a>
        </div>
        @endforeach
    </div>

    <!-- //Top Ten Lawyers -->

    <div class="row mt-5">
        <div class="col-md-8 offset-md-2 text-left">
            <div class="contact-form">
                <form id="addnominations" enctype="multipart/form-data">
                    <input type="hidden" value="{{ $service->id }}" name="serviceid">
                    <input type="hidden" value="{{ $city->id }}" name="cityid">
                    {{ csrf_field() }}
                    <div class="section-title text-center ml-0">
                        <h4>Nominate a Lawyer</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" id="name" required data-error="Please enter your name" placeholder="Lawyer’s Name">
                                <div class="help-block with-errors"></div>
                                <i class="las la-user"></i>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="website" class="form-control" id="email" required data-error="Please enter your email" placeholder="Lawyer’s Website:">
                                <div class="help-block with-errors"></div>
                                <i class="las la-globe"></i>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <textarea name="bio" id="bio" class="form-control" cols="30" rows="6" required data-error="Please enter your message" placeholder="Lawyer’s Bio"></textarea>
                                <div class="help-block with-errors"></div>
                                <i class="las la-edit"></i>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" id="Phone" required data-error="Please enter your Email" placeholder="Your Email">
                                <div class="help-block with-errors"></div>
                                <i class="las la-envelope"></i>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="number" name="phone" class="form-control" id="subject" required data-error="Please enter your subject" placeholder="Your Phone">
                                <div class="help-block with-errors"></div>
                                <i class="las la-phone"></i>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="file" name="image" class="form-control" id="file" data-error="Please attach file">
                                <div class="help-block with-errors"></div>
                                <i class="las la-link"></i>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="g-recaptcha brochure__form__captcha" data-sitekey="6LezaykaAAAAADCdkFXrW6JUmuS9z25BmgPp0Nr8"></div>
                            </div>
                            <div style="color: red;" class="captchaerror"></div>
                        </div>
                        <div class="col-lg-12 col-md-12 mt-3 text-center">
                            <button type="submit" class="default-btn-one">Submit Nomination</button>
                            <div id="msgnominations" class="h3 text-center hidden"></div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    function submitFormnominations() {
        // if(grecaptcha.getResponse() == "") {
        //         $('.captchaerror').html('Captcha is Missing')
        //       } else {
        $.ajax({
            type:"POST",
            url:"{{ url('createnominations') }}",
            data:new FormData(document.getElementById("addnominations")),
            contentType:!1,
            cache:!1,
            processData:!1,
            success: function(text) {
                if (text == "success") {
                    $('.captchaerror').hide();
                    formSuccessnominations();
                } else {
                    formErrornominations();
                    submitMSGnominations(false, text);
                }
            }
        });
    // }
    }
    function formSuccessnominations() {
        $("#addnominations")[0].reset();
        submitMSGnominations(true, "Thanks for Nomination")
    }
    function submitMSGnominations(valid, msg) {
        if (valid) {
            var msgClasses = "h4 tada animated text-success";
        } else {
            var msgClasses = "h4 text-danger";
        }
        $("#msgnominations").removeClass().addClass(msgClasses).text(msg);
    }
    </script>
    <style type="text/css">
        .btn-thumbs
        {
            width: 45px; height: 45px; border-radius: 100px; border:none; background-color: #f3f3f3;
            margin-top: -10px;
        }
        .btn-thumbs-active{
            background-color: #4CAF50 !important;
        }
        .btn-thumbs:hover
        {
            color: #c8242f;

        }
        .voteiconactive{
            color: white !important;
            font-size: 22px !important;
        }
    </style>
    <br><br>

<?php 
    $data3 = DB::table('nominations')->where('status' , 1)->count();
if($data3 >= 1){
?>  
<div class="row mb-3 mt-5">
    <div class="col-md-12">
        <h5>Approved Nominations</h5>
        <hr>
    </div>
</div>
<?php } ?>
<div class="row">
    @foreach($nominations as $r)
    
    <div class="col-lg-6 col-sm-6">
        <ul class="list-group" style=" height: 100%; ">
            <li class="list-group-item" style=" height: 100%; ">
                <div class="media align-items-lg-center flex-column flex-lg-row">
                    @if($r->image == 'noimage')

                    @else
                    <img src="{{ url('public/images/') }}/{{ $r->image }}" class="list-view-picture mr-4">
                    @endif
                    <div class="media-body order-2 order-lg-1">
                        <a href="{{ url('nominatedlawyer') }}/{{ $r->url }}"><h1 class="mt-0 font-weight-bold mb-2 attorny-name-text"><u>{{ $r->name }}</u></h1></a>
                        <p>
                            {!! Str::limit($r->bio, 130) !!}
                        </p>
                        <div class="row mt-3">
                            <div class="col-md-8 col-6">
                                <p id="totalvodtes{{ $r->id }}">Votes: {{ $r->votes }}</p>
                                <input type="hidden" value="{{ $r->votes }}" id="votes">
                            </div>
                            <div class="col-md-4 col-6 text-right">
                                @php 
                                 $ip = $_SERVER['REMOTE_ADDR'];
                                 $test = DB::table('nominationvotes')->where('nominations' , $r->id)->where('ipaddress' , $ip)->count();
                                @endphp
                                <button <?php if($test >= 1){ echo "disabled"; } ?> onclick="nominatevote({{ $r->id }})" class="votebutton{{ $r->id }} btn btn-thumbs  <?php if($test >= 1){ echo "btn-thumbs-active"; } ?>" title="Vote"> <i class="<?php if($test >= 1){ echo "voteiconactive"; } ?> voteicon{{ $r->id }} las la-thumbs-up"></i> </button>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    
    @endforeach
</div>
</div>
</div>
<script type="text/javascript">
    function nominatevote(id)
    {
        $.ajax({
              type: "GET",
              url: "{{ url('nominationvote') }}/"+id,
              success: function(resp) {
                $('.votebutton'+id).addClass('btn-thumbs-active');
                $('.voteicon'+id).addClass('voteiconactive');
                $('#totalvodtes'+id).html("Votes: "+resp);
            }
        });
    }
</script>
@endsection