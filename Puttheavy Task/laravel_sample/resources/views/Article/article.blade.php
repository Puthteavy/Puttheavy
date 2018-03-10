@extends('Layout.master')
@section('title','Test Article')
@section('css')
    @parent

@endsection
@section('content')
    <div class="row">
        <div class="col-sm-4">
            <h2>Article</h2>
        </div>
        <div class="col-sm-8">
            @foreach($article as $articles)
                <p>ID : {{$articles->id}}</p>
                <h2><a href="{{url('article/article',$articles->id)}}">{{$articles->title}}</a></h2>
                <p>{{$articles->body}}</p>
                <p>Active: {{$articles->active}}</p>
                <p>User ID: {{$articles->user_id}}</p>
                <p>User Name: {{$articles->user->name}}</p>
                <a href="{{url('article/article/'.$articles->id.'/edit')}}">Edit</a>
                <a href="{{url('article/article/'.$articles->id)}}">Delete</a>

            @endforeach
                <ul class="pagination pagination-lg">{{$article->links()}}</ul>
        </div>

    </div>

@endsection
@section('js')
    @parent

@endsection