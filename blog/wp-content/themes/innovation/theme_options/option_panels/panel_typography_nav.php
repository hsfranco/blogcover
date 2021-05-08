<?php
if ( ! function_exists( 'innovation_ruby_theme_options_typography_nav' ) ) {
	function innovation_ruby_theme_options_typography_nav() {
		return array(
			'id'         => 'innovation_ruby_theme_options_typography_nav',
			'title'      => esc_html__( 'Navigation Typography', 'innovation' ),
			'icon'       => 'el el-font',
			'desc'       =>  esc_html__( 'Selecting font values for this section.', 'innovation' ),
			'subsection' => true,
			'fields'     => array(
				array(
					'id'     => 'section_start_main_navigation_font',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'widget header font options', 'innovation' ),
					'indent' => true
				),
				array(
					'id'             => 'main_nav_font',
					'type'           => 'typography',
					'title'          => esc_html__( 'Navigation Font', 'innovation' ),
					'google'         => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => false,
					'text-transform' => true,
					'letter-spacing' => true,
					'line-height'    => false,
					'all_styles'     => true,
					'units'          => 'px',
					'subtitle'       => esc_html__( 'Select font for main navigation', 'innovation' ),
					'default'        => array(
						'font-family'    => 'Raleway',
						'font-size'      => '12px',
						'letter-spacing' => '2px',
						'font-weight'    => '600',
						'text-transform' => 'uppercase',
						'google'         => true,
					),
					'output'         => array(
						'.main-nav-wrap ul.main-nav-inner > li > a',
						'.mobile-nav-wrap'
					)
				),
				array(
					'id'             => 'main_sub_nav_font',
					'type'           => 'typography',
					'title'          => esc_html__( 'Sub Level Navigation Font', 'innovation' ),
					'google'         => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => false,
					'text-transform' => true,
					'letter-spacing' => true,
					'line-height'    => false,
					'all_styles'     => true,
					'units'          => 'px',
					'subtitle'       => esc_html__( 'Select font for sub level navigation', 'innovation' ),
					'default'        => array(
						'font-family'    => 'Raleway',
						'font-size'      => '10px',
						'letter-spacing' => '1px',
						'font-weight'    => '600',
						'text-transform' => 'uppercase',
						'google'         => true,
					),
					'output'         => array(
						'.is-sub-menu li.menu-item',
						'.mobile-nav-wrap .show-sub-menu > .sub-menu'
					)
				),
				array(
					'id'     => 'section_end_main_navigation_font',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//widget heading font
				array(
					'id'     => 'section_start_widget_header_font',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'widget header font options', 'innovation' ),
					'indent' => true
				),
				array(
					'id'             => 'widget_header_font',
					'type'           => 'typography',
					'title'          => esc_html__( 'Widget Header & Block Header Font', 'innovation' ),
					'subtitle'       => esc_html__( 'Select font for widget header', 'innovation' ),
					'google'         => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => true,
					'text-transform' => true,
					'letter-spacing' => true,
					'line-height'    => false,
					'units'          => 'px',
					'default'        => array(
						'font-family'    => 'Raleway',
						'font-size'      => '12px',
						'color'          => '#282828',
						'google'         => true,
						'font-weight'    => '600',
						'letter-spacing' => '1px',
						'text-transform' => 'uppercase'
					),
					'output'         => array(
						'.widget-title',
						'.block-title'
					)
				),
				array(
					'id'     => 'section_end_widget_header_font',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}

