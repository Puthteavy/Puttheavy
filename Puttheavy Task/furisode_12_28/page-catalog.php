<?php
   
    header('Cache-Control: no cache'); //no cache
    session_cache_limiter('private, must-revalidate');
    session_cache_expire(60);
    
    session_start();
    if(isset($_POST['catalog']))
    {  

        $postid = $_POST['postid'];
        $_SESSION['postid']=$postid;
        
        $image=$_POST['catImg'];
        // echo $postid;

    
    }

 ?>
<?php $title=get_the_title($postid) ;?>

<?php get_header(); ?>
 <?php 
 $args = array(
  'p'         => $postid,
  'post_type' => 'any',
  'posts_per_page' => 1
);
query_posts($args);
while (have_posts()): the_post(); ?>

    <div class="entry-content-page">
        <div class="shopWrap">
            <div class="navLink">
                <?php if (function_exists('qt_custom_breadcrumbs')) qt_custom_breadcrumbs(); ?>
            </div>
            <div class="inquiryTitle">
                <div class="inTitle">Catalog</div>
                <br>
                <h1>カタログ請求</h1>
            </div>
        </div>
    </div>
    <div class="reserveContainer">
        <div class="reserveShop">
            <h1>「<?php the_title(); ?> 」 のカタログを送ってもらう</h1>
        </div>
        <div class="reserveForm">
            <h2>カタログ受け取り先の情報を入力</h2>
            <div class="catFormtop">
                <h3>このお店のカタログは以下の都道府県に住んでいる、または以下の都道府県で成人式を行う方にお送りします。</h3>
                <div class="catSelectArea">   
                     <?php 
                    
                       $queried_object = get_queried_object(); 
                       $related = get_field('multi_area', $queried_object);
                       if ($related) {
                          foreach ($related as $term) {?>
                            <div class="multi">
                                <?php echo $term->name ?>
                            </div>
                        <?php  } } ?>
                </div>
            </div>

            <form action="" method="post" id="mailform">
                <div class="rsForm">
                    <table class="mailform">
                       <tr id="dvElec">
                           <th><p> 電子カタログ見本 </p> </th>
                           <td class="imgcat">
                               <label id="cat_img" name="cat_img">
                                   <?php if( get_field('catalog_image') != ''):?>
                                    <?php
                                        $maxnum =2;
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
                                    <?php if( !empty($url)){ ?> 
                                        <a href="<?php echo get_field('link_url') ?>" <?php echo ($target == 'true' )? 'target="_blank"': ''; ?>><?php } ?>
                                            <div class="imageCatalog">
                                                <a href="<?php echo $image['full_image_url']; ?>" class="highslide" onclick="return hs.expand(this)">
                                                    <img src="<?php echo $image['full_image_url']; ?>"/>
                                                </a>
                                            </div>
                                    <?php if( !empty($url) ){ ?>
                                        </a><?php } ?>
                                    <?php endforeach; endif; ?> <?php endif;?>
                               </label>
                           </td>
                       </tr>
                        <!-- catalog radio select -->
                        <tr>
                            <th><p>お名前</p><div class="req must">必須</div></th>
                            <td>
                                <input type="text" id="cat_name" name="cat_name" class="mfp size_240">
                                <div id="errormsg_catalog" class="mfp_err">お名前が未入力です。</div>
                                <div class="ex"><span class="example">例</span> 山田　花子</div>
                            </td>
                        </tr>
                        <tr>
                            <th><p>お名前 (ふりがな)</p><div class="req must">必須</div></th>
                            <td>
                                <input type="text" id="cat_namePhonetic" name="cat_namePhonetic" class="mfp size_240">
                                <div id="errormsg_catalog" class="mfp_err">お名前（ふりがな）が未入力です。</div>
                                <div class="ex"><span class="example">例</span> やまだ　はなこ</div>
                            </td>
                        </tr>
                        <tr>
                            <th><p>生年月</p><div class="req must">必須</div></th>
                            <td>
                                <p>振袖を着用する方の生年月を選択してください。</p>
                                    <?php
                                    $date = new DateTime();
                                    $already_selected_value = 1990;
                                    $earliest_year = 1900;
                                    echo '<select name="cat_year" id="cat_year">';
                                    foreach (range(date('Y'), $earliest_year) as $x) {
                                        echo '<option value="'.$x.'"'.($x === $already_selected_value ? ' selected="selected"' : '').'>'.$x.'年</option>';
                                    }
                                    echo '<optgroup label=""></optgroup></select>';
                                    ?>
                                    <select name="cat_month" id="cat_month" class="mfp">
                                        <option value="" selected="selected">月</option>
                                        <option value="1月">1月</option>
                                        <option value="2月">2月</option>
                                        <option value="3月">3月</option>
                                        <option value="4月">4月</option>
                                        <option value="5月">5月</option>
                                        <option value="6月">6月</option>
                                        <option value="7月">7月</option>
                                        <option value="8月">8月</option>
                                        <option value="9月">9月</option>
                                        <option value="10月">10月</option>
                                        <option value="11月">11月</option>
                                        <option value="12月">12月</option>
                                        <optgroup label=""></optgroup>
                                    </select>
                                <div id="errormsg_catalog" class="mfp_err">生年月が選択されていません。</div>
                            </td>
                        </tr>
                        <tr>
                            <th><p>郵便番号</p>  </th> 
                            <td>
                                <p>郵便番号を入力すると、都道府県・市区町村まで自動入力されます。</p>
                                <input type="text" name="cat_postcode" id="cat_postcode" class="nomfp resize_150">
                                <div class="ex"><span class="example">例</span>1234567</div>
                            </td>
                        </tr>
                        <!--  -->
                        <!--  -->
                        <tr>
                            <th><p>都道府県</p><div class="req must">必須</div></th>
                            <td>   
                                <select name="cat_prefecter" id="cat_prefecter" class="mfp size_150"> 
								    <option value="" selected="selected"><?php echo esc_attr(__('選択してください')); ?></option> 
								    <?php 
								        $args = array('exclude' => array(56,55,67,53,66,52,1,60));
        								$categories=get_categories($args);   
								        foreach ($categories as $category) {?>
                                            <option value="<?php echo $category->slug; ?>"><?php echo $category->cat_name?></option>
								        <?php } ?>
								    
                                    <optgroup label=""></optgroup> 
								</select>
								<div id="errormsg_catalog" class="mfp_err">都道府県が選択されていません。</div>
		                    </td>
                        </tr>
                        <tr>
                            <th><p>住所 (市区町村番地)</p><div class="req must">必須</div></th>
                            <td>
                                <input type="text" class="mfp size_240" name="cat_address1" id="cat_address1">
                                <div id="errormsg_catalog" class="mfp_err">住所（市区町村番地）が未入力です。</div>
                                <div class="ex"><span class="example">例</span>渋谷区渋谷○-○-○（番地まで必ず入力してください）</div>
                            </td>
                        </tr>
                        <tr>
                            <th><p>住所2 (マンション・ビル名)</p></th>
                            <td>
                               <input type="text" class="nomfp size_240" name="cat_address2" id="cat_address2">
                                <div class="ex"><span class="example">例</span> ○○ﾏﾝｼｮﾝ123号室</div>
                            </td>
                        </tr>
                        <tr>
                            <th><p>電話番号</p></th>
                            <td>
                                <input type="text" class="nomfp size_240" name="cat_phone" id="cat_phone">
                                <div class="ex"><span class="example">例</span> 0423124034</div>
                            </td>
                        </tr>
                        <tr>
                            <th><p>メールアドレス</p><div class="req must">必須</div></th>
                            <td>
                                <input type="text" class="nomfp size_240" name="cat_email" id="cat_email">
                                <div id="errormsg_email" class="mfp_err_email">invalid</div>
                                <div class="ex"><span class="example">例</span>mail_sec.4@hearts-creative.jp</div>
                            </td>
                        </tr>
                        <tr>
                            <th><p>お住まい</p><div class="req must">必須</div></th>
                            <td>
                                <select name="cat_residence" id="cat_residence" class="mfp">
                                    <option value="" selected="selected">選択してください</option>
                                    <option value="実家">実家</option>
                                    <option value="一人暮らし">一人暮らし</option>
                                    <optgroup label=""></optgroup>
                                </select>
                                <div id="errormsg_catalog" class="mfp_err">お住いが選択されていません。</div>
                            </td>
                        </tr>
                        <tr>
                            <th><p>その他要望</p></th>
                            <td>
                                <textarea name="cat_reguest" id="cat_reguest" rows="5" cols="60" class="size_360"></textarea>
                                <div class="ex"><span class="example">例</span>宛名は○○○○（娘の名前）にしてください。</div>
                            </td>
                        </tr>
                        
                    </table>

                </div>
                <div class="btn_Reserve">
                    <p>※カタログのお届けには数日かかる場合がございます。ご了承ください。</p>
                    <button type="submit" name="submit" id="btn_reserve" class="w3-button w3-black rsSubmit">無料カタログ請求 ＞</button>
                </div>
            </form>

        </div>
    </div>
 

