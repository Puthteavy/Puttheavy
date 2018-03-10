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
							<li><a href="../contact/foruser" class="twoLine">ご利用に際するお問い合わせ</a></li>
						</ul>
						<ul class="tabLinks">
							<li><a href="../contact/formedia">取材ご希望の方へ</a></li>
							<li class="active"><a href="">採用</a></li>
						</ul>
					</div> 
					<div class="tabContent">
						<div id="tab04" class="tab active">
					        <h3><span>採用について</span></h3>
					        <p>テキストテキストテキストテキストテキストテキストテキストテキスト<br/>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
					        <form id="form" action="confirm" method="POST" class="contactForm" enctype="multipart/form-data">
					        	<input type="hidden" name="title" value="採用について">
					          	<table class="formTable">
						            <tr>
						              <td><span>氏名</span><span class="infoRequired">必須</span></td>
						              <td>
						                <label for="lastName">姓</label>
						                <input type="text" name="emp_last_name" placeholder="山田" id="lastName" class="validate[required]">
						                <label for="firstName">名</label>
						                <input type="text" name="emp_first_name" placeholder="太郎" id="firstName" class="validate[required]">
						              </td>
						            </tr> 
						            <tr>
						              <td><span>メールアドレス</span><span class="infoRequired">必須</span></td>
						              <td><input type="email" name="emp_email" placeholder="xxx@xx.xx" id="emailAdd" class="validate[required, custom[email]]"></td>
						            </tr> 
						            <tr>
						              <td><span>メールアドレス(確認用)</span><span class="infoRequired">必須</span></td>
						              <td><input type="email" name="emp_email_confirm" placeholder="xxx@xx.xx" class="validate[required, custom[email], equals[emailAdd]]"></td>
						            </tr> 
						            <tr>
						              <td><span>電話番号</span><span class="infoRequired">必須</span></td>
						              <td><input type="text" name="emp_phone" placeholder="00-0000-0000" class="validate[required, custom[phone]]"></td>
						            </tr>  
						            <tr>
						              <td><span>生年月日</span><span class="infoRequired">必須</span></td>
						              <td id="birthDate">
						                <label for="">西暦</label> 
						                <select id="birthYear" name="emp_birth_year" class="validate[required]"><?=options('year' ,date('Y'),1900)?></select>
						                <label for="birthYear">年</label>
						                <select name="emp_birth_month" id="birthMonth" class="validate[required]">
						                  	<option value=""></option>
											<?php for ($i = 1; $i < 13 ; $i++) : ?>
												<option value="<?php echo $i; ?>"><?php echo $i; ?></option> 
											<?php endfor; ?>
						                </select>
						                <label for="birthMonth">月</label>
						                <select name="emp_birth_day" id="birthDay" class="validate[required]">
						                  	<option value=""></option>
											<?php for ($i = 1; $i < 32 ; $i++) : ?>
												<option value="<?php echo $i; ?>"><?php echo $i; ?></option> 
											<?php endfor; ?>
						                </select>
						                <label for="birthDay">日</label>
						              </td>
						            </tr> 
						            <tr>
						              <td><span>お住まい</span><span class="infoRequired">必須</span></td>
						              <td id="zipCode"> 
						                <label for="">郵便番号</label>
						                <input type="text" id="postcode1" name="emp_zip_code01" class="validate[required]"> 
						                <label for="">-</label>
						                <input type="text" id="postcode2" name="emp_zip_code02" class="validate[required]">  
						              </td>
						            </tr> 
						            <tr>
						              <td class="tdPC"></td>
						              <td>
						                <label for="state">都道府県</label>
						                <select name="emp_address1" id="address1">
						                  	<option value="北海道">北海道</option>
											<option value="青森県">青森県</option>
											<option value="岩手県">岩手県</option>
											<option value="宮城県">宮城県</option>
											<option value="秋田県">秋田県</option>
											<option value="山形県">山形県</option>
											<option value="福島県">福島県</option>
											<option value="茨城県">茨城県</option>
											<option value="栃木県">栃木県</option>
											<option value="群馬県">群馬県</option>
											<option value="埼玉県">埼玉県</option>
											<option selected="selected" value="千葉県">千葉県</option>
											<option value="東京都">東京都</option>
											<option value="神奈川県">神奈川県</option>
											<option value="新潟県">新潟県</option>
											<option value="富山県">富山県</option>
											<option value="石川県">石川県</option>
											<option value="福井県">福井県</option>
											<option value="山梨県">山梨県</option>
											<option value="長野県">長野県</option>
											<option value="岐阜県">岐阜県</option>
											<option value="静岡県">静岡県</option>
											<option value="愛知県">愛知県</option>
											<option value="三重県">三重県</option>
											<option value="滋賀県">滋賀県</option>
											<option value="京都府">京都府</option>
											<option value="大阪府">大阪府</option>
											<option value="兵庫県">兵庫県</option>
											<option value="奈良県">奈良県</option>
											<option value="和歌山県">和歌山県</option>
											<option value="鳥取県">鳥取県</option>
											<option value="島根県">島根県</option>
											<option value="岡山県">岡山県</option>
											<option value="広島県">広島県</option>
											<option value="山口県">山口県</option>
											<option value="徳島県">徳島県</option>
											<option value="香川県">香川県</option>
											<option value="愛媛県">愛媛県</option>
											<option value="高知県">高知県</option>
											<option value="福岡県">福岡県</option>
											<option value="佐賀県">佐賀県</option>
											<option value="長崎県">長崎県</option>
											<option value="熊本県">熊本県</option>
											<option value="大分県">大分県</option>
											<option value="宮崎県">宮崎県</option>
											<option value="鹿児島県">鹿児島県</option>
											<option value="沖縄県">沖縄県</option>
						                </select>
						                <input type="text" name="emp_address2" id="address2" style="margin-top:10px;">
						              </td>
						            </tr> 
						            <tr>
						              <td><span>パデル経験</span><span class="infoRequired">必須</span></td>
						              <td> 
						                <select name="emp_padel_experience" id="padelExperience" class="validate[required]">
						                  <option value=""></option>
						                  <option value="1">1</option>
						                  <option value="2">2</option>
						                  <option value="3">3</option>
						                  <option value="4">4</option>
						                </select>
						                <label for="padelExperience">年</label>
						              </td>
						            </tr> 
						            <tr>
						              <td><span>お問い合わせ内容</span><span class="infoRequired">必須</span></td>
						              <td><textarea name="emp_inquiry" placeholder="希望日程・ご要望" class="validate[required]"></textarea></td>
						            </tr> 
					          	</table>
					          <input type="submit" name="btn_send_recruit" value="送信" class="btnSend">
					        </form> 
					    </div>
					</div>
				</div>
			</section><!-- /form tabs end -->

		<?php endwhile; ?>
	<?php endif; ?>
</main><!-- /main contents -->

<?php get_footer('contact'); ?>
