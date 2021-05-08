<?php

/**
 * Class innovation_ruby_page
 * This file support features for page
 */
if ( ! class_exists( 'innovation_ruby_page' ) ) {
	class innovation_ruby_page {


		/**
		 * @return mixed|string
		 * get sidebar position setting
		 */
		static function get_sidebar_position() {

			//sidebar position
			$sidebar_position = get_post_meta( get_the_ID(), 'innovation_ruby_sidebar_position', true );

			//override sidebar position
			if ( 'default' == $sidebar_position || empty( $sidebar_position ) ) {
				$sidebar_position = innovation_ruby_util::get_theme_option( 'default_single_page_sidebar_position' );
				if ( 'default' == $sidebar_position ) {
					$sidebar_position = innovation_ruby_util::get_theme_option( 'site_sidebar_position' );
				}
			}

			return $sidebar_position;
		}


		/**
		 * @return mixed|string
		 * get sidebar name of page
		 */
		static function get_sidebar_name() {

			//sidebar position
			$sidebar_name = get_post_meta( get_the_ID(), 'innovation_ruby_sidebar_name', true );

			if ( 'innovation_ruby_default_from_theme_options' == $sidebar_name || empty( $sidebar_name ) ) {
				$sidebar_name = innovation_ruby_util::get_theme_option( 'default_single_page_sidebar' );
			}

			if ( empty( $sidebar_name ) ) {
				$sidebar_name = 'innovation_ruby_sidebar_default';
			}

			return $sidebar_name;
		}


		/**
		 * @return mixed|string
		 * get first_paragraph setting
		 */
		static function check_comment_box() {

			if ( ! comments_open() && ! get_comments_number() ) {
				return false;
			}

			$ruby_comment_box = get_post_meta( get_the_ID(), 'innovation_ruby_single_comment_box', true );
			if ( 'default' == $ruby_comment_box || empty( $ruby_comment_box ) ) {
				$ruby_comment_box = innovation_ruby_util::get_theme_option( 'default_single_page_comment_box' );
			};

			return $ruby_comment_box;
		}


		/**
		 * @return mixed|string
		 * check page title
		 */
		static function check_title() {
			$page_title = get_post_meta( get_the_ID(), 'innovation_ruby_page_title', true );
			if ( 'default' == $page_title || empty( $page_title ) ) {
				$page_title = innovation_ruby_util::get_theme_option( 'default_single_page_title' );
			}

			return $page_title;
		}

	}
}

