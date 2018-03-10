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
                <h1>今、人気のカワイイ振袖はこれ！</h1>
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
                            $ranking_patern=get_field_object('field_5950b39cf292f');
                            $ranking_type=get_field_object('field_5950b37cf292e');
                            ?>

                            <?php if( $ranking_color ) : ?>
                                <?php $color_selected = $_GET['color']; ?>
                                <select name="color" class="rankSelect">
                                    <option value="">色</option>
                                    <?php foreach( $ranking_color['choices'] as $k => $v ) : ?>
                                        <?php if($k == '選択してください') continue; ?>
                                        <option value="<?php echo $k ?>"
                                            <?php if( $color_selected == $v ) { echo " selected"; } ?>><?php echo $v; ?>
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
                                        <option value="<?php echo $k ?>"
                                            <?php if( $pattern_selected == $v ) { echo " selected"; } ?>><?php echo $v; ?>
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
                                        <option value="<?php echo $k ?>">
                                            <?php if( $type_selected == $v ) { echo " selected"; } ?>><?php echo $v; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            <?php endif; ?>

                        </div>
                        <span class="sign">X</span>
                        <div class="rankingSearch">
                            <input type="text" id="searchRanking" placeholder="<?php echo esc_attr_x( 'フリーワード', 'placeholder' ) ?>"
                                value="<?php echo get_search_query() ?>" name="s">
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
                <div class="furisodeImages">
                    <h3>検索結果</h3>
                    <div class="ranktotalNumber">
                        <p><span class="count-all-image"></span> 件中 <span class="p-form">1</span> ～ <span class="p-to">12</span> 件を表示</p>
                    </div>

                    <div class="furisodeImgUpload" id="furisodeCount">

                        <?php
                            $args = array(
                                'post_type' => 'post',
                                'posts_per_page' => -1
                                );

                            query_posts( $args );
                            if (have_posts() ) : ;
                            while ( have_posts() ) : the_post();
                        ?>
                                <?php

                                $images = acf_photo_gallery('photo_gallery', $post->ID);
                                $image = wp_get_attachment_image_src(get_field('link_url'));

                                if( count($images) ):

                                    foreach($images as $image):
                                        $title = $image['title'];
                                        $caption = $image['caption'];
                                        $full_image_url = $image['full_image_url'];
                                        $full_image_url = acf_photo_gallery_resize_image($full_image_url);
                                        $thumbnail_image_url = $image['thumbnail_image_url'];
                                        $url= $image['url'];
                                        $link = get_field('link', $image['ID']);
                                        $target= $image['target'];
                                        $alt = get_field('photo_gallery_alt', $id);
                                        $class = get_field('photo_gallery_class', $id);
                                        ?>

                        <?php
                            if($image != ''){
                                $title = get_the_title();
                                $countAllImage++;
                                $arrAllImage[] = array('id'=>get_permalink(get_the_ID()),'image'=> $image['full_image_url'],'title'=>$title);

                                if($countAllImage <= 12) {
                        ?>

                          <div class="upImages">
                              <a href="<?php the_permalink(get_the_ID()); ?>">
                               <div class="imgbox">
                                   <img src="<?php echo $image['full_image_url']; ?>" alt="">
                                   <div class="thumbnail-hover"><p><?php the_title();?></p></div>
                               </div>
                            </a>
                          </div>

                        <?php  } } ?>

                                    <?php endforeach; endif; ?>

                        <?php
                            endwhile;
                            endif;
                        ?>
                        
                    </div>
                </div>
            </div>

        </section>
        <?php
            $totalImage = count($arrAllImage);
            $numberPage = ceil($totalImage /12);
        ?>

        <?php
        if ($totalImage > 12){ ?>
            <?php $arrStartEnd = getStartEndPage($numberPage,1,4); ?>
            <div class="pageGination">
                <a href="#" class="pre">PRE</a>
                <?php for($i = $arrStartEnd[0];$i <= $arrStartEnd[1]; $i++) {?>
                    <a href="#" class="pagegi <?php echo $i == 1 ? 'activePagi' : ''; ?>" data-id="<?php echo $i; ?>"><?php echo $i; ?></a>
                <?php } ?>
                <a href="#" class="next">NEXT</a>
            </div>
        <?php } ?>
</div>


