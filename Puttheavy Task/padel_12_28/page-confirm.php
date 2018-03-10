<?php  
	mb_language("japanese");
	mb_internal_encoding("utf-8");
	mb_regex_encoding(mb_internal_encoding());

	session_start();

	if( !isset($_SESSION['btn_send_owner']) ) { $_SESSION['btn_send_owner'] = $_POST['btn_send_owner']; }
	if( !isset($_SESSION['btn_send_user']) ) { $_SESSION['btn_send_user'] = $_POST['btn_send_user']; }
	if( !isset($_SESSION['btn_send_media']) ) { $_SESSION['btn_send_media'] = $_POST['btn_send_media']; }
	if( !isset($_SESSION['btn_send_recruit']) ) { $_SESSION['btn_send_recruit'] = $_POST['btn_send_recruit']; }

	if( !isset($_SESSION['btn_send_owner']) && !isset($_SESSION['btn_send_user']) && !isset($_SESSION['btn_send_media']) && !isset($_SESSION['btn_send_recruit']) ) 
	{
		wp_redirect('http://padelasia.sakura.ne.jp/padelnf/contact/forowner');
		exit();
	} 

	$temp_dir = $_SERVER['DOCUMENT_ROOT'] . "/padelnf/wp-content/themes/padel/temp/";
	$target_dir = $_SERVER['DOCUMENT_ROOT'] . "/_contactimg/";

	// send mail by forowner
	// if( !isset($_SESSION['btn_send_owners']) ) { $_SESSION['btn_send_owners'] = $_POST['btn_send_owners']; }
	if( isset($_POST['btn_send_owners']) ) {

		$ownerCompanyName = $_POST['owner_company_names'];
		$ownerInquiryType = $_POST['owner_inquiry_types'];    
        $ownerDepartmentName = $_POST['owner_department_names'];
        $ownerUserName = $_POST['owner_user_names'];
        $ownerEmailAddress = $_POST['owner_email_addresss'];
        $ownerEmailConfirm = $_POST['owner_email_confirms'];
        $ownerPhoneNumber = $_POST['owner_phone_numbers'];
        $ownerInquiry = $_POST['owner_inquirys'];

		$admin_message = <<<VALUE
Padel Asiaサイトより連絡

Padel Asia(Padel Asia inc.)のHPより、
$ownerInquiryType の問い合わせがありました。
詳細は以下です。

------------------------
【お問い合わせ種類】 $ownerInquiryType
【法人名】 $ownerCompanyName
【部署名】 $ownerDepartmentName
【ご担当者様名】 $ownerUserName
【メールアドレス】 $ownerEmailAddress
【電話番号】 $ownerPhoneNumber
【お問い合わせ内容】 $ownerInquiry
------------------------


===================================
株式会社Padel Asia(Padel Asia inc.)
http://www.padelasia.jp/
===================================
VALUE;

		$user_message = <<<VALUE
$ownerCompanyName
$ownerUserName 様

このたびは株式会社Padel Asia(Padel Asia inc.)にお問い合わせいただき、
誠にありがとうございました。
以下の内容で承りました。

------------------------
【お問い合わせ種類】 $ownerInquiryType
【法人名】 $ownerCompanyName
【部署名】 $ownerDepartmentName
【ご担当者様名】 $ownerUserName
【メールアドレス】 $ownerEmailAddress
【電話番号】 $ownerPhoneNumber
【お問い合わせ内容】 $ownerInquiry
------------------------

テキストテキストテキスト
テキストテキストテキストテキストテキストテキスト

===================================
株式会社Padel Asia(Padel Asia inc.)
http://www.padelasia.jp/
〒101-0026 
東京都千代田区神田佐久間河岸78-3
柴田ビル2F(受付)

電話：03-4455-7527
===================================
VALUE;

    
    // Thanks mail to admin
    $email_to = "a.aoki@net-frontier.jp";
    $email_subject = "【問い合わせ・ $ownerInquiryType 】のお知らせ";
    $mailheader = 'From: no-reply@padelasia.jp';    
    mb_send_mail("$email_to" , "$email_subject"  ,"$admin_message" , "$mailheader");

    // Thanks mail to user
    $mailheader = 'From: no-reply@padelasia.jp';
    $email_subject = "【Padel Asia】 $ownerInquiryType のお問い合わせを受け付けました。";
    mb_send_mail("$ownerEmailAddress" , "$email_subject"  ,"$user_message" , "$mailheader");

	$_SESSION['btn_send_owners'] = $_POST['btn_send_owners'];
	wp_redirect('http://padelasia.sakura.ne.jp/padelnf/contact/complate');
	exit();
}

	// send mail by user
	// if( !isset($_SESSION['btn_send_users']) ) { $_SESSION['btn_send_users'] = $_POST['btn_send_users']; }
	if( isset($_POST['btn_send_users']) ) {

		$userInquiryType = $_POST['user_inquiry_types'];
		$userName = $_POST['user_names'];
		$userEmail = $_POST['user_email_addresss'];
		$userEmailConfirm = $_POST['user_email_confirms'];
		$userPhoneNumber = $_POST['user_phones'];
		$userInquiry = $_POST['user_inquirys'];

		$admin_message = <<<VALUE
Padel Asiaサイトより連絡

Padel Asia(Padel Asia inc.)のHPより、
$userInquiryType の問い合わせがありました。
詳細は以下です。

------------------------
【お問い合わせ種類】 $userInquiryType
【お名前】 $userName
【メールアドレス】 $userEmail
【電話番号】 $userPhoneNumber
【お問い合わせ内容】 $userInquiry
------------------------


===================================
株式会社Padel Asia(Padel Asia inc.)
http://www.padelasia.jp/
===================================
VALUE;

		$user_message = <<<VALUE
$userName 様

このたびは株式会社Padel Asia(Padel Asia inc.)にお問い合わせいただき、
誠にありがとうございました。
以下の内容で承りました。

------------------------
【お問い合わせ種類】 $userInquiryType
【お名前】 $userName 
【メールアドレス】 $userEmail
【電話番号】 $userPhoneNumber
【お問い合わせ内容】 $userInquiry
------------------------

テキストテキストテキスト
テキストテキストテキストテキストテキストテキスト

===================================
株式会社Padel Asia(Padel Asia inc.)
〒101-0026 
東京都千代田区神田佐久間河岸78-3
柴田ビル2F(受付)

電話：03-4455-7527
===================================
VALUE;

    
    // Thanks mail to admin
    $email_to = "a.aoki@net-frontier.jp";
    $email_subject = "【利用に際する問い合わせ・ $userInquiryType 】のお知らせ";
    $mailheader = 'From: no-reply@padelasia.jp';    
    mb_send_mail("$email_to" , "$email_subject"  ,"$admin_message" , "$mailheader");

    // Thanks mail to user
    $mailheader = 'From: no-reply@padelasia.jp';
    $email_subject = "【Padel Asia】 $userInquiryType のお問い合わせを受け付けました。";
    mb_send_mail("$userEmail" , "$email_subject"  ,"$user_message" , "$mailheader");

	$_SESSION['btn_send_users'] = $_POST['btn_send_users']; 
	wp_redirect('http://padelasia.sakura.ne.jp/padelnf/contact/complate');
	exit();
}

	// send mail by media
	// if( !isset($_SESSION['btn_send_medias']) ) { $_SESSION['btn_send_medias'] = $_POST['btn_send_medias']; }
