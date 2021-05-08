<?php
/**
 * this file config meta boxes for theme
 */
// Re-define meta box path and URL
$ruby_template_directory = get_template_directory();

require_once $ruby_template_directory . '/metaboxes/metabox_panels/panel_audio.php';
require_once $ruby_template_directory . '/metaboxes/metabox_panels/panel_gallery.php';
require_once $ruby_template_directory . '/metaboxes/metabox_panels/panel_video.php';
require_once $ruby_template_directory . '/metaboxes/metabox_panels/panel_post.php';
require_once $ruby_template_directory . '/metaboxes/metabox_panels/panel_page.php';
require_once $ruby_template_directory . '/metaboxes/metabox_panels/panel_review.php';
require_once $ruby_template_directory . '/metaboxes/metabox_panels/panel_sidebar.php';
require_once $ruby_template_directory . '/metaboxes/metabox_panels/panel_comment.php';
require_once $ruby_template_directory . '/metaboxes/metabox_panels/panel_credit.php';
require_once $ruby_template_directory . '/metaboxes/metabox_panels/panel_composer.php';


/**
 * @return array
 * meta box config
 */
if ( ! function_exists( 'innovation_ruby_theme_meta_boxes_config' ) ) {
	function innovation_ruby_theme_meta_boxes_config( $meta_boxes ) {

		$meta_boxes[] = innovation_ruby_metabox_single_post();
		$meta_boxes[] = innovation_ruby_metabox_single_page();
		$meta_boxes[] = innovation_ruby_metabox_composer();
		$meta_boxes[] = innovation_ruby_metabox_credit_text();
		$meta_boxes[] = innovation_ruby_metabox_post_review();
		$meta_boxes[] = innovation_ruby_metabox_post_audio();
		$meta_boxes[] = innovation_ruby_metabox_post_video();
		$meta_boxes[] = innovation_ruby_metabox_post_gallery();
		$meta_boxes[] = innovation_ruby_metabox_sidebar();
		$meta_boxes[] = innovation_ruby_metabox_comment_box();

		return $meta_boxes;
	}
};


add_filter( 'rwmb_meta_boxes', 'innovation_ruby_theme_meta_boxes_config' );




