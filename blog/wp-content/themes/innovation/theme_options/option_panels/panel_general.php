<?php
/**
 * this is general config
 */
if ( ! function_exists( 'innovation_ruby_theme_options_general' ) ) {
	function innovation_ruby_theme_options_general() {
		return array(
			'id'     => 'innovation_ruby_theme_ops_section_general',
			'title'  => esc_html__( 'General Options', 'innovation' ),
			'desc'   => esc_html__( 'Select options for general options', 'innovation' ),
			'icon'   => 'el el-icon-globe',
			'fields' => array(

				//Site width section config
				array(
					'id'     => 'section_start_site_width',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Site Width Options', 'innovation' ),
					'indent' => true,
				),
				array(
					'id'       => 'main_site_layout',
					'type'     => 'select',
					'title'    => esc_html__( 'Main Site Layout', 'innovation' ),
					'subtitle' => esc_html__( 'Select layout for your site', 'innovation' ),
					'options'  => array(
						'is-full-width' => esc_html__( 'Full Width', 'innovation' ),
						'is-boxed'      => esc_html__( 'Boxed', 'innovation' )
					),
					'default'  => 'is-full-width'
				),
				array(
					'id'          => 'site_background',
					'type'        => 'background',
					'transparent' => false,
					'title'       => esc_html__( 'Site Background', 'innovation' ),
					'subtitle'    => esc_html__( 'Site background with image, color, etc', 'innovation' ),
					'required'    => array( 'main_site_layout', '!=', 'is-full-width' ),
					'default'     => array(
						'background-color'      => '#fff',
						'background-size'       => 'cover',
						'background-attachment' => 'fixed',
						'background-position'   => 'left top',
						'background-repeat'     => 'no-repeat'
					),
					'output'      => array( 'body' ),
				),
				array(
					'id'       => 'site_background_link',
					'type'     => 'text',
					'validate' => 'url',
					'required' => array( 'main_site_layout', '!=', 'is-full-width' ),
					'title'    => esc_html__( 'BG Navigate URL', 'innovation' ),
					'subtitle' => esc_html__( 'Navigate to URL when click on site background ', 'innovation' ),
					'default'  => ''
				),
				array(
					'id'            => 'site_container_width',
					'type'          => 'slider',
					'title'         => esc_html__( 'Max width of Content', 'innovation' ),
					'subtitle'      => esc_html__( 'Controls the overall site width. In px, ex: 1080px. default value is 1200px', 'innovation' ),
					'default'       => 1200,
					'min'           => 960,
					'max'           => 1200,
					'step'          => 10,
					'display_value' => 'text',
				),
				array(
					'id'     => 'section_end_site_width',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//Smooth style section config
				array(
					'id'     => 'section_start_smooth_style',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Smooth Style Options', 'innovation' ),
					'indent' => true,
				),
				array(
					'id'       => 'site_smooth_scroll',
					'type'     => 'switch',
					'title'    => esc_html__( 'Smooth Scroll', 'innovation' ),
					'subtitle' => esc_html__( 'Smooth scrolling with the mouse wheel in all browsers', 'innovation' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'site_smooth_display',
					'type'     => 'switch',
					'title'    => esc_html__( 'Smooth Display', 'innovation' ),
					'subtitle' => esc_html__( 'Add animation to display images when scrolling down a page', 'innovation' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'site_smooth_display_style',
					'type'     => 'select',
					'title'    => esc_html__( 'Animation Style', 'innovation' ),
					'required' => array( 'site_smooth_display', '=', '1' ),
					'subtitle' => esc_html__( 'Select animation style for display images when scrolling down', 'innovation' ),
					'options'  => array(
						'ruby-zoom'   => esc_html__( 'Zoom In', 'innovation' ),
						'ruby-fade'   => esc_html__( 'Fade In', 'innovation' ),
						'ruby-bottom' => esc_html__( 'Fade Form Bottom', 'innovation' )
					),
					'default'  => 'ruby-zoom'
				),
				array(
					'id'     => 'section_end_smooth_style',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				),
				//pagination type
				array(
					'id'     => 'section_start_pagination_style',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Blog pagination options', 'innovation' ),
					'indent' => true,
				),
				array(
					'id'       => 'page_pagination_style',
					'type'     => 'select',
					'title'    => esc_html__( 'Pagination Type', 'innovation' ),
					'subtitle' => esc_html__( 'Select a pagination type for blog listing page. This option will not affect to latest blog listing of composer page.', 'innovation' ),
					'options'  => array(
						'standard'        => esc_html__( 'Standard', 'innovation' ),
						'load_more'       => esc_html__( 'Load More', 'innovation' ),
						'infinite_scroll' => esc_html__( 'Infinite Scroll', 'innovation' )
					),
					'default'  => 'standard',
				),
				array(
					'id'       => 'simple_page_pagination',
					'type'     => 'switch',
					'required' => array( 'page_pagination_style', '=', 'standard' ),
					'title'    => esc_html__( 'Simple Page Pagination', 'innovation' ),
					'subtitle' => esc_html__( 'Disable numeric pagination and return simple pagination of WordPress.', 'innovation' ),
					'default'  => 0,
				),
				array(
					'id'     => 'section_end_pagination_style',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				),
				//Miscellaneous section config
				array(
					'id'     => 'section_start_miscellaneous',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Miscellaneous options', 'innovation' ),
					'indent' => true,
				),
				array(
					'id'       => 'apple_touch_ion',
					'type'     => 'media',
					'title'    => esc_html__( 'iOS Bookmarklet Icon', 'innovation' ),
					'subtitle' => esc_html__( 'Upload icon for the Apple touch (72 x 72px), allowed extensions are .jpg, .png, .gif', 'innovation' ),
					'desc'     => esc_html__( '72 x 72px', 'innovation' )
				),
				array(
					'id'       => 'metro_icon',
					'type'     => 'media',
					'title'    => esc_html__( 'Metro UI Bookmartlet Icon', 'innovation' ),
					'subtitle' => esc_html__( 'Upload icon for the Metro interface (144 x 144px), allowed extensions are .jpg, .png, .gif', 'innovation' ),
					'desc'     => esc_html__( '144 x 144px', 'innovation' )
				),
				array(
					'id'       => 'retina_support',
					'type'     => 'switch',
					'title'    => esc_html__( 'Retina Support', 'innovation' ),
					'subtitle' => esc_html__( 'Enable this option if you want to show higher quality images on high resolution screens. This option can increase media data', 'innovation' ),
					'desc'     => html_entity_decode( esc_html__( 'Please <a href="https://wordpress.org/plugins/regenerate-thumbnails/">regenerate</a> your thumbnails if you change any of this setting!', 'innovation' ) ),
					'default'  => 0,
				),
				array(
					'id'       => 'start_views',
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'title'    => esc_html__( 'Post Views Forgery', 'innovation' ),
					'subtitle' => esc_html__( 'Random specify value to adding number of views for each post', 'innovation' ),
					'desc'     => esc_html__( 'Input your value ie: 1000 . The theme random select around(+/-500) that value to add to real number of article views', 'innovation' ),
					'default'  => 0
				),
				array(
					'id'       => 'touch_tooltip',
					'type'     => 'switch',
					'title'    => esc_html__( 'Tooltip on Touch Devices', 'innovation' ),
					'subtitle' => esc_html__( 'enable or disable tooltip on touch devices.', 'innovation' ),
					'desc'     => esc_html__( 'Tooltips is always disabled on IOS devices due to performance.', 'innovation' ),
					'default'  => 1,
				),
				array(
					'id'       => 'gif_support',
					'type'     => 'switch',
					'title'    => esc_html__( 'GIF Support', 'innovation' ),
					'subtitle' => esc_html__( 'Enable or disable GIF image support.', 'innovation' ),
					'default'  => 1
				),
				array(
					'id'     => 'section_end_miscellaneous',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				),
				//Meta description config
				array(
					'id'     => 'section_start_open_graph',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Open Graph Support Option', 'innovation' ),
					'indent' => true,
				),
				array(
					'id'       => 'open_graph',
					'type'     => 'switch',
					'title'    => esc_html__( 'Open Graph', 'innovation' ),
					'subtitle' => esc_html__( 'Enable or disable open graph. disable it if you use open graph plugin for SEO', 'innovation' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'     => 'section_end_meta_open_graph',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false,
				),
			)
		);
	}
}
