<?php
/**
 * this file handle default plugins for the theme
 */

//include the TGM_Plugin_Activation class
require_once get_template_directory() . '/includes/admin/class-tgm-plugin-activation.php';

if ( ! function_exists( 'innovation_ruby_theme_register_required_plugins' ) ) {
	function innovation_ruby_theme_register_required_plugins() {
		$plugins = array(
			array(
				'name'               => 'Innovation Core',
				'slug'               => 'innovation-core',
				'source'             => get_template_directory() . '/plugins/innovation-core.zip',
				'required'           => true,
				'version'            => '1.3',
				'force_activation'   => false,
				'force_deactivation' => false,
				'external_url'       => '',
				'is_callable'        => '',
			),
			array(
				'name'               => 'Innovation Demo',
				'slug'               => 'innovation-ruby-import',
				'source'             => get_template_directory() . '/plugins/innovation-ruby-import.zip',
				'required'           => true,
				'version'            => '2.0',
				'force_activation'   => false,
				'force_deactivation' => false,
				'external_url'       => '',
				'is_callable'        => '',
			),
			array(
				'name'               => 'Envato Market',
				'slug'               => 'envato-market',
				'source'             => get_template_directory() . '/plugins/envato-market.zip',
				'required'           => true,
				'force_activation'   => false,
				'force_deactivation' => false,
				'external_url'       => '',
			),
			array(
				'name'     => 'oAuth Twitter Feed for Developers',
				'slug'     => 'oauth-twitter-feed-for-developers',
				'required' => true,
			),
			array(
				'name'               => 'Tiled Galleries Carousel Without Jetpack',
				'slug'               => 'tiled-gallery-carousel-without-jetpack',
				'required'           => false,
				'force_activation'   => false,
				'force_deactivation' => false,
				'external_url'       => '',
			),
		);

		$config = array(
			'id'           => 'innovation',
			'default_path' => '',
			'menu'         => 'innovation-plugins',
			'parent_slug'  => 'themes.php',
			'capability'   => 'edit_theme_options',
			'has_notices'  => true,
			'dismissable'  => true,
			'dismiss_msg'  => '',
			'is_automatic' => false,
			'message'      => '',
			'strings'      => array(
				'page_title'                      => esc_html__( 'Install Required Plugins', 'innovation' ),
				'menu_title'                      => esc_html__( 'Install Plugins', 'innovation' ),
				'installing'                      => esc_html__( 'Installing Plugin: %s', 'innovation' ),
				'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'innovation' ),
				'notice_can_install_required'     => _n_noop( 'Innovation the following plugin: %1$s.', 'Innovation requires the following plugins: %1$s.', 'innovation' ),
				'notice_can_install_recommended'  => _n_noop( 'Innovation recommends the following plugin: %1$s.', 'Innovation recommends the following plugins: %1$s.', 'innovation' ),
				'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'innovation' ),
				'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'innovation' ),
				'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'innovation' ),
				'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'innovation' ),
				'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with Innovation: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with Innovation: %1$s.', 'innovation' ),
				'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'innovation' ),
				'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'innovation' ),
				'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'innovation' ),
				'return'                          => esc_html__( 'Return to Required Plugins Installer', 'innovation' ),
				'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'innovation' ),
				'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'innovation' ),
				'nag_type'                        => 'updated'
			)
		);

		tgmpa( $plugins, $config );
	}

	add_action( 'tgmpa_register', 'innovation_ruby_theme_register_required_plugins' );
}