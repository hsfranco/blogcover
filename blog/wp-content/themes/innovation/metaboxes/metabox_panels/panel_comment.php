<?php

//meta box comments config
if ( ! function_exists( 'innovation_ruby_metabox_comment_box' ) ) {
	function innovation_ruby_metabox_comment_box() {
		return array(
			'id'         => 'innovation_ruby_metabox_comment_box_options',
			'title'      => esc_attr__( 'COMMENT OPTIONS', 'innovation' ),
			'post_types' => array( 'page' ),
			'priority'   => 'default',
			'context'    => 'side',
			'fields'     => array(
				array(
					'id'      => 'innovation_ruby_single_comment_box',
					'type'    => 'select',
					'name'    => esc_attr__( 'comment box', 'innovation' ),
					'desc'    => esc_attr__( 'Enable or disable this post comments box, This option will override "Theme Options -> Single Post-> Show Comment Box" option', 'innovation' ),
					'options' => array(
						'default' => esc_attr__( 'Default From Theme Options', 'innovation' ),
						'show'    => esc_attr__( 'Show', 'innovation' ),
						'none'    => esc_attr__( 'None', 'innovation' )
					),
					'std'     => 'default'
				)
			)
		);
	}
}