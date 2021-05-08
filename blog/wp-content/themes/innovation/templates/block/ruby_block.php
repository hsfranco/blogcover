<?php
/**
 * Class innovation_ruby_block
 * This file manager block for ruby composer
 */
if ( ! class_exists( 'innovation_ruby_block' ) ) {
	class innovation_ruby_block {

		/**
		 * @param $block
		 *
		 * @return bool|string|WP_Query
		 * query block data
		 */
		static function get_data( $block ) {
			if ( empty( $block['block_options'] ) ) {
				return false;
			}

			//fast query
			if ( ! isset( $block['block_options']['no_found_rows'] ) ) {
				$block['block_options']['no_found_rows'] = true;
			}

			//query
			return innovation_ruby_query::get_custom_query( $block['block_options'] );
		}


		/**
		 * @param $block
		 *
		 * @return string
		 * open block
		 */
		static function open_block( $block ) {

			//check ID
			if ( empty( $block['block_id'] ) ) {
				return false;
			}

			//create class
			$main_classes    = array();
			$inner_classes   = array();
			$main_classes[]  = 'ruby-block-wrap';
			$inner_classes[] = 'ruby-block-inner';

			//create wrapper classes
			if ( ! empty( $block['block_classes'] ) ) {
				$main_classes[] = $block['block_classes'];
			}

			if ( ! empty( $block['block_options']['block_style'] ) ) {
				$main_classes[] = 'is-dark-style';
			}

			if ( ! empty( $block['block_type'] ) && 'full_width' == $block['block_type'] ) {
				if ( ! empty( $block['block_options']['wrap_mode'] ) && 1 == $block['block_options']['wrap_mode'] ) {
					$main_classes[] = 'is-full-width';
				} else {
					$main_classes[]  = 'is-wrapper';
					$inner_classes[] = 'ruby-container';
				}
			}

			$main_classes  = implode( ' ', $main_classes );
			$inner_classes = implode( ' ', $inner_classes );

			$str = '';

			$str .= '<div id="' . strip_tags( $block['block_id'] ) . '" class="' . strip_tags( $main_classes ) . '">';
			$str .= '<div class="' . strip_tags( $inner_classes ) . '">';

			return $str;
		}


		/**
		 * @param $block
		 *
		 * @return string
		 * render block header
		 */
		static function render_header( $block ) {

			//check title
			if ( empty( $block['block_options']['title'] ) ) {
				return false;
			}

			$str = '';
			$str .= '<div class="block-header-wrap">';
			$str .= '<div class="block-header-inner">';

			//block header title
			if ( empty( $block['block_options']['title_url'] ) ) {
				$str .= '<div class="block-title"><h3>' . esc_attr( $block['block_options']['title'] ) . '</h3>';
				if ( ! empty( $block['block_options']['sub_title'] ) ) {
					$str .= '<span class="block-title-sub">' . esc_attr( $block['block_options']['sub_title'] ) . '</span>';
				}
				$str .= '</div>';
			} else {
				$str .= '<div class="block-title"><h3><a href="' . esc_url( $block['block_options']['title_url'] ) . '" title="' . strip_tags( esc_attr( $block['block_options']['title'] ) ) . '">';
				$str .= esc_attr( $block['block_options']['title'] );
				$str .= '</a></h3>';
				if ( ! empty( $block['block_options']['sub_title'] ) ) {
					$str .= '<span class="block-title-sub">' . esc_attr( $block['block_options']['sub_title'] ) . '</span>';
				}
				$str .= '</div>';
			}

			$str .= '</div>';
			$str .= '</div><!--#block header-->';

			return $str;
		}

		/**
		 * @param string $classes
		 *
		 * @return string
		 * open block content wrap
		 */
		static function open_block_content( $classes = '' ) {
			$ruby_classes   = array();
			$ruby_classes[] = 'block-content-wrap';
			if ( ! empty( $classes ) ) {
				$ruby_classes[] = $classes;
			}
			$ruby_classes = implode( ' ', $ruby_classes );

			return '<div class="' . strip_tags( $ruby_classes ) . '">';
		}

		/**
		 * @return string
		 * close block content
		 */
		static function close_block_content() {
			return '</div><!-- #block content-->';
		}


		/**
		 * @return string
		 * close block
		 */
		static function close_block() {
			return '</div></div><!-- #block wrap-->';
		}


		/**
		 * @return string
		 * no content post found
		 */
		static function no_content() {

			return '<div class="ruby-error"><h3>' . esc_attr__( 'Sorry, Posts you requested could not be found...', 'innovation' ) . '</h3></div>';
		}

		/**
		 * @return string
		 * not enough for post
		 */
		static function not_enough_post() {

			return '<div class="ruby-error"><h3>' . esc_attr__( 'Sorry, Not enough posts for this block, please add more posts...', 'innovation' ) . '</h3></div>';
		}


		/**
		 * @return string
		 * render divider
		 */
		static function render_clearfix() {
			return '<div class="ruby-clearfix clearfix"></div><!--#divider-->';
		}
	}
}
