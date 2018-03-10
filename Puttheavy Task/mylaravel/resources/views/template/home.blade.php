<!document html>
<html lang="en">
{{--//it's master page , have nothing--}}
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    @section('css')
        <link rel="stylesheet" href="a">
        <link rel="stylesheet" href="b">
    @show
</head>
<body>
<header>
    <div class="logo">Logo</div>
    @section('menu_head')
        <ul>
            <li>Home</li>
            <li>About</li>
            <li>Contact</li>
        </ul>
    @show
</header>
<div class="contentWrapper">
   <section id="conLeft">@yield('contentLeft')</section>
    <section id="content">@yield('content')</section>
    <section id="conRight">@yield('contentRight')</section>
</div>
<footer>
    <div class="footerWrapper">

    </div>
</footer>
@section('js')
    <script type="javascript" src=""></script>
@show
</body>

</html>