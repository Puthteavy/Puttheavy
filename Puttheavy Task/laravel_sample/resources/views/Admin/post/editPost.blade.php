@extends('Layout.master_admin')
@section('title','Add New')
@section('css')
    @parent
@endsection
@section('pageTitle','Add New')
@section('note','A black page template with a minimal dependency assets to use as a base for any custom page you create')
@section('content')
    <div class="container">
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>Post Forms</div>
                <div class="tools">
                    <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                    <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                    <a href="javascript:;" class="reload" data-original-title="" title=""> </a>
                    <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->

                    {!! Form::model($post,['url' => '/admin/updatePost/'. $post->id,'class'=>'form-horizontal','files'=> true,'method'=>'post']) !!}
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Title</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="title" value="{{$post->title}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Description</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="description" value="{{$post->description}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 col-md-offset-3">
                                    <img src="{{ asset('images/'.$post->image) }}" width="60" height="50">
                                </div>
                            </div>
                        </div>
                        <div class="form-group last">
                            <label class="col-md-3 control-label">Image</label>
                            <div class="col-md-4">
                                <input type="file" name="image" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Content</label>
                            <div class="col-md-4">
                                <textarea class="form-control" rows="15" name="content">{{$post->content}}</textarea>
                            </div>
                        </div>


                    </div>

                    <div class="form-actions top">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green" name="submit">Update</button>
                                <a href="{{url('admin/post')}}" class="btn red">Back</a>
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
                <!-- END FORM-->
            </div>
        </div>
    </div>
@endsection
@section('js')
    @parent
@endsection
