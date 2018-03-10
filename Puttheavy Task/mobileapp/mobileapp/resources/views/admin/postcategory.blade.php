@extends('layout.master')

@section('title','Post Category')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="form-group">
                <label class="col-sm-2 control-label">Category:</label>
                <div class="col-sm-10">
                    {!! isset($category) ? $category : '' !!}
                </div>
            </div>
        </div>
    </div>
@endsection