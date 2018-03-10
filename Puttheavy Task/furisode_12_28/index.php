<?php get_header(); ?>

<?php  
  $catsArea1 = array('hokkaido','aomori','iwate','miyagi','akita','yamagata','fukushima');
  $catidArea1 = get_cats_by_slug($catsArea1); 

    $catsArea2 = array('ibaraki','tochigi','gumma','saitama','chiba','tokyo','kanagawa');
    $catidArea2 = get_cats_by_slug($catsArea2);

    $catsArea3 = array('yamanashi','nagano','gifu','yamanashi','nagano','aichi');
    $catidArea3 = get_cats_by_slug($catsArea3);

    $catsArea4 = array('toyama','niigata','ishikawa','fukui');
    $catidArea4 = get_cats_by_slug($catsArea4); 

    $catsArea5 = array('mie','shiga','kyoto','osaka','hyogo','nara','wakayama');
    $catidArea5 = get_cats_by_slug($catsArea5);

    $catsArea6 = array('tottori','shimane','okayama','hiroshima','yamaguchi');
    $catidArea6 = get_cats_by_slug($catsArea6);

    $catsArea7 = array('tokushima','kagawa','ehime','kochi');
    $catidArea7 = get_cats_by_slug($catsArea7);

    $catsArea8 = array('fukuoka','saga','nagasaki','kumamoto','oita','miyazaki','kagoshima','okinawa');
    $catidArea8 = get_cats_by_slug($catsArea8);

?>




