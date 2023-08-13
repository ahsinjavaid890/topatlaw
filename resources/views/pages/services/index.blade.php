@extends('layouts.app')
@section('title')
<title>Services</title>
@endsection
@section('content')
 <div class="page-banner bg-1">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-content">
                    <h2>Services</h2>
                    <ul>
                        <li><a href="index.html">Home <i class="las la-angle-right"></i></a></li>
                        <li>Services</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="service-area ptb-100 pb-70">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Services</span>
                </div>
                  <p>At TopAtLaw, we are committed to revolutionizing the legal landscape by providing a seamless platform that enables individuals to locate highly skilled attorneys effortlessly. Our mission is to make finding qualified legal representation more accessible, efficient, and organized, with the ultimate vision of helping build a more just and fair due process system.</p>
                  <p>Our unwavering pursuit of justice will empower lawyers to offer pro bono services through our cutting-edge products. We believe in ensuring that legal expertise is accessible to everyone, regardless of their financial circumstances.</p>  
                 <p>Furthermore, we understand the evolving needs of legal professionals in the digital age. That's why we stand ready to support lawyers with their digital marketing strategies and product requirements. Our team of experts will build tailored solutions that maximize your online presence and streamline your legal services.</p>
                <p>Join us at TopAtLaw, where fairness, justice, and innovation unite to transform the legal landscape for the better. Experience the power of our platform and unlock a new era of legal representation and accessibility.</p>
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