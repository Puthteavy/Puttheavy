 var currentPage = 1;

    function getStartEndPage(total,currentPage,number) {
        var start = 0;
        var end = 0;

        if(total <= 2 * number + 1 || currentPage <= number + 1)
        {
            start = 1;
            end = 2 * number + 1;
        }
        else
        {
            if(currentPage > number + 1)
            {
                end = currentPage + number;
                start = currentPage - number;
            }

            if(currentPage > total - number)
            {
                end = total;
                start = total - 2 * number;
            }

        }

        start = start < 1 ? 1 : start;
        end = end > total ? total : end;

        return [start,end];

    }

    function loadAjax(p){
        currentPage = p;

        $('.pageGination .pagegi').removeClass('activePagi');
        $('.pageGination .pagegi').each(function(){
             var id = $(this).data('id');

             if(id == p)
             {
                 $(this).addClass('activePagi');
             }

        });

        $.ajax({
            url : '',
            data: { mypage: p },
            dataType: 'HTML',
            type: 'POST',
            success: function(data)
            {
                $('.shopListLeft').html(data);
                $('html, body').animate({
                    // scrollTop: parseInt($("#top").offset().top)
                }, 1000);

                var arrStartEnd = getStartEndPage(<?php echo $totalPage; ?>, p, 4);
                var html = '';

                for(i = arrStartEnd[0];i <= arrStartEnd[1];i++)
                {
                    html += '<a href="#" class="pagegi '+(i == p ? 'activePagi' : '')+'" data-id="'+i+'">'+i+'</a>';
                }

                $('.ajaxLoadPage').html(html);
            }
        });

    }

    $(function(){

        loadAjax(1);

        $('.pre').css('opacity','0');

        $('body').delegate('.pageGination .pagegi','click',function(e){
            e.preventDefault();

            var p = $(this).data('id');

            if(p == 1)
            {
                $('.pre').css('opacity','0');
            }
            else
            {
                $('.pre').css('opacity','4');
            }

            if(p == <?php echo $totalPage; ?>)
            {
                $('.next').css('opacity','0');
            }
            else
            {
                $('.next').css('opacity','1');
            }

            loadAjax(p);
        });

        $('.next').on('click',function(e){
            e.preventDefault();
            currentPage++;

            if(currentPage > <?php echo $totalPage; ?>)
            {
                currentPage = <?php echo $totalPage; ?>;
            }

            if(currentPage == <?php echo $totalPage; ?>)
            {
                $('.next').css('opacity','0');
            }

            if(currentPage > 1)
            {
                $('.pre').css('opacity','1');
            }

            loadAjax(currentPage);

        });

        $('.pre').on('click',function(e){
           e.preventDefault();
           currentPage--;

           if(currentPage < 1)
           {
               currentPage = 1;
           }

           if(currentPage == 1)
           {
               $('.pre').css('opacity','0');
           }

           if(currentPage < <?php echo $totalPage; ?>)
           {
               $('.next').css('opacity','1');
           }

           loadAjax(currentPage);

        });


    });