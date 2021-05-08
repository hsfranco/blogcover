<?php

// header
get_header();

if ( have_posts() ) {

	// add views
	innovation_ruby_post_views::add_views();

	while ( have_posts() ) {
		the_post();

		// single layout
		$ruby_single_layout = get_post_meta( get_the_ID(), 'innovation_ruby_single_layout', true );

		if ( empty( $ruby_single_layout ) || 'default' == $ruby_single_layout ) {

			$ruby_single_layout = innovation_ruby_util::get_theme_option( 'default_single_post_layout' );

			if ( is_sticky() ) {
				$ruby_single_layout = 'is_fw_featured_center';
			};
		}

		switch ( $ruby_single_layout ) {
			case 'is_classic' :
				get_template_part( 'templates/single/style', '1' );
				break;
			case 'is_classic_crop' :
				get_template_part( 'templates/single/style', '2' );
				break;
			case 'is_fw_title' :
				get_template_part( 'templates/single/style', '3' );
				break;
			case 'is_fw_title_crop' :
				get_template_part( 'templates/single/style', '4' );
				break;
			case 'is_fw_featured' :
				get_template_part( 'templates/single/style', '5' );
				break;
			case 'is_fw_featured_center' :
				get_template_part( 'templates/single/style', '6' );
				break;
			default :
				get_template_part( 'templates/single/style', '7' );
				break;
		}
	}
}

// footer
get_footer();