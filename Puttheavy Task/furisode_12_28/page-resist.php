<?php 
  
  session_start();
if(isset($_POST['submit']))
{
    $email_to = "theavytep18@gmail.com";
    $email_subject = "resister shop";
    
    $shopName = $_POST['shop_names'];
    $shopNameKana=$_POST['shop_names_kana'];
    $shopType=$_POST['shop_types'];
    $zip=$_POST['zips'];
    $state=$_POST['states'];
    $address=$_POST['addresss'];
    $buildingName=$_POST['building_names'];
    $tel=$_POST['tels'];
    $fax=$_POST['faxs'];
    $mailAddress=$_POST['mail_addresss'];
    $url=$_POST['urls'];
    $mobileUrl=$_POST['mobile_urls'];
    $contactPersonal=$_POST['contact_personals'];
    $contactPersonalFurigana=$_POST['contact_personal_furiganas'];
    $contactPersonalTel=$_POST['contact_personal_tels'];
    
    $_SESSION['mailAddress']=$mailAddress;
    require_once 'resistmail.php';


   }
   

 ?>
<?php get_header(); ?>
    <div class="entry-content-page">
        <div class="shopWrap">
            <div class="navLink">
                 <?php if (function_exists('qt_custom_breadcrumbs')) qt_custom_breadcrumbs(); ?>
            </div>
            <div class="inquiryTitle">
                <div class="inTitle">New Stores Registration</div>
                <br>
                <h1>新規店舗登録</h1>
            </div>
        </div>
        <div class="inquiryContent">
            <div class="reserveForm">
            <h2>掲載をご希望するお店の情報を入力</h2>
               <form action="" method="post" id="inquiryForm">
                  <div class="rsForm">
                     <table class="mailform resist">
                      <tr>
                         	<th>
                         		<div class="ris must">必須</div>
                         		店舗名
                         		<span>shop name</span>
                             
                         	</th>
                         	<td>
                         		<input type="text" name="shop_name" id="shop_name" class="mfp size_240">
                                <div id="errormsg_shop_name" class="mfp_err">ショップ名がありません</div>
                         	</td>
                      </tr>

                      <tr>
                       	<th>
                       		<div class="ris must">必須</div>
                       		フリガナ
                       		<span>shop name kana</span>
                       	</th>
                       	<td>
                       		<input type="text" name="shop_name_kana" id="shop_name_kana" class="mfp size_240">
                       		<div id="errormsg_shop_name_kana" class="mfp_err">ショップ名かながありません</div>
                       	</td>
                      </tr>

                      <tr>
                       	<th>
                       		<div class="ris must">必須</div>
                       		店舗形態
                       		<span>shop type</span>
                       	</th>
                       	<td>
                       		<select name="shop_type" class="mfp size_240" id="shop_type">
                           <option value="" selected="selected"> 選択して下さい</option>
                           <option value=" 呉服店"> 呉服店</option>
                           <option value="振袖ショップ（実際にお店がある）/ オンラインショップ">振袖ショップ（実際にお店がある）/ オンラインショップ</option>
                           <option value="ネットショップ/ 写真館">ネットショップ/ 写真館</option>
                           <option value="フォトスタジオ/美容院">フォトスタジオ/美容院</option>
                           <option value="ヘアーサロン">ヘアーサロン</option>
                           <optgroup label=""></optgroup>
                          </select>
                          <div id="errormsg_shop_type" class="mfp_err">店舗形態が選択されていません。</div>
                       	</td>
                      </tr>

                      <tr>
                             <th>
                             <div class="ris must">必須</div>
                               郵便番号
                              <span>zip</span></th>
                             <td>
                                 <input type="text" name="zip" id="zip" class="mfp size_100">
                                 <div id="errormsg_zip_code" class="mfp_err">郵便番号が未入力です。</div>
                             </td>
                      </tr>

                      <tr>
                       	<th>
                       		<div class="ris must">必須</div>
                       		都道府県
                       		<span>state</span>
                       	</th>
                       	<td>
                             	<select name="state" id="state" class="mfp size_120">
                                 <option value="" selected="selected">【選択して下さい】</option>
                                 <option value="北海道">北海道</option>
                                 <option value="青森県">青森県</option>
                                 <option value="岩手県">岩手県</option>
                                 <option value="宮城県">宮城県</option>
                                 <option value="秋田県">秋田県</option>
                                 <option value="山形県">山形県</option>
                                 <option value="福島県">福島県</option>
                                 <option value="茨城県">茨城県</option>
                                 <option value="栃木県">栃木県</option>
                                 <option value="群馬県">群馬県</option>
                                 <option value="埼玉県">埼玉県</option>
                                 <option value="千葉県">千葉県</option>
                                 <option value="東京都">東京都</option>
                                 <option value="神奈川県">神奈川県</option>
                                 <option value="新潟県">新潟県</option>
                                 <option value="富山県">富山県</option>
                                 <option value="石川県">石川県</option>
                                 <option value="福井県">福井県</option>
                                 <option value="山梨県">山梨県</option>
                                 <option value="長野県">長野県</option>
                                 <option value="岐阜県">岐阜県</option>
                                 <option value="静岡県">静岡県</option>
                                 <option value="愛知県">愛知県</option>
                                 <option value="三重県">三重県</option>
                                 <option value="滋賀県">滋賀県</option>
                                 <option value="京都府">京都府</option>
                                 <option value="大阪府">大阪府</option>
                                 <option value="兵庫県">兵庫県</option>
                                 <option value="奈良県">奈良県</option>
                                 <option value="和歌山県">和歌山県</option>
                                 <option value="鳥取県">鳥取県</option>
                                 <option value="島根県">島根県</option>
                                 <option value="岡山県">岡山県</option>
                                 <option value="広島県">広島県</option>
                                 <option value="山口県">山口県</option>
                                 <option value="徳島県">徳島県</option>
                                 <option value="香川県">香川県</option>
                                 <option value="愛媛県">愛媛県</option>
                                 <option value="高知県">高知県</option>
                                 <option value="福岡県">福岡県</option>
                                 <option value="佐賀県">佐賀県</option>
                                 <option value="長崎県">長崎県</option>
                                 <option value="熊本県">熊本県</option>
                                 <option value="大分県">大分県</option>
                                 <option value="宮崎県">宮崎県</option>
                                 <option value="鹿児島県">鹿児島県</option>
                                 <option value="沖縄県">沖縄県</option>
                                 <optgroup label=""></optgroup>
                             	</select>
                          	<div id="errormsg_state" class="mfp_err">都道府県が選択されていません。</div>
                       	</td>
                      </tr>

                       <tr>
                       	<th>
                       		<div class="ris must">必須</div>
                       		市区町村番地
                       		<span>address</span>
                       	</th>
                       	<td>
                       		<input type="text" name="address" id="address" class="mfp size_240">
                       		<div id="errormsg_address" class="mfp_err">市区町村番地が未入力です。</div>
                       	</td>
                       </tr>

                       <tr>
                       	<th>建物名<span>building name</span></th>
                       	<td><input type="text" name="building_name" id="building_name" class="nomfp size_240"></td>
                       </tr>

                       <tr>
                         <th>
                         	   <div class="ris must">必須</div>
                       	   電話番号
                       	   <span>tel</span>
                         </th>
                         <td>
                         	    <input type="text" name="tel" id="tel" size="10" class="mfp size_150">
                       		<div id="errormsg_tel" class="mfp_err">電話番号が未入力です。</div>
                         </td>
                       </tr>

                       <tr>
                         <th>FAX番号<span>fax</span></th>
                         <td><input type="text" name="fax" id="fax" class="nomfp size_150"></td>
                       </tr>

                       <tr>
                         <th>
                         	   <div class="ris must">必須</div>
                       	   メールアドレス
                       	   <span>mail address</span>
                         </th>
                         <td>
                         	    <input type="text" name="mail_address" id="mail_address" class="mfp size_240">
                       		    <div id="errormsg_mail_address" class="mfp_err_mail_address"></div>
                         </td>
                       </tr>

                        <tr>
                         <th>
                         	   
                       	   ホームページ
                       	   <span>url</span>
                         </th>
                         <td>
                         	    <input type="text" name="url" id="url" class="nomfp size_240">
                       		    
                         </td>
                       </tr>

                        <tr>
                         <th>
                         	  
                       	   携帯ホームページ
                       	   <span>mobile url</span>
                         </th>
                         <td>
                         	    <input type="text" name="mobile_url" id="mobile_url" class="nomfp size_240">
                         </td>
                       </tr>

                        <tr>
                         <th>
                         	   <div class="ris must">必須</div>
                       	   担当者名
                       	   <span>contact personnel</span>
                         </th>
                         <td>
                         	    <input type="text" name="contact_personal" id="contact_personal" class="mfp size_240">
                       		    <div id="errormsg_contact_personal" class="mfp_err">担当者名が未入力です。</div>
                         </td>
                       </tr>

                       <tr>
                         <th>
                         	   <div class="ris must">必須</div>
                       	   担当者ふりがな
                       	   <span>Contact Personnel furigana</span>
                         </th>
                         <td>
                         	    <input type="text" name="contact_personal_furigana" id="contact_personal_furigana" class="mfp size_150">
                       		<div id="errormsg_contact_personal_furigana" class="mfp_err">担当者名ふりがなが未入力です。</div>
                         </td>
                       </tr>
                       <tr>
                         <th>
                         	   <div class="ris must">必須</div>
                       	   担当者連絡先（携帯可）
                       	   <span>Contact Personnel tel</span>
                         </th>
                         <td>
                         	    <input type="text" name="contact_personal_tel" id="contact_personal_tel" class="mfp size_150">
                       		<div id="errormsg_contact_personal_tel" class="mfp_err">担当者連絡先が未入力です。</div>
                         </td>
                       </tr>
                       <tr>
                             <th>送信<span>submit send</span></th>
                             <!-- <td><input type="submit" class="submit" id="submits" value="確認画面へ"></td> -->
                             <td>
                                <button type="submit" name="submit" id="submits" class="w3-button w3-black submit">確認画面へ</button>
                             </td>
                         </tr>
                     </table>
                     </div>
               </form>
            </div>
        </div>
    </div>

   
