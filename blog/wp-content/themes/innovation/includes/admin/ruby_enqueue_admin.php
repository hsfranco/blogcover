<?php
// registering admin css and script
if ( ! function_exists( 'innovation_ruby_register_backend_script' ) ) {
	function innovation_ruby_register_backend_script( $hook ) {
		wp_register_style( 'innovation-ruby-admin-style', get_template_directory_uri() . '/includes/admin/css/ruby-admin-style.css', array(), INNOVATION_THEME_VERSION, 'all' );
		wp_enqueue_style( 'innovation-ruby-admin-style' );

		// only load in post
		if ( $hook == 'post.php' || $hook == 'post-new.php' ) {
			wp_register_script( 'innovation-ruby-admin-script', get_template_directory_uri() . '/includes/admin/js/ruby-admin-script.js', array( 'jquery' ), INNOVATION_THEME_VERSION, true );
			wp_enqueue_script( 'innovation-ruby-admin-script' );
		}
	}

	// check & do action
	if ( is_admin() ) {
		add_action( 'admin_enqueue_scripts', 'innovation_ruby_register_backend_script' );
	}
};
