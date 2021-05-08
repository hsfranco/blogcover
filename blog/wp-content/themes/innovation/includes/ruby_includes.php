<?php

##################################################
###                                            ###
###       THEME CONFIGS & INITIALIZE           ###
###                                            ###
##################################################

$ruby_template_directory = get_template_directory();

//init
if ( ! function_exists( 'is_plugin_active' ) ) {
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}

//including theme options config value file
require_once $ruby_template_directory . '/includes/ruby_core/ruby_theme_config.php';

//Including recommended theme plugins
require_once $ruby_template_directory . '/includes/admin/ruby_plugins.php';


##################################################
###                                            ###
###         META BOX & THEME OPTIONS           ###
###                                            ###
##################################################

//including redux framework & theme options
require_once $ruby_template_directory . '/theme_options/ruby_redux_config.php';
require_once $ruby_template_directory . '/theme_options/ruby_redux_default.php';

// Load custom metabox config
require_once $ruby_template_directory . '/metaboxes/ruby_metabox_config.php';

//including css and js files back end
require_once $ruby_template_directory . '/includes/admin/ruby_enqueue_admin.php';

//include custom tinymce
require_once $ruby_template_directory . '/includes/admin/tinymce/tinymce_action.php';

//including css and js files front end
require_once $ruby_template_directory . '/includes/ruby_core/ruby_enqueue.php';


##################################################
###                                            ###
###              THEME CORE FILES              ###
###                                            ###
##################################################

//including theme core
require_once $ruby_template_directory . '/includes/ruby_core/ruby_util.php';
require_once $ruby_template_directory . '/includes/ruby_core/ruby_query.php';
require_once $ruby_template_directory . '/includes/ruby_core/ruby_schema.php';

//including mega menu
require_once $ruby_template_directory . '/includes/menu/ruby_frontend_mega_menu.php';
require_once $ruby_template_directory . '/includes/menu/ruby_backend_mega_menu.php';


//retina support
require_once $ruby_template_directory . '/includes/ruby_core/ruby_retina.php';


//including theme function
require_once $ruby_template_directory . '/includes/ruby_core/ruby_ads_support.php';
require_once $ruby_template_directory . '/includes/ruby_core/ruby_post_format.php';
require_once $ruby_template_directory . '/includes/ruby_core/ruby_post_views.php';
require_once $ruby_template_directory . '/includes/ruby_core/ruby_post_review.php';
require_once $ruby_template_directory . '/includes/ruby_core/ruby_dynamic_css.php';
require_once $ruby_template_directory . '/includes/ruby_core/ruby_featured.php';
require_once $ruby_template_directory . '/includes/ruby_core/ruby_action.php';
require_once $ruby_template_directory . '/includes/ruby_core/ruby_post_unique.php';
require_once $ruby_template_directory . '/includes/ruby_core/ruby_post_related.php';

require_once $ruby_template_directory . '/includes/ruby_core/ruby_ajax.php';

//including woo
if ( class_exists( 'Woocommerce' ) ) {
	require_once $ruby_template_directory . '/includes/ruby_core/ruby_woocommerce.php';
}


##################################################
###                                            ###
###              SOCIALS & SHARES              ###
###                                            ###
##################################################

require_once $ruby_template_directory . '/includes/socials/ruby_social_data.php';
require_once $ruby_template_directory . '/includes/socials/ruby_social_bar.php';


//including pages & post functions
require_once $ruby_template_directory . '/includes/ruby_core/ruby_single.php';
require_once $ruby_template_directory . '/includes/ruby_core/ruby_page.php';


##################################################
###                                            ###
###             SIDEBAR * WIDGETS              ###
###                                            ###
##################################################

//including sidebar section
require_once $ruby_template_directory . '/includes/sidebar/ruby_multi_sidebar.php';
require_once $ruby_template_directory . '/includes/sidebar/ruby_sidebar_sections.php';


##################################################
###                                            ###
###              TEMPLATE PARTS                ###
###                                            ###
##################################################
require_once $ruby_template_directory . '/templates/ruby_template_part.php';
require_once $ruby_template_directory . '/templates/ruby_blog_layout.php';
require_once $ruby_template_directory . '/templates/thumbnails/ruby_thumbnail.php';

//composer latest blog listing
require_once $ruby_template_directory . '/templates/ruby_template_composer_loop.php';

//meta category
require_once $ruby_template_directory . '/templates/meta/el-category.php';

require_once $ruby_template_directory . '/templates/blog/blog_style_1.php';
require_once $ruby_template_directory . '/templates/blog/blog_style_2.php';
require_once $ruby_template_directory . '/templates/blog/blog_style_3.php';
require_once $ruby_template_directory . '/templates/blog/blog_style_4.php';
require_once $ruby_template_directory . '/templates/blog/blog_style_5.php';
require_once $ruby_template_directory . '/templates/blog/blog_style_6.php';
require_once $ruby_template_directory . '/templates/blog/blog_style_7.php';
require_once $ruby_template_directory . '/templates/blog/blog_style_8.php';

//single layout
require_once $ruby_template_directory . '/templates/ruby_single_layout.php';

//including page composer
require_once $ruby_template_directory . '/includes/ruby_composer/ruby_composer.php';

//block layouts
require_once $ruby_template_directory . '/templates/block/ruby_block.php';
require_once $ruby_template_directory . '/templates/block/block_fw_slider_grid.php';
require_once $ruby_template_directory . '/templates/block/block_fw_slider.php';
require_once $ruby_template_directory . '/templates/block/block_fw_slider_hw.php';
require_once $ruby_template_directory . '/templates/block/block_fw_carousel_hw.php';
require_once $ruby_template_directory . '/templates/block/block_fw_carousel.php';
require_once $ruby_template_directory . '/templates/block/block_fw_carousel_small.php';
require_once $ruby_template_directory . '/templates/block/block_fw_block_1.php';
require_once $ruby_template_directory . '/templates/block/block_fw_block_2.php';
require_once $ruby_template_directory . '/templates/block/block_fw_block_3.php';
require_once $ruby_template_directory . '/templates/block/block_fw_block_code.php';
require_once $ruby_template_directory . '/templates/block/block_fw_ad_box.php';
require_once $ruby_template_directory . '/templates/block/block_hs_block_1.php';
require_once $ruby_template_directory . '/templates/block/block_hs_block_2.php';
require_once $ruby_template_directory . '/templates/block/block_hs_block_3.php';
require_once $ruby_template_directory . '/templates/block/block_hs_block_4.php';
require_once $ruby_template_directory . '/templates/block/block_hs_block_5.php';
require_once $ruby_template_directory . '/templates/block/block_hs_block_6.php';
require_once $ruby_template_directory . '/templates/block/block_hs_block_7.php';
require_once $ruby_template_directory . '/templates/block/block_hs_block_8.php';
require_once $ruby_template_directory . '/templates/block/block_hs_block_9.php';
require_once $ruby_template_directory . '/templates/block/block_hs_block_code.php';
require_once $ruby_template_directory . '/templates/block/block_hs_ad_box.php';