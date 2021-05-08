<?php
/**
 * this file register config options for theme
 */
if ( ! class_exists( 'innovation_ruby_theme_config' ) ) {
	class innovation_ruby_theme_config {

		// social config value
		static function author_social() {
			return array(
				'job_name'   => esc_attr__( 'Job Name', 'innovation' ),
				'facebook'   => esc_attr__( 'Facebook', 'innovation' ),
				'twitter'    => esc_attr__( 'Twitter', 'innovation' ),
				'pinterest'  => esc_attr__( 'Pinterest', 'innovation' ),
				'linkedin'   => esc_attr__( 'Linkedin', 'innovation' ),
				'tumblr'     => esc_attr__( 'Tumblr', 'innovation' ),
				'flickr'     => esc_attr__( 'Flickr', 'innovation' ),
				'instagram'  => esc_attr__( 'Instagram', 'innovation' ),
				'skype'      => esc_attr__( 'Skype', 'innovation' ),
				'myspace'    => esc_attr__( 'Myspace', 'innovation' ),
				'youtube'    => esc_attr__( 'Youtube', 'innovation' ),
				'rss'        => esc_attr__( 'Rss', 'innovation' ),
				'digg'       => esc_attr__( 'Digg', 'innovation' ),
				'dribbble'   => esc_attr__( 'Dribbble', 'innovation' ),
				'soundcloud' => esc_attr__( 'Soundcloud', 'innovation' ),
				'vimeo'      => esc_attr__( 'Vimeo', 'innovation' ),
			);
		}


		/**
		 * @param string $display_default
		 *
		 * @return array
		 * sidebar name options config
		 */
		static function sidebar_name( $display_default = '' ) {
			$sidebar_options = array();
			$custom_sidebars = get_option( 'innovation_ruby_custom_multi_sidebars', '' );

			//add default sidebar
			if ( true === $display_default ) {
				$sidebar_options['innovation_ruby_default_from_theme_options'] = esc_html__( 'Default From Theme Options', 'innovation' );
			};

			//handle sidebar option
			$sidebar_options['innovation_ruby_sidebar_default'] = esc_html__( 'Default Sidebar', 'innovation' );
			if ( ! empty( $custom_sidebars ) && is_array( $custom_sidebars ) ) {
				foreach ( $custom_sidebars as $sidebar ) {
					$sidebar_options[ $sidebar['id'] ] = $sidebar['name'];
				};
			};

			return $sidebar_options;
		}


		// sidebar position config value
		static function sidebar_position( $default = true ) {
			$sidebar = array(
				'none'  => array(
					'alt'   => 'none sidebar',
					'img'   => get_template_directory_uri() . '/theme_options/images/none-sidebar.png',
					'title' => esc_attr__( 'None', 'innovation' )
				),
				'left'  => array(
					'alt'   => 'left sidebar',
					'img'   => get_template_directory_uri() . '/theme_options/images/left-sidebar.png',
					'title' => esc_attr__( 'Left', 'innovation' )
				),
				'right' => array(
					'alt'   => 'right sidebar',
					'img'   => get_template_directory_uri() . '/theme_options/images/right-sidebar.png',
					'title' => esc_attr__( 'Right', 'innovation' )
				)
			);

			//load default setting
			if ( true === $default ) {
				$sidebar['default'] = array(
					'alt'   => 'Default',
					'img'   => get_template_directory_uri() . '/theme_options/images/default-sidebar.png',
					'title' => esc_attr__( 'Default', 'innovation' )
				);
			};

			return $sidebar;
		}


		//metabox sidebar sidebar potions config value
		static function metabox_sidebar_position() {
			return array(
				'default' => get_template_directory_uri() . '/theme_options/images/default-sidebar.png',
				'none'    => get_template_directory_uri() . '/theme_options/images/none-sidebar.png',
				'left'    => get_template_directory_uri() . '/theme_options/images/left-sidebar.png',
				'right'   => get_template_directory_uri() . '/theme_options/images/right-sidebar.png',
			);
		}

		//single post layout config value
		static function single_post_layouts() {
			return array(
				'is_classic'            => array(
					'alt'   => 'classic layout',
					'img'   => get_template_directory_uri() . '/theme_options/images/post-classic.png',
					'title' => esc_attr__( 'Classic', 'innovation' )
				),
				'is_classic_crop'       => array(
					'alt'   => 'classic layout',
					'img'   => get_template_directory_uri() . '/theme_options/images/post-classic-crop.png',
					'title' => esc_attr__( 'Classic (crop)', 'innovation' ),
				),
				'is_fw_title'           => array(
					'alt'   => 'fw title layout',
					'img'   => get_template_directory_uri() . '/theme_options/images/post-fw-title.png',
					'title' => esc_attr__( 'F-Width Title', 'innovation' ),
				),
				'is_fw_title_crop'      => array(
					'alt'   => 'fw title layout',
					'img'   => get_template_directory_uri() . '/theme_options/images/post-fw-title-crop.png',
					'title' => esc_attr__( 'F-Width Title (crop)', 'innovation' ),
				),
				'is_fw_featured'        => array(
					'alt'   => 'fw featured layout',
					'img'   => get_template_directory_uri() . '/theme_options/images/post-fw-featured.png',
					'title' => esc_attr__( 'F-Width Featured', 'innovation' ),
				),
				'is_fw_featured_center' => array(
					'alt'   => 'fw featured center layout',
					'img'   => get_template_directory_uri() . '/theme_options/images/post-fs-featured.png',
					'title' => esc_attr__( 'F-Screen Featured', 'innovation' ),
				),
				'none'                  => array(
					'alt'   => 'hide layout',
					'img'   => get_template_directory_uri() . '/theme_options/images/post-none-featured.png',
					'title' => esc_attr__( 'Hide Featured', 'innovation' ),
				)
			);
		}

		//meta single post layout config value
		static function metabox_single_post_layouts() {
			return array(
				'default'               => get_template_directory_uri() . '/theme_options/images/default.png',
				'is_classic'            => get_template_directory_uri() . '/theme_options/images/post-classic.png',
				'is_classic_crop'       => get_template_directory_uri() . '/theme_options/images/post-classic-crop.png',
				'is_fw_title'           => get_template_directory_uri() . '/theme_options/images/post-fw-title.png',
				'is_fw_title_crop'      => get_template_directory_uri() . '/theme_options/images/post-fw-title-crop.png',
				'is_fw_featured'        => get_template_directory_uri() . '/theme_options/images/post-fw-featured.png',
				'is_fw_featured_center' => get_template_directory_uri() . '/theme_options/images/post-fs-featured.png',
				'none'                  => get_template_directory_uri() . '/theme_options/images/post-none-featured.png',
			);
		}


		//metabox post layout

		//order config values
		static function post_orders() {
			return array(
				'date_post'               => esc_attr__( 'Latest Post', 'innovation' ),
				'comment_count'           => esc_attr__( 'Popular Comment', 'innovation' ),
				'popular'                 => esc_attr__( 'Popular View', 'innovation' ),
				'top_review'              => esc_attr__( 'Top Review', 'innovation' ),
				'post_type'               => esc_attr__( 'Post Type', 'innovation' ),
				'rand'                    => esc_attr__( 'Random', 'innovation' ),
				'author'                  => esc_attr__( 'Author', 'innovation' ),
				'alphabetical_order_decs' => esc_attr__( 'Title DECS', 'innovation' ),
				'alphabetical_order_asc'  => esc_attr__( 'Title ACS', 'innovation' ),
			);
		}

		//featured type config values
		static function featured_type() {
			return array(
				'grid_slider'       => array(
					'alt'   => 'grid slider',
					'img'   => get_template_directory_uri() . '/theme_options/images/feat-grid.png',
					'title' => esc_attr__( 'Grid & Slider', 'innovation' )
				),
				'hw_slider'         => array(
					'alt'   => 'has wrapper slider',
					'img'   => get_template_directory_uri() . '/theme_options/images/feat-slider-hw.png',
					'title' => esc_attr__( 'Wrapper Slider', 'innovation' )
				),
				'fw_slider'         => array(
					'alt'   => 'big slider',
					'img'   => get_template_directory_uri() . '/theme_options/images/feat-slider-big.png',
					'title' => esc_attr__( 'FullWith Slider', 'innovation' )
				),
				'hw_carousel'       => array(
					'alt'   => 'carousel slider',
					'img'   => get_template_directory_uri() . '/theme_options/images/feat-carousel-hw.png',
					'title' => esc_attr__( 'Wrapper Carousel', 'innovation' )
				),
				'fw_carousel'       => array(
					'alt'   => 'fw big carousel slider',
					'img'   => get_template_directory_uri() . '/theme_options/images/feat-carousel-fw.png',
					'title' => esc_attr__( 'FullWidth Carousel', 'innovation' )
				),
				'fw_carousel_small' => array(
					'alt'   => 'fw small carousel slider',
					'img'   => get_template_directory_uri() . '/theme_options/images/feat-carousel-fw-small.png',
					'title' => esc_attr__( 'FW Small Carousel', 'innovation' )
				),
				'none'              => array(
					'alt'   => 'none',
					'img'   => get_template_directory_uri() . '/theme_options/images/feat-none.png',
					'title' => esc_attr__( 'None', 'innovation' )
				),
			);
		}


		//page layout config values
		static function blog_layouts() {
			return array(
				'classic-grid-layout'  => array(
					'alt'   => 'classic and grid layout',
					'img'   => get_template_directory_uri() . '/theme_options/images/classic-grid-layout.png',
					'title' => esc_attr__( 'Classic + Grid', 'innovation' )
				),
				'classic-sgrid-layout' => array(
					'alt'   => 'classic and small grid layout',
					'img'   => get_template_directory_uri() . '/theme_options/images/classic-sgrid-layout.png',
					'title' => esc_attr__( 'Classic + Small Grid', 'innovation' )
				),
				'list-grid-layout'     => array(
					'alt'   => 'List and grid layout',
					'img'   => get_template_directory_uri() . '/theme_options/images/list-grid-layout.png',
					'title' => esc_attr__( 'List + Grid', 'innovation' )
				),
				'list-sgrid-layout'    => array(
					'alt'   => 'List and small grid layout',
					'img'   => get_template_directory_uri() . '/theme_options/images/list-sgrid-layout.png',
					'title' => esc_attr__( 'List + Small Grid', 'innovation' )
				),
				'sgrid-layout'         => array(
					'alt'   => 'small grid layout',
					'img'   => get_template_directory_uri() . '/theme_options/images/small-grid-layout.png',
					'title' => esc_attr__( 'Small Grid', 'innovation' )
				),
				'classic-layout'       => array(
					'alt'   => 'default classic layout',
					'img'   => get_template_directory_uri() . '/theme_options/images/classic-layout.png',
					'title' => esc_attr__( 'Classic', 'innovation' )
				),
				'grid-layout'          => array(
					'alt'   => 'grid layout',
					'img'   => get_template_directory_uri() . '/theme_options/images/grid-layout.png',
					'title' => esc_attr__( 'Grid', 'innovation' )
				),
				'list-layout'          => array(
					'alt'   => 'list posts block',
					'img'   => get_template_directory_uri() . '/theme_options/images/list-layout.png',
					'title' => esc_attr__( 'List', 'innovation' )
				),
			);
		}


		//review box position config values
		static function review_box_position() {
			return array(
				'left_top' => array(
					'alt'   => 'left top position',
					'img'   => get_template_directory_uri() . '/theme_options/images/left-top-review-box.png',
					'title' => esc_attr__( 'Left Top', 'innovation' )
				),
				'bottom'   => array(
					'alt'   => 'bottom position',
					'img'   => get_template_directory_uri() . '/theme_options/images/bottom-review-box.png',
					'title' => esc_attr__( 'Bottom', 'innovation' )
				)
			);
		}

		//metabox review box config value
		static function metabox_review_box_position() {
			return array(
				'default'  => get_template_directory_uri() . '/theme_options/images/default.png',
				'left_top' => get_template_directory_uri() . '/theme_options/images/left-top-review-box.png',
				'bottom'   => get_template_directory_uri() . '/theme_options/images/bottom-review-box.png',
			);
		}


		//header style config values
		static function headers_style() {
			return array(
				'1' => array(
					'alt'   => 'above menu',
					'img'   => get_template_directory_uri() . '/theme_options/images/header-style-1.png',
					'title' => esc_attr__( 'Style 1', 'innovation' )
				),
				'2' => array(
					'alt'   => 'top logo',
					'img'   => get_template_directory_uri() . '/theme_options/images/header-style-2.png',
					'title' => esc_attr__( 'Style 2', 'innovation' )
				),
			);
		}


		//header style config values
		static function footers_style() {
			return array(
				'1'    => array(
					'alt'   => 'footer has widget section',
					'img'   => get_template_directory_uri() . '/theme_options/images/footer-style-1.png',
					'title' => esc_attr__( 'Widget Section', 'innovation' )
				),
				'2'    => array(
					'alt'   => 'mini footer',
					'img'   => get_template_directory_uri() . '/theme_options/images/footer-style-2.png',
					'title' => esc_attr__( 'Minimalist', 'innovation' )
				),
				'none' => array(
					'alt'   => 'none',
					'img'   => get_template_directory_uri() . '/theme_options/images/footer-none.png',
					'title' => esc_attr__( 'None', 'innovation' )
				),
			);
		}


		//header style config values
		static function text_style() {
			return array(
				'is-light-text' => array(
					'alt'   => 'text light',
					'img'   => get_template_directory_uri() . '/theme_options/images/text-light.png',
					'title' => esc_attr__( 'Light', 'innovation' )
				),
				'is-dark-text'  => array(
					'alt'   => 'text dark',
					'img'   => get_template_directory_uri() . '/theme_options/images/text-dark.png',
					'title' => esc_attr__( 'Dark', 'innovation' )
				),
			);
		}


		//category select config
		static function category_dropdown_select() {
			$categories = get_categories(
				array(
					'hide_empty'   => 0,
					'orderby'      => 'name',
					'order'        => 'ASC',
					'hierarchical' => 1
				)
			);

			$str = '';
			$str .= '<select class="ruby-field ruby-field-select">';
			$str .= '<option value="0" selected >' . esc_html__( 'All categories', 'innovation' ) . '</option>';
			foreach ( $categories as $category ) {
				$str .= '<option value="' . esc_attr( $category->term_id ) . '">';
				$str .= esc_html( $category->cat_name );
				$str .= '</option>';
			}
			$str .= '</select><!--#category select-->';

			return $str;
		}


		//category select config
		static function categories_dropdown_select() {
			if ( ! is_admin() ) {
				return false;
			}

			if ( ! is_admin() ) {
				return false;
			}

			$categories = get_categories( array(
				'hide_empty' => 0,
			) );

			$category_array_walker = new innovation_ruby_category_array_walker;
			$category_array_walker->walk( $categories, 4 );
			$categories_buffer = $category_array_walker->cat_array;

			//render
			$str = '';
			$str .= '<select class="ruby-field ruby-field-select" multiple="multiple">';
			$str .= '<option value="0" selected="selected">' . esc_html__( '-- None --', 'innovation' ) . '</option>';
			foreach ( $categories_buffer as $category_name => $category_id ) {
				$str .= '<option value="' . esc_attr( $category_id ) . '">';
				$str .= esc_html( $category_name );
				$str .= '</option>';
			}

			$str .= '</select><!--#categories select-->';

			return $str;
		}


		//order select config
		static function orderby_dropdown_select() {

			$orderby_data = array(
				'date_post'               => esc_attr__( 'Latest Post', 'innovation' ),
				'comment_count'           => esc_attr__( 'Popular Comment', 'innovation' ),
				'popular'                 => esc_attr__( 'Popular View', 'innovation' ),
				'top_review'              => esc_attr__( 'Top Review', 'innovation' ),
				'post_type'               => esc_attr__( 'Post Type', 'innovation' ),
				'rand'                    => esc_attr__( 'Random', 'innovation' ),
				'alphabetical_order_decs' => esc_attr__( 'Title DECS', 'innovation' ),
				'alphabetical_order_asc'  => esc_attr__( 'Title ACS', 'innovation' )
			);

			$str = '';
			foreach ( $orderby_data as $val => $title ) {
				$str .= '<option value="' . $val . '">' . $title . '</option>';
			}

			return $str;
		}


		//author option select config
		static function author_dropdown_select() {
			return wp_dropdown_users(
				array(
					'show_option_all' => esc_attr__( 'All Authors', 'innovation' ),
					'orderby'         => 'ID',
					'class'           => 'ruby-field',
					'echo'            => 0,
					'hierarchical'    => true
				)
			);
		}

		//get all sidebar after load
		static function get_all_sidebar() {

			return $GLOBALS['wp_registered_sidebars'];
		}


		//composer latest blog listing layout

		//page layout config values
		static function metabox_composer_blog_layouts() {

			if ( ! is_admin() ) {
				return false;
			}

			return array(
				'grid-layout'    => get_template_directory_uri() . '/theme_options/images/grid-layout.png',
				'list-layout'    => get_template_directory_uri() . '/theme_options/images/list-layout.png',
				'sgrid-layout'   => get_template_directory_uri() . '/theme_options/images/small-grid-layout.png',
				'classic-layout' => get_template_directory_uri() . '/theme_options/images/classic-layout.png',
			);
		}

		//composer sidebar position
		static function metabox_composer_sidebar_position() {

			if ( ! is_admin() ) {
				return false;
			}

			return array(
				'left'  => get_template_directory_uri() . '/theme_options/images/left-sidebar.png',
				'right' => get_template_directory_uri() . '/theme_options/images/right-sidebar.png',
			);
		}

	}
}


if ( ! class_exists( 'innovation_ruby_category_array_walker' ) ) {
	class innovation_ruby_category_array_walker extends Walker {
		var $tree_type = 'category';
		var $cat_array = array();
		var $db_fields = array(
			'id'     => 'term_id',
			'parent' => 'parent'
		);

		public function start_lvl( &$output, $depth = 0, $args = array() ) {
		}

		public function end_lvl( &$output, $depth = 0, $args = array() ) {
		}

		public function start_el( &$output, $object, $depth = 0, $args = array(), $current_object_id = 0 ) {
			$this->cat_array[ str_repeat( ' - ', $depth ) . $object->name . ' - [ ID: ' . $object->term_id . ' / Posts: ' . $object->category_count . ' ]' ] = $object->term_id;
		}

		public function end_el( &$output, $object, $depth = 0, $args = array() ) {
		}

	}
}
