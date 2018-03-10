<?php 
/* 
	Template Name:	カスタムトップページ
*/ 
?>

<?php get_header(); ?>

	<!-- PC Swiper -->
	<div class="contentWidth1200">
		<div class="swiper-container swiperTopPage pc">
			<div class="swiper-wrapper">
			  	<div class="swiper-slide"><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/slide_01.png" alt="Slide 01"></a></div>
			  	<div class="swiper-slide"><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/slide_02.png" alt="Slide 01"></a></div>
			  	<div class="swiper-slide"><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/slide_03.png" alt="Slide 01"></a></div>
			  	<div class="swiper-slide"><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/slide_04.png" alt="Slide 01"></a></div>
			</div>

			<!-- Add Pagination -->
			<div class="swiper-pagination"></div>
			<!-- Add Arrows -->
			<div class="swiper-button-next"></div>
			<div class="swiper-button-prev"></div>
		</div> 
	</div>
	<!-- SP Swiper -->
  	<div class="swiper-container swiperTopPage01 sp">
	    <div class="swiper-wrapper"> 
			<div class="swiper-slide"><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/sp_slide_01.png" alt="Slide 01"></a></div>
			<div class="swiper-slide"><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/sp_slide_02.png" alt="Slide 01"></a></div>
			<div class="swiper-slide"><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/sp_slide_03.png" alt="Slide 01"></a></div>
			<div class="swiper-slide"><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/sp_slide_04.png" alt="Slide 01"></a></div>
	    </div>
    	<!-- Add Pagination -->
   	 	<div class="swiper-pagination"></div> 
  	</div> 

	<!-- main contents -->
	<main id="mainContent">

		<?php   
			// get_custom_top_page_fields( $field_name, $post_id )
			$bnrImg01 = get_custom_top_page_fields('banner_image_01', 40);  
			$bnrURL01 = get_custom_top_page_fields('banner_url_01', 40);  
			$bnrImg02 = get_custom_top_page_fields('banner_image_02', 40);  
			$bnrURL02 = get_custom_top_page_fields('banner_url_02', 40);
		?>
	    <!-- campaign -->
	    <?php if( !empty($bnrImg01) || !empty($bnrImg02) ) : ?>
	    <section class="campaignWrapper contentWidth">
	      	<a href="<?php echo $bnrURL01; ?>" class="campaign"><img src="<?php echo $bnrImg01['url']; ?>" alt="<?php echo $bnrImg01['alt']; ?>"></a>
	      	<a href="<?php echo $bnrURL02; ?>" class="campaign"><img src="<?php echo $bnrImg02['url']; ?>" alt="<?php echo $bnrImg02['alt']; ?>"></a>
	    </section> 
		<?php endif; ?><!-- /campaign -->
		

		<!-- news post query -->
		<?php   
			$newsQuery = new WP_Query( 
				array( 
					'category_name' => 'news',
					'post_status' => 'publish',
					'posts_per_page' => 3,
					'orderby' => 'date',
					'order' => 'DESC' 
				) 
			);
		?>
	    <!-- news and about row -->
	    <section id="newsAndAbout" class="contentWidth1200">
			<article class="newsWrapper backgroundImage">
				<h3><span>NEWS</span></h3>
				<h5><span>お知らせ</span></h5> 
				<?php if( $newsQuery->have_posts() ) : ?>
				<ul class="list01">
					<?php while ( $newsQuery->have_posts() ) :  $newsQuery->the_post(); ?>
					<li><a href="<?php the_permalink(); ?>"><span class="date"><?php echo get_the_date( 'Y.m.d' ); ?></span><span class="info"><?php the_title(); ?></span></a></li> 
					<?php endwhile; ?>
				</ul> 
				<?php endif; ?>
				<a href="news/" class="btnMore">MORE</a>
			</article>
			<article class="aboutWrapper backgroundImage">
				<h3><span>WHAT’S PADEL?</span></h3>
				<h5><span>パデルとは？</span></h5>
				<ul class="aboutLink">
					<li><a href="#">パデルとは？</a></li>
					<li><a href="#">パデルの魅力</a></li>
					<li><a href="#">未経験者でも出来るの？</a></li>
				</ul>
				<a href="about/" class="btnMore">MORE</a>
			</article>
	    </section><!-- /news and about row -->
		

		<!-- custom place link -->
		<?php   
			// get_custom_top_page_fields( $field_name, $post_id )
			$placeLinkTitle01 = get_custom_top_page_fields('place_link_title_01', 40);  
			$placeLinkURL01 = get_custom_top_page_fields('place_link_url_01', 40);  
			$placeLinkTitle02 = get_custom_top_page_fields('place_link_title_02', 40);  
			$placeLinkURL02 = get_custom_top_page_fields('place_link_url_02', 40); 
			$placeLinkTitle03 = get_custom_top_page_fields('place_link_title_03', 40);  
			$placeLinkURL03 = get_custom_top_page_fields('place_link_url_03', 40); 
		?>
	    <!-- place -->
	    <section id="placeWrapper" class="backgroundImage contentWidth1200">
			<h3><span>PLACE</span></h3>
			<h5><span>施設情報</span></h5>
			<ul class="list01">
				<li><a href="<?php echo $placeLinkURL01; ?>"><span class="date"><?php echo get_the_date( 'Y.m.d', 40 ); ?></span><span class="info"><?php echo $placeLinkTitle01; ?></span></a></li>
				<li><a href="<?php echo $placeLinkURL02; ?>"><span class="date"><?php echo get_the_date( 'Y.m.d', 40 ); ?></span><span class="info"><?php echo $placeLinkTitle02; ?></span></a></li>
				<li><a href="<?php echo $placeLinkURL03; ?>"><span class="date"><?php echo get_the_date( 'Y.m.d', 40 ); ?></span><span class="info"><?php echo $placeLinkTitle01; ?></span></a></li>
			</ul> 
			<a href="place/" class="btnMore">MORE</a>
	    </section><!-- /place -->

	    <!-- admission and event -->
	    <section class="contentWidth1200">
			<a href="admission/" class="admission backgroundImage">
				<h3><span>ADMISSION</span></h3>
				<h5><span>入会案内</span></h5> 
				<div class="btnMore">MORE</div>
			</a>
			<a href="event/" class="event backgroundImage">
				<h3><span>EVENT</span></h3>
				<h5><span>イベント</span></h5>   
				<div class="btnMore">MORE</div>
			</a>
	    </section><!-- /admission and event -->
	    
	    <!-- gallery -->
	    <!-- <section id="galleryCollection" class="contentWidth1200">
			<div class="contentWidth"> 
				<div class="gallery">
					<a href='https://instagram.com/worldpadeltour_oficial'>
						<img class='labnol' src='https://instagram.fsea1-1.fna.fbcdn.net/t51.2885-15/e35/25008695_337878249954357_1864359532696698880_n.jpg' width='300px' height='200px' />
					</a>
				</div>
				<div class="gallery">
					<a href='https://instagram.com/worldpadeltour_oficial'>
						<img class='labnol' src='https://instagram.fsea1-1.fna.fbcdn.net/t51.2885-15/e35/24175614_151507202146928_220576652600541184_n.jpg' width='1080' height='616' />
					</a>
				</div>
				<div class="gallery">
					<a href='https://instagram.com/worldpadeltour_oficial'>
						<img class='labnol' src='https://instagram.fsea1-1.fna.fbcdn.net/t51.2885-15/e35/25013639_1554804847947130_1528600803634315264_n.jpg' width='1080' height='616' />
					</a>
				</div>
				<div class="gallery">
					<a href='https://instagram.com/worldpadeltour_oficial'>
						<img class='labnol' src='https://instagram.fsea1-1.fna.fbcdn.net/t51.2885-15/e35/24127160_307519596409492_7349753615524823040_n.jpg' width='1080' height='616' />
					</a>
				</div> 
				<div class="gallery">
					<a href='https://instagram.com/worldpadeltour_oficial'>
						<img class='labnol' src='https://instagram.fsea1-1.fna.fbcdn.net/t51.2885-15/e35/24838549_138015583640381_6929597434771275776_n.jpg' width='1080' height='616' />
					</a>
				</div>
				<div class="gallery">
					<a href='https://instagram.com/worldpadeltour_oficial'>
						<img class='labnol' src='https://instagram.fsea1-1.fna.fbcdn.net/t51.2885-15/e35/24177806_2048610335425502_6207001584157589504_n.jpg' width='1080' height='616' />
					</a>
				</div>
				<div class="gallery">
					<a href='https://instagram.com/worldpadeltour_oficial'>
						<img class='labnol' src='https://instagram.fsea1-1.fna.fbcdn.net/t51.2885-15/e35/24327877_115508415831001_7410149024734380032_n.jpg' width='1080' height='616' />
					</a>
				</div>
				<div class="gallery">
					<a href='https://instagram.com/worldpadeltour_oficial'>
						<img class='labnol' src='https://instagram.fsea1-1.fna.fbcdn.net/t51.2885-15/e35/23823417_252421305287930_2721196012076007424_n.jpg' width='1080' height='607' />
					</a>
				</div> 
				<div class="gallery">
					<a href='https://instagram.com/worldpadeltour_oficial'>
						<img class='labnol' src='https://instagram.fsea1-1.fna.fbcdn.net/t51.2885-15/e35/24254266_652369991817163_5300191352108089344_n.jpg' width='1080' height='616' />
					</a>
				</div>
				<div class="gallery">
					<a href='https://instagram.com/worldpadeltour_oficial'>
						<img class='labnol' src='https://instagram.fsea1-1.fna.fbcdn.net/t51.2885-15/e35/23969751_505683183122730_5761685944545574912_n.jpg' width='1080' height='607' />
					</a>
				</div>
				<div class="gallery">
					<a href='https://instagram.com/worldpadeltour_oficial'>
						<img class='labnol' src='https://instagram.fsea1-1.fna.fbcdn.net/t51.2885-15/e35/23966926_1738845192821948_7297479860622983168_n.jpg' width='1080' height='607' />
					</a>
				</div>
				<div class="gallery">
					<a href='https://instagram.com/worldpadeltour_oficial'>
						<img class='labnol' src='https://instagram.fsea1-1.fna.fbcdn.net/t51.2885-15/e35/23970093_159566661455881_1835987837732782080_n.jpg' width='1080' height='607' />
					</a>
				</div>
			</div>
	    </section> --><!-- /gallery -->
		
		<!-- $bnrImg01 = get_custom_top_page_fields('banner_image_01', 40);   -->

		<!-- gallery Instagram -->
	    <section id="galleryCollection" class="contentWidth1200">
	    	<h3><span>INSTAGRAM GALLERY</span></h3>
			<h5><span>インスタグラムギャラリー</span></h5>
			<h6><span>「#パデル東京」のハッシュタグ付きでインスタ投稿された方を掲載させていただいてます。</span></h6>
			<div class="contentWidth"> 
				<?php for( $i=1; $i<13; $i++) :  ?>
					<?php 
						$box = 'box_' . $i;
						$instagram = get_custom_top_page_fields($box, 40); 
						if( $instagram ) : 
					?>
				<div class="gallery">
					<?php echo $instagram; ?>
				</div>
				<?php endif; endfor; ?>
			</div>
			<p>※掲載されたくない方はテキストテキスト</p>
	    </section><!-- /gallery -->
	    <!-- faq -->
	    <section id="faqWrapper">
	      	<a href="faq/" class="faqBtn">よくある質問</a>
	    </section><!-- /faq -->

	</main><!-- /main contents -->


<?php get_footer(); ?>