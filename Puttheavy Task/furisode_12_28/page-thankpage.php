<?php
  header('Cache-Control: no cache'); //no cache
  session_cache_limiter('private, must-revalidate');
  session_cache_expire(60); 

  session_start();
    if(isset($_POST['submit']))
      {   
    
          $id = $_POST['idpost'];
          $_SESSION['idp'] = $id;

          $idpost = $postid;
          $reserve_purpose = $_POST['reserve_purpose'];
          $reserve_year=$_POST['reserve_year'];
          $reserve_month=$_POST['reserve_month'];
          $reserve_day=$_POST['reserve_day'];
          $reserve_time=$_POST['reserve_time'];
          $f_name=$_POST['f_name'];
          $l_name=$_POST['l_name'];
          $p_name=$_POST['p_name'];
          $d_name=$_POST['d_name'];
          $reserve_phone=$_POST['reserve_phone'];
          $reserve_eamil=$_POST['reserve_eamil'];
          $reserve_inquiries=$_POST['reserve_inquiries'];

          $title=$_POST['title'];
          
          $shopname =$_POST['shopname'];

          $_SESSION['shopnames']=$shopname;


          $_SESSION['reserveEamil']=$reserve_eamil;
          
          $sTime = $_POST['starttime'];
          $eTime = $_POST['endtime'];
          $_SESSION['sTime'] = $sTime;
          $_SESSION['eTime'] = $eTime;
    
          require_once 'reservemail.php';

          
      }
      if(!isset($_SESSION['reserveEamil'])) {

        wp_redirect('http://furisode-search.com/reserve/reserve.html');

       }
    

      session_destroy();
?>


<?php get_header(); ?>

    <div class="thanksMail">
    <div class="thank">
           <?php 
              $args = array(
               'p'         => $_SESSION['idp'],
               'post_type' => 'any',
                'posts_per_page' => 1
             );
          
              //echo $_SESSION['idp'];
            query_posts($args);
            while (have_posts()): the_post(); ?>
            
                  <h1>「 <?php echo $shopname; ?>」 来店予約完了</h1>
                  <h2>「 <?php echo $shopname; ?> 」 への来店予約が完了しました♪</h2>

                     <p> ご予約の日時にご来店をお待ちしております。</p>
                     <p> お申し込みありがとうございます。</p>
                     <p> 申し込み内容確認のメールを送信しました。
                     <p> 日程や時間の調整のため、お店よりご連絡させていただくことがあります。</p>
                     <span>
                      ※ご姉妹やお友達と来店される場合、お手数をお掛けいたしますが人数分の予約フォーム送信をお願いいたします。 My振袖からのプレゼントは一予約につき一名分となっておりますので、よろしくお願いいたします。<br>
                      <a href="<?php the_permalink()?>">＜＜ <?php echo $shopname; ?>の詳細ページへ戻る</a>
                     </span>

                  


          
            <?php endwhile?>
       </div>
    </div> 
    

<?php get_footer(); ?>