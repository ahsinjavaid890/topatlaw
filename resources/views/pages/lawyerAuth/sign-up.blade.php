@extends('layouts.app')
@section('title')
<title>Sign Up</title>
@endsection
@section('content')

<div class="preloader">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="lds-hourglass"></div>
        </div>
    </div>
</div>

<h2>Sign Up</h2>

<div class="sign-up-area ptb-100" style="background-image: url('{{asset('public/frontend/img/custom/login-banner.png')}}'); object-fit:cover">
    <div class="container">
        
        <div class="sign-up-form">
            <div class="row mb-2">
                <div class="col-md-12">
                    <div class="section-title text-left">
                        <h2>Sign Up</h2>
                    </div>
                </div>
            </div>
            @if(session()->has('message'))
            <div class="alert alert-warning" role="alert">
                {{ session()->get('message') }}
            </div>
            @endif @if(session()->has('error'))
            <div class="alert alert-danger" role="alert">
                {{ session()->get('error') }}
            </div>
            @endif

            
             <div class="row">
                <div class="col-md-6 ">
                    <a href="{{url('/auth/google')}}" class="btn btn-white login-btn btn-block shadow-mine">
                        <img src="{{asset('public/assets/google.svg')}}" > Google
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="{{url('/auth/facebook')}}" class="btn btn-white login-btn btn-block shadow-mine">
                        <img src="{{asset('public/assets/facebook.svg')}}" > Facebook
                    </a>
                </div>
            </div>

            <div class="row mt-1">
                <div class="col-md-12">
                    <div class="row mt-1">
                        <div class="col-md-12">
                            <hr class="hr-text" data-content="Or">
                        </div>
                    </div>
                </div>
            </div>

            <form action="{{url('addLawyerByUser')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="name" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="First Name" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="name" class="form-control" id="name" name="last_name" value="" placeholder="Last Name" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email Address" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" id="phoneNumber" class="form-control usa-phone-number" name="phoneno" value="{{ old('phoneno') }}" placeholder="Phone number" required />
                        </div>
                    </div>

                    <!--<div class="col-md-6">-->
                    <!--    <div class="form-group">-->
                    <!--        <select name="serviceid" class="form-control" id="service" required>-->
                    <!--            <option disabled selected="true" value="">Select Service</option>-->
                    <!--            @foreach($categories as $i)-->
                    <!--            <option value="{{$i->id}}">{{$i->tittle}}</option>-->
                    <!--            @endforeach-->
                    <!--        </select>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="col-md-6">-->
                    <!--    <div class="form-group">-->
                    <!--        <select name="cityid" class="form-control" id="cities" required>-->
                    <!--            <option disabled selected="true">Select City</option>-->
                    <!--            @foreach($cities as $c)-->
                    <!--            <option value="{{$c->id}}">{{$c->tittle}}</option>-->
                    <!--            @endforeach-->
                    <!--        </select>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="col-md-12">-->
                    <!--    <div class="form-group">-->
                    <!--        <input type="text" class="form-control" name="education" placeholder="Education" required value="{{ old('education') }}" />-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="col-md-12">-->
                    <!--    <div class="form-group">-->
                    <!--        <input type="url" class="form-control" name="websitelink" placeholder="Website address" value="{{ old('websitelink') }}" />-->
                    <!--    </div>-->
                    <!--</div>-->
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" id="pass" placeholder="Password" required value="{{ old('password') }}" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="password" class="form-control" name="c_password" id="cpass" placeholder="Confirm Password" required value="{{ old('c_password') }}" />
                        </div>
                    </div>

                    <!--<div class="col-md-12">-->
                    <!--    <div class="form-group">-->
                    <!--        Uplaod Profile Picture (optional)-->
                    <!--        <input type="file" class="form-control" name="image" placeholder="" value="{{ old('image') }}" />-->
                    <!--    </div>-->
                    <!--</div>-->
                    <div class="col-md-12">
                        <div class="text-center">
                            <button type="submit" class="btn btn-block default-btn-one" onclick="if($('#pass').val()!==$('#cpass').val()) {alert('password does not matches');return false;}">Sign Up</button>
                            <p class="account-decs">Already have an account? <a href="{{url('signin/lawyer')}}">Sign In</a></p>
                        </div>
                    </div>

                </div>
                
            </form>
             
        </div>
    </div>
</div>


<script>
    $( "#service" ).change(function() {
    var value = $('#service').val();
    $.ajax({
        type: "GET",
        url: "{{ url('getcitiesForLawyers') }}/"+value,
        success: function(resp) {
          $('#cities').html(resp);
        }
    });
});

</script>

<script>
$(document).ready(function() {
    $('.usa-phone-number').on('input', function() {
        var input = $(this).val().replace(/\D/g, '');

        // Limit input to 10 characters
        if (input.length > 10) {
            input = input.substring(0, 10);
        }

        // Check if the input matches the expected USA phone format
        if (input.length === 10) {
            input = '(' + input.substring(0, 3) + ') ' + input.substring(3, 6) + '-' + input.substring(6, 10);
            $(this).removeClass('is-invalid'); // Remove error class if valid
        } else {
            $(this).addClass('is-invalid'); // Add error class if invalid
        }

        $(this).val(input);
    });
});
</script>
In this version of the script, before checking the input's length against the expected format length, we add a condition to limit the input to a maximum of 10 characters. If the input exceeds 10 characters, it's truncated to the first 10 characters. This ensures that users cannot input more digits than needed for a USA phone number.

By combining the maximum character limit with the format validation, you provide a more user-friendly experience



@endsection