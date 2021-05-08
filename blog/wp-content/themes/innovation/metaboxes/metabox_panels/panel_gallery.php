<?php
//meta box post gallery config
if ( ! function_exists( 'innovation_ruby_metabox_post_gallery' ) ) {
	function innovation_ruby_metabox_post_gallery() {
		return array(
			'id'         => 'innovation_ruby_metabox_gallery_options',
			'title'      => esc_attr__( 'GALLERY OPTIONS', 'innovation' ),
			'post_types' => array( 'post' ),
			'priority'   => 'default',
			'context'    => 'normal',
			'fields'     => array(
				array(
					'id'   => 'innovation_ruby_single_gallery_data',
					'name' => esc_attr__( 'select gallery', 'innovation' ),
					'desc' => esc_attr__( 'Select your pictures for gallery', 'innovation' ),
					'type' => 'image_advanced',
				),
				array(
					'id'       => 'innovation_ruby_single_gallery_type',
					'name'     => esc_attr__( 'gallery type', 'innovation' ),
					'desc'     => esc_attr__( 'Select type for gallery', 'innovation' ),
					'type'     => 'select',
					'multiple' => false,
					'options'  => array(
						'slider' => esc_attr__( 'Slider', 'innovation' ),
						'grid'   => esc_attr__( 'Grid Images', 'innovation' )
					),
					'std'      => 'slider',
				)
			)
		);
	}
}