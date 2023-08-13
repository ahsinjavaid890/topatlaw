@extends('layouts.app')
@section('title')
<title>Find Top Rated Lawyers</title>
@endsection
@section('content')
<div class="our-service-area pt-100 pb-70 mt-5">
    <div class="container">
    	<div class="row">
    		<div class="col-md-12">
    			<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Lawyers</li>
				  </ol>
				</nav>
    		</div>
    	</div>
        <div class="row">
            @foreach($data as $r)
            <div class="col-lg-4 col-sm-6">
                <div class="service-card">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <a href="{{ url('lawyers') }}/{{ $r->url }}">
                                <img src="{{ url('/public/images') }}/{{ $r->thumbnail }}" class="cat-image" alt="Image">
                            </a>
                        </div>
                    </div>
                    <div class="row mt--2">
                        <div class="col-md-12 text-center">
                            <!-- <p>{{ $r->description }}</p> -->
                            <a href="{{ url('lawyers') }}/{{ $r->url }}" class="btn btn-outline-danger text-sm btn-find-lawyers">Find Lawyers</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection