@extends('layout.home')
@section('title','Home View')
{{--overwite css on home page--}}
@section('css')
    <link rel="stylesheet" href="#b">
@endsection
{{-- or we want to get all we need add parent--}}
@section('css')
    @parent
    <link rel="stylesheet" href="#c">
@endsection
@section('content')
    <div class="test">
        <p>Hello content</p>

    </div>
@endsection