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
                <form action="#" class="form-horizontal">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Title</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" placeholder="Title">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Category</label>
                            <div class="col-md-4">
                                <select>
                                    <option>Please Select</option>
                                    <option>Item 1</option>
                                    <option>Item 1</option>
                                    <option>Item 1</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Description</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" placeholder="Description">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Content</label>
                            <div class="col-md-4">
                                <textarea class="form-control" placeholder="Description" rows="15"></textarea>
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
                                <button type="submit" class="btn green">Submit</button>
                                <button type="button" class="btn default">Cancel</button>
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
