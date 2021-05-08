<?php
//frontend script
if ( ! function_exists( 'innovation_ruby_register_frontend_script' ) ) {
	function innovation_ruby_register_frontend_script() {

		//load theme styles
		wp_enqueue_style( 'innovation-ruby-external-style', get_template_directory_uri() . '/assets/external_script/ruby-external-style.css', array(), INNOVATION_THEME_VERSION, 'all' );
		wp_enqueue_style( 'innovation-ruby-main-style', get_template_directory_uri() . '/assets/css/ruby-style.css', array( 'innovation-ruby-external-style' ), INNOVATION_THEME_VERSION, 'all' );
		wp_enqueue_style( 'innovation-ruby-responsive-style', get_template_directory_uri() . '/assets/css/ruby-responsive.css', array(	'innovation-ruby-external-style','innovation-ruby-main-style'), INNOVATION_THEME_VERSION, 'all' );
		wp_enqueue_style( 'innovation-ruby-default-style', get_stylesheet_uri(), array('innovation-ruby-external-style','innovation-ruby-main-style','innovation-ruby-responsive-style'), INNOVATION_THEME_VERSION );
		wp_enqueue_style( 'innovation-ruby-custom-style', get_template_directory_uri() . '/custom/custom.css', array('innovation-ruby-external-style','innovation-ruby-main-style','innovation-ruby-responsive-style','innovation-ruby-default-style'), '1.0', 'all' );

		//woocommerce support
		if ( class_exists( 'Woocommerce' ) ) {
			wp_register_style( 'innovation-ruby-woocommerce-style', get_template_directory_uri() . '/woocommerce/css/ruby_woocommerce.css', array(), INNOVATION_THEME_VERSION, 'all' );
			wp_enqueue_style( 'innovation-ruby-woocommerce-style' );
		}

		//load comment script
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/external_script/html5shiv.min.js' ), array(), '3.7.3' );
		wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

		//load theme script
		wp_enqueue_script( 'innovation-ruby-external-script', get_template_directory_uri() . '/assets/external_script/ruby-external-script.js', array( 'jquery' ), INNOVATION_THEME_VERSION, true );

		//load theme script
		wp_enqueue_script( 'innovation-ruby-main-script', get_template_directory_uri() . '/assets/js/ruby-script.js', array('jquery','innovation-ruby-external-script'), INNOVATION_THEME_VERSION, true );

		//load custom script
		wp_enqueue_script( 'innovation-ruby-custom-script', get_template_directory_uri() . '/custom/custom.js', array('jquery','innovation-ruby-external-script','innovation-ruby-main-script'), '1.0', true );

		//check & enable retina lib
		if ( 1 == get_option( 'innovation_ruby_retina_support_option', false ) ) {
			wp_enqueue_script( 'innovation-ruby-retina-script', get_template_directory_uri() . '/assets/external_script/retina.min.js', array( 'jquery' ), '1.3.0', true );
		}
	}

	if ( ! is_admin() ) {
		add_action( 'wp_enqueue_scripts', 'innovation_ruby_register_frontend_script' );
	}
}
