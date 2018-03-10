<?php  
/*
*	Template Name: テンプレートを配置
*	Template Post Type: page
*/
?>

<?php get_header(); ?>

<!-- main contents -->
<main id="mainContent">

	<!-- breadcrumbs start -->
    <div id="breadcrumbsWrapper">
      <div id="breadcrumbs" class="contentWidth">
		<?php if (function_exists('padel_custom_breadcrumbs')) padel_custom_breadcrumbs(); ?>
      </div>
    </div><!-- /breadcrumbs end -->
	
	<?php  
		$mainImgPC = get_field("main_image_pc");
		$mainImgSP = get_field("main_image_sp");
		$bottomMainImg = get_field("bottom_main_image");
	?>
    <!-- main image start -->
	<div class="mainH2 mainH2Bg">
	  	<img src="<?php echo $mainImgPC['url']; ?>" alt="<?php echo $mainImgPC['alt']; ?>" class="pc"> 
	  	<img src="<?php echo $mainImgSP['url']; ?>" alt="<?php echo $mainImgSP['alt']; ?>" class="sp"> 
	</div><!-- /main image end -->
	
	<article class="padelTokyoDes contentWidth">
		<p><?php echo $bottomMainImg; ?></p>
	</article>
	
	<!-- link scroll -->
	<section class="padelTokyoLinkScroll linkScroll contentWidth">
	  	<div class="links">
	    	<a href="#link01">施設情報<i class="fa fa-angle-down" aria-hidden="true"></i></a>
	    	<a href="#link02">スタッフ紹介<i class="fa fa-angle-down" aria-hidden="true"></i></a>
	  	</div>
	  	<div class="links">
	    	<a href="#link03">レンタルコート予約<i class="fa fa-angle-down" aria-hidden="true"></i></a>
	    	<a href="#link04">イベントスケジュール<i class="fa fa-angle-down" aria-hidden="true"></i></a>
	  	</div>
	  	<div class="links">
	    	<a href="#link05">レッスンスクール<span>スケジュール</span><i class="fa fa-angle-down" aria-hidden="true"></i></a> 
	  	</div>
	</section><!-- /link scroll -->

	<!-- news -->
	<section id="news">
	  	<h3><span>NEWS</span><span class="pc">施設全体のお知らせ</span></h3>
	  	<?php  
	  		$newsPosts = new WP_Query( 
	  			array( 
	  				'post_type' => "post",
					'category_name' => $post->post_name . "_news",
					'post_status' => 'publish',
					'posts_per_page' => 3,
					'orderby' => 'date',
					'order' => 'DESC' 
				) 
	  		);  

	  		if( $newsPosts->have_posts() ) :
	  	?>
	  	<ul class="list01 contentWidth">
	  		<?php while( $newsPosts->have_posts() ) : $newsPosts->the_post(); ?>
	        <li><a href="<?php the_permalink(); ?>"><span class="date"><?php echo get_the_date( 'Y.m.d' ); ?></span><span class="info"><?php the_title(); ?></span></a></li> 
	    	<?php endwhile; wp_reset_query(); ?>
	  	</ul>  
	  	<?php endif; ?>
	</section><!-- /news -->
	
	<!-- twitter and facebook -->
	<section id="twitterAndFacebook">
		<article>
			<div class="twitter">
				<h3><span>スクール・イベント<br>雨天中止情報</span></h3> 
				<?php 	 
					$twitterUrl = get_field("twitter_account_url"); 
					$twitterName = get_field("twitter_account"); 
					if( !empty($twitterUrl) ) :
				?>
				<a  class="twitter-timeline" 
					href="<?php echo $twitterUrl; ?>" 
					data-width="420" 
					data-height="500"
					data-chrome="nofooter" >
					<?php echo $twitterName; ?>		
				</a> 
				<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
				<?php else: ?>
					<img src="<?php echo get_template_directory_uri(); ?>/img/place/twitter_img01.png" alt="Default Twitter">
				<?php endif; ?>
			</div> 
		</article>
		<article>
			<div class="facebook">
				<h3><span>パデル東京facebook</span></h3>
				<?php 
					$fbPage = get_field("faccebook_account_url"); 

					if( !empty($fbPage) ) : 
				?> 
					<div class="fbWrapper"> 
					  <div class="fb-page" data-href="<?php echo $fbPage; ?>" data-width="420" data-height="500" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"></div>
					</div>
					<!-- <iframe src="https://www.facebook.com/plugins/page.php?href=<?php echo $fbPage; ?>&tabs=timeline&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" scrolling="no" frameborder="0" allowTransparency="true" id="fb_frame" data-width="420"></iframe> -->
				<?php else: ?>
					<img src="<?php echo get_template_directory_uri(); ?>/img/place/facebook_img01.png" alt="Default Facebook">
				<?php endif; ?>
			</div>  
		</article>
		
	</section><!-- /twitter and facebook -->

	<section id="cv01">
		<a href="#" class="btnNav">レッスン/振替予約</a>
	</section>

	<!-- link01 start -->
	<section id="link01" class="information padelTokyoSection contentWidth">
	  	<h3><span>INFORMATION</span><span>施設情報</span></h3>
		
		<?php $images = acf_photo_gallery('image_gallery', $post->ID); ?>
		<!-- Swiper -->
		<?php if( $images ) : ?>
		<article class="swiper-container swiperImages">
			<div class="swiper-wrapper">
				<?php foreach( $images as $image ): ?> 
			        <?php  
			        	$id = $image['id']; 
						$title = $image['title']; 
						$caption= $image['caption']; 
						$full_image_url= $image['full_image_url']; 
						// $full_image_url = acf_photo_gallery_resize_image($full_image_url); 
						$thumbnail_image_url= $image['thumbnail_image_url']; 
						$target= $image['target']; 	                
					?> 
					<div class="swiper-slide"><img src="<?php echo $full_image_url; ?>" alt="<?php echo $title; ?>"></div> 	            
				<?php endforeach; ?> 			
			</div> 
			<!-- Add Arrows -->
			<div class="swiper-button-next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
			<div class="swiper-button-prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
			</article><!-- /Swiper -->
		<?php endif; ?>

		<!-- locations --> 
		<article class="infoDescription">
			<?php 	
				$shopMap = get_field('place_address');
				$addInfo = get_field('adress_info'); 
				$hours = get_field('business_hours'); 
				$phone = get_field('phone_number'); 
				if( !empty($shopMap) ):
			?> 
			<div class="infoLocation">
				<div class="locationDesc">
					<h6 class="greenTitleBG">住所</h6>
					<!-- <p>〒177-0053</p>
					<p>東京都練馬区関町南1丁目4-48 善福寺公園テニスクラブ内</p> -->
					<p class="shopMap"><?php echo $addInfo; ?></p>
					
					<h6 class="greenTitleBG">営業時間</h6>
					<p><?php echo $hours; ?></p>
					<h6 class="greenTitleBG">電話番号</h6>
					<p><?php echo $phone; ?></p>
				</div>
				
				<div class="locationMaps googleMaps">
					<div class="marker" data-lat="<?php echo $shopMap['lat']; ?>" data-lng="<?php echo $shopMap['lng']; ?>"></div> 
				</div>
			</div>
			<?php endif; ?>

			<div class="infoAccess">
				<h6 class="greenTitleBG">アクセス</h6>
				<p class="squareBg">■交通機関をご利用の方</p>
				<p class="bgImg">. 西武新宿線上石神井駅より徒歩10分</p>
				<p class="bgImg">. JR荻窪駅→善福寺バス停下車（バス約15分）</p>
				<p>※ 「善福寺公園バス停」とお間違えの無いようご注意ください。</p>
				<p class="squareBg">■お車をご利用の方</p>
				<p class="bgImg">. 新宿方面より<br><span class="dotInput">青梅街道を田無方面に向かい上井草4丁目歩道橋の信号を右折し、最初の細い道を左折してください。</span></p>
				<p class="bgImg">. 田無方面より<br><span class="dotInput">青梅街道を新宿方面に向かいレストランレッドロブスターの駐車場をお入りください。</span></p>
				<p>※パデルコート利用の方は善福寺公園テニスクラブ内の駐車場はご利用頂けません。<br>お近くのコインパーキングをご利用ください。</p>
			</div>
			<div class="infoFacility">
				<h6 class="greenTitleBG">施設</h6>
				<p>ロッカー:有/シャワー:有/駐車場：無/ショップ:有/自動販売機:無/テキストテキスト/テキストテキスト/テキストテキスト/テキストテキスト/テキストテキスト/テキストテキスト</p>
			</div>
			<div class="infoOthers">
				<h6 class="greenTitleBG">その他</h6>
				<p>レンタルウェア:有(有料)/テキストテキスト</p>
				<?php  
					$goodsImg = get_field("goods_image");
					$goodsTitle = get_field("goods_title");
					$goodsDesc = get_field("goods_desc");
				?>
				<!-- <img src="<?php echo get_template_directory_uri(); ?>/img/place/info_img01.png" alt="Image 01"> -->
				<img src="<?php echo $goodsImg['url']; ?>" alt="Image 01">
				<h6 class="greenTitleColor"><?php echo $goodsTitle; ?></h6>
				<p><?php echo $goodsDesc; ?></p>
			</div>
		</article><!-- /locations -->

		<!-- information tabs --> 
		<article id="infoTabs">
			<div class="tabs">
				<div class="tabLinksWrapper">
			    	<ul class="tabLinks">
			      		<li class="active"><a href="#tab01">スクール料金</a></li>
			      		<li><a href="#tab02">レンタルコート料金</a></li>
			    	</ul>
			    	<ul class="tabLinks">
			      		<li><a href="#tab03">レンタル用品料金</a></li>
			      		<li><a href="#tab04">体験レッスン料金</a></li>
			    	</ul> 
			  	</div> 
			  	<div class="tabContent"> 
			    	<div id="tab01" class="tab active">
			      		<h4><span>スクール料金</span></h4>
		    			<?php 
		    				$schoolFee = get_field("school_fee");
		    				echo $schoolFee; 
		    			?>
		    			<div class="attention">
		    				<p>
		    					※ 別途1時間のレンタルコート代がかかります。
		    					<span>例）平日レンタルコート代  5,000円  ＋  レッスン代  4,000円  ＝  9,000円<br>本サービスはパデルが初めての方向けの体験サービスのため、技術向上を目的とした<br>プライベートレッスンとしてはご利用いただけません。</span>
		    				</p>
		    				<p>※ パデルスクールにご入会いただくとレンタルコート割引（10% OFF）やその他割引制度がございます。</p> 
		    			</div>
			    	</div>

			    	<div id="tab02" class="tab"> 
			      		<h4><span>レンタルコート料金</span></h4>
		    			<?php 
		    				$rentalCoatFee = get_field("rental_coat_fee");
		    				echo $rentalCoatFee; 
		    			?>
		    			<div class="attention">
		    				<p>※ 下記、夜間利用時には別途200円（税込） / 時のナイター利用料金がかかります。</p>
		    				<p>※ 料金は1面1時間制です。何名でご利用いただいても構いません。</p>
		    				<p>※ ご利用は予約制ですが、当日でも空きがあればご利用いただけます。</p>
		    				<p>※ イベントやレッスンでご利用いただけない時間帯もございます。 あらかじめスケジュールにてご確認下さい。</p>
		    				<p>⇒学割：学生の方は、学生証提示で平日のレンタルコート料金が25%OFFの¥3,000</p>
		    				<p>⇒スクール割：スクール生は土日平日のレンタルコート料金が10％OFF</p> 
		    			</div>
			    	</div>

			    	<div id="tab03" class="tab">
			      		<h4><span>レンタル用品料金</span></h4>
			      		<?php 
			      			$rentalEquipmentFee = get_field("rental_equipment_fee"); 
			      			echo $rentalEquipmentFee;
			      		?>
		    			<div class="attention">
		    				<p>※ パデルエバンジェリストの方、及びお連れ様はラケット無料でご利用いただけます。シューズは別途有料です。</p>
		    				<p>※:パデル経験者、テニス上級者の方は本格的なパデルをお楽しみいただけるよう、ニューボールでのプレーをオススメいたします。フロントでお買い求めください。（3球入り800円程度）</p> 
		    			</div>
			    	</div>
			     
			    	<div id="tab04" class="tab">
			      		<h4><span>体験レッスン料金</span></h4>
			      		<?php 
			      			$trialLessonFee = get_field("trial_lesson_fee"); 
			      			echo $trialLessonFee;
			      		?>
		    			<div class="attention">
		    				<p>体験レッスンはお一人様2回までとさせていただきます。</p>
		    				<p>レンタルラケット代が無料となります。</p> 			   	
		    			</div>
			    	</div> 
			  </div>
			</div>
		</article><!-- /information tabs -->

		<?php 
			$bnr = get_field('place_banner'); 
			if( $bnr ) : 
				$bnrLink = get_field('link_banner');
				$linkBnr = !empty($bnrLink) ? $bnrLink : '#';
		?>
			<a href="<?php echo $linkBnr; ?>" class="bnrLink"><img src="<?php echo $bnr['url']; ?>" alt="<?php echo $bnr['alt']; ?>"></a>
		<?php endif; ?>

		<?php 
			$schoolSchedule = get_field('school_schedule'); 
			if( !empty($schoolSchedule) ) :
		?>
			<article class="schoolSchedule">
				<?php echo $schoolSchedule; ?>
			</article>
		<?php endif; ?>
						
	</section><!-- /link01 start -->
	
	<!-- link02 start -->
	<section id="link02" class="staff padelTokyoSection contentWidth">
	  	<h3><span>STAFF</span><span>スタッフ紹介</span></h3>
	  	<?php   
		    $currentPageSlug = $post->post_name; 
		    $currentPageSlug = explode("_", $currentPageSlug);
		    $staffCat = "staff_" . $currentPageSlug[1]; 

	  		$staffs = new WP_Query(
	  			array(
	  				"post_type"			=>	"post",
	  				"posts_per_page"	=>	-1,
	  				"category_name"		=>	$staffCat
	  			)
	  		); 
	  	?>
	  	<?php if( $staffs->have_posts() ) : ?>
	  	<div class="staffContainer">
	  		<?php 
	  			while( $staffs->have_posts() ) : $staffs->the_post(); 

	  			$staffImg = get_field("staff_image");
	  			$staffName = get_field("staff_name");
	  			$staffStyle = get_field("staff_play_style");
	  			$staffRacket = get_field("staff_racket");
	  			$staffWord = get_field("staff_word");
	  		?>
	  		<article>
	  			<figure>
					<img src="<?php echo $staffImg['url']; ?>" alt="仮">
				  	<figcaption><?php echo $staffName; ?></figcaption>
				</figure>
				<div class="staffInfo">
					<h6 class="greenTitleColor">プレースタイル</h6>
					<p><?php echo $staffStyle; ?></p>
					<h6 class="greenTitleColor">ラケット</h6>
					<p><?php echo $staffRacket; ?></p>
					<h6 class="greenTitleColor">一言</h6>
					<p><?php echo $staffWord; ?></p>
				</div>
	  		</article>	 
	  		<?php endwhile; wp_reset_query();  ?> 	
	  	</div>
	  	<?php endif; ?>
	</section><!-- /link02 start -->

	<!-- link03 start -->
    <section id="link05" class="lessonSchedule schedule padelTokyoSection">
      	<h3 class="scheduleTitle"><span>LESSON SCHEDULE</span><span>レッスンスクールスケジュール</span></h3>
      	<article class="scheduleIframe contentWidth">
      		<div class="iframeContainer">
				<!-- <?php the_field('lesson_schedule_url'); ?> -->
				<img src="<?php echo get_template_directory_uri(); ?>/img/place/schedule_img01.png" alt="iframe">
			</div>
      		<div class="rsvBtn">
	        	<a href="#" class="btnMore">レッスン・振替予約</a>
	        </div>
      	</article>
    </section><!-- /link03 start -->

    <!-- link04 start -->
    <section id="link04" class="eventSchedule schedule padelTokyoSection">
      	<h3 class="scheduleTitle"><span>EVENT SCHEDULE</span><span>イベントスケジュール</span></h3>
      	<article class="scheduleIframe contentWidth">
      		<div class="iframeContainer">
				<!-- <?php the_field('event_schedule_url'); ?> -->
				<img src="<?php echo get_template_directory_uri(); ?>/img/place/schedule_img01.png" alt="iframe">
			</div>
      		<div class="rsvBtn">
	        	<a href="#" class="btnMore">予約する</a>
	        </div>
      	</article>
    </section><!-- /link04 start -->

    <!-- link05 start -->
    <section id="link03" class="rentalSchedule schedule padelTokyoSection">
      	<h3 class="scheduleTitle"><span>RENTAL SCHEDULE</span><span>レンタルコート空き情報</span></h3>
      	<article class="scheduleIframe contentWidth">
      		<div class="iframeContainer">
      			<iframe width="100%" height="450" src="<?php echo the_field('rental_schedule_url'); ?>" frameborder="0"></iframe>
			</div>
      		<div class="rsvBtn">
	        	<a href="#" class="btnMore">料金詳細</a>
	        	<a href="#" class="btnMore">予約する</a>
	        </div>
      	</article>
    </section><!-- /link05 start --> 

    <!-- cv start -->
	<section class="cv">
		<div class="cvButtons contentWidth">
			<a href="#" class="btnNav">レッスン予約</a>
			<a href="#" class="btnNav">体験レッスン予約</a>
		</div>
	</section><!-- /cv end -->


	
</main><!-- /main contents -->

<?php get_footer(); ?>