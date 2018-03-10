<?php

 $current = '0000';
try {

    $file = __DIR__ .'/email.txt';

    // Open the file to get existing content
    $current =  (trim(file_get_contents($file)) - 0) + 1;

    // Write the contents back to the file
    file_put_contents($file,$current.'');
    $current = str_pad($current,4,'0',STR_PAD_LEFT);

} catch (Exception $e){

}

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
----------------------------------------------------
$name 様
よりお問合わせがありました。

ご送信内容の確認

----------------------------------------------------

送信日時： $current - $current_date 

お問い合わせ項目 : $inquiry

メールアドレス : $email

お名前 : $name

フリガナ : $assumed

電話番号 : $phone

郵便番号 : $postcode 

都道府県 : $prefecture

市区町村 : $municipality 

丁目番地 : $chomechi

お問合せ内容  : $body 

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

----------------------------------------------------
$name 様

この度はお問い合せ頂き誠にありがとうございました。

改めて担当者よりご連絡をさせていただきます。

ご送信内容の確認

┗╋…………………………………………………………★ ★ ☆

お問い合わせ項目 : $inquiry

メールアドレス : $email

お名前 : $name

フリガナ : $assumed

電話番号 : $phone 

郵便番号 : $postcode 

都道府県 : $prefecture 

市区町村 : $municipality 

丁目番地 : $chomechi

お問合せ内容  : $body 

送信確認 : 送信チェック済み  

======================================================
このメールに心当たりの無い場合は、お手数ですが

下記連絡先までお問い合わせください。。

※担当者が確認後、随時返信しておりますので、お時間を頂戴しております。

 「@furisode-search.com」のドメインを解除して返信をお待ちください。
======================================================

振袖サーチ運営事務局

http://furisode-search.com/
info@kimono-cocoro.com

VALUE;

    // Thanks mail to admin
    $email_to = "mail_sec.4@hearts-creative.jp";
    $email_subject = '【振袖サーチ】'.$name.' 様よりお問い合わせがありました。';
    $mailheader = 'From: ' . $email;    

    mb_send_mail("$email_to" , "$email_subject"  ,"$email_message" , "$mailheader");

    // Thanks mail to user
    $mailheader = 'From:'.$email_to;
    $email_subject_rc='【振袖サーチ】 お問い合わせありがとうございました。';
    mb_send_mail("$email" , "$email_subject_rc"  ,"$email_message_sender" , "$mailheader");

    // redirect to success page after sent mail
    
    $_SESSION['number'] = $current.'-'.$current_date;

    wp_redirect('http://furisode-search.com/inquiry/thanks.html?'.$current.'-'.$current_date);


 ?>