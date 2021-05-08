<?php

$ruby_featured_style = innovation_ruby_util::get_theme_option( 'featured_style' );

switch ( $ruby_featured_style ) {
	case 'grid_slider' :
		get_template_part( 'templates/featured/style', '1' );
		break;
	case 'hw_slider' :
		get_template_part( 'templates/featured/style', '2' );
		break;
	case 'fw_slider' :
		get_template_part( 'templates/featured/style', '3' );
		break;
	case 'hw_carousel' :
		get_template_part( 'templates/featured/style', '4' );
		break;
	case 'fw_carousel' :
		get_template_part( 'templates/featured/style', '5' );
		break;
	case 'fw_carousel_small' :
		get_template_part( 'templates/featured/style', '6' );
		break;
}


