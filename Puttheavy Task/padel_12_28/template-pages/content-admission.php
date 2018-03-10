<!-- lesson navigation button start -->
<?php $home_url = get_home_url(''); ?> 
<div class="lessonNav">
	<div class="lessonNavBtn contentWidth">
		<a href="admission/school/" class="btnNav">スクール紹介</a>
		<a href="admission/trial/" class="btnNav">体験レッスン紹介</a>
	</div>
</div><!-- /lesson navigation button end -->

<!-- beginner start -->
<section id="beginner">
	<div class="lessonSection contentWidth">
		<h3><span>BEGINNER</span><span>初めての方へ</span></h3>
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

<!-- lesson navigation button start -->
<div class="lessonNav">
	<div class="lessonNavBtn contentWidth">
		<a href="admission/school/" class="btnNav">スクール紹介</a>
		<a href="admission/trial/" class="btnNav">体験レッスン紹介</a>
	</div>
</div><!-- /lesson navigation button end -->