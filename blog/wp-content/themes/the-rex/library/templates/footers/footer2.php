    		<?php 
                global $bk_justified_ids, $bk_ajax_btnstr, $bk_option;
                $bk_ajax_btnstr['loadmore'] = esc_html__('Load More', 'the-rex');
                $bk_ajax_btnstr['nomore'] = esc_html__('No More Posts', 'the-rex');
                wp_localize_script( 'bk-module-load-post', 'ajax_btn_str', $bk_ajax_btnstr );
                
                wp_localize_script( 'bk-customjs', 'justified_ids', $bk_justified_ids );

                wp_localize_script( 'bk-customjs', 'ajax_c', bk_section_parent::$bk_ajax_c );
                
                if (isset($bk_option['bk-smooth-scroll'])) {
                    $bkSmoothScroll['status'] = $bk_option['bk-smooth-scroll'];
                }else {
                    $bkSmoothScroll['status'] = 0;
                }
                wp_localize_script( 'bk-theme-plugins', 'bkSmoothScroll', $bkSmoothScroll );
                
                $access_token = apply_filters('bk-footer-instagram-token', $bk_option['bk-footer-instagram-token']);
            	$amount = 8;
                
                $json_link = "https://api.instagram.com/v1/users/self/media/recent/?";
                $json_link .="access_token={$access_token}&count={$amount}";
                $json = file_get_contents($json_link);
                $obj = json_decode(preg_replace('/("\w+"):(\d+)/', '\\1:"\\2"', $json), true);
                                                        
    			$photostream_title = $bk_option['bk-footer-instagram-title'];

                if (isset($bk_option)):
                    $fixed_nav = $bk_option['bk-fixed-nav-switch'];            
                    wp_localize_script( 'bk-customjs', 'fixed_nav', $fixed_nav );
                    
                    $bk_allow_html = array(
                                            'a' => array(
                                                'href' => array(),
                                                'title' => array()
                                            ),
                                            'br' => array(),
                                            'em' => array(),
                                            'strong' => array(),
                                        );
                    $cr_text = $bk_option['cr-text'];
                endif;
            ?>
            <div class="footer_photostream_wrapper">
            	<h3><span><?php echo esc_html($photostream_title); ?></span></h3>
            	<ul class="footer_photostream clearfix">
            		<?php
                        foreach ($obj['data'] as $post){
                            $pic_link = $post['link'];
                            $pic_src=str_replace("http://", "https://", $post['images']['standard_resolution']['url']);
                            echo '<li class="instagram-item">';
                                echo "<a href='{$pic_link}' target='_blank' alt='instagram-img'>";
                                  echo "<img class='img-responsive photo-thumb' src='{$pic_src}' alt='instagram-img'>";
                                echo "</a>";
                            echo "</li>";
                        }
                    ?>
            	</ul>
            </div>
            <div class="footer footer-2">
                <?php if (is_active_sidebar('footer_sidebar_1') 
                        || is_active_sidebar('footer_sidebar_2')
                        || is_active_sidebar('footer_sidebar_3')) { ?>
                <div class="footer-content bkwrapper clearfix container">
                    <div class="row">
                        <div class="footer-sidebar col-md-4">
                            <?php dynamic_sidebar( 'footer_sidebar_1' ); ?>
                        </div>
                        <div class="footer-sidebar col-md-4">
                            <?php dynamic_sidebar( 'footer_sidebar_2' ); ?>
                        </div>
                        <div class="footer-sidebar col-md-4">
                            <?php dynamic_sidebar( 'footer_sidebar_3' ); ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <div class="footer-lower">
                    <div class="container">
                        <div class="footer-inner clearfix">
                            <?php if ( has_nav_menu('menu-footer') ) {?> 
                                <?php wp_nav_menu(array('theme_location' => 'menu-footer', 'depth' => '1', 'container_id' => 'footer-menu'));?>  
                            <?php }?>  
                            <div class="bk-copyright"><?php echo wp_kses($cr_text, $bk_allow_html);?></div>
                        </div>
                    </div>
                </div>
                <?php 
                    global $customconfig;
                    wp_localize_script( 'bk-customjs', 'customconfig', $customconfig );
                ?>
                
    		</div>
        </div> <!-- Close Page inner Wrap -->

	</div> <!-- Close Page Wrap -->
    <?php wp_footer(); ?>
</body>

</html>