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
$email_message = <<<VALUE

$cat_name 様 

よりカタログ請求がありました。                 
                    
ご送信内容の確認                    
----------------------------------------------------                    

送信日時： $current_date

★★

お名前 : $cat_name

お名前 (ふりがな) : $cat_namePhonetic

生年月: $cat_year 年 - $cat_month 月

郵便番号 : 〒 $cat_postcode

住所 (市区町村番地) : 都道府県 $cat_prefecter - 住所 (市区町村番地) cat_address1 - 住所2 (マンション・ビル名)  $cat_address2

電話番号 : $cat_phone 

メールアドレス : $cat_email 

お住まい : $cat_residence

問い合わせ内容詳細・コメント: $cat_reguest 

送信確認 : 振袖サーチの利用規約に準ずる。

=============================================================
このメールに心当たりの無い場合は、お手数ですが                                
下記連絡先までお問い合わせください。。                                
                                
※担当者が確認後、随時返信しておりますので、お時間を頂戴しております。                                
「@furisode-search.com」のドメインを解除して返信をお待ちください。                                
=============================================================
振袖サーチ運営事務局          
http://furisode-search.com/         
info@kimono-cocoro.com          

VALUE;
$email_message_sender = <<<VALUE
                        
$cat_name 様                           
この度はカタログのご請求を頂き誠にありがとうございました。   

改めて担当者よりご連絡をさせていただきます。                          
                            
ご送信内容の確認                            
----------------------------------------------------                            
送信日時： $current_date

★★
お名前 : $cat_name

お名前 (ふりがな) : $cat_namePhonetic

生年月: $cat_year 年 - $cat_month 月

郵便番号 : 〒 $cat_postcode

住所 (市区町村番地) : 都道府県 $cat_prefecter - 住所 (市区町村番地) $cat_address1 - 住所2 (マンション・ビル名)  $cat_address2

電話番号 : $cat_phone 

メールアドレス : $cat_email 

お住まい : $cat_residence

問い合わせ内容詳細・コメント: $cat_reguest 

============================================================

 このメールに心当たりの無い場合は、お手数ですが                                
 下記連絡先までお問い合わせください。。                                
                                
 ※担当者が確認後、随時返信しておりますので、お時間を頂戴しております。                                
 「@furisode-search.com」のドメインを解除して返信をお待ちください。                                

============================================================
振袖サーチ運営事務局   

http://furisode-search.com/         
info@kimono-cocoro.com          


VALUE;

    // Thanks mail to admin
    $email_to = "mail_sec.4@hearts-creative.jp";
    $email_subject = '【振袖サーチ】'.$cat_name.' 様よりカタログ請求がありました。';
    $mailheader = 'From: ' . $cat_email;    

    mb_send_mail("$email_to" , "$email_subject"  ,"$email_message" , "$mailheader");

    // Thanks mail to user
    $mailheader = 'From:'.$email_to;
    $email_subject_rc='【振袖サーチ】 カタログのご請求ありがとうございました。♪';
    mb_send_mail("$cat_email" , "$email_subject_rc"  ,"$email_message_sender" , "$mailheader");

    // redirect to success page after sent mail
    wp_redirect('http://furisode-search.com/complete');
     
  session_destroy();

 ?>