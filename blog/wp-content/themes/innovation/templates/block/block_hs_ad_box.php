<?php

/**
 * Class innovation_ruby_hs_ad_box
 * render has fullwidth block code
 */
if ( ! class_exists( 'innovation_ruby_hs_ad_box' ) ) {
	class innovation_ruby_hs_ad_box extends innovation_ruby_block {

		/**
		 * @param $block
		 *
		 * @return string
		 * render block layout
		 */
		static function render( $block ) {


			//add block data
			$block['block_type']    = 'has_sidebar';
			$block['block_classes'] = 'block-ad-box';

			$str = '';
			$str .= parent::open_block( $block );
			$str .= self::render_content( $block );
			$str .= parent::close_block();

			return $str;
		}

		/**
		 * @param $block
		 *
		 * @return string
		 * render block block content
		 */
		static function render_content( $block ) {

			//render
			$str = '';

			$str .= parent::open_block_content();

			if ( ! empty( $block['block_options']['ad_title'] ) ) {
				$str .= '<div class="ad-title"><span>' . esc_attr( $block['block_options']['ad_title'] ) . '</span></div>';
			}
			$str .= '<div class="ad-wrap">';
			if ( ! empty( $block['block_options']['ad_image'] ) ) {

				if ( ! empty( $block['block_options']['ad_url'] ) ) {
					$str .= '<a href="' . esc_url( $block['block_options']['ad_url'] ) . '" target="_blank">';
					$str .= '<img src="' . esc_url( $block['block_options']['ad_image'] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
					$str .= '</a>';
				} else {
					$str .= '<img src="' . esc_url( $block['block_options']['ad_image'] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
				}
			} else {
				if ( ! empty( $block['block_options']['ad_script'] ) ) {
					$str .= innovation_ruby_ads_support::render_google_ads( $block['block_options']['ad_script'], 'content_ads' );
				}
			}
			$str .= '</div>';

			$str .= parent::close_block_content();


			return $str;
		}


		/**
		 * @return array
		 * init block options
		 */
		static function block_config() {
			return array(
				'general' =>  array(
					'ad_title'  => esc_attr__( '- Advertisement -', 'innovation' ),
					'ad_image'  => true,
					'ad_url'    => true,
					'ad_script' => true
				)
			);
		}
	}
}
