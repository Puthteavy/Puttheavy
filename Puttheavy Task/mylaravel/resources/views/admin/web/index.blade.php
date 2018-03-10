@extends('web.index')
@php
    $base_url = asset('web');
@endphp
@section('css_style')

    <link rel="stylesheet" href="{{ $base_url }}/css/normalize.css">
    <link rel="stylesheet" href="{{ $base_url }}/css/main.css">
    <link rel="stylesheet" href="{{ $base_url }}/css/responsive.css">
    <link rel="stylesheet" href="{{ $base_url }}/css/swiper.min.css">
@endsection
@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="{{ $base_url }}/js/swiper.min.js"></script>
    <script src="{{ $base_url }}js/main.js"></script>
    <script type="text/javascript" src="{{ $base_url }}/js/sp_slide.js"></script>
@endsection
@section('header')
    <nav id="topNavWrapper">
        <ul id="topNav">
            <li><a href="#"><span>Top</span></a></li>
            <li><a href="#"><span>Shop</span></a></li>
            <li><a href="#"><h1><img src="{{ $base_url }}/images/pc/main/logo.png" alt="Furisode"></h1></a></li>
            <li><a href="#"><span>Furisode</span></a></li>
            <li><a href="#"><span>Event</span></a></li>
        </ul>
    </nav>

