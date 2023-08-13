@extends('layouts.app')
@section('title')
<title>{{ $data->tittle }}</title>
@endsection
@section('content')
<div class="services-details-area ptb-100">
    <div class="container">
    	<div class="row mt-5">
    		<div class="col-md-12">
    			<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="#">Home</a></li>
				    <li class="breadcrumb-item"><a href="#">Blog</a></li>
				    <li class="breadcrumb-item active" aria-current="page">{{ $data->tittle }}</li>
				  </ol>
				</nav>
    		</div>
    	</div>
        <div class="row">
            <div class="col-lg-8 col-md-7 col-sm-12">
                <div class="services-details">
                    <div class="img">
                        <img src="{{ url('public/images') }}/{{ $data->image }}" alt="{{ $data->tittle }}">
                    </div>
                    <div class="services-details-content">
                        <h3>{{ $data->tittle }}</h3>
                        <ul class="blog-list">
                            <li>
                                <i class="las la-calendar"></i>
                                {{ $data->blogdate }}
                            </li>
                            <li>
                                <i class="las la-user-tie"></i>
                                <a href="#">By Admin</a>
                            </li>
                        </ul>
                        <p>{!! $data->description !!}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-5 col-sm-12">
                <div class="side-bar">
                    <div class="side-bar-box search-box">
                        <form>
                            <input type="text" class="form-control" name="search" id="search-input" placeholder="Search">
                            <button type="submit"><i class="las la-search"></i></button>
                        </form>
                    </div>
                    <div class="side-bar-box recent-post">
                        <h3 class="title">Recent Post</h3>
                        @foreach($recentblogs as $r)
                        <div class="single-recent-post">
                            <div class="recent-post-img">
                                <a href="#"><img src="{{ url('public/images') }}/{{ $r->image }}" alt="Image"></a>
                            </div>
                            <div class="recent-post-content">
                                <ul>
                                    <li><a href="{{ url('blog') }}/{{ $r->url }}">By Admin</a></li>
                                    <li><a href="{{ url('blog') }}/{{ $r->url }}"><i class="fa fa-calendar"></i>{{ $r->blogdate }}</a></li>
                                </ul>
                                <h3><a href="{{ url('blog') }}/{{ $r->url }}">{{ $r->tittle }}</a></h3>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection