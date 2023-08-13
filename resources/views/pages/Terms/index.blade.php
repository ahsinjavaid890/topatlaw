@extends('layouts.app')
@section('title')
<title>Terms of Use</title>
@endsection
@section('content')
 <div class="page-banner bg-1">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-content">
                    <h2>Terms of Use</h2>
                    <ul>
                        <li><a href="index.html">Home <i class="las la-angle-right"></i></a></li>
                        <li>Terms of Use</li>
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
                    <span>Terms of Use</span>
                </div>

              <strong>Effective Date: May 1, 2023</strong>

              <p> Please read these Terms of Use ("Terms") carefully before using our website. By accessing or using our website, you agree to be bound by these Terms. If you do not agree with any part of these Terms, you may not use our website.</p>
                
                <strong>  Use of Our Website:</strong>
                <p> 1.1 Eligibility:</p>
                <p> You must be at least 18 years old or have reached the age of majority in your jurisdiction to use our website. By using our website, you represent and warrant that you meet the eligibility requirements.</p>
                
                <p> 1.2 License:</p>
                <p> Subject to your compliance with these Terms, we grant you a limited, non-exclusive, non-transferable, revocable license to access and use our website for your personal, non-commercial use.</p>
                
                <p> 1.3 Prohibited Conduct:</p>
                <p>  You agree not to engage in any of the following prohibited conduct:</p>
                
                <p> Violating any applicable law, regulation, or these Terms.</p>
                <p>Interfering with or disrupting the operation of our website.</p>
                <p> Attempting to gain unauthorized access to our website or its systems.</p>
                <p>Using our website for any unauthorized or unlawful purposes.</p>
                <p>Collecting or harvesting any personal information of others without their consent.</p>
                <p> Engaging in any activity that could harm, disable, or overburden our website.</p>
                
                <strong>Intellectual Property:</strong>
                
                <p>2.1 Ownership:</p>
                <p>All content, trademarks, logos, and intellectual property rights related to our website are owned by us or our licensors. You acknowledge and agree that you do not acquire any ownership rights in our website or its content.</p>
                
                <p>2.2 Restrictions:</p>
                <p>You may not copy, modify, distribute, transmit, display, perform, reproduce, publish, license, create derivative works from, transfer, or sell any information, software, products, or services obtained from our website without our prior written consent.</p>
                
                <strong> Third-Party Links:</strong>
                <p>Our website may contain links to third-party websites or resources. These links are provided for your convenience, and we are not responsible for the content, products, or services offered by these third-party websites. Your use of third-party websites is at your own risk, and their terms and privacy policies will apply to your interactions with them.</p>
                
                <strong> Disclaimer of Warranties:</strong>
                <p>Our website is provided on an "as is" and "as available" basis without express or implied warranties. We do not warrant our website being error-free, uninterrupted, or free of viruses or other harmful components.</p>
                
               <strong> Limitation of Liability:</strong>
                <p>To the maximum extent permitted by applicable law, we shall not be liable for any indirect, consequential, incidental, special, or punitive damages, including but not limited to lost profits, data loss, or business interruption arising out of or in connection with the use of our website..</p>
                
                <strong>Indemnification:</strong>
                <p>You agree to indemnify and hold us harmless from any claims, losses, damages, liabilities, costs, and expenses (including attorneys' fees) arising from or in connection with your use of our website, violation of these Terms, or any breach of applicable laws or regulations..</p>
                
                <strong> Modifications:</strong>
                <p>We reserve the right to modify or discontinue our website, or any part thereof, at any time without prior notice. We may also update these Terms from time to time. It is your responsibility to review the Terms periodically for any changes..</p>
                
                <strong> Governing Law and Jurisdiction:</strong>
                <p>These Terms shall be governed by and construed in accordance with the laws of Delaware. Any disputes arising out of or in connection with these Terms shall be subject to the exclusive jurisdiction of the courts of Delaware..</p>
                
                <strong> Severability:</strong>
                <p>If any provision of these Terms is found invalid, illegal, or unenforceable, the remaining provisions shall continue in full force and effect..</p>
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