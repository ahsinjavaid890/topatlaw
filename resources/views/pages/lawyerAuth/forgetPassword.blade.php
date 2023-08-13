@extends('layouts.app')
@section('title')
<title>Forgot Password</title>
@endsection
@section('content')

<div class="preloader">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="lds-hourglass"></div>
        </div>
    </div>
</div>

<h2>Forgot Password?</h2>

<div class="sign-in-area ptb-100 mt-5">
    <div class="container">
        

        <div class="sign-in-form">
            <div class="section-title text-left">
            <h2>Forget Password</h2>
            <p>Enter your email which you've registerd with and we'll send a link to recover password. </p>
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
            <form method="post" action="{{url('forget/password/1')}}">
                @csrf
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email adress" required />
                </div>

                <div class="row">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-block default-btn-one">Send verification code</button>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
</div>



@endsection