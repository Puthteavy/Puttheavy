<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield("title")</title>
    {{--add css--}}
    @section("css")
        <link rel="stylesheet" href="#a">
    @show
</head>
<body id="index">
    <header>
         <div>Logo</div>
    </header>
    <article id="container">
        @yield("content")

    </article>
    <article id="side">
        @section("menu")
            <ul>
                <li>Home</li>
                <li>About</li>
            </ul>
        @show
    </article>
    <footer></footer>
{{--add script--}}
@section("javascript")
    <script type="javascript" src=""></script>
@show

</body>
</html>