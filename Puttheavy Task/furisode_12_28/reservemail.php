<?php
  mb_language("japanese");
  mb_internal_encoding("utf-8");
  mb_regex_encoding(mb_internal_encoding()); 
$day = date("l"); 
    switch ($day) {
        case "Sunday": $day = "日"; break;
        case "Monday": $day = "月"; break;
        case "Tuesday": $day = "火"; break;
        case "Wednesday": $day = "水"; break;
        case "Thursday": $day = "木"; break;
        case "Friday": $day = "金"; break;
        case "Saturday": $day = "土"; break;
        default: $day = "";
    }
$current_date = current_time( 'Y年m月d日('. $day . ') H時i分s秒', 0 );
// mail text to admin
$email_message = <<<VALUE

$f_name $l_name 様  

より来店予約がありました。       
        
ご送信内容の確認        

----------------------------------------------------                

送信日時： $current_date

お店の名前  : $shopname

予約の目的 : $reserve_purpose

希望来店日時 : $reserve_year $reserve_month $reserve_day $reserve_time

お名前 : $f_name $l_name 

お名前 (ふりがな) : $p_name $d_name 

電話番号 : $reserve_phone 

メールアドレス : $reserve_eamil 

その他お問い合わせ : $reserve_inquiries 

送信確認 : 振袖サーチの利用規約に準ずる。

----------------------------------------------------                
 このメールに心当たりの無い場合は、お手数ですが                                
 下記連絡先までお問い合わせください。。                                
                                
 ※担当者が確認後、随時返信しておりますので、お時間を頂戴しております。                                
 「@furisode-search.com」のドメインを解除して返信をお待ちください。                                
------------------------------------------------------------------------
振袖サーチ運営事務局 

http://furisode-search.com/             
info@kimono-cocoro.com              
                  

VALUE;
// mail text to user
$email_message_sender = <<<VALUE
$f_name $l_name 様

この度はご来店のご予約を頂き誠にありがとうございました。 

改めて担当者よりご連絡をさせていただきます。                              
                                
ご送信内容の確認                                
----------------------------------------------------                                

送信日時： $current_date

お店の名前  : $shopname

予約の目的 : $reserve_purpose<br> 

希望来店日時 : $reserve_year $reserve_month $reserve_day $reserve_time

お名前 : $f_name $l_name 

お名前 (ふりがな) : $p_name $d_name 

電話番号 : $reserve_phone 

メールアドレス : $reserve_eamil 

その他お問い合わせ : $reserve_inquiries 
---------------------------------------------------- 
このメールに心当たりの無い場合は、お手数ですが  

下記連絡先までお問い合わせください。。                                
                                
※担当者が確認後、随時返信しておりますので、お時間を頂戴しております。                                
「@furisode-search.com」のドメインを解除して返信をお待ちください。                                

=============================================================
振袖サーチ運営事務局      

http://furisode-search.com/             
info@kimono-cocoro.com              

VALUE;

    // Thanks mail to admin
// mail_sec.4@hearts-creative.jp
    $email_to = "mail_sec.4@hearts-creative.jp";
    $email_subject = '【振袖サーチ】'.$f_name.''.$l_name.' 様よりカタログ請求がありました。';
    $mailheader = 'From: ' . $reserve_eamil;    

    mb_send_mail("$email_to" , "$email_subject"  ,"$email_message" , "$mailheader");

    // Thanks mail to user
    $mailheader = 'From:'.$email_to;

    $email_subject_rc='【振袖サーチ】 ご来店のご予約頂きありがとうございました。♪';
    mb_send_mail("$reserve_eamil" , "$email_subject_rc"  ,"$email_message_sender" , "$mailheader");

    // redirect to success page after sent mail

      if(!isset($_SESSION['reserveEamil']))
    {
        wp_redirect('http://furisode-search.com/reserve/reserve.html');
    }
    session_destroy();
 ?>