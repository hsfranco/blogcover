<?php
if ( ! function_exists( 'innovation_ruby_theme_options_footer' ) ) {
	function innovation_ruby_theme_options_footer() {
		//footer options
		return array(
			'id'     => 'innovation_ruby_theme_ops_section_fotoer',
			'title'  => esc_html__( 'Footer Options', 'innovation' ),
			'desc'   => esc_html__( 'The footer uses sidebars to show information. . To add content to the footer head go to the widgets section and drag widget to the Footer 1, Footer 2 and Footer 3 sidebars.', 'innovation' ),
			'icon'   => 'el el-th',
			'fields' => array(
				//footer style options configs
				array(
					'id'     => 'section_start_footer_style',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'footer style options', 'innovation' ),
					'indent' => true
				),
				array(
					'id'       => 'footer_style',
					'type'     => 'image_select',
					'title'    => esc_html__( 'footer style', 'innovation' ),
					'subtitle' => esc_html__( 'Select style for footer', 'innovation' ),
					'desc'     => esc_html__( 'To add widget into footer section in widget section style. Please go to widgets page, drag and drop widgets into footer sections', 'innovation' ),
					'options'  => innovation_ruby_theme_config::footers_style(),
					'default'  => '1'
				),
				array(
					'id'       => 'footer_logo',
					'type'     => 'media',
					'required' => array( 'footer_style', '=', '2' ),
					'title'    => esc_html__( 'Footer Logo', 'innovation' ),
					'subtitle' => esc_html__( 'Upload your footer logo', 'innovation' )
				),
				array(
					'id'       => 'footer_social_bar',
					'type'     => 'switch',
					'required' => array( 'footer_style', '=', '2' ),
					'title'    => esc_html__( 'Footer Social Bar', 'innovation' ),
					'subtitle' => esc_html__( 'Enable or disable footer social bar', 'innovation' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'     => 'section_end_footer_style',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//footer options configs
				array(
					'id'     => 'section_start_footer',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'footer options', 'innovation' ),
					'indent' => true
				),
				array(
					'id'          => 'footer_background',
					'type'        => 'background',
					'transparent' => false,
					'title'       => esc_html__( 'Footer Background', 'innovation' ),
					'subtitle'    => esc_html__( 'Footer background with image, color, etc', 'innovation' ),
					'default'     => array(
						'background-color'      => '#282828',
						'background-size'       => 'cover',
						'background-attachment' => 'fixed',
						'background-position'   => 'center center',
						'background-repeat'     => 'no-repeat'
					),
					'output'      => array( '.footer-area' )
				),
				array(
					'id'       => 'fixed_footer',
					'type'     => 'switch',
					'title'    => esc_html__( 'Animation Scrolling', 'innovation' ),
					'subtitle' => esc_html__( 'Enable or disable footer animation scrolling', 'innovation' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'footer_text_style',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Footer Text Style', 'innovation' ),
					'subtitle' => esc_html__( 'Select text style color for footer area. Select dark if you have light background and and vice versa', 'innovation' ),
					'options'  => innovation_ruby_theme_config::text_style(),
					'default'  => 'is-light-text'
				),
				array(
					'id'       => 'fixed_footer_mobile',
					'type'     => 'switch',
					'required' => array( 'fixed_footer', '=', '1' ),
					'title'    => esc_html__( 'Enable Animation On Mobile', 'innovation' ),
					'subtitle' => esc_html__( 'If you have short footer, you can enable animation on mobile', 'innovation' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'     => 'section_end_footer',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//sub footer options configs
				array(
					'id'     => 'section_start_copyright',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Copyright Options', 'innovation' ),
					'indent' => true
				),
				array(
					'id'       => 'site_copyright_bg_color',
					'title'    => esc_html__( 'Copyright BG Color', 'innovation' ),
					'subtitle' => esc_html__( 'Select background color for copyright area.', 'innovation' ),
					'type'     => 'color',
					'validate' => 'color',
					'default'  => '#282828'
				),
				array(
					'id'       => 'site_copyright',
					'type'     => 'textarea',
					'title'    => esc_html__( 'footer copyright text', 'innovation' ),
					'subtitle' => esc_html__( 'Enter footer copyright text and HTML is allowed (a tag).', 'innovation' ),
					'default'  => '',
				),
				array(
					'id'     => 'section_end_copyright',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_back_to_top',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'back to top', 'innovation' ),
					'indent' => true
				),
				array(
					'id'       => 'site_back_to_top',
					'type'     => 'switch',
					'title'    => esc_html__( 'Show To Top Button', 'innovation' ),
					'subtitle' => esc_html__( 'Enable or disable back to top button', 'innovation' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'site_back_to_top_mobile',
					'type'     => 'switch',
					'required' => array( 'site_back_to_top', '=', '1' ),
					'title'    => esc_html__( 'Enable On Mobile', 'innovation' ),
					'subtitle' => esc_html__( 'Enable or disable back to top button on touch device', 'innovation' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'     => 'section_end_general_back_to_top',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}


