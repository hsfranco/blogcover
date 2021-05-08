<?php

//header
get_header();

//Woocommerce Template
$innovation_ruby_wc_options               = array();
$innovation_ruby_wc_options['page_title'] = innovation_ruby_util::get_theme_option( 'innovation_ruby_woocommerce_title_shop' );

if ( false === is_product() ) {
	$innovation_ruby_wc_options['sidebar_name']     = innovation_ruby_util::get_theme_option( 'innovation_ruby_woocommerce_sidebar_shop' );
	$innovation_ruby_wc_options['sidebar_position'] = innovation_ruby_util::get_theme_option( 'innovation_ruby_woocommerce_sidebar_position_shop' );
} else {
	$innovation_ruby_wc_options['sidebar_name']     = innovation_ruby_util::get_theme_option( 'innovation_ruby_woocommerce_sidebar_product' );
	$innovation_ruby_wc_options['sidebar_position'] = innovation_ruby_util::get_theme_option( 'innovation_ruby_woocommerce_sidebar_position_product' );
}

if ( empty( $innovation_ruby_wc_options['sidebar_name'] ) ) {
	$innovation_ruby_wc_options['sidebar_name'] = 'innovation_ruby_sidebar_default';
}

if ( is_shop() ) {
	function shop_title_false() {
		return false;
	}

	if ( empty( $innovation_ruby_wc_options['page_title'] ) ) {
		add_filter( 'woocommerce_show_page_title', 'shop_title_false' );
	}
};

//render page
innovation_ruby_template_part::open_page_wrap( 'woocommerce-page-wrap', $innovation_ruby_wc_options['sidebar_position'] );
innovation_ruby_template_part::open_page_inner( 'woocommerce-page-inner ruy-page-content-wrap', $innovation_ruby_wc_options['sidebar_position'] );
woocommerce_content();
innovation_ruby_template_part::close_page_inner();
if ( ! empty( $innovation_ruby_wc_options['sidebar_position'] ) && 'none' != $innovation_ruby_wc_options['sidebar_position'] ) {
	innovation_ruby_template_part::sidebar( $innovation_ruby_wc_options['sidebar_name'] );
}

innovation_ruby_template_part::close_page_wrap();

//footer
get_footer();