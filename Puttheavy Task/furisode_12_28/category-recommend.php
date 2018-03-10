<?php

$paged = isset($_POST['mypage']) ? $_POST['mypage'] : 1;
$post_count = 0;
$per_page = 10;

if(!isset($_POST['mypage']))
{
    $ids = get_users( array('role' => 'PaymentShop' ,'fields' => 'ID') );
    $b = array(
        'fields' => 'id',
        'type' => 'post',
        'orderby'   => 'rand',
        'posts_per_page' => -1,
        'category__not_in' => array(52, 53, 55, 56),
        'author' => implode(',', $ids)
    );

    $arg2 = new WP_Query($b);

    if ($arg2->have_posts())
    {
        $post_count = $arg2->post_count;
    }
}
?>

<?php

if(isset($_POST['mypage']))
{
    $ids = get_users( array('role' => 'PaymentShop' ,'fields' => 'ID') );
    $a = array(

        'type' => 'post',
        'orderby'   => 'rand',
        'posts_per_page' => $per_page,
        'category__not_in' => array(52,53,55,56),
        'paged' => $paged,
        'author' => implode(',', $ids)

    );

    $arg = new WP_Query($a);

    if( $arg->have_posts() ):
        while( $arg->have_posts() ): $arg->the_post(); ?>

            <div class="shop">
                <?php if(has_post_thumbnail()):?>
                    <div class="ShopImg">
                        <a href="<?php the_permalink();?>"><?php the_post_thumbnail();?></a>
                    </div>
                <?php else:  ?>
                    <div class="noImage pc">
                        <a href="<?php the_permalink();?>">
                           <img src="<?php echo get_template_directory_uri() ?>/images/pc/main/shop_bn_PC.jpg">
                        </a>
                    </div>
                    <div class="noImage sp">
                        <a href="<?php the_permalink();?>">
                           <img src="<?php echo get_template_directory_uri() ?>/images/pc/main/shop_bn_mobile.jpg">
                        </a>
                    </div>
                <?php endif;?>
                <div class="shopListTitle">
                    <h5><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h5>
                    <?php $excerpt = get_the_excerpt(); ?>
                    <p><?php echo mb_substr($excerpt, 0, 65,'utf-8') .'...'; ?></p>
                    
                    <div class="shopLocation">
                     
                        <?php $location = get_field('shop_address'); ?>
                            <?php if ($location['address'] != ''):?>
                                
                                <p><i class="fa fa-map-marker"></i><?php echo mb_substr($location['address'],0,30,'utf-8'); ?></p>
                            <?php endif; ?>

                            <?php if(get_field('shop_access') != ''):?>
                                <p><i class="fa fa-train"></i><?php echo mb_substr(get_field('shop_access'),0,30,'utf-8'); ?></p>
                            <?php endif; ?>

                    </div>
                </div>
            </div>


        <?php endwhile;
    endif;
    wp_reset_postdata();
    exit();
}

?>


<?php get_header(); ?>
<div id="shopListWrapper">
        
        <div class="shopWrap">
            <div class="navLink">
                 <?php if (function_exists('qt_custom_breadcrumbs')) qt_custom_breadcrumbs(); ?>
            </div>
            <div class="headShortList">

                <img src="<?php echo get_template_directory_uri() ?>/images/sp/main/recommend_sp.png" alt="">
                <br>
                <h1>イチ押しの振袖レンタル&販売ショップをご紹介！</h1>
            </div>
        </div>

		<section id="shopListBox">
            <h2 id="recommendShop">RECOMMENDED SHOPS</h2>
            <span>オススメ厳選店一覧</span>
            <div class="shopList">

                <div class="shopListLeft">

                    <div class="loading"><img src="https://upload.wikimedia.org/wikipedia/commons/b/b1/Loading_icon.gif" alt=""></div>

                </div>

            </div>
        </section>

    <?php if($post_count > $per_page) { ?>
        <?php
            $totalPage = ceil($post_count / $per_page);

            $nextPage = $paged + 1;
            if($nextPage > $totalPage)
            {
                $nextPage = $totalPage;
            }

            $prePage = $paged - 1;
            if($nextPage < 1)
            {
                $nextPage = 1;
            }
        ?>

        <?php $arrStartEnd = getStartEndPage($totalPage,$paged,4); ?>
        
	    <div class="pageGination">
            <a href="#" data-id="<?php echo $prePage; ?>" class="pre">PRE</a>
            <span class="ajaxLoadPage">
            <?php for($i = $arrStartEnd[0];$i <= $arrStartEnd[1]; $i++) { ?>
                <a href="#" class="pagegi <?php echo $i == $paged ? 'activePagi' : ''; ?>" data-id="<?php echo $i; ?>"><?php echo $i; ?></a>
            <?php } ?>
            </span>
            <a href="#" data-id="<?php echo $nextPage; ?>" class="next">NEXT</a>
	    </div>

    <?php } ?>

</div>
<?php get_footer(); ?>

<script type="text/javascript">

    var currentPage = 1;

    function getStartEndPage(total,currentPage,number)
    {
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

    function loadAjax(p)
    {
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
                $('.pre').css('opacity','1');
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

</script>
