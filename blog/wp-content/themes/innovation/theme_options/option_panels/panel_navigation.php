<?php
if ( ! function_exists( 'innovation_ruby_theme_options_navigation' ) ) {
	function innovation_ruby_theme_options_navigation() {
		//Header options config
		return array(
			'id'     => 'innovation_ruby_theme_ops_section_navigation',
			'title'  => esc_html__( 'Navigation Options', 'innovation' ),
			'desc'   => esc_html__( 'Select options for main navigation of site', 'innovation' ),
			'icon'   => 'el el-compass',
			'fields' => array(
				array(
					'id'     => 'section_start_main_navigation',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'navigation options', 'innovation' ),
					'indent' => true
				),
				array(
					'id'       => 'sticky_navigation',
					'type'     => 'switch',
					'title'    => esc_html__( 'Sticky Navigation', 'innovation' ),
					'subtitle' => esc_html__( 'This makes main navigation float at the top when the user scrolls up below the fold - essentially making navigation menu always visible', 'innovation' ),
					'default'  => 1
				),
				array(
					'id'       => 'main_nav_social_icon',
					'type'     => 'switch',
					'title'    => esc_html__( 'Show Social Icon', 'innovation' ),
					'subtitle' => esc_html__( 'Enable or disable social icon in main navigation', 'innovation' ),
					'default'  => 1
				),
				array(
					'id'       => 'main_nav_social_icon_color',
					'type'     => 'switch',
					'required' => array( 'main_nav_social_icon', '=', '1' ),
					'title'    => esc_html__( 'Show Color of social icon', 'innovation' ),
					'subtitle' => esc_html__( 'Enable or disable color of social icon in navigation bar', 'innovation' ),
					'default'  => 0
				),
				array(
					'id'       => 'main_nav_search_icon',
					'type'     => 'switch',
					'title'    => esc_html__( 'Show Search Icon', 'innovation' ),
					'subtitle' => esc_html__( 'Enable or disable search icon in main navigation', 'innovation' ),
					'default'  => 1
				),
				array(
					'id'       => 'aside_header_nav_icon',
					'type'     => 'switch',
					'title'    => esc_html__( 'Show Off Canvas Button', 'innovation' ),
					'subtitle' => esc_html__( 'Enable or disable of canvas button', 'innovation' ),
					'default'  => 1
				),
				array(
					'id'     => 'section_end_main_navigation',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_navigation_styling',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Navigation styling', 'innovation' ),
					'indent' => true
				),
				array(
					'id'          => 'main_nav_background',
					'title'       => esc_html__( 'Navigation Background', 'innovation' ),
					'subtitle'    => esc_html__( 'Select background color for navigation, Leave blank if you want to set default', 'innovation' ),
					'type'        => 'color',
					'validate'    => 'color',
					'transparent' => false,
					'default'     => ''
				),
				array(
					'id'          => 'main_nav_text_color',
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
					'title'       => esc_html__( 'Navigation text color', 'innovation' ),
					'subtitle'    => esc_html__( 'Select color for text of navigation.  Leave blank if you want set to default', 'innovation' ),
				),
				array(
					'id'          => 'main_nav_text_color_hover',
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
					'title'       => esc_html__( 'Navigation text hover color', 'innovation' ),
					'subtitle'    => esc_html__( 'Select color for text of navigation when hover and focus.  Leave blank if you want set to default', 'innovation' ),
				),
				array(
					'id'       => 'main_navigation_height',
					'type'     => 'text',
					'class'    => 'small-text',
					'title'    => esc_html__( 'Navigation Height', 'innovation' ),
					'subtitle' => esc_html__( 'Select height for main navigation (in px), Leave blank if you want to set default', 'innovation' ),
					'default'  => '72'
				),
				array(
					'id'       => 'main_sticky_navigation_height',
					'type'     => 'text',
					'class'    => 'small-text',
					'title'    => esc_html__( 'Sticky Navigation Height', 'innovation' ),
					'subtitle' => esc_html__( 'Select height for main navigation when sticky in px', 'innovation' ),
					'default'  => '48'
				),
				array(
					'id'       => 'main_nav_el_border',
					'title'    => esc_html__( 'Border Between Elements Color', 'innovation' ),
					'subtitle' => esc_html__( 'select border color between elements, leave bank or set opacity 0 if you want to remove it', 'innovation' ),
					'type'     => 'color_rgba',
					'default'  => array(
						'color' => '#fff',
						'alpha' => .1
					)
				),
				array(
					'id'       => 'main_nav_shadow',
					'type'     => 'switch',
					'title'    => esc_html__( 'Navigation Shadow', 'innovation' ),
					'subtitle' => esc_html__( 'Enable or disable box shadow for main navigation. That option supports for light background', 'innovation' ),
					'default'  => 0,
				),
				array(
					'id'     => 'section_end_main_navigation_stylist',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//sub navigation
				array(
					'id'     => 'section_start_main_sub_navigation',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'sub level navigation styling', 'innovation' ),
					'indent' => true
				),
				array(
					'id'          => 'main_sub_nav_background',
					'title'       => esc_html__( 'Sub Level Navigation Background', 'innovation' ),
					'subtitle'    => esc_html__( 'Select background color for sub navigation font, Leave Blank if you want to set default', 'innovation' ),
					'type'        => 'color',
					'validate'    => 'color',
					'transparent' => false,
					'default'     => ''
				),
				array(
					'id'          => 'main_nav_sub_level_text_color',
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
					'title'       => esc_html__( 'Sub Level Navigation text color', 'innovation' ),
					'subtitle'    => esc_html__( 'Select color for text of sub level navigation.  Leave blank if you want set to default', 'innovation' ),
				),
				array(
					'id'          => 'main_nav_sub_level_text_color_hover',
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
					'title'       => esc_html__( 'Sub Level Navigation text hover color', 'innovation' ),
					'subtitle'    => esc_html__( 'Select color for text of sub level navigation when hover and focus.  Leave blank if you want set to default', 'innovation' ),
				),
				array(
					'id'       => 'main_sub_nav_shadow',
					'type'     => 'switch',
					'title'    => esc_html__( 'Sub Level Navigation Shadow', 'innovation' ),
					'subtitle' => esc_html__( 'Enable or disable box shadow for sub navigation. That option supports for light background.', 'innovation' ),
					'default'  => 1,
				),
				array(
					'id'       => 'mega_menu_cate_text_style',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Mega Menu Post Text Style', 'innovation' ),
					'subtitle' => esc_html__( 'Select text style for category mega menu post to suit with background.', 'innovation' ),
					'options'  => innovation_ruby_theme_config::text_style(),
					'default'  => 'is-dark-text'
				),
				array(
					'id'     => 'section_end_main_sub_navigation',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}