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
							<li class="active"><a href="">お問い合わせ</a></li>
							<li><a href="../contact/foruser" class="twoLine">ご利用に際するお問い合わせ</a></li>
						</ul>
						<ul class="tabLinks">
							<li><a href="../contact/formedia">取材ご希望の方へ</a></li>
							<li><a href="../contact/recruit">採用</a></li>
						</ul>
					</div> 
					<div class="tabContent">
						<div id="tab01" class="tab active">
							<h3><span>お問い合わせ</span></h3>
							<p>テキストテキストテキストテキストテキストテキストテキストテキスト<br/>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
							<form id="form" action="confirm" method="POST" class="contactForm" name="form_forowner" enctype="multipart/form-data">
								<input type="hidden" name="title" value="お問い合わせ">
								<table class="formTable">
									<!-- class="validate[required]" -->
									<tr>
										<td><span>お問い合わせ種類</span><span class="infoRequired">必須</span></td>
										<td>
											<select name="owner_inquiry_type" id="inquiryType" class="validate[required]">
												<option value="">-- 選択してください --</option>
												<option value="土地の有効活動について">土地の有効活動について</option>
												<option value="FCについて">FCについて</option>
												<option value="パデル事業説明会について">パデル事業説明会について</option>
												<option value="その他">その他</option>
											</select>
										</td>
									</tr> 
									<tr>
										<td><span>法人名</span></td>
										<td><input type="text" name="owner_company_name" placeholder="株式会社Padel Asia(Padel Asia inc.)"></td>
									</tr> 
									<tr>
										<td><span>部署名</span></td>
										<td><input type="text" name="owner_department_name" placeholder="○×部"></td>
									</tr> 
									<tr>
										<td><span>ご担当者様名</span><span class="infoRequired">必須</span></td>
										<td><input type="text" name="owner_user_name" placeholder="山田太郎" class="validate[required]"></td>
									</tr> 
									<tr>
										<td><span>メールアドレス</span><span class="infoRequired">必須</span></td>
										<td><input type="text" name="owner_email_address" placeholder="xxx@xx.xx" id="emailAdd" class="validate[required, custom[email]]"></td>
									</tr> 
									<tr>
										<td><span>メールアドレス(確認用)</span><span class="infoRequired">必須</span></td>
										<td><input type="text" name="owner_email_confirm" placeholder="xxx@xx.xx" class="validate[required, custom[email], equals[emailAdd]]"></td>
									</tr> 
									<tr>
										<td><span>電話番号</span><span class="infoRequired">必須</span></td>
										<td><input type="text" name="owner_phone_number" placeholder="00-0000-0000" class="validate[required, custom[phone]]"></td>
									</tr> 
									<tr>
										<td><span>お問い合わせ内容</span><span class="infoRequired">必須</span></td>
										<td>
											<textarea name="owner_inquiry" class="validate[required]"></textarea>
											<p>※「土地の有効活動について」お問い合わせの方はご相談場所の所在地を明記いただけますでしょうか。</p>
										</td>
									</tr> 
								</table>
								<input type="submit" name="btn_send_owner" value="送信" class="btnSend">
							</form> 
					</div>

					</div>
				</div>
			</section><!-- /form tabs end -->

		<?php endwhile; ?>
	<?php endif; ?>
</main><!-- /main contents -->

<?php get_footer('contact'); ?>