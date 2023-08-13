@extends('layouts.app')
@section('content')
<section class="page-404 mt--100 py-0">
  <div style="background-image: url('http://7oroof.com/demos/mintech/assets/images/banners/1.jpg');" class="bg-img">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12 d-flex align-items-center vh-100 error-wrapper">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-6">
            <h1 class="error-code" style="color: white;">404</h1>
          </div>
          <div class="col-sm-12 col-md-12 col-lg-6">
            <h2 class="error-title" style="color: white;">Oops! That page can’t be found.</h2>
            <p class="error-desc" style="color: white;">The page requested couldn't be found. This could be a spelling error in the
              URL or a removed page.
            </p>
            <a href="{{ url('') }}" class="btn btn__primary btn__icon btn__xl">
              <span style="color: white;">Back To Home</span> <i class="icon-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</section>
@endsection