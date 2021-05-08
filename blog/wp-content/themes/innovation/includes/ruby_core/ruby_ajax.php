<?php
/**
 * home page ajax load more
 */
if ( ! function_exists( 'innovation_ruby_ajax_load_more' ) ) {
	add_action( 'wp_ajax_nopriv_innovation_ruby_ajax_load_more', 'innovation_ruby_ajax_load_more' );
	add_action( 'wp_ajax_innovation_ruby_ajax_load_more', 'innovation_ruby_ajax_load_more' );

	function innovation_ruby_ajax_load_more() {

		$query_params = array();

		if ( ! empty( $_POST['post_num'] ) ) {
			$query_params['posts_per_page'] = intval( $_POST['post_num'] );
		} else {
			$query_params['posts_per_page'] = 5;
		}

		if ( ! empty( $_POST['page_next'] ) ) {
			$page_next = intval( $_POST['page_next'] );
		} else {
			$page_next = 2;
		}

		if ( ! empty( $_POST['blog_layout'] ) ) {
			$blog_layout = ( $_POST['blog_layout'] );
		} else {
			$blog_layout = 'classic-layout';
		}

		if ( ! empty( $_POST['big_first'] ) ) {
			$big_first = ( $_POST['big_first'] );
		} else {
			$big_first = false;
		}

		if ( ! empty( $_POST['cate_id'] ) ) {
			$cate_id                     = esc_attr( $_POST['cate_id'] );
			$query_params['category_id'] = $cate_id;
		} else {
			$cate_id = '';
		}

		$query_params['post_not_in'] = innovation_ruby_filter_unique( $cate_id );

		$query_data = innovation_ruby_query::get_custom_query( $query_params, $page_next );

		//render
		switch ( $blog_layout ) {
			case 'list-sgrid-layout' :
				$str = innovation_ruby_list_sgrid_layout::ajax_render( $query_data, $big_first );
				break;
			case 'list-grid-layout' :
				$str = innovation_ruby_list_grid_layout::ajax_render( $query_data, $big_first );
				break;
			case 'classic-grid-layout' :
				$str = innovation_ruby_classic_grid_layout::ajax_render( $query_data );
				break;
			case 'classic-sgrid-layout' :
				$str = innovation_ruby_classic_sgrid_layout::ajax_render( $query_data );
				break;
			case 'sgrid-layout' :
				$str = innovation_ruby_sgrid_layout::ajax_render( $query_data, $big_first );
				break;
			case 'grid-layout' :
				$str = innovation_ruby_grid_layout::ajax_render( $query_data, $big_first );
				break;
			case 'list-layout' :
				$str = innovation_ruby_list_layout::ajax_render( $query_data, $big_first );
				break;
			default :
				$str = innovation_ruby_classic_layout::ajax_render( $query_data );
				break;
		}

		wp_reset_postdata();

		die( json_encode( $str ) );

	}
}


/**
 * filer unique post
 */
if ( ! function_exists( 'innovation_ruby_filter_unique' ) ) {
	function innovation_ruby_filter_unique( $ruby_cate_id ) {

		if ( empty( $ruby_cate_id ) ) {
			$ruby_enable_unique_post = innovation_ruby_util::get_theme_option( 'unique_post' );
			$ruby_featured_style     = innovation_ruby_util::get_theme_option( 'featured_style' );

			if ( empty( $ruby_enable_unique_post ) || 'none' == $ruby_featured_style ) {
				return false;
			}

			//remove duplicate post
			$ruby_unique_data      = '';
			$ruby_unique_post_data = get_option( 'innovation_ruby_home_unique_posts_data' );
			if ( ! empty( $ruby_enable_unique_post ) && is_array( $ruby_unique_post_data ) ) {
				$ruby_unique_data = implode( ',', $ruby_unique_post_data );
			}

			return $ruby_unique_data;

		} else {
			//check and return
			$ruby_enable_unique_post = innovation_ruby_util::get_theme_option( 'category_unique_post_' . $ruby_cate_id );
			$ruby_featured_style     = innovation_ruby_util::get_theme_option( 'category_featured_style_' . $ruby_cate_id );
			if ( empty( $ruby_enable_unique_post ) || 'none' == $ruby_featured_style ) {
				return false;
			}

			//remove duplicate post
			$ruby_unique_post_data = get_option( 'innovation_ruby_categories_unique_posts_data' );
			if ( ! empty( $ruby_unique_post_data[ $ruby_cate_id ] ) && is_array( $ruby_unique_post_data[ $ruby_cate_id ] ) ) {
				$ruby_unique_data = implode( ',', $ruby_unique_post_data[ $ruby_cate_id ] );

				return $ruby_unique_data;

			} else {
				return false;
			}
		}

	}
}



