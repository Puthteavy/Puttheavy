@extends('Layout.master_admin')
@section('title','Category Item')
@section('css')
    @parent
@endsection
@section('pageTitle','Category Item')
@section('note','A black page template with a minimal dependency assets to use as a base for any custom page you create')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="portlet box red">
                <div class="portlet-title">
                    <div class="caption"><i class="fa fa-gift"></i>Category</div>
                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->

                    <form action="{{url('/admin/saveCategory')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label">Category Name</label>
                                <input type="text" class="form-control" placeholder="Name" name="category_name">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Category Slug</label>
                                <input type="text" class="form-control" placeholder="Name" name="category_slug">
                            </div>
                            {{--<div class="form-group">--}}
                            {{--<label>Parent Category</label>--}}
                            {{--<select class="form-control input-medium" name="category_id">--}}
                            {{--<option>Please Select</option>--}}
                            {{--@foreach($category as $cat)--}}
                            {{--<option value="{{$cat->id}}">{{$cat->category_name}}</option>--}}
                            {{--@endforeach--}}

                            {{--</select>--}}
                            {{--</div>--}}

                            <div class="form-group">
                                <label class="control-label">Description</label><br>
                                <textarea name="description" placeholder="Description" class="form-control" rows="7"></textarea>
                            </div>

                        </div>
                        <div class="form-actions">
                            <button class="btn green" id="submit" type="submit">Submit</button>
                            <button type="reset" class="btn default" id="cancel">Cancel</button>
                        </div>
                    </form>
                    <!-- END FORM-->
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="portlet box red">
                <div class="portlet-title">
                    <div class="caption"><i class="fa fa-picture"></i>Category List</div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-condensed table-hover">
                            <thead>
                            <tr>
                                <th> ID </th>
                                <th> Name</th>
                                <th> Slug </th>
                                <th> Description</th>
                                <th>Parent Category</th>
                                <th> Status </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($item as $items)
                                <tr>
                                    <td>{{$items->id}}</td>
                                    <td>{{$items->c_name}}</td>
                                    <td>{{$items->c_slug}}</td>
                                    <td>{{$items->c_description}}</td>
                                    <td>{{$items->category_name}}</td>

                                    <td>
                                        <div class="form-group more">
                                            <form action="{{ url('/admin/edit/'.$items->id) }}" method="post" id="form-delete">
                                                <button type="submit" class="btn btn-outline btn-circle btn-sm purple" id="submit">
                                                    <i class="fa fa-edit"> Edit</i>
                                                </button>
                                                {{ csrf_field() }}
                                                {{ method_field('PUT') }}
                                            </form>

                                        </div>
                                        <div class="form-group">

                                            <form action="{{ url('/admin/delete/'. $items->id) }}" method="post">
                                                <button type="submit" class="btn btn-outline btn-circle dark btn-sm black" id="delete">
                                                    <i class="fa fa-trash-o"> Delete</i></button>
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                            </form>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="dataTables_paginate paging_bootstrap_full_number" id="sample_1_2_paginate">
                        <ul class="pagination" style="visibility: visible;">
                            {{ $item->links() }}
                        </ul></div>
                </div>
            </div>
            <!-- END CONDENSED TABLE PORTLET-->
        </div>
    </div>

@endsection
@section('js')
    @parent
    <script type="text/javascript">
        $(function() {

            $('body').delegate('#delete', 'click', function () {

                if (!confirm('Are you sure delete this??')) {
                    return false;
                }
            });
        });
    </script>

@endsection
