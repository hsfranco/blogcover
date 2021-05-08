<?php
/**
 * Innovation functions and definitions
 * @package innovation
 */

// theme version
define( 'INNOVATION_THEME_VERSION', '5.5' );

// make theme can be translated
load_theme_textdomain( 'innovation', get_template_directory() . '/languages' );

// including theme components
require_once get_template_directory() . '/includes/ruby_includes.php';

if ( ! function_exists( 'innovation_ruby_theme_support' ) ) {

	function innovation_ruby_theme_support() {

		if ( ! isset( $GLOBALS['content_width'] ) ) {
			$GLOBALS['content_width'] = 1170;
		}

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
		add_theme_support( 'post-formats', array( 'image', 'gallery', 'video', 'audio' ) );
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
		add_theme_support( 'editor-styles' );
		add_theme_support( 'responsive-embeds' );

		register_nav_menu( 'innovation_ruby_main_navigation', esc_html( 'Main Navigation', 'innovation' ) );
		register_nav_menu( 'innovation_ruby_top_navigation', esc_html( 'Top Navigation', 'innovation' ) );
	}

	add_action( 'after_setup_theme', 'innovation_ruby_theme_support' );
}

/** support editor styles */
if ( ! function_exists( 'innovation_ruby_block_editor_styles' ) ) {
	function innovation_ruby_block_editor_styles() {
		wp_enqueue_style( 'innovation-editor-fonts', innovation_ruby_font_urls(), array(), null );
		wp_enqueue_style( 'innovation-editor-style', get_theme_file_uri( '/assets/css/editor-block-style.css' ), array(), '1.0' );
	}
}

add_action( 'enqueue_block_editor_assets', 'innovation_ruby_block_editor_styles' );


if ( ! function_exists( 'innovation_ruby_add_image_size' ) ) {
	function innovation_ruby_add_image_size() {

		add_theme_support( 'post-thumbnails' );

		add_image_size( 'innovation_ruby_105x105', 105, 105, array( 'center', 'top' ) );
		add_image_size( 'innovation_ruby_1400x840', 1400, 840, array( 'center', 'top' ) );
		add_image_size( 'innovation_ruby_840x500', 840, 500, array( 'center', 'top' ) );
		add_image_size( 'innovation_ruby_350x200', 350, 200, array( 'center', 'top' ) );
		add_image_size( 'innovation_ruby_350x350', 350, 350, array( 'center', 'top' ) );
		add_image_size( 'innovation_ruby_300x450', 300, 450, array( 'center', 'top' ) );
	}

	add_action( 'after_setup_theme', 'innovation_ruby_add_image_size' );
}

// default fonts
if ( ! function_exists( 'innovation_ruby_font_urls' ) ) {
	function innovation_ruby_font_urls() {

		$fonts_url    = '';
		$font_lato    = _x( 'on', 'Lato font: on or off', 'innovation' );
		$font_raleway = _x( 'on', 'Raleway font: on or off', 'innovation' );

		if ( 'off' !== $font_lato || 'off' !== $font_raleway ) {
			$font_families = array();

			if ( 'off' !== $font_lato ) {
				$font_families[] = 'Lato:400,400i,700,700i';
			}

			if ( 'off' !== $font_raleway ) {
				$font_families[] = 'Raleway:400,400i,500,600,700';
			}

			$params = array(
				'family' => urlencode( implode( '|', $font_families ) ),
				'subset' => urlencode( 'latin,latin-ext' ),
			);

			$fonts_url = add_query_arg( $params, 'https://fonts.googleapis.com/css' );

		}

		return $fonts_url;
	}
}

// add default fonts
if ( ! class_exists( 'ReduxFramework' ) && ! function_exists( 'innovation_ruby_add_default_font' ) ) {
	function innovation_ruby_add_default_font() {
		wp_enqueue_style( 'google-font-lato-raleway', esc_url_raw( innovation_ruby_font_urls() ), array(), null );
	}

	add_action( 'wp_enqueue_scripts', 'innovation_ruby_add_default_font' );
}
