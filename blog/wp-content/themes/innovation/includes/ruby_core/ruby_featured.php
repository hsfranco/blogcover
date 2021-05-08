<?php
/**
 * Class innovation_ruby_featured
 * get data for featured slider
 */
if ( ! class_exists( 'innovation_ruby_featured' ) ) {
	class innovation_ruby_featured {

		/**
		 * @return WP_Query
		 * get post data
		 */
		static function get_data() {
			//get options
			if ( is_category() ) {
				$data_query = self::get_data_category();
			} else {
				$data_query = self::get_data_home();
			}

			return $data_query;
		}

		/**
		 * @return WP_Query
		 * get featured data for home page
		 */
		static function get_data_home() {
			//get options
			$ruby_options = array();
			$categories   = innovation_ruby_util::get_theme_option( 'featured_cate' );
			if ( is_array( $categories ) ) {
				$ruby_options['category_ids'] = implode( ',', $categories );
			}
			$tags = innovation_ruby_util::get_theme_option( 'featured_tag' );

			if ( is_array( $tags ) ) {
				$ruby_options['tag_in'] = $tags;
			}
			$ruby_options['orderby']        = innovation_ruby_util::get_theme_option( 'featured_sort' );
			$ruby_options['posts_per_page'] = innovation_ruby_util::get_theme_option( 'featured_num' );
			$ruby_options['offset']         = innovation_ruby_util::get_theme_option( 'featured_offset' );

			$data_query = innovation_ruby_query::get_custom_query( $ruby_options );

			return $data_query;
		}


		/**
		 * @param string $override
		 *
		 * @return WP_Query
		 * get featured data for category page
		 */
		static function get_data_category( $override = '' ) {

			//get id
			if ( empty( $override ) ) {
				$ruby_cate_id = innovation_ruby_util::get_page_cate_id();
			} else {
				$ruby_cate_id = $override;
			}

			$ruby_options                 = array();
			$ruby_options['category_ids'] = $ruby_cate_id;
			$tags                         = innovation_ruby_util::get_theme_option( 'category_featured_tag_' . $ruby_cate_id );


			if ( is_array( $tags ) ) {
				$ruby_options['tag_in'] = $tags;
			}
			$ruby_options['orderby']        = innovation_ruby_util::get_theme_option( 'category_featured_sort_' . $ruby_cate_id );
			$ruby_options['posts_per_page'] = innovation_ruby_util::get_theme_option( 'category_featured_num_' . $ruby_cate_id );
			$ruby_options['offset']         = innovation_ruby_util::get_theme_option( 'category_featured_offset_' . $ruby_cate_id );
			$data_query                     = innovation_ruby_query::get_custom_query( $ruby_options );

			return $data_query;

		}
	}
}
