<?php
    header('Cache-Control: no cache'); //no cache
    session_cache_limiter('private, must-revalidate');
    session_cache_expire(60);
    session_start();
    if(isset($_POST['send']))
    {   
        $title=$_POST['title'];
        $_SESSION['title'] =  $title;
        
        $postid = $_POST['postid'];
        $_SESSION['postid']=$postid; 
        
      
    }
   

 ?>
<?php $shopname = get_the_title($postid);?>
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
        <div class="inTitle">Reserve</div>
        <br>
        <h1>来店予約</h1>
    </div>
    </div>
</div>
<div class="reserveContainer">
    <div class="reserveShop">
        <?php echo '<h1>「'.$title.'」 にウェブから来店予約する</h1>';?>

    </div>
    <div class="reserveForm">
        <h2>来店予約する人の情報を入力。</h2>
        
            <form action="" method="post" id="mailform">
            	<div class="rsForm">
                    <table class="mailform">
                        <tr>
                            <th><p>お店の名前</p></th>
                            <td><p> <?php the_title(); ?></p></td>      
                        </tr>
                        <tr>
                            <th><p>予約の目的</p><div class="req must">必須</div></th>
                            <td>
                               <?php $value = get_field('shop_detail'); ?>
                                <?php if($value) :?>
                                    <select name="reserve_purpose" class="mfp resize_150" id="reserve_purpose">
                                        <option value="val1" id="op1" selected="selected">選択してください</option>
                                        <?php foreach($value as $values ): ?>
                                            <?php if($values == '選択してください') continue; ?>
                                            <option value="<?php echo $values ?>">
                                                <?php echo $values; ?>
                                            </option>
                                        <?php endforeach; ?>
                                        <optgroup label=""></optgroup>
                                    </select>
                                    
                                <?php endif; ?>
                                <div id="errormsg_reserve_purpose" class="purpose_err"></div>
                            </td>
                          
                        </tr>
                        <tr>
                            <th><p>希望来店日</p><div class="req must">必須</div></th>
                            <td>
                                <p id="text">↑予約の目的を選択してください</p>
                                <span id="date" style="display: none;">
									<?php $date = new DateTime();?>
									<select name="reserve_year" id="reserve_year">
									    <?php for($year = $date->format('Y'); $year <= 2020; $year++) { ?>
									        <option value="<?php echo $year; ?>"><?php echo $year; ?>年</option>
									    <?php } ?>
                                        <optgroup label=""></optgroup>
									</select>

									<select name="reserve_month" id="reserve_month">
									    <option value="" selected="selected">希望月</option>
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
									<select name="reserve_day" id="reserve_day" class="mfp">
									    <option value="" selected="selected">希望日</option>
									    <?php for($day = 1; $day <= 31; $day++) { ?>
									        <?php $default_day = ($day == $date->format('d')); ?>
									        <option <?php echo $default_day; ?> value="<?php echo $day; ?>"><?php echo $day; ?>日</option>
									    <?php } ?>
                                        <optgroup label=""></optgroup>
									</select>
									<div id="errormsg_reserve_day" class="mfp_err">希望来店日を選択してください。</div>
									
                                </span>
                            </td>
                        </tr> 
                        <tr>
                            <th><p>希望来店時間</p> <div class="req must">必須</div> </th>
                            <td>
								<select name="reserve_time" class="mfp resize_150 s_time" id="reserve_time">
									<option value="" selected="selected">時間指定なし</option>
									<option value="10時 00分頃">10時 00分頃</option>
									<option value="10時 15分頃">10時 15分頃</option>
									<option value="10時 30分頃">10時 30分頃</option>
									<option value="10時 45分頃">10時 45分頃</option>
									<option value="12時 00分頃">12時 00分頃</option>
									<option value="12時 15分頃">12時 15分頃</option>
									<option value="12時 30分頃">12時 30分頃</option>
									<option value="12時 45分頃">12時 45分頃</option>
									<option value="13時 00分頃">13時 00分頃</option>
									<option value="13時 15分頃">13時 15分頃</option>
									<option value="13時 30分頃">13時 30分頃</option>
									<option value="13時 45分頃">13時 45分頃</option>
									<option value="14時 15分頃">14時 15分頃</option>
									<option value="14時 30分頃">14時 30分頃</option>
									<option value="14時 45分頃">14時 45分頃</option>
									<option value="15時 00分頃">15時 00分頃</option>
									<option value="15時 15分頃">15時 15分頃</option>
									<option value="15時 30分頃">15時 30分頃</option>
									<option value="15時 45分頃">15時 45分頃</option>
									<option value="16時 00分頃">16時 00分頃</option>
									<option value="16時 15分頃">16時 15分頃</option>
									<option value="16時 30分頃">16時 30分頃</option>
									<option value="16時 45分頃">16時 45分頃</option>
									<option value="17時 00分頃">17時 00分頃</option>
									<option value="17時 15分頃">17時 15分頃</option>
									<option value="17時 30分頃">17時 30分頃</option>
									<option value="17時 45分頃">17時 45分頃</option>
									<option value="18時 00分頃">18時 00分頃</option>
									<option value="18時 15分頃">18時 15分頃</option>
									<option value="18時 30分頃">18時 30分頃</option>
									<option value="18時 45分頃">18時 45分頃</option>
									<option value="19時 00分頃">19時 00分頃</option>
									<option value="19時 15分頃">19時 15分頃</option>
									<option value="19時 30分頃">19時 30分頃</option>
									<option value="19時 45分頃">19時 45分頃</option>
									<option value="20時 00分頃">20時 00分頃</option>
									<option value="20時 15分頃">20時 15分頃</option>
									<option value="20時 30分頃">20時 30分頃</option>
									<option value="20時 45分頃">20時 45分頃</option>
									<option value="20時 00分頃">20時 00分頃</option>
									<option value="20時 15分頃">20時 15分頃</option>
									<option value="20時 30分頃">20時 30分頃</option>
									<option value="20時 45分頃">20時 45分頃</option>
									<option value="21時 00分頃">21時 00分頃</option>
                                    <optgroup label=""></optgroup>
								</select><br>
                                <?php 
                                    $startTime = get_field('start_time'); 
                                    $endTime= get_field('end_time');
                                    echo '営業時間：'.$startTime;
                                ?>
                                    <?php if($endTime){ echo " ~ "; } echo $endTime;?>

                           

                                <p class="pText">ご予約の際は定休日を必ずご確認いただき、営業時間内でのご予約をお願いいたします</p>
								<div id="errormsg_reserve_time" class="mfp_err">希望来店時間を選択してください。</div>
                            </td>
                        </tr>
                        <tr>
                            <th><p>お名前</p><div class="req must">必須</div></th>
                            <td>
                            	<span> 【氏】</span>
                            	<input type="text" class="resize_150" name="f_name" id="f_name">
                            
                            	<span> 【名】</span>
                            	<input type="text" class="mfp resize_150" name="l_name" id="l_name">
                            	<div id="errormsg_reserve_l" class="mfp_err date">お名前が未入力です。</div>
                            	
                            </td>
                        </tr> 
                        <tr>
                            <th><p>お名前 (ふりがな)</p><div class="req must">必須</div></th>
                            <td>
                            	<span>  【し】</span>
                            	<input type="text" class="resize_150" name="p_name" id="p_name">
                                
                            	<span> 【めい】</span>
                            	<input type="text" class="mfp resize_150" name="d_name" id="d_name">
                                <div id="errormsg_reserve_d" class="mfp_err date">お名前（ふりがな）が未入力です。</div>
                            </td>
                        </tr>                   
                        <tr>
                            <th><p>電話番号</p><div class="req must">必須</div></th>
                            <td>
                            	<p>希望日の来店が出来ない場合に連絡する場合があります</p>
                            	<input type="text" class="mfp resize_150" name="reserve_phone" id="reserve_phone">
                                <div id="errormsg_reserve_phone" class="mfp_err">電話番号が未入力です。</div>
                            	<div class="ex"><span class="example">例</span> 0756007018</div>

                            </td>
                        </tr>                         
                       <tr>
                            <th><p>メールアドレス</p><div class="req must">必須</div></th>
                            <td>
                            	<p>予約確認のメールを送信しますので必ず正確にご入力下さい</p>
                            	<input type="email" class="resize_150" name="reserve_eamil" id="reserve_eamil">
                            	<div class="ex"><span class="example">例</span>mail_sec.4@hearts-creative.jp</div>
                            	<div id="errormsg_email" class="mfp_err_email"></div>
                            </td>
                        </tr>	                            
                        <tr>
                        	<th><p>その他お問い合わせ</p></th>
                        	<td>
                        		<textarea name="reserve_inquiries"  wrap="physical" id="reserve_inquiries" name="reserve_inquiries" rows="5" cols="60" class="size_360 textarea"></textarea>
                        	</td>
                        </tr>
                        <tr>
                            <th>
                                <p>利用規約</p>
                                <div class="req must">必須</div>
                            </th>
                            <td>
                            	<label for="send_confirm" id="send_confirm_label" class="label_true">
	                               <input type="checkbox" id="send_confirm" name="send_confirm" value="">
	                                <a href="<?php echo get_home_url('/'); ?>/guide" target="_blank" class="reservelink"> 利用規約</a>
                                    をご確認の上、同意するにチェックを入れてください

	                           </label>
                                <div id="errormsg_confirm" class="mfp_err_check"></div>

                            </td>
                        </tr>
                    </table>
                </div>
                <div class="btn_Reserve">
            		 
                     <button type="submit" name="submit" id="btn_reserve" class="w3-button w3-black rsSubmit">来店予約申し込み＞</button>
                </div>
                    
                </div>
               
            </form>
        
    </div>
