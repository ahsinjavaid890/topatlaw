<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
@yield('title')
<meta name="DC.Title" content="@if(!empty($metatags)){{ $metatags->mettatittle }} @else <?php echo DB::table('sitesettings')->where('id', 1)->first()->websitetittle; ?> @endif">
<meta name="rating" content="general">
<meta name="google-site-verification" content="VS01TE7wdXz0dBfCjUs9FacaSubktDjWIW4mDc6XXk0" />
<meta name="description" content="<?php echo DB::table('sitesettings')->where('id', 1)->first()->footertext; ?>">
<meta property="og:type" content="website">
<meta property="og:image" content="{{ asset('assets/images/logo.svg') }}">
<meta property="og:title" content="@if(!empty($metatags)){{ $metatags->mettatittle }} @else <?php echo DB::table('sitesettings')->where('id', 1)->first()->websitetittle; ?> @endif">
<meta property="og:description" content="<?php echo DB::table('sitesettings')->where('id', 1)->first()->footertext; ?>">
<meta property="og:site_name" content="<?php echo DB::table('sitesettings')->where('id', 1)->first()->websitetittle; ?>">
<meta property="og:url" content="{{ url('/') }}">
<meta property="og:locale" content="it_IT">
<title>Topatlaw</title>

<link rel="stylesheet" href="{{ asset('public/frontend/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/frontend/css/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/frontend/css/meanmenu.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/frontend/css/line-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/frontend/css/magnific-popup.css') }}">
<link rel="stylesheet" href="{{ asset('public/frontend/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/frontend/css/owl.theme.default.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/frontend/css/odometer.css') }}">
<script src="https://www.google.com/recaptcha/api.js"></script>
<link rel="stylesheet" href="{{ asset('public/frontend/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('public/frontend/css/responsive.css') }}">
<link rel="icon" type="image/png" href="{{ asset('public/frontend/img/favicon.png') }}">
<input type="hidden" value="{{url('/')}}" id="url" name="url">
<link rel="alternate" type="application/rss+xml" href="https://topatlaw.com/rssfeed">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="application/ld+json">
    {
      "@context" : "https://schema.org",
      "@type" : "WebSite",
      "name" : "Topatlaw",
      "url" : "https://topatlaw.com/"
    }
  </script>

   <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "url": "https://topatlaw.com/",
      "logo": "https://topatlaw.com/public/images/TOP AT LAW LOGO-01.jpg"
    }
    </script>
  
  
