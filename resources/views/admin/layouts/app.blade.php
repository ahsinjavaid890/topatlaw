<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('admin.layouts.head')
</head>
<body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    <div class="wrapper" id="app">
        @include('admin.layouts.sidebar')
        <div class="content-page">
            <div class="content">
        		@include('admin.layouts.navbar')
		        <main class="">
		            @yield('content')
		        </main>
            </div>
        </div>
    </div>
        @include('admin.layouts.scripts')
</body>

</html>



