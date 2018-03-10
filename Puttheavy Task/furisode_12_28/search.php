<?php get_header(); ?>

<?php
$arrAllImage = array();
$countAllImage = 0;

?>

<div id="shopListWrapper">

    <div class="shopWrap">
        <div class="navLink">
            <?php if (function_exists('qt_custom_breadcrumbs')) qt_custom_breadcrumbs(); ?>
        </div>
        <div class="headShortList">
            <img src="<?php echo get_template_directory_uri() ?>/images/pc/ranking/furisode_title.png" alt="">
            <br>
            <h1>振袖ランキング</h1>
        </div>
    </div>
    <section id="furisodeRanking">
        <h2 id="furisodeTitle">Search for Furisode</h2>
        <div class="furisodeContent">
            <h2>条件を指定して検索</h2>
            <form role="search" method="get" class="my-form" action="<?php echo home_url( '/furisode' ); ?>">
                <div class="rankingSelectBox">

                    <div class="rankingSelection">
                        <?php

                        $ranking_color = get_field_object('field_5950b351f292d');
                        $ranking_patern = get_field_object('field_5950b39cf292f');
                        $ranking_type = get_field_object('field_5950b37cf292e');
                        $ranking_title = get_field_object('field_5a178d8fe1921');

                        ?>

                        
                        

                        <?php if( $ranking_color ) : ?>
                            <?php $color_selected = $_GET['color']; ?>
                            <select name="color" class="rankSelect">
                                <option value="">色</option>
                                <?php foreach( $ranking_color['choices'] as $k => $v ) : ?>
                                    <?php if($k == '選択してください') continue; ?>
                                    <option value="<?php echo $k ?>" <?php if( $color_selected == $v ) { echo " selected"; } ?>><?php echo $v; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        <?php endif; ?>

                        <?php if( $ranking_patern ) : ?>
                            <?php $pattern_selected = $_GET['pattern']; ?>
                            <select name="pattern" class="rankSelect">
                                <option value="">柄</option>
                                <?php foreach( $ranking_patern['choices'] as $k => $v ) : ?>
                                    <?php if($k == '選択してください') continue; ?>
                                    <option value="<?php echo $k ?>" <?php if( $pattern_selected == $v ) { echo " selected"; } ?>><?php echo $v; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        <?php endif; ?>

                        <?php if( $ranking_type ) : ?>
                            <?php $type_selected = $_GET['type']; ?>
                            <select name="type" class="rankSelect">
                                <option value="">テイスト</option>
                                <?php foreach( $ranking_type['choices'] as $k => $v ) : ?>
                                    <?php if($k == '選択してください') continue; ?>
                                    <option value="<?php echo $k ?>" <?php if( $type_selected == $v ) { echo " selected"; } ?>><?php echo $v; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        <?php endif; ?>

                        <!-- <?php if( $ranking_title ) : ?>
                            <?php $_GET['stitle'] = $_GET['s']; ?>
                            <input type="hidden" name="stitle" value="<?php echo $_GET['stitle']; ?>">
                        <?php endif; ?>
                         -->

                    </div>
                    <span class="sign">X</span>
                    <div class="rankingSearch">
                        <input type="text" id="searchRanking" placeholder="<?php echo esc_attr_x( 'フリーワード', 'placeholder' ) ?>"
                               value="<?php echo get_search_query(); ?>" name="s">
                        <button type="submit" id="submit"><i class="fa fa-search fa-2x"></i></button>
                    </div>
                </div>
                <div class="colorbox">
                    <h3>絞り込み検索</h3>
                    <div class="colorType">
                        <div class="typeLeft"><p><i class="fa fa-heart" aria-hidden="true"></i>絞り込み検索</p></div>
                        <div class="typeRight">
                            <div class="pText01">
                                <?php foreach($ranking_color['choices'] as $k => $v){ ?>
                                    <?php if($k == '選択してください') continue; ?>
                                    <p><a data-v="<?php echo $k; ?>" data-class="color" class="my-sort" href="#"><?php echo $v; ?></a></p>  
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="colorType">
                        <div class="typeLeft"><p><i class="fa fa-heart" aria-hidden="true"></i>柄で選ぶ</p></div>
                        <div class="typeRight">
                            <div class="pText02">
                                <?php foreach($ranking_patern['choices'] as $k => $v ){ ?>
                                    <?php if($k == '選択してください') continue; ?>
                                    <p><a data-v="<?php echo $k; ?>" data-class="pattern" class="my-sort" href="#"><?php echo $v; ?></a></p>
                                <?php } ?>
                            </div>

                        </div>
                    </div>
                    <div class="colorType">
                        <div class="typeLeft"><p><i class="fa fa-heart" aria-hidden="true"></i>テイストで選ぶ</p></div>
                        <div class="typeRight">
                            <div class="pText02">
                                <?php foreach($ranking_type['choices'] as $k => $v){ ?>
                                    <?php if($k == '選択してください') continue; ?>
                                    <p><a data-v="<?php echo $k; ?>" data-class="type" class="my-sort" href="#"><?php echo $v; ?></a></p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="btnSearch">
                        <button type="submit" class="submit1">検索する</button>
                </div>
            </form>

            <?php  
                $color = (!empty($_GET['color'])) ? $_GET['color'] : '';
                $pattern = (!empty($_GET['pattern'])) ? $_GET['pattern'] : '';
                $type = (!empty($_GET['type'])) ? $_GET['type'] : '';
                $title = (!empty($_GET['s'])) ? $_GET['s'] : '';
                $args = array( 
                    'posts_per_page' => -1,
                    'post_type'   => 'attachment',
                    'post_status' => 'inherit', 
                    'post_parent'   => $post->ID,      
                    'meta_query'  => array(
                        'relation'      => 'AND',
                        array( 'key'     => 'colors', 'value'   => $color, 'compare' => 'LIKE' ),
                        array( 'key'     => 'patterns', 'value'   => $pattern, 'compare' => 'LIKE' ),
                        array( 'key'     => 'types', 'value'   => $type, 'compare' => 'LIKE' ),
                        array( 'key'     => 'title_shop', 'value'   => $title , 'compare' => '!=' ),
                     ),
                    // 's' => $_GET['s']  
                );
                $the_query = new WP_Query( $args ); 

                // $json = json_encode($the_query);
                // echo $json;
                // count post
                $totalPosts = $the_query->post_count; 
                $postPerPage = 12;
                $paginate = ceil($totalPosts/$postPerPage); 
                // var_dump($the_query);
            ?>
            <div class="furisodeImages">
                <h3>検索結果</h3>
                <div class="ranktotalNumber">

                    <p><span class="count-all-image"><?php echo $totalPosts; ?></span> 件中 <span class="p-form">1</span> ～ <span class="p-to">30</span> 件を表示</p>

                </div>
                <div class="furisodeImgUpload">
                    
                    <?php if( $the_query->have_posts() ) : ?>
                        <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>  
                            <?php 
                                $image_src = wp_get_attachment_image_src(get_the_ID(), 'full'); 
                                $arrAllImage[] = array('link'=>get_permalink($post->post_parent),'image'=> $image_src[0],'title'=>get_the_title($post->post_parent));
                                $countAllImage++;
                            ?>
                            <?php if($countAllImage <= $postPerPage) : ?> 
                                <div class="upImages"> 
                                    <a href="<?php echo get_permalink($post->post_parent); ?>">
                                        <div class="imgbox">
                                            <img src="<?php echo $image_src[0]; ?>" alt="<?php the_title(); ?>">
                                            <div class="thumbnail-hover"><p><?php echo get_the_title($post->post_parent); ?></p></div>
                                        </div>

                                    </a>
                                </div>
                            <?php endif; ?>

                        <?php endwhile; ?> 
                    <?php endif; ?>

                    <?php //wp_reset_query(); ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            </div>
        </div> 
    </section>

    <?php if ($totalPosts > $postPerPage) : ?>
        <?php $arrStartEnd = getStartEndPage($paginate,1,4); ?>
        <div class="pageGination">
            <a href="#" class="pre hide-me" id="pre">PRE</a>
            <?php for($i = $arrStartEnd[0];$i <= $arrStartEnd[1]; $i++) {?>
                <a href="#" class="pagegi <?php echo $i == 1 ? 'activePagi' : ''; ?>" data-id="<?php echo $i; ?>"><?php echo $i; ?></a>
            <?php } ?>
            <a href="#" class="next" id="next">NEXT</a>
        </div>
    <?php endif; ?>

</div>


<script type="text/javascript">

    function createPaginate(arrStartEnd, p) {
        var html = '';
        html += '<a href="#" class="pre' + ((p == 1) ? ' hide-me' : '') + '" id="pre">PRE</a>';
            for(i = arrStartEnd[0];i <= arrStartEnd[1]; i++) {
               html+= '<a href="#" class="pagegi'+(i == p ? ' activePagi' : '')+'" data-id="'+i+'">'+i+'</a>';
             }
        html += '<a href="#" class="next' + ((p == <?php echo $paginate; ?>) ? ' hide-me' : '') + '" id="next">NEXT</a>';

        return html;
    }

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

    $(function(){
       $('.my-sort').on('click',function(e){
           e.preventDefault();

           var v = $(this).data('v');
           var c = $(this).data('class');

           $('.rankSelect').val('');
           $('[name=s]').val('');

           if(c == 'color')
           {
                $('[name=color]').val(v);
           }
           else if(c == 'pattern')
           {
               $('[name=pattern]').val(v);
           }
           else if(c == 'type')
           {
               $('[name=type]').val(v);
           }

           $('.my-form').submit();
           $('#submit').trigger('click');

       });
    });

    var img = [];
    var currentPage = 1; 

    <?php
        if($totalPosts > $postPerPage){
            $imagePaginate = array_chunk($arrAllImage,$postPerPage);

            foreach($imagePaginate as $k => $img)
            {
                echo "img[$k] = ".json_encode($img)." ;";
            }
    ?>

        function getData(p) {
            if(img[p-1]) {
                var m = img[p-1];
                var html = '';
                $.each(m, function(i,e){
                    html += '<div class="upImages">'+
                        '<a href="'+e.link+'">'+
                        '<div class="imgbox">'+
                        '<img src="'+e.image+'" alt="">'+
                        '<div class="thumbnail-hover"><p>'+e.title+'</p></div>'+
                        '</div>'+
                        '</a>'+
                        '</div>';
                });

                $('.furisodeImgUpload').html(html);

                var pFrom = (p-1) * <?php echo $postPerPage; ?> + 1;
                var pTo = (p * <?php echo $postPerPage; ?>);

                if(pTo > <?php echo $totalPosts; ?>)
                {
                    pTo = <?php echo $totalPosts; ?>;
                }
                $('.p-form').html(pFrom);
                $('.p-to').html(pTo);

                var arr = getStartEndPage(<?php echo $paginate; ?>, p, 4);
                var paginate = createPaginate(arr, p);

                $('.pageGination').html(paginate);
            }
        }

        function activePaginate(p) {
            $(".pageGination .pagegi").removeClass('activePagi');
            $(".pageGination .pagegi").each(function(){
                var px = $(this).data('id');

                if(p == px)
                {
                    $(this).addClass('activePagi');
                }
            });
        }

        $(function(){
            //console.log(img);
            $('.p-form').html(<?php echo $totalPosts - 0 == 0 ? 0 : 1; ?>);
             $('.p-to').html(<?php echo $postPerPage; ?>);

            $('body').delegate('#next','click',function(e){
                e.preventDefault();
                currentPage++;

                if(currentPage > <?php echo $paginate; ?>)
                {
                    currentPage = <?php echo $paginate; ?>;
                }
                getData(currentPage);
                activePaginate(currentPage);
            });

            $('body').delegate('#pre','click',function(e){
                e.preventDefault();
                currentPage--;

                if(currentPage < 1)
                {
                    currentPage = 1;
                }
                getData(currentPage);
                activePaginate(currentPage);
            });

            $('body').delegate('a.pagegi','click',function(e){
                e.preventDefault();

                $('a.pagegi').removeClass('activePagi');
                $(this).addClass('activePagi');

                var p = $(this).data('id');
                currentPage = p;

                getData(currentPage);
            });

        });

    <?php } else {?>

         $(function(){
             $('.p-form').html(<?php echo $totalPosts - 0 == 0 ? 0 : 1; ?>);
             $('.p-to').html(<?php echo $totalPosts - 0; ?>);
         });

    <?php } ?>

</script>


<?php get_footer(); ?>



