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
                <form action="{{url('admin/savePost')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Title</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" placeholder="Title" name="title">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Category</label>
                            <div class="col-md-4">
                                <select name="category_id" class="form-control" required>
                                    <option value="">Select category</option>
                                    @foreach($getCategory as $category)
                                        <option value="{{$category->id}}">{{ $category->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Description</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" placeholder="Description" name="description">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Content</label>
                            <div class="col-md-4">
                                <textarea class="form-control" placeholder="Description" rows="15" name="content"></textarea>
                            </div>
                        </div>

                        <div class="form-group last">
                            <label class="col-md-3 control-label">Image</label>
                            <div class="col-md-4">
                                <input type="file" name="image" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-actions top">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green" name="submit">Submit</button>
                                <button type="reset" class="btn default" name="cancel">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
        </div>
    </div>
@endsection
@section('js')
    @parent
@endsection
