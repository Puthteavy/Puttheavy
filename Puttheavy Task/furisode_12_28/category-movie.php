<?php
	$paged = isset($_POST['mypage']) ? $_POST['mypage'] : 1;
	$post_count = 0;
	$per_page = 3; 
?>


<?php

if(!isset($_POST['mypage'])) {
    $b = array(
        'fields' => 'id',
        'type' => 'post',
        'posts_per_page' => -1,
        'category_name' => 'movie',
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
    $a = array(
        'type' => 'post',
        'posts_per_page' => $per_page,
        'paged' => $paged,
        'category_name' => 'movie',
    );

    $arg = new WP_Query($a);

    if ($arg->have_posts()):

        while ($arg->have_posts()): $arg->the_post(); ?>
            <div class="movieBlog">
            	<div class="movieBox">
                <div class="movieImg">
                    <?php 
                        $url = get_field('youtube_url'); 
                        $embed = str_replace("watch?v=","embed/",$url);
                    ?>
                    <iframe width="300" height="200" src="<?= $embed; ?>" frameborder="0" allowfullscreen></iframe>
                </div>
                
                <div class="movieDetail">
                    <h3><?php the_title(); ?></h3>
                    <p><?php echo get_field('youtube_description'); ?></p>

                </div>
                <div class="btnMovie">
                    <div class="fb-share-button btnshare"
                         data-share="true"
                         data-mobile-iframe="true"
                         data-href="<?php echo $embed; ?>"
                         data-lang="ja"
                         data-layout="button_count">
                    </div>
                    <div class="btnshare">

                        <a href='http://twitter.com/share?url=<?php echo $embed; ?>&text=<?php the_title(); ?>' class="twitter-share-button" data-show-count="false">
                            <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script></a>
                    </div>
                    <div class="btnshare">

                        <div class="line-it-button"
                             data-lang="ja" data-type="share-a"
                             data-url="<?php echo $embed; ?>"
                             style="display: none;">

                        </div>
                        <script src="//scdn.line-apps.com/n/line_it/thirdparty/loader.min.js" async="async"　defer="defer"></script>
                    </div>

                </div>
            	</div>
            </div>
        <?php endwhile; endif;
    wp_reset_postdata();
    exit();
}
?>

<?php get_header(); ?>

    <div id="shopListWrapper">
        <div id="wrapContentMovie">
            <div class="navLink">
                 <?php if (function_exists('qt_custom_breadcrumbs')) qt_custom_breadcrumbs(); ?>
            </div>
            <section id="movie">
                <div class="moviewrap">
                    <div class="movieTitle">
                        <img src="<?php echo get_template_directory_uri() ?>/images/pc/main/movie.png" alt="">
                        <h4>話題の着物ムービーをチェック！</h4>
                    </div>
                    <h2 id="movieList">MOVIE CONTENTS LIST</h2>
                    <div class="movieContainer">
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

		        <?php $arrStartEnd = getStartEndPage($totalPage, $paged, 4); ?>

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

    </div>

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
                $('.movieContainer').html(data);
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
</script>
<?php get_footer(); ?>