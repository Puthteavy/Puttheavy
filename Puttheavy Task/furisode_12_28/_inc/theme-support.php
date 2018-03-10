<?php 

/*

    =============================
        THEME SUPPORT OPTIONS
    =============================
*/

function get_array_of_post( $args ) {
    $arrPosts = array();
    $query = new WP_Query( $args );

    if( $query->have_posts() ) :
        while ( $query->have_posts() ) : $query->the_post();
            $start_date1 = get_field('start_date_f');
            $end_date1 = get_field('end_date_f');
            $title1 = get_field('title_f');
            $description1 = get_field('description_f');

            $start_date2 = get_field('start_date_s');
            $end_date2 = get_field('end_date_s');
            $title2 = get_field('title_s');
            $description2 = get_field('description_s');

            $start_date3 = get_field('start_date_t');
            $end_date3 = get_field('end_date_t');
            $title3 = get_field('title_t');
            $description3 = get_field('description_t');

            $thumb_url = get_the_post_thumbnail_url();
            $post_link = get_permalink();
            $category_post=get_the_category(get_the_ID());
            $cate = $category_post[0]->cat_name;

            $big_start_date = get_biggest_date( $start_date1, $start_date2, $start_date3 );
            $today = strtotime("today");

            if( $start_date1 != '' || $start_date2 != '' || $start_date3 != '') {

                if( $big_start_date == $start_date1 ) { 
                    if( strtotime($end_date1) >= $today ) { 
                        $start_date = $start_date1; $end_date = $end_date1;$title = $title1; $description = $description1;

                    }elseif( $start_date2 > $start_date3 ) {
                        if( strtotime($end_date2) >= $today ) { 
                            $start_date = $start_date2; $end_date = $end_date2; $title = $title2; $description = $description2; 
                        }elseif( strtotime($end_date3) >= $today ) {
                           $start_date = $start_date3; $end_date = $end_date3; $title = $title3; $description = $description3;
                        }else { $start_date = ""; $end_date = ""; }

                    } elseif( strtotime($end_date3) >= $today ) { 
                        $start_date = $start_date3; $end_date = $end_date3; $title = $title3; $description = $description3;
                    } else { $start_date = ""; $end_date = ""; }

                } elseif( $big_start_date == $start_date2 ) {
                    if( strtotime($end_date2) >= $today ) { 
                        $start_date = $start_date2; $end_date = $end_date2; $title = $title2; $description = $description2;
                    }elseif( $start_date1 > $start_date3 ) {

                        if( strtotime($end_date1) >= $today ) { 
                            $start_date = $start_date1; $end_date = $end_date1;$title = $title1; $description = $description1; 
                        }elseif( strtotime($end_date3) >= $today ) { 
                            $start_date = $start_date3; $end_date = $end_date3; $title = $title3; $description = $description3;
                        }else { $start_date = ""; $end_date = ""; }

                    } elseif( strtotime($end_date3) >= $today ) { 
                        $start_date = $start_date3; $end_date = $end_date3; $title = $title3; $description = $description3;
                    }
                    else { $start_date = ""; $end_date = ""; }
                } else {
                    if( strtotime($end_date3) >= $today ) { 
                        $start_date = $start_date3; $end_date = $end_date3;$title = $title3; $description = $description3; 
                    }elseif( $start_date1 > $start_date2 ) {
                        if( strtotime($end_date1) >= $today ) { 
                            $start_date = $start_date1; $end_date = $end_date1; $title = $title1; $description = $description1;
                        }elseif( strtotime($end_date2) >= $today ) {
                            $start_date = $start_date2; $end_date = $end_date2;$title = $title2; $description = $description2;
                        }else { $start_date = ""; $end_date = ""; }

                    } elseif( strtotime($end_date2) >= $today ) { 
                        $start_date = $start_date2; $end_date = $end_date2; $title = $title2; $description = $description2;
                    } else { $start_date = ""; $end_date = ""; }
                }
                
                if( $start_date != "" ) {
                    $arrPosts[] = array(
                        'post' => get_post(), 
                        'title_post' => get_the_title(), 
                        'thumb_url' => $thumb_url, 
                        'post_link' => $post_link,
                        'category_post' => $cate,
                        'start_date1' => $start_date1,
                        'end_date1' => $end_date1,
                        'title1' => $title1,
                        'description1' => $description1,
                        'start_date2' => $start_date2,
                        'end_date2' => $end_date2,
                        'title2' => $title2,
                        'description2' => $description2,
                        'start_date3' => $start_date3,
                        'end_date3' => $end_date3,
                        'title3' => $title3,
                        'description3' => $description3,
                        'start_date' => $start_date,
                        'end_date' => $end_date,
                        'title' => $title,
                        'description' => $description,
                        'biggest_date' => get_biggest_date( $start_date1, $start_date2, $start_date3 ), 

                    );
                }
                
            }
            
            
        endwhile;
        wp_reset_postdata();
    endif;

    return $arrPosts;
}

