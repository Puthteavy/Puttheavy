<?php get_header(); ?>
<?php //$category = get_queried_object(); echo $category->count; ?>
       <div id="shopListWrapper">
        
        <div class="shopWrap">
            <div class="navLink">
                 <?php if (function_exists('qt_custom_breadcrumbs')) qt_custom_breadcrumbs(); ?>
            </div>
            <div class="headShortList">
			    <?php
				    if ( is_single() )
				    {
				        $cats =  get_the_category();
				        $cat = $cats[0];
				    }
				    else
                    {
				        $cat = get_category( get_query_var( 'cat' ) );
				    }
				    $cat_slug = $cat->slug;
				    $cat_id = $cat->cat_ID;
				    $cat_name = $cat->name;
			    ?>
			    <?php echo '<div class="areaTitle">shop list <span class="at">at</span> '.$cat_slug.'</div>';?>
                
                <div class="shoplistinfo">
                    <?php echo '<h1>'.$cat_name.'ショップリスト一覧</h1>';?>
                    <p>あなたの最寄りのお店から お気に入りの振袖を探そう!!</p>
                </div>

            </div>
           
        </div>
        <section id="recommendBox">
            <?php
                $ids = get_users( array('role' => 'PaymentShop' ,'fields' => 'ID') );
                $args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'orderby'   => 'rand',
                    'category_name' => $cat_slug,
                    'author' => implode(',', $ids)
                );
            ?>
            <?php
                $query = new WP_Query($args);
                if($query->have_posts()) :
            ?>
            <h2 id="recommendShop">RECOMMENDED SHOPS</h2>

            <div class="rcmShop">

                <?php while ($query->have_posts()) : $query->the_post(); ?>

                <div class="catShop freeShop">
                    <?php if(has_post_thumbnail()):?>
                        <div class="fShopImg">
                            <a href="<?php the_permalink();?>"><?php the_post_thumbnail();?></a>
                        </div>
                    <?php else:  ?>
                        
                         <div class="fnoImage pc">
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?php echo get_template_directory_uri() ?>/images/pc/main/shop_bn_PC.jpg">
                            </a>
                        </div>
                        <div class="fnoImage sp">
                             <a href="<?php the_permalink(); ?>">
                                <img src="<?php echo get_template_directory_uri() ?>/images/pc/main/shop_bn_mobile.jpg">
                            </a>
                        </div>
                    <?php endif;?>
                    <div class="fshopTitle">
                        <h5><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h5>

                         <?php $excerpt = get_the_excerpt(); ?>

                         <p><?php echo mb_substr($excerpt, 0, 55,'utf-8'); ?></p>
                        <div class="shopLocation">
                            <?php $location = get_field('shop_address'); ?>
                            <?php if ($location['address'] != ''):?>
                                
                                <p><i class="fa fa-map-marker"></i><?php echo $location['address']; ?></p>
                            <?php endif; ?>

                            <?php if(get_field('shop_access') != ''):?>
                                <p><i class="fa fa-train"></i><?php echo get_field('shop_access'); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
            <?php endif; wp_reset_query(); ?>

            
        </section>

		<section id="recommendBox">
            <?php
                $ids = get_users(array('role__not_in' => 'PaymentShop' ,'fields' => 'ID'));

                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 10,
                    'category_name' => $cat_slug,
                    'author' => implode(',', $ids)
                );
            ?>

            <?php
                $query = new WP_Query($args);
                if($query->have_posts()) :
            ?>
            
            <h2 id="recommendShop">SHOPS LIST</h2>
	        <div class="rcmShop">

	            <?php while ($query->have_posts()) : $query->the_post(); ?>
	            <div class="catShop freeShop">
                <?php if(has_post_thumbnail()):?>
                    <div class="fShopImg">
                        <a href="<?php the_permalink();?>"><?php the_post_thumbnail();?></a>
                    </div>
                <?php else:  ?>
                      <div class="fnoImage pc">
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?php echo get_template_directory_uri() ?>/images/pc/main/shop_bn_PC.jpg">
                            </a>
                        </div>
                        <div class="fnoImage sp">
                             <a href="<?php the_permalink(); ?>">
                                <img src="<?php echo get_template_directory_uri() ?>/images/pc/main/shop_bn_mobile.jpg">
                            </a>
                        </div>
                <?php endif;?>
                <div class="fshopTitle">
                    <h5><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h5>

                    <?php $excerpt = get_the_excerpt(); ?>
                    <p><?php echo mb_substr($excerpt, 0, 80,'utf-8'); ?></p>
                    <div class="shopLocation">
                        <?php $location = get_field('shop_address'); ?>
                        <?php if ($location['address'] != ''):?>
                            
                            <p><i class="fa fa-map-marker"></i><?php echo $location['address']; ?></p>
                        <?php endif; ?>

                        <?php if(get_field('shop_access') != ''):?>
                            <p><i class="fa fa-train"></i><?php echo get_field('shop_access'); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>


           <?php endwhile; ?>

			</div>
                <?php endif; ?>
		</section>
		<?php wp_reset_query(); ?>
		

</div>
 

<?php get_footer(); ?>