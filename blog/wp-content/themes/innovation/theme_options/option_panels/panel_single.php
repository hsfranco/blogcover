<?php
//post options
if ( ! function_exists( 'innovation_ruby_theme_options_single' ) ) {
	function innovation_ruby_theme_options_single() {

		return array(
			'title'  => esc_html__( 'Single Options', 'innovation' ),
			'id'     => 'innovation_ruby_theme_ops_section_single_post',
			'desc'   => esc_html__( 'Select options for single post page', 'innovation' ),
			'icon'   => 'el el-file',
			'fields' => array(

				//single post options
				array(
					'id'     => 'section_start_single_options',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Single post design', 'innovation' ),
					'indent' => true
				),
				array(
					'id'       => 'default_single_post_layout',
					'type'     => 'image_select',
					'title'    => esc_html__( 'single layout', 'innovation' ),
					'subtitle' => esc_html__( 'select default layout for single post', 'innovation' ),
					'options'  => innovation_ruby_theme_config::single_post_layouts(),
					'default'  => 'is_classic',
				),
				array(
					'id'       => 'single_post_meta_info_manager',
					'type'     => 'sorter',
					'title'    => esc_html__( 'entry meta bar manager', 'innovation' ),
					'subtitle' => esc_html__( 'Organize how you want the entry meta bar to appear on single page', 'innovation' ),
					'options'  => array(
						'enabled'  => array(
							'cate'    => esc_html__( 'Category', 'innovation' ),
							'author'  => esc_html__( 'Author', 'innovation' ),
							'date'    => esc_html__( 'Date', 'innovation' ),
							'comment' => esc_html__( 'Comment', 'innovation' ),
							'tag'     => esc_html__( 'Tags', 'innovation' ),
							'view'    => esc_html__( 'View', 'innovation' ),

						),
						'disabled' => array()
					),
				),
				array(
					'id'       => 'default_single_post_first_paragraph',
					'type'     => 'select',
					'title'    => esc_html__( 'First paragraph', 'innovation' ),
					'subtitle' => esc_html__( 'Select style for first paragraph', 'innovation' ),
					'options'  => array(
						'none'           => esc_html__( 'None', 'innovation' ),
						'solid-drop-cap' => esc_html__( 'Drop cap with Bg', 'innovation' ),
						'drop-cap'       => esc_html__( 'Drop cap', 'innovation' ),
						'bold-paragraph' => esc_html__( 'Bold paragraph', 'innovation' ),
						'big-paragraph'  => esc_html__( 'Big Italic Text', 'innovation' )
					),
					'default'  => 'none'
				),
				array(
					'id'       => 'default_single_review_box_position',
					'title'    => esc_html__( 'Review Box Position', 'innovation' ),
					'subtitle' => esc_html__( 'Select review box position', 'innovation' ),
					'type'     => 'image_select',
					'options'  => innovation_ruby_theme_config::review_box_position(),
					'default'  => 'left_top'
				),
				array(
					'id'       => 'popup_gallery',
					'title'    => esc_html__( 'Popup images of gallery post', 'innovation' ),
					'subtitle' => esc_html__( 'Popup when click on images of gallery post', 'innovation' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'       => 'single_popup_image',
					'title'    => esc_html__( 'Popup Images in single', 'innovation' ),
					'subtitle' => esc_html__( 'Popup when click on images, this options will affect to images when like of image has been set "media file".', 'innovation' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'     => 'section_end_single_options',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//SINGLE SIDEBAR
				array(
					'id'     => 'section_start_single_sidebar',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Single post sidebar options', 'innovation' ),
					'indent' => true
				),
				//default sidebar
				array(
					'id'       => 'default_single_post_sidebar',
					'type'     => 'select',
					'title'    => esc_html__( 'Default Post Sidebar', 'innovation' ),
					'subtitle' => esc_html__( 'Select sidebar for single post page', 'innovation' ),
					'options'  => innovation_ruby_theme_config::sidebar_name(),
					'default'  => 'innovation_ruby_sidebar_default'
				),
				//default sidebar position
				array(
					'id'       => 'default_single_post_sidebar_position',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Default Sidebar Position', 'innovation' ),
					'subtitle' => esc_html__( 'Select Position sidebar for single post page, this option will override default sidebar position option.', 'innovation' ),
					'options'  => innovation_ruby_theme_config::sidebar_position(),
					'default'  => 'default'
				),
				array(
					'id'       => 'single_max_content_width',
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'title'    => esc_html__( 'Hide Sidebar / Max Width Content', 'innovation' ),
					'subtitle' => esc_html__( 'Select max width of content when hide sidebar in single page (in px)', 'innovation' ),
					'default'  => 800
				),
				array(
					'id'     => 'section_end_single_sidebar',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//comment box
				array(
					'id'     => 'section_start_single_box',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'single box options', 'innovation' ),
					'indent' => true
				),
				array(
					'id'       => 'single_navigation_box',
					'type'     => 'switch',
					'title'    => esc_html__( 'Show Next and Pre Posts', 'innovation' ),
					'subtitle' => esc_html__( 'Show or hide `next` and `previous` posts', 'innovation' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'single_author_box',
					'type'     => 'switch',
					'title'    => esc_html__( 'Show Author Box', 'innovation' ),
					'subtitle' => esc_html__( 'Enable or disable the author box', 'innovation' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'     => 'section_end_single_box',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//related box
				array(
					'id'     => 'section_start_single_related_box',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'related box options', 'innovation' ),
					'indent' => true
				),
				array(
					'id'       => 'single_related_box',
					'type'     => 'switch',
					'title'    => esc_html__( 'Show Related Box', 'innovation' ),
					'subtitle' => esc_html__( 'Enable or disable the related posts on the single post page', 'innovation' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'single_related_where',
					'type'     => 'select',
					'required' => array( 'single_related_box', '=', '1' ),
					'title'    => esc_html__( 'Display Related Posts', 'innovation' ),
					'subtitle' => esc_html__( 'What posts should be displayed', 'innovation' ),
					'options'  => array(
						'all'        => esc_html__( 'Same tags & categories', 'innovation' ),
						'tags'       => esc_html__( 'Same tags', 'innovation' ),
						'categories' => esc_html__( 'Same categories', 'innovation' ),
					),
					'default'  => 'all'
				),
				array(
					'id'       => 'single_related_number_of_post',
					'type'     => 'text',
					'required' => array( 'single_related_box', '=', '1' ),
					'class'    => 'small-text',
					'validate' => 'numeric',
					'title'    => esc_html__( 'Number of Related Posts', 'innovation' ),
					'subtitle' => esc_html__( 'select number of related posts', 'innovation' ),
					'default'  => 5
				),
				array(
					'id'     => 'section_end_single_related_box',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//socials options
				array(
					'id'     => 'section_start_single_social',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'share to social options', 'innovation' ),
					'indent' => true
				),
				//single shares post
				array(
					'id'       => 'single_top_share_social',
					'type'     => 'switch',
					'title'    => esc_html__( 'Share On Social Bar At Top', 'innovation' ),
					'subtitle' => esc_html__( 'Enable or disable share on social bar at top of single content.', 'innovation' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'single_bottom_share_social',
					'type'     => 'switch',
					'title'    => esc_html__( 'Share On Social Bar At Bottom', 'innovation' ),
					'subtitle' => esc_html__( 'Enable or disable share on social bar at bottom of single content.', 'innovation' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'single_aside_share_social',
					'type'     => 'switch',
					'title'    => esc_html__( 'Share On Social Bar At Aside', 'innovation' ),
					'subtitle' => esc_html__( 'Enable or disable share post at aside of website.', 'innovation' ),
					'switch'   => true,
					'default'  => 1
				),
				//like tweet g+
				array(
					'id'       => 'social_like_post',
					'type'     => 'switch',
					'title'    => esc_html__( 'Show Post LIKE/TWEET/G+', 'innovation' ),
					'subtitle' => esc_html__( 'Enable or disable the post like/tweet/g+ on post', 'innovation' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'     => 'section_end_single_social',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),

				// =======================================================================//
				// ! Single advertising at the top content
				// =======================================================================//
				array(
					'id'     => 'section_start_single_ad_top',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Single post top advertising', 'innovation' ),
					'indent' => true
				),
				array(
					'id'       => 'single_ad_top_type',
					'type'     => 'select',
					'title'    => esc_html__( 'single post - top advertising type', 'innovation' ),
					'subtitle' => esc_html__( 'select advertising type, this advertising will display at the top post content of single post page', 'innovation' ),
					'options'  => array(
						'script' => esc_html__( 'Script', 'innovation' ),
						'custom' => esc_html__( 'Custom Image', 'innovation' ),
					),
					'default'  => 'script',
				),
				array(
					'id'       => 'single_ad_top_script',
					'type'     => 'textarea',
					'validate' => 'js',
					'required' => array( 'single_ad_top_type', '=', 'script' ),
					'title'    => esc_html__( 'advertising code', 'innovation' ),
					'subtitle' => esc_html__( 'Paste in your advertising code (with "script" tag), the theme will modify the codes to responsive your advertising on all devices.', 'innovation' ),
				),
				array(
					'id'       => 'single_ad_top_image',
					'type'     => 'media',
					'required' => array( 'single_ad_top_type', '=', 'custom' ),
					'title'    => esc_html__( 'advertising image', 'innovation' ),
					'subtitle' => esc_html__( 'upload your advertising image (recommended size is about 728x90px)', 'innovation' ),
				),
				array(
					'id'       => 'single_ad_top_url',
					'type'     => 'text',
					'required' => array( 'single_ad_top_type', '=', 'custom' ),
					'title'    => esc_html__( 'advertising URL', 'innovation' ),
					'subtitle' => esc_html__( 'input your custom advertising URL', 'innovation' ),
					'validate' => 'url',
					'default'  => '',
				),
				array(
					'id'     => 'section_end_single_ad_top',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				// =======================================================================//
				// ! Single advertising at the bottom content
				// =======================================================================//
				array(
					'id'     => 'section_start_single_ad_bottom',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'single post bottom advertising', 'innovation' ),
					'indent' => true
				),
				array(
					'id'       => 'single_ad_bottom_type',
					'type'     => 'select',
					'title'    => esc_html__( 'single post - bottom advertising type', 'innovation' ),
					'subtitle' => esc_html__( 'select advertising type, this advertising will display at the bottom post content of single post page', 'innovation' ),
					'options'  => array(
						'script' => esc_html__( 'Script', 'innovation' ),
						'custom' => esc_html__( 'Custom Image', 'innovation' ),
					),
					'default'  => 'script',
				),
				array(
					'id'       => 'single_ad_bottom_script',
					'type'     => 'textarea',
					'validate' => 'js',
					'required' => array( 'single_ad_bottom_type', '=', 'script' ),
					'title'    => esc_html__( 'advertising code', 'innovation' ),
					'subtitle' => esc_html__( 'Paste in your entire advertising code', 'innovation' ),
				),
				array(
					'id'       => 'single_ad_bottom_image',
					'type'     => 'media',
					'required' => array( 'single_ad_bottom_type', '=', 'custom' ),
					'title'    => esc_html__( 'advertising image', 'innovation' ),
					'subtitle' => esc_html__( 'upload your advertising image (recommended size is about 728x90px)', 'innovation' ),
				),
				array(
					'id'       => 'single_ad_bottom_url',
					'type'     => 'text',
					'required' => array( 'single_ad_bottom_type', '=', 'custom' ),
					'title'    => esc_html__( 'advertising URL', 'innovation' ),
					'subtitle' => esc_html__( 'input your custom advertising URL', 'innovation' ),
					'validate' => 'url',
					'default'  => '',
				),
				array(
					'id'     => 'section_end_single_ad_bottom',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			),
		);
	}
}
