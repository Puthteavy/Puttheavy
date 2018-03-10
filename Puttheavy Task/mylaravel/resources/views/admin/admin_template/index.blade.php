{{--//call layout that created--}}
@extends('template.home')
{{--//title--}}
@section('title','Laravel Testing page')
{{--//add more css--}}
@section('css')
    @parent
    <link rel="stylesheet" href="c">
@endsection

@section('content')
    <div class="contentBlog">
        <h1>Content</h1>
        <p>Hello Content</p>
    </div>
@endsection
@section('contentLeft')
    <h>Content Left</h>
@endsection
@section('contentRight')
    <h>Content Right</h>
@endsection
@section('js')
    <script>
        alert(0);
    </script>
@endsection
