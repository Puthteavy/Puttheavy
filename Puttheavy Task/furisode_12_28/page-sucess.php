<?php
    session_start();

    if(!isset($_SESSION['mailAddress']))
    {
        wp_redirect('http://furisode-search.com/resist');
    }
    session_destroy();

?>


<?php get_header(); ?>

    <div class="thanksMail">
    	<h1>新規店舗登録　送信完了</h1>
	   
	    <p>
	    	※担当が確認後、随時返信しておりますので、お時間を頂戴しております。「@furisode-search.com」のドメインを解除して返信をお待ちください。
	    </p>
    </div>
<?php get_footer(); ?>