<?php

    /*ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);*/

    session_start();


    if(isset($_POST['submit']))
    {
         //$email_to = 'orntonyy@gmail.com';

         $inquiry = $_POST['inquiry_item'];
         $email = $_POST['emails'];
         $name = $_POST['names'];
         $assumed = $_POST['assumed'];
         $phone = $_POST['phone'];
         $postcode = $_POST['postcode'];
         $prefecture = $_POST['prefecture'];
         $municipality = $_POST['municipality'];
         $chomechi = $_POST['chomechi'];
         $body = $_POST['body'];
         $dates = date('Ymd');

         $_SESSION['email'] = $email;

         require_once 'mail.php';

         // echo $_SESSION['email'];

    }

    ?>


<?php get_header(); ?>

    <div class="entry-content-page">
        <div class="shopWrap">
            <div class="navLink">
                 <?php if (function_exists('qt_custom_breadcrumbs')) qt_custom_breadcrumbs(); ?>
            </div>
            <div class="inquiryTitle">
                <div class="inTitle">Inquiry</div>
                <br>
                <h1>お問い合わせ</h1>
            </div>
        </div>
        <div class="inquiryContent">
            <div class="reserveForm">
            <h2>問合せフォーム</h2>
              <div class="rsForm">
                <form action="" method="post" id="mailform">
                  <div class="inqueryForms">
                     <table class="mail_form">
                         <tr>
                             <th>
                                 <div class="ris must">必須</div>
                                 お問い合わせ項目
                                 <span>inquiry item</span>
                             </th>
                             <td>
                                 <select name="inquiry_item" class="mfp size_240" id="inquiry_item">
                                     <option value="" selected="selected">選択して下さい</option>
                                     <option value="当サイトについて">当サイトについて</option>
                                     <option value="広告掲載について">広告掲載について</option>
                                     <option value="店舗掲載登録について">店舗掲載登録について</option>
                                     <option value="その他">その他</option>
                                     <optgroup label=""></optgroup>
                                 </select>
                                 <div id="errormsg_inquiry_item" class="mfp_err">お問い合わせ項目が選択されていません。</div>
                             </td>
                         </tr>

                         <tr>
                             <th>
                                 <div class="ris must">必須</div>
                                 メールアドレス
                                 <span>mail address</span>
                             </th>
                             <td>
                                 <input type="text" name="email" id="email" class="email size_240">
                                 <div id="errormsg_email" class="mfp_err_email"></div>
                             </td>
                         </tr>

                         <tr>
                             <th>
                                 <div class="ris must">必須</div>
                                 確認用メールアドレス
                                 <span>confirm mail address</span>
                             </th>
                             <td>
                                 <input type="text" name="confirm_email" class="email size_240" id="confirm_email">
                                 <div id="errormsg_confirm_email" class="mfp_err">確認用メールアドレスとメールアドレスが一致しません。</div>
                             </td>
                         </tr>

                         <tr>
                             <th>
                                 <div class="ris must">必須</div>
                                 お名前
                                 <span>your name</span>
                             </th>
                             <td>
                                 <input type="text" name="names" id="names" class="mfp size_120" onkeyup="inputTyping(this.form.id,'assumed_name',event.keyCode,this)">
                                 <span class="name_span">※法人の方は法人名</span>
                                 <div id="errormsg_name" class="name_err"></div>　
                             </td>
                         </tr>
                          
                         <tr>
                             <th>フリガナ<span>assumed name</span></th>
                             <td><input type="text" name="assumed_name" class="pad size_120" id="assumed_name"></td>
                         </tr>

                         <tr>
                             <th>電話番号<span>telephone number</span></th>
                             <td><input type="text" name="phone_number" class="pad size_100" id="phone_number"></td>
                         </tr>

                         <tr>
                             <th>郵便番号<span>postcode</span></th>
                             <td>
                                 <input type="text" name="post_code" id="post_code" class="pad size_50">
                                 <a href="http://www.post.japanpost.jp/zipcode/" target="_blank">郵便番号を調べる</a>
                             </td>
                         </tr>

                         <tr>
                             <th>
                              <div class="ris must">必須</div> ご住所<span>address</span>
                              </th>
                             <td>
                                 <ol>
                                     <li>
                                         <span>都道府県</span>
                                         <select name="prefectures" id="prefectures" class="mfp size_120" style="background-color: rgb(255, 245, 214);">
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
                                         </select><div id="errormsg_都道府県" class="mfp_err">都道府県が選択されていません。</div>
                                     </li><br>
                                     <li>
                                         <span>市区町村</span>
                                         <input type="text" name="municipality" id="municipality" size="50" class="mfp size_300 inputText">
                                         <div id="errormsg_municipality" class="mfp_err">市区町村が未入力です。</div>
                                     </li><br>
                                     <li>
                                         <span>丁目番地</span>
                                         <input type="text" name="chomechi_address" id="chomechi_address" size="50" class="mfp size_300  inputText">
                                         <div id="errormsg_address" class="mfp_err">丁目番地が未入力です。</div></li>
                                 </ol>
                             </td>
                         </tr>

                         <tr>
                             <th>
                                 <div class="ris must">必須</div>
                                 お問合せ内容
                                 <span>inquiry body</span>
                             </th>
                             <td>
                                 <textarea name="inquiry_body" id="inquiry_body" rows="10" cols="60" class="mfp size_360"></textarea>
                                 <div id="errormsg_inquiry_body" class="mfp_err">お問合せ内容が未入力です。</div>
                              </td>
                         </tr>

                         <tr>
                             <th>
                                 <div class="ris must">必須</div>
                                 送信確認
                                 <span>sending confirm</span>
                             </th>
                             <td>
                                 <label for="send_confirm" id="send_confirm_label" class="label_true">
                                     <input type="checkbox" id="send_confirm" name="send_confirm" value="送信チェック済み" class="mfp">
                                     上記送信内容を確認したらチェックを入れてください
                                 </label>
                                 <div id="errormsg_confirm" class="mfp_err_check"></div>
                             </td>
                         </tr>

                         <tr>
                             <th>送信<span>submit send</span></th>
                             <td><input type="submit" class="submit" id="submits" value="確認画面へ"></td>
                         </tr>

                     </table>
                 </div>
                </form>
              </div>
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

                <p>ウェブ来店予約はまだ完了していません。 以下の内容でよろしければ「来店予約を申し込む」を押してください。</p>
                <div class="modelTable">

                    <table>
                        <tr class="bgBlue">
                            <td><b>お問い合わせ項目</b></td>
                            <td><label id="getInquiryItem"></label></td>
                        </tr>
                        <tr>
                            <td>メールアドレス</td>
                            <td>
                                <label id="getEmail"></label><br>
                                <span style="color: red">間違っているとご連絡できません。</span>
                            </td>
                        </tr>
                        <tr class="bgBlue">
                            <td><b>お名前</b></td>
                            <td><label id="getName"></label></td>
                        </tr>
                        <tr>
                            <td><b>フリガナ</b></td>
                            <td><label id="getAssumename"></label></td>
                        </tr>
                        <tr class="bgBlue">
                            <td><b>電話番号</b></td>
                            <td><label id="getTelephone"></label></td>
                        </tr>
                        <tr>
                            <td><b>ご住所</b></td>
                            <td>
                                <label id="getPostcode"></label><br>
                                <span id="getPrefecture"></span><span id="getMunicipality"></span><span id="getChomechi"></span>
                            </td>
                        </tr>
                        <tr class="bgBlue">
                            <td><b>お問合せ内容</b></td>
                            <td><label id="getBody"></label></td>
                        </tr>
                        <tr>
                            <td><b>送信確認</b></td>
                            <td><label id="getSend"></label></td>
                        </tr>
                    </table>

                </div>
        </div> 

    </div>
