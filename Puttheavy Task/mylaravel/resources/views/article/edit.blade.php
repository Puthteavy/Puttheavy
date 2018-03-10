@extends('master.index')
@section('title','Edit')
@section('content')
    <h1>Create Form </h1>
    <div class="panel panel-info">
        <div class="page-heading">
            <h3 class="panel-title">Edit Article</h3>
        </div>
        <div class="panel-body">

            {!! Form::open(['url' => 'article']) !!}
            <div class="form-group">
                {{Form::label('article_id','ID')}}
                {{Form::text('article_id',null,['class'=>'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('name','Name')}}
                {{Form::text('name',null,['class'=>'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::submit('Save',['class'=>'btn btn-primary form-control'])}}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@show