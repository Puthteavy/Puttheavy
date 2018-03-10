<section id="eventSection">
	<h3>
		<span>ABOUT</span>
		<span>イベントについて</span>
	</h3>
	<article class="eventContent contentWidth">
		<p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
	</article>
</section>
<!-- <section id="galleryCollection" class="contentWidth1200">
	<div class="contentWidth"> 
		<div class="gallery">
			<a href='https://instagram.com/worldpadeltour_oficial' target="_blank">
				<img class='labnol' src='https://instagram.fsea1-1.fna.fbcdn.net/t51.2885-15/e35/25008695_337878249954357_1864359532696698880_n.jpg'/>
			</a>
		</div>
		<div class="gallery">
			<a href='https://instagram.com/worldpadeltour_oficial' target="_blank">
				<img class='labnol' src='https://instagram.fsea1-1.fna.fbcdn.net/t51.2885-15/e35/24175614_151507202146928_220576652600541184_n.jpg' />
			</a>
		</div>
		<div class="gallery">
			<a href='https://instagram.com/worldpadeltour_oficial' target="_blank">
				<img class='labnol' src='https://instagram.fsea1-1.fna.fbcdn.net/t51.2885-15/e35/25013639_1554804847947130_1528600803634315264_n.jpg'/>
			</a>
		</div>
		<div class="gallery">
			<a href='https://instagram.com/worldpadeltour_oficial' target="_blank">
				<img class='labnol' src='https://instagram.fsea1-1.fna.fbcdn.net/t51.2885-15/e35/24127160_307519596409492_7349753615524823040_n.jpg'/>
			</a>
		</div> 
		<div class="gallery">
			<a href='https://instagram.com/worldpadeltour_oficial' target="_blank">
				<img class='labnol' src='https://instagram.fsea1-1.fna.fbcdn.net/t51.2885-15/e35/24838549_138015583640381_6929597434771275776_n.jpg'/>
			</a>
		</div>
		<div class="gallery">
			<a href='https://instagram.com/worldpadeltour_oficial' target="_blank">
				<img class='labnol' src='https://instagram.fsea1-1.fna.fbcdn.net/t51.2885-15/e35/24177806_2048610335425502_6207001584157589504_n.jpg'/>
			</a>
		</div>
		<div class="gallery">
			<a href='https://instagram.com/worldpadeltour_oficial' target="_blank">
				<img class='labnol' src='https://instagram.fsea1-1.fna.fbcdn.net/t51.2885-15/e35/24327877_115508415831001_7410149024734380032_n.jpg'/>
			</a>
		</div>
		<div class="gallery">
			<a href='https://instagram.com/worldpadeltour_oficial' target="_blank">
				<img class='labnol' src='https://instagram.fsea1-1.fna.fbcdn.net/t51.2885-15/e35/23823417_252421305287930_2721196012076007424_n.jpg'/>
			</a>
		</div> 
		<div class="gallery">
			<a href='https://instagram.com/worldpadeltour_oficial' target="_blank">
				<img class='labnol' src='https://instagram.fsea1-1.fna.fbcdn.net/t51.2885-15/e35/24254266_652369991817163_5300191352108089344_n.jpg'/>
			</a>
		</div>
		<div class="gallery">
			<a href='https://instagram.com/worldpadeltour_oficial' target="_blank">
				<img class='labnol' src='https://instagram.fsea1-1.fna.fbcdn.net/t51.2885-15/e35/23969751_505683183122730_5761685944545574912_n.jpg'/>
			</a>
		</div>
		<div class="gallery">
			<a href='https://instagram.com/worldpadeltour_oficial' target="_blank">
				<img class='labnol' src='https://instagram.fsea1-1.fna.fbcdn.net/t51.2885-15/e35/23966926_1738845192821948_7297479860622983168_n.jpg'/>
			</a>
		</div>
		<div class="gallery">
			<a href='https://instagram.com/worldpadeltour_oficial' target="_blank">
				<img class='labnol' src='https://instagram.fsea1-1.fna.fbcdn.net/t51.2885-15/e35/23970093_159566661455881_1835987837732782080_n.jpg'/>
			</a>
		</div>
		
	</div>
</section> --><!-- /gallery -->

<!-- gallery -->
<section id="galleryCollection" class="contentWidth1200">
	<div class="contentWidth"> 
		<?php for( $i=1; $i<13; $i++) :  ?>
			<?php 
				$box = 'box_' . $i;
				$instagram = get_custom_top_page_fields($box, 10); 
				if( $instagram ) : 
			?>
		<div class="gallery">
			<?php echo $instagram; ?>
		</div>
		<?php endif; endfor; ?>
	</div>
</section><!-- /gallery -->



<section id="schedule">
  <h3 class="scheduleTitle">
    <span>EVENT SCHEDULE</span>
    <span>体験レッスンスクールスケジュール</span>
  </h3>
  <div class="scheduleIframe contentWidth">
    <iframe src="http://airrsv.net/padeltokyo/calendar/embed/" width="100%" height="450" frameborder="0"></iframe>
    <div class="rsvBtn">
    	<a href="#" class="btnMore">予約する</a>
    </div>
  </div>
</section>