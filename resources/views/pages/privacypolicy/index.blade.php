@extends('layouts.app')
@section('title')
<title>privacypolicy</title>
@endsection
@section('content')
 <div class="page-banner bg-1">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-content">
                    <h2>privacy policy</h2>
                    <ul>
                        <li><a href="index.html">Home <i class="las la-angle-right"></i></a></li>
                        <li>privacy policy</li>
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
                    <span>privacy policy</span>
                </div>
                <strong>Privacy Notice</strong>

                <p>Effective Date: May 31, 2023</p>
                
                <p>At TopAtLaw.com, we are committed to protecting the privacy and security of your personal information. This Privacy Notice explains how we collect, use, and disclose your information when you use our website. We encourage you to read this Privacy Notice carefully to understand our practices regarding your personal data and how we will treat it.</p>
                
                <strong>Information We Collect:</strong>
                
                <p>1.1 Personal Information:</p>
                <p> When you visit our website or interact with our services, we may collect personal information that you provide voluntarily, such as your name, email address, postal address, phone number, or any other information you choose to provide.</p>
                
                <p>1.2 Automatically Collected Information:</p>
                <p>We may also collect certain information automatically when you visit our website, such as your IP address, device information, browser type, operating system, referring URLs, and usage patterns.</p>
                
                <p> Use of Your Information:</p>
                <p>We may use the information we collect for the following purposes:</p>
                
                <p> 2.1 To Provide and Improve Our Services:</p>
                <p>We use your personal information to provide and improve our services, respond to your inquiries, and fulfill your requests. This includes processing transactions, delivering products or services, and personalizing your experience on our website.</p>
                
                <p>2.2 Communication:</p>
                <p>We may use your information to communicate with you about our products, services, promotions, and updates. You can opt out of receiving such communications by following the unsubscribe instructions provided in the email or contacting us directly.</p>
                
                <p>2.3 Analytics and Research:</p>
                <p>We may use your information for analytics purposes, such as analyzing website usage, trends, and user preferences. This helps us improve our website and tailor our services to meet your needs better.</p>
                
                <p>2.4 Legal Compliance and Protection:</p>
                <p>We may use and disclose your information to comply with applicable laws, regulations, legal processes, or government requests. We may also use and disclose your information to protect our rights, privacy, safety, or property and that of our users, partners, or the public.</p>
                
                <strong>Sharing of Your Information:</strong>
                <p>We may share your personal information with the following parties:</p>
                
                <p>3.1 Service Providers:</p>
                <p>We may engage third-party service providers to perform functions on our behalf, such as website hosting, data analysis, customer support, and email delivery. These service providers have access to your personal information only to perform these tasks and are obligated to maintain its confidentiality.</p>
                
                <p>3.2 Business Transfers:</p>
                <p>In the event of a merger, acquisition, or sale of all or a portion of our assets, your personal information may be transferred as part of the transaction. We will notify you via email and/or prominent notice on our website of any change in ownership or use of your personal information.</p>
                
                <p>3.3 Legal Requirements:</p>
                <p>We may disclose your personal information if required by law or in response to a valid legal request, such as a court order, government investigation, or subpoena.</p>
                
                <strong> Your Choices and Rights:</strong>
                <p>4.1 Opting Out:</p>
                <p>You have the right to opt out of receiving promotional communications from us. You can do so by following the unsubscribe instructions in the email or contacting us directly.</p>
                
                <p>4.2 Access and Correction:</p>
                <p>You have the right to access and update our personal information. If you believe any information we have about you is incorrect or incomplete, please contact us, and we will promptly correct or update it.</p>
                
                <p> 4.3 Data Retention:</p>
                <p> We will retain your personal information for as long as necessary to fulfill the purposes outlined in this Privacy Notice unless a longer retention period is required or permitted by law.</p>
                
                <p>Security:</p>
                <p>We take reasonable measures to protect the security and confidentiality of your personal information. However, no method of transmission over the Internet or electronic storage is completely secure, and we cannot guarantee absolute security.</p>
                
                <strong> Children's Privacy:</strong>
                <p>Our website is not intended for children under the age of 13. We do not knowingly collect personal information from children under 13. If you are a parent or guardian and believe your child has provided us with personal information, please contact us, and we will promptly delete such information from our records.</p>
                
                <strong> Changes to This Privacy Notice:</strong>
                <p> We may update this Privacy Notice from time to time. Any changes we make will be effective when we post the revised Privacy Notice on our website. We encourage you to review this Privacy Notice periodically for any updates.</p>
                
                <strong>  Contact Us:</strong>
                <p>  If you have any questions, concerns, or requests regarding this Privacy Notice or our privacy practices, please contact us at [insert contact information].</p>
                
                <p> Thank you for taking the time to read our Privacy Notice.</p>
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