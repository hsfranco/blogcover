<?php
/**----------------------------------------------------------------------
 * @param $block
 * @return mixed
 * render blocks
 */
if ( ! class_exists( 'ruby_composer_block' ) ) {
	class ruby_composer_block {
		static function render( $section, $block ) {
			if ( 'section_full_width' == $section ) {
				switch ( $block['block_name'] ) {

					case 'innovation_ruby_fw_slider_grid' : {
						return innovation_ruby_fw_slider_grid::render( $block );
					}

					case 'innovation_ruby_fw_slider' : {
						return innovation_ruby_fw_slider::render( $block );
					}

					case 'innovation_ruby_fw_slider_hw' : {
						return innovation_ruby_fw_slider_hw::render( $block );
					}

					case 'innovation_ruby_fw_carousel_hw' : {
						return innovation_ruby_fw_carousel_hw::render( $block );
					}

					case 'innovation_ruby_fw_carousel' : {
						return innovation_ruby_fw_carousel::render( $block );
					}

					case 'innovation_ruby_fw_carousel_small' : {
						return innovation_ruby_fw_carousel_small::render( $block );
					}

					case 'innovation_ruby_fw_block_1' : {
						return innovation_ruby_fw_block_1::render( $block );
					}

					case 'innovation_ruby_fw_block_2' : {
						return innovation_ruby_fw_block_2::render( $block );
					}

					case 'innovation_ruby_fw_block_3' : {
						return innovation_ruby_fw_block_3::render( $block );
					}

					case 'innovation_ruby_fw_block_code' : {
						return innovation_ruby_fw_block_code::render( $block );
					}

					case 'innovation_ruby_fw_ad_box' : {
						return innovation_ruby_fw_ad_box::render( $block );
					}

					default :
						return false;
				}
			} else {
				switch ( $block['block_name'] ) {

					case 'innovation_ruby_hs_block_1' : {
						return innovation_ruby_hs_block_1::render( $block );
					}

					case 'innovation_ruby_hs_block_2' : {
						return innovation_ruby_hs_block_2::render( $block );
					}

					case 'innovation_ruby_hs_block_3' : {
						return innovation_ruby_hs_block_3::render( $block );
					}

					case 'innovation_ruby_hs_block_4' : {
						return innovation_ruby_hs_block_4::render( $block );
					}

					case 'innovation_ruby_hs_block_5' : {
						return innovation_ruby_hs_block_5::render( $block );
					}

					case 'innovation_ruby_hs_block_6' : {
						return innovation_ruby_hs_block_6::render( $block );
					}

					case 'innovation_ruby_hs_block_7' : {
						return innovation_ruby_hs_block_7::render( $block );
					}

					case 'innovation_ruby_hs_block_8' : {
						return innovation_ruby_hs_block_8::render( $block );
					}

					case 'innovation_ruby_hs_block_9' : {
						return innovation_ruby_hs_block_9::render( $block );
					}

					case 'innovation_ruby_hs_block_code' : {
						return innovation_ruby_hs_block_code::render( $block );
					}

					case 'innovation_ruby_hs_ad_box' : {
						return innovation_ruby_hs_ad_box::render( $block );
					}

					default :
						return false;
				}
			}
		}
	}
}

