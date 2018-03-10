@extends('layout.master')

@section('title','New book')

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Post</div>
			@if (count($errors) > 0)
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
			<h2 style="color:red" align="center">{{ @Session::get('message') }}</h2>
			<form action="{{url('/savecontent')}}" method="post" role="form" enctype="multipart/form-data">
				<div class="form-group">
					<div class="row">
						<div class="col-md-4 col-md-offset-3">
							<select name="category_id" class="form-control" required>
								<option value="">Select category</option>
								@foreach($category as $row)
									<option value="{{$row->id}}">{{ $row->category_name }}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-4 col-md-offset-3">
							<input type="text" name="title" class="form-control" placeholder="Title" required>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-4 col-md-offset-3">
							<input type="text" name="cover" class="form-control" placeholder="Author" required>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-4 col-md-offset-3">
							<input type="file" name="image" class="form-control">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-8 col-md-offset-3">
						<textarea name="description" id="textarea" rows="11" class="form-control">
				        </textarea>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-5 col-md-offset-3">
							<input type="hidden" name="_token" value="{{ Session::token() }}">
							<button type="submit" id="save" class="btn btn-primary">Save</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection

@section('script')
	<script type="text/javascript">
        $(function(){
			$('body').delegate('#save','click',function(){
				$.ajax({
					url: '{{ url('/savecontent') }}',
					type: 'POST',
					async: false,
					data:{
						_token: $('input[name=_token]').val(),
						title: $('input[name=title]').val(),
						cover: $('input[name=cover]').val(),
						description: $('input[name=description]').val(),
						category_id: $('input[name=category_id]').val(),
					},
					dataType: 'json',
					success: function(data){
                        if(data.xx == 1)
						{
							alert('Insert success');
						}
					}
				});
			});
		});
	</script>
@endsection
