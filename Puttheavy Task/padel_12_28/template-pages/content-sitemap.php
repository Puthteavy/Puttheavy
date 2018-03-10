<?php $home_url = get_home_url(''); ?>
<section id="sitemapSection">
	<div class="sitemapContent contentWidth">
		<div class="sitemapText"><a href="<?php echo $home_url; ?>/">トップ</a></div>
		<nav class="sitemapLink">
			<ul id="linkSitemap">
				<li><a href="<?php echo get_home_url('/'); ?>/about"><span>WHAT’S PADEL? パデルとは？</span></a></li>
				<li><a href="<?php echo get_home_url('/'); ?>/place"><span>PLACE 施設情報</span></a></li>
				<li><a href="<?php echo get_home_url('/'); ?>/admission"><span>ADMISSION 入会案内</span></a>
					<ul id="subSitemap">
						<li><a href="<?php echo get_home_url('/'); ?>/admission/school"><span>スクール紹介</span></a></li>
					    <li><a href="<?php echo get_home_url('/'); ?>/admission/trial"><span>体験レッスン</span></a></li>
					</ul>
				</li>
				<li><a href="<?php echo get_home_url('/'); ?>/event"><span>EVENT イベント</span></a></li>
				<li><a href="<?php echo get_home_url('/'); ?>/faq"><span>FAQ よくある質問</span></a></li>
				<li><a href="<?php echo get_home_url('/'); ?>/company"><span>会社案内</span></a></li>
				<li><a href="<?php echo get_home_url('/'); ?>/contact"><span>お問い合わせ</span></a></li>
				
			</ul>
			<ul id="linkSitemap">
				<li><a href="<?php echo get_home_url('/'); ?>/business"><span>パデル事業にご興味のある方</span></a></li>
				<li><a href="<?php echo get_home_url('/'); ?>/info"><span>各種ご案内</span></a></li>
				<li><a href="<?php echo get_home_url('/'); ?>/privacy"><span>個人情報保護方針</span></a></li>
				<li><a href="<?php echo get_home_url('/'); ?>/news"><span>お知らせ</span></a></li>
			</ul>
		</nav>
	</div>
</section>