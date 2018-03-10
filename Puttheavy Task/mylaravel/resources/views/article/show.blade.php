@extends('master.index')
@section('title','Article Testing with database')
@section('content')
    <h1>This is Article show</h1>
    <h3>{{$article->article_id}}</h3>
    <h3>{{$article->name}}</h3>
@show