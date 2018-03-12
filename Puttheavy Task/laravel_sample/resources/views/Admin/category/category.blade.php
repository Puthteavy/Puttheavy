@extends('Layout.master_admin')
@section('title','Category')
@section('css')
    @parent
@endsection
@section('pageTitle','Category')
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
                    {!! Form::open(['url' => '/admin/saveCategory','method' => 'post','file'=> true]) !!}
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="form-group">
                                {!! Form::label('Category Name', '', ['class' => 'control-label']) !!}
                                {!! Form::text('category_name', '', ['class' => 'form-control','id'=>'category_name','placeholder'=>'Name']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('Category Slug', '', ['class' => 'control-label']) !!}
                                {!! Form::text('category_slug', '', ['class' => 'form-control','id'=>'category_slug','placeholder'=>'Slug']) !!}
                            </div>
                        </div>
                        <div class="form-actions">

                            {!! Form::submit('Submit', ['class' => 'btn green','id'=>'submit']) !!}
                            {!! Form::reset('Clear', ['class' => 'btn default','id'=>'cancel']) !!}

                        </div>
                    {!! Form::close() !!}
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
                                <th> Category ID </th>
                                <th> Category Name</th>
                                <th> Category Slug </th>
                                <th> Status </th>
                            </tr>
                            </thead>
                            <tbody>
                              @foreach($category as $row)
                                  <tr>
                                      <td>{{$row->id}}</td>
                                      <td>{{$row->category_name}}</td>
                                      <td>{{$row->category_slug}}</td>
                                      <td>
                                          <div class="form-group more">
                                              <form action="{{ url('/admin/edit/'.$row->id) }}" method="post" id="form-delete">
                                                  <button type="submit" class="btn btn-outline btn-circle btn-sm purple" id="submit">
                                                      <i class="fa fa-edit"> Edit</i>
                                                  </button>
                                                  {{ csrf_field() }}
                                                  {{ method_field('PUT') }}
                                              </form>
                                              {{--<a href="{{url('/admin/edit/'.$row->id)}}">Edit</a>--}}
                                          </div>
                                          <div class="form-group">

                                              <form action="{{ url('/edit/'. $row->id) }}" method="post">
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
                            {{ $category->links() }}
                        </ul></div>
                </div>
            </div>
            <!-- END CONDENSED TABLE PORTLET-->
        </div>
    </div>

@endsection
@section('js')
    @parent

@endsection
