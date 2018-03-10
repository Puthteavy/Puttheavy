<?php
    header('Cache-Control: no cache'); //no cache

    session_cache_limiter('private, must-revalidate');
    session_cache_expire(60);
    session_start();
   if(isset($_POST['submit'])){

       // first shop id

        $id=$_POST['idpost'];
        $_SESSION['currentPost']=$id;
      
        $title_s = $_POST['title_s'];
        $_SESSION['title_s'] =$title_s;
    
 
    //  get value from catalog from

        $cat_name = $_POST['cat_name'];
        $cat_namePhonetic=$_POST['cat_namePhonetic'];
        $cat_year=$_POST['cat_year'];
        $cat_month=$_POST['cat_month'];
        $cat_postcode=$_POST['cat_postcode'];
        $cat_prefecter=$_POST['cat_prefecter'];
        $cat_address1=$_POST['cat_address1'];
        $cat_address2=$_POST['cat_address2'];
        $cat_phone=$_POST['cat_phone'];
        $cat_email=$_POST['cat_email'];
        $cat_residence=$_POST['cat_residence'];
        $cat_reguest=$_POST['cat_reguest'];
        // session store
        $_SESSION['cat_name']=$cat_name;
        $_SESSION['cat_namePhonetic']=$cat_namePhonetic;
        $_SESSION['cat_year']=$cat_year;
        $_SESSION['cat_month']=$cat_month;
        $_SESSION['cat_postcode']=$cat_postcode;
        $_SESSION['catPrefecter']=$cat_prefecter;
        $_SESSION['cat_address1']=$cat_address1;
        $_SESSION['cat_address2']=$cat_address2;
        $_SESSION['cat_phone']=$cat_phone;
        $_SESSION['cat_email']=$cat_email;
        $_SESSION['cat_residence']=$cat_residence;
        $_SESSION['cat_reguest']=$cat_reguest;

        // complete page get id last post
        $subids = $_POST['idposts'];
        $_SESSION['idposts']=$subids;
      
        // title of sample catalog 
        $gettitle =$_POST ['gettitle'];
        $_SESSION['shoptitle'] = $gettitle;
       
        
        echo '<br>';

        if (!isset($_SESSION['id_array'])) {
            $_SESSION['id_array'] = array();
        }
        array_push($_SESSION['id_array'],$_POST['idposts']);
    
        require_once 'catmail.php';
        

    }
   
    
  
?>


