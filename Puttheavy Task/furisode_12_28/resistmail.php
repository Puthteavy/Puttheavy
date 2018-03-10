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

$shopName 様              
より新規店舗登録がありました。             
                
ご送信内容の確認   

----------------------------------------------------                

送信日時： $current_date

店舗名 : $shopName

フリガナ : $shopNameKana

店舗形態 : $shopType

郵便番号 : $zip

都道府県 : $state 

市区町村番地 : $address 

建物名 : $buildingName

電話番号 : $tel 

FAX番号 : $fax 

メールアドレス : $mailAddress 

ホームページ  : $url 

携帯ホームページ  : $mobileUrl 

担当者名  : $contactPersonal 

担当者ふりがな : $contactPersonalFurigana 

担当者連絡先（携帯可） : $contactPersonalTel 

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

$shopName 様 

この度は新規店舗のご登録頂き誠にありがとうございました。

改めて担当者よりご連絡をさせていただきます。                              
                                
ご送信内容の確認                                

┗╋…………………………………………………………‥★

店舗名 : $shopName

フリガナ : $shopNameKana

店舗形態 : $shopType

郵便番号 : $zip

都道府県 : $state 

市区町村番地 : $address 

建物名 : $buildingName

電話番号 : $tel 

FAX番号 : $fax 

メールアドレス : $mailAddress 

ホームページ  : $url 

携帯ホームページ  : $mobileUrl

担当者名  : $contactPersonal 

担当者ふりがな : $contactPersonalFurigana 

担当者連絡先（携帯可） : $contactPersonalTel 

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

    // Thanks mail to admin
    $email_to = "info@kimono-cocoro.com";
    $email_subject = '【振袖サーチ】'.$shopName.' 様より新規店舗登録がありました。';
    $mailheader = 'From: ' . $mailAddress;    

    mb_send_mail("$email_to" , "$email_subject"  ,"$email_message" , "$mailheader");

    // Thanks mail to user
    $mailheader = 'From:'.$email_to;
    $email_subject_rc='【振袖サーチ】 新規店舗登録ありがとうございました。♪';
    mb_send_mail("$mailAddress" , "$email_subject_rc"  ,"$email_message_sender" , "$mailheader");

    // redirect to success page after sent mail
    wp_redirect('http://furisode-search.com/inquiry/sucess.html');



 ?>