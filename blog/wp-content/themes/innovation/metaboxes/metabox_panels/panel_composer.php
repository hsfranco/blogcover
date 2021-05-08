<?php

//meta box page composer config
if ( ! function_exists( 'innovation_ruby_metabox_composer' ) ) {
	function innovation_ruby_metabox_composer() {
		return array(
			'id'         => 'innovation_ruby_metabox_composer_options',
			'title'      => esc_html__( 'COMPOSER LATEST BLOG', 'innovation' ),
			'post_types' => array( 'page' ),
			'priority'   => 'default',
			'context'    => 'normal',
			'fields'     => array(
				array(
					'id'      => 'innovation_ruby_composer_latest',
					'name'    => esc_html__( 'latest blog listing section', 'innovation' ),
					'desc'    => esc_html__( 'enable or disable latest blog listing section', 'innovation' ),
					'type'    => 'select',
					'options' => array(
						'1' => esc_html__( 'Enable', 'innovation' ),
						'0' => esc_html__( 'Disable', 'innovation' )
					),
					'std'     => '0'
				),
				array(
					'id'   => 'innovation_ruby_composer_latest_title',
					'name' => esc_html__( 'latest blog title', 'innovation' ),
					'desc' => esc_html__( 'input title for latest blog listing', 'innovation' ),
					'type' => 'text',
					'std'  => esc_html__( 'latest posts', 'innovation' )
				),
				array(
					'id'      => 'innovation_ruby_composer_latest_layout',
					'name'    => esc_html__( 'latest blog layout', 'innovation' ),
					'desc'    => esc_html__( 'select layout for latest blog listing', 'innovation' ),
					'type'    => 'image_select',
					'options' => innovation_ruby_theme_config::metabox_composer_blog_layouts(),
					'std'     => 'grid-layout'
				),
				array(
					'id'      => 'innovation_ruby_composer_big_first',
					'name'    => esc_html__( '1st Classic Post', 'innovation' ),
					'desc'    => esc_html__( 'Enable or disable big classic layout at first of page', 'innovation' ),
					'type'    => 'select',
					'options' => array(
						'1' => esc_html__( 'Enable', 'innovation' ),
						'0' => esc_html__( 'Disable', 'innovation' )
					),
					'std'     => '0'
				),
				array(
					'id'   => 'innovation_ruby_composer_latest_number',
					'name' => esc_html__( 'number of posts', 'innovation' ),
					'desc' => esc_html__( 'select number of posts for latest blog listing', 'innovation' ),
					'type' => 'text',
					'std'  => '6'
				),
				array(
					'id'      => 'innovation_ruby_composer_latest_sidebar',
					'type'    => 'select',
					'name'    => esc_html__( 'sidebar name', 'innovation' ),
					'desc'    => esc_html__( 'Select sidebar for latest blog listing', 'innovation' ),
					'options' => innovation_ruby_theme_config::sidebar_name( false ),
					'std'     => 'innovation_ruby_sidebar_default'
				),
				array(
					'id'       => 'innovation_ruby_composer_latest_sidebar_position',
					'class'    => 'ruby-sidebar-select',
					'name'     => esc_html__( 'sidebar position', 'innovation' ),
					'desc'     => esc_html__( 'select sidebar position for latest blog listing', 'innovation' ),
					'type'     => 'image_select',
					'multiple' => false,
					'options'  => innovation_ruby_theme_config::metabox_composer_sidebar_position(),
					'std'      => 'right'
				),
			)
		);
	}
}