<?php
if ( ! function_exists( 'innovation_ruby_theme_options_category' ) ) {
	function innovation_ruby_theme_options_category() {
		return array(
			'id'    => 'innovation_ruby_theme_ops_section_categories',
			'title' => esc_html__( 'Categories Options', 'innovation' ),
			'desc'  => esc_html__( 'Select options for categories', 'innovation' ),
			'icon'  => 'el el-folder-close',
		);
	}
}

//category config
if ( ! function_exists( 'innovation_ruby_theme_options_one_cate' ) ) {
	function innovation_ruby_theme_options_one_cate( $ruby_cate_id, $ruby_cate_name ) {
		return array(
			'title'      => esc_attr( $ruby_cate_name ),
			'id'         => 'innovation_ruby_theme_options_category_el_' . esc_attr( $ruby_cate_id ),
			'desc'       => esc_html__( 'Select options for this category.', 'innovation' ),
			'icon'       => 'el el-list-alt',
			'subsection' => true,
			'fields'     => array(
				//category layout
				array(
					'id'     => 'section_start_cate_layout_' . $ruby_cate_id,
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => $ruby_cate_name . esc_html__( ' Category Icon Color', 'innovation' ),
					'indent' => true
				),
				array(
					'id'       => 'category_layout_' . $ruby_cate_id,
					'type'     => 'image_select',
					'title'    => $ruby_cate_name . ' ' . esc_html__( ' Category Layout', 'innovation' ),
					'subtitle' => esc_html__( 'Select the layout for this category', 'innovation' ),
					'options'  => innovation_ruby_theme_config::blog_layouts(),
					'default'  => 'classic-layout'
				),
				array(
					'id'       => 'category_post_first_' . $ruby_cate_id,
					'title'    => esc_html__( '1st Classic Post', 'innovation' ),
					'subtitle' => esc_html__( 'Enable or disable big classic layout at first of page', 'innovation' ),
					'type'     => 'switch',
					'default'  => 0
				),
				array(
					'id'     => 'section_end_cate_layout_' . $ruby_cate_id,
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//category header background
				array(
					'id'     => 'section_start_cate_header_' . $ruby_cate_id,
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => $ruby_cate_name . esc_html__( ' Category Header Options', 'innovation' ),
					'indent' => true
				),
				array(
					'id'       => 'category_header_style_' . $ruby_cate_id,
					'type'     => 'select',
					'title'    => $ruby_cate_name . ' ' . esc_html__( 'Header Style', 'innovation' ),
					'subtitle' => esc_html__( 'select style for category header', 'innovation' ),
					'options'  => array(
						'1' => esc_html__( 'Title With Background', 'innovation' ),
						'2' => esc_html__( 'Small Title', 'innovation' ),
					),
					'default'  => '1'
				),
				array(
					'id'       => 'category_header_background_' . $ruby_cate_id,
					'type'     => 'media',
					'required' => array( 'category_header_style_' . $ruby_cate_id, '=', '1' ),
					'title'    => $ruby_cate_name . ' ' . esc_html__( 'Header BG', 'innovation' ),
					'subtitle' => esc_html__( 'Upload header background for header area. recommended: width is 1366px and height is less than 500px', 'innovation' )
				),
				array(
					'id'     => 'section_end_cate_header_' . $ruby_cate_id,
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//featured area
				array(
					'id'     => 'section_start_cate_featured_' . $ruby_cate_id,
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => $ruby_cate_name . esc_html__( ' Category Featured Area Options', 'innovation' ),
					'indent' => true
				),
				array(
					'id'       => 'category_featured_style_' . $ruby_cate_id,
					'type'     => 'image_select',
					'title'    => $ruby_cate_name . ' ' . esc_html__( 'Featured Style', 'innovation' ),
					'subtitle' => esc_html__( 'Select style for featured area at the top of category', 'innovation' ),
					'options'  => innovation_ruby_theme_config::featured_type(),
					'default'  => 'hw_carousel'
				),
				array(
					'id'       => 'category_featured_tag_' . $ruby_cate_id,
					'type'     => 'select',
					'data'     => 'tags',
					'multi'    => true,
					'title'    => $ruby_cate_name . ' ' . esc_html__( 'Tags Filter', 'innovation' ),
					'subtitle' => esc_html__( 'Select tags for featured top featured area, you can select multi tags. Leave blank if you don\'t select any tags.', 'innovation' ),
				),
				array(
					'id'       => 'category_featured_sort_' . $ruby_cate_id,
					'type'     => 'select',
					'title'    => $ruby_cate_name . ' ' . esc_html__( 'Sorted By', 'innovation' ),
					'subtitle' => esc_html__( 'Select sort type for top featured area', 'innovation' ),
					'options'  => innovation_ruby_theme_config::post_orders(),
					'default'  => 'date_post'
				),
				array(
					'id'       => 'category_featured_num_' . $ruby_cate_id,
					'title'    => $ruby_cate_name . ' ' . esc_html__( 'Featured Post Number', 'innovation' ),
					'subtitle' => esc_html__( 'Select number of post for top featured area', 'innovation' ),
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'default'  => 6
				),
				array(
					'id'       => 'category_featured_offset_' . $ruby_cate_id,
					'title'    => $ruby_cate_name . ' ' . esc_html__( 'Featured Post Offset', 'innovation' ),
					'subtitle' => esc_html__( 'Select number of posts to displace or pass over. beginning number is 0', 'innovation' ),
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'default'  => 0
				),
				array(
					'id'       => 'category_unique_post_' . $ruby_cate_id,
					'title'    => $ruby_cate_name . ' ' . esc_html__( 'Unique Post', 'innovation' ),
					'subtitle' => esc_html__( 'Don\'t re-display posts if it has been displayed in top featured area.', 'innovation' ),
					'type'     => 'switch',
					'default'  => 0
				),
				array(
					'id'     => 'section_end_cate_featured_' . $ruby_cate_id,
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//icon color
				array(
					'id'     => 'section_start_cate_icon_color_' . $ruby_cate_id,
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => $ruby_cate_name . esc_html__( ' Category Color Options', 'innovation' ),
					'indent' => true
				),
				array(
					'id'          => 'category_icon_color_' . $ruby_cate_id,
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
					'title'       => esc_html__( 'Category Icon Color', 'innovation' ),
					'subtitle'    => esc_html__( 'select color for category icon. Leave bank if you want to set as default theme color', 'innovation' ),
				),
				array(
					'id'     => 'section_end_cate_icon_color_' . $ruby_cate_id,
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//category sidebar
				array(
					'id'     => 'section_start_cate_sidebar_' . $ruby_cate_id,
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => $ruby_cate_name . esc_html__( ' Category Sidebar Options', 'innovation' ),
					'indent' => true
				),
				array(
					'id'       => 'category_sidebar_' . $ruby_cate_id,
					'type'     => 'select',
					'title'    => $ruby_cate_name . ' ' . esc_html__( 'Category Sidebar', 'innovation' ),
					'subtitle' => esc_html__( 'Select sidebar for this category', 'innovation' ),
					'default'  => 'innovation_ruby_sidebar_default',
					'options'  => innovation_ruby_theme_config::sidebar_name()
				),
				//category sidebar position
				array(
					'id'       => 'category_sidebar_position_' . $ruby_cate_id,
					'type'     => 'image_select',
					'title'    => $ruby_cate_name . ' ' . esc_html__( 'Sidebar Position', 'innovation' ),
					'subtitle' => esc_html__( 'Select sidebar position for this category. This option will override default sidebar position options.', 'innovation' ),
					'options'  => innovation_ruby_theme_config::sidebar_position(),
					'default'  => 'default'
				),
				array(
					'id'     => 'section_end_cate_sidebar_' . $ruby_cate_id,
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				)
			)
		);
	}
};