<?php get_header(); ?>

    <div class="CatalogMail">
        <div class="catThank">
            <?php
                $catObj = get_category_by_slug($cat_prefecter); 
                $catName = $catObj->name;
                $idShop = get_the_title($id);
                $subidShop = get_the_title($subids);
                
            ?>

            
            <?php
             if($id != ''){?>
                <h1> 「 <?php echo $idShop ?>」 のカタログを申し込んだ人が他に申し込んだカタログ</h1>
            <?php }else{?>
                <h1> 「 <?php echo $subidShop ?>」 のカタログを申し込んだ人が他に申し込んだカタログ</h1>
            <?php }  ?>
            <div class="borderCat">
                <h2>
                    あなたにおすすめの <span class="catPrefecter">「<?php echo $catName; ?> 」</span> に送れる他のカタログも もらっちゃおう★ 情報が自動入力されているから申し込みが簡単♪
               </h2>

               <?php 
                    $args = array(
                       
                        'post_type' => 'post',
                        'posts_per_page' => -1,
                        'category_name' =>$cat_prefecter,
                        'offset' => $_SESSION['id_array'],
                        'post__not_in' =>$_SESSION['id_array'],

                    
                    );
                    $query = new WP_Query($args);
                    $count = $query->post_count; 
                    

                ?>
                
                <?php if( have_posts() ) : ?>
                    <?php while ($query->have_posts()): $query->the_post(); ?>
                        <!-- sample catalog from prefecture -->
                        <?php 
                            $getId=get_the_ID();
                             $_SESSION['subid'] = $getId;
                             $getTitle=get_the_title($getId);
                          
                             $images= get_field('catalog_image');
                             //echo $getId;
                           
                        ?>
                        
                            <button type="submit" name="cattext" id="cattext" class="subCatalogImage">
                                <div class="catImageRecommend">
                                  <p><?php the_title();?></p>
                                    
                                        <?php if( get_field('catalog_image') != ''):?>
                                        <?php
                                            $maxnum =1;
                                            $images = acf_photo_gallery('catalog_image', $post->ID);
                                            $count=0;
                                            if($images):
                                                foreach($images as $image):
                                                    $count ++;
                                                    if ($count > $maxnum) {break; }
                                                    
                                                        $id = $image['id']; 
                                                        $title = $image['title']; 
                                                        $caption= $image['caption']; 
                                                        $full_image_url= $image['full_image_url']; 
                                                        $full_image_url = acf_photo_gallery_resize_image($full_image_url); 
                                                        $thumbnail_image_url= $image['thumbnail_image_url']; 
                                                        $url= $image['url']; 
                                                        $target= $image['target'];
                                                        $alt = get_field('photo_gallery_alt', $id); 
                                                        $class = get_field('photo_gallery_class', $id); 
                                        ?> 
                                            <div class="catImage"><img src="<?php echo $image['full_image_url']; ?>"/></div>
                                            <?php endforeach; endif; ?>
                                        <?php else: ?>
                                            <div class="catImage">
                                                <img src="<?php echo get_template_directory_uri(); ?>/images/pc/main/rank_img01.png" alt="">
                                            </div>
                                        <?php endif; ?>
                                </div>
                            </button>
                       
                <?php //wp_reset_postdata(); ?>
                <!--  -->
                                        
                        <div id="id01" class="w3-modal">
                                    
                            <div class="w3-modal-content">
                                <div class="w3-container">
                                    <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                    <div class="modelTitle"><h2>入力した情報を確認</h2></div>
                                    <div class="submitModel">

                                        <?php
                                          $cName = isset($_SESSION['cat_name']) ? $_SESSION['cat_name'] : '';
                                          $cPhonitic = isset($_SESSION['cat_namePhonetic']) ? $_SESSION['cat_namePhonetic'] : '';
                                          $cYear = isset($_SESSION['cat_year']) ? $_SESSION['cat_year'] : '';
                                          $cMonth = isset($_SESSION['cat_month']) ? $_SESSION['cat_month'] : '';
                                          $cPostcode = isset($_SESSION['cat_postcode']) ? $_SESSION['cat_postcode'] : '';

                                          $cPrefecter = isset($_SESSION['catPrefecter']) ? $_SESSION['catPrefecter'] : '';
                                          $cAdd1 = isset($_SESSION['cat_address1']) ? $_SESSION['cat_address1'] : '';
                                          $cAdd2 = isset($_SESSION['cat_address2']) ? $_SESSION['cat_address2'] : '';
                                          $cPhone = isset($_SESSION['cat_phone']) ? $_SESSION['cat_phone'] : '';
                                          $cEmail = isset($_SESSION['cat_email']) ? $_SESSION['cat_email'] : '';
                                          $cResidence = isset($_SESSION['cat_residence']) ? $_SESSION['cat_residence'] : '';
                                          $cRequest = isset($_SESSION['cat_reguest']) ? $_SESSION['cat_reguest'] : '';
                                         
                                        ?>

                                        <p>ウェブ来店予約はまだ完了していません。 以下の内容でよろしければ「来店予約を申し込む」を押してください。</p>
                                        <div class="modelTable">
                                           <?php //echo $getId; ?>
                                            <table>
                                                <tr>
                                                    <td><b>カタログのお届け</b></td>
                                                    <td><label>郵送で受け取る</label></td>

                                                </tr>
                                                <tr>
                                                    <td>郵送カタログ見本 <span>(クリックで拡大)</span></td>
                                                    <td>
                                                    
                                                        <label>
                                                           <!-- <img src="<?php echo $images; ?>" alt="" style="width: 115px; height: auto;"> --> 
                                                            <?php if( get_field('catalog_image') != ''):?>
                                                                <?php
                                                                    $maxnum =1;
                                                                    $images = acf_photo_gallery('catalog_image', $post->ID);
                                                                    $count=0;
                                                                    if($images):
                                                                        foreach($images as $image):
                                                                            $count ++;
                                                                            if ($count > $maxnum) {break; }
                                                                            
                                                                                $id = $image['id']; 
                                                                                $title = $image['title']; 
                                                                                $caption= $image['caption']; 
                                                                                $full_image_url= $image['full_image_url']; 
                                                                                $full_image_url = acf_photo_gallery_resize_image($full_image_url); 
                                                                                $thumbnail_image_url= $image['thumbnail_image_url']; 
                                                                                $url= $image['url']; 
                                                                                $target= $image['target'];
                                                                                $alt = get_field('photo_gallery_alt', $id); 
                                                                                $class = get_field('photo_gallery_class', $id); 
                                                                ?> 
                                                                    <div class="catImages"><img src="<?php echo $image['full_image_url']; ?>"/></div>
                                                                    <?php endforeach; endif; ?>
                                                                <?php else: ?>
                                                                    <div class="catImages">
                                                                        <img src="<?php echo get_template_directory_uri(); ?>/images/pc/main/rank_img01.png" alt="">
                                                                    </div>
                                                                <?php endif; ?>
                                                           	
                                                        </label>
                                                   
                                                    </td>
                                                <?php wp_reset_postdata(); ?>
                                                </tr>
                                                <tr>
                                                    <td><b>お名前</b></td>
                                                    <td><label id="getCatname"><?php echo $cName;?></label>   </td>
                                                </tr>
                                                <tr>
                                                    <td>お名前(フリガナ)</td>
                                                    <td><label id="getPhoniticname"><?php echo $cPhonitic;?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>生年月</b></td>
                                                    <td>
                                                        <label id="getYear">年<?php echo $cYear; ?></label> 
                                                        <label id="getMonth">月<?php echo $cMonth; ?></label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b>郵便番号</b></td>
                                                    <td><label id="getPostCode">〒<?php echo $cPostcode; ?></label></td>
                                                </tr>
                                                
                                                <tr>
                                                    <td><b>住所</b></td>
                                                    <td>
                                                        <label id="getPrefecture"><?php echo $cPrefecter; ?></label>
                                                        <label id="getadd1"><?php echo $cAdd1;  ?></label>
                                                        <label id="getadd2"><?php echo $cAdd2; ?></label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b>電話番号</b></td>
                                                    <td><label id="getPhone"><?php echo $cPhone; ?></label></td>
                                                </tr>
                                                <tr>
                                                    <td><b>メールアドレス</b></td>
                                                    <td><label id="getEmail"><?php echo $cEmail; ?></label></td>
                                                </tr>
                                                <tr>
                                                    <td><b>お住まい</b></td>
                                                    <td><label id="getResidence"><?php echo $cResidence;  ?></label></td>
                                                </tr>
                                                <tr>
                                                    <td><b>その他要望</b></td>
                                                    <td><label id="getrequests"><?php echo $cRequest; ?></label></td>
                                                </tr>
                                                 
                                            </table>
                                        </div>
                                   </div> 
                                    
                                </div>
                            </div>

                            <form action="<?php the_permalink(); ?>" method="post">

                                <input type="hidden" name="cat_name" id="cat_name" value="<?php echo $cName; ?>">
                                <input type="hidden" name="cat_namePhonetic" id="cat_namePhonetic" value="<?php echo $cPhonitic; ?>">
                                <input type="hidden" name="cat_year" id="cat_year" value="<?php echo $cYear; ?>">
                                <input type="hidden" name="cat_month" id="cat_month" value="<?php echo $cMonth; ?>">
                                <input type="hidden" name="cat_postcode" id="cat_postcode" value="<?php echo $cPostcode; ?>">
                                <input type="hidden" name="cat_prefecter" id="cat_prefecter" value="<?php echo $cPrefecter;?>">
                                <input type="hidden" name="cat_address1" id="cat_address1" value="<?php echo $cAdd1; ?>">
                                <input type="hidden" name="cat_address2" id="cat_address2" value="<?php echo $cAdd2; ?>">
                                <input type="hidden" name="cat_phone" id="cat_phone" value="<?php echo $cPhone; ?>">
                                <input type="hidden" name="cat_email" id="cat_email" value="<?php echo $cEmail; ?>">
                                <input type="hidden" name="cat_residence" id="cat_residence" value="<?php echo $cResidence; ?>">
                                <input type="hidden" name="cat_reguest" id="cat_reguest" value="<?php echo $cRequest; ?>">  
                                

                                <input type="hidden" name="idposts" id="idposts" value="<?php echo $getId; ?>">
                                
                                <input type="hidden" name="gettitle" id="gettitle" value="<?php echo $getTitle; ?>">
                                
                                <input type="hidden" name="lastTitle" id="lastTitle" value="<?php echo $idShop; ?>">
                                
                                <div class="btn">
                                    <a id="cancel" href="javascript:void(0)" class="btnimg">
                                      <img src="<?php echo get_template_directory_uri(); ?>/images/pc/main/mfp_cancel.gif">

                                    </a>
                                    <button type="submit" name="submit" id="send" class="btnimg">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/pc/main/mfp_send.gif">
                                    </button>
                                </div>
                            </form>
                        </div>

                <?php endwhile; endif;?> 
                <?php if ($count == 0 ){?>
                    <div class="empty">
                        <p>Catalog Sample is Empty </p>
                    </div>
                <?php }?>
                <?php wp_reset_query(); ?>
            </div>   
        </div>      
    </div> 
</div>
<!-- model  -->



<script type="text/javascript">
    $(function(){
       
       $('a[id^="cancel"]').click(function (e) {
            e.preventDefault();

            $('div[id^="id01"]').css("display", "none");
        
        });
       $('button[id^="cattext"]').click(function(e){
          $(this).next($('#id01')).css("display", "block");

              <?php echo $getId; ?>

       });

        
    });

    function getModalBox(postId) {
        $('#id01').css("display", "block");
        console.log(postId);
        return postId;
    }
</script> 
<?php get_footer(); ?>
