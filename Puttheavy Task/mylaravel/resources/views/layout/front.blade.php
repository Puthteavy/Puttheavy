@php
    $base_url = asset('web');
dd($base_url);
@endphp
<?php ?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ $base_url }}/css/normalize.css">
    <link rel="stylesheet" href="{{ $base_url }}/css/main.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Assistant|Bellefair|Dangrek|Ubuntu+Condensed|Yanone+Kaffeesatz" rel="stylesheet">
</head>

<body>
<div id="pageWrapper">
    <header id="header">
        <div class="header-top">
            <div class="top-container">
                <div class="top-email">
                    <p><i class="fa fa-envelope" aria-hidden="true"></i> Email : theavytep18@outlook.com</p>
                    <p><i class="fa fa-mobile" aria-hidden="true"></i> Tel : 070 392 187</p>
                </div>
                <div class="top-item">
                    <ul>
                        <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i> My Account</a></li>
                        <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i> Wish List(0) </a></li>
                        <li><a href="#">USD Dollar </a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="header-center">
            <div class="center-container">
                <div class="center-logo">
                    <div class="logo-content">
                        <a href="#">ផ្ទះបន្លែធម្មជាតិ</a>
                    </div>
                </div>
                <div class="center-menuWrapper">
                    <div class="menu-content">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">FRUIT</a></li>
                            <li><a href="#">VEGETABLES</a></li>
                            <li><a href="#">MEAT</a></li>
                            <li><a href="#">Fish</a></li>
                            <li><a href="#">Best Saller</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-buttom">
            <div class="buttom-container">
                <div class="button-category">
                    <div class="category-box">
                        <div class="list-icon"><i class="fa fa-list" aria-hidden="true"></i></div>
                        <div class="cat-text">CATEGORIES <i class="fa fa-arrow-circle-down" aria-hidden="true"></i></div>
                    </div>
                    <div class="search-box">
                        <div class="search">
                            <div class="search-block">
                                <form action="" method="post">
                                    <div class="all-category">
                                        <select>
                                            <option value="">All Category</option>
                                            <option value="">Item 1</option>
                                        </select>
                                    </div>
                                    <div class="search-item">
                                        <input type="text" name="search" id="search" value="Search" class="autosearch-input">
                                        <span class="input-group-btn">
                                                <button type="submit" name="submit" id="submit" class="button-search">
                                                    <i class="fa fa-search" aria-hidden="true"></i>
                                                </button>
                                            </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="login"><i class="fa fa-user" aria-hidden="true"></i> LOGIN</div>
                        <div class="wishlist"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> MY CART</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div id="contentWrapper">
        <div class="containerWrapper">
            <div class="content-top">
                <div class="category-itemlist">
                    <div class="cat-item">
                        <ul>
                            <li><a href="#">FRUIT</a></li>
                            <li><a href="#">VEGETABLES</a></li>
                            <li><a href="#">MEAT & FISH</a></li>
                            <li><a href="#">WATER & JUICE</a></li>
                            <li><a href="#">BEST SELLERS</a></li>
                            <li><a href="#">SPECIALS</a></li>
                            <li><a href="#">RECOMENDED</a></li>
                            <li><a href="#">PROMOTION</a></li>
                        </ul>
                    </div>
                    <div class="cat-more"><span><a href=""><i class="fa fa-plus-square-o"></i>More Categories</a></span></div>
                </div>
                <div class="main-imageslider">
                    <div class="imageslide">
                        <img src="{{ $base_url }}/images/main-image.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="content-promotion">
                <div class="pro-box">
                    <img src="{{ $base_url }}/images/m1.jpg" alt="">
                </div>
                <div class="pro-box">
                    <img src="{{ $base_url }}/images/m1.jpg" alt="">
                </div>
                <div class="pro-box">
                    <img src="{{ $base_url }}/images/m1.jpg" alt="">
                </div>
                <div class="pro-box">
                    <img src="{{ $base_url }}/images/m1.jpg" alt="">
                </div>
            </div>
            <div class="content-itempost">
                <div class="module so-deals">
                    <h3 class="modtitle"><span>Hot Deals</span></h3>
                    <div class="modcontent">
                        <div class="modItem">
                            <div class="item">
                                <a href="#">
                                    <div class="modImg">
                                        <img src="{{ $base_url }}/images/pic01.jpg" alt="">
                                        <div class="dis_value" style="background: url('<?php bloginfo('template_directory'); ?>/images/certificate-shape.png') no-repeat">
                                            <p>10%</p>
                                        </div>
                                    </div>
                                </a>
                                <div class='modDetails'>
                                    <a href="#"><h2>title</h2></a>
                                    <h3>Price : $ 10</h3>
                                </div>
                                <button type="submit" name="addcart" class='add_cart' onclick="<?php $capnum=$capnum+1;?>">
                                    <i class='fa fa-shopping-basket'></i>ADD TO CART
                                </button>
                            </div>
                        </div>
                        <div class="modItem">
                            <div class="item">
                                <a href="#">
                                    <div class="modImg">
                                        <img src="{{ $base_url }}/images/pic01.jpg" alt="">
                                        <div class="dis_value" style="background: url('<?php bloginfo('template_directory'); ?>/images/certificate-shape.png') no-repeat">
                                            <p>10%</p>
                                        </div>
                                    </div>
                                </a>
                                <div class='modDetails'>
                                    <a href="#"><h2>title</h2></a>
                                    <h3>Price : $ 10</h3>
                                </div>
                                <button type="submit" name="addcart" class='add_cart' onclick="<?php $capnum=$capnum+1;?>">
                                    <i class='fa fa-shopping-basket'></i>ADD TO CART
                                </button>
                            </div>
                        </div>
                        <div class="modItem">
                            <div class="item">
                                <a href="#">
                                    <div class="modImg">
                                        <img src="{{ $base_url }}/images/pic01.jpg" alt="">
                                        <div class="dis_value" style="background: url('<?php bloginfo('template_directory'); ?>/images/certificate-shape.png') no-repeat">
                                            <p>10%</p>
                                        </div>
                                    </div>
                                </a>
                                <div class='modDetails'>
                                    <a href="#"><h2>title</h2></a>
                                    <h3>Price : $ 10</h3>
                                </div>
                                <button type="submit" name="addcart" class='add_cart' onclick="<?php $capnum=$capnum+1;?>">
                                    <i class='fa fa-shopping-basket'></i>ADD TO CART
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="module so-deals">
                    <h3 class="modtitle colorh3"><span class="icon-color">Hot Deals</span></h3>
                    <div class="modcontent">
                        <div class="modItem">
                            <div class="item">
                                <a href="#">
                                    <div class="modImg">
                                        <img src="{{ $base_url }}/images/pic01.jpg" alt="">
                                        <div class="dis_value" style="background: url('<?php bloginfo('template_directory'); ?>/images/certificate-shape.png') no-repeat">
                                            <p>10%</p>
                                        </div>
                                    </div>
                                </a>
                                <div class='modDetails'>
                                    <a href="#"><h2>title</h2></a>
                                    <h3>Price : $ 10</h3>
                                </div>
                                <button type="submit" name="addcart" class='add_cart' onclick="<?php $capnum=$capnum+1;?>">
                                    <i class='fa fa-shopping-basket'></i>ADD TO CART
                                </button>
                            </div>
                        </div>
                        <div class="modItem">
                            <div class="item">
                                <a href="#">
                                    <div class="modImg">
                                        <img src="{{ $base_url }}/images/pic01.jpg" alt="">
                                        <div class="dis_value" style="background: url('<?php bloginfo('template_directory'); ?>/images/certificate-shape.png') no-repeat">
                                            <p>10%</p>
                                        </div>
                                    </div>
                                </a>
                                <div class='modDetails'>
                                    <a href="#"><h2>title</h2></a>
                                    <h3>Price : $ 10</h3>
                                </div>
                                <button type="submit" name="addcart" class='add_cart' onclick="<?php $capnum=$capnum+1;?>">
                                    <i class='fa fa-shopping-basket'></i>ADD TO CART
                                </button>
                            </div>
                        </div>
                        <div class="modItem">
                            <div class="item">
                                <a href="#">
                                    <div class="modImg">
                                        <img src="{{ $base_url }}/images/pic01.jpg" alt="">
                                        <div class="dis_value" style="background: url('<?php bloginfo('template_directory'); ?>/images/certificate-shape.png') no-repeat">
                                            <p>10%</p>
                                        </div>
                                    </div>
                                </a>
                                <div class='modDetails'>
                                    <a href="#"><h2>title</h2></a>
                                    <h3>Price : $ 10</h3>
                                </div>
                                <button type="submit" name="addcart" class='add_cart' onclick="<?php $capnum=$capnum+1;?>">
                                    <i class='fa fa-shopping-basket'></i>ADD TO CART
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer id="footer_wrapper">
        <div class="footerContainer">
            <div class="footer">
                <div class="foot01">
                    <h1>Need Help?</h1>
                    <ul>
                        <li>Call us anytime from:</li>
                        <li>9.00am - 8.00pm</li>
                        <li>070 392 187</li>
                        <li>011 286 191</li>
                        <li>Email: theavytep18@gmail.com</li>
                    </ul>
                </div>
                <div class="foot01">
                    <h1>Information</h1>
                    <ul>
                        <li>FAQ</li>
                        <li>About Organic Shop</li>
                        <li>Deliver Information</li>
                        <li>Privacy Policy</li>
                        <li>Term & Conditions</li>
                    </ul>
                </div>
                <div class="foot01">
                    <h1>My Account</h1>
                    <ul>
                        <li>My Account</li>
                        <li>Order History</li>
                        <li>WIsh Lists</li>
                        <li>Newsletter</li>
                    </ul>
                </div>
                <div class="foot01">
                    <h1>Keep In Touch On</h1>
                </div>
            </div>
            <div class="cpRight">
                <p>© 2017 Made with Love & Inspiration from Phnom Penh</p>
            </div>
        </div>
    </footer>
</div>
<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
<script>
    window.jQuery || document.write('<script src="{{ $base_url }}/js/vendor/jquery-3.1.0.min.js"><\/script>')
</script>
<script src="{{ $base_url }}/js/main.js"></script>
</body>

</html>