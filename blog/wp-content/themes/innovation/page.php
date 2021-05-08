<?php
/*
 * This page display single page
 */

// header
get_header();

$ruby_enable_page_title  = innovation_ruby_page::check_title();
$ruby_sidebar_name       = innovation_ruby_page::get_sidebar_name();
$ruby_sidebar_position   = innovation_ruby_page::get_sidebar_position();
$ruby_enable_comment_box = innovation_ruby_page::check_comment_box();

if ( ! empty( $ruby_enable_page_title ) && 'none' != $ruby_enable_page_title ) {
	get_template_part( 'templates/header/top', 'page_single' );
}

innovation_ruby_template_part::open_page_wrap( 'page-layout-wrap', $ruby_sidebar_position );
innovation_ruby_template_part::open_page_inner( 'page-layout-inner', $ruby_sidebar_position );

// render
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();

		echo '<div class="entry entry-content clearfix">';
		the_content();
		echo '<div class="clearfix"></div>';
		wp_link_pages( array(
				'before'      => '<div class="single-page-links clearfix">' . esc_html__( 'Pages:', 'innovation' ),
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'echo'        => true
			)

		);
		echo '</div>';

		if ( ! empty( $ruby_enable_comment_box ) && 'none' != $ruby_enable_comment_box ) {
			get_template_part( 'templates/single/block', 'comment' );
		}
	}
}

innovation_ruby_template_part::close_page_inner();
if ( ! empty( $ruby_sidebar_position ) && 'none' != $ruby_sidebar_position ) {
	innovation_ruby_template_part::sidebar( $ruby_sidebar_name );
}
innovation_ruby_template_part::close_page_wrap();

// footer
get_footer();