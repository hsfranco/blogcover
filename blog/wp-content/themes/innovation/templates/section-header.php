<?php
//get header type
$innovation_ruby_header_style = innovation_ruby_util::get_theme_option( 'header_style' );
$innovation_ruby_top_bar      = innovation_ruby_util::get_theme_option( 'top_bar' );

//top bar
if ( ! empty( $innovation_ruby_top_bar ) ) {
	get_template_part( 'templates/header/module', 'top_bar' );
}

//header
get_template_part( 'templates/header/style', esc_attr( $innovation_ruby_header_style ) );
