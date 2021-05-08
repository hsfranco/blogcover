<?php
/**
 * this file render ruby composer layouts
 */
if ( ! class_exists( 'innovation_ruby_composer_render' ) ) {
	class innovation_ruby_composer_render {

		/**
		 * @return bool|string
		 * render page composer
		 */
		static function render_page() {

			$page_composer_data = innovation_ruby_composer_action::get_composer_data( get_the_ID() );
			$paged              = intval( get_query_var( 'paged' ) );

			if ( empty( $paged ) ) {
				$paged = intval( get_query_var( 'page' ) );
			}

			if ( empty( $page_composer_data ) || ! is_array( $page_composer_data ) || $paged > 1 ) {
				return false;
			}

			$str = '';
			foreach ( $page_composer_data as $section_data ) {
				$str .= self::render_section( $section_data );
			}

			return $str;
		}


		/**
		 * @param $section_data
		 *
		 * @return string
		 * render page section
		 */
		static function render_section( $section_data ) {
			//check
			if ( empty( $section_data['section_type'] ) ) {
				return false;
			}

			//render
			$str = '';
			switch ( $section_data['section_type'] ) {
				case 'section_full_width' :
					$str .= self::render_section_fw( $section_data );
					break;
				case 'section_has_sidebar' :
					$str .= self::render_section_hs( $section_data );
					break;
			}

			return $str;
		}


		/**
		 * @param $section_data
		 *
		 * @return string
		 * render fw section
		 */
		static function render_section_fw( $section_data ) {
			//check blocks
			if ( empty( $section_data['blocks'] ) || ! is_array( $section_data['blocks'] ) ) {
				return false;
			}

			if ( ! empty( $section_data['section_id'] ) ) {
				$section_id = $section_data['section_id'];
			} else {
				$section_id = '';
			}

			//render
			$str = '';
			$str .= self::open_section_fw( $section_id );
			foreach ( $section_data['blocks'] as $block ) {
				$str .= ruby_composer_block::render( 'section_full_width', $block );
			}
			$str .= self::close_section_fw();

			return $str;

		}


		/**
		 * @param $section_data
		 *
		 * @return string
		 * render has sidebar section
		 */
		static function render_section_hs( $section_data ) {
			//check blocks
			if ( empty( $section_data['blocks'] ) || ! is_array( $section_data['blocks'] ) ) {
				return false;
			}

			if ( ! empty( $section_data['section_id'] ) ) {
				$section_id = $section_data['section_id'];
			} else {
				$section_id = '';
			}

			//check sidebar position
			if ( ! empty( $section_data['section_sidebar_position'] ) ) {
				$sidebar_position = $section_data['section_sidebar_position'];
			} else {
				$sidebar_position = 'right';
			}

			//check sidebar name
			if ( ! empty( $section_data['section_sidebar'] ) ) {
				$sidebar_name = $section_data['section_sidebar'];
			} else {
				$sidebar_name = 'innovation_ruby_sidebar_default';
			}


			//render
			$str = '';
			$str .= self::open_section_hs( $section_id, $sidebar_position );

			//content
			$str .= self::open_section_hs_content( $sidebar_position );
			foreach ( $section_data['blocks'] as $block ) {
				$str .= ruby_composer_block::render( 'section_has_sidebar', $block );
			}
			$str .= self::close_section_hs_content();

			//render sidebar
			$str .= self::open_sidebar();
			$str .= self::render_sidebar( $sidebar_name );
			$str .= self::close_sidebar();

			$str .= self::close_section_hs();

			return $str;
		}


		/**
		 * @param $sidebar_name
		 *
		 * @return bool|string
		 * render sidebar
		 */
		static function render_sidebar( $sidebar_name ) {

			//check sidebar
			if ( empty( $sidebar_name ) ) {
				return false;
			}

			ob_start();
			if ( is_active_sidebar( $sidebar_name ) ) {
				dynamic_sidebar( $sidebar_name );
			}

			return ob_get_clean();

		}


		/**
		 * @param $section_id
		 *
		 * @return string
		 * open section full width
		 */
		static function open_section_fw( $section_id ) {
			if ( ! empty( $section_id ) ) {
				return '<div id="' . esc_attr( $section_id ) . '" class="ruby-section-fw ruby-section">';
			} else {
				return '<div class="ruby-section-fw ruby-section">';
			}
		}


		/**
		 * @return string
		 * close fw section
		 */
		static function close_section_fw() {
			return '</div><!--#fw section-->';
		}


		/**
		 * @param $section_id
		 * @param string $sidebar_position
		 *
		 * @return string
		 *
		 */
		static function open_section_hs( $section_id, $sidebar_position = 'right' ) {
			$str = '';
			$str .= '<div class="ruby-container">';
			if ( ! empty( $section_id ) ) {
				$str .= '<div id="' . strip_tags( $section_id ) . '" class="ruby-section ruby-section-hs row is-sidebar-' . strip_tags( $sidebar_position ) . '">';
			} else {
				$str .= '<div class="ruby-section ruby-section-hs row is-sidebar-' . strip_tags( $sidebar_position ) . '">';
			}

			return $str;
		}


		/**
		 * @return string
		 * close sidebar section
		 */
		static function close_section_hs() {
			return '</div></div><!--#ruby container-->';
		}


		/**
		 * @param string $sidebar_position
		 *
		 * @return string
		 * open has content of section has sidebar
		 */
		static function open_section_hs_content( $sidebar_position = 'right' ) {
			if ( 'none' == $sidebar_position ) {
				return '<div class="ruby-content-wrap content-without-sidebar col-xs-12">';
			} else {
				return '<div class="ruby-content-wrap content-with-sidebar col-md-8 col-sm-12">';
			}
		}


		/**
		 * @return string
		 * close sidebar section content
		 */
		static function close_section_hs_content() {
			return '</div><!--#ruby container-->';
		}


		/**
		 * @return string
		 * render sidebar wrap
		 */
		static function open_sidebar() {

			//sticky config
			$sticky = innovation_ruby_util::get_theme_option( 'sticky_sidebar' );

			if ( ! empty( $sticky ) ) {
				return '<div class="sidebar-wrap col-md-4 col-sm-12 ruby-sidebar-sticky" ' . innovation_ruby_schema::makeup( 'sidebar', false ) . '><div class="sidebar-inner">';
			} else {
				return '<div class="sidebar-wrap col-md-4 col-sm-12" ' . innovation_ruby_schema::makeup( 'sidebar', false ) . '><div class="sidebar-inner">';
			}

		}


		/**
		 * @return string
		 * close sidebar wrap
		 */
		static function close_sidebar() {

			return '</div></div>';
		}


	}
}