<!-- ================================= model ============================================ -->


<div id="id01" class="w3-modal">
      <div class="w3-modal-content">
        <div class="w3-container">
            <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
            <div class="modelTitle"><h2>入力した情報を確認</h2></div>
            <div class="submitModel">
                 <div class="modelTable">
                    <table>
                        <tr class="bgBlue">
                            <td><b>店舗名</b></td>
                            <td><label id="getShopname"></label></td>
                        </tr>
                        <tr>
                            <td>フリガナ</td>
                            <td>
                                <label id="getShopNameKana"></label><br>
                            </td>
                        </tr>
                        <tr class="bgBlue">
                            <td><b>店舗形態</b></td>
                            <td><label id="getShopType"></label></td>
                        </tr>
                        <tr>
                            <td><b>郵便番号</b></td>
                            <td><label id="getZip"></label></td>
                        </tr>
                        <tr class="bgBlue">
                            <td><b>都道府県</b></td>
                            <td><label id="getState"></label></td>
                        </tr>
                        <tr>
                            <td><b>市区町村番地</b></td>
                            <td>
                                <label id="getAddress"></label><br>
                            </td>
                        </tr>
                        <tr class="bgBlue">
                            <td><b>建物名</b></td>
                            <td><label id="getBuildingName"></label></td>
                        </tr>
                        <tr>
                            <td><b>電話番号</b></td>
                            <td><label id="getTel"></label></td>
                        </tr>

                        <tr>
                            <td><b>FAX番号</b></td>
                            <td><label id="getFax"></label></td>
                        </tr>
                        <tr>
                            <td><b>メールアドレス</b></td>
                            <td><label id="getMailAdress"></label></td>
                        </tr>
                        <tr>
                            <td><b>ホームページ</b></td>
                            <td><label id="getUrl"></label></td>
                        </tr>
                        <tr>
                          <td><b>携帯ホームページ</b></td>
                          <td><label id="getMobileUrl"></label></td>
                        </tr>
                        <tr>
                            <td><b>電話番号</b></td>
                            <td><label id="getContactPersonal"></label></td>
                        </tr>
                        <tr>
                            <td><b>担当者ふりがな</b></td>
                            <td><label id="getContactPersonalFurigana"></label></td>
                        </tr>
                        <tr>
                            <td><b>担当者連絡先（携帯可）</b></td>
                            <td><label id="getContactPersonalTel"></label></td>
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
        
     <form action="<?php the_permalink(); ?>" method="post">
         <input type="hidden" name="shop_names" id="f_shop_name">
         <input type="hidden" name="shop_names_kana" id="f_shop_name_kana">
         <input type="hidden" name="shop_types" id="f_shop_type">
         <input type="hidden" name="zips" id="f_zip">
         <input type="hidden" name="states" id="f_state">
         <input type="hidden" name="addresss" id="f_address">
         <input type="hidden" name="building_names" id="f_building_name">
         <input type="hidden" name="tels" id="f_tel">
         <input type="hidden" name="faxs" id="f_fax">
         <input type="hidden" name="mail_addresss" id="f_mail_address">
         <input type="hidden" name="urls" id="f_url">
         <input type="hidden" name="mobile_urls" id="f_mobile_url">
         <input type="hidden" name="contact_personals" id="f_contact_personal">
         <input type="hidden" name="contact_personal_furiganas" id="f_contact_personal_furigana">
         <input type="hidden" name="contact_personal_tels" id="f_contact_personal_tel">
         
         <div class="btn">
             <a id="cancel" href="javascript:void(0)" class="btnimg"><img src="<?php echo get_template_directory_uri(); ?>/images/pc/main/mfp_cancel.gif"></a>
             <button type="submit" name="submit" id="send" class="btnimg"><img src="<?php echo get_template_directory_uri(); ?>/images/pc/main/mfp_send.gif"></button>
         </div>
     </form>