<!-- section search -->
<section id="search">
    <div class="contentSearch">
        <div class="searchImageBlock sp">
            <div class="searchImg01">
                <ul class="bxslider">
                  <li><a href="<?php echo get_home_url('/'); ?>"> <img src="<?php echo get_template_directory_uri() ?>/images/pc/main_image/1.jpg" /></a></li>
                  <li><a href="<?php echo get_home_url('/'); ?>/event"><img src="<?php echo get_template_directory_uri() ?>/images/pc/main_image/2.jpg" /></a></li>
                  <li><a href="<?php echo get_home_url('/'); ?>/recommend"><img src="<?php echo get_template_directory_uri() ?>/images/pc/main_image/3.jpg" /></a></li>
                  <li><a href="<?php echo get_home_url('/'); ?>/furisode"><img src="<?php echo get_template_directory_uri() ?>/images/pc/main_image/4.jpg" /></a></li>
                </ul> 
            </div>
             
        </div>
        <div class="searchTitleBlock">
                <div class="recSpTitle sp">
                    <h2><img src="<?php echo get_template_directory_uri() ?>/images/pc/main/title_shop.png" alt=""></h2>
                    <p>地域から店舗を探す</p>
                </div>
                <div class="banerImage pc">
                    <img src="<?php echo get_template_directory_uri() ?>/images/pc/main/banner_ribbon.jpg" alt="">
                </div>
            
            <div class="locationIcon"><img src="<?php echo get_template_directory_uri() ?>/images/pc/main/SEARCH.png"></div>
            <div class="searchOption pc">

                <select name="option01" class="selection" id='go_to1'>
                    <option selected="selected" value="">北海道・東北　</option>
                    <?php foreach($catidArea1 as $cat1) :?>
                    <option data-id="<?= get_term_link($cat1); ?>" value="<?= get_term_link($cat1); ?>"> <?= get_cat_name($cat1); ?>　</option>
                    <?php endforeach; ?>
                </select>

                <select name="option02" class="selection" id='go_to2'>
                    <option value="">関東</option>
                    <?php foreach($catidArea2 as $cat2) :?>
                    <option data-id="<?= get_term_link($cat2); ?>" value="<?= get_term_link($cat2); ?>"> <?= get_cat_name($cat2); ?>　</option>
                    <?php endforeach; ?>
                </select>

                <select name="option03" class="selection" id='go_to3'>
                    <option value="">中部</option>
                   <?php foreach($catidArea3 as $cat3) :?>
                    <option data-id="<?= get_term_link($cat3); ?>" value="<?= get_term_link($cat3); ?>"> <?= get_cat_name($cat3); ?>　</option>
                    <?php endforeach; ?>
                </select>

                <select name="option04" class="selection" id='go_to4'>
                    <option value="">北陸</option>
                    <?php foreach($catidArea4 as $cat4) :?>
                    <option data-id="<?= get_term_link($cat4); ?>" value="<?= get_term_link($cat4); ?>"> <?= get_cat_name($cat4); ?>　</option>
                    <?php endforeach; ?>
                </select>

                <select name="option05" class="selection" id='go_to5'>
                    <option value="">関西</option>
                    <?php foreach($catidArea5 as $cat5) :?>
                    <option data-id="<?= get_term_link($cat5); ?>" value="<?= get_term_link($cat5); ?>"> <?= get_cat_name($cat5); ?>　</option>
                    <?php endforeach; ?>
                </select>

                <select name="option01" class="selection" id='go_to6'>
                    <option value="">中国</option>
                    <?php foreach($catidArea6 as $cat6) :?>
                    <option data-id="<?= get_term_link($cat6); ?>" value="<?= get_term_link($cat6); ?>"> <?= get_cat_name($cat6); ?>　</option>
                    <?php endforeach; ?>
                </select>

                <select name="option01" class="selection" id='go_to7'>
                    <option value="">四国</option>
                    <?php foreach($catidArea7 as $cat7) :?>
                    <option data-id="<?= get_term_link($cat7); ?>" value="<?= get_term_link($cat7); ?>"> <?= get_cat_name($cat7); ?>　</option>
                    <?php endforeach; ?>
                </select>

                <select name="option01" class="selection" id='go_to8'>
                    <option value="">九州・沖縄</option>
                    <?php foreach($catidArea8 as $cat8) :?>
                    <option data-id="<?= get_term_link($cat8); ?>" value="<?= get_term_link($cat8); ?>"> <?= get_cat_name($cat8); ?>　</option>
                    <?php endforeach; ?>
                </select>
               <div class="btnfs">
                    <button type="submit" class="submit1">検索する></button>
               </div>

            </div>
            <!-- sp search option -->
            <div class="seaarch_spBlock sp">
            <nav id="search-shop" class="search_option sp">
               
               <ul class="area-list">
                   <li class="cat1"><a class="btn-main">北海道・東北</a></li>
                   <li class="cat2"><a class="btn-main">関東</a></li>
                   <li class="cat3"><a class="btn-main">中部</a></li>
                   <li class="cat4"><a class="btn-main">北陸</a></li>
               </ul>
               <div class="area area_cat1">
                   <ul class="area_item">
                        <?php foreach($catidArea1 as $cat1) :?>
                        <li>
                           <?php $category = get_category($cat1);
                                 $count = $category->category_count;?>
                           <a href="<?= get_term_link($cat1); ?>" class="btn_item">
                               <?= get_cat_name($cat1); ?>
                               <?php echo "<br>(".$count.")";?>
                           </a>
                        </li>
                        <?php endforeach; ?>
                        
                   </ul>
               </div>
               <div class="area area_cat2">
                   <ul class="area_item">
                        <?php foreach($catidArea2 as $cat2) :?>
                        <li>
                           <?php $category = get_category($cat2);
                           $count = $category->category_count;?>
                           <a href="<?= get_term_link($cat2); ?>" class="btn_item">
                               <?= get_cat_name($cat2); ?>
                               <?php echo "<br>(".$count.")";?>
                           </a>
                        </li>
                        <?php endforeach; ?>
                        
                   </ul>
               </div>
               <div class="area area_cat3">
                   <ul class="area_item">
                        <?php foreach($catidArea3 as $cat3) :?>
                        <li>
                           <?php $category = get_category($cat3);
                             $count = $category->category_count;?>
                           <a href="<?= get_term_link($cat3); ?>" class="btn_item">
                               <?= get_cat_name($cat3); ?>
                               <?php echo "<br>(".$count.")";?>
                           </a>
                        </li>
                        <?php endforeach; ?>
                        
                   </ul>
               </div>
               <div class="area area_cat4">
                   <ul class="area_item">
                        <?php foreach($catidArea4 as $cat4) :?>
                        <li>
                           <?php $category = get_category($cat4);
                           $count = $category->category_count;?>
                           <a href="<?= get_term_link($cat4); ?>" class="btn_item">
                               <?= get_cat_name($cat4); ?>
                               <?php echo "<br>(".$count.")";?>
                           </a>
                        </li>
                        <?php endforeach; ?>
                        
                   </ul>
               </div>
                <ul class="area-list">
                   <li class="cat5"><a class="btn-main">関西</a></li>
                   <li class="cat6"><a class="btn-main">中国</a></li>
                   <li class="cat7"><a class="btn-main">四国</a></li>
                   <li class="cat8"><a class="btn-main">九州・沖縄</a></li>
               </ul>
               <div class="area area_cat5">
                   <ul class="area_item">
                        <?php foreach($catidArea5 as $cat5) :?>
                        <li>
                           <?php $category = get_category($cat5);
                           $count = $category->category_count;?>
                           <a href="<?= get_term_link($cat5); ?>" class="btn_item">
                               <?= get_cat_name($cat5); ?>
                               <?php echo "<br>(".$count.")";?>
                           </a>
                        </li>
                        <?php endforeach; ?>
                   </ul>
               </div>
               <div class="area area_cat6">
                  <ul class="area_item">
                        <?php foreach($catidArea6 as $cat6) :?>
                        <li>
                           <?php $category = get_category($cat6);
                           $count = $category->category_count;?>
                           <a href="<?= get_term_link($cat6); ?>" class="btn_item">
                               <?= get_cat_name($cat6); ?>
                               <?php echo "<br>(".$count.")";?>
                           </a>
                        </li>
                        <?php endforeach; ?> 
                  </ul>
               </div>
               <div class="area area_cat7">
                  <ul class="area_item">
                        <?php foreach($catidArea7 as $cat7) :?>
                        <li>
                           <?php $category = get_category($cat7);
                           $count = $category->category_count;?>
                           <a href="<?= get_term_link($cat7); ?>" class="btn_item">
                               <?= get_cat_name($cat7); ?>
                               <?php echo "<br>(".$count.")";?>
                           </a>    
                        </li>
                        <?php endforeach; ?> 
                  </ul>
               </div>
               <div class="area area_cat8">
                   <ul class="area_item">
                        <?php foreach($catidArea8 as $cat8) :?>
                        <li>
                           <?php $category = get_category($cat8);
                           $count = $category->category_count;?>
                           <a href="<?= get_term_link($cat8); ?>" class="btn_item">
                               <?= get_cat_name($cat8); ?>
                               <?php echo "<br>(".$count.")";?>
                           </a>
                        </li>
                        <?php endforeach; ?>
                        
                   </ul>
               </div>
            </nav>
            </div>
        </div>
        
        <div class="searchImageBlock pc">
            <div class="searchImg01">
                  
                   <ul class="bxslider">
                      <li><a href="<?php echo get_home_url('/'); ?>"> <img src="<?php echo get_template_directory_uri() ?>/images/pc/main_image/1.jpg" /></a></li>
                      <li><a href="<?php echo get_home_url('/'); ?>/event"><img src="<?php echo get_template_directory_uri() ?>/images/pc/main_image/2.jpg" /></a></li>
                      <li><a href="<?php echo get_home_url('/'); ?>/recommend"><img src="<?php echo get_template_directory_uri() ?>/images/pc/main_image/3.jpg" /></a></li>
                      <li><a href="<?php echo get_home_url('/'); ?>/furisode"><img src="<?php echo get_template_directory_uri() ?>/images/pc/main_image/4.jpg" /></a></li>
                    </ul> 
            </div>
            
            <script type="text/javascript">

               $(function(){
                 var slider = $('.bxslider').bxSlider({
                  mode: 'horizontal',
                  options:true,
                  speed: 600,
                  auto: true,
                   
                });

                $('#reload-slider').click(function(e){
                  e.preventDefault();
                  slider.reloadSlider({
                    mode: 'fade',
                    auto: true,
                    pause: 1000,
                    options:true,
                    speed: 500
                  });
                });
               });
            </script>
        </div>
    </div>