</div>

<!-- ================================= model ============================================ -->


<?php endwhile;?>
<?php wp_reset_query();?>

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
	                        <td><b>予約の目的</b></td>
	                        <td><label id="getReserve_purpose"></label></td>
	                    </tr>
	                    <tr>
	                        <td>希望来店日時</td>
	                        <td>                        	
	                        	<label id="getYear"></label>
                                <label id="getMonth"></label>
                                <label id="getDay"></label>
                                <label id="getTime"></label>
                                <!-- <p><?php echo  $startTime.' ~ '.$endTime  ?></p> -->
	                        </td>
	                    </tr>
	                    <tr>
	                        <td><b>お店の名前</b></td>
	                        <td>
                            <?php echo '<label>'.$title.'</label>'; ?>   
                            </td>
	                    </tr>
	                    <tr>
	                        <td>お名前</td>
	                        <td><label id="getFname"></label><label id="getLname"></label></td>
	                    </tr>
	                    <tr>
	                        <td><b>お名前 (ふりがな)</b></td>
	                        <td><label id="getPname"></label> <label id="getDname"></label></td>
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
	                        <td><b>その他お問い合わせ</b></td>
	                        <td><label id="getInquiries"></label></td>
	                    </tr>
	                    <tr>
	                        <td><b>利用規約</b></td>
	                        <td><label id="getSend"></label></td>
	                    </tr>
	                    
		            </table>
                </div>
            </div> 

        </div>
    </div>
                            
    <form action="<?php echo get_home_url('/'); ?>/thankpage" method="post">
        <input type="hidden" name="reserve_purpose" id="f_purpose">
        <input type="hidden" name="reserve_year" id="f_year">
    	<input type="hidden" name="reserve_month" id="f_month">
    	<input type="hidden" name="reserve_day" id="f_day">
        <input type="hidden" name="f_name" id="f_f_name">
        <input type="hidden" name="l_name" id="f_l_name">
        <input type="hidden" name="p_name" id="f_p_name">
        <input type="hidden" name="d_name" id="f_d_name">
        <input type="hidden" name="reserve_time" id="f_time">
        <input type="hidden" name="reserve_phone" id="f_reserve_phone">
        <input type="hidden" name="reserve_eamil" id="f_reserve_eamil">
        <input type="hidden" name="reserve_inquiries" id="f_reserve_inquiries">
        <input type="hidden" name="send_confirm" id="f_send">

        <input type="hidden" name="idpost" id="idpost" value="<?php echo $postid; ?>">
        <input type="hidden" name="title" id="title" value="<?php the_title();?>">
        <input type="hidden" name="shopname" id="shopname" value="<?php echo $shopname; ?>">
        <input type="hidden" name="starttime" id="starttime" value="<?php echo $startTime; ?>">
        <input type="hidden" name="endtime" id="endtime" value="<?php echo $endTime; ?>">
         
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

