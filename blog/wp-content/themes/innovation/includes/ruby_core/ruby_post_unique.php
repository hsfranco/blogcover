<?php


/**
 * Class innovation_ruby_unique_post
 * support unique post
 */
class innovation_ruby_unique_post {

	/**
	 * add unique post for home page
	 */
	static function add_data_home() {

		$ruby_enable_unique_post = innovation_ruby_util::get_theme_option( 'unique_post' );
		if ( empty( $ruby_enable_unique_post ) ) {
			return false;
		}

		$data_query = innovation_ruby_featured::get_data_home();

		//add unique posts
		if ( ! empty( $data_query->post_count ) ) {
			$post_ids = array();
			while ( $data_query->have_posts() ) {
				$data_query->the_post();
				$post_ids[] = get_the_ID();
			}

			//add to database
			delete_option( 'innovation_ruby_home_unique_posts_data' );
			add_option( 'innovation_ruby_home_unique_posts_data', $post_ids );
		}
	}


	/**
	 * add unique post for category
	 */
	static function add_data_category() {
		$categories_data  = get_categories( array( 'hide_empty' => 0 ) );
		$ruby_unique_data = array();

		//add data
		foreach ( $categories_data as $category ) {
			//check options
			$category_id             = $category->term_id;
			$ruby_enable_unique_post = innovation_ruby_util::get_theme_option( 'category_unique_post_' . $category_id );
			if ( empty( $ruby_enable_unique_post ) ) {
				continue;
			}

			$data_query = innovation_ruby_featured::get_data_category( $category_id );
			if ( ! empty( $data_query->post_count ) ) {
				$post_ids = array();
				while ( $data_query->have_posts() ) {
					$data_query->the_post();
					$post_ids[] = get_the_ID();
				}
				$ruby_unique_data[ $category_id ] = $post_ids;
			}
		}

		//add to database
		delete_option( 'innovation_ruby_categories_unique_posts_data' );
		add_option( 'innovation_ruby_categories_unique_posts_data', $ruby_unique_data );
	}


	/**
	 * delete unique post
	 */
	static function delete_data_home() {
		delete_option( 'innovation_ruby_home_unique_posts_data' );
	}

	/**
	 * delete unique post
	 */
	static function delete_data_category() {
		delete_option( 'innovation_ruby_categories_unique_posts_data' );
	}


	/**
	 * @param $query
	 *
	 * @return bool
	 * hook to main query
	 */
	static function hook_to_main_query( $query ) {

		if ( $query->is_home() && $query->is_main_query() ) {

			//check and return
			$ruby_enable_unique_post = innovation_ruby_util::get_theme_option( 'unique_post' );
			$ruby_featured_style     = innovation_ruby_util::get_theme_option( 'featured_style' );
			if ( empty( $ruby_enable_unique_post ) || 'none' == $ruby_featured_style ) {
				return false;
			}

			//remove duplicate post
			$ruby_unique_post_data = get_option( 'innovation_ruby_home_unique_posts_data' );
			if ( ! empty( $ruby_enable_unique_post ) && is_array( $ruby_unique_post_data ) ) {
				$query->set( 'post__not_in', $ruby_unique_post_data );
			}

		} elseif ( $query->is_category() && $query->is_main_query() ) {

			global $wp_query;
			$ruby_cate_id = $wp_query->get_queried_object_id();

			//check and return
			$ruby_enable_unique_post = innovation_ruby_util::get_theme_option( 'category_unique_post_' . $ruby_cate_id );
			$ruby_featured_style     = innovation_ruby_util::get_theme_option( 'category_featured_style_' . $ruby_cate_id );
			if ( empty( $ruby_enable_unique_post ) || 'none' == $ruby_featured_style ) {
				return false;
			}

			//remove duplicate post
			$ruby_unique_post_data = get_option( 'innovation_ruby_categories_unique_posts_data' );
			if ( ! empty( $ruby_unique_post_data[ $ruby_cate_id ] ) && is_array( $ruby_unique_post_data[ $ruby_cate_id ] ) ) {
				$query->set( 'post__not_in', $ruby_unique_post_data[ $ruby_cate_id ] );
			} else {
				return false;
			}
		}
	}

}


//home unique post
add_action( 'pre_get_posts', array( 'innovation_ruby_unique_post', 'hook_to_main_query' ) );

//delete data
add_action( 'after_switch_theme', array( 'innovation_ruby_unique_post', 'delete_data_home' ) );
add_action( 'after_switch_theme', array( 'innovation_ruby_unique_post', 'delete_data_category' ) );

//add home unique data
add_action( 'redux/options/innovation_ruby_theme_options/saved', array(
	'innovation_ruby_unique_post',
	'add_data_home'
) );
add_action( 'redux/options/innovation_ruby_theme_options/reset', array(
	'innovation_ruby_unique_post',
	'add_data_home'
) );
add_action( 'redux/options/innovation_ruby_theme_options/section/reset', array(
	'innovation_ruby_unique_post',
	'add_data_home'
) );
add_action( 'save_post', array( 'innovation_ruby_unique_post', 'add_data_home' ) );
add_action( 'delete_post', array( 'innovation_ruby_unique_post', 'add_data_home' ) );

//add category page
add_action( 'redux/options/innovation_ruby_theme_options/saved', array(
	'innovation_ruby_unique_post',
	'add_data_category'
) );
add_action( 'redux/options/innovation_ruby_theme_options/reset', array(
	'innovation_ruby_unique_post',
	'add_data_category'
) );
add_action( 'redux/options/innovation_ruby_theme_options/section/reset', array(
		'innovation_ruby_unique_post',
		'add_data_category'
	) );
add_action( 'save_post', array( 'innovation_ruby_unique_post', 'add_data_category' ) );
add_action( 'delete_post', array( 'innovation_ruby_unique_post', 'add_data_category' ) );