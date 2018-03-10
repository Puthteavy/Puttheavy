@extends('master.admin.admin')
@section('title','Post List')
@section('css')

    @parent

@endsection
@section('content')
  <h1>Post List</h1>
  <div class="x_panel">

      <div class="x_content">

          <table class="table">
              <thead>
                  <tr>
                      <th>
                          <div class="x_content">
                              <a href="{{url('/admin/post-form')}}" class="btn btn-primary">Add</a>
                          </div>
                      </th>
                      <th>Title</th>
                      <th>Description</th>
                      <th>Content</th>
                  </tr>
              </thead>
              <tbody>
              @foreach($result as $row)
                <tr>
                    <td>
                        {{-- edit --}}
                        <form action="{{url('/admin/post-form')}}" method="post">
                            {!! csrf_field() !!}
                            {!! method_field('put') !!}
                            <input type="hidden" value="{{$row->id}}" name="id">
                            <button type="button" class="btn btn-warning">Edit</button>
                            {{-- delete use ajax --}}
                            <a data-id="{{ $row->id }}" class="btn btn-danger mydelete">Delete</a>

                        </form>


                    </td>
                    <td>{{$row ->id}}</td>
                    <td>{{$row ->title}}</td>
                    <td>{{$row ->description}}</td>
                    <td>{{$row ->content}}</td>

                    <td>
                </tr>
              @endforeach
              </tbody>
          </table>
          <div class="dataTables_paginate paging_simple_numbers" id="datatable-buttons_paginate">
              <ul class="pagination">
                  {{ $result->links() }}
              </ul>
          </div>
      </div>
  </div>

@endsection
@section('js')
    @parent
    <script>
        $(document).ready(function () {

        });
    </script>
@endsection