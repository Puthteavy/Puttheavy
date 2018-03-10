@extends('master.admin.admin')
@section('title','Post List')
@section('css')

    @parent

@endsection
@section('content')
    <h1>Edit Item</h1>
    <div class="x_content">
        {{-- form helper --}}
        {!! Form::open(['url' => '/admin/post','method' => 'post','file'=> true,'class'=>'form-horizontal form-label-left','id'=>'demo-form2']) !!}

        <div class="form-group">
            {!! Form::label('Title', '', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
            <div class="col-md-6 col-sm-6 col-xs-12">
                {!! Form::text('title', '', ['class' => 'form-control col-md-7 col-xs-12','id'=>'title','placeholder'=>'Title']) !!}
            </div>

        </div>
        <div class="form-group">
            {!! Form::label('Description', '', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
            <div class="col-md-6 col-sm-6 col-xs-12">
                {!! Form::text('description', '', ['class' => 'form-control col-md-7 col-xs-12','id'=>'description','placeholder'=>'Description']) !!}
            </div>

        </div>
        <div class="form-group">
            {!! Form::label('Content', '', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
            <div class="col-md-6 col-sm-6 col-xs-12">
                {!! Form::textarea('content', '', ['class' => 'form-control col-md-7 col-xs-12','id'=>'content']) !!}
            </div>

        </div>
        <div class="ln_solid"></div>
        <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>

@endsection
@section('js')
    @parent

@endsection