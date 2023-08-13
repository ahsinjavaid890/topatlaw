@extends('layouts.app')
@section('title')
<title>Reset Password</title>
@endsection
@section('content')

<div class="preloader">
<div class="d-table">
<div class="d-table-cell">
<div class="lds-hourglass"></div>
</div>
</div>
</div>





<!-- <div class="page-banner bg-1">
<div class="d-table">
<div class="d-table-cell">
<div class="container">
<div class="page-content"> -->
<h2>Reset Password</h2>
<!-- <ul>
<li><a href="index.html">Home <i class="las la-angle-right"></i></a></li>
<li>Sign In</li>
</ul>
</div>
</div>
</div>
</div>
</div> -->


<div class="sign-in-area ptb-100">
<div class="container">
<div class="section-title">
<h2>Reset Password</h2>
<!-- <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laudantium quas cumque iste veniam id dolorem deserunt ratione error voluptas rem ullam.</p>
</div> -->
@if(session()->has('success'))
<div class="alert alert-success" role="alert">
{{ session()->get('success') }}
</div>
@endif
@if(session()->has('error'))
<div class="alert alert-warning" role="alert">
{{ session()->get('error') }}
</div>
@endif
@if(session()->has('email_error'))
<div class="alert alert-warning" role="alert">
{{ session()->get('email_error') }} <a href="{{ session()->get('href') }}">Resend</a>
</div>
@endif
@if(session()->has('message'))
<div class="alert alert-warning" role="alert">
{{ session()->get('message') }}
</div>
@endif

<div class="sign-in-form">
<form method="post" action="{{url('verify/password/1')}}">
    @csrf
<input type="text" name="code" hidden value="{{$code}}">
<div class="form-group">
<input type="password" class="form-control" name="password" placeholder="New Password" required   >
</div>
<div class="form-group">
<input type="password" class="form-control" name="c_password" placeholder="Confirm Password" required   >
</div>
<!-- <a href="{{url('forget/password')}}" class="float-right">Forget Password?</a> -->
<!-- <div class="form-group form-check float-left">
<input type="checkbox" class="form-check-input" id="exampleCheck1">
<label class="form-check-label" for="exampleCheck1">Remember me</label>
</div> -->
<div class="text-center ">
<button type="submit" class="btn default-btn-one">Reset</button>
<p class="account-decs">
Not a member? <a href="sign-up.html">Sign Up</a>
</p>
</div>
</form>
</div>
</div>
</div>


<!-- <footer class="footer-area pt-100 pb-70">
<div class="container">
<div class="row">
<div class="col-lg-5 col-sm-6">
<div class="footer-widget">
<div class="logo">
<img src="assets/img/logo-white.png" alt="logo">
</div>
<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum.</p>
<ul class="footer-socials">
<li>
<a href="#" target="_blank">
<i class="lab la-facebook-f"></i>
</a>
</li>
<li>
<a href="#" target="_blank">
<i class="lab la-twitter"></i>
</a>
</li>
<li>
<a href="#" target="_blank">
<i class="lab la-instagram"></i>
</a>
</li>
<li>
<a href="#" target="_blank">
<i class="lab la-google-plus"></i>
</a>
</li>
</ul>
</div>
</div>
<div class="col-lg-2 col-sm-6">
<div class="footer-widget">
<h3>Quick Links</h3>
<ul class="footer-text">
<li>
<a href="index.html">
<i class="las la-star"></i>
Home
</a>
</li>
<li>
<a href="about.html">
<i class="las la-star"></i>
About Us
</a>
</li>
<li>
<a href="services.html">
<i class="las la-star"></i>
Our Services
</a>
</li>
<li>
<a href="case-study.html">
<i class="las la-star"></i>
Case Study
</a>
</li>
<li>
<a href="blog.html">
<i class="las la-star"></i>
Our Blog
</a>
</li>
<li>
<a href="#">
<i class="las la-star"></i>
Clients Review
</a>
</li>
<li>
<a href="attorney.html">
<i class="las la-star"></i>
Our Attorneys
</a>
</li>
</ul>
</div>
</div>
<div class="col-lg-2 col-sm-6">
<div class="footer-widget pl-50">
<h3>Services</h3>
<ul class="footer-text">
<li>
 <a href="#">
<i class="las la-star"></i>
Civil Law
</a>
</li>
<li>
<a href="#">
<i class="las la-star"></i>
Family Law
</a>
</li>
<li>
<a href="#">
<i class="las la-star"></i>
Cyber Law
</a>
</li>
<li>
<a href="#">
<i class="las la-star"></i>
Education Law
</a>
</li>
<li>
<a href="#">
<i class="las la-star"></i>
Business Law
</a>
</li>
<li>
<a href="#">
<i class="las la-star"></i>
Investment Law
</a>
</li>
<li>
<a href="#">
<i class="las la-star"></i>
Criminal Law
</a>
</li>
</ul>
</div>
</div>
<div class="col-lg-3 col-sm-6">
<div class="footer-widget">
<h3>Contact Info</h3>
<ul class="info-list">
<li>
<i class="las la-phone"></i>
<a href="tel:+0123456987">+0123 456 987</a>
</li>
<li>
<i class="las la-envelope"></i>
<a href="https://templates.hibootstrap.com/cdn-cgi/l/email-protection#1e7f6a716c705e77707871307d7173"><span class="__cf_email__" data-cfemail="1574617a677b557c7b737a3b767a78">[email&#160;protected]</span></a>
</li>
<li>
<i class="las la-map-marker-alt"></i>
Silven House, 4 Lower Gilmor Bank Edinburgh EH3 9QP, UK
</li>
</ul>
</div>
</div>
</div>
</div>
</footer>


<div class="footer-bottom">
<div class="container">
<p>Copyright @2020 Atorn. All rights reserved<a href="https://hibootstrap.com/" target="_blank">HiBootstrap</a></p>
</div>
</div>


<div class="go-top">
<i class="las la-hand-point-up"></i>
</div>
 -->

@endsection