<!-- ============================================ script ======================================= -->

<!-- ============================================ script ======================================= -->


<script type="text/javascript">
// select show/hide
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

        $('#reserve_eamil').on('focusout',function(){
            var email = $('#reserve_eamil').val();
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
        $('#reserve_purpose').on('focusout', function(){
            if($(this).val()==="val1"){
                 var e = $('#reserve_purpose').val();
            $('#errormsg_reserve_purpose').html('予約の目的を選択してください。');
            $('.purpose_err').show();
             }else{
                $('#errormsg_reserve_purpose').html('予約の目的を選択してください。');
            $('.purpose_err').hide();
             }
           
            
        });
        //error 
             $('.mfp').on('focusout',function(){

            var mfp = $(this).val();

            $(this).next('.mfp_err').show();

            if(mfp != '')
            {
                $(this).next('.mfp_err').hide();
            }

            });

        // send confirm
        $('#send_confirm').on('click',function(){

            if(this.checked)
            {
                $('#errormsg_confirm').html('');
                $('.mfp_err_check').hide();
            }
            else
            {
                $('#errormsg_confirm').html('送信確認がチェックされていません。');
                $('.mfp_err_check').show();
            }

        });

        

//        submit
        $('#btn_reserve').click(function(e) {
            e.preventDefault();
            var error = 0;

            $('.mfp').each(function(){
                if($(this).val() == '')
                {
                    error++;
                    $(this).next('.mfp_err').show();
                   
                   
                }
            });
           
             
            $('#reserve_purpose').each(function(){
                
                if($(this).val()==="val1"){
                    error++;
                    $('#errormsg_reserve_purpose').html('メールアドレスが未入力です。');
                    $('.purpose_err').show();  
                }else{
                    $('.purpose_err').hide();
                }
                
            });

           


            $('#reserve_eamil').each(function () {
                if ($(this).val() == '') {
                    error++;
                    $('#errormsg_email').html('メールアドレスが未入力です。');
                    $('.mfp_err_email').show();
                }
            });


            $('#send_confirm').each(function () {

                if (!this.checked) {
                    error++;
                    $('#errormsg_confirm').html('送信確認がチェックされていません。');
                    $('.mfp_err_check').show();
                }

            });

                /* success */


	            if(error - 0 == 0)
	            {
	               $('#id01').css("display", "block");
                   	var reserve_purpose=$('#reserve_purpose').val();
	                var reserve_year=$('#reserve_year').val();
	                var reserve_month=$('#reserve_month').val();
	                var reserve_day=$('#reserve_day').val();
	                var reserve_time=$('#reserve_time').val();
	                var f_name=$('#f_name').val();
	                var l_name=$('#l_name').val();
	                var p_name=$('#p_name').val();
	                var d_name=$('#d_name').val();
	                var reserve_phone=$('#reserve_phone').val();
	                var reserve_eamil=$('#reserve_eamil').val();
	                var reserve_inquiries=$('#reserve_inquiries').val();
	                
	                
	                // get input data 
	                $('#getReserve_purpose').html(reserve_purpose);
	                $('#getTime').html(reserve_time);
	                $('#getMonth').html(reserve_month);
	                $('#getDay').html(reserve_day + '日 ');
	                $('#getYear').html(reserve_year + '年');
	                $('#getFname').html(f_name);
	                $('#getLname').html(l_name);
	                $('#getPname').html(p_name);
	                $('#getDname').html(d_name);
	                $('#getPhone').html(reserve_phone);
	                $('#getEmail').html(reserve_eamil);
	                $('#getInquiries').html(reserve_inquiries);
	                $('#getSend').html('振袖サーチの利用規約に準ずる。');
	                
		            /* send into mail */

	                $('#f_purpose').val(reserve_purpose);
	                $('#f_year').val(reserve_year);
	                $('#f_month').val(reserve_month);
	                $('#f_day').val(reserve_day);
	                $('#f_time').val(reserve_time);
	                $('#f_f_name').val(f_name);
	                $('#f_l_name').val(l_name);
	                $('#f_p_name').val(p_name);
	                $('#f_d_name').val(d_name);
	                $('#f_reserve_phone').val(reserve_phone);
	                $('#f_reserve_eamil').val(reserve_eamil);
	                $('#f_reserve_inquiries').val(reserve_inquiries);
	                
	            }

           
        });

       $("#cancel").click(function (e) {
            e.preventDefault();

            $('#id01').css("display", "none");
   
        });

    });
</script>
<?php get_footer();?>

