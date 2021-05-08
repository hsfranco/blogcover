<?php
if ( ! function_exists( 'innovation_ruby_theme_options_featured' ) ) {
	function innovation_ruby_theme_options_featured() {
		//featured slider options
		return array(
			'id'     => 'innovation_ruby_theme_ops_section_featured_area',
			'title'  => esc_html__( 'Featured Area', 'innovation' ),
			'desc'   => esc_html__( 'Select options for featured area', 'innovation' ),
			'icon'   => 'el el-fire',
			'fields' => array(

				//featured area
				array(
					'id'     => 'section_start_header_featured',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Featured Top Area Options', 'innovation' ),
					'indent' => true
				),
				array(
					'id'       => 'featured_style',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Featured Style', 'innovation' ),
					'subtitle' => esc_html__( 'Select layout for featured area at the top of home page', 'innovation' ),
					'options'  => innovation_ruby_theme_config::featured_type(),
					'default'  => 'none'
				),
				array(
					'id'       => 'featured_cate',
					'type'     => 'select',
					'data'     => 'categories',
					'multi'    => true,
					'title'    => esc_html__( 'Categories Filter', 'innovation' ),
					'subtitle' => esc_html__( 'Select categories for top featured area, you can select multi category. leave blank if you select all category.', 'innovation' ),
				),
				array(
					'id'       => 'featured_tag',
					'type'     => 'select',
					'data'     => 'tags',
					'multi'    => true,
					'title'    => esc_html__( 'Tags Filter', 'innovation' ),
					'subtitle' => esc_html__( 'Select tags for featured top featured area, you can select multi tags. Leave blank if you don\'t select any tags.', 'innovation' ),
				),
				array(
					'id'       => 'featured_sort',
					'type'     => 'select',
					'title'    => esc_html__( 'Sorted By', 'innovation' ),
					'subtitle' => esc_html__( 'Select sort type for top featured area', 'innovation' ),
					'options'  => innovation_ruby_theme_config::post_orders(),
					'default'  => 'date_post'
				),
				array(
					'id'       => 'featured_num',
					'title'    => esc_html__( 'Number of Posts', 'innovation' ),
					'subtitle' => esc_html__( 'Select number of post for top featured area', 'innovation' ),
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'default'  => 5
				),
				array(
					'id'       => 'featured_offset',
					'title'    => esc_html__( 'Offset of Posts', 'innovation' ),
					'subtitle' => esc_html__( 'Select number of posts to displace or pass over. beginning number is 0', 'innovation' ),
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'default'  => 0
				),
				array(
					'id'     => 'section_end_header_featured',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}