</section>
        <section id="recommend">
            <div class="contentRecommend">
                
                <div class="recommendTitle sp">
                    <div class="recTitle">
                        <div class="recPcTitle pc">
                            <h2><img src="<?php echo get_template_directory_uri() ?>/images/pc/main/title_recomment.png" alt=""></h2></div>   
                        <div class="recSpTitle sp">
                            <h2><img src="<?php echo get_template_directory_uri() ?>/images/sp/main/recommend_sp.png" alt=""></h2>
                            <p>イチ押しの振袖レンタル&販売ショップをご紹介！</p>
                        </div>
                    </div>
                    <div class="recommendIcon"><img src="<?php echo get_template_directory_uri() ?>/images/pc/main/RECOMMENDED.png" alt=""></div>
                    <div class="btnList pc">
                        <a href="<?php echo get_home_url(); ?>/recommend"><div class="recShopList">shop list</div></a>
                    </div>
                </div>
                <div class="recommendImage">
                    <?php
                        $ids = get_users( array('role' => 'PaymentShop' ,'fields' => 'ID') );
                        $a = array(

                            'type' => 'post',
                            'posts_per_page' => 9,
                            'orderby'   => 'rand',
                            'author' => implode(',', $ids),
                            'meta_query' => array(
                                array(
                                    'key' => '_thumbnail_id',
                                    'compare' => '!=',
                                    'value' => null
                                )
                            )

                        );
                        $arg = new WP_Query($a);

                        if( $arg->have_posts() ):
                            while( $arg->have_posts() ): $arg->the_post(); ?>
                            <?php if(! has_post_thumbnail()):?>
                                <?php continue; ?>
                            <?php else: ?>
                              <div class="recBox">
                                  <div class="recImg">
                                      <a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>"><?php the_post_thumbnail();?></a>
                                  </div> 
                                  <div class="catRecommend"><h3><?php the_category();?></h3></div>
                                </div>
                            <?php endif;?> 
                        <?php endwhile; endif; ?>
                        <?php wp_reset_postdata();?>
                </div>
                <div class="recommendTitle pc">
                    <div class="recTitle">
                        <div class="recPcTitle pc">
                            <h2><img src="<?php echo get_template_directory_uri() ?>/images/pc/main/title_recomment.png" alt=""></h2></div>
                            
                        <div class="recSpTitle sp">
                            <h2><img src="<?php echo get_template_directory_uri() ?>/images/sp/main/recommend_sp.png" alt=""></h2>
                        </div>
                        <p>イチ押しの振袖レンタル&販売ショップをご紹介！</p>
                        
                    </div>
                    <div class="recommendIcon"><img src="<?php echo get_template_directory_uri() ?>/images/pc/main/RECOMMENDED.png" alt=""></div>
                    <div class="btnList pc">
                        <a href="<?php echo get_home_url(); ?>/recommend"><div class="recShopList pc">shop list</div></a>
                    </div>
                </div>
            </div>
        </section>
        <section id="ranking">
            <div class="contentRanking">
               
                <div class="rankingTitle">
                    <div class="rankTitle">
                        <h2><img src="<?php echo get_template_directory_uri() ?>/images/pc/main/title_ranking.png" alt=""></h2>
                        <p>今、人気のカワイイ振袖はこれ！</p>
                    </div>
                    <div class="rankingIcon"><img src="<?php echo get_template_directory_uri() ?>/images/pc/main/RANKING.png" alt=""></div>
                    <div class="rankingImage sp">
                        <?php $rand_arg = array(
		                      'posts_per_page' => 6,
		                      'offset' => 1,
		                      'post_type' => 'post', 
		                      'cat' => '-56,-53',
		                      'meta_query' => array(
		                      	array(
		                      		'key' => 'photo_gallery',
		                      		
		                      		'compare' => 'EXISTS'
		                      	),
		                      ),
		                      'orderby' =>'rand',
		                      'order' => 'DESC',
		                      
							
			                );
			                query_posts( $rand_arg ); 
          							while ( have_posts() ) : the_post();?>
          						    <?php 
                              $images = acf_photo_gallery('photo_gallery', $post->ID);
                              $rand = array_rand($images, 1);
                              if( $images ): ?>
                                 <div class="rankImg swiper-slide">
                                   <a href="<?php the_permalink() ?>"><img src="<?php echo $images[$rand]['full_image_url']; ?>" alt="<?php echo $images[$rand]['alt']; ?>" />
                                   </a>
                                </div>
                            <?php endif; ?> 
          							<?php endwhile;wp_reset_query(); ?>
                    </div> 
                    <div class="form">
                        <form role="search" method="get" action="<?php echo home_url( '/furisode' ); ?>">
                            <div class="rankingOption">
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
                            <div class="search">
                                <input type="text" id="searchItem" placeholder="<?php echo esc_attr_x( 'フリーワード', 'placeholder' ); ?>"
                                    value="<?php echo get_search_query(); ?>" name="s">
                                <button type="submit" id="submit"><i class="fa fa-search fa-2x"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="rankingImage pc">
                  <?php $rand_arg = array(
                      'posts_per_page' => 6,
                      'offset' => 1,
                      'post_type' => 'post', 
                      'cat' => '-56,-53',
                      'meta_query' => array(
                      	array(
                      		'key' => 'photo_gallery',
                      		'order' => 'DESC',
                      		'compare' => 'EXISTS'
                      	),
                      ),
                      'orderby' =>'rand',
                      'order' => 'DESC',
					
	                );
	                query_posts( $rand_arg );
	              
					        while ( have_posts() ) : the_post();?>
				        <?php 
  
                $images = acf_photo_gallery('photo_gallery', $post->ID);
                $rand = array_rand($images, 1);
                if( $images ): ?>
                   <div class="rankImg swiper-slide">
                     <a href="<?php the_permalink() ?>"><img src="<?php echo $images[$rand]['full_image_url']; ?>" alt="<?php echo $images[$rand]['alt']; ?>" />
                     </a>
                  </div>
              <?php endif; ?> 
					<?php endwhile;wp_reset_query(); ?>
          </div>

        </section>
        <section id="movie">
            <div class="contentMovie">
                <div class="movieTitle">
                    <h2><img src="<?php echo get_template_directory_uri() ?>/images/pc/main/movie.png" alt=""></h2>
                    <p>話題の着物ムービーをチェック！</p>
                </div>
                <?php
                    $catquery = new WP_Query( 'cat=53&posts_per_page=3' );
                    while($catquery->have_posts()) : $catquery->the_post();
                ?>
                <div class="movieBlog">
                    <div class="movieBox">
                    <div class="movieImg">
                       <?php 
                            $url = get_field('youtube_url'); 
                            $embed = str_replace("watch?v=","embed/", $url);
                       ?>
                       <iframe src="<?= $embed; ?>" frameborder="0" allowfullscreen></iframe>
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
                                    
                                    <a href='http://twitter.com/share?url=<?php echo $embed; ?>&text=<?php the_title(); ?>' 
                                         class="twitter-share-button"
                                         data-show-count="false">
                                         <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                                    </a>
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

                <?php endwhile; ?>
                <div class="btnList">
                        <a href="<?php echo get_home_url(); ?>/movie/"><div class="recShopList">Contents List</div></a>
                </div>
            </div>
        </section>
        <div class="eventNewsWrap">
            <div class="conetnEventNewsWrap">
                <section id="event">
	                <div class="eventBlog">
	                    <div class="enTitle">
	                        <h2><img src="<?php echo get_template_directory_uri() ?>/images/pc/main/title_event.png" class="eventTitle" alt=""></h2>
	                        <p>イベント情報</p>
	                    </div>
	                    <?php  
	                      $args = array(
	                          'category__not_in' => array(53,56),
	                          'posts_per_page' => -1, 
	                          'post_type' => 'post',  );  
	                      $arr_posts = get_array_of_post( $args );  
	                      foreach ($arr_posts as $key => $row) {
	                          $biggestDate[$key]  = $row['start_date']; 
	                      }
	                      array_multisort($biggestDate, SORT_ASC, $arr_posts);
	                  ?>
	                  <?php if( count($arr_posts) ) : ?>

	                  <?php for($i = 0; $i < count($arr_posts); $i++ ) : ?> 
	                  <?php $max=8; if($i == $max){ break; }  ?>
		                <div class="enBox">
		                    <div class="topEventS sp">
		                        <div class="topEvent sp">
		                            <span>【開催期間】 </span>
		                            <p><?php echo $arr_posts[$i]['start_date'].'  ~  '.$arr_posts[$i]['end_date']; ?></p>
		                        </div>
		                    </div>
		                    <?php if( $arr_posts[$i]['thumb_url'] != "" ) : ?>
		                      <div class="enImg">
		                          <a href="<?php echo $arr_posts[$i]['post_link']; ?>" rel="bookmark">
		                              <img src="<?php echo $arr_posts[$i]['thumb_url']; ?>" alt="">
		                          </a>
		                      </div>
		                    <?php else:  ?>
		                      <div class="enImg">
		                          <a href="<?php echo $arr_posts[$i]['post_link']; ?>"><img src="<?php echo get_template_directory_uri() ?>/images/pc/main/shop_bn_PC.jpg" width="300" height="200"></a>
		                      </div>
		                    <?php endif;?>
		                     <div class="enDetail">
		                        <div class="topEvent pc">
		                            
		                            <span>【開催期間】 </span>
		                            <p><?php echo $arr_posts[$i]['start_date'].'  ~  '.$arr_posts[$i]['end_date']; ?></p> 
		                        </div>
		                         <div class="topDes">
		                            <h3 class="pc"><?php echo $arr_posts[$i]['title_post']; ?></h3>
		                            <h5><?php echo $arr_posts[$i]['title']; ?></h5>
		                            <?php ?>

		                            <p><?php 
		                            mb_internal_encoding("UTF-8");
		                            echo mb_substr($arr_posts[$i]['description'],50,'utf-8');
		                             ?></p> 
		                        </div> 
		                         
		                    </div> 
		                  <div class="cal_date">
		                        <h3><?php echo $arr_posts[$i]['category_post']; ?></h3> 

		                        <?php
		                             $c1=$arr_posts[$i]['start_date'];
		                             $c2=$arr_posts[$i]['end_date'];  

		                            $startTimeStamp = strtotime("today");
		                            $endTimeStamp = strtotime($c2);
		                          
		                            if($endTimeStamp > $startTimeStamp){
		                                $timeDiff = abs($endTimeStamp - $startTimeStamp);
		                                $numberDays = $timeDiff/86400; 
		                                $numberDays = intval($numberDays);
		                                echo '<div class="cal_box"><p>あと</p><p>'.$numberDays.' <span>日</span></p><p>で終了</p></div>';
		                            }elseif($endTimeStamp < $startTimeStamp){
		                               
		                               echo '<div class="cal_box"><span>終了<br>しました</span></div>';
		                            }else{
		                                echo '<div class="cal_box"><span>本日<br>終了</span></div>';
		                            }
		                        ?>

		                    </div> 
		                </div>
	           


	            		<?php endfor; ?>

	    				<?php endif; ?>
				        <div class="eventBtn">
				            <a href="<?php echo get_home_url(); ?>/event/"><div class="recShopList">Events List</div></a>
				        </div>
	    		    </div>
               
        		</section>
              	<section id="news">
                	<div class="newsBlog">
	                    <div class="enTitle">
	                        <h2><img src="<?php echo get_template_directory_uri() ?>/images/pc/main/title_new.png" class="newsTitle" alt=""></h2>
	                        <p>新着情報</p>
	                    </div>
	                      <?php
	                        $a = array(
	                            'type' => 'post',
	                            'cat' => 56,
	                            'posts_per_page' => 3,
	                            'category__not_in' => array(53,55),
	                        );

	                        $the_query = new WP_Query($a);
	                        if($the_query->have_posts()):
	                        while ( $the_query->have_posts() ) : $the_query->the_post();
	                      ?>
                      	<div class="enBox">
                            <?php if(has_post_thumbnail()):?>
                            <div class="enImg">
                                <?php the_post_thumbnail( array(164,116) ); ?>
                            </div>
                            <?php else:  ?>
                            <div class="enImg">
                                <img src="<?php echo get_template_directory_uri() ?>/images/pc/main/nothumb.png" width="164" height="116">
                            </div>
                            <?php endif;?>
                            <div class="enDetail"> 
                              <h5><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h5>
                              <?php $excerpt = get_the_excerpt(); ?>
                            <p><?php echo mb_substr($excerpt, 0, 50,'utf-8'); ?></p>
                                
                        </div>
                    </div>
                    <?php endwhile; endif; wp_reset_postdata(); ?>
                    </div>
                </section>
            </div>
        </div>

