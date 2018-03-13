@extends('Layout.master_admin')
@section('title','Category')
@section('css')
    @parent
@endsection
@section('pageTitle','Category')
@section('note','A black page template with a minimal dependency assets to use as a base for any custom page you create')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="portlet box red">
                <div class="portlet-title">
                    <div class="caption"><i class="fa fa-gift"></i>Category</div>
                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    @if($errors->any())
                        @foreach($errors->all() as $error )
                            <div class="alert alert-danger"><li>{{$error}}</li></div>
                        @endforeach
                    @endif
                    {!! Form::model($category,['url' => '/admin/update/'. $category->id,'file'=> true,'method'=>'post']) !!}
                    {{--<form action="{{url('/admin/update/'. $category->id)}}" method="post" role="form" enctype="multipart/form-data" id="form-update">--}}
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label">Category Name</label>
                                <input type="text" name="category_name" class="form-control" value="{{ $category->category_name}}">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Category Slug</label>
                                <input type="text" name="category_slug" class="form-control" value="{{ $category->category_slug}}">
                            </div>

                        </div>
                        <div class="form-actions">
                           <button type="submit" class="btn green">Update</button>
                        </div>
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                    {{--</form>--}}
                    {!! Form::close() !!}
                <!-- END FORM-->
                </div>
            </div>
        </div>

    </div>

@endsection
@section('js')
    @parent

@endsection
