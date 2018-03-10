@extends('layout.master')

@section('title','Edit book')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Update</div>
			<h2 style="color:red" align="center">{{ @Session::get('message') }}</h2>
			<form action="{{url('/saveupdatecontent')}}" method="post" role="form" enctype="multipart/form-data" id="form-update">
				<div class="form-group">
					<div class="row">
						<div class="col-md-4 col-md-offset-3">
							<input type="hidden" name="id" value="{{ $row->id }}">
							<input type="text" name="title" class="form-control" placeholder="Title" value="{{ $row->title }}" required>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-4 col-md-offset-3">
							<input type="text" name="cover" class="form-control" value="{{ $row->cover }}" required>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-4 col-md-offset-3">
							<img src="{{ asset('images/'.$row->image) }}" width="60" height="50">
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
						<textarea name="description" rows="11" cols="30" class="form-control">
					       {{ $row->description }}
				        </textarea>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-5 col-md-offset-3">
							<button type="submit" class="btn btn-success my-up">Update</button>
						</div>
					</div>
				</div>
				{{ csrf_field() }}
				{{ method_field('PATCH') }}
			</form>
		</div>
	</div>
</div>
@endsection

@section('script')
	<script type="text/javascript">
//		$('.my-up').on('click',function(e){
//			e.preventDefault();
//
//			swal("Successfully!", "Your record has been updated!", "success")
//		});
	</script>
@endsection