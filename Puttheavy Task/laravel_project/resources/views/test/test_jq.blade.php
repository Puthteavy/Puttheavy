@extends('master.admin.admin')
@section('title','Post List')
@section('css')

    @parent

@endsection
@section('content')

    <div class="x_panel">
        <div class="x_title">
            <h2>Basic Tables <small>Test Jquery</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                    </ul>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">

            <table class="table">
                <thead>
                <tr>

                    <th><a class="btn btn-success bt_add" href="#">ADD</a> </th>
                    <th>Item</th>
                    <th>QTY</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Amount</th>
                    <th></th>
                </tr>
                </thead>
                <tbody class="my-body">

                </tbody>
                <tfoot>
                <tr>
                    <td colspan="5">Total</td>
                    <td class="total"></td>
                </tr>
                </tfoot>
            </table>

        </div>
    </div>

@endsection
@section('js')
    @parent
    <script>
        function getTotal() {
            var total=0;
            $('.amount').each(function () {
                total +=($(this).val() -0);

            });
            return total;
        }
        $(function () {
            $('.bt_add').on('click',function (e) {
                e.preventDefault();
                var num = $('.no').length+1;
                var tr= '<tr>'+
                    '<td class="no">'+num+'</td>'+
                    '<td><input class="item"></td>'+
                    '<td><input class="qty"></td>'+
                    '<td><input class="pri"></td>'+
                    '<td><input class="dis"></td>'+
                    '<td><input class="amount"></td>'+
                    '<td><a href="#" class="btn btn-danger bt_del">Delete</td> '+
                    '</tr>';
                //alert(0);
                $('.my-body').append(tr);

            });
            $('.bt_add').trigger('click');
            $('body').delegate('.bt_del','click',function (e) {
               e.preventDefault();

                $(this).parent().parent().remove();
                var i=0;
                $('.no').each(function () {
                     // loop number
                     i++;
                     $(this).text(i);
                    $('.total').html(getTotal());
                });

            });
            // on change
            $('body').delegate('.qty, .pri, .dis','change',function () {
                //var qty = $('.qty').val(); //for only 1 price
                var tr =$(this).parent().parent(); // qty in parent td , td in parent tr so parent() 2 time
                var qty = tr.find('.qty').val() - 0; // -0 mean convert to number auto
                var price = tr.find('.pri').val() - 0;
                var dis = tr.find('.dis').val() - 0;

                var amt = qty*price*(1-dis/100);
                tr.find('.amount').val(amt);
                $('.total').html(getTotal());



            });

        });
    </script>

@endsection