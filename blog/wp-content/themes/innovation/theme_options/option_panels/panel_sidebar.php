<?php
//Sidebar & Widget
if ( ! function_exists( 'innovation_ruby_theme_options_sidebar' ) ) {
	function innovation_ruby_theme_options_sidebar() {
		return array(
			'id'     => 'innovation_ruby_theme_ops_section_sidebar',
			'title'  => esc_html__( 'Sidebar Options', 'innovation' ),
			'desc'   => esc_html__( 'Select options for sidebars', 'innovation' ),
			'icon'   => 'el el-th',
			'fields' => array(
				array(
					'id'     => 'section_start_sidebar_general',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Sidebar General Options', 'innovation' ),
					'indent' => true
				),
				array(
					'id'       => 'site_sidebar_position',
					'type'     => 'image_select',
					'title'    => esc_html__( 'sidebar position', 'innovation' ),
					'subtitle' => esc_html__( 'Specify the sidebar to use by default. This can be overridden per-page or per-post basis when creating a page or post.', 'innovation' ),
					'options'  => innovation_ruby_theme_config::sidebar_position( false ),
					'default'  => 'right'
				),
				array(
					'id'       => 'innovation_ruby_multi_sidebar',
					'type'     => 'multi_text',
					'class'    => 'medium-text',
					'title'    => esc_html__( 'custom multi sidebar', 'innovation' ),
					'subtitle' => esc_html__( 'Create or remove an existing sidebar, don\'t forget input name for your sidebar.', 'innovation' ),
					'desc'     => esc_html__( 'Click on "Create Sidebar" and then input sidebar name to create sidebar', 'innovation' ),
					'add_text' => esc_html__( 'Create Sidebar', 'innovation' ),
					'default'  => array()
				),
				array(
					'id'       => 'sticky_sidebar',
					'type'     => 'switch',
					'title'    => esc_html__( 'sticky sidebar', 'innovation' ),
					'subtitle' => esc_html__( 'Making sidebar permanently visible when scrolling up and down. Useful when a sidebar is too tall or too short compared to the rest of the content.', 'innovation' ),
					'default'  => 0
				),
				array(
					'id'     => 'section_end_sidebar_general',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}
