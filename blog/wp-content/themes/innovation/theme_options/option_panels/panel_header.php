<?php
if ( ! function_exists( 'innovation_ruby_theme_options_header' ) ) {
	function innovation_ruby_theme_options_header() {
		//Header options config
		return array(
			'id'     => 'innovation_ruby_theme_ops_section_header',
			'title'  => esc_html__( 'Header Options', 'innovation' ),
			'desc'   => esc_html__( 'Select options for Header', 'innovation' ),
			'icon'   => 'el el-th',
			'fields' => array(
				//Header section config
				array(
					'id'     => 'section_start_header_style',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Headers style options', 'innovation' ),
					'indent' => true
				),
				array(
					'id'       => 'header_style',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Header style', 'innovation' ),
					'subtitle' => esc_html__( 'Select style for header', 'innovation' ),
					'options'  => innovation_ruby_theme_config::headers_style(),
					'default'  => '1'
				),
				array(
					'id'     => 'section_end_header_style',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//header style 1 config
				array(
					'id'     => 'section_start_header_style_1_logo',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Header style 1 options', 'innovation' ),
					'indent' => true
				),
				array(
					'id'       => 'header_first_site_logo',
					'type'     => 'media',
					'title'    => esc_html__( 'Site Logo (Style 1)', 'innovation' ),
					'subtitle' => esc_html__( 'Upload your logo (270x72px) for header style 1, allowed extensions are .jpg, .png and .gif', 'innovation' )
				),
				array(
					'id'       => 'header_first_site_logo_retina',
					'type'     => 'media',
					'title'    => esc_html__( 'Site Logo Retina (Style 1)', 'innovation' ),
					'subtitle' => esc_html__( 'Upload your retina logo (540x144px) for header style 1, This is optional option, it is only needed when you enable retina support, allowed extensions are .jpg, .png and .gif', 'innovation' )
				),
				array(
					'id'     => 'section_end_header_style_1_logo',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//header style 2 config
				array(
					'id'     => 'section_start_header_style_2_options',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Header style 2 options', 'innovation' ),
					'indent' => true
				),
				array(
					'id'       => 'header_second_layout_manager',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Layout Manager (Style 2)', 'innovation' ),
					'subtitle' => esc_html__( 'Organize how you want the header to appear on your site', 'innovation' ),
					'options'  => array(
						'enabled'  => array(
							'logo_section' => esc_html__( 'Logo Section', 'innovation' ),
							'nav_bar'      => esc_html__( 'Navigation', 'innovation' ),
						),
						'disabled' => array(),
					),
				),
				array(
					'id'       => 'header_second_site_logo',
					'type'     => 'media',
					'title'    => esc_html__( 'Site Logo (Style 2)', 'innovation' ),
					'subtitle' => esc_html__( 'Upload your logo for style header style 2, allowed extensions are .jpg, .png and .gif', 'innovation' )
				),
				array(
					'id'       => 'header_second_site_logo_retina',
					'type'     => 'media',
					'title'    => esc_html__( 'Site Logo Retina (Style 2)', 'innovation' ),
					'subtitle' => esc_html__( 'Upload your retina logo for header style 2, This is optional option, it is only needed when you enable retina support, allowed extensions are .jpg, .png and .gif', 'innovation' )
				),
				array(
					'id'       => 'header_second_logo_section_height',
					'type'     => 'text',
					'class'    => 'small-text',
					'title'    => esc_html__( 'Logo Section Height (Style 2)', 'innovation' ),
					'subtitle' => esc_html__( 'Select height for logo section', 'innovation' ),
					'default'  => '240'
				),
				array(
					'id'       => 'header_second_logo_position',
					'type'     => 'select',
					'title'    => esc_html__( 'Logo Position (Style 2)', 'innovation' ),
					'subtitle' => esc_html__( 'Select logo position.', 'innovation' ),
					'options'  => array(
						'center' => esc_html__( 'Center', 'innovation' ),
						'left'   => esc_html__( 'Left', 'innovation' ),
					),
					'default'  => 'center',
				),
				//right logo ads
				array(
					'id'       => 'header_google_ads_right_banner',
					'type'     => 'textarea',
					'validate' => 'js',
					'required' => array( 'header_second_logo_position', '=', 'left' ),
					'title'    => esc_html__( 'Right Banner Ads Code', 'innovation' ),
					'subtitle' => esc_html__( 'Paste in your entire Google ads Code, The Theme support Google Ads Responsive', 'innovation' ),
				),
				array(
					'id'       => 'header_image_ads_right_banner',
					'type'     => 'media',
					'required' => array( 'header_second_logo_position', '=', 'left' ),
					'title'    => esc_html__( 'Right Banner Ads Image ', 'innovation' ),
					'subtitle' => esc_html__( 'Enter the image URL, This option will override to google code option', 'innovation' ),
				),
				array(
					'id'       => 'header_url_ads_right_banner',
					'type'     => 'text',
					'required' => array( 'header_second_logo_position', '=', 'left' ),
					'title'    => esc_html__( 'Right Banner Ads Url ', 'innovation' ),
					'subtitle' => esc_html__( 'Enter the custom Ads Url, This option will override to google code option', 'innovation' ),
					'validate' => 'url',
					'default'  => '',
				),
				array(
					'id'          => 'header_second_logo_section_bg',
					'type'        => 'background',
					'transparent' => false,
					'title'       => esc_html__( 'Logo Section BG (Style 2)', 'innovation' ),
					'subtitle'    => esc_html__( 'Select background for logo section.', 'innovation' ),
					'default'     => array(
						'background-color'      => '#ffffff',
						'background-size'       => 'cover',
						'background-attachment' => 'fixed',
						'background-position'   => 'center center',
						'background-repeat'     => 'no-repeat'
					),
					'output'      => '.header-style-2'
				),
				array(
					'id'       => 'header_second_bottom_margin',
					'type'     => 'text',
					'class'    => 'small-text',
					'title'    => esc_html__( 'Header Bottom Margin (Style 2)', 'innovation' ),
					'subtitle' => esc_html__( 'Select margin between header and featured(in px) in case you want select dark background and want to increase white space between them.', 'innovation' ),
					'default'  => ''
				),
				array(
					'id'     => 'section_end_header_style_2_options',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//top bar options
				array(
					'id'     => 'section_start_top_bar_options',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Top bar options', 'innovation' ),
					'indent' => true
				),
				array(
					'id'       => 'top_bar',
					'title'    => esc_html__( 'Top bar', 'innovation' ),
					'subtitle' => esc_html__( 'Enable or disable the top bar', 'innovation' ),
					'type'     => 'switch',
					'default'  => 0
				),
				array(
					'id'       => 'top_bar_social',
					'required' => array( 'top_bar', '=', '1' ),
					'title'    => esc_html__( 'Top bar social', 'innovation' ),
					'subtitle' => esc_html__( 'Enable or disable site social icons at the top bar', 'innovation' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'       => 'top_bar_search',
					'required' => array( 'top_bar', '=', '1' ),
					'title'    => esc_html__( 'Top bar search form', 'innovation' ),
					'subtitle' => esc_html__( 'Enable or disable search at the top bar', 'innovation' ),
					'type'     => 'switch',
					'default'  => 0
				),
				array(
					'id'     => 'section_end_top_bar_options',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//off canvas configs
				array(
					'id'     => 'section_start_off_canvas_options',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Off Canvas Options', 'innovation' ),
					'indent' => true
				),
				array(
					'id'       => 'aside_header_site_logo',
					'type'     => 'media',
					'title'    => esc_html__( 'Site Logo (Off Canvas)', 'innovation' ),
					'subtitle' => esc_html__( 'Upload your logo (220x70)px for off canvas, allowed extensions are .jpg, .png and .gif', 'innovation' )
				),
				array(
					'id'       => 'aside_header_site_logo_retina',
					'type'     => 'media',
					'title'    => esc_html__( 'Site Logo Retina (Off Canvas)', 'innovation' ),
					'subtitle' => esc_html__( 'Upload your retina logo (540x144px) for off canvas, This is optional option, it is only needed when you enable retina support, allowed extensions are .jpg, .png and .gif', 'innovation' )
				),
				array(
					'id'       => 'aside_header_social_bar',
					'title'    => esc_html__( 'Social Bar (Off Canvas)', 'innovation' ),
					'subtitle' => esc_html__( 'Enable or disable social bar in off canvas', 'innovation' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'       => 'aside_header_widget_section',
					'title'    => esc_html__( 'Widgets Section (Off Canvas)', 'innovation' ),
					'subtitle' => esc_html__( 'Enable or disable widgets sidebar section in off canvas', 'innovation' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'       => 'aside_header_close_button',
					'title'    => esc_html__( 'Close Button (Off Canvas)', 'innovation' ),
					'subtitle' => esc_html__( 'Enable or disable close button in off canvas', 'innovation' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'       => 'aside_header_close_button_mobile',
					'title'    => esc_html__( 'Only Show On Mobile', 'innovation' ),
					'subtitle' => esc_html__( 'Only show close button on mobile devices', 'innovation' ),
					'required' => array( 'aside_header_close_button', '=', '1' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'     => 'section_end_off_canvas_options',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//Header ads config
				array(
					'id'     => 'section_start_header_ads',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'header Ads', 'innovation' ),
					'indent' => true
				),
				array(
					'id'       => 'header_ads_type',
					'type'     => 'switch',
					'title'    => esc_html__( 'Google Ads/Custom Ads', 'innovation' ),
					'subtitle' => esc_html__( 'Select type of ads at top header', 'innovation' ),
					'default'  => 1,
					'on'       => 'Google Ads',
					'off'      => 'Custom Ads',
				),
				array(
					'id'       => 'header_google_ads',
					'type'     => 'textarea',
					'validate' => 'js',
					'required' => array( 'header_ads_type', '=', '1' ),
					'title'    => esc_html__( 'Ads Code', 'innovation' ),
					'subtitle' => esc_html__( 'Paste in your entire Google ads Code, The Theme support Google Ads Responsive', 'innovation' ),
				),
				array(
					'id'       => 'header_image_ads',
					'type'     => 'media',
					'required' => array( 'header_ads_type', '=', '0' ),
					'title'    => esc_html__( 'Ads Image ', 'innovation' ),
					'subtitle' => esc_html__( 'Enter the image URL', 'innovation' ),
				),
				array(
					'id'       => 'header_url_ads',
					'type'     => 'text',
					'required' => array( 'header_ads_type', '=', '0' ),
					'title'    => esc_html__( 'Ads Url ', 'innovation' ),
					'subtitle' => esc_html__( 'Enter the custom Ads Url', 'innovation' ),
					'validate' => 'url',
					'default'  => '',
				),
				array(
					'id'     => 'section_end_header_ads',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}