</div>
<!--  -->


    <script type="text/javascript">
	    function isValidEmailAddress(emailAddress)
	    {
	        var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
	        return pattern.test(emailAddress);
	    }
      function validateURL(textval) {
        var url = new RegExp("^(http|https|ftp)\://([a-zA-Z0-9\.\-]+(\:[a-zA-Z0-9\.&amp;%\$\-]+)*@)*((25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9])\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9]|0)\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9]|0)\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[0-9])|localhost|([a-zA-Z0-9\-]+\.)*[a-zA-Z0-9\-]+\.(com|edu|gov|int|mil|net|org|biz|arpa|info|name|pro|aero|coop|museum|[a-zA-Z]{2}))(\:[0-9]+)*(/($|[a-zA-Z0-9\.\,\?\'\\\+&amp;%\$#\=~_\-]+))*$");
        return url.test(textval);
      }
      
       $(function(){

         // url validate
            // $('#url').on('focusout',function(){
            //   var url = $('#url').val();

            //   $('#errormsg_url').html('mail address is missing');
            //    $('.mfp_err_url').show();
            //     if(url != ''){

            //       if(!validateURL(url)){

            //         $('#errormsg_url').html('mail address is invalid');

            //       }else{

            //          $('#errormsg_url').html('');
            //          $('.mfp_err_url').hide();
            //       }
            //     }
            // });
          //mail address validate
	        $('#mail_address').on('focusout',function(){
	            var email = $('#mail_address').val();

	            $('#errormsg_mail_address').html('メールアドレスが未入力です。');
               $('.mfp_err_mail_address').show();
	            if(email != '')
	            {
	                if(!isValidEmailAddress(email))
	                {
	                    $('#errormsg_mail_address').html('メールアドレスが正しくありません。');
	                }
	                else
	                {
	                    $('#errormsg_mail_address').html('');
                       $('.mfp_err_mail_address').hide();
	                }
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

          /* model */

        $('#submits').click(function(e) {
            e.preventDefault();
            var error = 0;

            $('.mfp').each(function(){
                if($(this).val() == '')
                {
                    error++;
                    $(this).next('.mfp_err').show();
                   
                }
            });

             $('#mail_address').each(function () {
                if ($(this).val() == '') {
                    error++;
                    $('#errormsg_mail_address').html('メールアドレスが未入力です。');
                    $('.mfp_err_mail_address').show();
                } 
             });

           
            /* success */

            if(error - 0 == 0)
            {
                $('#id01').css("display", "block");
                var shopName=$('#shop_name').val();
                var shopNameKana=$('#shop_name_kana').val();
                var shopType=$('#shop_type').val();
                var zip=$('#zip').val();
                var state=$('#state').val();
                var address=$('#address').val();
                var buildingName=$('#building_name').val();
                var tel=$('#tel').val();
                var fax=$('#fax').val();
                var mailAddress=$('#mail_address').val();
                var url=$('#url').val();
                var mobileUrl=$('#mobile_url').val();
                var contactPersonal=$('#contact_personal').val();
                var contactPersonalFurigana=$('#contact_personal_furigana').val();
                var contactPersonalTel=$('#contact_personal_tel').val();

                $('#getShopname').html(shopName);
                $('#getShopNameKana').html(shopNameKana);
                $('#getShopType').html(shopType);
                $('#getZip').html(zip);
                $('#getState').html(state);
                $('#getAddress').html(address);
                $('#getBuildingName').html(buildingName);
                $('#getTel').html(tel);
                $('#getFax').html(fax);
                $('#getMailAdress').html(mailAddress);
                $('#getUrl').html(url);
                $('#getMobileUrl').html(mobileUrl);
                $('#getContactPersonal').html(contactPersonal);
                $('#getContactPersonalFurigana').html(contactPersonalFurigana);
                $('#getContactPersonalTel').html(contactPersonalTel);
            
                /* send into mail */

                $('#f_shop_name').val(shopName);
                $('#f_shop_name_kana').val(shopNameKana);
                $('#f_shop_type').val(shopType);
                $('#f_zip').val(zip);
                $('#f_state').val(state);
                $('#f_address').val(address);
                $('#f_building_name').val(buildingName);
                $('#f_tel').val(tel);
                $('#f_fax').val(fax);
                $('#f_mail_address').val(mailAddress);
                $('#f_url').val(url);
                $('#f_mobile_url').val(mobileUrl);
                $('#f_contact_personal').val(contactPersonal);
                $('#f_contact_personal_furigana').val(contactPersonalFurigana);
                $('#f_contact_personal_tel').val(contactPersonalTel);


            }

        });

        $("#cancel").click(function (e) {
            e.preventDefault();

            $('#id01').css("display", "none");
            $('#modalCon').css("display", "none");

        });

       });//end query
	   
    	
    </script>
<?php get_footer(); ?>