// echo get_template_directory_uri() . "/uploads/";
	if( isset($_POST['btn_send_medias']) ) {

		$mediaInquiryType = $_POST['media_types'];    
		$mediaCompanyName = $_POST['media_company_names'];
		$mediaDepartmentName = $_POST['media_fan_group_names'];
		$mediaRefUrl = $_POST['ref_urls'];
		$mediaUserName = $_POST['media_charge_names'];
		$mediaEmail = $_POST['media_email_addresss'];
		$mediaEmailConfirm = $_POST['media_email_confirms'];
		$mediaPhoneNumber = $_POST['media_phone_numbers'];
		$mediaInterviewContent = $_POST['interview_contents'];
		$mediaCoverage = $_POST['media_coverages'];
		$mediaInterviewMonth = $_POST['interview_months'];
		$mediaInterviewDay = $_POST['interview_days'];
		$mediaFile = $_SESSION['media_file'];

		// upload file
		$transferFile = $temp_dir . $mediaFile;
        $location = $target_dir . $mediaFile;
        if(!file_exists($transferFile)) {
     	   echo "This file " . $mediaFile . ' can not allowed, please upload other file!!!';
     	   exit();
     	} else {
     	   copy($transferFile, $location);
  		   unlink($transferFile);
    	}
		

		$admin_message = <<<VALUE
Padel Asiaサイトより連絡

問い合わせページより、
取材の問い合わせがありました。
詳細は以下です。

------------------------
【貴社名】 $mediaCompanyName
【媒体の種類】 $mediaInquiryType
【媒体/番組名】 $mediaDepartmentName 
【参考URL】 $mediaRefUrl
【ご担当者様名】 $mediaUserName
【電話番号】 $mediaPhoneNumber
【メールアドレス】 $mediaEmail
【取材内容】 $mediaInterviewContent $mediaFile
【取材対象】 $mediaCoverage
【取材希望日】 $mediaInterviewMonth 月 $mediaInterviewDay 日
------------------------


===================================
株式会社Padel Asia(Padel Asia inc.)
http://www.padelasia.jp/
===================================
VALUE;

		$user_message = <<<VALUE
$mediaCompanyName
$mediaUserName 様

このたびは株式会社Padel Asia(Padel Asia inc.)にお問い合わせいただき、
誠にありがとうございました。
以下の内容で【取材問い合わせ】を受け付けました。

------------------------
【貴社名】 $mediaCompanyName
【媒体の種類】 $mediaInquiryType
【媒体/番組名】 $mediaDepartmentName 
【参考URL】 $mediaRefUrl
【ご担当者様名】 $mediaUserName
【電話番号】 $mediaPhoneNumber
【メールアドレス】 $mediaEmail
【取材内容】 $mediaInterviewContent $mediaFile
【取材対象】 $mediaCoverage
【取材希望日】 $mediaInterviewMonth 月 $mediaInterviewDay 日
------------------------

テキストテキストテキスト
テキストテキストテキストテキストテキストテキスト

===================================
株式会社Padel Asia(Padel Asia inc.)
http://www.padelasia.jp/
〒101-0026 
東京都千代田区神田佐久間河岸78-3
柴田ビル2F(受付)

電話：03-4455-7527
===================================
VALUE;

    
    // Thanks mail to admin
    $email_to = "a.aoki@net-frontier.jp";
    $email_subject = "【取材問い合わせ】のお知らせ";
    $mailheader = 'From: no-reply@padelasia.jp';    
    mb_send_mail("$email_to" , "$email_subject"  ,"$admin_message" , "$mailheader");

    // Thanks mail to user
    $mailheader = 'From: no-reply@padelasia.jp';
    $email_subject = "【Padel Asia】取材希望のお問い合わせを受け付けました。";
    mb_send_mail("$mediaEmail" , "$email_subject"  ,"$user_message" , "$mailheader");

	$_SESSION['btn_send_medias'] = $_POST['btn_send_medias'];
	wp_redirect('http://padelasia.sakura.ne.jp/padelnf/contact/complate');
	exit();
}

	// send mail by recruits
	// if( !isset($_SESSION['btn_send_recruits']) ) { $_SESSION['btn_send_recruits'] = $_POST['btn_send_recruits']; }
	if( isset($_POST['btn_send_recruits']) ) {

		$empLastName = $_POST['emp_last_names'];
		$empFirstName = $_POST['emp_first_names'];
		$empEmail = $_POST['emp_emails'];
		$empEmailConfirm = $_POST['emp_email_confirms'];
		$empPhoneNumber = $_POST['emp_phones'];
		$empYear = $_POST['emp_birth_years'];
		$empMonth = $_POST['emp_birth_months'];
		$empDay = $_POST['emp_birth_days'];
		$empZipCode1 = $_POST['emp_zip_code01s'];
		$empZipCode2 = $_POST['emp_zip_code02s'];
		$empAddress1s = $_POST['emp_address1s'];
		$empAddress2s = $_POST['emp_address2s'];
		$empExperience = $_POST['emp_padel_experiences'];
		$empInquiry = $_POST['emp_inquirys'];

		$admin_message = <<<VALUE
Padel Asiaサイトより連絡

問い合わせページより、
採用の問い合わせがありました。
詳細は以下です

------------------------
【氏名】 $empLastName $empFirstName
【メールアドレス】 $empEmail
【電話番号】 $empPhoneNumber
【生年月日】 $empYear 年 $empMonth 月 $empDay 日
【お住まい】 $empZipCode1 - $empZipCode2 $empAddress1s $empAddress2s
【パデル経験】 $empExperience
【お問い合わせ内容】 $empInquiry
------------------------


===================================
株式会社Padel Asia(Padel Asia inc.)
http://www.padelasia.jp/
===================================
VALUE;

		$user_message = <<<VALUE
$empLastName $empFirstName 様

このたびは株式会社Padel Asia(Padel Asia inc.)にお問い合わせいただき、
誠にありがとうございました。
以下の内容で【採用問い合わせ】を受け付けました。

------------------------
【氏名】 $empLastName $empFirstName
【メールアドレス】 $empEmail
【電話番号】 $empPhoneNumber
【生年月日】 $empYear 年 $empMonth 月 $empDay 日
【お住まい】 $empZipCode1 - $empZipCode2 $empAddress1s $empAddress2s
【パデル経験】 $empExperience
【お問い合わせ内容】 $empInquiry
------------------------

テキストテキストテキスト
テキストテキストテキストテキストテキストテキスト

===================================
株式会社Padel Asia(Padel Asia inc.)
〒101-0026 
東京都千代田区神田佐久間河岸78-3
柴田ビル2F(受付)

電話：03-4455-7527
===================================
VALUE;

    
    // Thanks mail to admin
    $email_to = "a.aoki@net-frontier.jp";
    $email_subject = "【採用】のお知らせ";
    $mailheader = 'From: no-reply@padelasia.jp';    
    mb_send_mail("$email_to" , "$email_subject"  ,"$admin_message" , "$mailheader");

    // Thanks mail to user
    $mailheader = 'From: no-reply@padelasia.jp';
    $email_subject = "【Padel Asia】採用のお問い合わせを受け付けました";
    mb_send_mail("$empEmail" , "$email_subject"  ,"$user_message" , "$mailheader");

	$_SESSION['btn_send_recruits'] = $_POST['btn_send_recruits'];
	wp_redirect('http://padelasia.sakura.ne.jp/padelnf/contact/complate');
	exit();

}

