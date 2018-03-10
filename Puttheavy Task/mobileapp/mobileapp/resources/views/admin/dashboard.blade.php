@extends('layout.master')

@section('title','List book')

@section('search-form')
	<form class="navbar-form pull-left" action="{{ Request::url() }}" method="get">
		<input type="text" class="form-control" placeholder="Search" name="q" value="{{Request::get('q')}}">
	</form>
@endsection

@section('content')

<div class="row">
	<div class="col-md-12 my-grid">

	</div>
</div>

@endsection

@section('script')
	<script type="text/javascript">
//		$('body').delegate('.my-del','click', function(e){
//			e.preventDefault();
//			swal({
//						title             : "Are you sure?",
//						text              : "You will not be able to recover this record!",
//						type              : "warning",
//						showCancelButton  : true,
//						confirmButtonColor: "#DD6B55",
//						confirmButtonText : "Yes, delete it!",
//						cancelBUttonText  : "No, Cancel delete!",
//						closeOnConfirm    : false,
//						closeOnCancel     : false
//					},
//					function(isConfirm){
//						if(isConfirm){
//							swal("Deleted!","your record has been deleted", "success");
//							$("#form-delete").submit();
//							return false;
//						}
//						else{
//							swal("cancelled","Your record is safe", "error");
//						}
//					}
//			);
//		});
        var gUrl = '{{ url('/dashboard/createPage') }}';
		getGrid(gUrl);

		$(function(){

			$('body').delegate('.my-del','click',function(){
				if(!confirm('Are you sure delete this??')){
					return false;
				}
			});

            $('body').delegate('.pagination a','click',function(){
				var url = $(this).attr('href');
				getGrid(url);
				return false;
			});

			$('body').delegate('input[name=q]','keypress',function(e){
                var c = e.which ? e.which : e.keyCode;

				if(c == 13){
				    getGrid(gUrl);
					return false;
				}

			});
		});

        function getGrid(url)
		{
            var q = $('input[name=q]').val();
			$.ajax({
				url: url,
				type: 'GET',
				data: {q: q},
				success: function(data){
					$('.my-grid').html(data);
				}
			});
		}

	</script>
@endsection