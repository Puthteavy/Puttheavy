<!DOCTYPE html>
<html>
<head>

    <title>@yield('title')</title>
    <link rel="icon" type="image/jpg" href="{{ asset('images/general.jpg') }}">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">

</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{url('/dashboard')}}">Book store</a>
    </div>
    <ul class="nav navbar-nav">
       <li class="active"><a href="{{url('/dashboard')}}">List book</a></li>
       <li><a href="{{url('/formcontent')}}">New book</a></li>
       <li><a href="{{url('/postcategory')}}">Post Category</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li>
            @section('search-form')
            @show
        </li>
        <li><a href=""><span class="glyphicon glyphicon-user"></span> {{ @Session::get('user.name') }}</a></li>
        <li><a href="logout"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>

<div class="container"><br><br><br><br>
	@yield('content')
</div>



<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

<script>
    var editor_config = {
        path_absolute : "{{ url('/') }}/",
        selector: "textarea",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,
        file_browser_callback : function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
            if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.open({
                file : cmsURL,
                title : 'Filemanager',
                width : x * 0.8,
                height : y * 0.8,
                resizable : "yes",
                close_previous : "no"
            });
        }
    };

    tinymce.init(editor_config);
</script>
<script type="text/javascript" src="{{ asset('js/sweetalert.min.js') }}"></script>
@yield('script')
<script>
    $(document).ready(function(){
        $('#myTable').DataTable();
    });
</script>
</body>
</html>