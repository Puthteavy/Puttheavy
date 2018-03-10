<?php
    session_start();

    if(!isset($_SESSION['email']))
    {
        wp_redirect('http://furisode-search.com/inquiry/inquiry.html');
    }
    session_destroy();

?>


<?php get_header(); ?>

    <div class="thanksMail">
    	<h1>お問い合わせ　送信完了</h1>
	    <h2>お問い合わせ番号 <span><?php echo isset($_SESSION['number'])?$_SESSION['number']:''; ?></span> を受け付けました</h2>
	    <p>
	    	※担当が確認後、随時返信しておりますので、お時間を頂戴しております。「@furisode-search.com」のドメインを解除して返信をお待ちください。
	    </p>
    </div>
<?php get_footer(); ?>
