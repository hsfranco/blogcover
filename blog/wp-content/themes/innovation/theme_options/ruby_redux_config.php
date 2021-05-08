<?php
/**
 * ReduxFramework Config File
 * For full documentation, please visit: http://docs.reduxframework.com/
 */

if ( ! class_exists( 'Redux' ) ) {
	return false;
}

//register custom theme options style
if ( ! function_exists( 'innovation_ruby_register_theme_options_style' ) ) {
	function innovation_ruby_register_theme_options_style() {
		wp_register_style( 'innovation-ruby-theme-options-style', get_template_directory_uri() . '/theme_options/css/ruby-theme-options.css', array( 'redux-admin-css' ), INNOVATION_THEME_VERSION, 'all' );

		wp_enqueue_style( 'innovation-ruby-theme-options-style' );
	}

	//Check & do action
	if ( is_admin() ) {
		add_action( 'redux/page/innovation_ruby_theme_options/enqueue', 'innovation_ruby_register_theme_options_style' );
	}
};

//including theme options panels
$ruby_template_directory = get_template_directory();

require_once $ruby_template_directory . '/theme_options/option_panels/panel_general.php';
require_once $ruby_template_directory . '/theme_options/option_panels/panel_header.php';
require_once $ruby_template_directory . '/theme_options/option_panels/panel_navigation.php';
require_once $ruby_template_directory . '/theme_options/option_panels/panel_sidebar.php';
require_once $ruby_template_directory . '/theme_options/option_panels/panel_footer.php';
require_once $ruby_template_directory . '/theme_options/option_panels/panel_featured.php';
require_once $ruby_template_directory . '/theme_options/option_panels/panel_design.php';
require_once $ruby_template_directory . '/theme_options/option_panels/panel_mic.php';
require_once $ruby_template_directory . '/theme_options/option_panels/panel_social.php';
require_once $ruby_template_directory . '/theme_options/option_panels/panel_typography.php';
require_once $ruby_template_directory . '/theme_options/option_panels/panel_typography_body.php';
require_once $ruby_template_directory . '/theme_options/option_panels/panel_typography_post.php';
require_once $ruby_template_directory . '/theme_options/option_panels/panel_typography_nav.php';
require_once $ruby_template_directory . '/theme_options/option_panels/panel_color.php';
require_once $ruby_template_directory . '/theme_options/option_panels/panel_home.php';
require_once $ruby_template_directory . '/theme_options/option_panels/panel_single.php';
require_once $ruby_template_directory . '/theme_options/option_panels/panel_category.php';
require_once $ruby_template_directory . '/theme_options/option_panels/panel_page.php';
require_once $ruby_template_directory . '/theme_options/option_panels/panel_woocommerce.php';


// This is theme option name where all the Theme data is stored.
$ruby_theme    = wp_get_theme();
$ruby_opt_name = 'innovation_ruby_theme_options';

$ruby_args = array(
	'opt_name'             => $ruby_opt_name,
	'display_name'         => $ruby_theme->get( 'Name' ),
	'display_version'      => $ruby_theme->get( 'Version' ),
	'menu_type'            => 'menu',
	'allow_sub_menu'       => true,
	'menu_title'           => esc_html__( 'Innovation', 'innovation' ),
	'page_title'           => esc_html__( 'Innovation Options', 'innovation' ),
	'google_api_key'       => '',
	'google_update_weekly' => false,
	'async_typography'     => false,
	'admin_bar'            => true,
	'admin_bar_icon'       => 'dashicons-admin-generic',
	'admin_bar_priority'   => 50,
	'global_variable'      => $ruby_opt_name,
	'dev_mode'             => false,
	'update_notice'        => false,
	'customizer'           => true,
	'page_priority'        => 54,
	'page_parent'          => 'themes.php',
	'page_permissions'     => 'manage_options',
	'menu_icon'            => '',
	'last_tab'             => '',
	'page_icon'            => 'icon-themes',
	'page_slug'            => '',
	'save_defaults'        => true,
	'default_show'         => false,
	'default_mark'         => '',
	'show_import_export'   => true,
	'transient_time'       => 60 * MINUTE_IN_SECONDS,
	'use_cdn'              => true,
	'output'               => true,
	'output_tag'           => true,
	'disable_tracking'     => true,
	'database'             => '',
	'system_info'          => false,
	'show_options_object'  => false
);


//Set arguments for framework
Redux::setArgs( $ruby_opt_name, $ruby_args );

// -> START THEME SETTINGS

Redux::setSection( $ruby_opt_name, innovation_ruby_theme_options_general() );
Redux::setSection( $ruby_opt_name, innovation_ruby_theme_options_block_design() );
Redux::setSection( $ruby_opt_name, innovation_ruby_theme_options_navigation() );
Redux::setSection( $ruby_opt_name, innovation_ruby_theme_options_header() );
Redux::setSection( $ruby_opt_name, innovation_ruby_theme_options_sidebar() );
Redux::setSection( $ruby_opt_name, innovation_ruby_theme_options_footer() );
Redux::setSection( $ruby_opt_name, innovation_ruby_theme_options_featured() );
Redux::setSection( $ruby_opt_name, innovation_ruby_theme_options_home() );
Redux::setSection( $ruby_opt_name, innovation_ruby_theme_options_single() );

$ruby_all_categories = get_categories( array( 'hide_empty' => 0 ) );
Redux::setSection( $ruby_opt_name, innovation_ruby_theme_options_category() );
foreach ( $ruby_all_categories as $category ) {
	Redux::setSection( $ruby_opt_name, innovation_ruby_theme_options_one_cate( $category->term_id, esc_attr( $category->name ) ) );
}
Redux::setSection( $ruby_opt_name, innovation_ruby_theme_options_page() );
Redux::setSection( $ruby_opt_name, innovation_ruby_default_page_config() );
Redux::setSection( $ruby_opt_name, innovation_ruby_author_page_config() );
Redux::setSection( $ruby_opt_name, innovation_ruby_search_page_config() );
Redux::setSection( $ruby_opt_name, innovation_ruby_archive_page_config() );
Redux::setSection( $ruby_opt_name, innovation_ruby_author_team_page_config() );
Redux::setSection( $ruby_opt_name, innovation_ruby_theme_options_social() );
Redux::setSection( $ruby_opt_name, innovation_ruby_theme_options_share_post() );
Redux::setSection( $ruby_opt_name, innovation_ruby_theme_options_site_social() );
Redux::setSection( $ruby_opt_name, innovation_ruby_theme_options_typography() );
Redux::setSection( $ruby_opt_name, innovation_ruby_theme_options_typography_body() );
Redux::setSection( $ruby_opt_name, innovation_ruby_theme_options_typography_post() );
Redux::setSection( $ruby_opt_name, innovation_ruby_theme_options_typography_nav() );
Redux::setSection( $ruby_opt_name, innovation_ruby_theme_options_color() );

//woocommerce
if ( class_exists( 'Woocommerce' ) ) {
	Redux::setSection( $ruby_opt_name, innovation_ruby_theme_options_woocommerce() );
}
Redux::setSection( $ruby_opt_name, innovation_ruby_theme_options_custom_script() );
Redux::setSection( $ruby_opt_name, innovation_ruby_theme_options_import_export() );
