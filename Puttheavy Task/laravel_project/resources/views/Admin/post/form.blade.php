@extends('master.admin.admin')
@section('title','Post List')
@section('css')

    @parent

@endsection
@section('content')
    <h1>Post Form</h1>
    <div class="x_content">
        {{-- form helper --}}
        {!! Form::open(['url' => '/admin/post-save','method' => 'post','file'=> true,'class'=>'form-horizontal form-label-left','id'=>'demo-form2']) !!}

            <div class="form-group">
                {!! Form::label('Title', '', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                <div class="col-md-6 col-sm-6 col-xs-12">
                    {!! Form::text('title', '', ['class' => 'form-control col-md-7 col-xs-12','id'=>'title','placeholder'=>'Title']) !!}
                </div>

            </div>
            <div class="form-group">
                {!! Form::label('Description', '', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                <div class="col-md-6 col-sm-6 col-xs-12">
                    {!! Form::text('description', '', ['class' => 'form-control col-md-7 col-xs-12','id'=>'description','placeholder'=>'Description']) !!}
                </div>

            </div>
            <div class="form-group">
                {!! Form::label('Content', '', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                <div class="col-md-6 col-sm-6 col-xs-12">
                    {!! Form::textarea('content', '', ['class' => 'form-control col-md-7 col-xs-12','id'=>'content']) !!}
                </div>

            </div>
            <div class="ln_solid"></div>
            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    {!! Form::submit('Submit', ['class' => 'btn btn-success','id'=>'submit']) !!}
                </div>
            </div>
        {!! Form::close() !!}
    </div>
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
        <tbody class="mytbody">

        </tbody>
    </table>
    <div class="dataTables_paginate paging_simple_numbers" id="datatable-buttons_paginate">
        <ul class="pagination">

        </ul>
    </div>

@endsection
@section('js')
    @parent
     <script>
         $(function () {
             // get data from index and display in tbody
             $.ajax({
                 url : '{{url ('/admin/post')}}',
                 async : false,
                 //data : {},
                 error : function () {
                   alert('error');
                 },
                 dataType : 'json',
                 type : 'GET', // list use get
                 success : function (d) {
                     console.log(d);
                     var rows = d.data;
                     //loop data it's depend on console log data
                     $(rows).each(function () {
                        var row =$(this);
                        var tr = '<tr>' +
                            '<td>'+row[0].id+'</td>'+
                            '<td>'+row[0].title+'</td>'+
                            '<td>'+row[0].description+'</td>'+
                            '<td>'+row[0].content+'</td>'+
                            '</tr>';
                        $('.mytbody').append(tr);

                     });

                 }

             });

             $('body').delegate('#submit','click',function (e) {
                 e.preventDefault();
                 var title = $('[name=title]').val();
                 var description = $('[name=description]').val();
                 var content = $('[name=content]').val();

                 if(title == '' || description == '' || content == '' ){

                     return false;
                 }else {

                     $.ajax({
                         url : '{{ url('admin/post-save') }}',
                         async : false,
                         data : {title : title,description: description,content:content},
                         error : function () {
                             alert('error');
                         },
                         dataType: 'json',
                         type: 'POST',
                         success: function (data_d) {
                             //data_d : response from server
                             console.log(data_d);
                             if(data_d.error){
                                 alert('error');
                             }else{
                                // after click submit add to row
                                 var tr = '<tr>' +
                                     '<td>'+data_d.id+'</td>'+
                                     '<td>'+data_d.title+'</td>'+
                                     '<td>'+data_d.description+'</td>'+
                                     '<td>'+data_d.content+'</td>'+
                                     '</tr>';

                                 $('.mytbody').prepend(tr); // add more is prepend

                                 // clear after add

                                 $('[name=title]').val('');
                                 $('[name=description]').val('');
                                 $('[name=content]').val('');
                             }
                         }

                     });

                    // return false;

                 }




             });
         });
     </script>
@endsection