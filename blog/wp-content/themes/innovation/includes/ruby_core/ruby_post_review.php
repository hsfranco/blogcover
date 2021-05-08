<?php

if ( ! class_exists( 'innovation_ruby_post_review' ) ) {
	class innovation_ruby_post_review {

		/**
		 * @return bool
		 * check review
		 */
		static function has_review() {

			//check
			$post_id            = get_the_ID();
			$ruby_as            = get_post_meta( $post_id, 'innovation_ruby_as', true );
			$ruby_enable_review = get_post_meta( $post_id, 'innovation_ruby_enable_review', true );
			if ( ( $ruby_as ) && ( $ruby_enable_review ) ) {
				return true;
			} else {
				return false;
			}
		}


		/**
		 * @param int $score
		 *
		 * @return string|void
		 * render review description
		 */
		static function render_intro( $score = 10 ) {
			$score         = intval( $score );
			$score_intro_1 = innovation_ruby_util::get_theme_option( 'score_intro_1' );
			$score_intro_2 = innovation_ruby_util::get_theme_option( 'score_intro_2' );
			$score_intro_3 = innovation_ruby_util::get_theme_option( 'score_intro_3' );
			$score_intro_4 = innovation_ruby_util::get_theme_option( 'score_intro_4' );

			if ( $score < 3 ) {
				return esc_attr( $score_intro_1 );
			} elseif ( 3 <= $score && 5 > $score ) {
				return esc_attr( $score_intro_2 );
			} elseif ( 5 <= $score && $score < 8 ) {
				return esc_attr( $score_intro_3 );
			} else {
				return esc_attr( $score_intro_4 );
			}
		}


		/**
		 * @return mixed|string
		 * review box position
		 */
		static function single_box_position() {
			//review box position
			$review_box_position = get_post_meta( get_the_ID(), 'innovation_ruby_review_box_position', true );
			if ( empty( $review_box_position ) || 'default' == $review_box_position ) {
				$review_box_position = innovation_ruby_util::get_theme_option( 'default_single_review_box_position' );
			}

			return $review_box_position;
		}

	}
}