function get_biggest_date( $date1, $date2, $date3 ) {
    if( $date1 > $date2 ) {
        if( $date1 > $date3 ) {
            return $date1;
        } else {
            return $date3;
        }
    } else {
        return $date2;
    }

    return false;
}

function get_array_of_each_post( $args ) {
    $arrPosts = array();
    $query = new WP_Query( $args );

    if( $query->have_posts() ) :
    while ( $query->have_posts() ) : $query->the_post();
       
            $start_date1 = get_field('start_date_f');
            $end_date1 = get_field('end_date_f');
            $title1 = get_field('title_f');
            $description1 = get_field('description_f');

            $start_date2 = get_field('start_date_s');
            $end_date2 = get_field('end_date_s');
            $title2 = get_field('title_s');
            $description2 = get_field('description_s');

            $start_date3 = get_field('start_date_t');
            $end_date3 = get_field('end_date_t');
            $title3 = get_field('title_t');
            $description3 = get_field('description_t');

            $thumb_url = get_the_post_thumbnail_url();
            $post_link = get_permalink();
            $category_post=get_the_category(get_the_ID());
            $cate = $category_post[0]->cat_name;

            if( $start_date1 != '' || $start_date2 != '' || $start_date3 != '' ) { 
                for($i = 1; $i <= 3; $i++) {
                    if( $i == 1 ) { $start_date = $start_date1; $end_date = $end_date1; $title = $title1; $description = $description1; }
                    if( $i == 2 ) { $start_date = $start_date2; $end_date = $end_date2; $title = $title2; $description = $description2; }
                    if( $i == 3 ) { $start_date = $start_date3; $end_date = $end_date3; $title = $title3; $description = $description3; }
                    $startTimeStamp = strtotime("today");
                    $endTimeStamp = strtotime($end_date);
                    if($endTimeStamp >= $startTimeStamp){
                        $arrPosts[] = array( 
                        'title_post' => get_the_title(), 
                        'thumb_url' => $thumb_url, 
                        'post_link' => $post_link,
                        'category_post' => $cate,
                        'start_date' => $start_date,
                        'end_date' => $end_date,
                        'title' => $title,
                        'description' => $description, 
                    );
                }

                    
                }
            }

        endwhile;
        wp_reset_postdata();
    endif;

    return $arrPosts;
}

function get_cats_by_slug($catslugs) {
    $catids = array();
    foreach($catslugs as $slug) {
        $catids[] = get_category_by_slug($slug)->term_id; //store the id of each slug in $catids
    }
    return $catids;
}

function get_posts_by_paymentshop_role($role) {
    global $wpdb;
    return $wpdb->get_results( "SELECT p.* FROM {$wpdb->posts} p, {$wpdb->usermeta} u"
                                ." WHERE    p.post_type     = 'post'"
                                ." AND      p.post_status   = 'publish'"
                                ." AND      u.user_id       = p.`post_author`"
                                ." AND      u.meta_key      = 'wp_capabilities'"
                                ." AND      u.meta_value    LIKE '%\"{$role}\"%' ORDER BY id DESC LIMIT 9" );
}

function my_acf_google_map_api( $api ){

    $api['key'] = 'AIzaSyDlk-giJEsgTl5Az1uXnVwo8rMEc9A_7vg';

    return $api;

}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

function post_title( $atts = array(), $content = null ) {

    $output = the_title();

    return $output;

}
add_shortcode('post-title', 'post_title');

