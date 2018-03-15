@extends('Layout.master_admin')
@section('title','Post List')
@section('css')
    @parent
@endsection
@section('pageTitle','List all Post')
@section('note','A black page template with a minimal dependency assets to use as a base for any custom page you create')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet box red">
                    <div class="portlet-title">
                        <div class="caption"><i class="fa fa-picture"></i>Post List</div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-scrollable">
                            <table class="table table-condensed table-hover">
                                <thead>
                                <tr>
                                    <th> ID</th>
                                    <th> Title</th>
                                    <th> Category</th>
                                    <th> Description </th>
                                    <th> Image </th>
                                    <th> Content</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                  @foreach($post as $posts)
                                     <tr>
                                         <td>{{$posts->id}}</td>
                                         <td>{{$posts->title}}</td>
                                         <td>{{$posts->category->category_name}}</td>
                                         <td>{{$posts->description}}</td>
                                         <td><img src="{{ asset('images/'.$posts->image) }}" width="60" height="50"></td>

                                         <td>{{$posts->content}}</td>
                                         <td>
                                             <div class="form-group more">
                                                 <form action="{{ url('/admin/editPost/'.$posts->id) }}" method="post" id="form-delete">
                                                     <button type="submit" class="btn btn-outline btn-circle btn-sm purple" id="submit">
                                                         <i class="fa fa-edit"> Edit</i>
                                                     </button>
                                                     {{ csrf_field() }}
                                                     {{ method_field('PUT') }}
                                                 </form>

                                             </div>
                                             <div class="form-group">

                                                 <form action="{{ url('/admin/deletePost/'. $posts->id) }}" method="post">
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

                            </ul>
                        </div>
                    </div>
                </div>
                <!-- END CONDENSED TABLE PORTLET-->
            </div>
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
