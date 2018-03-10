<?php
if(isset($_POST['btn_send_media']) && isset($_FILES['media_file']))
{

    $from_email         = 'orkchanrait@gmail.com'; //from mail, it is mandatory with some hosts
    $recipient_email    = 'c.ork@net-frontier.jp'; //recipient email (most cases it is your personal email)
    
    //Capture POST data from HTML form and Sanitize them, 
    $subject        = "【取材問い合わせ】のお知らせ"; //get subject from HTML form
    $message        = <<<VALUE
Padel Asiaサイトより連絡

問い合わせページより、
取材の問い合わせがありました。
詳細は以下です。

------------------------
【貴社名】 
【媒体の種類】 
【媒体/番組名】 
【参考URL】 
【ご担当者様名】 
【電話番号】 
【メールアドレス】
【取材内容】 
【取材対象】 
【取材希望日】 
------------------------


===================================
株式会社Padel Asia(Padel Asia inc.)
http://www.padelasia.jp/
===================================
VALUE;
    
    //Get uploaded file data
    $file_tmp_name    = $_FILES['media_file']['tmp_name'];
    $file_name        = $_FILES['media_file']['name'];
    $file_size        = $_FILES['media_file']['size'];
    $file_type        = $_FILES['media_file']['type'];
    $file_error       = $_FILES['media_file']['error'];

    if($file_error > 0)
    {
        die('Upload error or No files uploaded');
    }
    //read from the uploaded file & base64_encode content for the mail
    $handle = fopen($file_tmp_name, "r");
    $content = fread($handle, $file_size);
    fclose($handle);
    $encoded_content = chunk_split(base64_encode($content));

        $boundary = md5("sanwebe");
        //header
        $headers = "MIME-Version: 1.0\r\n"; 
        $headers .= "From:".$from_email."\r\n";
        $headers .= "Content-Type: multipart/mixed; boundary = $boundary\r\n\r\n"; 
        
        //plain text 
        $body = "--$boundary\r\n";
        $body .= "Content-Type: text/plain; charset=utf-8\r\n";
        $body .= "Content-Transfer-Encoding: base64\r\n\r\n"; 
        $body .= chunk_split(base64_encode($message)); 
        
        //attachment
        $body .= "--$boundary\r\n";
        $body .="Content-Type: $file_type; name=".$file_name."\r\n";
        $body .="Content-Disposition: attachment; filename=".$file_name."\r\n";
        $body .="Content-Transfer-Encoding: base64\r\n";
        $body .="X-Attachment-Id: ".rand(1000,99999)."\r\n\r\n"; 
        $body .= $encoded_content; 
    
    $sentMail = @mail($recipient_email, $subject, $body, $headers);
    if($sentMail) //output success or failure messages
    {       
        die('Thank you for your email');
    }else{
        die('Could not send mail! Please check your PHP mail configuration.');  
    }

}
?>


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
							<li class="active"><a href="">取材ご希望の方へ</a></li>
							<li><a href="../contact/recruit">採用</a></li>
						</ul>
					</div> 
					<div class="tabContent">
						<div id="tab03" class="tab active">
					        <h3><span>取材ご希望の方へ</span></h3>
					        <p>テキストテキストテキストテキストテキストテキストテキストテキスト<br/>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
					        <form id="form" action="confirm" method="POST" class="contactForm" enctype="multipart/form-data">
					        	<input type="hidden" name="title" value="取材ご希望の方へ">
					        	<!--  class="validate[required, custom[email], equals[emailAdd]]" -->
					          	<table class="formTable">
						            <tr>
						              <td><span>貴社名</span></td>
						              <td><input type="text" name="media_company_name" placeholder="株式会社Padel Asia(Padel Asia inc.)"></td>
						            </tr> 
						            <tr>
										<td><span>媒体の種類</span><span class="infoRequired">必須</span></td>
										<td>
											<select name="media_type" id="inquiryType" class="validate[required]">
												<option value="">-- 選択してください --</option>
												<option value="テレビ">テレビ</option>
												<option value="新聞">新聞</option>
												<option value="雑誌">雑誌</option>
												<option value="ラジオ">ラジオ</option>
												<option value="web">web</option>
												<option value="その他">その他</option>
											</select>
										</td>
									</tr> 
						            <tr>
						              <td><span>媒体/番組名</span><span class="infoRequired">必須</span></td>
						              <td><input type="text" name="media_fan_group_name" placeholder="パデル通信" class="validate[required]"></td>
						            </tr> 
						            <tr>
						              <td><span>参考URL</span></td>
						              <td><input type="text" name="ref_url" placeholder="www.padelasia.jp"></td>
						            </tr> 
						            <tr>
						              <td><span>ご担当者様名</span><span class="infoRequired">必須</span></td>
						              <td><input type="text" name="media_charge_name" placeholder="山田太郎" class="validate[required]"></td>
						            </tr> 
						            <tr>
						              <td><span>電話番号</span><span class="infoRequired">必須</span></td>
						              <td><input type="text" name="media_phone_number" placeholder="00-0000-0000" class="validate[required, custom[phone]]"></td>
						            </tr>  
						            <tr>
										<td><span>メールアドレス</span><span class="infoRequired">必須</span></td>
										<td><input type="email" name="media_email_address" placeholder="xxx@xx.xx" id="emailAdd" class="validate[required, custom[email]]"></td>
									</tr> 
									<tr>
										<td><span>メールアドレス(確認用)</span><span class="infoRequired">必須</span></td>
										<td><input type="email" name="media_email_confirm" placeholder="xxx@xx.xx" class="validate[required, custom[email], equals[emailAdd]]"></td>
									</tr> 
						            <tr>
						              <td><span>取材内容</span></td>
						              <td><textarea name="interview_content"></textarea></td>
						            </tr> 
						            <tr>
						            	<td></td>
						            	<td id="mediaFile">
						            		<p>※企画書がおありの場合はアップロードしてください。</p>
						            		<input type="file" name="media_file" id="media_file" accept=".jpg,.png,.gif,.pdf,.doc,.docx,.xlsx,.xlsm,.xls,.ppt,.pptx">
						            	</td>
						            </tr>
						            <tr>
						              <td><span>取材対象</span></td>
						              <td><input type="text" name="media_coverage" placeholder="社長"></td>
						            </tr>  
									<tr>
										<td><span>取材ご希望日</span></td> 
										<td id="interviewDate"> 
											<select name="interview_month" id="interviewMonth">
												<option value=""></option>
												<?php for ($i = 1; $i < 13 ; $i++) : ?>
													<option value="<?php echo $i; ?>"><?php echo $i; ?></option> 
												<?php endfor; ?>
											</select>
											<label for="interviewMonth">月</label>
											<select name="interview_day" id="interviewDay">
												<option value=""></option>
												<?php for ($i = 1; $i < 32 ; $i++) : ?>
													<option value="<?php echo $i; ?>"><?php echo $i; ?></option> 
												<?php endfor; ?>
											</select>
											<label for="interviewDay">日</label>
										</td>
									</tr> 
					          	</table>
					          
					          <input type="submit" name="btn_send_media" value="送信" class="btnSend">
					        </form> 
					    </div>
					</div>
				</div>
			</section><!-- /form tabs end -->

		<?php endwhile; ?>
	<?php endif; ?>
</main><!-- /main contents -->

<?php get_footer('contact'); ?>