<?php

//meta box featured credit config
if ( ! function_exists( 'innovation_ruby_metabox_credit_text' ) ) {
	function innovation_ruby_metabox_credit_text() {
		return array(
			'id'         => 'innovation_ruby_metabox_credit_text_options',
			'title'      => esc_attr__( 'FEATURED CREDIT OPTION', 'innovation' ),
			'post_types' => array( 'post' ),
			'priority'   => 'high',
			'context'    => 'normal',
			'fields'     => array(
				array(
					'id'   => 'innovation_ruby_credit_text',
					'type' => 'text',
					'name' => esc_attr__( 'featured credit text', 'innovation' ),
					'desc' => esc_attr__( 'Input credit text for featured image', 'innovation' ),
				)
			)
		);
	}
}