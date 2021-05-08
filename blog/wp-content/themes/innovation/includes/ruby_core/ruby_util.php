<?php

//Class innovation_ruby_util
if ( ! class_exists( 'innovation_ruby_util' ) ) {
	class innovation_ruby_util {

		/**
		 * @param $option_name
		 *
		 * @return string
		 * load value from theme options
		 */
		static function get_theme_option( $option_name ) {

			//check enable redux
			if ( empty( $GLOBALS['innovation_ruby_theme_options'] ) ) {
				$GLOBALS['innovation_ruby_theme_options'] = innovation_ruby_redux_default_val();
			}

			$ruby_theme_options = $GLOBALS['innovation_ruby_theme_options'];

			//check empty value
			if ( empty( $ruby_theme_options[ $option_name ] ) ) {
				return false;
			} else {
				//return option value
				return $ruby_theme_options[ $option_name ];
			}
		}


		/**
		 * @return mixed
		 * get category page id
		 */
		static function get_page_cate_id() {

			global $wp_query;
			$ruby_page_cate_id = $wp_query->get_queried_object_id();

			//get blog options
			return $ruby_page_cate_id;
		}


		/**
		 * @return bool
		 * get_site_blog_id
		 */
		static function get_site_blog_id() {

			if ( ! empty( $GLOBALS['blog_id'] ) ) {
				return $GLOBALS['blog_id'];
			} else {
				return false;
			}
		}
	}
}
