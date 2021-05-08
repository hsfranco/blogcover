<?php
if ( ! function_exists( 'innovation_ruby_theme_options_block_design' ) ) {
	function innovation_ruby_theme_options_block_design() {
		//design config
		return array(
			'id'     => 'innovation_ruby_theme_ops_section_design',
			'title'  => esc_html__( 'Block Styling', 'innovation' ),
			'desc'   => esc_html__( 'Select layout options for all blocks', 'innovation' ),
			'icon'   => 'el el-magic',
			'fields' => array(

				//BLOCK DESIGN
				array(
					'id'     => 'section_start_featured_image_styling',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Featured image options', 'innovation' ),
					'indent' => true
				),
				array(
					'id'       => 'thumb_pattern',
					'title'    => esc_html__( 'Featured Area Pattern', 'innovation' ),
					'subtitle' => esc_html__( 'Enable or disable pattern on featured area', 'innovation' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'       => 'thumb_holder',
					'title'    => esc_html__( 'Thumb Holder', 'innovation' ),
					'subtitle' => esc_html__( 'Hold thumbnail height when loading the site.', 'innovation' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'     => 'section_end_featured_image_styling',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//entry meta section
				array(
					'id'     => 'section_start_post_meta_info_design',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'entry meta options', 'innovation' ),
					'indent' => true
				),
				array(
					'id'       => 'category_bar',
					'title'    => esc_html__( 'Category info', 'innovation' ),
					'subtitle' => esc_html__( 'Enable or disable category information bar', 'innovation' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'       => 'category_bar_style',
					'title'    => esc_html__( 'Category info style', 'innovation' ),
					'subtitle' => esc_html__( 'select style for the category bar', 'innovation' ),
					'required' => array( 'category_bar', '=', '1' ),
					'type'     => 'select',
					'options'  => array(
						'1' => esc_html__( 'Style 1', 'innovation' ),
						'2' => esc_html__( 'Style 2', 'innovation' ),
						'3' => esc_html__( 'Style 3', 'innovation' ),
						'4' => esc_html__( 'Style 4', 'innovation' ),
					),
					'default'  => 1
				),
				array(
					'id'       => 'post_meta_info_manager',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Entry meta info', 'innovation' ),
					'subtitle' => esc_html__( 'Organize how you want the main entry meta tags to appear on block', 'innovation' ),
					'options'  => array(
						'enabled'  => array(
							'author' => esc_html__( 'Author', 'innovation' ),
							'date'   => esc_html__( 'Date', 'innovation' ),
						),
						'disabled' => array(
							'cate'    => esc_html__( 'Category', 'innovation' ),
							'tag'     => esc_html__( 'Tags', 'innovation' ),
							'view'    => esc_html__( 'View', 'innovation' ),
							'comment' => esc_html__( 'Comment', 'innovation' )
						)
					),
				),
				array(
					'id'       => 'post_format_icon',
					'title'    => esc_html__( 'Post Format Icon', 'innovation' ),
					'subtitle' => esc_html__( 'Enable or disable post format icon if that post is video, audio or gallery format.', 'innovation' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'     => 'section_end_post_meta_info_design',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//BLOCK HEADER TEXT ALIGN
				array(
					'id'     => 'section_start_block_header_align',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'post header text align options', 'innovation' ),
					'indent' => true
				),
				array(
					'id'       => 'post_header_center_text',
					'title'    => esc_html__( 'Post Header Center Text', 'innovation' ),
					'subtitle' => esc_html__( 'Enable or disable align center text in header of post layout. that option will be effect all layout', 'innovation' ),
					'type'     => 'switch',
					'default'  => 0
				),
				array(
					'id'     => 'section_end_block_header_align',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//share bar social
				array(
					'id'     => 'section_start_share_bar_design',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'share to social bar options', 'innovation' ),
					'indent' => true
				),
				array(
					'id'       => 'post_share_bar',
					'title'    => esc_html__( 'Share To Social Bar', 'innovation' ),
					'subtitle' => esc_html__( 'Enable or disable share bar', 'innovation' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'       => 'right_social_bar_el',
					'type'     => 'select',
					'title'    => esc_html__( 'right social bar element', 'innovation' ),
					'subtitle' => esc_html__( 'select element to display at right of share to bar', 'innovation' ),
					'options'  => array(
						'comment' => esc_html__( 'Comment', 'innovation' ),
						'view'    => esc_html__( 'View', 'innovation' ),
						'none'    => esc_html__( 'None', 'innovation' )

					),
					'default'  => 'comment'
				),
				array(
					'id'       => 'classic_share_bar_position',
					'type'     => 'select',
					'title'    => esc_html__( 'classic share bar position', 'innovation' ),
					'subtitle' => esc_html__( 'select position of share bar for classic block', 'innovation' ),
					'options'  => array(
						'relative' => esc_html__( 'Below Entry Meta', 'innovation' ),
						'overlay'  => esc_html__( 'Overlay Featured Image', 'innovation' )
					),
					'default'  => 'relative'
				),
				array(
					'id'       => 'grid_share_bar_position',
					'type'     => 'select',
					'title'    => esc_html__( 'grid share bar position', 'innovation' ),
					'subtitle' => esc_html__( 'select position of share bar for grid block', 'innovation' ),
					'options'  => array(
						'relative' => esc_html__( 'Below Entry Meta', 'innovation' ),
						'overlay'  => esc_html__( 'Overlay Featured Image', 'innovation' )
					),
					'default'  => 'relative'
				),
				array(
					'id'       => 'list_share_bar_position',
					'type'     => 'select',
					'title'    => esc_html__( 'list share bar position', 'innovation' ),
					'subtitle' => esc_html__( 'select position of share bar for list block', 'innovation' ),
					'options'  => array(
						'relative' => esc_html__( 'Below Entry Meta', 'innovation' ),
						'overlay'  => esc_html__( 'Overlay Featured Image', 'innovation' )
					),
					'default'  => 'relative'
				),
				array(
					'id'     => 'section_end_share_bar_design',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//block excerpt section
				array(
					'id'     => 'section_start_block_excerpt_length',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Excerpt Length options', 'innovation' ),
					'indent' => true
				),
				array(
					'id'       => 'grid_excerpt_length',
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'title'    => esc_html__( 'grid excerpt length', 'innovation' ),
					'subtitle' => esc_html__( 'select length of excerpt for all grid blocks, leave blank or set is 0 if you want disable excerpt', 'innovation' ),
					'default'  => 25
				),
				array(
					'id'       => 'small_grid_excerpt_length',
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'title'    => esc_html__( 'small grid excerpt length', 'innovation' ),
					'subtitle' => esc_html__( 'select length of excerpt for all small grid blocks, leave blank or set is 0 if you want disable excerpt', 'innovation' ),
					'default'  => 20
				),
				array(
					'id'       => 'list_excerpt_length',
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'title'    => esc_html__( 'list excerpt length', 'innovation' ),
					'subtitle' => esc_html__( 'select length of excerpt for all list blocks, leave blank or set is 0 if you want disable excerpt', 'innovation' ),
					'default'  => 35
				),
				array(
					'id'       => 'classic_summary_type',
					'title'    => esc_html__( 'Classic Summary Types', 'innovation' ),
					'subtitle' => esc_html__( 'Select summary type for classic layouts', 'innovation' ),
					'type'     => 'switch',
					'default'  => 1,
					'on'       => 'Use Read More Tag',
					'off'      => 'Use Excerpt',
				),
				array(
					'id'       => 'classic_excerpt_length',
					'type'     => 'text',
					'title'    => esc_html__( 'Classic excerpt length', 'innovation' ),
					'subtitle' => esc_html__( 'Select length of excerpt for all classic blocks, leave blank or set is 0 if you want disable excerpt', 'innovation' ),
					'required' => array( 'classic_summary_type', '=', 0 ),
					'class'    => 'small-text',
					'validate' => 'numeric',
					'default'  => 100
				),
				array(
					'id'     => 'section_end_block_excerpt_length',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//read more section
				array(
					'id'     => 'section_start_read_more_text',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'read more option', 'innovation' ),
					'indent' => true
				),
				array(
					'id'       => 'site_readmore_text',
					'type'     => 'text',
					'validate' => 'text',
					'title'    => esc_html__( 'read more - text', 'innovation' ),
					'subtitle' => esc_html__( 'Input text for "Read more" button. Default is "read more". Leave blank or set 0 if you want disable "Read more" button', 'innovation' ),
					'default'  => 'read more',
				),
				array(
					'id'     => 'section_end_read_more_text',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//score intro section
				array(
					'id'     => 'section_start_review_score_intro',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'review score options', 'innovation' ),
					'indent' => true
				),
				array(
					'id'       => 'review_score_icon',
					'title'    => esc_html__( 'review score icon', 'innovation' ),
					'subtitle' => esc_html__( 'Enable or disable review score icon', 'innovation' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'       => 'review_score_intro',
					'title'    => esc_html__( 'review intro text', 'innovation' ),
					'subtitle' => esc_html__( 'Enable or disable review intro text', 'innovation' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'       => 'score_intro_1',
					'type'     => 'text',
					'title'    => esc_html__( '0 - 3 score intro', 'innovation' ),
					'required' => array( 'review_score_intro', '=', '1' ),
					'subtitle' => esc_html__( 'display text below score', 'innovation' ),
					'default'  => esc_html__( 'tech score', 'innovation' )
				),
				array(
					'id'       => 'score_intro_2',
					'type'     => 'text',
					'required' => array( 'review_score_intro', '=', '1' ),
					'title'    => esc_html__( '3 - 5 score intro', 'innovation' ),
					'subtitle' => esc_html__( 'display text below score', 'innovation' ),
					'default'  => esc_html__( 'tech score', 'innovation' )
				),
				array(
					'id'       => 'score_intro_3',
					'type'     => 'text',
					'required' => array( 'review_score_intro', '=', '1' ),
					'title'    => esc_html__( '5 - 8 score intro', 'innovation' ),
					'subtitle' => esc_html__( 'display text below score', 'innovation' ),
					'default'  => esc_html__( 'tech score', 'innovation' )
				),
				array(
					'id'       => 'score_intro_4',
					'type'     => 'text',
					'required' => array( 'review_score_intro', '=', '1' ),
					'title'    => esc_html__( '8 - 10 score intro', 'innovation' ),
					'subtitle' => esc_html__( 'display text below score', 'innovation' ),
					'default'  => esc_html__( 'tech score', 'innovation' )
				),
				array(
					'id'     => 'section_end_review_score_intro',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}