</div>
        <form action="<?php the_permalink(); ?>" method="post">
            <input type="hidden" name="inquiry_item" id="f_inquiry">
            <input type="hidden" name="emails" id="f_email">
            <input type="hidden" name="names" id="f_name">
            <input type="hidden" name="assumed" id="f_assumed">
            <input type="hidden" name="phone" id="f_phone">
            <input type="hidden" name="postcode" id="f_postcode">
            <input type="hidden" name="prefecture" id="f_prefecture">
            <input type="hidden" name="municipality" id="f_municipality">
            <input type="hidden" name="chomechi" id="f_chomechi">
            <input type="hidden" name="body" id="f_body">
            <input type="hidden" name="send_confirm" id="f_send">

            <div class="btn">
                <a id="cancel" href="javascript:void(0)" class="btnimg"><img src="<?php echo get_template_directory_uri(); ?>/images/pc/main/mfp_cancel.gif"></a>
                <button type="submit" name="submit" id="send" class="btnimg"><img src="<?php echo get_template_directory_uri(); ?>/images/pc/main/mfp_send.gif"></button>
            </div>
        </form>

  
</div>


<!-- ============================================ script ======================================= -->

<script type="text/javascript">

    function isValidEmailAddress(emailAddress)
    {
        var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
        return pattern.test(emailAddress);
    }

    $(function(){

        /* validate email */

        $('#email').on('focusout',function(){
            var email = $('#email').val();

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

        /* validate confirm email */

        $('#confirm_email').on('focusout',function(){
            var email = $('#email').val();
            var confirm_email = $('#confirm_email').val();

            $(this).next('.mfp_err').show();

            if(email != '')
            {
                if(email == confirm_email)
                {
                    $(this).next('.mfp_err').hide();
                }
                else
                {
                    $(this).next('.mfp_err').show();
                }
            }

        });

        /* validate send confirm */

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
         $('#names').on('focusout',function(){
              var e = $('#names').val();
              $('#errormsg_name').html('メールアドレスが未入力です。');
             
                 if(e!=""){
                    $('.name_err').hide();
                  }else{
                    $('.name_err').show();
                  }
             
          });
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
            $('#names').each(function(){
              var n = $('#names').val();
                if(n == '')
                {
                    error++;
                   $('#errormsg_name').html('メールアドレスが未入力です。');
                    $('.name_err').show();
                }
            });

            $('.email').each(function(){
                if($(this).val() == '')
                {
                    error++;
                    $('#errormsg_email').html('メールアドレスが未入力です。');
                    $(this).next('.mfp_err_email').show();
                }
            });

            $('#confirm_email').each(function(){
                var email = $('#email').val();
                var confirm_email = $('#confirm_email').val();

                $(this).next('.mfp_err').show();

                if(email != '')
                {
                    if(email == confirm_email)
                    {
                        $(this).next('.mfp_err').hide();
                    }
                    else
                    {
                        error++;
                        $(this).next('.mfp_err').show();
                    }
                }

            });

            $('#send_confirm').each(function(){

                if(!this.checked)
                {
                    error++;
                    $('#errormsg_confirm').html('送信確認がチェックされていません。');
                    $('.mfp_err_check').show();
                }

            });

            /* success */

            if(error - 0 == 0)
            {
                $('#id01').css("display", "block");

                var inquiry = $('#inquiry_item').val();
                var emails = $('#email').val();
                var name = $('#names').val();
                var assumed = $('#assumed_name').val();
                var phone = $('#phone_number').val();
                var postcode = $('#post_code').val();
                var prefectures = $('#prefectures').val();
                var municipality = $('#municipality').val();
                var chomechi = $('#chomechi_address').val();
                var body = $('#inquiry_body').val();


                $('#getInquiryItem').html(inquiry);
                $('#getEmail').html(emails);
                $('#getName').html(name);
                $('#getAssumename').html(assumed);
                $('#getTelephone').html(phone);
                $('#getPostcode').html('〒' + postcode);
                $('#getPrefecture').html(prefectures);
                $('#getMunicipality').html(municipality);
                $('#getChomechi').html(chomechi);
                $('#getBody').html(body);
                $('#getSend').html('送信確認がチェックされていません。');

                /* send into mail */

                $('#f_inquiry').val(inquiry);
                $('#f_email').val(emails);
                $('#f_name').val(name);
                $('#f_assumed').val(assumed);
                $('#f_phone').val(phone);
                $('#f_postcode').val(postcode);
                $('#f_prefecture').val(prefectures);
                $('#f_municipality').val(municipality);
                $('#f_chomechi').val(chomechi);
                $('#f_body').val(body);
                $('#f_send').val('送信確認がチェックされていません。');

            }

        });

        $("#cancel").click(function (e) {
            e.preventDefault();

            $('#id01').css("display", "none");
          

        });

    }); //end jquery

</script>


<?php get_footer(); ?>


