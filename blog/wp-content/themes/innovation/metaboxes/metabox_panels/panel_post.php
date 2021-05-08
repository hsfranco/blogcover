<?php

//meta box post config
if ( ! function_exists( 'innovation_ruby_metabox_single_post' ) ) {
	function innovation_ruby_metabox_single_post() {
		return array(
			'id'         => 'innovation_ruby_metabox_single_post_options',
			'title'      => esc_attr__( 'POST OPTIONS', 'innovation' ),
			'post_types' => array( 'post' ),
			'priority'   => 'high',
			'context'    => 'normal',
			'fields'     => array(
				array(
					'id'      => 'innovation_ruby_single_layout',
					'type'    => 'image_select',
					'name'    => esc_attr__( 'post layout', 'innovation' ),
					'desc'    => esc_attr__( 'Select layout for this post', 'innovation' ),
					'options' => innovation_ruby_theme_config::metabox_single_post_layouts(),
					'std'     => 'default'
				),
				array(
					'id'      => 'innovation_ruby_single_first_paragraph',
					'type'    => 'select',
					'name'    => esc_attr__( 'first paragraph', 'innovation' ),
					'desc'    => esc_attr__( 'Select style for first paragraph, This option will override "Theme Options -> Single Post -> First paragraph" option', 'innovation' ),
					'options' => array(
						'default'        => esc_attr__( 'Default From Theme Options', 'innovation' ),
						'solid-drop-cap' => esc_attr__( 'Drop cap with Bg', 'innovation' ),
						'drop-cap'       => esc_attr__( 'Drop cap', 'innovation' ),
						'bold-paragraph' => esc_attr__( 'Bold paragraph', 'innovation' ),
						'big-paragraph'  => esc_attr__( 'Big Italic Text', 'innovation' ),
						'none'           => esc_attr__( 'None', 'innovation' ),
					),
					'std'     => 'default'
				),
				array(
					'name'        => esc_attr__( 'Primary Category', 'innovation' ),
					'id'          => 'innovation_ruby_single_primary_category',
					'type'        => 'taxonomy_advanced',
					'taxonomy'    => 'category',
					'placeholder' => esc_attr__( 'Select a category', 'innovation' ),
					'desc'        => esc_attr__( 'If the posts has multiple category, You can one select here and it will appears in the meta category info.', 'innovation' ),
					'field_type'  => 'select',
					'std'         => ''
				),
			),
		);
	}
}