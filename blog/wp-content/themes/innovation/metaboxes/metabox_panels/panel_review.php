<?php

//meta box post review config
if ( ! function_exists( 'innovation_ruby_metabox_post_review' ) ) {
	function innovation_ruby_metabox_post_review() {
		return array(
			'id'         => 'innovation_ruby_metabox_review_options',
			'title'      => esc_attr__( 'POST REVIEWS', 'innovation' ),
			'post_types' => array( 'post' ),
			'priority'   => 'high',
			'context'    => 'normal',
			'fields'     => array(
				array(
					'name'  => esc_attr__( 'Enable Review', 'innovation' ),
					'id'    => 'innovation_ruby_enable_review',
					'class' => 'ruby-review-checkbox',
					'type'  => 'checkbox',
					'desc'  => esc_attr__( 'enable review score this post', 'innovation' ),
					'std'   => 0,
				),
				array(
					'name'     => esc_attr__( 'Review Box Position', 'innovation' ),
					'id'       => 'innovation_ruby_review_box_position',
					'type'     => 'image_select',
					'multiple' => false,
					'desc'     => esc_attr__( 'select review box position', 'innovation' ),
					'options'  => innovation_ruby_theme_config::metabox_review_box_position(),
					'std'      => 'default'
				),
				array(
					'name' => esc_attr__( 'Criteria 1 Description', 'innovation' ),
					'id'   => 'innovation_ruby_cd1',
					'type' => 'text',
				),
				array(
					'name'       => esc_attr__( 'Criteria 1 Score', 'innovation' ),
					'id'         => 'innovation_ruby_cs1',
					'type'       => 'slider',
					'js_options' => array(
						'min'  => 0,
						'max'  => 10,
						'step' => .1,
					),
				),
				// Criteria 2 Text & Score
				array(
					'name' => esc_attr__( 'Criteria 2 Description', 'innovation' ),
					'id'   => 'innovation_ruby_cd2',
					'type' => 'text',
				),
				array(
					'name'       => esc_attr__( 'Criteria 2 Score', 'innovation' ),
					'id'         => 'innovation_ruby_cs2',
					'type'       => 'slider',
					'js_options' => array(
						'min'  => 0,
						'max'  => 10,
						'step' => .1,
					),
				),
				// Criteria 3 Text & Score
				array(
					'name' => esc_attr__( 'Criteria 3 Description', 'innovation' ),
					'id'   => 'innovation_ruby_cd3',
					'type' => 'text',
				),
				array(
					'name'       => esc_attr__( 'Criteria 3 Score', 'innovation' ),
					'id'         => 'innovation_ruby_cs3',
					'type'       => 'slider',
					'js_options' => array(
						'min'  => 0,
						'max'  => 10,
						'step' => .1,
					),
				),
				// Criteria 4 Text & Score
				array(
					'name' => esc_attr__( 'Criteria 4 Description', 'innovation' ),
					'id'   => 'innovation_ruby_cd4',
					'type' => 'text',
				),
				array(
					'name'       => esc_attr__( 'Criteria 4 Score', 'innovation' ),
					'id'         => 'innovation_ruby_cs4',
					'type'       => 'slider',
					'js_options' => array(
						'min'  => 0,
						'max'  => 10,
						'step' => .1,
					),
				),
				// Criteria 5 Text & Score
				array(
					'name' => esc_attr__( 'Criteria 5 Description', 'innovation' ),
					'id'   => 'innovation_ruby_cd5',
					'type' => 'text',
				),
				array(
					'name'       => esc_attr__( 'Criteria 5 Score', 'innovation' ),
					'id'         => 'innovation_ruby_cs5',
					'type'       => 'slider',
					'js_options' => array(
						'min'  => 0,
						'max'  => 10,
						'step' => .1,
					),
				),
				// Criteria 6 Text & Score
				array(
					'name' => esc_attr__( 'Criteria 6 Description', 'innovation' ),
					'id'   => 'innovation_ruby_cd6',
					'type' => 'text',
				),
				array(
					'name'       => esc_attr__( 'Criteria 6 Score', 'innovation' ),
					'id'         => 'innovation_ruby_cs6',
					'type'       => 'slider',
					'js_options' => array(
						'min'  => 0,
						'max'  => 10,
						'step' => .1,
					),
				),
				// Final average
				array(
					'name'  => esc_attr__( 'Average Score', 'innovation' ),
					'id'    => 'innovation_ruby_as',
					'class' => 'ruby-average-score',
					'type'  => 'text',
				),
				array(
					'name'  => esc_attr__( 'Review Summary', 'innovation' ),
					'id'    => 'innovation_ruby_review_summary',
					'class' => 'field-review-summary',
					'type'  => 'textarea',
				),
			)
		);
	}
}