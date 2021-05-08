<?php

/**
 * Class innovation_ruby_hs_block_code
 * render has has sidebar block code
 */
if ( ! class_exists( 'innovation_ruby_hs_block_code' ) ) {
	class innovation_ruby_hs_block_code extends innovation_ruby_block {

		/**
		 * @param $block
		 * @return string
		 * render block layout
		 */
		static function render( $block ) {


			//add block data
			$block['block_type']    = 'has_sidebar';
			$block['block_classes'] = 'block-hs-code';

			$str = '';
			$str .= parent::open_block( $block );
			$str .= parent::render_header( $block );
			$str .= self::render_content( $block );
			$str .= parent::close_block();

			return $str;
		}

		/**
		 * @param $block
		 * @return string
		 * render block block content
		 */
		static function render_content( $block ) {

			//render
			$str = '';

			$str .= parent::open_block_content();

			if ( empty( $block['block_options']['short_code'] ) ) {
				if ( ! empty( $block['block_options']['custom_html'] ) ) {
					$str .= '<div class="entry clearfix">';
					$str .= apply_filters( 'the_content', stripslashes( $block['block_options']['custom_html'] ) );
					$str .= '</div>';
				}
			} else {
				$str .= do_shortcode( stripslashes( $block['block_options']['short_code'] ) );
			}

			$str .= parent::close_block_content();

			return $str;
		}


		/**
		 * @return array
		 * init block options
		 */
		static function block_config() {
			return array(
				'content' => array(
					'custom_html' => true,
					'short_code'  => true
				),
				'header'  => array(
					'title'     => true,
					'sub_title' => true,
					'title_url' => true,
					'color'     => '#242424'
				)
			);
		}
	}
}
