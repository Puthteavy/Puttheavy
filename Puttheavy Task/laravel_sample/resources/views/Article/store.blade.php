@extends('Layout.master')
@section('title','Store Article')
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
                <h2><a href="{{url('article',$articles->id)}}">{{$articles->title}}</a></h2>
                <p>{{$articles->body}}</p>

            @endforeach
            <ul class="pagination pagination-lg">{{$article->links()}}</ul>
        </div>

    </div>

@endsection
@section('js')
    @parent

@endsection