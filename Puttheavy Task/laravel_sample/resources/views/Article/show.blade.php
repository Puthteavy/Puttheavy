@extends('Layout.master')
@section('title','Test Article')
@section('css')
    @parent

@endsection
@section('content')
    <div class="row">
        <div class="col-sm-4">
            <h1> {{$article->title}} Detail</h1>
        </div>
        <div class="col-sm-8">
           <h1> {{$article->title}}</h1>
           <p>{{$article->body}}</p>
           <p>Active :{{$article->active}}</p>

        </div>

    </div>

@endsection
@section('js')
    @parent

@endsection