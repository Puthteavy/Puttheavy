<?php if( have_posts() ) : ?>
	<?php while( have_posts() ) : the_post(); ?>
    <?php 
        $author= get_the_author();
        $role= get_author_role();
        
    ?> 
	   
<div id="shopListWrapper">
        <!-- shopWrap -->
        <div class="shopWrap">
            <div class="navLink">
                 <?php if (function_exists('qt_custom_breadcrumbs')) qt_custom_breadcrumbs(); ?>
            </div>
            <div class="headShortListDetail">
                <img src="<?php echo get_template_directory_uri() ?>/images/pc/detail/img_detail_title.png">
                <h1>ショップ詳細</h1>
            </div>
            <h2 id="shopList">SHOP INFORMATION</h2>
            <?php if( get_field('shop_main_image') != ''):?>
	            <div class="shopMainImage">
			    	<img src="<?php echo get_field('shop_main_image'); ?>" alt="">		
	            </div>
	        
            <?php endif;?>

            <div class="detailShop">
                <div class="detailMainImg">
	                  <?php if(has_post_thumbnail()):?>
							<?php the_post_thumbnail();?>

	                  <?php else:  ?>
	                        <img src="<?php echo get_template_directory_uri() ?>/images/pc/shoplist/noImage.png">
	                  <?php endif;?>
            	</div>
                <div class="shopDetail">
                    <div class="shopDetailTitle">
                        <h5><?php the_title(); ?></h5>
                        <!-- parking -->
                        <div class="DetailShopLocation">
							<?php $location = get_field('shop_address'); ?>
                            <?php if ($location['address'] != ''):?>
                                
                                <p><i class="fa fa-map-marker"></i><?php echo $location['address']; ?></p>
                            <?php endif; ?>

                            <?php if(get_field('shop_access') != ''):?>
                                <p><i class="fa fa-train"></i><?php echo get_field('shop_access'); ?></p>
                            <?php endif; ?>

                        </div>
                        <!-- /parking -->
                    </div>
                </div>
            </div>
            
    	</div>
    	<!-- endshopWrap -->

    	<!-- eventDetailBlock -->
    	<?php if((get_field('start_date_f') || get_field('start_date_s') || get_field('start_date_t')) != ''): ?>
	    <div class="eventDetailBlock">
	    	<div class="eventDetail_Left">
	    		<div class="enTitle">
		            <h2><img src="<?php echo get_template_directory_uri() ?>/images/pc/main/title_event.png" alt=""></h2>
		            <p>イベント情報</p>
	            </div>
	    	</div>
	    	<div class="eventDetail_Right">
			<?php
	    	    $event = array(
					array(
						'sdate' => get_field('start_date_f'),
						'edate' => get_field('end_date_f'),
						'title' => get_field('title_f'),
						'description' => get_field('description_f')
					),
					array(
						'sdate' => get_field('start_date_s'),
						'edate' => get_field('end_date_s'),
						'title' => get_field('title_s'),
						'description' => get_field('description_s')
				    ),
					array( 
						'sdate' => get_field('start_date_t'),
						'edate' => get_field('end_date_t'),
						'title' => get_field('title_t'),
						'description' => get_field('description_t'))
			 	);
			 
				foreach($event as $k => $v) {
                    $startDate[$k] = $v['sdate'];  
                } 
                array_multisort($startDate, SORT_DESC, $event);

				
               
               	?>
               	<?php for($k=0;$k< count($event);$k++):?>
               		<?php $events =$event[$k]['sdate']; if($events !='') {?>
					<div class="event_right">
						<div class="shopDate">
							<p><?php echo $event[$k]['sdate']; ?></p>
							<p> ~ </p>
							<p><?php echo $event[$k]['edate']; ?></p>
						</div>
						<div class="shopDes">
							<h5><?php echo $event[$k]['title']; ?></h5>
                            <p><?php echo $event[$k]['description']; ?></p>
						</div>
					</div>
					<?php }?>
               	<?php endfor; ?>
               	
              
					
	    	</div>
	    </div>
        <?php endif;?>
        <!-- endeventDetailBlock -->

        <!-- freespace -->
        <?php $thecontent = get_the_content();  if (!empty($thecontent)):  ?>
		<div class="wp_postSpace">
			<div class="postContent">
				<p><?php the_content(); ?></p>

			</div>
		</div>
	    <?php endif; ?>
        <!-- endfreespace -->
        <!-- reserveDetailBlock -->
	    <?php if(in_array('phone', get_field('fu_phone') ) && in_array('web', get_field('fu_phone')) ) : ?>
	    <div class="reserveDetailBlock">
	    	<div class="detail_Left">
		            <h2><img src="<?php echo get_template_directory_uri() ?>/images/pc/detail/img_reserve.png" alt=""></h2>
		            <p>来店予約</p>
	        </div>
	        <div class="detail_Right">
	    		<div class="btnReserve">
	    			<div class="btn_detail01 pc">
	    				<!-- <a href="tel:<?php //echo get_field('shop_telephone'); ?>"> -->
	    				<a href="tel:075-600-7018">
	    					<img src="<?php echo get_template_directory_uri() ?>/images/pc/detail/img_phone.png" alt="">
	    				</a>
	    			</div>
	    			<div class="btn_detail02">
	    			<!-- retrive post to reserve form -->
	    				<form action="<?php echo get_home_url('/'); ?>/reserve" method="post">

							<input type="hidden" name="title" id="title" value="<?php the_title();?>">
							<input type="hidden" name="postid" id="postid" value="<?php the_ID(); ?>">

	    					<button type="submit" name="send" id="sub" value="submit" class="reservebtn">
	    						<img src="<?php echo get_template_directory_uri() ?>/images/pc/detail/img_web.png" alt="">
	    					</button> 
	    					


	    				</form>
	    			</div>
	    		</div>
	    	</div>
	    </div>
	    <?php elseif(in_array('phone', get_field('fu_phone') ) ) : ?>
    	<div class="reserveDetailBlock">
	    	<div class="detail_Left">
		            <h2><img src="<?php echo get_template_directory_uri() ?>/images/pc/detail/img_reserve.png" alt=""></h2>
		            <p>イベント情報</p>
	        </div>
	        <div class="detail_Right">
	    		<div class="btnReserve">
	    			<a href="tel:<?php echo get_field('shop_telephone'); ?>">
	    				<img src="<?php echo get_template_directory_uri() ?>/images/pc/detail/img_phone.png" alt="">
	    			</a>
	    		</div>
	    	</div>
        </div>
	    <?php elseif(in_array('web', get_field('fu_phone') ) ) : ?>
    	<div class="reserveDetailBlock">
	    	<div class="detail_Left">
		            <h2><img src="<?php echo get_template_directory_uri() ?>/images/pc/detail/img_reserve.png" alt=""></h2>
		            <p>イベント情報</p>
	        </div>
	        <div class="detail_Right">
	    		<div class="btnReserve">
	    			<div class="btn_detail02">
	    				<a href="#"><img src="<?php echo get_template_directory_uri() ?>/images/pc/detail/img_web.png" alt=""></a>
	    			</div>
	    		</div>
	    	</div>
        </div>
	    <?php else : ?>
        <?php endif; ?>
		<!-- endreserveDetailBlock -->
        <!-- catalogDetailBlock -->
        <?php if(in_array('catelog', get_field('catelog_area') ) ) : ?>
	    <div class="catalogDetailBlock">
	    	<div class="detail_Left">
		            <h2><img src="<?php echo get_template_directory_uri() ?>/images/pc/detail/img_catalog.png" alt=""></h2>
		            <p>カタログ請求</p>
	        </div>
	        <div class="detail_Right">
	            <div class="catalogText">
		    		<h3><?php echo do_shortcode( '[post-title]' );?> のカタログを送ってもらう。</h3>
		    		<p>このお店のカタログは以下の都道府県に住んでいる、または以下の都道府県で成人式を行う方にお送りします。</p>
	    		</div>
	    		<div class="selectBox">
	    		   <?php 
                        
                       $queried_object = get_queried_object(); 
                       $related = get_field('multi_area', $queried_object);
                       if ($related) {
						  foreach ($related as $term) {?>
						    <div class="multi">
						    	<?php echo $term->name ?>
						    </div>

	    		    <?php  } } ?>   
	    		</div>
	    		<!-- catalog image -->
				<?php if( get_field('catalog_image') != ''):?>
                    
		    		<div class="catalogImg">
		    			<?php 
						 
						 $maxnum =8;
						?>  
						<?php
						    $images = acf_photo_gallery('catalog_image', $post->ID);
						    $count=0;
						    if($images):
						        foreach($images as $image):
						        	$count ++;
					                if ($count > $maxnum) {
					                    break;
					                }

						            $id = $image['id']; 
						            $title = $image['title']; 
						            $caption= $image['caption']; 
						            $full_image_url= $image['full_image_url']; 
						            $full_image_url = acf_photo_gallery_resize_image($full_image_url); 
						            $thumbnail_image_url= $image['thumbnail_image_url']; 
						            $url= $image['url']; 
						            $target= $image['target'];
						            $alt = get_field('photo_gallery_alt', $id); 
						            $class = get_field('photo_gallery_class', $id); 


						?>
						
					    
				        <?php if( !empty($url)){ ?>
				            <a href="<?php echo get_field('link_url') ?>" <?php echo ($target == 'true' )? 'target="_blank"': ''; ?>><?php } ?>
	                            <div class="cat_img">
	                                <a href="<?php echo $image['full_image_url']; ?>" class="highslide" onclick="return hs.expand(this)">
	                                	<img src="<?php echo $image['full_image_url']; ?>"/>
	                                </a>
	                            </div>
                    	<?php if( !empty($url) ){ ?>
                        	</a><?php } ?>

						<?php endforeach; endif; ?>
		    		</div>
		    	<?php endif;?>
		    	<!-- end catalog -->
	    		<div class="btn_catalog">
	    			<div class="btn_detail03">
	    				<form action="<?php echo get_home_url('/'); ?>/catalog" method="post">
                             <?php $image=get_field('catalog_image');?>

							<input type="hidden" name="postid" id="postid" value="<?php the_ID(); ?>" />
							<input type="hidden" name="catImg" id="catImg" value="<?php echo $image;?>">

	    					<button type="submit" name="catalog" id="sub" value="submit" class="reservebtn">
	    						<img src="<?php echo get_template_directory_uri() ?>/images/pc/detail/img_catalog_02.png" alt="">
	    					</button> 
		    					
		    			</form>
	    			</div>
	    		</div>
	    	</div>
	    </div>

        <?php endif; ?>
        <!-- endcatalogDetailBlock -->

      	<!-- gallaryDetailBlock -->
        <?php if(get_field('photo_gallery') != ''):?>
	   	<div class="gallaryDetailBlock">
            

	    	<h2 id="shopList">GALLERY</h2>
	    	<div class="gallyImg">
				
				<?php 
				 
				 if($role=='paymentshop'){
			        $maxcimg=100;
			      
			      }elseif($role=='freeshop'){
			      	
		         	$maxcimg=50;
			      }else{
			      	
			      	$maxcimg=50;
			      }
				?>  
	    	
    			<?php

				    $images = acf_photo_gallery('photo_gallery', $post->ID);
				    $image = wp_get_attachment_image_src(get_field('link_url'));
				    $count = 0; 
				    if( $images ):
				        foreach($images as $image):
					    	$count++; 
			                if ($count > $maxcimg) {
			                    break;
			                }

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

			        <?php if( !empty($url)){ ?>

						
			            <a href="<?php echo get_field('link_url') ?>" <?php echo ($target == 'true' )? 'target="_blank"': ''; ?>><?php } ?>
                            <div class="galBox">

                                <a href="<?php echo $image['full_image_url']; ?>" class="highslide" onclick="return hs.expand(this)">
                                	<img src="<?php echo $image['full_image_url']; ?>"/>
                                </a>

                            </div>

                    <?php if( !empty($url) ){ ?>
                         
                        </a><?php } ?>

				<?php endforeach; endif; ?>
				
	    	</div>
	    	
	    	<div class="galBtn">
				<a href="javascript:void(0);"></a>
			</div>      
		</div> 
		<?php endif;?>
        <!-- endgallaryDetailBlock-->

        <!-- outlineDetailBlock -->
		<div class="outlineDetailBlock">
			<h2 id="shopList">店舗概要</h2>
			<div class="outlineDetail">
				<div class="outlineLeft">
					<table class="tableDetail">
						<tr>
							<th>ショップ名</th>
							<td><?php the_title(); ?></td>
						</tr>
						<tr>
							<th>ふりがな</th>
							<td><?php echo get_field('shop_furigana'); ?></td>
						</tr>
						<tr>
						    <?php $location = get_field('shop_address'); ?>
							<th>住所</th>
							<td><?php echo $location['address']; ?></td>
						</tr>
						<tr>
							<th>電話番号</th>
							<td><?php echo get_field('shop_telephone'); ?></td>
						</tr>
						<tr>
							<th>交通アクセス</th>
							<td><?php echo get_field('shop_access'); ?></td>
						</tr>
						<tr>
							<th>営業時間</th>
							<td>
								<?php echo get_field('start_time'); ?> 

								<?php $endtime= get_field('end_time');?> 

									<?php if($endtime){ echo "~"; } ?>

								<?php echo $endtime; ?>
									
							</td>
						</tr>
						<tr>
							<th>駐車場</th>
							<td><?php echo get_field('shop_parking'); ?></td>
						</tr>
						<tr>
							<th>取り扱い項目</th>
							<td>
                                    <?php $value = get_field('shop_detail'); ?>
									<?php if($value) :?>
	                                    <?php foreach($value as $values): ?>
									      <p><?php echo $values; ?></p>
									    <?php endforeach; ?>
									<?php endif; ?>

							   
							</td>
						</tr>
						
					</table>
				</div>
				<div class="outlineRight">
	                <iframe class="mapWidht" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.ca/maps?center=<?php echo $location['address']; ?>&q=<?php echo $location['address']; ?>&z=14&size=600x450&output=embed&iwloc=near">
	                	
	                </iframe>
	                <small class="maplink"><a href="https://maps.google.ca/maps?center=<?php echo $location['address']; ?>&q=<?php echo $location['address']; ?>">大きな地図で見る</a>
	                </small>
            	</div>
		    </div>
		</div>
		<!-- endoutlineDetailBlock -->

		<!--staffBlock  -->
		<?php if (get_field('shop_image') !='' || get_field('shop_title') != '' || get_field('shop_message') != '') :?>
		<div class="staffBlock">
			<div class="staffDetail_Left">
		            <h2><img src="<?php echo get_template_directory_uri() ?>/images/pc/detail/img_staff-title.png" alt=""></h2>
		            <p>スタッフ</p>
	        </div>
        	<div class="staffDetail_Right">
        	   <?php if(get_field('shop_image') !=''):?>
		           <div class="staffImg">
		           		<img src="<?php echo get_field('shop_image'); ?>" alt="">
		           </div>
	           <?php endif; ?>
	           <div class="detailStaff">
	           	  <h3><?php echo get_field('shop_title'); ?></h3>
	           	  <p><?php echo get_field('shop_message'); ?></p>
	           	  
	           </div>
    		
    		</div>
	    </div>
	   <?php endif; ?>
	<!-- endstaffBlock -->
	</div>
		
</div>


<?php endwhile; endif; ?>






