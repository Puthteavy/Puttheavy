<?php  
  mb_language("japanese");
  mb_internal_encoding("utf-8");
  mb_regex_encoding(mb_internal_encoding());

  session_start();

  if( !isset($_SESSION['btn_send_owners']) && !isset($_SESSION['btn_send_users']) && !isset($_SESSION['btn_send_medias']) && !isset($_SESSION['btn_send_recruits']) ) {
    wp_redirect('http://padelasia.sakura.ne.jp/padelnf/contact/forowner');
    exit;
  }

?>

<?php get_header(); ?>
<!-- main contents -->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/contact/contact.css">
	<main id="mainContent">

	<!-- breadcrumbs start -->
	<div id="breadcrumbsWrapper">
	  <div id="breadcrumbs" class="contentWidth">
		<?php if (function_exists('padel_custom_breadcrumbs')) padel_custom_breadcrumbs(); ?>
	  </div>
	</div><!-- /breadcrumbs end -->


	<section id="complate" class="contentWidth">
		<?php if ( isset($_SESSION['btn_send_owners']) ): ?>
			<h3><span class="pc">「お問い合わせ」を受け付けました。ありがとうございました。</span><span class="sp">「お問い合わせ」を受け付けました。<br/>ありがとうございました。</span></h3>
	  		<p>受付完了の旨を自動返信のメールでお送りしました。</p>
	  		<p>no-reply@padelasia.jpというアドレスからメールが届きます。こちらのアドレス宛には返信が出来ませんのでご注意ください。</p>
	  	<?php elseif( isset($_SESSION['btn_send_users']) ) : ?>
	  		<h3><span class="pc">「ご利用に際するお問い合わせ」を受け付けました。ありがとうございました。</span><span class="sp">「ご利用に際するお問い合わせ」を受け付けました。<br/>ありがとうございました。</span></h3>
	  		<p>受付完了の旨を自動返信のメールでお送りしました。</p>
	  		<p>no-reply@padelasia.jpというアドレスからメールが届きます。こちらのアドレス宛には返信が出来ませんのでご注意ください。</p>
  		<?php elseif( isset($_SESSION['btn_send_medias']) ) : ?>
  			<h3><span class="pc">「取材ご希望の方へ」を受け付けました。ありがとうございました。</span><span class="sp">「取材ご希望の方へ」を受け付けました。<br/>ありがとうございました。</span></h3>
  			<p>受付完了の旨を自動返信のメールでお送りしました。</p>
  			<p>no-reply@padelasia.jpというアドレスからメールが届きます。こちらのアドレス宛には返信が出来ませんのでご注意ください。</p>
  		<?php elseif( isset($_SESSION['btn_send_recruits']) ) : ?>
  			<h3><span class="pc">「採用について」を受け付けました。ありがとうございました。</span><span class="sp">「採用について」を受け付けました。<br/>ありがとうございました。</span></h3>
  			<p>受付完了の旨を自動返信のメールでお送りしました。</p>
  			<p>no-reply@padelasia.jpというアドレスからメールが届きます。こちらのアドレス宛には返信が出来ませんのでご注意ください。</p>
		<?php endif ?>

	  	
	</section>

	</main><!-- /main contents -->

<?php get_footer(); ?>

<?php session_destroy(); ?>