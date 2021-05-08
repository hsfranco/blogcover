<?php
if ( ! function_exists( 'innovation_ruby_theme_options_typography_body' ) ) {
	function innovation_ruby_theme_options_typography_body() {
		return array(
			'id'         => 'innovation_ruby_theme_options_typography_body',
			'title'      => esc_html__( 'Body Typography', 'innovation' ),
			'icon'       => 'el el-font',
			'desc'       => esc_html__( 'Selecting font values for this section.', 'innovation' ),
			'subsection' => true,
			'fields'     => array(
				// Body font config
				array(
					'id'     => 'section_start_body_font',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'body content font options', 'innovation' ),
					'indent' => true
				),
				array(
					'id'             => 'body_font',
					'type'           => 'typography',
					'title'          => esc_html__( 'body content Text Font', 'innovation' ),
					'subtitle'       => esc_html__( 'This font of option effects almost every content on the theme', 'innovation' ),
					'google'         => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => true,
					'text-transform' => true,
					'letter-spacing' => true,
					'line-height'    => true,
					'all_styles'     => true,
					'units'          => 'px',
					'default'        => array(
						'font-family' => 'Raleway',
						'google'      => true,
						'font-size'   => '14px',
						'line-height' => '',
						'font-weight' => '400',
						'color'       => '#333',
					),
					'output'         => array( 'body' )
				),
				array(
					'id'     => 'section_end_body_font',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				// block excerpt text
				array(
					'id'     => 'section_start_block_excerpt_font',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'blocks excerpt font options', 'innovation' ),
					'indent' => true
				),
				array(
					'id'       => 'post_excerpt_font_size',
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'title'    => esc_html__( 'Post Excerpt Font Size', 'innovation' ),
					'subtitle' => esc_html__( 'Select font size for post excerpt(px)', 'innovation' ),
					'default'  => '13'
				),
				array(
					'id'     => 'section_end_block_excerpt_font',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				)
			)
		);
	}
}

