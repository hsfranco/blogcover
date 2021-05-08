<?php
/**
 * Class innovation_ruby_post_views
 * this file support views of post
 */
if ( ! class_exists( 'innovation_ruby_post_views' ) ) {
	class innovation_ruby_post_views {


		/**
		 * @return bool
		 * add post views
		 */
		static function add_views() {
			//check
			if ( ! is_single() ) {
				return false;
			}

			$post_id = get_the_ID();

			//add real view
			$ruby_real_count  = get_post_meta( $post_id, 'innovation_ruby_num_views', true );
			$ruby_total_count = get_post_meta( $post_id, 'innovation_ruby_total_num_views', true );

			if ( ! empty( $ruby_real_count ) ) {
				$ruby_real_count ++;
				update_post_meta( $post_id, 'innovation_ruby_num_views', $ruby_real_count );

				if ( self::check_forgery_change() ) {
					self::add_new_views_forgery();
				} else {
					$ruby_total_count ++;
					update_post_meta( $post_id, 'innovation_ruby_total_num_views', $ruby_total_count );
				}
			} else {

				//add real view
				delete_post_meta( $post_id, 'innovation_ruby_num_views' );
				add_post_meta( $post_id, 'innovation_ruby_num_views', 1 );

				if ( self::check_forgery_change() ) {
					self::add_new_views_forgery();
				} else {
					delete_post_meta( $post_id, 'innovation_ruby_total_num_views' );
					add_post_meta( $post_id, 'innovation_ruby_total_num_views', 1 );
				}
			}

			return false;
		}


		/**
		 * @return int|mixed
		 * get views of posts
		 */
		static function get_views() {
			$post_id = get_the_ID();

			//check
			if ( empty( $post_id ) ) {
				return false;
			}

			//check if config has been change
			if ( self::check_forgery_change() ) {
				self::add_new_views_forgery();
			};

			//get total post views
			$ruby_total_count = get_post_meta( $post_id, 'innovation_ruby_total_num_views', true );
			if ( class_exists( 'innovation_ruby_social_fan' ) ) {
				$ruby_total_count = innovation_ruby_social_fan::show_over_100k( $ruby_total_count );
			}

			return $ruby_total_count;
		}

		/**
		 * @return bool
		 * check forgery change
		 */
		static function check_forgery_change() {

			$post_id                      = get_the_ID();
			$forgery_view_config          = absint( innovation_ruby_util::get_theme_option( 'start_views' ) );
			$forgery_view_database_config = get_post_meta( $post_id, 'innovation_ruby_forgery_post_views', true );

			if ( empty( $forgery_view_config ) ) {
				if ( ! empty( $forgery_view_database_config ) ) {
					delete_post_meta( $post_id, 'innovation_ruby_forgery_post_views' );

					return true;
				} else {
					return false;
				}

			} else {
				if ( $forgery_view_config != $forgery_view_database_config ) {

					delete_post_meta( $post_id, 'innovation_ruby_forgery_post_views' );
					add_post_meta( $post_id, 'innovation_ruby_forgery_post_views', $forgery_view_config );

					return true;

				} else {
					return false;
				}
			}
		}


		/**
		 * @return bool
		 * add add_new_views_forgery
		 */
		static function add_new_views_forgery() {
			$post_id = get_the_ID();

			$ruby_real_count     = get_post_meta( $post_id, 'innovation_ruby_num_views', true );
			$forgery_view_config = absint( innovation_ruby_util::get_theme_option( 'start_views' ) );

			//if empty input then remove random
			if ( ! empty( $forgery_view_config ) ) {
				$ruby_rand_forgery = self::create_rand_forgery();
			} else {
				$ruby_rand_forgery = 0;
			}

			//add total view to database
			delete_post_meta( $post_id, 'innovation_ruby_total_num_views' );
			add_post_meta( $post_id, 'innovation_ruby_total_num_views', intval( $ruby_real_count + $ruby_rand_forgery ) );

			return false;
		}


		/**
		 * @return int
		 * create rand forgery
		 */
		static function create_rand_forgery() {

			$post_id             = get_the_ID();
			$forgery_view_config = absint( innovation_ruby_util::get_theme_option( 'start_views' ) );

			//create random count
			if ( $forgery_view_config - 500 > 0 ) {
				$val = rand( $forgery_view_config - 500, $forgery_view_config + 500 );
			} else {
				$val = rand( 0, $forgery_view_config + 500 );
			};

			delete_post_meta( $post_id, 'innovation_ruby_start_post_views_data' );
			add_post_meta( $post_id, 'innovation_ruby_start_post_views_data', true );

			return $val;
		}

	}
}