?>



<?php get_header('contact'); ?>

<!-- main contents -->
<main id="mainContent"> 
 	<section id="confirm" class="contentWidth"> 

        <?php  
        	if( isset($_POST['btn_send_owner']) ) {
            // data for owner 
            $inquiryType = $_POST['owner_inquiry_type'];   
            $companyName = $_POST['owner_company_name'];
            $departmentName = $_POST['owner_department_name'];
            $userName = $_POST['owner_user_name'];
            $email = $_POST['owner_email_address'];
            $emailConfirm = $_POST['owner_email_confirm'];
            $phoneNumber = $_POST['owner_phone_number'];
            $inquiry = $_POST['owner_inquiry'];
        ?>
          	<h3><span>お問い合わせ 確認画面</span></h3>
          	<p>以下の内容で間違いないか、ご確認ください。<br/>修正があるようでしたら、「戻る」ボタンでお戻りください。</p>
          	<form action="<?php the_permalink(); ?>" method="POST" class="contactForm" enctype="multipart/form-data">
	            <table class="formTable">
	              	<!-- class="validate[required]" -->
	              	<tr>
	                	<td><span>お問い合わせ種類</span><span class="infoRequired">必須</span></td>
	                	<td>
	                		<input type="hidden" name="owner_inquiry_types" value="<?php echo $inquiryType; ?>">
	                		<input type="text" value="<?php echo $inquiryType; ?>" disabled>
	                	</td>
	              	</tr>   
	              	<tr>
	                	<td><span>法人名</span></td>
	                	<td>
	                		<input type="hidden" name="owner_company_names" value="<?php echo $companyName; ?>">
	                		<input type="text" value="<?php echo $companyName; ?>" disabled>
	                	</td>
	              	</tr>  
	              	<tr>
		                <td><span>部署名</span></td>
		                <td>
		                	<input type="hidden" name="owner_department_names" value="<?php echo $departmentName; ?>">
		                	<input type="text" value="<?php echo $departmentName; ?>" disabled>
		                </td>
	              	</tr>  
	              	<tr>
		                <td><span>ご担当者様名</span><span class="infoRequired">必須</span></td>
		                <td>
		                	<input type="hidden" name="owner_user_names" value="<?php echo $userName; ?>">
		                	<input type="text" value="<?php echo $userName; ?>" disabled>
		                </td>
	              	</tr>  
	              	<tr>
		                <td><span>メールアドレス</span><span class="infoRequired">必須</span></td>
		                <td>
		                	<input type="hidden" name="owner_email_addresss" value="<?php echo $email; ?>">
		                	<input type="text" value="<?php echo $email; ?>" disabled>
		                </td>
	              	</tr>  
	              	<tr>
		                <td><span>メールアドレス(確認用)</span><span class="infoRequired">必須</span></td>
		                <td>
		                	<input type="hidden" name="owner_email_confirms" value="<?php echo $emailConfirm; ?>">
		                	<input type="text" value="<?php echo $emailConfirm; ?>" disabled>
		                </td>
	              	</tr>  
	              	<tr>
		                <td><span>電話番号</span><span class="infoRequired">必須</span></td>
		                <td>
		                	<input type="hidden" name="owner_phone_numbers" value="<?php echo $phoneNumber; ?>">
		                	<input type="text" value="<?php echo $phoneNumber; ?>" disabled>
		                </td>
	              	</tr>  
	              	<tr>
		                <td><span>お問い合わせ内容</span><span class="infoRequired">必須</span></td>
		                <td>
		                	<input type="hidden" name="owner_inquirys" value="<?php echo $inquiry; ?>">
		                	<textarea disabled><?php echo $inquiry; ?></textarea>
		                </td>
	              	</tr>  
	            </table> 
				<div id="confirmBtnContainer">
					<a href="javascript:history.back(1)" class="btnBack">戻る</a>
					<input type="submit" name="btn_send_owners" value="送信" class="btnSend">
				</div>
          	</form><!-- /end form forowner  -->

        <?php } elseif( isset($_POST['btn_send_user']) ) {
			// data for user 
			$inquiryType = $_POST['user_inquiry_type'];
			$userName = $_POST['user_name'];
			$email = $_POST['user_email_address'];
			$emailConfirm = $_POST['user_email_confirm'];
			$phoneNumber = $_POST['user_phone'];
			$inquiry = $_POST['user_inquiry'];
        ?>
			<h3><span>ご利用に際するお問い合わせ 確認画面</span></h3>
			<p>以下の内容で間違いないか、ご確認ください。<br/>修正があるようでしたら、「戻る」ボタンでお戻りください。</p>
			<form action="<?php the_permalink(); ?>" method="POST" class="contactForm" enctype="multipart/form-data"> 
				<table class="formTable">
					<tr>
						<td><span>お問い合わせ種類</span><span class="infoRequired">必須</span></td>
						<td>
							<input type="hidden" name="user_inquiry_types" value="<?php echo $inquiryType; ?>">
							<input type="text" value="<?php echo $inquiryType; ?>" disabled>
						</td>
					</tr>   
					<tr>
						<td><span>ご担当者様名</span><span class="infoRequired">必須</span></td>
						<td>
							<input type="hidden" name="user_names" value="<?php echo $userName; ?>">
							<input type="text" value="<?php echo $userName; ?>" disabled>
						</td>
					</tr>  
					<tr>
						<td><span>メールアドレス</span><span class="infoRequired">必須</span></td>
						<td>
							<input type="hidden" name="user_email_addresss" value="<?php echo $email; ?>">
							<input type="text" value="<?php echo $email; ?>" disabled>
						</td>
					</tr>  
					<tr>
						<td><span>メールアドレス(確認用)</span><span class="infoRequired">必須</span></td>
						<td>
							<input type="hidden" name="user_email_confirms" value="<?php echo $emailConfirm; ?>">
							<input type="text" value="<?php echo $emailConfirm; ?>" disabled>
						</td>
					</tr>  
					<tr>
						<td><span>電話番号</span></td>
						<td>
							<input type="hidden" name="user_phones" value="<?php echo $phoneNumber; ?>">
							<input type="text" value="<?php echo $phoneNumber; ?>" disabled>
						</td>
					</tr>  
					<tr>
						<td><span>お問い合わせ内容</span><span class="infoRequired">必須</span></td>
						<td>
							<input type="hidden" name="user_inquirys" value="<?php echo $inquiry; ?>">
							<textarea disabled><?php echo $inquiry; ?></textarea>
						</td>
					</tr>  
				</table>
				<div id="confirmBtnContainer">
					<a href="javascript:history.back(1)" class="btnBack">戻る</a>
					<input type="submit" name="btn_send_users" value="送信" class="btnSend">
				</div>          
			</form><!-- /end form foruser  -->

        <?php } elseif( isset($_POST['btn_send_media'])  ) {
			// data for media 
			$inquiryType = $_POST['media_type'];    
			$companyName = $_POST['media_company_name'];
			$departmentName = $_POST['media_fan_group_name'];
			$refUrl = $_POST['ref_url'];
			$userName = $_POST['media_charge_name'];
			$email = $_POST['media_email_address'];
			$emailConfirm = $_POST['media_email_confirm'];
			$phoneNumber = $_POST['media_phone_number'];
			$interviewContent = $_POST['interview_content'];
			$coverage = $_POST['media_coverage'];
			$interviewMonth = $_POST['interview_month'];
			$interviewDay = $_POST['interview_day'];

			$_SESSION['media_file'] = $_FILES["media_file"]["name"]; 
			$_SESSION['media_file_tmp'] = $_FILES["media_file"]["tmp_name"]; 

			//Initial storing
			$target_file = $temp_dir . basename($_FILES["media_file"]["name"]);
			move_uploaded_file($_FILES["media_file"]["tmp_name"], $target_file );


        ?>
			<h3><span>取材ご希望の方へ 確認画面</span></h3>
			<p>以下の内容で間違いないか、ご確認ください。<br/>修正があるようでしたら、「戻る」ボタンでお戻りください。</p>
			<form action="<?php the_permalink(); ?>" method="POST" class="contactForm" enctype="multipart/form-data"> 
				<table class="formTable">
					<tr>
						<td><span>貴社名</span></td>
						<td>
							<input type="hidden" name="media_company_names" value="<?php echo $companyName; ?>">
							<input type="text" value="<?php echo $companyName; ?>" disabled>
						</td>
					</tr> 
					<tr>
						<td><span>媒体の種類</span><span class="infoRequired">必須</span></td>
						<td>
							<input type="hidden" name="media_types" value="<?php echo $inquiryType; ?>">
							<input type="text" value="<?php echo $inquiryType; ?>" disabled>
						</td>
					</tr> 
					<tr>
						<td><span>媒体/番組名</span><span class="infoRequired">必須</span></td>
						<td>
							<input type="hidden" name="media_fan_group_names" value="<?php echo $departmentName; ?>">
							<input type="text" value="<?php echo $departmentName; ?>" disabled>
						</td>
					</tr> 
					<tr>
						<td><span>参考URL</span></td>
						<td>
							<input type="hidden" name="ref_urls" value="<?php echo $refUrl; ?>">
							<input type="text" value="<?php echo $refUrl; ?>" disabled>
						</td>
					</tr> 
					<tr>
						<td><span>ご担当者様名</span><span class="infoRequired">必須</span></td>
						<td>
							<input type="hidden" name="media_charge_names" value="<?php echo $userName; ?>">
							<input type="text" value="<?php echo $userName; ?>" disabled>
						</td>
					</tr> 
					<tr>
						<td><span>電話番号</span><span class="infoRequired">必須</span></td>
						<td>
							<input type="hidden" name="media_phone_numbers" value="<?php echo $phoneNumber; ?>">
							<input type="text" value="<?php echo $phoneNumber; ?>" disabled>
						</td>
					</tr>  
					<tr>
						<td><span>メールアドレス</span><span class="infoRequired">必須</span></td>
						<td>
							<input type="hidden" name="media_email_addresss" value="<?php echo $email; ?>">
							<input type="text" value="<?php echo $email; ?>" disabled>
						</td>
					</tr> 
					<tr>
						<td><span>メールアドレス(確認用)</span><span class="infoRequired">必須</span></td>
						<td>
							<input type="hidden" name="media_email_confirms" value="<?php echo $emailConfirm; ?>">
							<input type="text" value="<?php echo $emailConfirm; ?>" disabled>
						</td>
					</tr> 
					<tr>
						<td><span>取材内容</span></td>
						<td>
							<input type="hidden" name="interview_contents" value="<?php echo $interviewContent; ?>">
							<textarea disabled><?php echo $interviewContent; ?></textarea>
						</td>
					</tr> 
					<tr>
		            	<td></td>
		            	<td>アップロード画像： <?php echo $_SESSION['media_file']; ?></td>
		            </tr>
					<tr>
						<td><span>取材対象</span></td>
						<td>
							<input type="hidden" name="media_coverages" value="<?php echo $coverage; ?>">
							<input type="text" value="<?php echo $coverage; ?>" disabled>
						</td>
					</tr>  
					<tr>
						<td><span>取材ご希望日</span></td> 
						<td> 
							<input type="text" value="<?php echo $interviewMonth . '月 ' . $interviewDay . '日'; ?>">
							<input type="hidden" name="interview_months" value="<?php echo $interviewMonth; ?>">
							<input type="hidden" name="interview_days" value="<?php echo $interviewDay; ?>">
						</td>
					</tr> 
				</table>
				<div id="confirmBtnContainer">
					<a href="javascript:history.back(1)" class="btnBack">戻る</a>
					<input type="submit" name="btn_send_medias" value="送信" class="btnSend">
				</div>          
			</form><!-- /end form formedia  -->

        <?php } elseif( isset($_POST['btn_send_recruit']) ) { 
				$lastName = $_POST['emp_last_name'];
				$firstName = $_POST['emp_first_name'];
				$empEmail = $_POST['emp_email'];
				$empEmailConfirm = $_POST['emp_email_confirm'];
				$phoneNumber = $_POST['emp_phone'];
				$year = $_POST['emp_birth_year'];
				$month = $_POST['emp_birth_month'];
				$day = $_POST['emp_birth_day'];
				$zipCode1 = $_POST['emp_zip_code01'];
				$zipCode2 = $_POST['emp_zip_code02'];
				$empAddress1 = $_POST['emp_address1'];
				$empAddress2 = $_POST['emp_address2'];
				$experience = $_POST['emp_padel_experience'];
				$inquiry = $_POST['emp_inquiry'];
		?>
          	<h3><span>採用について</span></h3>
          	<p>以下の内容で間違いないか、ご確認ください。<br/>修正があるようでしたら、「戻る」ボタンでお戻りください。</p>
       		<form action="<?php the_permalink(); ?>" method="POST" class="contactForm" enctype="multipart/form-data"> 
	            <table class="formTable">
	              <tr>
	                <td><span>氏名</span><span class="infoRequired">必須</span></td>
	                <td> 
	                  <input type="hidden" name="emp_last_names" value="<?php echo $lastName; ?>"> 
	                  <input type="hidden" name="emp_first_names" value="<?php echo $firstName; ?>"> 
	                  <input type="text" value="<?php echo $lastName . ' ' . $firstName;  ?>" disabled>
	                </td>
	              </tr> 
	              <tr>
	                <td><span>メールアドレス</span><span class="infoRequired">必須</span></td>
	                <td>
	                	<input type="hidden" name="emp_emails" value="<?php echo $empEmail; ?>">
	                	<input type="text" value="<?php echo $empEmail; ?>" disabled>
	                </td>
	              </tr> 
	              <tr>
	                <td><span>メールアドレス(確認用)</span><span class="infoRequired">必須</span></td>
	                <td>
	                	<input type="hidden" name="emp_email_confirms" value="<?php echo $empEmailConfirm; ?>">
	                	<input type="text" value="<?php echo $empEmailConfirm; ?>" disabled>
	                </td>
	              </tr> 
	              <tr>
	                <td><span>電話番号</span><span class="infoRequired">必須</span></td>
	                <td>
	                	<input type="hidden" name="emp_phones" value="<?php echo $phoneNumber; ?>">
	                	<input type="text" value="<?php echo $phoneNumber; ?>" disabled>
	                </td>
	              </tr>  
	              <tr>
	                <td><span>生年月日</span><span class="infoRequired">必須</span></td>
	                <td id="birthDate">
	                  <input type="text" value="<?php echo $year .'年'. $month .'月'. $day .'日'; ?>" disabled> 
	                  <input type="hidden" name="emp_birth_years" value="<?php echo $year; ?>">
	                  <input type="hidden" name="emp_birth_months" value="<?php echo $month; ?>">
	                  <input type="hidden" name="emp_birth_days" value="<?php echo $day; ?>"> 
	                </td>
	              </tr> 
	              <tr>
	                <td><span>お住まい</span><span class="infoRequired">必須</span></td>
	                <td id="zipCode">  
	                  <input type="hidden" name="emp_zip_code01s" value="<?php echo $zipCode1; ?>"> 
	                  <input type="hidden" name="emp_zip_code02s" value="<?php echo $zipCode2; ?>"> 
	                  <input type="hidden" name="emp_address1s" value="<?php echo $empAddress1; ?>"> 
	                  <input type="hidden" name="emp_address2s" value="<?php echo $empAddress2; ?>"> 
	                  <input type="text" value="<?php echo $zipCode1 .'-'. $zipCode2 . ' ' . $empAddress1 .''. $empAddress2; ?>" disabled>  
	                </td>
	              </tr>  
	              <tr>
	                <td><span>パデル経験</span><span class="infoRequired">必須</span></td>
	                <td>
	                	<input type="hidden" name="emp_padel_experiences" value="<?php echo $experience; ?>">
	                	<input type="text" value="<?php echo $experience . '年'; ?>" disabled>
	                </td>
	              </tr> 
	              <tr>
	                <td><span>お問い合わせ内容</span><span class="infoRequired">必須</span></td>
	                <td>
	                	<input type="hidden" name="emp_inquirys" value="<?php echo $inquiry; ?>">
	                	<textarea disabled><?php echo $inquiry; ?></textarea>
	                </td>
	              </tr> 
	            </table>
	            <div id="confirmBtnContainer">
	              <a href="javascript:history.back(1)" class="btnBack">戻る</a>
	              <input type="submit" name="btn_send_recruits" value="送信" class="btnSend">
	            </div>          

          	</form> 
        <?php } ?>

    </section>
	 
</main><!-- /main contents -->

<?php get_footer('contact'); ?>