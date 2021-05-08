<?php
if ( ! function_exists( 'innovation_ruby_theme_options_home' ) ) {
	function innovation_ruby_theme_options_home() {
		//home home page option
		return array(
			'title'  => esc_html__( 'Blog Options', 'innovation' ),
			'id'     => 'innovation_ruby_theme_ops_section_home',
			'desc'   => esc_html__( 'The settings below only apply to homepages that are set to "Your latest posts" in the "Wordpress Settings -> Reading" section.', 'innovation' ),
			'icon'   => 'el el-laptop',
			'fields' => array(

				//first post
				array(
					'id'     => 'section_start_first_post',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'First Post At The Top Options', 'innovation' ),
					'indent' => true
				),
				array(
					'id'       => 'big_post_first',
					'title'    => esc_html__( '1st classic post', 'innovation' ),
					'subtitle' => esc_html__( 'Enable or disable big classic layout at first of page', 'innovation' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'     => 'section_end_first_post',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//home layout
				array(
					'id'     => 'section_start_home_layout',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'blog listing layout options', 'innovation' ),
					'indent' => true
				),
				array(
					'id'       => 'home_layout',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Blog listing layout', 'innovation' ),
					'subtitle' => esc_html__( 'Select the layout for this page', 'innovation' ),
					'options'  => innovation_ruby_theme_config::blog_layouts(),
					'default'  => 'classic-layout'
				),
				array(
					'id'       => 'unique_post',
					'title'    => esc_html__( 'Unique Post', 'innovation' ),
					'subtitle' => esc_html__( 'Don\'t re-display posts if it has been displayed in top featured area.', 'innovation' ),
					'type'     => 'switch',
					'default'  => 0
				),
				array(
					'id'     => 'section_end_home_home',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_home_sidebar',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Blog listings Sidebar options', 'innovation' ),
					'indent' => true
				),
				array(
					'id'       => 'home_sidebar',
					'type'     => 'select',
					'title'    => esc_html__( 'Blog listings Page Sidebar', 'innovation' ),
					'subtitle' => esc_html__( 'Select sidebar for this page', 'innovation' ),
					'options'  => innovation_ruby_theme_config::sidebar_name(),
					'default'  => 'innovation_ruby_sidebar_default'
				),
				array(
					'id'       => 'home_sidebar_position',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Blog listings Sidebar Position', 'innovation' ),
					'subtitle' => esc_html__( 'Select sidebar position for this page. This option will override default sidebar position option.', 'innovation' ),
					'options'  => innovation_ruby_theme_config::sidebar_position(),
					'default'  => 'default'
				),
				array(
					'id'     => 'section_end_home_sidebar',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}