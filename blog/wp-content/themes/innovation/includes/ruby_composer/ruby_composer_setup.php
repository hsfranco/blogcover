<?php
if ( ! class_exists( 'innovation_ruby_composer_setup' ) ) {
	class innovation_ruby_composer_setup {

		protected static $instance = null;

		public function  __construct() {
			$this->setup_sections();
			$this->setup_blocks();
		}

		static function get_instance() {
			if ( null == self::$instance ) {
				self::$instance = new self;
			}

			return self::$instance;
		}

		// setup page sections
		public function setup_sections() {

			$innovation_ruby_setup_sections = array(
				'section_full_width'  => array(
					'title' => esc_attr__( 'Full Width Section', 'innovation' ),
					'img'   => get_template_directory_uri() . '/includes/ruby_composer/images/section-full-width.png',
					'decs'  => esc_attr__( 'Display content without sidebar', 'innovation' ),
				),
				'section_has_sidebar' => array(
					'title' => esc_attr__( 'Has Sidebar Section', 'innovation' ),
					'img'   => get_template_directory_uri() . '/includes/ruby_composer/images/section-has-sidebar.png',
					'decs'  => esc_attr__( 'Display content width sidebar', 'innovation' ),
				),

			);

			wp_localize_script( 'innovation_ruby_composer_script', 'innovation_ruby_setup_sections', $innovation_ruby_setup_sections );
		}

		// setup blocks
		public function setup_blocks() {
			$innovation_ruby_setup_blocks = array(

				// full width blocks
				'innovation_ruby_fw_slider_grid'    => array(
					'title'         => esc_attr__( 'Grid & Slider', 'innovation' ),
					'description'   => esc_attr__( 'Show block slider of grid', 'innovation' ),
					'img'           => get_template_directory_uri() . '/theme_options/images/feat-grid.png',
					'section'       => 'section_full_width',
					'block_options' => innovation_ruby_fw_slider_grid::block_config()
				),
				'innovation_ruby_fw_slider'         => array(
					'title'         => esc_attr__( 'FullWidth Slider', 'innovation' ),
					'description'   => esc_attr__( 'Show block fullwidth slider', 'innovation' ),
					'img'           => get_template_directory_uri() . '/theme_options/images/feat-slider-big.png',
					'section'       => 'section_full_width',
					'block_options' => innovation_ruby_fw_slider::block_config()
				),
				'innovation_ruby_fw_slider_hw'      => array(
					'title'         => esc_attr__( 'Wrapper Slider', 'innovation' ),
					'description'   => esc_attr__( 'Show block wrapper slider', 'innovation' ),
					'img'           => get_template_directory_uri() . '/theme_options/images/feat-slider-hw.png',
					'section'       => 'section_full_width',
					'block_options' => innovation_ruby_fw_slider_hw::block_config()
				),
				'innovation_ruby_fw_carousel_hw'    => array(
					'title'         => esc_attr__( 'Wrapper Carousel', 'innovation' ),
					'description'   => esc_attr__( 'Show block wrapper carousel', 'innovation' ),
					'img'           => get_template_directory_uri() . '/theme_options/images/feat-carousel-hw.png',
					'section'       => 'section_full_width',
					'block_options' => innovation_ruby_fw_carousel_hw::block_config()
				),
				'innovation_ruby_fw_carousel'       => array(
					'title'         => esc_attr__( 'FullWidth Carousel', 'innovation' ),
					'description'   => esc_attr__( 'Show block fullwidth carousel', 'innovation' ),
					'img'           => get_template_directory_uri() . '/theme_options/images/feat-carousel-fw.png',
					'section'       => 'section_full_width',
					'block_options' => innovation_ruby_fw_carousel::block_config()
				),
				'innovation_ruby_fw_carousel_small' => array(
					'title'         => esc_attr__( 'Small FW Carousel', 'innovation' ),
					'description'   => esc_attr__( 'Show block small fullwidth carousel', 'innovation' ),
					'img'           => get_template_directory_uri() . '/theme_options/images/feat-carousel-fw-small.png',
					'section'       => 'section_full_width',
					'block_options' => innovation_ruby_fw_carousel_small::block_config()
				),
				'innovation_ruby_fw_block_1'        => array(
					'title'         => esc_attr__( 'Block 1 (Grid)', 'innovation' ),
					'description'   => esc_attr__( 'Show block small post', 'innovation' ),
					'img'           => get_template_directory_uri() . '/theme_options/images/grid-layout.png',
					'section'       => 'section_full_width',
					'block_options' => innovation_ruby_fw_block_1::block_config()
				),
				'innovation_ruby_fw_block_2'        => array(
					'title'         => esc_attr__( 'Block 2 (Small Grid)', 'innovation' ),
					'description'   => esc_attr__( 'Show block small post', 'innovation' ),
					'img'           => get_template_directory_uri() . '/theme_options/images/small-grid-layout.png',
					'section'       => 'section_full_width',
					'block_options' => innovation_ruby_fw_block_2::block_config()
				),
				'innovation_ruby_fw_block_3'        => array(
					'title'         => esc_attr__( 'Block 3 (Overlay Grid)', 'innovation' ),
					'description'   => esc_attr__( 'Show block overlay grid post', 'innovation' ),
					'img'           => get_template_directory_uri() . '/includes/ruby_composer/images/block-fw-post-3.png',
					'section'       => 'section_full_width',
					'block_options' => innovation_ruby_fw_block_3::block_config()
				),
				'innovation_ruby_fw_block_code'     => array(
					'title'         => esc_attr__( 'HTML/shortcodes', 'innovation' ),
					'description'   => esc_attr__( 'Show Custom HTML code', 'innovation' ),
					'section'       => 'section_full_width',
					'img'           => get_template_directory_uri() . '/includes/ruby_composer/images/block-code-box.png',
					'block_options' => innovation_ruby_fw_block_code::block_config()
				),
				'innovation_ruby_fw_ad_box'         => array(
					'title'         => esc_attr__( 'Ad Box', 'innovation' ),
					'description'   => esc_attr__( 'Show Advertisement box', 'innovation' ),
					'section'       => 'section_full_width',
					'img'           => get_template_directory_uri() . '/includes/ruby_composer/images/block-ad-box.png',
					'block_options' => innovation_ruby_fw_ad_box::block_config()
				),
				// has sidebar blocks
				'innovation_ruby_hs_block_1'        => array(
					'title'         => esc_attr__( 'Block 1', 'innovation' ),
					'description'   => esc_attr__( 'Show block post 1', 'innovation' ),
					'img'           => get_template_directory_uri() . '/includes/ruby_composer/images/block-post-1.png',
					'section'       => 'section_has_sidebar',
					'block_options' => innovation_ruby_hs_block_1::block_config()
				),
				'innovation_ruby_hs_block_2'        => array(
					'title'         => esc_attr__( 'Block 2', 'innovation' ),
					'description'   => esc_attr__( 'Show block post 2', 'innovation' ),
					'img'           => get_template_directory_uri() . '/includes/ruby_composer/images/block-post-2.png',
					'section'       => 'section_has_sidebar',
					'block_options' => innovation_ruby_hs_block_2::block_config()
				),
				'innovation_ruby_hs_block_3'        => array(
					'title'         => esc_attr__( 'Block 3 (50% width)', 'innovation' ),
					'description'   => esc_attr__( 'Show block post 3, This block has 50% width of parent', 'innovation' ),
					'img'           => get_template_directory_uri() . '/includes/ruby_composer/images/block-post-3.png',
					'section'       => 'section_has_sidebar',
					'block_options' => innovation_ruby_hs_block_3::block_config()
				),
				'innovation_ruby_hs_block_4'        => array(
					'title'         => esc_attr__( 'Block 4 (Grid)', 'innovation' ),
					'description'   => esc_attr__( 'Show block grid post', 'innovation' ),
					'img'           => get_template_directory_uri() . '/theme_options/images/grid-layout.png',
					'section'       => 'section_has_sidebar',
					'block_options' => innovation_ruby_hs_block_4::block_config()
				),
				'innovation_ruby_hs_block_5'        => array(
					'title'         => esc_attr__( 'Block 5 (List)', 'innovation' ),
					'description'   => esc_attr__( 'Show block list post', 'innovation' ),
					'img'           => get_template_directory_uri() . '/theme_options/images/list-layout.png',
					'section'       => 'section_has_sidebar',
					'block_options' => innovation_ruby_hs_block_5::block_config()
				),
				'innovation_ruby_hs_block_6'        => array(
					'title'         => esc_attr__( 'Block 6 (Small Grid)', 'innovation' ),
					'description'   => esc_attr__( 'Show block small gird post', 'innovation' ),
					'img'           => get_template_directory_uri() . '/theme_options/images/small-grid-layout.png',
					'section'       => 'section_has_sidebar',
					'block_options' => innovation_ruby_hs_block_6::block_config()
				),
				'innovation_ruby_hs_block_7'        => array(
					'title'         => esc_attr__( 'Block 7 (Classic)', 'innovation' ),
					'description'   => esc_attr__( 'Show block classic post', 'innovation' ),
					'img'           => get_template_directory_uri() . '/theme_options/images/classic-layout.png',
					'section'       => 'section_has_sidebar',
					'block_options' => innovation_ruby_hs_block_7::block_config()
				),
				'innovation_ruby_hs_block_8'        => array(
					'title'         => esc_attr__( 'Block 8', 'innovation' ),
					'description'   => esc_attr__( 'Show block small post', 'innovation' ),
					'img'           => get_template_directory_uri() . '/includes/ruby_composer/images/block-post-8.png',
					'section'       => 'section_has_sidebar',
					'block_options' => innovation_ruby_hs_block_8::block_config()
				),
				'innovation_ruby_hs_block_9'        => array(
					'title'         => esc_attr__( 'Block 9', 'innovation' ),
					'description'   => esc_attr__( 'Show block grid overlay post', 'innovation' ),
					'img'           => get_template_directory_uri() . '/includes/ruby_composer/images/block-post-9.png',
					'section'       => 'section_has_sidebar',
					'block_options' => innovation_ruby_hs_block_9::block_config()
				),
				'innovation_ruby_hs_block_code'     => array(
					'title'         => esc_attr__( 'HTML/shortcodes', 'innovation' ),
					'description'   => esc_attr__( 'Show Custom HTML code', 'innovation' ),
					'section'       => 'section_has_sidebar',
					'img'           => get_template_directory_uri() . '/includes/ruby_composer/images/block-code-box.png',
					'block_options' => innovation_ruby_hs_block_code::block_config()
				),
				'innovation_ruby_hs_ad_box'         => array(
					'title'         => esc_attr__( 'Ad Box', 'innovation' ),
					'description'   => esc_attr__( 'Show Advertisement box', 'innovation' ),
					'section'       => 'section_has_sidebar',
					'img'           => get_template_directory_uri() . '/includes/ruby_composer/images/block-ad-box.png',
					'block_options' => innovation_ruby_hs_ad_box::block_config()
				),

			);

			wp_localize_script( 'innovation_ruby_composer_script', 'innovation_ruby_setup_blocks', $innovation_ruby_setup_blocks );
		}
	}
}