@endsection
@section('container')
    <section id="search">
        <div class="contentSearch">
            <div class="searchImageBlock sp">
                <div class="searchImg01"><img src="{{ $base_url }}/images/pc/main/search_img.png" alt=""></div>
            </div>
            <div class="searchTitleBlock">
                <div class="searchTitle">
                    <h2><img src="{{ $base_url }}/images/pc/main/title_shop.png" alt=""></h2>
                    <p>地域から店舗を探す</p>
                </div>
                <div class="locationIcon"><img src="{{ $base_url }}/images/pc/main/SEARCH.png"></div>
                <div class="searchOption">
                    <select name="option01" class="selection">
                        <option value="val1">北海道・東北　</option>
                        <option value="val1">北海道・東北　</option>
                    </select>
                    <select name="option02" class="selection">
                        <option value="val1">関東</option>
                        <option value="val1">関東</option>
                    </select>
                    <select name="option03" class="selection">
                        <option value="val1">中部</option>
                        <option value="val1">中部</option>
                    </select>
                    <select name="option04" class="selection">
                        <option value="val1">北陸</option>
                        <option value="val1">北陸</option>
                    </select>
                    <select name="option05" class="selection">
                        <option value="val1">関西</option>
                        <option value="val1">関西</option>
                    </select>
                    <select name="option01" class="selection">
                        <option value="val1">中国</option>
                        <option value="val1">中国</option>
                    </select>
                    <select name="option01" class="selection">
                        <option value="val1">四国</option>
                        <option value="val1">四国</option>
                    </select>
                    <select name="option01" class="selection">
                        <option value="val1">九州・沖縄</option>
                        <option value="val1">九州・沖縄</option>
                    </select>
                </div>
            </div>
            <div class="searchImageBlock pc">
                <div class="searchImg01"><img src="{{ $base_url }}/images/pc/main/search_img.png" alt=""></div>
            </div>
        </div>
    </section>
    <section id="recommend">
        <div class="contentRecommend">
            <div class="sp recSlide">
                <div class="swiper1 swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide recImg"><img src="{{ $base_url }}/images/pc/main/rec_img01.png" alt=""></div>
                        <div class="swiper-slide recImg"><img src="{{ $base_url }}/images/pc/main/rec_img01.png" alt=""></div>
                        <div class="swiper-slide recImg"><img src="{{ $base_url }}/images/pc/main/rec_img01.png" alt=""></div>
                        <div class="swiper-slide recImg"><img src="{{ $base_url }}/images/pc/main/rec_img01.png" alt=""></div>
                        <div class="swiper-slide recImg"><img src="{{ $base_url }}/images/pc/main/rec_img02.png" alt=""></div>
                        <div class="swiper-slide recImg"><img src="{{ $base_url }}/images/pc/main/rec_img01.png" alt=""></div>
                        <div class="swiper-slide recImg"><img src="{{ $base_url }}/images/pc/main/rec_img01.png" alt=""></div>
                        <div class="swiper-slide recImg"><img src="{{ $base_url }}/images/pc/main/rec_img01.png" alt=""></div>
                        <div class="swiper-slide recImg"><img src="{{ $base_url }}/images/pc/main/rec_img03.png" alt=""></div>
                    </div>
                </div>
                <div class="recPrevious swiper-button-prev"></div>
                <div class="recNext swiper-button-next"></div>
            </div>
            <div class="recommendImage pc">
                <div class="recImg"><img src="{{ $base_url }}/images/pc/main/rec_img01.png" alt=""></div>
                <div class="recImg"><img src="{{ $base_url }}/images/pc/main/rec_img01.png" alt=""></div>
                <div class="recImg"><img src="{{ $base_url }}/images/pc/main/rec_img01.png" alt=""></div>
                <div class="recImg"><img src="{{ $base_url }}/images/pc/main/rec_img01.png" alt=""></div>
                <div class="recImg"><img src="{{ $base_url }}/images/pc/main/rec_img02.png" alt=""></div>
                <div class="recImg"><img src="{{ $base_url }}/images/pc/main/rec_img01.png" alt=""></div>
                <div class="recImg"><img src="{{ $base_url }}/images/pc/main/rec_img01.png" alt=""></div>
                <div class="recImg"><img src="{{ $base_url }}/images/pc/main/rec_img01.png" alt=""></div>
                <div class="recImg"><img src="{{ $base_url }}/images/pc/main/rec_img03.png" alt=""></div>
            </div>
            <div class="recommendTitle">
                <div class="recTitle">
                    <div class="recPcTitle pc">
                        <h2><img src="{{ $base_url }}/images/pc/main/title_recomment.png" alt=""></h2></div>
                    <div class="recSpTitle sp">
                        <h2><img src="{{ $base_url }}/images/sp/main/recommend_sp.png" alt=""></h2></div>
                    <p>厳選店ピックアップ</p>
                </div>
                <div class="recommendIcon"><img src="{{ $base_url }}/images/pc/main/RECOMMENDED.png" alt=""></div>
                <div class="recShopList">
                    <a href=""><img src="{{ $base_url }}/images/pc/main/shop_btn01.png" alt=""></a>
                </div>
            </div>
        </div>
    </section>
    <section id="ranking">
        <div class="contentRanking">
            <div class="rankSlide sp">
                <div class="swiper2 swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide rankImg"><img src="{{ $base_url }}/images/pc/main/rank_img01.png" alt=""></div>
                        <div class="swiper-slide rankImg"><img src="{{ $base_url }}/images/pc/main/rank_img01.png" alt=""></div>
                        <div class="swiper-slide rankImg"><img src="{{ $base_url }}/images/pc/main/rank_img01.png" alt=""></div>
                        <div class="swiper-slide rankImg"><img src="{{ $base_url }}/images/pc/main/rank_img01.png" alt=""></div>
                        <div class="swiper-slide rankImg"><img src="{{ $base_url }}/images/pc/main/rank_img01.png" alt=""></div>
                        <div class="swiper-slide rankImg"><img src="{{ $base_url }}/images/pc/main/ranking_img02.png" alt=""></div>
                    </div>
                </div>
                <div class="rankPrevious swiper-button-prev"></div>
                <div class="rankNext swiper-button-next"></div>
            </div>
            <div class="rankingTitle">
                <div class="rankTitle">
                    <h2><img src="{{ $base_url }}/images/pc/main/title_ranking.png" alt=""></h2>
                    <p>振袖から店舗を探す</p>
                </div>
                <div class="rankingIcon"><img src="{{ $base_url }}/images/pc/main/RANKING.png" alt=""></div>
                <div class="rankingOption">
                    <select name="option01" class="rankSelect">
                        <option value="val1">北海道・東北　</option>
                        <option value="val1">北海道・東北　</option>
                    </select>
                    <select name="option02" class="rankSelect">
                        <option value="val1">関東</option>
                        <option value="val1">関東</option>
                    </select>
                    <select name="option03" class="rankSelect">
                        <option value="val1">中部</option>
                        <option value="val1">中部</option>
                    </select>
                </div>
                <div class="search">
                    <form>
                        <input type="text" id="searchItem" placeholder="Search ">
                        <!-- <button type="submit" id="submit"></button> -->
                        <button type="submit" id="submit" name="searchsubmit"><i class="fa fa-search fa-2x"></i></button>
                    </form>
                </div>
            </div>
            <div class="rankingImage pc">
                <div class="rankImg"><img src="{{ $base_url }}/images/pc/main/rank_img01.png" alt=""></div>
                <div class="rankImg"><img src="{{ $base_url }}/images/pc/main/rank_img01.png" alt=""></div>
                <div class="rankImg"><img src="{{ $base_url }}/images/pc/main/rank_img01.png" alt=""></div>
                <div class="rankImg"><img src="{{ $base_url }}/images/pc/main/rank_img01.png" alt=""></div>
                <div class="rankImg"><img src="{{ $base_url }}/images/pc/main/rank_img01.png" alt=""></div>
                <div class="rankImg"><img src="{{ $base_url }}/images/pc/main/ranking_img02.png" alt=""></div>
            </div>
        </div>
    </section>
    <section id="movie">
        <div class="contentMovie">
            <div class="movieTitle">
                <h2><img src="{{ $base_url }}/images/pc/main/movie.png" alt=""></h2></div>
            <div class="movieBlog">
                <div class="movieBox">
                    <div class="movieImg"><img src="{{ $base_url }}/images/pc/main/movie_img01.png" alt=""></div>
                    <div class="movieDetail">
                        <h3>振袖マナー特集</h3>
                        <p>あういえおあういえおあういえおあういえおあういえおあういえおあういえおあういえおあういえおあういえおあういえおあうい えおあういえおあういえおあういえおあういえおあういえおあういえおあういえおあういえおあういえおあういえおあういえおあういえ おあういえおあういえおあういえおあういえおあういえおあういえおあういえおあう
                        </p>
                    </div>
                </div>
                <div class="movieBox">
                    <div class="movieImg"><img src="{{ $base_url }}/images/pc/main/movie_img01.png" alt=""></div>
                    <div class="movieDetail">
                        <h3>振袖マナー特集</h3>
                        <p>あういえおあういえおあういえおあういえおあういえおあういえおあういえおあういえおあういえおあういえおあういえおあうい えおあういえおあういえおあういえおあういえおあういえおあういえおあういえおあういえおあういえおあういえおあういえおあういえ おあういえおあういえおあういえおあういえおあういえおあういえおあういえおあう
                        </p>
                    </div>
                </div>
                <div class="movieBox">
                    <div class="movieImg"><img src="{{ $base_url }}/images/pc/main/movie_img01.png" alt=""></div>
                    <div class="movieDetail">
                        <h3>振袖マナー特集</h3>
                        <p>あういえおあういえおあういえおあういえおあういえおあういえおあういえおあういえおあういえおあういえおあういえおあうい えおあういえおあういえおあういえおあういえおあういえおあういえおあういえおあういえおあういえおあういえおあういえおあういえ おあういえおあういえおあういえおあういえおあういえおあういえおあういえおあう
                        </p>
                    </div>
                </div>
            </div>
            <div class="movieBtn">
                <a href="#"><img src="{{ $base_url }}/images/pc/main/movie_content.png" alt=""></a>
            </div>
        </div>
    </section>
    <div class="eventNewsWrap">
        <div class="conetnEventNewsWrap">
            <section id="event">
                <div class="eventBlog">
                    <div class="enTitle">
                        <h2><img src="{{ $base_url }}/images/pc/main/title_event.png" class="eventTitle" alt=""></h2>
                        <p>イベント情報</p>
                    </div>
                    <div class="enBox">
                        <div class="enImg"><img src="{{ $base_url }}/images/pc/main/event_img01.png" alt=""></div>
                        <div class="enDetail">
                            <h3>神戸</h3>
                            <h4>キモノハーツ　神戸</h4>
                            <p>2017/03/15
                                <br>店舗情報更新致しました。</p>
                        </div>
                    </div>
                    <div class="enBox">
                        <div class="enImg"><img src="{{ $base_url }}/images/pc/main/event_img01.png" alt=""></div>
                        <div class="enDetail">
                            <h3>神戸</h3>
                            <h4>キモノハーツ　神戸</h4>
                            <p>2017/03/15
                                <br>店舗情報更新致しました。</p>
                        </div>
                    </div>
                    <div class="enBox">
                        <div class="enImg"><img src="{{ $base_url }}/images/pc/main/event_img01.png" alt=""></div>
                        <div class="enDetail">
                            <h3>神戸</h3>
                            <h4>キモノハーツ　神戸</h4>
                            <p>2017/03/15
                                <br>店舗情報更新致しました。</p>
                        </div>
                    </div>
                    <div class="eventBtn">
                        <a href="#"><img src="{{ $base_url }}/images/pc/main/event_btn01.png" alt=""></a>
                    </div>
                </div>
            </section>
            <section id="news">
                <div class="newsBlog">
                    <div class="enTitle">
                        <h2><img src="{{ $base_url }}/images/pc/main/title_new.png" class="newsTitle" alt=""></h2>
                        <p>新着情報</p>
                    </div>
                    <div class="enBox">
                        <div class="enImg"><img src="{{ $base_url }}/images/pc/main/event_img01.png" alt=""></div>
                        <div class="enDetail">
                            <h3>神戸</h3>
                            <h4>キモノハーツ　神戸</h4>
                            <p>2017/03/15
                                <br>店舗情報更新致しました。</p>
                        </div>
                    </div>
                    <div class="enBox">
                        <div class="enImg"><img src="{{ $base_url }}/images/pc/main/event_img01.png" alt=""></div>
                        <div class="enDetail">
                            <h3>神戸</h3>
                            <h4>キモノハーツ　神戸</h4>
                            <p>2017/03/15
                                <br>店舗情報更新致しました。</p>
                        </div>
                    </div>
                    <div class="enBox">
                        <div class="enImg"><img src="{{ $base_url }}/images/pc/main/event_img01.png" alt=""></div>
                        <div class="enDetail">
                            <h3>神戸</h3>
                            <h4>キモノハーツ　神戸</h4>
                            <p>2017/03/15
                                <br>店舗情報更新致しました。</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