function shop_title( $atts = array(), $content = null ) {

    $output = the_title();

    return $output;

}
add_shortcode('shop-title', 'shop_title');

//remove  role

function remove_built_in_roles() {
    global $wp_roles;

    $roles_to_remove = array('subscriber', 'contributor', 'author', 'editor','Pending');

    foreach ($roles_to_remove as $role) {
        if (isset($wp_roles->roles[$role])) {
            $wp_roles->remove_role($role);
        }
    }
}
add_action('admin_menu', 'remove_built_in_roles');

/* Remove permission */

add_filter( 'views_edit-post', function( $views )
{
    if( current_user_can( 'manage_options' ) )
        return $views;

    $remove_views = [ 'all','publish', 'trash'];

    foreach( (array) $remove_views as $view )
    {
        if( isset( $views[$view] ) )
            unset( $views[$view] );
    }
    return $views;
} );

add_action( 'pre_get_posts', function( \WP_Query $q )
{
    if(
        is_admin()
        && $q->is_main_query()
        && 'edit-post' === get_current_screen()->id
        && ! current_user_can( 'manage_options' )
    )
        $q->set( 'Paymentshop, Freeshop ', get_current_user_id() );
} );

/* ================= pagination ======================= */

function getStartEndPage($total,$currentPage,$number = 4){
    $start = 0;
    $end = 0;

    if($total <= 2 * $number + 1 || $currentPage <= $number + 1)
    {
        $start = 1;
        $end = 2 * $number + 1;
    }
    else
    {
        if($currentPage > $number + 1)
        {
            $end = $currentPage + $number;
            $start = $currentPage - $number;
        }

        if($currentPage > $total - $number)
        {
            $end = $total;
            $start = $total - 2 * $number;
        }

    }

    $start = $start < 1 ? 1 : $start;
    $end = $end > $total ? $total : $end;

    return [$start,$end];

}


// user role
function get_author_role()
{
    global $authordata;

    $author_roles = $authordata->roles;
    $author_role = array_shift($author_roles);

    return $author_role;
}

// login form logo
function my_login_logo() { ?>
  <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/pc/slide/Logo_search3.png);
            height: 75px;
            width: 233px;
            background-size: 233px 97px;
            background-repeat: no-repeat;
            padding-bottom: 30px;
        }
        #login p{
            font-size: 12px;
            text-align: left;
            line-height: 1.5em;
            padding-bottom: 10px;
        }
    </style> 
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

// add text login page
function login_textmessage( $message ) {
    if ( empty($message) ){
        return "<p>ログイン後、「ダッシュボード」というページにすすみますが 左側のメニューから、店舗登録に進み、店舗の詳細を設定して下さい。</p>";
    } else {
        return $message;
    }
}
add_filter( 'login_message', 'login_textmessage' );

// change wp admin style
function my_custom_fonts() {?>
  <style>
        #poststuff .stuffbox>h3, #poststuff h2, #poststuff h3.hndle{
            font-size: 13px;
            padding: 8px 8px;
            margin: 0;
            line-height: 1.4;
        }
        #poststuff .stuffbox>h3, #poststuff h2, #poststuff h3.hndle{font-size: 13px; }
  </style>

<?php }

add_action('admin_head', 'my_custom_fonts');
// .................................................

//change text at admin menu label
    
function dashboard_name(){
    if ( $GLOBALS['title'] != 'ダッシュボード' ){
        return;
    }

    $GLOBALS['title'] =  __( '管理画面' ); 
}

add_action( 'admin_head', 'dashboard_name' );

// Rename Posts to new text in Menu
function change_post_menu_label() {
    global $menu;
    $menu[5][0] = '店舗名登録';  //post
    $menu[2][0] = '管理画面';  //dashboard  
}

add_action( 'init', 'change_post_object_label' );

function change_post_object_label() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = '店舗名登録';
    $labels->singular_name = '店舗名登録';
    $labels->edit_item = '店舗名登録';
    $labels->new_item = '店舗名登録';   
}

add_action( 'admin_menu', 'change_post_menu_label' );
    
// add text to wp-admin 
 