<!-- model -->
<div id="id01" class="w3-modal">
    <div class="w3-modal-content">
        <div class="w3-container">
            <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
            <div class="modelTitle"><h2>入力した情報を確認</h2></div>
            <div class="submitModel">

                <p>ウェブ来店予約はまだ完了していません。 以下の内容でよろしければ「来店予約を申し込む」を押してください。</p>
                <div class="modelTable">
                    <table>
                        <tr>
                            <td><b>カタログのお届け</b></td>
                            <td>郵送で受け取る</label></td>
                        </tr>
                        <tr>
                            <td>郵送カタログ見本</td>
                            <td>
                                <label>
                                   <!-- <img src="<?php echo $image;?>" style="width: 115px; height: auto;"> -->
                                    <?php if( get_field('catalog_image') != ''):?>
                                    <?php
                                        $maxnum =2;
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
                                    <?php if( !empty($url)){ ?> 
                                        <a href="<?php echo get_field('link_url') ?>" <?php echo ($target == 'true' )? 'target="_blank"': ''; ?>><?php } ?>
                                            <div class="imageCatalog">
                                                <a href="<?php echo $image['full_image_url']; ?>" class="highslide" onclick="return hs.expand(this)">
                                                    <img src="<?php echo $image['full_image_url']; ?>"/>
                                                </a>
                                            </div>
                                    <?php if( !empty($url) ){ ?>
                                        </a><?php } ?>
                                    <?php endforeach; endif; ?> <?php endif;?>
                                </label>                         
                            </td>
                        </tr>
                        <tr>
                            <td><b>お名前</b></td>
                            <td>
                             <label id="getCatname"></label>   
                            </td>
                        </tr>
                        <tr>
                            <td>お名前(フリガナ)</td>
                            <td><label id="getPhoniticname"></td>
                        </tr>
                        <tr>
                            <td><b>生年月</b></td>
                            <td><label id="getYear"></label> <label id="getMonth"></label></td>
                        </tr>
                        <tr>
                            <td><b>郵便番号</b></td>
                            <td><label id="getPostCode"></label></td>
                        </tr>
                        
                        <tr>
                            <td><b>住所</b></td>
                            <td>
                                <label id="getPrefecture"></label>
                                <label id="getadd1"></label> 
                                <label id="getadd2"></label>
                            </td>
                        </tr>
                        <tr>
                            <td><b>電話番号</b></td>
                            <td><label id="getPhone"></label></td>
                        </tr>
                        <tr>
                            <td><b>メールアドレス</b></td>
                            <td><label id="getEmail"></label></td>
                        </tr>
                        <tr>
                            <td><b>お住まい</b></td>
                            <td><label id="getResidence"></label></td>
                        </tr>
                        <tr>
                            <td><b>その他要望</b></td>
                            <td><label id="getrequests"></label></td>
                        </tr>
                        <tr>
                          <td><b>利用規約</b></td>
                          <td><label>振袖サーチの利用規約に準ずる。</label></td>
                        </tr>
                        
                        
                    </table>
                </div>
           </div> 

        </div>
    </div>
    <form action="<?php echo get_home_url('/'); ?>/complete" method="post">
        <input type="hidden" name="cat_name" id="f_cat_name">
        <input type="hidden" name="cat_namePhonetic" id="f_cat_namePhonetic">
        <input type="hidden" name="cat_year" id="f_cat_year">
        <input type="hidden" name="cat_month" id="f_cat_month">
        <input type="hidden" name="cat_postcode" id="f_cat_postcode">
      
        <input type="hidden" name="cat_address1" id="f_cat_address1">
        <input type="hidden" name="cat_address2" id="f_cat_address2">
        <input type="hidden" name="cat_phone" id="f_cat_phone">
        <input type="hidden" name="cat_email" id="f_cat_email">
        <input type="hidden" name="cat_residence" id="f_cat_residence">
        <input type="hidden" name="cat_reguest" id="f_cat_reguest">  
        

        <input type="hidden" name="cat_prefecter" id="f_cat_prefecter">
        <input type="hidden" name="idpost" id="idpost" value="<?php echo $postid; ?>">

        <input type="hidden" name="title_s" id="title_s" value="<?php echo $title; ?>">
        
        
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
 <?php endwhile;?>
<?php wp_reset_query();?>
<!-- end model -->
<script type="text/javascript">
     //radio show hide 
 $(function () {
     $("input[name='chkPassPort']").click(function () {
         if ($("#chkYes").is(":checked")) {
             $("#dvMail").show();
         } else {
             $("#dvMail").hide();
         }
         if ($("#chkNo").is(":checked")) {
           $('#dvElec').show();

         }else{
           $('#dvElec').hide();
         }
     });
 });
              

// postcode
    $(function() {
        $('#reserve_purpose').on('change',function(){
            if( $(this).val()==="val1"){
                $('#text').show();
                $('#date').hide();
            }
            else{
                $('#text').hide();
                $('#date').show();
            }
        });

    });
    // validation
    function isValidEmailAddress(emailAddress)
    {
        var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
        return pattern.test(emailAddress);
    }
    $(function(){

        /* validate email */

        $('#cat_email').on('focusout',function(){
            var email = $('#cat_email').val();
            $('#errormsg_email').html('メールアドレスが未入力です。');
            $('.mfp_err_email').show();
            if(email != '')
            {
                if(!isValidEmailAddress(email))
                {
                    $('#errormsg_email').html('メールアドレスが正しくありません。');
                }
                else
                {
                    $('#errormsg_email').html('');
                    $('.mfp_err_email').hide();
                }
            }
        });
        //error  textbox
        $('.mfp').on('focusout',function(){

            var mfp = $(this).val();

            $(this).next('.mfp_err').show();

            if(mfp != '')
            {
                $(this).next('.mfp_err').hide();
            }

        });
      
//        submit
        $('#btn_reserve').click(function(e) {
            e.preventDefault();
            var error = 0;
            
            $('.mfp').each(function () {
                if ($(this).val() == '') {
                    error++;
                    $(this).next('.mfp_err').show();
                    
                    
                }
            });

            $('#cat_email').each(function () {
                if ($(this).val() == '') {
                    error++;
                    $('#errormsg_email').html('メールアドレスが未入力です。');
                    $(this).next('.mfp_err_email').show();
                }
            });

            

            /* success */
                if(error - 0 == 0)
                {
                   $('#id01').css("display", "block");

                    var cat_name=$('#cat_name').val();
                    var cat_namePhonetic=$('#cat_namePhonetic').val();
                    var cat_year=$('#cat_year').val();
                    var cat_month=$('#cat_month').val();
                    var cat_postcode=$('#cat_postcode').val();
                    var cat_address1=$('#cat_address1').val();
                    var cat_address2=$('#cat_address2').val();
                    var cat_phone=$('#cat_phone').val();
                    var cat_email=$('#cat_email').val();
                    var cat_residence=$('#cat_residence').val();
                    var cat_reguest=$('#cat_reguest').val();
                    var cat_prefecter=$('#cat_prefecter').val();

                    // get input data 
                    $('#getCatname').html(cat_name);
                    $('#getPhoniticname').html(cat_namePhonetic);
                    $('#getYear').html(cat_year +'年');
                    $('#getMonth').html(cat_month);
                    $('#getPostCode').html('〒'+ cat_postcode);
                    $('#getPrefecture').html(cat_prefecter);
                    $('#getadd1').html(cat_address1);
                    $('#getadd2').html(cat_address2);
                    $('#getPhone').html(cat_phone);
                    $('#getEmail').html(cat_email);
                    $('#getResidence').html(cat_residence);
                    $('#getrequests').html(cat_reguest);
                    $('#getImg').html(cat_img);
                   
                    
                    /* send into mail */


                  $('#f_cat_name').val(cat_name);
                  $('#f_cat_namePhonetic').val(cat_namePhonetic);
                  $('#f_cat_year').val(cat_year);
                  $('#f_cat_month').val(cat_month);
                  $('#f_cat_postcode').val(cat_postcode);
                  $('#f_cat_address1').val(cat_address1);
                  $('#f_cat_address2').val(cat_address2);
                  $('#f_cat_phone').val(cat_phone);
                  $('#f_cat_email').val(cat_email);
                  $('#f_cat_residence').val(cat_residence);
                  $('#f_cat_reguest').val(cat_reguest);
                  $('#f_cat_prefecter').val(cat_prefecter);
                     
                }


        });
        $("#cancel").click(function (e) {
            e.preventDefault();

            $('#id01').css("display", "none");
            
        });

    });
</script>

<?php get_footer();?>

