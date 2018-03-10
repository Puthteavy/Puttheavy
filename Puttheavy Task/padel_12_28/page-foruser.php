<?php get_header('contact'); ?>

<!-- main contents -->
<main id="mainContent">

	<!-- breadcrumbs start -->
    <div id="breadcrumbsWrapper">
      <div id="breadcrumbs" class="contentWidth">
		<?php if (function_exists('padel_custom_breadcrumbs')) padel_custom_breadcrumbs(); ?>
      </div>
    </div><!-- /breadcrumbs end -->
	
	<?php if( have_posts() ) : ?>
		<?php while( have_posts() ) : the_post(); ?>

			<!-- form tabs start -->
			<section id="formTabs">
				<div class="tabs contentWidth">

					<div class="tabLinksWrapper">
						<ul class="tabLinks">
							<li><a href="../contact/forowner">お問い合わせ</a></li>
							<li  class="active"><a href="" class="twoLine">ご利用に際するお問い合わせ</a></li>
						</ul>
						<ul class="tabLinks">
							<li><a href="../contact/formedia">取材ご希望の方へ</a></li>
							<li><a href="../contact/recruit">採用</a></li>
						</ul>
					</div> 
					<div class="tabContent">
						<div id="tab02" class="tab active">
							<h3><span>ご利用に際するお問い合わせ</span></h3>
							<p>テキストテキストテキストテキストテキストテキストテキストテキスト<br/>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
							<form id="form" action="confirm" method="POST" class="contactForm" enctype="multipart/form-data">
								<input type="hidden" name="title" value="ご利用に際するお問い合わせ">
								<table class="formTable">
									<tr>
										<td><span>お問い合わせ種類</span><span class="infoRequired">必須</span></td>
										<td>
											<select name="user_inquiry_type" id="inquiryType" class="validate[required]">
												<option value="">-- 選択してください --</option>
												<option value="スクールについて">スクールについて</option>
												<option value="体験レッスンについて">体験レッスンについて</option>
												<option value="パデルイベントについて">パデルイベントについて</option> 
											</select>
										</td>
									</tr> 
									<tr>
										<td><span>お名前</span><span class="infoRequired">必須</span></td>
										<td><input type="text" name="user_name" placeholder="山田太郎" class="validate[required]"></td>
									</tr> 			 									<tr>
										<td><span>メールアドレス</span><span class="infoRequired">必須</span></td>
										<td><input type="text" name="user_email_address" placeholder="xxx@xx.xx" id="emailAdd" class="validate[required, custom[email]]"></td>
									</tr> 
									<tr>
										<td><span>メールアドレス(確認用)</span><span class="infoRequired">必須</span></td>
										<td><input type="text" name="user_email_confirm" placeholder="xxx@xx.xx" class="validate[required, custom[email], equals[emailAdd]]"></td>
									</tr> 
									<tr>
										<td><span>電話番号</span></td>
										<td><input type="text" name="user_phone" placeholder="00-0000-0000"></td>
									</tr>  
									<tr>
										<td><span>お問い合わせ内容</span><span class="infoRequired">必須</span></td>
										<td><textarea name="user_inquiry" class="validate[required]"></textarea></td>
									</tr> 
								</table>
								<input type="submit" name="btn_send_user" value="送信" class="btnSend">
							</form> 
						</div>
					</div>
				</div>
			</section><!-- /form tabs end -->

		<?php endwhile; ?>
	<?php endif; ?>
</main><!-- /main contents -->

<?php get_footer('contact'); ?>