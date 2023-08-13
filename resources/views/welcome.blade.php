@extends('layouts.app')
@section('content')
<div class="hero-slider owl-carousel owl-theme">
    <div class="hero-slider-item item-bg1">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="slider-content">
                        <span>TopAtLaw</span>
                        <h1>Promotes a Just and Fair Due Process.</h1>
                        <p>By making finding qualified legal representation more accessible, efficient, and organized.</p>
                        <!-- <div class="slider-btn">
                            <a href="#" class="default-btn-one mr-3">Free Consulting</a>
                            <a href="#" class="default-btn-two">Learn More</a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="hero-slider-item item-bg2">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="slider-content">
                        <span>TopAtLaw</span>
                        <h1>Makes Finding a Lawyer Easy.</h1>
                        <p>Having the right attorney on your side makes all the difference when it comes to safeguarding your rights.</p>
                        <!-- <div class="slider-btn">
                            <a href="#" class="default-btn-one mr-3">Free Consulting</a>
                            <a href="#" class="default-btn-two">Learn Moreg</a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="hero-slider-item item-bg3">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="slider-content">
                        <span>TopAtLaw</span>
                        <h1>Empowers Users to Nominate and Review Lawyers.</h1>
                        <p>
                        Visitors are empowered to review and/or nominate lawyers.                        </p>
                        <!-- <div class="slider-btn">
                            <a href="#" class="default-btn-one mr-3">Free Consulting</a>
                            <a href="#" class="default-btn-two">Learn More</a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="service-area pt-100 pb-70">
    <div class="container">
        <div class="section-title">
            <span>TopAtLaw</span>
            <h1>Find Top <span>Rated Lawyers</span></h1>
        </div>
        <div class="row">
            @foreach($homepageservices as $r)
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
                    <!-- <div class="service-text">
                        
                        <h3><a href="{{ url('lawyers') }}/{{ $r->url }}">{{ $r->tittle }}</a></h3>
                        <p>{{ $r->description }}</p>
                    </div> -->
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="about-area ptb-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <div class="about-image">
                    <img src="{{asset('public/frontend/img/case-study-dateilas.jpg')}}" alt="Image">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="about-text">
                    <div class="section-title">
                        <span>About Us</span>
                        
                        <h1>We highlight <span>The Best Lawyers</span> in each city across America & beyond</h1>
                        <p>
                            TopAtLaw makes it easy for individuals to find a qualified lawyer. Not only do we provide thorough insights and additional references for the top ten lawyers in each city, but we also empower our users to nominate a lawyer (including themselves). Moreover, users will be allowed to share a review for each lawyer. In addition, lawyers with the most votes in the “nominated lawyers” section will be automatically placed on top of the section.
                        </p>
                        <p>We use the following criteria for identifying the top ten lawyers in each city:</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul>
                                <li>
                                    <i class="las la-check-square"></i>
                                    Experience (20 Points)
                                </li>
                                <li>
                                    <i class="las la-check-square"></i>
                                    Online Reviews (20 Points)
                                </li>
                                <li>
                                    <i class="las la-check-square"></i>
                                    Online Profiles (40 Points)
                                </li>
                                <li>
                                    <i class="las la-check-square"></i>
                                    Our Assessment (20 Points)
                                </li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="right-way-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 right-way">
                <div class="fun-facts-shape top">
                    <img src="{{ url('public/frontend/img/shape.png') }}" class="shape1" alt="Shape">
                    <img src="{{ url('public/frontend/img/shape.png') }}" class="shape2" alt="Shape">
                </div>
                <div class="right-way-text">
                    <div class="section-title">
                        <h2>Finding the right attorney makes a difference when it comes to protecting our rights in a legal matter. </h2>
                        <p>Through personal experience, not only did I learn the critical importance of finding the right attorney but also how difficult it is to find accurateinformation about them online.</p>
                        <p>I have created topatlaw.com to serve the broader community and help individuals find a lawyer in an easy and accurate manner.</p>
                        <p>I would like to appeal to you to help us improve the accuracy of the listings by 1) pointing errors in our listings. 2) helping improve the content of the site; and 3) nominating a high-rated attorney in each city. Please contact us <a href="{{url('contactus')}}" class="link-text">here</a> for any insights/feedback.</p>
                    </div>
                    <div class="text-sign">
                        <!-- <img src="{{ url('public/frontend/img/sign.png') }}" alt="Sign"> -->
                        <h3>With Gratitude,</h3>
                        <p>Sharif</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="video-contant">
                    <div class="d-table">
                        <div class="d-table-cell">
                            <div class="video-box">
                                <a href="https://vimeo.com/136326735" class="video-btn popup-youtube">
                                    <i class="las la-play"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="blog-area pt-100 pb-70">
    <div class="container">
        <div class="section-title">
            <span>Latest Blog</span>
            <h1><span>Insights</span> related to law, cases, and lawyers.</h1>
        </div>
        <div class="row">
            @foreach($homepageblogs as $r)
            <div class="col-lg-4 col-sm-6">
                <div class="blog-card">
                    <a href="{{ url('blog') }}/{{ $r->url }}">
                        <img src="{{ url('public/images') }}/{{ $r->image }}" alt="Image">
                    </a>
                    <div class="blog-card-text">
                        <h3><a href="{{ url('blog') }}/{{ $r->url }}">{{ $r->tittle }}</a></h3>
                        <ul>
                            <li>
                                <i class="las la-calendar"></i>
                                {{ $r->blogdate }}
                            </li>
                        </ul>
                        <p>{!! Str::limit($r->description, 150) !!}</p>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>

@endsection