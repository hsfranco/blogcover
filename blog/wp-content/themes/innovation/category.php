<?php
/**
 * Innovation created by ThemeRuby
 * This file display category layout
 */

//header
get_header();

//get blog options
$ruby_cate_id                     = innovation_ruby_util::get_page_cate_id();
$ruby_options                     = array();
$ruby_options['page_layout']      = innovation_ruby_util::get_theme_option( 'category_layout_' . $ruby_cate_id );
$ruby_options['sidebar_name']     = innovation_ruby_util::get_theme_option( 'category_sidebar_' . $ruby_cate_id );
$ruby_options['sidebar_position'] = innovation_ruby_util::get_theme_option( 'category_sidebar_position_' . $ruby_cate_id );
if ( 'default' == $ruby_options['sidebar_position'] || empty( $ruby_options['sidebar_position'] ) ) {
	$ruby_options['sidebar_position'] = innovation_ruby_util::get_theme_option( 'site_sidebar_position' );
}
$ruby_options['big_first'] = innovation_ruby_util::get_theme_option( 'category_post_first_' . $ruby_cate_id );

//category header
$ruby_cate_header_style = innovation_ruby_util::get_theme_option( 'category_header_style_' . $ruby_cate_id );

//get header
if ( 1 == $ruby_cate_header_style ) {
	get_template_part( 'templates/header/top', 'page_category_1' );
} else {
	get_template_part( 'templates/header/top', 'page_category_2' );
}

//render featured area
get_template_part( 'templates/section', 'featured_category' );


//render layout
innovation_ruby_blog_layout::render( $ruby_options );

//footer
get_footer();