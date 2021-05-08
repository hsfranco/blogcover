<?php
/*
Template Name: Author Team
*/

//header
get_header();

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();

		$ruby_enable_page_title = innovation_ruby_page::check_title();

		if ( ! empty( $ruby_enable_page_title ) && 'none' != $ruby_enable_page_title ) {
			get_template_part( 'templates/header/top', 'page_single' );
		}

		innovation_ruby_template_part::open_page_wrap( 'page-layout-wrap page-author-wrap', 'none' );
		innovation_ruby_template_part::open_page_inner( 'page-layout-inner', 'none' );

		get_template_part( 'templates/section', 'author_team' );
		echo '<div class="entry clearfix author-team-entry">';
		the_content();
		echo '</div>';

		innovation_ruby_template_part::close_page_inner();
		innovation_ruby_template_part::close_page_wrap();
	}
}

//footer
get_footer();