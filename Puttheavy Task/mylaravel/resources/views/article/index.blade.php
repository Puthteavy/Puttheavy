@extends('master.index')
@section('title','Article Testing with database')
@section('content')
 <h1>This is Article</h1>
    @foreach($article as $articles)
        <table>
            <tr>
                <th>ID</th>
                <td><a href="/article/{{$articles->article_id}}">{{$articles->article_id}}</a> </td>
            </tr>
            <tr>
                <th>Name</th>
                {{-- url helper --}}
                <td><a href="{{url('article',$articles->article_id)}})}}">{{$articles->name}}</a> </td>
            </tr>
        </table>
    @endforeach
@show