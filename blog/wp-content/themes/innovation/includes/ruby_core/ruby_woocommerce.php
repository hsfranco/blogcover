<?php

/**
 * @return mixed
 * max number of page
 */
if ( ! function_exists( 'innovation_ruby_wc_max_number_of_page' ) ) {
	function innovation_ruby_wc_max_number_of_page() {

		global $wp_query;

		return $wp_query->max_num_pages;
	}
}


/**
 * @return WC_Product
 */
if ( ! function_exists( 'innovation_ruby_wc_global_product' ) ) {
	function innovation_ruby_wc_global_product() {

		global $product;

		return $product;
	}
}

/**
 * innovation_ruby_wc_related_loop
 */
if ( ! function_exists( 'innovation_ruby_wc_related_loop' ) ) {
	function innovation_ruby_wc_related_loop( $columns ) {

		global $woocommerce_loop;

		$woocommerce_loop['name']    = 'related';
		$woocommerce_loop['columns'] = apply_filters( 'woocommerce_related_products_columns', $columns );
	}
}


/**
 * Woocommerce Related Products Output
 */
if ( ! function_exists( 'innovation_ruby_wc_output_related_products' ) ) {
	// Customize Woocommerce Related Products Output
	function innovation_ruby_wc_output_related_products() {
		woocommerce_related_products(
			array(
				'posts_per_page' => 3,
				'columns'        => 3
			) );   // Display 3 products in 3 columns
	}

	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
	remove_action( 'woocommerce_after_single_product', 'woocommerce_output_related_products', 10 );
	add_action( 'woocommerce_after_single_product_summary', 'innovation_ruby_wc_output_related_products', 20 );
}

/**
 *  Woocommerce cross sells total
 */

if ( ! function_exists( 'innovation_ruby_wc_cross_sells_total' ) ) {
	function innovation_ruby_wc_cross_sells_total() {
		return 2;
	}

	add_filter( 'woocommerce_cross_sells_total', 'innovation_ruby_wc_cross_sells_total' );
	add_filter( 'woocommerce_cross_sells_column', 'innovation_ruby_wc_cross_sells_total' );
}


/**
 * change number product per row
 */
if ( ! function_exists( 'innovation_ruby_wc_loop_columns' ) ) {
	function innovation_ruby_wc_loop_columns() {
		return 3; // 3 products per row
	}

	add_filter( 'loop_shop_columns', 'innovation_ruby_wc_loop_columns' );
}

if ( ! function_exists( 'innovation_ruby_wc_review_tab' ) ) {
	function innovation_ruby_wc_review_tab( $tabs ) {

		$product_review = innovation_ruby_util::get_theme_option( 'innovation_ruby_woocommerce_comment_box' );
		if ( empty( $product_review ) ) {
			unset( $tabs['reviews'] );
		}

		return $tabs;
	}

	add_filter( 'woocommerce_product_tabs', 'innovation_ruby_wc_review_tab', 99 );
}