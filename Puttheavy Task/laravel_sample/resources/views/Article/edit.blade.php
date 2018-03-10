@extends('Layout.master')
@section('title','Edit Create')
@section('css')
    @parent

@endsection
@section('content')

    <div class="container">

        <div class="panel panel-info">
            <div class="panel-heading">
                <h1>Article Form</h1>
            </div>
            <div class="panel-body">
                @if($errors->any())
                    @foreach($errors->all() as $error )
                        <div class="alert alert-danger"><li>{{$error}}</li></div>
                    @endforeach
                @endif
                {!! Form::model($article,['url' => 'article/article/'.$article->id,'file'=> true,'method'=>'PATCH']) !!}
                {{ csrf_field() }}
                <div class="form-group">
                    {!! Form::label('Title', '') !!}
                    {!! Form::text('title', '', ['class' => 'form-control','id'=>'title','placeholder'=>'Title']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Body', '') !!}
                    {!! Form::textarea('body', '', ['class' => 'form-control','id'=>'body','placeholder'=>'Body']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Active', '') !!}
                    {!! Form::text('active', '', ['class' => 'form-control','id'=>'active','placeholder'=>'Active']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Submit', ['class' => 'btn btn-success','id'=>'submit']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>

    </div>

@endsection
@section('js')
    @parent

@endsection