<?php
    $paged = isset($_POST['mypage']) ? $_POST['mypage'] : 1;
    $post_count = 0;
    $per_page = 3; 
?>
<?php

if(!isset($_POST['mypage'])) {
     $args = array(
        'category__not_in' => array(53,56),
        'posts_per_page' => -1,
        'post_type' => 'post', 
        'fields' => 'id',  
    );
    $arr_posts = get_array_of_each_post( $args ); 

    foreach ($arr_posts as $key => $row) {
        $startDate[$key]  = $row['start_date'];

    } 
    array_multisort($startDate, SORT_ASC, $arr_posts);
    $post_count=count($arr_posts);
    
}
?>

<?php get_header(); ?>
<div id="shopListWrapper">
    <div id="wrapEvent">
        <div class="navLink">
             <?php if (function_exists('qt_custom_breadcrumbs')) qt_custom_breadcrumbs(); ?>
        </div>
        <div class="eventNewsWrap">
            <div class="enTitle">
                <h2><img src="<?php echo get_template_directory_uri() ?>/images/pc/main/title_event.png" class="eventTitle" alt=""></h2>
                <p>イベント情報</p>
            </div>

            <div class="pcEvent"><h2 id="arr_posts">EVENTS LIST</h2></div>
            <section id="event">
                <?php  
                    $args = array(
                        'category__not_in' => array(53,56),
                        'posts_per_page' => -1,
                        'post_type' => 'post', 
                        'meta_query' => array(
                            'relation' => 'AND',
                            array(
                                'key' => 'start_date_f',
                                'value' =>'',
                                'compare' =>'NOT IN',
                            ),
                            array(
                                'key' => 'start_date_s',
                                'value' =>'',
                                'compare' =>'NOT IN',
                            ),
                            array(
                                'key' => 'start_date_t',
                                'value' =>'',
                                'compare' =>'NOT IN',
                            ),

                        ),
                        
                    );   
                   
                    $arr_posts = get_array_of_each_post( $args );
                    //echo count($arr_posts);

                    foreach ($arr_posts as $key => $row) {
                        $startDate[$key]  = $row['start_date'];

                    } 
                    array_multisort($startDate, SORT_ASC, $arr_posts);
                ?>

                <?php if( count($arr_posts) ) : ?>
                   
                    <?php for($i = 0; $i < count($arr_posts); $i++ ) : ?>
                        <?php  //if($i==$per_page){ break;} ?>
                        <div class="enBox">  

                            <div class="eventDetailPage">
                                <?php if( $arr_posts[$i]['thumb_url'] != "" ) : ?>
                                    <div class="catTitle sp">
                                        <div class="eTitleName">
                                            <h3><?php echo $arr_posts[$i]['title_post']; ?></h3>
                                        </div>
                                    </div>
                                    <div class="enImg">
                                        <a href="<?php echo $arr_posts[$i]['post_link']; ?>" rel="bookmark">
                                            <img src="<?php echo $arr_posts[$i]['thumb_url']; ?>" alt="">
                                        </a>
                                    </div>
                                <?php else:  ?>
                                    <div class="enImg">
                                        <a href="<?php echo $arr_posts[$i]['post_link']; ?>"><img src="<?php echo get_template_directory_uri() ?>/images/pc/main/rec_img01.png" width="300" height="200"></a>
                                        
                                    </div>
                                <?php endif;?>

                                <div class="enDetailBlock">

                                    <div class="en01">
                                        <div class="eventDates">
                                            
                                            <div class="eventTop">
                                               <span>【開催期間】 </span>
                                                <p><?php echo $arr_posts[$i]['start_date'].'  ~  '.$arr_posts[$i]['end_date']; ?></p>
                                                
                                            </div>
                                            <div class="eventDes"> 
                                                <h3 class="pc"><?php echo $arr_posts[$i]['title_post']; ?></h3>
                                                <h5><?php echo $arr_posts[$i]['title']; ?></h5>
                                                <p><?php echo mb_substr($arr_posts[$i]['description'], 0, 150,'utf-8'); ?></p>
                                            </div>
                                        </div><!-- /eventDates -->
                                        <div class="cal_dates">
                                            <h3><?php echo $arr_posts[$i]['category_post']; ?></h3> 
                                             
                                            <?php
                                                $c1=$arr_posts[$i]['start_date'];
                                                $c2=$arr_posts[$i]['end_date'];  

                                                $startTimeStamp = strtotime("today");
                                                $endTimeStamp = strtotime($c2);
                                                
                                                    if($endTimeStamp > $startTimeStamp){
                                                      $timeDiff = abs($endTimeStamp - $startTimeStamp);
                                                      $numberDays = $timeDiff/86400; 
                                                      $numberDays = intval($numberDays);
                                                      echo '<div class="cal_boxs"><p>あと</p><p>'.$numberDays.' <span>日</span></p><p>で終了</p></div>';
                                                    }elseif($endTimeStamp < $startTimeStamp){
                                                     
                                                     echo '<div class="cal_boxs"><span>終了<br>しました</span></div>';
                                                    }else{
                                                      echo '<div class="cal_boxs"><span>本日<br>終了</span></div>';
                                            }?>

                                        </div><!-- /cal_dates -->
                                    </div><!-- /en01 -->

                                </div><!-- /enDetailBlock -->

                            </div><!-- /eventDetailPage -->
                        
                        </div><!-- /enBox -->

                    <?php endfor; ?>

                <?php endif; ?>
                
            </section>
            <!-- <div class="pageGination">
                <a href="#">PRE</a>
                <a href="#" class="pagegi activePagi">1</a>
                <a href="#" class="pagegi">2</a>
                <a href="#" class="pagegi">3</a>
                <a href="#">NEXT</a>
            </div> -->
        </div>
    </div>
</div>
<?php get_footer(); ?>