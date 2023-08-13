@extends('layouts.app')
@section('title')
<title>Contact Us</title>
@endsection
@section('content')
 <div class="page-banner bg-1">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-content">
                    <h2>Contact Us</h2>
                    <ul>
                        <li><a href="index.html">Home <i class="las la-angle-right"></i></a></li>
                        <li>Contact Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="ptb-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="section-title">
                    <span>Contact Us</span>
                    <h2>Contact us below:</h2>
                </div>
                <div class="contact-form">
                    <form id="contactForm" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" id="name" required data-error="Please enter your name" placeholder="Full name">
                                    <div class="help-block with-errors"></div>
                                    <i class="las la-user"></i>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" id="email" required data-error="Please enter your email" placeholder="Email address">
                                    <div class="help-block with-errors"></div>
                                    <i class="las la-envelope"></i>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="phone" class="form-control" id="Phone" required data-error="Please enter your phone" placeholder="Phone No">
                                    <div class="help-block with-errors"></div>
                                    <i class="las la-phone"></i>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="subject" class="form-control" id="subject" required data-error="Please enter your subject" placeholder="Your subject">
                                    <div class="help-block with-errors"></div>
                                    <i class="las la-id-card"></i>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <textarea name="message" id="message" class="form-control" cols="30" rows="6" required data-error="Please enter your message" placeholder="Write your message..."></textarea>
                                    <div class="help-block with-errors"></div>
                                    <i class="las la-sms"></i>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                            <div class="g-recaptcha brochure__form__captcha" data-sitekey="6LezaykaAAAAADCdkFXrW6JUmuS9z25BmgPp0Nr8"></div>
                                </div>
                                <div style="color: red;" class="captchaerror"></div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <button type="submit" class="default-btn-one">Submit Now</button>
                                <div id="msgSubmit" class="h3 text-center hidden"></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="contact-text">
                    <div class="section-title">
                        <!-- <h2>Contact Info</h2> -->
                        <p><?php echo DB::table('sitesettings')->where('id', 1)->first()->footertext; ?></p>
                    </div>
                    <div class="row">
                        <!-- <div class="col-lg-6">
                            <div class="contact-card">
                                <span>Phone Number</span>
                                <h5><a href="tel: <?php echo DB::table('sitesettings')->where('id', 1)->first()->phoneno; ?>"> <?php echo DB::table('sitesettings')->where('id', 1)->first()->phoneno; ?></a></h5>
                            </div> 
                        </div> -->
                        <div class="col-lg-6">
                            <div class="contact-card">
                                <span>Email Address</span>
                                <h5><a href="mailto:<?php echo DB::table('sitesettings')->where('id', 1)->first()->email; ?>"><?php echo DB::table('sitesettings')->where('id', 1)->first()->email; ?></a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

function submitForm() {
    if(grecaptcha.getResponse() == "") {
                $('.captchaerror').html('Captcha is Missing')
              } else {
    $.ajax({
        type:"POST",
        url:"{{ url('createcontactrequest') }}",
        data:new FormData(document.getElementById("contactForm")),
        contentType:!1,
        cache:!1,
        processData:!1,
        success: function(text) {
            if (text == "success") {
                $('.captchaerror').hide();
                formSuccess();
            } else {
                formError();
                submitMSG(false, text);
            }
        }
    });
}
}
function formSuccess() {
    $("#contactForm")[0].reset();
    submitMSG(true, "Thanks for Contacting Us We Will Contact you Soon")
}
function submitMSG(valid, msg) {
    if (valid) {
        var msgClasses = "h4 tada animated text-success";
    } else {
        var msgClasses = "h4 text-danger";
    }
    $("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
}
function formError() {
    $("#contactForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
        $(this).removeClass();
    });
}
</script>
@endsection