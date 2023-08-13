<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/line-awesome@1.3.0/css/line-awesome.min.css">
     @include('layouts.review')
      @include('meta::manager')
      @include('layouts.breadcrumb')
</head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-N772JGE1JL"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-N772JGE1JL');
</script>

<body>
        @include('layouts.navbar')

		    @yield('content')
		@include('layouts.footer')
        @include('layouts.scripts')
</body>

</html>



