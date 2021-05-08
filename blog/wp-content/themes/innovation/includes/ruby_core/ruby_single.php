<?php

/**
 * Class innovation_ruby_single
 * This file support feature for single post
 */
if ( ! class_exists( 'innovation_ruby_single' ) ) {
	class innovation_ruby_single {


		/**
		 * @return mixed|string
		 * get first_paragraph setting
		 */
		static function get_first_paragraph() {
			// first paragraph
			$first_paragraph = get_post_meta( get_the_ID(), 'innovation_ruby_single_first_paragraph', true );
			if ( empty( $first_paragraph ) || 'default' == $first_paragraph ) {
				$first_paragraph = innovation_ruby_util::get_theme_option( 'default_single_post_first_paragraph' );
			}

			return $first_paragraph;
		}


		/**
		 * @return mixed|string
		 * get sidebar position setting
		 */
		static function get_sidebar_position() {

			// sidebar position
			$post_id          = get_the_ID();
			$sidebar_position = get_post_meta( $post_id, 'innovation_ruby_sidebar_position', true );

			// override sidebar position
			if ( 'default' == $sidebar_position || empty( $sidebar_position ) ) {
				$sidebar_position = innovation_ruby_util::get_theme_option( 'default_single_post_sidebar_position' );
				if ( 'default' == $sidebar_position || empty( $sidebar_position ) ) {
					$sidebar_position = innovation_ruby_util::get_theme_option( 'site_sidebar_position' );
				}
			}

			return $sidebar_position;
		}


		/**
		 * @return mixed|string
		 * get first_paragraph setting
		 */
		static function check_comment_box() {
			if ( comments_open() || get_comments_number() ) {
				return true;
			} else {
				return false;
			}
		}


		/**
		 * @return bool|void
		 * render single top advertising
		 */
		static function  single_post_ad_top() {

			$type   = innovation_ruby_util::get_theme_option( 'single_ad_top_type' );
			$script = innovation_ruby_util::get_theme_option( 'single_ad_top_script' );
			$image  = innovation_ruby_util::get_theme_option( 'single_ad_top_image' );
			$url    = innovation_ruby_util::get_theme_option( 'single_ad_top_url' );

			if ( 'script' == $type && ! empty( $script ) ) {
				return self::single_post_ad_script( $script, 'single-post-ad-top' );
			} elseif ( ! empty( $image['url'] ) ) {
				return self::single_post_ad_custom( $image, $url, 'single-post-ad-top' );
			} else {
				return false;
			}
		}


		/**
		 * @return bool|string
		 * single post ad bottom
		 */
		static function single_post_ad_bottom() {

			$type   = innovation_ruby_util::get_theme_option( 'single_ad_bottom_type' );
			$script = innovation_ruby_util::get_theme_option( 'single_ad_bottom_script' );
			$image  = innovation_ruby_util::get_theme_option( 'single_ad_bottom_image' );
			$url    = innovation_ruby_util::get_theme_option( 'single_ad_bottom_url' );

			if ( 'script' == $type && ! empty( $script ) ) {
				return self::single_post_ad_script( $script, 'single-post-ad-bottom' );
			} elseif ( ! empty( $image['url'] ) ) {
				return self::single_post_ad_custom( $image, $url, 'single-post-ad-bottom' );
			} else {
				return false;
			}
		}


		/**
		 * @param string $script
		 * @param string $class_name
		 *
		 * @return string
		 * single post ad script
		 */
		static function single_post_ad_script( $script = '', $class_name = '' ) {
			// render
			$str = '';
			$str .= '<div class="single-post-ad is-ad-script ' . esc_attr( $class_name ) . '">';
			$str .= '<div>' . html_entity_decode( stripslashes( innovation_ruby_ads_support::render_google_ads( $script, 'content_ads' ) ) ) . '</div>';
			$str .= '</div>';

			return $str;
		}


		/**
		 * @param array  $image
		 * @param string $url
		 * @param string $class_name
		 *
		 * @return string
		 * single custom ad
		 */
		static function single_post_ad_custom( $image = array(), $url = '#', $class_name = '' ) {

			// check
			if ( empty( $image['url'] ) ) {
				return false;
			}

			// render
			$str = '';
			$str .= '<div class="single-post-ad is-ad-custom ' . esc_attr( $class_name ) . '">';
			if ( ! empty( $url ) ) {
				$str .= '<a href="' . $url . '" target="_blank">';
				$str .= '<img src="' . esc_url( $image['url'] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
				$str .= '</a>';
			} else {
				$str .= '<img src="' . esc_url( $image['url'] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
			}
			$str .= '</div>';

			return $str;
		}
	}

}
