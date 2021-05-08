<?php
$ruby_website_social_data = innovation_ruby_social_data::web_data();
$ruby_enable_icon_color   = innovation_ruby_util::get_theme_option( 'main_nav_social_icon_color' );

//render
echo innovation_ruby_social_bar::render( $ruby_website_social_data, 'nav-social-wrap', true, $ruby_enable_icon_color );