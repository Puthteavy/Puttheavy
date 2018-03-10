<?php ?>

<?php $home_url = get_home_url(); ?>

	 <!-- Footer -->
        <footer id="footerWrapper">
            <div class="footerContent">
                <div class="foot">
                    <div class="mediabox sp">
                        <div class="footSp sp">
                            <!-- <div class="test sp"> -->
                            <div class="icon">
                                <a href="http://www.facebook.com/share.php?u=<full page url to share" onClick="return fbs_click(400, 300)" target="_blank" title="Share This on Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            </div>
                            <div class="icon">
                                <a href="http://twitter.com/share?text=<?php the_title();?>" class="twitter popup">
                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                </a>
                            </div>
                             <div class="icon">
                                 <a href="https://www.instagram.com/">
                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="icon">
                                <?php $pinterestimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
                                <a class="info" target="_blank" data-pin-do="buttonPin" href="https://www.pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo $pinterestimage[0]; ?>&description=<?php the_title(); ?>" data-pin-custom="true">
                                    <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                               </a>
                            </div>
                        <!-- </div> -->
                        </div>
                        <div class="toTopLogo sp">
                            <a href="#top"><img src="<?php echo get_template_directory_uri() ?>/images/pc/main/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="cbox pc">
                        <div class="toTopLogo pc">
                            <a href="#top"><img src="<?php echo get_template_directory_uri() ?>/images/pc/main/logo.png" alt=""></a>
                        </div>
                        <div class="ftmIcon pc">
                            <div class="icon">
                                <a href="http://www.facebook.com/share.php?u=<full page url to share" onClick="return fbs_click(400, 300)" target="_blank" title="Share This on Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            </div>
                            <div class="icon">
                                <a href="http://twitter.com/share?text=<?php the_title();?>" class="twitter popup">
                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="icon">
                            
                            <a href="https://www.instagram.com/">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </a>
                              <script async defer src="//platform.instagram.com/en_US/embeds.js"></script>
                            </div>
                            <div class="icon">
                                <?php $pinterestimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
                                <a class="info" target="_blank" data-pin-do="buttonPin" href="https://pinterest.com/pin/create/bookmarklet/?url=<?php the_permalink(); ?>&media=<?php echo $pinterestimage[0]; ?>&description=<?php the_title(); ?>" data-pin-custom="true">
                                    <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                               </a>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <div class="contentFooter">
                        <div class="footMenu">
                            <ul class="menuFooter">
                                <li><a href="<?php echo get_home_url('/'); ?>">top</a><span> / </span></li>
                                <li><a href="<?php echo get_home_url('/'); ?>/shoplist">shop</a><span> / </span></li>
                                <li><a href="<?php echo get_home_url('/'); ?>/furisode">furisode</a><span> / </span></li>
                                <li><a href="<?php echo get_home_url('/'); ?>/movie">contents</a></li>
                            </ul>
                        </div>
                        <div class="footBox pc">
							                   
							<form name="loginform" id="loginform" action="http://furisode-search.com/wp-login.php" method="post">
								<label>管理店舗ログイン</label>
								<input type="text" name="log" id="user_login" class="input textBox" value="" size="20" placeholder="ID"/>
								<input type="password" name="pwd" id="user_pass" class="input textBox" value="" size="20" placeholder="PASS"/>
								
								<p class="login-submit">
									<input type="submit" name="wp-submit" id="wp-submit" class="button" value="Enter" />
									<input type="hidden" name="redirect_to" value="http://wpsnipp.com" />
								</p>
								
							</form> 

                        </div>
                    </div>
                </div>
                <div class="copyright">
                    <div class="lCopyright pc">
                        <p>&copy; 2017振袖サーチ All Right Reserved.</p>
                    </div>
                    <div class="rCopyright">
                        <ul>
                            <li><a href="<?php echo get_home_url('/'); ?>/guide">利用規約</a></li>
                            <li><a href="<?php echo get_home_url('/'); ?>/resist">新規店舗登録</a></li>
                            <li>
                               <!-- retrive post to reserve form -->
                                <form action="<?php echo get_home_url('/'); ?>/inquiry" method="post">
                                    <!-- <a href="<?php echo get_home_url('/'); ?>/inquiry"">お問合わせ</a> -->

                                    <input type="hidden" name="title" id="title" value="<?php the_title();?>">
                                    <input type="hidden" name="postid" id="postid" value="<?php echo get_the_ID(); ?>" />
                                    <button type="submit" name="send" id="sub" value="submit" class="btnForm"> お問合わせ</button> 
                                
                                </form>

                            </li>
                        </ul>
                    </div>
                    <div class="lCopyright sp">
                        <p>&copy; 2017振袖サーチ All Right Reserved.</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    
<script type="text/javascript" src="http://jpostal-1006.appspot.com/jquery.jpostal.js"></script> 

<script type="text/javascript">
$(window).ready(function() {
    $('#cat_postcode').jpostal({
        postcode : [
            '#cat_postcode',
            
        ],
        address : {
            '#cat_prefecter'  : '%3',
            '#cat_address1'  : '%4%5'
        }
    });
    $('#post_code').jpostal({
        postcode : [
            '#post_code',
            
        ],
        address : {
            '#prefectures'  : '%3',
            '#municipality'  : '%4%5'
        }
    });
    $('#zip').jpostal({
        postcode : [
            '#zip',
            
        ],
        address : {
            '#state'  : '%3',
            '#address'  : '%4%5'
        }
    });
});
</script>
<script>
    // Share Page
    // twitter
      $(function(){ 
        $('.popup').click(function(event) { 
            var width= 575,height = 400, left= ($(window).width()  - width)  / 2, top    = ($(window).height() - height) / 2, url    = $(this).attr('href'),  opts   = 'status=1' +   ',width='  + width  +   ',height=' + height +   ',top='    + top    +   ',left='   + left;  window.open(url, 'twitter', opts);      return false;   
         });   
        
     });
      // Facebook
      function fbs_click(width, height) {
        var leftPosition, topPosition;
        leftPosition = (window.screen.width / 2) - ((width / 2) + 10);
        topPosition = (window.screen.height / 2) - ((height / 2) + 50);
        var windowFeatures = "status=no,height=" + height + ",width=" + width + ",resizable=yes,left=" + leftPosition + ",top=" + topPosition + ",screenX=" + leftPosition + ",screenY=" + topPosition + ",toolbar=no,menubar=no,scrollbars=no,location=no,directories=no";
        u=location.href;
        t=document.title;
        window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),'sharer', windowFeatures);
        return false;
    }
</script>
<?php wp_footer(); ?>
</body>

</html>