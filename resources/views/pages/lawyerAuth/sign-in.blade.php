@extends('layouts.app')
@section('title')
<title>Sign In</title>
@endsection
@section('content')

<div class="preloader">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="lds-hourglass"></div>
        </div>
    </div>
</div>

<div class="sign-in-area ptb-100" style="background-image: url('{{asset('public/frontend/img/custom/login-banner.png')}}'); object-fit:cover">
    <div class="container">
        <div class="section-title mt-5">
            <div class="sign-in-form">
                <div class="row mb-3">
                    <div class="col-md-12 text-left">
                        <h2>Sign in</h2>
                        <!-- <p>Please signing to continue</p><br> -->
                    </div>
                </div>
                @if(session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('success') }}
                </div>
                @endif @if(session()->has('error'))
                <div class="alert alert-warning" role="alert">
                    {{ session()->get('error') }}
                </div>
                @endif @if(session()->has('email_error'))
                <div class="alert alert-warning" role="alert">{{ session()->get('email_error') }} <a href="{{ session()->get('href') }}">Resend</a></div>
                @endif @if(session()->has('message'))
                <div class="alert alert-warning" role="alert">
                    {{ session()->get('message') }}
                </div>
                @endif

                 <div class="row">
                    <div class="col-md-6 ">
                        <a href="{{url('/auth/google')}}" class="btn btn-white btn-block login-btn shadow-mine">
                            <img src="{{asset('public/assets/google.svg')}}" > Google
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{url('/auth/facebook')}}" class="btn btn-white btn-block login-btn shadow-mine">
                            <img src="{{asset('public/assets/facebook.svg')}}" > Facebook
                        </a>
                    </div>
                </div>

                <div class="row mt-1">
                    <div class="col-md-12">
                        <hr class="hr-text" data-content="Or">
                    </div>
                </div>

                <form method="post" action="{{url('loginLawyerByUser')}}">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" placeholder="Username or Email" required />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password" required />
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{url('forget/password')}}" class="float-right text-black">Forget Password?</a>
                            <div class="form-group form-check float-left">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" />
                                <label class="form-check-label" for="exampleCheck1">Remember me</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-block default-btn-one">Sign In</button>
                        </div>
                    </div>
                    <div class="text-center">
                        
                        <p class="account-decs">Don’t Have An account? <a href="{{url('register')}}">Sign Up</a></p>
                    </div>
                </form>
                   
            </div>
        </div>
    </div>
</div>




@endsection