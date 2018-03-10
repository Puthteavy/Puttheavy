@php
    $base_url = asset('web');
@endphp
@include('web.push')
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    @section('css_style')
    @show
</head>

<body id="index">
<div id="pageWrapper">
    <!-- Header -->
    <header id="headerWrapper">
        @section('header')
        @show
    </header>

    <!-- container -->
    <div id="containerWrapper">
        @section('container')
        @show

    </div>

    <!-- Footer -->
    <footer id="footerWrapper">
        @section('footer')
        @show
    </footer>
</div>
@section('js')


@show
@stack('js1')
</body>
</html>