function wpse_53035_script_enqueuer(){
    echo <<<HTML
    <style type="text/css">
        #dashboard-widgets-wrap {display:none;}
        .box{ width: 100%;text-align: left;margin: 8px 0px;font-size: 16px;color: #666;}
    </style>
    <script type="text/javascript">
        jQuery(document).ready( function($) {
            $('#dashboard-widgets-wrap').delay(100).fadeTo('fast',1);

            $('<div class="box">左側のメニューから、店舗登録に進み、店舗の詳細を設定して下さい。</div>').insertBefore('#dashboard-widgets-wrap');

        });     
    </script>
HTML;
}
add_action('admin_head-index.php', 'wpse_53035_script_enqueuer');


function addtext_adminpage()
{
    global $post, $pagenow;
    if ( ! in_array($pagenow ,array('post-new.php'  ,'post.php' )
    ) )
       return;
    if ( ! in_array( $post->post_type ,array( 'post' ,'page')) )
        return;
    
    echo <<<HTML
    <script type="text/javascript">
        jQuery(document).ready( function($) {
            
            $('<div class="test">＊下のフリースペースに店舗の説明文をいれ、そのスペース内にメディア（画像）を追加できます。</div>').insertAfter('#wp-content-media-buttons');
            //下のフリースペースに店舗の説明分をいれ、そのスペース内にメディアを追加できます。
        });

    </script>
    <style>
        .test{width: 100%;text-align: left;margin: 6px 0px;font-size: 13px;color: #666; float: left;overflow: hidden;}
    </style>
HTML;

}

add_action( 'all_admin_notices', 'addtext_adminpage' );

// link button in media model

function upload_window_additions() {?>

   <?php $id = $_GET['post'];?>
   <script type="text/javascript">
       jQuery(document).ready( function($) {
            jQuery('.media-frame-title').append('<div class="close_btn"><a href="<?php echo get_home_url('/'); ?>/wp-admin/post.php?post=<?php echo $id;?>&action=edit">管理画面に戻る</a></div>');
            jQuery('.media-menu-item').each(function(){
               jQuery(this).bind("click",function(){
                 if(jQuery('.close_btn').length > 1){
                    jQuery('.close_btn').slice(1).remove();
                    jQuery('.close_btn:nth-of-type(2)').remove();
                 }
                 
               });
            });
            
        });
   </script>
   <style type="text/css">
       .close_btn2{ display: none; }
       .close_btn:nth-of-type(2){ display: none; }
       .close_btn{float: left;  padding: 9px;background-color: #008ec2; color: #fff;  margin-top: 10px;
        font-size: 15px; margin-bottom: 10px;  overflow: hidden; cursor: pointer; }
       .close_btn a{color:#fff; border:none; text-decoration: none; }
       .close_btn a:hover{color:#fff; }
   </style> 
<?php }
add_action( 'post-upload-ui', 'upload_window_additions' );

// bigger close btn
add_action('admin_head', function(){?>
    <style type="text/css">
       
       .media-frame-title h1{ padding: 0 16px; font-size: 22px; line-height: 50px; margin: 0; max-width: 319px;float: left; }
        .media-modal-close .media-modal-icon:before { content: "\f158";font: 400 50px/1 dashicons;speak: none;vertical-align: middle;-webkit-font-smoothing: antialiased;-moz-osx-font-smoothing: grayscale;} 
        /*add * to custom field in media uploader*/
        span.alignleft:after{content: '*'; color: red;  padding-left: 5px; }
    </style>
    <script type="text/javascript">
        jQuery(document).ready(function(){
            jQuery(".hndle").text(function(index, text) {
                return text.replace('リビジョン', 'リビジョン 更新履歴 *店舗の情報を入力・再入力したら必ず右上の青い「更新」ボタンをおして入力完了して下さい ');
            });

        });
    </script>
   
<?php });

//Hide categories from WordPress category widget============================================

function category_terms_exclusions($exclusions,$args) {
    return $exclusions . " AND ( t.term_id <> 55 ) AND ( t.term_id <> 52 )  AND ( t.term_id <>67 ) AND ( t.term_id <> 53 ) AND ( t.term_id <> 56 ) AND ( t.term_id <> 66 ) AND ( t.term_id <> 60 )";
}
function category_exclusion() {
    if( current_user_can('freeshop')){
        add_filter( 'list_terms_exclusions', 'category_terms_exclusions', 10, 2 );
    }
    if( current_user_can('paymentshop')){
        add_filter( 'list_terms_exclusions', 'category_terms_exclusions', 10, 2 );
    }    
}
add_action( 'admin_init', 'category_exclusion' );


function cat_exclus($exclusions,$args) {
    return $exclusions . " AND ( t.term_id <> 55 ) AND ( t.term_id <> 52 )  AND ( t.term_id <>67 ) AND ( t.term_id <> 66 ) AND ( t.term_id <> 60)";
    // event, recommend, furisode,shoplist
}
function admin_hide_cat(){
     if( current_user_can('administrator')){
        add_filter( 'list_terms_exclusions', 'cat_exclus', 10, 2 );
    } 
}
add_action( 'admin_init', 'admin_hide_cat' );

// hidden some block
function my_remove_menu_pages() {
 
    if ( current_user_can( 'freeshop' ) ) {
        add_filter( 'admin_head', 'freeshop_adminHead', 10, 2 );
    }
    if(current_user_can('paymentshop')){
       add_filter( 'admin_head', 'freeshop_adminHead', 10, 2 ); 
    }
}
function freeshop_adminHead(){?>
<style type="text/css">

    #edit-slug-box{display: none !important; visibility: hidden;opacity: 0;}/*hide permalink*/
    #minor-publishing { display: none !important; visibility: hidden;opacity: 0;} /*hide publish block*/
    a[href="http://disputebills.com/wp-admin/profile.php"], a[href="profile.php"]{
        display: none !important;
        opacity: 0;
       
    }
   /* .dashicons-video-alt3{
    display:none;
    }*/
    /*hide movie in menu admin*/
   ul#adminmenu li:nth-of-type(2){
   display:none; 
   }
   ul#adminmenu li:nth-of-type(3){
   display:none; 
   }
    #adminmenu li.menu-top{
         min-height: 0px;
    }
</style>
<script type="text/javascript">
    jQuery(document).ready( function($) {
        jQuery('#edit-slug-box').hide();
        jQuery('#minor-publishing').hide();
        // jQuery(".wp-menu-name").text(function(index, text) {
        //         return text.replace('ムービー', ' ');
        //     });
    });
</script>

<?php }

add_action( 'admin_init', 'my_remove_menu_pages' );

function remove_menus(){
  
  remove_menu_page( 'index.php' );                  //Dashboard 
}
add_action( 'admin_menu', 'remove_menus' );

// .........................................................................................

//feature image


function feature_image() {

    if (!current_user_can('freeshop') ) {
       add_theme_support( 'post-thumbnails' ); 
       add_filter( 'admin_post_thumbnail_html', 'add_featured_image_instruction'); 
       add_action('do_meta_boxes', 'replace_featured_image_box');  
    }  
}
add_action( 'admin_init', 'feature_image' );
//change set feature image
 function add_featured_image_instruction( $content ) {     
   return str_replace(__('アイキャッチ画像'), __('店舗画像'),$content);
}
//change meta feature image
function replace_featured_image_box(){  
    remove_meta_box( 'postimagediv', 'post', 'side' );  
    add_meta_box('postimagediv', __('店舗画像「※推奨サイズ：縦横460px」'), 'post_thumbnail_meta_box', 'post', 'side', 'low');  
}  


// hide prfile link with role !administrator
add_action( 'load-profile.php', function() {
    if( ! current_user_can( 'administrator' ) )
        exit( wp_safe_redirect( admin_url() ) );
} );



function themeslug_query_shop_title( $qvars ) {
  $qvars[] = 'shop_title';
  return $qvars;
}
add_filter( 'query_vars', 'themeslug_query_shop_title' );

// ..............................................................

function title_shop_field( $form_fields, $post ) {
    $per = get_permalink( $post->post_parent );
    $title = get_the_title($post->post_parent);
    $field_key = "field_5a178d8fe1921";
    $field = get_field_object($field_key);
   
    $form_fields['title_shop'] = array(
        'label' => 'Shop Title',
        'input' => 'text',
        'value' => $title,
    );
    
   return $form_fields;  
    
}
add_filter( 'attachment_fields_to_edit', 'title_shop_field', 10, 2 );

function shop_save( $post, $attachment ) {
    if (isset( $attachment['title_shop'] ) ){
        update_post_meta( $post['ID'], 'title_shop', $attachment['title_shop'] );
    } 

    return $post;
}
add_filter( 'attachment_fields_to_save', 'shop_save', 10, 2 );
// add custom field 
//add attachment to media uploader
function attachment_custom_field_edit( $form_fields, $post ) {
    $form_fields['colors'] = array(
        'label' => '色',
        'input' => 'html',
    );
    $current_photog = get_post_meta($post->ID, 'colors', true);
    if ( !isset($current_photog) ) {
        $current_photog = 0;    
    }
    $form_fields['colors']['html'] = '<select name="attachments['.$post->ID.'][colors]" id="attachments['.$post->ID.'][colors]">';
    $form_fields['colors']['html'] .= '<option value="" '.selected(0, $current_photog, false).'>選択してください</option>';

    $field_key = "field_5950b351f292d";
    $field = get_field_object($field_key);
   
    foreach( $field['choices'] as $k => $v )
    {  
        setup_postdata($v);
        if($k == '選択してください') continue;
         $form_fields['colors']['html'] .= '<option value="'.$k.'" '.selected($k, $current_photog, false).'>'.$v.'</option>';
    }
    $form_fields['colors']['html'] .= '</select>'; 

   
    // ranking pattern
    $form_fields['patterns'] = array(
        'label' => '柄',
        'input' => 'html',
    );
    $current_photog = get_post_meta($post->ID, 'patterns', true);
    if ( !isset($current_photog) ) {
        $current_photog = 0;    
    }
    $form_fields['patterns']['html'] = '<select name="attachments['.$post->ID.'][patterns]" id="attachments['.$post->ID.'][patterns]">';
    $form_fields['patterns']['html'] .= '<option value="" '.selected(0, $current_photog, false).'>選択してください</option>';

    $field_key = "field_5950b39cf292f";
    $field = get_field_object($field_key);
   
    foreach( $field['choices'] as $k => $v )
    {  
        setup_postdata($v);
        if($k == '選択してください') continue;
         $form_fields['patterns']['html'] .= '<option value="'.$k.'" '.selected($k, $current_photog, false).'>'.$v.'</option>';
    }
    $form_fields['patterns']['html'] .= '</select>'; 

    // ranking_type
    $form_fields['types'] = array(
        'label' => 'テイスト',
        'input' => 'html',
    );
    $current_photog = get_post_meta($post->ID, 'types', true);
    if ( !isset($current_photog) ) {
        $current_photog = 0;    
    }
    $form_fields['types']['html'] = '<select name="attachments['.$post->ID.'][types]" id="attachments['.$post->ID.'][types]">';
    $form_fields['types']['html'] .= '<option value="" '.selected(0, $current_photog, false).'>選択してください</option>';

    $field_key = "field_5950b37cf292e";
    $field = get_field_object($field_key);
   
    foreach( $field['choices'] as $k => $v )
    {  
        setup_postdata($v);
        if($k == '選択してください') continue;
         $form_fields['types']['html'] .= '<option value="'.$k.'" '.selected($k, $current_photog, false).'>'.$v.'</option>';
    }
    $form_fields['types']['html'] .= '</select>'; 


    return $form_fields;
    

}
add_filter( 'attachment_fields_to_edit', 'attachment_custom_field_edit', 10, 2 );

function attachment_custom_field_save( $post, $attachment ) {
    if (isset( $attachment['patterns'] ) ){
        update_post_meta( $post['ID'], 'patterns', $attachment['patterns'] );
    } 

    if(isset( $attachment['types'] ) ){
        update_post_meta( $post['ID'], 'types', $attachment['types'] );
    }

    if(isset( $attachment['colors'] ) ){
        update_post_meta( $post['ID'], 'colors', $attachment['colors'] );
    }
    
    return $post;
}
add_filter( 'attachment_fields_to_save', 'attachment_custom_field_save', null, 2 );
