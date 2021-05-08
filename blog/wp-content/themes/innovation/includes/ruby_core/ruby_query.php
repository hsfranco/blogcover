<?php

/**
 * Class innovation_ruby_query
 * This file handling query data for theme
 */
if ( ! class_exists( 'innovation_ruby_query' ) ) {
	class innovation_ruby_query {

		/**
		 * @param string $args
		 * @param string $paged
		 * @return WP_Query
		 * get custom query
		 */
		static function get_custom_query( $args = '', $paged = '' ) {
			extract( shortcode_atts(
					array(
						'category_ids'   => '',
						'category_id'    => '',
						'author_id'      => '',
						'tags'           => '',
						'tag_in'         => '',
						'posts_per_page' => '',
						'no_found_rows'  => '',
						'offset'         => '',
						'orderby'        => '',
						'post_types'     => '',
						'meta_key'       => '',
						'post_not_in'    => '',
					), $args
				)
			);

			//default query config
			$args_query                        = array();
			$args_query['ignore_sticky_posts'] = 1;
			$args_query['post_status']         = 'publish';
			$args_query['post_type']           = 'post';

			//no found rows query
			if ( ! empty( $no_found_rows ) ) {
				$args_query['no_found_rows'] = true;
			}

			if ( ! empty( $post_not_in ) ) {
				$args_query['post__not_in'] = explode( ',', $post_not_in );
			}

			//post per page
			if ( empty( $posts_per_page ) ) {
				$args_query['posts_per_page'] = 5;
			} else {
				$args_query['posts_per_page'] = $posts_per_page;
			};


			//categories query
			if ( ! empty( $category_ids ) ) {
				if ( is_array( $category_ids ) ) {
					$category_ids = implode( ',', $category_ids );
				}
				if ( ! empty( $category_ids ) ) {
					$args_query['cat'] = esc_attr( $category_ids );
				} else {
					if ( ! empty( $category_id ) ) {
						$args_query['cat'] = $category_id;
					}
				}
			} else {
				if ( ! empty( $category_id ) ) {
					$args_query['cat'] = $category_id;
				}
			}

			//tags query
			if ( empty( $tag_ids ) && ! empty( $tags ) ) {
				$args_query['tag'] = esc_attr( strip_tags( $tags ) );
			}

			//tag in query
			if ( ! empty( $tag_in ) && is_array( $tag_in ) ) {
				$args_query['tag__in'] = $tag_in;
			}

			//author query
			if ( ! empty( $author_id ) ) {
				$args_query['author'] = $author_id;
			}

			//page query
			if ( ! empty( $paged ) ) {
				$args_query['paged'] = $paged;
			} else {
				$args_query['paged'] = 1;
			}

			//offset query
			if ( ! empty( $offset ) ) {
				if ( $paged > 1 ) {
					$args_query['offset'] = intval( $offset ) + intval( ( $paged - 1 ) * intval( $args_query['posts_per_page'] ) );
				} else {
					$args_query['offset'] = intval( $offset );
				}
			}


			//set default order by
			if ( empty( $orderby ) ) {
				$orderby = 'date_post';
			}

			//meta keys
			if ( ! empty( $meta_key ) ) {
				$args_query['meta_key'] = $meta_key;
			}

			switch ( $orderby ) {

				//date post
				case 'date_post' :
					$args_query['orderby'] = 'date';
					break;

				//popular comment
				case 'comment_count' :
					$args_query['orderby'] = 'comment_count';
					break;

				//post type
				case 'post_type' :
					$args_query['orderby'] = 'type';
					break;

				//popular views
				case 'popular':
					$args_query['meta_key'] = 'innovation_ruby_total_num_views';
					$args_query['orderby']  = 'meta_value_num';
					$args_query['order']    = 'DESC';
					break;

				case 'top_review' :
					$args_query['meta_key'] = 'innovation_ruby_as';
					$args_query['orderby']  = 'meta_value_num';
					$args_query['order']    = 'DESC';
					break;

				//random
				case 'rand':
					$args_query['orderby'] = 'rand';
					break;

				//alphabet decs
				case 'alphabetical_order_decs':
					$args_query['orderby'] = 'title';
					$args_query['order']   = 'DECS';
					break;

				//alphabet asc
				case 'alphabetical_order_asc':
					$args_query['orderby'] = 'title';
					$args_query['order']   = 'ASC';
					break;
			}

			//get query
			$data_query = new WP_Query( $args_query );

			return $data_query;
		}
	}
}
