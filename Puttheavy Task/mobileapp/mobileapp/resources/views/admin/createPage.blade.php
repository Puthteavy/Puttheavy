<h2 align="center">List books</h2><hr/>
<table class="table table-bordered table-condened table-striped table-hover">
    <thead>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Author</th>
        <th>Image</th>
        <th>Date</th>
        <th>Category</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($content as $row)
        <tr>
            <td>{{ $row->id }}</td>
            <td>{{ $row->title }}</td>
            <td>{{ $row->cover }}</td>
            <td><img src="{{ asset('images/'.$row->image) }}" width="60" height="40"></td>
            <td>{{ date("d-M-Y h:m:s h:i A",strtotime($row->created_at)) }}</td>
            {{--<td>{!!  mb_substr($row->description,0,50,'utf-8') !!}</td>--}}
            <td>{{ $row->category->category_name }}</td>
            <td>
                {{--<a href="{{ url('/delete',['array' => $row->id]) }}"><i class="btn btn-sm glyphicon glyphicon-trash"> Delete</i></a> |--}}
                {{--<a href="{{ url('/update',['array' => $row->id]) }}"><i class="btn btn-sm glyphicon glyphicon-pencil"> Update</i></a>--}}
                <div class="form-inline">
                    <div class="form-group">
                        <form action="{{ url('/delete/'.$row->id) }}" method="post" id="form-delete">
                            <button type="submit" class="btn btn-danger btn-sm my-del"><i class="glyphicon glyphicon-trash"> Delete</i></button>
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        </form>
                    </div>
                    <div class="form-group">
                        <form action="{{ url('/update/'. $row->id) }}" method="post">
                            <button type="submit" class="btn btn-info btn-sm btn-update" id="update"><i class="glyphicon glyphicon-pencil"> Edit</i></button>
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                        </form>
                    </div>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<footer>
    <div align="center">
        {{ $content->render() }}
    </div>
</footer>