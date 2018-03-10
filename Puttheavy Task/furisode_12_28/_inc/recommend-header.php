 <div id="shopListWrapper">
        
        <div class="shopWrap">
            <div class="navLink">
                 <?php if (function_exists('qt_custom_breadcrumbs')) qt_custom_breadcrumbs(); ?>
            </div>
            <div class="headShortList">
                <img src="<?php echo get_template_directory_uri() ?>/images/pc/shoplist/shop_list.png">
                <h1>福岡県のショップ一覧</h1>
            </div>
            <h2 id="searchShop">SEARCH FOR SHOP</h2>
        </div>
        
        <section id="searchBox">
            <article class="searchLeft">
                <h4>絞込み検索</h4>
                <div class="searchDropdown">
                    <select>
                        <option>福岡</option>
                        <option>福岡</option>
                        <option>福岡</option>
                    </select> <span>x</span>
                    <input type="text" name="searchShop" placeholder="フリーワード">
                    <br />
                </div>
                <div class="searchRadio">
                    <input type="radio" name="rdoSearch"> 無料カタログ請求
                    <br class="sp" />
                    <input type="radio" name="rdoSearch"> 予約キャンペーン
                    <br />
                    <input type="radio" name="rdoSearch"> 無料カタログ請求
                    <br class="sp" />
                    <input type="radio" name="rdoSearch"> 予約キャンペーン
                </div>
                <form class="leftSearchBtn">
                    <input type="text" name="searchbtn">
                    <button type="submit" name="searchsubmit"><i class="fa fa-search fa-2x"></i></button>
                </form>
            </article>
            <article class="searchRight">
                <h4>エリア検索</h4>
                <div class="searchSite">
                    <a href="#">福岡・飯塚</a>
                    <a href="#">北九州・筑穂</a>
                    <a href="#">久留米・筑後</a>
                    <a href="#">福岡・飯塚</a>
                </div>
            </article>
        </section>