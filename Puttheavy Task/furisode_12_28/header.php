<!DOCTYPE html>
<html lang="ja">
<head>
	<title><?php bloginfo( 'name' ); wp_title(); ?></title>
	<!-- <meta name="description" content="<?php// bloginfo( 'description' ); ?>"> -->
	<meta name="description" content="全国の成人式・振袖レンタルと販売のショップが探せる振袖サーチでお気に入りの振袖を探そう。ご掲載を希望する新規ショップも随時募集中。">

	<meta charset="<?php bloginfo( 'charset' ); ?>" >
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no" >
    <!--  -->
    <meta property="og:url"           content="http://www.your-domain.com/your-page.html" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="Your Website Title" />
    <meta property="og:description"   content="Your description" />
    <meta property="og:image"         content="http://www.your-domain.com/path/image.jpg" />
   
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


	<?php wp_head(); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/highslide-with-gallery.js"></script>
    <script type="text/javascript">
        hs.graphicsDir = '<?php echo get_template_directory_uri(); ?>/highslide/graphics/';
        hs.align = 'center';
        hs.transitions = ['expand', 'crossfade'];
        hs.wrapperClassName = 'dark borderless floating-caption';
        hs.fadeInOut = true;
        hs.dimmingOpacity = .75;

        // Add the controlbar
        if (hs.addSlideshow) hs.addSlideshow({
            interval: 5000,
            repeat: false,
            useControls: true,
            fixedControls: 'fit',
            overlayOptions: {
                opacity: .6,
                position: 'bottom center',
                hideOnMouseOut: true
            }
        });
    </script>
    
</head>
<div id="top"></div>
<body <?php body_class(); ?> >

       
     <div id="fb-root"></div>
      <script>
      (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7&appId=563359677176205";
            fjs.parentNode.insertBefore(js, fjs);

          }
      (document, 'script', 'facebook-jssdk'));
     
      </script>

	<div id="pageWrapper">
        <!-- Header -->
        <header id="headerWrapper">
            <nav id="topNavWrapper">
                <ul id="topNav">
                    <li><a href="<?php echo get_home_url('/'); ?>"><span>Top</span></a></li>
                    <li><a href="<?php echo get_home_url('/'); ?>/shoplist"><span>shop</span></a></li>
                    <li><a href="<?php echo get_home_url('/'); ?>"><h1><img src="<?php echo get_template_directory_uri() ?>/images/pc/main/logo.png" alt="Furisode"></h1></a></li>
                    
                    <li><a href="<?php echo get_home_url('/'); ?>/furisode"><span>Furisode</span></a></li>
                    <li><a href="<?php echo get_home_url('/'); ?>/event"><span>Event</span></a></li>
                </ul>
            </nav>
        </header>
        <!-- section search -->

		