<script type="text/javascript">

    function createPaginate(arrStartEnd, p)
    {
        var html = '';
        html += '<a href="#" class="pre">PRE</a>';
            for(i = arrStartEnd[0];i <= arrStartEnd[1]; i++) {
               html+= '<a href="#" class="pagegi'+(i == p ? ' activePagi' : '')+'" data-id="'+i+'">'+i+'</a>';
             }
        html += '<a href="#" class="next">NEXT</a>';

        return html;
    }

    //alert(createPaginate([1,20]));

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
    $('.count-all-image').html(<?php echo $totalImage; ?>);

    <?php
        if($totalImage > 12){
        $imagePaginate = array_chunk($arrAllImage,12);

        foreach($imagePaginate as $k => $img)
        {
            echo "img[$k] = ".json_encode($img)." ;";
        }
    ?>

    function getData(p)
    {
        if(img[p-1])
        {
            var m = img[p-1];
            var html = '';
            $.each(m, function(i,e){
                html += '<div class="upImages">'+
                    '<a href="'+e.id+'">'+
                    '<div class="imgbox">'+
                    '<img src="'+e.image+'" alt="">'+
                    '<div class="thumbnail-hover"><p>'+e.title+'</p></div>'+
                    '</div>'+
                    '</a>'+
                    '</div>';
            });

            $('.furisodeImgUpload').html(html);

            var pFrom = (p-1) * 12 + 1;
            var pTo = (p * 12);

            if(pTo > <?php echo $totalImage; ?>)
            {
                pTo = <?php echo $totalImage; ?>;
            }
            $('.p-form').html(pFrom);
            $('.p-to').html(pTo);

            var arr = getStartEndPage(<?php echo $numberPage; ?>, p, 4);
            var paginate = createPaginate(arr, p);

            $('.pageGination').html(paginate);
        }
    }


    function setActive(p)
    {
    	
        $(".pageGination .pagegi").removeClass('activePagi');
        $(".pageGination .pagegi").each(function(){
            var px = $(this).data('id');

            if(p == px)
            {
                $(this).addClass('activePagi');
            }
        });
    }
    // $(function(){

    //     setActive(1);

    //     $('.pre').css('opacity','0');

    //     $('body').delegate('.pageGination .pagegi','click',function(e){
    //         e.preventDefault();

    //         var p = $(this).data('id');

    //         if(p == 1)
    //         {
    //             $('.pre').css('opacity','0');
    //         }
    //         else
    //         {
    //             $('.pre').css('opacity','1');
    //         }

    //         if(p == <?php echo $totalImage; ?>)
    //         {
    //             $('.next').css('opacity','0');
    //         }
    //         else
    //         {
    //             $('.next').css('opacity','1');
    //         }

    //         setActive(p);
    //     });

    //     $('.next').on('click',function(e){
    //         e.preventDefault();
    //         currentPage++;

    //         if(currentPage > <?php echo $totalImage; ?>)
    //         {
    //             currentPage = <?php echo $totalImage; ?>;
    //         }

    //         if(currentPage == <?php echo $totalImage; ?>)
    //         {
    //             $('.next').css('opacity','0');
    //         }

    //         if(currentPage > 1)
    //         {
    //             $('.pre').css('opacity','1');
    //         }

    //         setActive(currentPage);

    //     });

    //     $('.pre').on('click',function(e){
    //         e.preventDefault();
    //         currentPage--;

    //         if(currentPage < 1)
    //         {
    //             currentPage = 1;
    //         }

    //         if(currentPage == 1)
    //         {
    //             $('.pre').css('opacity','0');
    //         }

    //         if(currentPage < <?php echo $totalImage; ?>)
    //         {
    //             $('.next').css('opacity','1');
    //         }

    //         setActive(currentPage);

    //     });
    // });

    $(function(){
        //console.log(img);

        $('body').delegate('.next','click',function(e){
            e.preventDefault();
            currentPage++;

            if(currentPage > <?php echo $numberPage ?>)
            {
                currentPage = <?php echo $numberPage ?>;
            }
            getData(currentPage);
            setActive(currentPage);
        });

        $('body').delegate('.pre','click',function(e){
            e.preventDefault();
            currentPage--;

            if(currentPage < 1)
            {
                currentPage = 1;
            }
            getData(currentPage);
            setActive(currentPage);
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
             $('.p-form').html(<?php echo $totalImage - 0 == 0 ? 0 : 1; ?>);
             $('.p-to').html(<?php echo $totalImage - 0; ?>);
         });

    <?php } ?>
</script>

<?php get_footer(); ?>


