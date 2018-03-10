<?php $home_url = get_home_url(''); ?>
<!doctype html>
<html lang="ja">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=2, user-scalable=yes">
    <title><?php wp_title(''); ?></title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="Location" content="http://padelasia.sakura.ne.jp/padelnf/">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/icon.png">

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
    
    <?php wp_head(); ?>

    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/validationEngine.jquery.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/contact/contact.css">
</head>

<body <?php body_class(); ?> >
<div id="pageWrapper" class="contact">
  
  <?php if( is_page('confirm') ) : ?>
    <!-- header of pape -->
    <header>
      <!-- logo and reserve coat -->
      <section id="headerTop">
          <div class="contentWidth">
            <h1 style="float: none;"><a href="<?php echo $home_url; ?>/" class="logo"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="PADEL logo"></a></h1>
          </div>
      </section> 

      <!-- google translator -->
      <section id="googleTranslator">
        <div class="leanguageTranslate contentWidth">
            <div id="google_translate_element"></div>
            <script type="text/javascript">
              function googleTranslateElementInit() {
                new google.translate.TranslateElement({pageLanguage: 'ja', layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL}, 'google_translate_element');
              }
            </script>
            <script type="text/javascript" src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        </div>
      </section>  
    </header>

  <?php else : ?>
    <!-- header of pape -->
    <header>
      <!-- logo and reserve coat -->
      <section id="headerTop">
          <div class="contentWidth">
            <h1><a href="<?php echo $home_url; ?>/" class="logo"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="PADEL logo"></a></h1>
            <div class="leftHeader pc">
              <a href="<?php echo $home_url; ?>/company/"><i class="fa fa-building-o" aria-hidden="true"></i>会社案内</a>
              <a href="<?php echo $home_url; ?>/sitemap/"><i class="fa fa-sitemap" aria-hidden="true"></i>サイトマップ</a>
              <a href="<?php echo $home_url; ?>/contact/forowner"><i class="fa fa-comments" aria-hidden="true"></i>お問い合わせ</a>
            </div>
            <div class="rightHeader">
              <a href="javascript:void(0);" id="spBtnLogin" class="login">ログイン</a>
              <a href="#" class="reserveCoat pc">レンタル<br/>コートを予約</a>
              <!-- sp menu humber btn --> 
              <a id="humb-btn" class="ofonts" href="#">
                <div class="humb-bar">
                  <span></span>
                </div>
                <span data-menu="CLOSE"><span>MENU</span></span>
              </a><!-- /sp menu humber btn -->
            </div>
          </div>
      </section>

      <!-- login modal -->
      <section id="myModal" class="modal">
        <form class="modal-content animate" action="">
          <div class="imgcontainer">
            <span class="close" title="Close Modal">&times;</span>
            <p style="color: #000;border: none;">LOGIN</p>
          </div>

          <div class="container">
            <label><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>

            <label><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>
              
            <button type="submit">Login</button>
            <input type="checkbox" checked="checked"> Remember me
          </div>

          <div class="container" style="background-color:#f1f1f1">
            <button type="button" onclick="document.getElementById('myModal').style.display='none'" class="cancelbtn">Cancel</button>
            <span class="psw">Forgot <a href="#">password?</a></span>
          </div>
        </form>
      </section><!-- /login modal -->

      <!-- google translator -->
      <section id="googleTranslator">
        <div class="leanguageTranslate contentWidth">
            <div id="google_translate_element"></div>
            <script type="text/javascript">
              function googleTranslateElementInit() {
                new google.translate.TranslateElement({pageLanguage: 'ja', layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL}, 'google_translate_element');
              }
            </script>
            <script type="text/javascript" src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        </div>
      </section>
      <!-- sp top navigation -->
      <div id="gnav-bg"></div>
      <div id="gnav" class="embed">
        <div class="inner">
          <div class="scroll-container">
              <div class="spMenu sp">
                <a href="javascript:void(0);" id="btnLogin" class="login">ログイン</a>
                <a href="#" class="reserveCoat">レンタルコートを予約</a>
                <ul class="menu contentWidth">
                  <li><a href="<?php echo $home_url; ?>/about/">WHAT’S PADEL?</a></li>
                  <li><a href="<?php echo $home_url; ?>/place/">PLACE</a></li>
                  <li><a href="<?php echo $home_url; ?>/admission/">ADMISSION</a></li>
                  <li><a href="<?php echo $home_url; ?>/event/">EVENT</a></li>
                  <li><a href="<?php echo $home_url; ?>/faq/">FAQ</a></li>
                  <li><a href="<?php echo $home_url; ?>/company/" class="spJPMenuFont"><i class="fa fa-building-o" aria-hidden="true"></i>会社案内</a></li>
                  <li><a href="<?php echo $home_url; ?>/sitemap/" class="spJPMenuFont"><i class="fa fa-sitemap" aria-hidden="true"></i>サイトマップ</a></li>
                  <li><a href="<?php echo $home_url; ?>/contact/" class="spJPMenuFont"><i class="fa fa-comments" aria-hidden="true"></i>お問い合わせ</a></li>
                </ul>
                
                <div id="spHeaderSNS">
                  <a href="https://www.facebook.com/padelasia.jp/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/sp_menu_facebook.png" alt="Facebook"></a>
                  <a href="https://twitter.com/PadelAsia" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/sp_menu_twitter.png" alt="Twitter"></a>
                  <a href="https://www.youtube.com/channel/UCF4etjsX_k6X_rSr6e_2mlw" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/sp_menu_youtube.png" alt="Youtube"></a>
                  <a href="http://padelman.hatenablog.com/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/sp_menu_blog.png" alt="Blog"></a>
                </div>
              </div>
          </div>
        </div>
      </div>
      <!-- pc top nav -->
      <nav id="topNav" class="pc"> 
        <ul class="menu contentWidth">
          <li class="aboutMenu currentMenu"><a href="<?php echo $home_url; ?>/about/"><span>WHAT’S PADEL?</span><span>パデルとは？</span></a></li>
          <li class="placeMenu currentMenu"><a href="<?php echo $home_url; ?>/place/"><span>PLACE</span><span>施設情報</span></a></li>
          <li class="admissionMenu currentMenu"><a href="<?php echo $home_url; ?>/admission/"><span>ADMISSION</span><span>入会案内</span></a></li>
          <li class="eventMenu currentMenu"><a href="<?php echo $home_url; ?>/event/"><span>EVENT</span><span>イベント</span></a></li>
          <li class="faqMenu currentMenu"><a href="<?php echo $home_url; ?>/faq/"><span>FAQ</span><span>よくある質問</span></a></li>
        </ul> 
      </nav>
    </header>

  <?php endif; ?>