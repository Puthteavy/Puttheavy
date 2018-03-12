@extends('Layout.master_admin')
@section('title','Dashboard')
@section('css')
    @parent
@endsection
@section('pageTitle','Dashboard')
@section('note','A black page template with a minimal dependency assets to use as a base for any custom page you create')
@section('content')
    <div class="container">
        @foreach($category as $cat)
            {{$cat->category_name}}
            @endforeach
    </div>
@endsection
@section('js')
    @parent
@endsection
