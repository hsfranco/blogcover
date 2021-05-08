<?php
//Pages
if ( ! function_exists( 'innovation_ruby_theme_options_page' ) ) {
	function innovation_ruby_theme_options_page() {

		return array(
			'id'    => 'innovation_ruby_theme_ops_section_pages',
			'title' => esc_html__( 'Pages Options', 'innovation' ),
			'desc'  => esc_html__( 'Select options for Pages', 'innovation' ),
			'icon'  => 'el el-gift',
		);
	}
}

//default page
if ( ! function_exists( 'innovation_ruby_default_page_config' ) ) {
	function innovation_ruby_default_page_config() {
		return array(
			'id'         => 'innovation_ruby_theme_ops_section_single_page',
			'title'      => esc_html__( 'single page options', 'innovation' ),
			'desc'       => esc_html__( 'Select options for Pages', 'innovation' ),
			'subsection' => true,
			'icon'       => 'el el-list-alt',
			'fields'     => array(

				//default page options
				array(
					'id'     => 'section_start_single_page',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'single page options', 'innovation' ),
					'indent' => true
				),
				array(
					'id'       => 'default_single_page_title',
					'type'     => 'switch',
					'title'    => esc_html__( 'Single page title', 'innovation' ),
					'subtitle' => esc_html__( 'Enable or disable page title', 'innovation' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'default_single_page_sidebar',
					'type'     => 'select',
					'title'    => esc_html__( 'Single page sidebar', 'innovation' ),
					'subtitle' => esc_html__( 'Select sidebar for default page', 'innovation' ),
					'options'  => innovation_ruby_theme_config::sidebar_name(),
					'default'  => 'innovation_ruby_sidebar_default',
				),
				array(
					'id'       => 'default_single_page_sidebar_position',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Single Page Sidebar Position', 'innovation' ),
					'subtitle' => esc_html__( 'Select sidebar position for default page. This option will override default sidebar position options.', 'innovation' ),
					'options'  => innovation_ruby_theme_config::sidebar_position(),
					'default'  => 'default'
				),
				array(
					'id'       => 'page_max_content_width',
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'title'    => esc_html__( 'Hide Sidebar / Max Width Content', 'innovation' ),
					'subtitle' => esc_html__( 'Select max width of content when hide sidebar in page (in px)', 'innovation' ),
					'default'  => 800
				),
				array(
					'id'       => 'default_single_page_comment_box',
					'type'     => 'switch',
					'title'    => esc_html__( 'Show Comment Box', 'innovation' ),
					'subtitle' => esc_html__( 'Enable or disable the comments on the pages, Default this option is enable', 'innovation' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'     => 'section_end_single_page',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			),
		);
	}
}


//author page
if ( ! function_exists( 'innovation_ruby_author_page_config' ) ) {
	function innovation_ruby_author_page_config() {
		return array(
			'id'         => 'innovation_ruby_theme_ops_section_author_page',
			'title'      => esc_html__( 'author page options', 'innovation' ),
			'desc'       => esc_html__( 'Select options for author page', 'innovation' ),
			'subsection' => true,
			'icon'       => 'el el-list-alt',
			'fields'     => array(
				array(
					'id'     => 'section_start_author_page',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Author Page options', 'innovation' ),
					'indent' => true
				),
				array(
					'id'       => 'author_layouts',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Author page layout', 'innovation' ),
					'subtitle' => esc_html__( 'Select the layout for this page', 'innovation' ),
					'options'  => innovation_ruby_theme_config::blog_layouts(),
					'default'  => 'classic-layout'
				),
				array(
					'id'       => 'author_sidebar',
					'type'     => 'select',
					'title'    => esc_html__( 'Author Page Sidebar', 'innovation' ),
					'subtitle' => esc_html__( 'Select sidebar for this page', 'innovation' ),
					'options'  => innovation_ruby_theme_config::sidebar_name(),
					'default'  => 'innovation_ruby_sidebar_default'
				),
				array(
					'id'       => 'author_sidebar_position',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Author Sidebar Position', 'innovation' ),
					'subtitle' => esc_html__( 'Select sidebar position for this page. This option will override default sidebar position options.', 'innovation' ),
					'options'  => innovation_ruby_theme_config::sidebar_position(),
					'default'  => 'default'
				),
				array(
					'id'       => 'author_header_background',
					'type'     => 'media',
					'title'    => esc_html__( 'Author header BG', 'innovation' ),
					'subtitle' => esc_html__( 'Upload header background for author page header area.', 'innovation' )
				),
				array(
					'id'     => 'section_end_author_page',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),

			)
		);
	}
}


//Search page
if ( ! function_exists( 'innovation_ruby_search_page_config' ) ) {
	function innovation_ruby_search_page_config() {
		return array(
			'id'         => 'innovation_ruby_theme_ops_section_search_page',
			'title'      => esc_html__( 'Search page options', 'innovation' ),
			'desc'       => esc_html__( 'Select options for search page', 'innovation' ),
			'subsection' => true,
			'icon'       => 'el el-list-alt',
			'fields'     => array(
				array(
					'id'     => 'section_start_search_page',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Search Page opitons', 'innovation' ),
					'indent' => true
				),
				array(
					'id'       => 'search_layouts',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Search page layout', 'innovation' ),
					'subtitle' => esc_html__( 'Select the layout for this page', 'innovation' ),
					'options'  => innovation_ruby_theme_config::blog_layouts(),
					'default'  => 'classic-layout'
				),
				array(
					'id'       => 'search_sidebar',
					'type'     => 'select',
					'title'    => esc_html__( 'Search Page Sidebar', 'innovation' ),
					'subtitle' => esc_html__( 'Select sidebar for this page', 'innovation' ),
					'options'  => innovation_ruby_theme_config::sidebar_name(),
					'default'  => 'innovation_ruby_sidebar_default'
				),
				array(
					'id'       => 'search_sidebar_position',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Search Sidebar Position', 'innovation' ),
					'subtitle' => esc_html__( 'Select sidebar position for this page. This option will override default sidebar position option.', 'innovation' ),
					'options'  => innovation_ruby_theme_config::sidebar_position(),
					'default'  => 'default'
				),
				array(
					'id'       => 'search_header_background',
					'type'     => 'media',
					'title'    => esc_html__( 'Archive header BG', 'innovation' ),
					'subtitle' => esc_html__( 'Upload header background for header area.', 'innovation' )
				),
				array(
					'id'       => 'search_filter',
					'title'    => esc_html__( 'Only search Posts', 'innovation' ),
					'subtitle' => esc_html__( 'only display posts in search result', 'innovation' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'     => 'section_end_search_page',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}


//archive page
if ( ! function_exists( 'innovation_ruby_archive_page_config' ) ) {
	function innovation_ruby_archive_page_config() {
		return array(
			'id'         => 'innovation_ruby_theme_ops_section_archive_page',
			'title'      => esc_html__( 'Archive page options', 'innovation' ),
			'desc'       => esc_html__( 'Select options for archive page', 'innovation' ),
			'subsection' => true,
			'icon'       => 'el el-list-alt',
			'fields'     => array(
				array(
					'id'     => 'section_start_archive_page',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Archive Page options', 'innovation' ),
					'indent' => true
				),
				array(
					'id'       => 'archive_layouts',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Archive page Layout', 'innovation' ),
					'subtitle' => esc_html__( 'Select the layout for this page', 'innovation' ),
					'options'  => innovation_ruby_theme_config::blog_layouts(),
					'default'  => 'classic-layout'
				),
				array(
					'id'       => 'archive_sidebar',
					'type'     => 'select',
					'title'    => esc_html__( 'Archive Page Sidebar', 'innovation' ),
					'subtitle' => esc_html__( 'Select sidebar for this page', 'innovation' ),
					'options'  => innovation_ruby_theme_config::sidebar_name(),
					'default'  => 'innovation_ruby_sidebar_default'
				),
				array(
					'id'       => 'archive_sidebar_position',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Archive Sidebar Position', 'innovation' ),
					'subtitle' => esc_html__( 'Select sidebar position for this page. This option will override default sidebar position option.', 'innovation' ),
					'options'  => innovation_ruby_theme_config::sidebar_position(),
					'default'  => 'default'
				),
				array(
					'id'       => 'archive_header_background',
					'type'     => 'media',
					'title'    => esc_html__( 'Archive header BG', 'innovation' ),
					'subtitle' => esc_html__( 'Upload header background for header area.', 'innovation' )
				),
				array(
					'id'     => 'section_end_archive_page',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}


//team author page
if ( ! function_exists( 'innovation_ruby_author_team_page_config' ) ) {
	function innovation_ruby_author_team_page_config() {
		return array(
			'id'         => 'innovation_ruby_theme_ops_section_author_team_page',
			'title'      => esc_html__( 'Author team options', 'innovation' ),
			'desc'       => esc_html__( 'Select options for author team page, to create author team page, please go to page -> add new and then assign "Author Team" Template in Page Attributes option  for that page', 'innovation' ),
			'subsection' => true,
			'icon'       => 'el el-list-alt',
			'fields'     => array(
				array(
					'id'       => 'excepted_author_team_ids',
					'type'     => 'text',
					'title'    => esc_html__( 'Excepted Author IDs', 'innovation' ),
					'subtitle' => esc_html__( 'Input author id if you do not want to display theme in this page, Separated by commas (example: 1,2,3) ', 'innovation' ),
				)
			)
		);
	}
}
