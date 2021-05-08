<?php
/**
 * this file support multi sidebars
 */
if ( ! class_exists( 'innovation_ruby_multi_sidebar' ) ) {
	class innovation_ruby_multi_sidebar {


		/**
		 * save sidebar to database
		 */
		static function save_custom_sidebars() {

			//theme options
			global $innovation_ruby_theme_options;

			$sidebar_data   = array();

			//add to array data
			if ( ! empty( $innovation_ruby_theme_options['innovation_ruby_multi_sidebar'] ) && is_array( $innovation_ruby_theme_options['innovation_ruby_multi_sidebar'] ) ) {
				foreach ( $innovation_ruby_theme_options['innovation_ruby_multi_sidebar'] as $sidebar ) {
					array_push( $sidebar_data, array(
						'id'   => 'innovation_ruby_sidebar_multi_' . self::name_to_id( $sidebar ),
						'name' => esc_attr( strip_tags( $sidebar ) ),
					) );
				}
			}

			//save to database
			$multi_sidebar = get_option( 'innovation_ruby_custom_multi_sidebars', '' );
			if ( ! empty( $multi_sidebar ) ) {
				update_option( 'innovation_ruby_custom_multi_sidebars', $sidebar_data );
			} else {
				add_option( 'innovation_ruby_custom_multi_sidebars', $sidebar_data );
			}
		}

		//name to id
		static function name_to_id( $name ) {
			$name = strtolower( strip_tags( $name ) );
			$id = str_replace(array(' ', ',', '.', '"', "'", '/', "\\", '+', '=', ')', '(', '*', '&', '^', '%', '$', '#', '@', '!', '~', '`', '<', '>', '?', '[', ']', '{', '}', '|', ':',), '', $name);
			return $id;
		}
	}
}


// save multi sidebar actions
add_action( 'redux/options/innovation_ruby_theme_options/saved', array( 'innovation_ruby_multi_sidebar', 'save_custom_sidebars' ) );
add_action( 'redux/options/innovation_ruby_theme_options/reset', array( 'innovation_ruby_multi_sidebar', 'save_custom_sidebars' ) );
add_action( 'redux/options/innovation_ruby_theme_options/section/reset', array( 'innovation_ruby_multi_sidebar', 'save_custom_sidebars' ) );

