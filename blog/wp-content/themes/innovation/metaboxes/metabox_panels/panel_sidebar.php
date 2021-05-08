<?php

//meta box sidebar config
if ( ! function_exists( 'innovation_ruby_metabox_sidebar' ) ) {
	function innovation_ruby_metabox_sidebar() {
		return array(
			'id'         => 'innovation_ruby_metabox_sidebar_options',
			'title'      => esc_attr__( 'SIDEBAR OPTIONS', 'innovation' ),
			'post_types' => array( 'post', 'page' ),
			'priority'   => 'default',
			'context'    => 'side',
			'fields'     => array(
				array(
					'id'      => 'innovation_ruby_sidebar_name',
					'type'    => 'select',
					'name'    => esc_attr__( 'sidebar name', 'innovation' ),
					'desc'    => esc_attr__( 'Select sidebar for this post, This option will override "Theme Options -> Single Post -> Default Sidebar" option', 'innovation' ),
					'options' => innovation_ruby_theme_config::sidebar_name( true ),
					'std'     => 'innovation_ruby_default_from_theme_options'
				),
				array(
					'id'       => 'innovation_ruby_sidebar_position',
					'name'     => esc_attr__( 'sidebar position', 'innovation' ),
					'desc'     => esc_attr__( 'Select sidebar position for this post, This option will override "Theme Options -> Single Post -> Default Sidebar Position" option', 'innovation' ),
					'class'    => 'ruby-sidebar-select',
					'type'     => 'image_select',
					'multiple' => false,
					'options'  => innovation_ruby_theme_config::metabox_sidebar_position(),
					'std'      => 'default'
				),
			)
		);
	}
}