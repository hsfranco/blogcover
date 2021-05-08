<?php

//get data
$ruby_first_paragraph         = innovation_ruby_single::get_first_paragraph();
$ruby_sidebar_position        = innovation_ruby_single::get_sidebar_position();
$ruby_post_format             = innovation_ruby_post_format::check_post_format();
$ruby_has_review              = innovation_ruby_post_review::has_review();
$ruby_enable_top_share_box    = innovation_ruby_util::get_theme_option( 'single_top_share_social' );
$ruby_enable_bottom_share_box = innovation_ruby_util::get_theme_option( 'single_bottom_share_social' );
$ruby_enable_aside_share_box  = innovation_ruby_util::get_theme_option('single_aside_share_social');
$ruby_enable_like_box         = innovation_ruby_util::get_theme_option( 'social_like_post' );
$ruby_enable_navigation_box   = innovation_ruby_util::get_theme_option( 'single_navigation_box' );
$ruby_enable_author_box       = innovation_ruby_util::get_theme_option( 'single_author_box' );
$ruby_enable_comment_box      = innovation_ruby_single::check_comment_box();
$ruby_enable_related_box      = innovation_ruby_util::get_theme_option( 'single_related_box' );


//create single class
$ruby_single_class   = array();
$ruby_single_class[] = 'is-single';
$ruby_single_class[] = esc_attr( $ruby_first_paragraph );
$ruby_single_class   = implode( ' ', $ruby_single_class );

innovation_ruby_template_part::open_page_wrap( 'single-wrap single-layout-title-fw', $ruby_sidebar_position );

innovation_ruby_single_layout::open_single_wrap( $ruby_single_class, $ruby_has_review );
innovation_ruby_single_layout::open_single_header();
innovation_ruby_template_part::post_cate_info( 'is-relative', 'is-dark-text', false );
innovation_ruby_single_layout::single_post_title();
innovation_ruby_single_layout::single_post_meta_info();
innovation_ruby_single_layout::close_single_header();

innovation_ruby_template_part::open_page_inner( 'single-inner', $ruby_sidebar_position);

if ( $ruby_enable_top_share_box ) {
	get_template_part( 'templates/single/block', 'share_post' );
};

switch ( $ruby_post_format ) {
	case 'gallery' :
		get_template_part( 'templates/post', 'gallery' );
		break;
	case 'video':
		get_template_part( 'templates/post', 'video' );
		break;
	case 'audio' :
		get_template_part( 'templates/post', 'audio' );
		break;
	default :
		get_template_part( 'templates/post', 'thumbnail' );
		break;
}

get_template_part( 'templates/single/block', 'entry' );

get_template_part( 'templates/single/block', 'tags' );

if ( ! empty( $ruby_enable_bottom_share_box ) ) {
	get_template_part( 'templates/single/block', 'share_post' );
}

if ( ! empty( $ruby_enable_aside_share_box ) ) {
	get_template_part( 'templates/single/block', 'aside_share_post' );
}


if ( ! empty( $ruby_enable_like_box ) ) {
	get_template_part( 'templates/single/block', 'like_post' );
}

if ( ! empty( $ruby_enable_navigation_box ) ) {
	get_template_part( 'templates/single/block', 'navigation' );
}

if ( ! empty( $ruby_enable_author_box ) ) {
	get_template_part( 'templates/single/block', 'author' );
}

if ( ! empty( $ruby_enable_related_box ) ) {
	get_template_part( 'templates/single/block', 'related' );
}


if ( ! empty( $ruby_enable_comment_box ) ) {
	comments_template();
}

innovation_ruby_single_layout::single_schema_makeup();
innovation_ruby_template_part::close_page_inner();

innovation_ruby_single_layout::single_sidebar();

innovation_ruby_single_layout::close_single_wrap();
innovation_ruby_template_part::close_page_wrap();