<?php get_footer(); ?>

<script type="text/javascript">
    $(function(){
//        disable categoty link
        $('.catRecommend').on('click', 'a', function(event) {
            event.preventDefault();
            var href = this.href;
        });
        // $('.enDetail').on('click','a',function(event){
        //     event.preventDefault();
        //     var href = this.href;

        // });

        var id = 'http://furisode-search.heteml.net/';

        $('#go_to1').on('change option:selected',function(e){
            e.preventDefault();

            id = $('#go_to1 :selected').data('id');

            localStorage['url'] = id;

        });

        $('#go_to2').on('change option:selected',function(e){
            e.preventDefault();

            id = $('#go_to2 :selected').data('id');
            localStorage['url'] = id;

        });

        $('#go_to3').on('change option:selected',function(e){
            e.preventDefault();

            id = $('#go_to3 :selected').data('id');
            localStorage['url'] = id;

        });

        $('#go_to4').on('change option:selected',function(e){
            e.preventDefault();

            id = $('#go_to4 :selected').data('id');
            localStorage['url'] = id;

        });

        $('#go_to5').on('change option:selected',function(e){
            e.preventDefault();

            id = $('#go_to5 :selected').data('id');
            localStorage['url'] = id;

        });

        $('#go_to6').on('change option:selected',function(e){
            e.preventDefault();

            id = $('#go_to6 :selected').data('id');
            localStorage['url'] = id;

        });

        $('#go_to7').on('change option:selected',function(e){
            e.preventDefault();

            id = $('#go_to7 :selected').data('id');
            localStorage['url'] = id;

        });

        $('#go_to8').on('change option:selected',function(e){
            e.preventDefault();

            id = $('#go_to8 :selected').data('id');
            localStorage['url'] = id;

        });


        $('.submit1').on('click',function(){

            if (id == 'http://furisode-search.heteml.net/')
            {
                id = localStorage['url'];
            }
            window.location.href = id;
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.cat1').click(function() {
            $('.area_cat1').slideToggle();
            $('.area_cat2').hide();
            $('.area_cat3').hide();
            $('.area_cat4').hide();
            $('.area_cat5').hide();
            $('.area_cat6').hide();
            $('.area_cat7').hide();
            $('.area_cat8').hide();

        });
        $('.cat2').click(function() {
            $('.area_cat2').slideToggle();
            $('.area_cat1').hide();
            $('.area_cat3').hide();
            $('.area_cat4').hide();
            $('.area_cat5').hide();
            $('.area_cat6').hide();
            $('.area_cat7').hide();
            $('.area_cat8').hide();
        });
        $('.cat3').click(function() {
            $('.area_cat3').slideToggle();
            $('.area_cat2').hide();
            $('.area_cat1').hide();
            $('.area_cat4').hide();
            $('.area_cat5').hide();
            $('.area_cat6').hide();
            $('.area_cat7').hide();
            $('.area_cat8').hide();

        });
        $('.cat4').click(function() {
            $('.area_cat4').slideToggle();
            $('.area_cat2').hide();
            $('.area_cat3').hide();
            $('.area_cat1').hide();
            $('.area_cat5').hide();
            $('.area_cat6').hide();
            $('.area_cat7').hide();
            $('.area_cat8').hide();

        });
        $('.cat5').click(function() {
            $('.area_cat5').slideToggle();
            $('.area_cat2').hide();
            $('.area_cat3').hide();
            $('.area_cat4').hide();
            $('.area_cat1').hide();
            $('.area_cat6').hide();
            $('.area_cat7').hide();
            $('.area_cat8').hide();

        });
        $('.cat6').click(function() {
            $('.area_cat6').slideToggle();
            $('.area_cat2').hide();
            $('.area_cat3').hide();
            $('.area_cat4').hide();
            $('.area_cat5').hide();
            $('.area_cat1').hide();
            $('.area_cat7').hide();
            $('.area_cat8').hide();

        });
        $('.cat7').click(function() {
            $('.area_cat7').slideToggle();
            $('.area_cat2').hide();
            $('.area_cat3').hide();
            $('.area_cat4').hide();
            $('.area_cat5').hide();
            $('.area_cat6').hide();
            $('.area_cat1').hide();
            $('.area_cat8').hide();

        });
        $('.cat8').click(function() {
            $('.area_cat8').slideToggle();
            $('.area_cat2').hide();
            $('.area_cat3').hide();
            $('.area_cat4').hide();
            $('.area_cat5').hide();
            $('.area_cat6').hide();
            $('.area_cat7').hide();
            $('.area_cat1').hide();

        });


    });
</script>