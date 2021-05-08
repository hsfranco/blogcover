<?php
/**
 * Class innovation_ruby_thumbnail
 * this file handle thumbnail for theme
 */
if ( ! class_exists( 'innovation_ruby_thumbnail' ) ) {
	class innovation_ruby_thumbnail {

		static function render( $size, $class = '' ) {

			if ( ! has_post_thumbnail() ) {
				return false;
			}

			$thumbnail = get_the_post_thumbnail( get_the_ID(), $size );

			if ( empty( $thumbnail ) ) {
				return false;
			}

			$ruby_enable_thumb_holder = innovation_ruby_util::get_theme_option( 'thumb_holder' );

			//create class
			$class_name   = array();
			$class_name[] = $class;
			$class_name[] = 'post-thumb';
			$class_name[] = 'is-image';
			if ( ! empty( $ruby_enable_thumb_holder ) ) {
				$class_name[] = 'ruby-holder';
			}
			$class_name = implode( ' ', $class_name );

			//render
			$str = '';
			$str .= '<div class="' . esc_attr( $class_name ) . '">';

			if ( 'single-thumb' == $class ) {
				$str .= $thumbnail;
			} else {
				$str .= '<a href="' . get_permalink() . '" title="' . esc_attr( get_the_title() ) . '" rel="bookmark">';
				$str .= $thumbnail;
				$str .= '</a>';
			}

			$str .= '</div><!--#thumb wrap-->';

			return $str;
		}


		/**
		 * render feat credit text
		 */
		static function render_feat_credit() {
			$ruby_credit_text = get_post_meta( get_the_ID(), 'innovation_ruby_credit_text', true );
			if ( ! empty( $ruby_credit_text ) ) {
				return '<span class="thumb-caption">' . html_entity_decode( esc_html( $ruby_credit_text ) ) . '</span>';
			} else {
				$thumbnail_id = get_post_thumbnail_id( get_the_ID() );
				$attachment   = get_posts( array( 'p' => $thumbnail_id, 'post_type' => 'attachment' ) );
				if ( ! empty( $attachment[0]->post_excerpt ) ) {
					return '<span class="thumb-caption">' . html_entity_decode( esc_html( $attachment[0]->post_excerpt ) ) . '</span>';
				} else {
					return false;
				}
			}
		}


		/**
		 * @return string
		 * render pattern
		 */
		static function render_pattern() {
			//thumb pattern
			$ruby_enable_thumb_pattern = innovation_ruby_util::get_theme_option( 'thumb_pattern' );

			if ( ! empty( $ruby_enable_thumb_pattern ) ) {
				return '<div class="thumb-pattern"></div><!--#thumb pattern-->';
			} else {
				return false;
			}
		}

	}
}