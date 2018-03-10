<!-- lesson navigation button start -->
<?php $home_url = get_home_url(''); ?> 
<div class="lessonNav">
	<div class="lessonNavBtn contentWidth">
		<a href="../admission" class="btnNav btnNavPre">入会案内トップ</a>
		<a href="school/" class="btnNav">スクール紹介</a>
	</div>
</div><!-- /lesson navigation button end -->

<!-- beginner start -->
<section id="beginner">
	<div class="lessonSection contentWidth">
		<h3><span>ABOUT</span><span>体験レッスンについて</span></h3>
    	<article>
    		<div class="beginnerLinks">
    			<a href="<?php echo $home_url; ?>/about#whatSection">パデルとは?</a>
    			<a href="<?php echo $home_url; ?>/about#enjoyPoint">パデルのここが面白い</a>
    			<a href="<?php echo $home_url; ?>/about#charmSection">パデルスーパープレー紹介</a>
    			<a href="<?php echo $home_url; ?>/about#techniqueSection">パデルの技</a>
    		</div>
    		<p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
    		<?php 
                $bnr = get_field('banner_image_01'); 
                if( $bnr ) : 
                    $bnrLink = get_field('banner_link_01');
                    $linkBnr = !empty($bnrLink) ? $bnrLink : '#';
            ?>
                <a href="<?php echo $linkBnr; ?>" class="bnrLink"><img src="<?php echo $bnr['url']; ?>" alt="<?php echo $bnr['alt']; ?>"></a>
            <?php endif; ?>
    	</article>
	</div> 
</section><!-- /beginner end -->

<!-- flow start -->
<section id="flow">
	<div class="lessonSection">
		<h3><span>FLOW</span><span>予約の流れ</span></h3>
    	<article class="flowContainer contentWidth">
    		<div class="flowContent">
                <h6 class="flowTitle sp">1.テキストテキストテキスト</h6>
    			<figure>
					<img src="<?php echo get_template_directory_uri(); ?>/img/admission/flow_img01.png" alt="Flow 01">
				</figure>
    			<div class="flowInfo">
    				<h6 class="flowTitle pc">1.テキストテキストテキスト</h6>
    				<p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
    			</div>	    		
    		</div>
    		<div class="flowContent">
                <h6 class="flowTitle sp">2.テキストテキストテキスト</h6>
    			<figure>
					<img src="<?php echo get_template_directory_uri(); ?>/img/admission/flow_img01.png" alt="Flow 01">
				</figure>
    			<div class="flowInfo">
    				<h6 class="flowTitle pc">2.テキストテキストテキスト</h6>
    				<p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
    			</div>	    		
    		</div>
    		<div class="flowContent">
                <h6 class="flowTitle sp">3.テキストテキストテキスト</h6>
    			<figure>
					<img src="<?php echo get_template_directory_uri(); ?>/img/admission/flow_img01.png" alt="Flow 01">
				</figure>
    			<div class="flowInfo">
    				<h6 class="flowTitle pc">3.テキストテキストテキスト</h6>
    				<p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
    			</div>	    		
    		</div>
    		<div class="flowContent">
                <h6 class="flowTitle sp">4.テキストテキストテキスト</h6>
    			<figure>
					<img src="<?php echo get_template_directory_uri(); ?>/img/admission/flow_img01.png" alt="Flow 01">
				</figure>
    			<div class="flowInfo">
    				<h6 class="flowTitle pc">4.テキストテキストテキスト</h6>
    				<p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
    			</div>	    		
    		</div> 
    		<?php 
                $bnr = get_field('banner_image_01'); 
                if( $bnr ) : 
                    $bnrLink = get_field('banner_link_01');
                    $linkBnr = !empty($bnrLink) ? $bnrLink : '#';
            ?>
                <a href="<?php echo $linkBnr; ?>" class="bnrLink"><img src="<?php echo $bnr['url']; ?>" alt="<?php echo $bnr['alt']; ?>"></a>
            <?php endif; ?>
    	</article>
    	
	</div>
    </section><!-- /flow end -->

<!-- beginner start 
<section id="about" class="contentWidth lessonSection">
	<h3><span>ABOUT</span><span>体験レッスンについて</span></h3>
	<article>
		<p>①ご予約された日時に施設へお越しください。
		②受付を済ませたら、更衣室にてお着替えをお願いします。
		③ラケットを選んでいただき、いざレッスンへ
		④まずはラケットとボールに慣れるところから
		⑤そして、パデルコートの特徴、ガラスの壁を使っていきます。
		⑥ウォーミングアップを終えて、コーチの玉出しで実際に打つ練習を。
		⑦最後はミニゲームも出来るように！
		⑧レッスンを終えたら、更衣室でお着替えをお願いします。シャワーを完備していますので、汗をかいても安心です。

		※体験レッスンはお1人様2回まで受けていただけます。</p> 
	</article>
</section> /beginner end -->

<!-- price start -->
<section id="price">
	<h3><span>PRICE</span><span>料金について</span></h3>
	<div class="priceContents contentWidth">
		<article>
			<h4><span>体験レッスン料金</span></h4>
			<table>
				<tr>
					<th>内容</th>
					<td>料金(税込)</td>
				</tr>
				<tr>
					<th>体験レッスン(60分)</th>
					<td>1,000円</td>
				</tr>
			</table>
			<div class="attention">
				<p>体験レッスンはお一人様2回までとさせていただきます。</p> 
				<p>レンタルラケット代が無料となります。</p>
			</div>
		</article>
		<article>
			<h4><span>レンタル用品料金</span></h4>
			<table>
				<tr>
					<th>レンタル用品</th>
					<td>料金(税込)</td>
				</tr>
				<tr>
					<th>ラケット</th>
					<td>400円</td>
				</tr>
				<tr>
					<th>シューズ</th>
					<td>300円</td>
				</tr>
				<tr>
					<th>ボール</th>
					<td>無料</td>
				</tr>
			</table>
			<div class="attention">
				<p>パデルエバンジェリストの方、及び、お連れ様は無料でご利用いただけます。</p>
				<p>一般の硬式テニスボールでもお楽しみいただけます。<br>パデルボールで本格的なプレーをご希望の方はフロントにてご購入ください。</p> 
			</div>
		</article>
	</div>
</section>
<!-- /price end -->

<!-- schedule_01 start -->
<section id="schedule">
  <h3 class="scheduleTitle">
    <span>TRIAL SCHEDULE</span>
    <span>体験レッスンスクールスケジュール</span>
  </h3>
  <div class="scheduleIframe contentWidth">
    <img src="<?php echo get_template_directory_uri(); ?>/img/admission/iframe_img.png" alt="">
    <div class="rsvBtn">
    	<a href="#" class="btnMore">料金詳細</a>
    	<a href="#" class="btnMore">予約する</a>
    </div>
    
  </div>
</section>
<!-- /schedule_01 start -->