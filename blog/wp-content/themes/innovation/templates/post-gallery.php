<?php
$ruby_gallery      = get_post_meta( get_the_ID(), 'innovation_ruby_single_gallery_data', false );
$ruby_gallery_type = get_post_meta( get_the_ID(), 'innovation_ruby_single_gallery_type', true );
if ( ! empty( $ruby_gallery ) ) {
	if ( 'slider' == $ruby_gallery_type ) {
		get_template_part( 'templates/post', 'gallery_slider' );
	} else {
		get_template_part( 'templates/post', 'gallery_grid' );
	}
}
