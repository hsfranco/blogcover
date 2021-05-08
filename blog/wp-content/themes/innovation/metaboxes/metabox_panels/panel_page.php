<?php

//meta box page config
if ( ! function_exists( 'innovation_ruby_metabox_single_page' ) ) {
	function innovation_ruby_metabox_single_page() {
		return array(
			'id'         => 'innovation_ruby_metabox_single_page_options',
			'title'      => esc_attr__( 'PAGE OPTIONS', 'innovation' ),
			'post_types' => array( 'page' ),
			'context'    => 'normal',
			'priority'   => 'high',
			'fields'     => array(
				array(
					'id'      => 'innovation_ruby_page_title',
					'type'    => 'select',
					'name'    => esc_attr__( 'page title', 'innovation' ),
					'desc'    => esc_attr__( 'Enable or disable for this page, This option will override "Theme Options -> Page Settings -> Single Page -> Title" option', 'innovation' ),
					'options' => array(
						'default' => esc_attr__( 'Default From Theme Options', 'innovation' ),
						'show'    => esc_attr__( 'Show', 'innovation' ),
						'none'    => esc_attr__( 'None', 'innovation' )
					),
					'std'     => 'default'
				),
			),
		);
	}
}