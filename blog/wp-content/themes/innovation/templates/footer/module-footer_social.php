<?php
//footer social bar
$ruby_enable_footer_social = innovation_ruby_util::get_theme_option( 'footer_social_bar' );
if ( ! empty( $ruby_enable_footer_social ) ) {
	$ruby_website_social_data = innovation_ruby_social_data::web_data();
	//render
	echo innovation_ruby_social_bar::render( $ruby_website_social_data, 'footer-social-wrap', true, false );
}
