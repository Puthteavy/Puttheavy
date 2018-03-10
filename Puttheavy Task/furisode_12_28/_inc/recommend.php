<section id="recommendBox">
	        <h2 id="recommendShop">RECOMMENDED SHOPS</h2>
            <span>オススメ厳選店一覧</span>
	        <div class="rcmShop">
	        		<?php 
                       $ids = get_users( array('role' => 'PaymentShop' ,'fields' => 'ID') );
					   $args = array(
					        'post_type'=>'post',
					        'post_status'=>'publish',
					        'category_name' => 'recommend',
					        'author' => implode(',', $ids)
			    	); ?>

				    <?php 
                       $query = new WP_Query($args);
                       if($query->have_posts()) :
                       while ($query->have_posts()) : $query->the_post();
				    ?>
				  	
		                    <div class="shop">
		                        <?php if(has_post_thumbnail()):?>
			                        <div class="ShopImg">
			                            <a href="<?php the_permalink();?>"><?php the_post_thumbnail();?></a>
			                        </div>
		                    	<?php else:  ?>
		                    		 <div class="ShopImg">
			                            <a href="<?php the_permalink();?>">
			                            	<img src="<?php echo get_template_directory_uri() ?>/images/pc/shoplist/noImage.png">
			                            </a>
			                        </div>
		                    	<?php endif;?>
		                        <div class="shopTitle">
		                            <h5><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h5>
                                    <?php $des = get_field('description_f'); ?>
                                    <p><?php echo mb_substr($des, 0, 100,'utf-8') .'...'; ?></p>

									<?php
									$post_tag=get_the_tags();
									if($post_tag):?>
										<div class="shopTag">
											<?php 
												foreach ($post_tag as $tag) {
												echo '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>';

											    }
											?>
									    </div>
								    <?php endif; ?>
		                            <div class="shopLocation">
		                                <?php  $value= get_field('shop_address');?>
		                                <?php if ($value):?>

			                                <p><i class="fa fa-map-marker"></i><?php echo $location['address']; ?></p>
			                                <p><i class="fa fa-train"></i><?php echo get_field('shop_access'); ?></p>
			                            <?php else: ?>

			                            <?php endif; ?>
		                            </div>
		                        </div>
		                    </div>
				                    
				               
						<?php endwhile; ?>
				    <?php endif; ?>
			</div>
		</section>