<?php
if ( ! function_exists( 'innovation_ruby_theme_options_typography_post' ) ) {
	function innovation_ruby_theme_options_typography_post() {
		return array(
			'id'         => 'innovation_ruby_theme_options_typography_post',
			'title'      => esc_html__( 'Post Typography', 'innovation' ),
			'icon'       => 'el el-font',
			'subsection' => true,
			'desc'       =>  esc_html__( 'Selecting font values for this section.', 'innovation' ),
			'fields'     => array(
				//block title font
				array(
					'id'     => 'section_start_block_titles_font',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'post title font options', 'innovation' ),
					'indent' => true
				),
				array(
					'id'             => 'medium_post_title_font',
					'type'           => 'typography',
					'title'          => esc_html__( 'Medium Title Font', 'innovation' ),
					'subtitle'       => esc_html__( 'Select font for medium post titles, This setting will affect to grid and list title.', 'innovation' ),
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
						'font-size'      => '18px',
						'text-transform' => 'capitalize',
						'google'         => true,
						'font-weight'    => '700',
						'color'          => '#282828'
					),
					'output'         => array(
						'.post-title',
						'.review-info-score',
						'.review-as'
					)
				),
				array(
					'id'       => 'small_post_title_font_size',
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'title'    => esc_html__( 'Small Title Font Size', 'innovation' ),
					'subtitle' => esc_html__( 'Select font size for small post title in px, this setting will affect to related and widget title.', 'innovation' ),
					'default'  => '14'
				),
				array(
					'id'       => 'big_post_title_font_size',
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'title'    => esc_html__( 'Big Title Font Size', 'innovation' ),
					'subtitle' => esc_html__( 'Select font size for big post title in px, this setting will affect classic title', 'innovation' ),
					'default'  => '26'
				),
				array(
					'id'       => 'single_post_title_font_size',
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'title'    => esc_html__( 'Single Title Font Size', 'innovation' ),
					'subtitle' => esc_html__( 'Single font size for big post title in px, this setting will affect to single page title', 'innovation' ),
					'default'  => '36'
				),
				array(
					'id'     => 'section_end_block_titles_font',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//block meta fonts
				array(
					'id'     => 'section_start_block_meta_font',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'post entry meta font options', 'innovation' ),
					'indent' => true
				),
				array(
					'id'             => 'meta_info_font',
					'type'           => 'typography',
					'title'          => esc_html__( 'entry meta font', 'innovation' ),
					'subtitle'       => esc_html__( 'Select the font of main entry meta', 'innovation' ),
					'google'         => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => true,
					'text-transform' => true,
					'letter-spacing' => true,
					'font-weight'    => true,
					'line-height'    => false,
					'units'          => 'px',
					'default'        => array(
						'font-size'      => '10px',
						'google'         => true,
						'font-weight'    => '400',
						'color'          => '#777',
						'font-family'    => 'Lato',
						'text-transform' => 'uppercase',
						'letter-spacing' => '1px',
					),
					'output'         => array(
						'.post-meta-info',
						'.review-info-intro'
					)
				),
				array(
					'id'             => 'cate_bar_font',
					'type'           => 'typography',
					'title'          => esc_html__( 'Category Bar & Share Bar Font', 'innovation' ),
					'subtitle'       => esc_html__( 'Select the font category bar & share bar of block', 'innovation' ),
					'google'         => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => false,
					'text-transform' => true,
					'letter-spacing' => true,
					'font-weight'    => true,
					'line-height'    => false,
					'units'          => 'px',
					'default'        => array(
						'font-size'      => '11px',
						'google'         => true,
						'font-weight'    => '700',
						'font-family'    => 'Lato',
						'text-transform' => 'uppercase',
						'letter-spacing' => '1px',
					),
					'output'         => array(
						'.post-cate-info',
						'.box-share ',
						'.post-share-bar'
					)
				),
				array(
					'id'             => 'read_more_font',
					'type'           => 'typography',
					'title'          => esc_html__( 'Read More Button Font', 'innovation' ),
					'subtitle'       => esc_html__( 'Select font for read more button', 'innovation' ),
					'google'         => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => false,
					'text-transform' => true,
					'letter-spacing' => true,
					'font-weight'    => true,
					'line-height'    => false,
					'units'          => 'px',
					'default'        => array(
						'font-size'      => '10px',
						'google'         => true,
						'font-weight'    => '400',
						'font-family'    => 'Lato',
						'text-transform' => 'uppercase',
						'letter-spacing' => '2px',
					),
					'output'         => array(
						'.post-btn',
						'.pagination-load-more'
					)
				),
				array(
					'id'     => 'section_end_block_meta_font',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}