@section('footer')
    <div class="footerContent">
        <div class="foot">
            <div class="cbox">
                <div class="ftmIcon sp">
                    <div class="icon"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></div>
                    <div class="icon"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></div>
                    <div class="icon"><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a></div>
                </div>
                <div class="toTopLogo"><img src="{{ $base_url }}/images/pc/main/logo.png" alt=""></div>
                <div class="ftmIcon pc">
                    <div class="icon"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></div>
                    <div class="icon"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></div>
                    <div class="icon"><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a></div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="contentFooter">
                <div class="footMenu">
                    <ul class="menuFooter">
                        <li><a href="#">top</a><span> / </span></li>
                        <li><a href="#">shop</a><span> / </span></li>
                        <li><a href="#">forisode</a><span> / </span></li>
                        <li><a href="#">contents</a></li>
                    </ul>
                </div>
                <div class="footBox pc">
                    <label>管理店舗ログイン</label>
                    <input type="text" name="id" class="textBox" placeholder="ID">
                    <input type="text" name="id" placeholder="PASS" class="textBox">
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="lCopyright pc">
                <p>&copy; 2017振袖サーチ All Right Reserved.</p>
            </div>
            <div class="rCopyright">
                <ul>
                    <li>利用規約</li>
                    <li>新規店舗登録</li>
                    <li>お問合わせ</li>
                </ul>
            </div>
            <div class="lCopyright sp">
                <p>&copy; 2017振袖サーチ All Right Reserved.</p>
            </div>
        </div>
    </div>
@endsection