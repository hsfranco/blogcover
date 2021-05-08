<?php
/**
 * redirect to active plugin
 */
if ( ! function_exists( 'innovation_ruby_after_theme_active' ) ) {
	function innovation_ruby_after_theme_active() {

		global $pagenow;

		if ( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {

			$ruby_first_active = get_option( 'innovation_ruby_first_active_theme', '' );
			if ( ! empty( $ruby_first_active ) ) {
				update_option( 'innovation_ruby_first_active_theme', '1' );
			} else {
				add_option( 'innovation_ruby_first_active_theme', '1' );
			}

			//redirect
			wp_redirect( admin_url( 'admin.php?page=innovation-plugins' ) );
			exit;
		}
	}

	add_action( 'after_switch_theme', 'innovation_ruby_after_theme_active' );
}


/**
 * @param $ruby_body_class
 *
 * @return array
 * add class to body
 */
if ( ! function_exists( 'innovation_ruby_body_add_class' ) ) {
	function innovation_ruby_body_add_class( $ruby_body_class ) {

		$ruby_featured_style = innovation_ruby_util::get_theme_option( 'featured_style' );
		$ruby_header_style   = innovation_ruby_util::get_theme_option( 'header_style' );

		$ruby_body_class[] = 'ruby-body';
		if ( 'is-boxed' == innovation_ruby_util::get_theme_option( 'main_site_layout' ) ) {
			$ruby_body_class[] = 'is-boxed';
			$ruby_site_bg      = innovation_ruby_util::get_theme_option( 'site_background' );
			if ( ! empty( $ruby_site_bg ) ) {
				$ruby_body_class[] = 'is-site-bg';
			}
			$ruby_site_bg_link = innovation_ruby_util::get_theme_option( 'site_background_link' );
			if ( ! empty( $ruby_site_bg_link ) ) {
				$ruby_body_class[] = 'is-site-link';
			}
		} else {
			$ruby_body_class[] = 'is-full-width';
		}

		if ( is_home() && 'none' != $ruby_featured_style ) {
			$ruby_body_class[] = 'has-featured';
		}

		$ruby_body_class[] = 'is-header-style-' . $ruby_header_style;
		if ( 2 == $ruby_header_style ) {
			$ruby_header_second_layout_manager = innovation_ruby_util::get_theme_option( 'header_second_layout_manager' );
			if ( ! empty( $ruby_header_second_layout_manager['enabled'] ) ) {
				foreach ( $ruby_header_second_layout_manager['enabled'] as $ruby_key => $ruby_val ) {
					if ( 'nav_bar' == $ruby_key ) {
						$ruby_body_class[] = 'is-top-nav';
					};

					if ( 'logo_section' == $ruby_key ) {
						break;
					}
				}
			}
		}

		//return
		return $ruby_body_class;
	}

	add_filter( 'body_class', 'innovation_ruby_body_add_class' );
}


/**
 * add favicon & BookmarkLet to header
 */
if ( ! function_exists( 'innovation_ruby_wp_header' ) ) {
	function innovation_ruby_wp_header() {

		$apple_icon = innovation_ruby_util::get_theme_option( 'apple_touch_ion' );
		$metro_icon = innovation_ruby_util::get_theme_option( 'metro_icon' );

		if ( ! empty( $apple_icon['url'] ) ) {
			echo '<link rel="apple-touch-icon" href="' . esc_url( $apple_icon['url'] ) . '" />';
		}

		if ( ! empty( $metro_icon['url'] ) ) {
			echo '<meta name="msapplication-TileColor" content="#ffffff">';
			echo '<meta name="msapplication-TileImage" content="' . esc_url( $metro_icon['url'] ) . '" />';
		}
	}

	add_action( 'wp_head', 'innovation_ruby_wp_header', 3 );
}


/**
 * Opengraph support
 */
if ( ! function_exists( 'innovation_ruby_opengraph_meta' ) ) {

	function innovation_ruby_opengraph_meta() {
		global $post;

		//check enable for theme options
		$open_graph = innovation_ruby_util::get_theme_option( 'open_graph' );
		if ( ! is_singular() || empty( $open_graph ) ) {
			return false;
		}

		if ( class_exists( 'WPSEO_Frontend' ) ) {
			$yoast_social = get_option( 'wpseo_social' );
			if ( ! empty( $yoast_social['opengraph'] ) ) {
				return false;
			}
		}

		if ( ! empty( $post->post_excerpt ) ) {
			$ruby_post_excerpt = wp_trim_words( $post->post_excerpt, 30, '' );
		} else {
			$post_content      = preg_replace( '`\[[^\]]*\]`', '', $post->post_content );
			$post_content      = stripslashes( wp_filter_nohtml_kses( $post_content ) );
			$ruby_post_excerpt = wp_trim_words( esc_html( $post_content ), 30, '' );
		}

		echo '<meta property="og:title" content="' . get_the_title() . '"/>';
		echo '<meta property="og:type" content="article"/>';
		echo '<meta property="og:url" content="' . get_permalink() . '"/>';
		echo '<meta property="og:site_name" content="' . get_bloginfo( 'name' ) . '"/>';
		echo '<meta property="og:description" content="' . strip_tags( esc_attr( $ruby_post_excerpt ) ) . '"/>';
		if ( has_post_thumbnail( $post->ID ) ) {
			$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'landscape_medium' );
			echo '<meta property="og:image" content="' . esc_url( $thumbnail_src[0] ) . '"/>';
		} else {
			$logo = innovation_ruby_util::get_theme_option( 'header_logo' );
			if ( ! empty( $logo['url'] ) ) {
				echo '<meta property="og:image" content="' . esc_url( $logo['url'] ) . '"/>';
			}
		}
	}

	add_action( 'wp_head', 'innovation_ruby_opengraph_meta', 10 );
}


/**
 * remove page in search result
 */
if ( ! function_exists( 'innovation_ruby_filter_search' ) ) {
	function innovation_ruby_filter_search( $query ) {

		if ( is_admin() ) {
			return false;
		}

		$ruby_search_filter = innovation_ruby_util::get_theme_option( 'search_filter' );
		global $wp_post_types;

		if ( ! empty( $ruby_search_filter ) ) {
			if ( $query->is_search ) {
				$wp_post_types['page']->exclude_from_search = true;
			}
		}
	}

	add_action( 'pre_get_posts', 'innovation_ruby_filter_search' );
};


/**
 * @param $image
 * @param $attachment_id
 * @param $size
 * @param $icon
 *
 * @return array|false
 * gif image
 */
if ( ! function_exists( 'innovation_ruby_support_gif' ) ) {
	function innovation_ruby_support_gif( $image, $attachment_id, $size, $icon ) {

		$gif_support = innovation_ruby_util::get_theme_option( 'gif_support' );

		if ( ! empty( $gif_support ) ) {
			$format = wp_check_filetype( $image[0] );

			if ( ! empty( $format ) && 'gif' == $format['ext'] && 'full' != $size ) {
				return wp_get_attachment_image_src( $attachment_id, $size = 'full', $icon );
			}
		}

		return $image;
	}

	add_filter( 'wp_get_attachment_image_src', 'innovation_ruby_support_gif', 10, 4 );
}


/**
 * add user information
 */
if ( ! function_exists( 'innovation_ruby_modify_contact_methods' ) ) {
	function innovation_ruby_modify_contact_methods() {
		$profile_fields = innovation_ruby_theme_config::author_social();

		return $profile_fields;
	}

	add_filter( 'user_contactmethods', 'innovation_ruby_modify_contact_methods' );
}


/**
 * add options to javascript
 */
if ( ! function_exists( 'innovation_ruby_script_options_value' ) ) {
	function innovation_ruby_script_options_value() {
		//get theme options
		$ruby_to_top             = innovation_ruby_util::get_theme_option( 'site_back_to_top' );
		$ruby_to_top_mobile      = intval( innovation_ruby_util::get_theme_option( 'site_back_to_top_mobile' ) );
		$site_smooth_scroll      = innovation_ruby_util::get_theme_option( 'site_smooth_scroll' );
		$site_smooth_display     = innovation_ruby_util::get_theme_option( 'site_smooth_display' );
		$single_image_popup      = innovation_ruby_util::get_theme_option( 'single_post_popup_image' );
		$ruby_sticky_sidebar     = innovation_ruby_util::get_theme_option( 'sticky_sidebar' );
		$ruby_site_bg_link       = innovation_ruby_util::get_theme_option( 'site_background_link' );
		$ruby_single_popup_image = innovation_ruby_util::get_theme_option( 'single_popup_image' );
		$ruby_touch_tooltip      = innovation_ruby_util::get_theme_option( 'touch_tooltip' );
		$ruby_popup_gallery      = innovation_ruby_util::get_theme_option( 'popup_gallery' );

		//move to js script
		if ( ! empty( $ruby_to_top ) ) {
			wp_localize_script( 'innovation-ruby-main-script', 'innovation_ruby_to_top', strval( $ruby_to_top ) );
		}

		if ( ! empty( $ruby_to_top_mobile ) ) {
			wp_localize_script( 'innovation-ruby-main-script', 'innovation_ruby_to_top_mobile', strval( $ruby_to_top_mobile ) );
		}

		if ( ! empty( $site_smooth_scroll ) ) {
			wp_localize_script( 'innovation-ruby-main-script', 'innovation_ruby_site_smooth_scroll', strval( $site_smooth_scroll ) );
		}

		if ( ! empty( $site_smooth_display ) ) {
			wp_localize_script( 'innovation-ruby-main-script', 'innovation_ruby_site_smooth_display', strval( $site_smooth_display ) );
		}

		if ( ! empty( $single_image_popup ) ) {
			wp_localize_script( 'innovation-ruby-main-script', 'ruby_single_image_popup', strval( $single_image_popup ) );
		}

		if ( ! empty( $ruby_sticky_sidebar ) ) {
			wp_localize_script( 'innovation-ruby-main-script', 'ruby_sidebar_sticky_enable', strval( $ruby_sticky_sidebar ) );
		}

		if ( ! empty( $ruby_single_popup_image ) ) {
			wp_localize_script( 'innovation-ruby-main-script', 'innovation_ruby_single_popup_image', strval( $ruby_single_popup_image ) );
		}

		if ( ! empty( $ruby_popup_gallery ) ) {
			wp_localize_script( 'innovation-ruby-main-script', 'innovation_ruby_popup_gallery', strval( $ruby_popup_gallery ) );
		}

		if ( ! empty( $ruby_touch_tooltip ) ) {
			wp_localize_script( 'innovation-ruby-main-script', 'innovation_ruby_touch_tooltip', strval( $ruby_touch_tooltip ) );
		}
		if ( 'is-boxed' == innovation_ruby_util::get_theme_option( 'main_site_layout' ) && ! empty( $ruby_site_bg_link ) ) {
			wp_localize_script( 'innovation-ruby-main-script', 'innovation_ruby_site_bg_link', $ruby_site_bg_link );
		}
	}

	add_action( 'wp_footer', 'innovation_ruby_script_options_value', 10 );
}


/**
 * add span wrap for category number in widget
 */
if ( ! function_exists( 'innovation_ruby_category_post_count' ) ) {
	function innovation_ruby_category_post_count( $str ) {
		$pos = strpos( $str, '</a> (' );
		if ( false != $pos ) {
			$str = str_replace( '</a> (', '<span class="number-post">', $str );
			$str = str_replace( ')', '</span></a>', $str );
		}

		return $str;
	}

	add_filter( 'wp_list_categories', 'innovation_ruby_category_post_count' );
};


/**
 * add span wrap for archives number in widget
 */
if ( ! function_exists( 'innovation_ruby_archives_post_count' ) ) {
	function innovation_ruby_archives_post_count( $str ) {
		$pos = strpos( $str, '</a>&nbsp;(' );
		if ( false != $pos ) {
			$str = str_replace( '</a>&nbsp;(', '<span class="number-post">', $str );
			$str = str_replace( ')', '</span></a>', $str );
		}

		return $str;
	}

	add_filter( 'get_archives_link', 'innovation_ruby_archives_post_count' );
}


/**
 * register ajax
 */
if ( ! function_exists( 'innovation_ruby_ajax_url' ) ) {
	function innovation_ruby_ajax_url() {
		echo '<script type="application/javascript">var ruby_ajax_url = "' . admin_url( 'admin-ajax.php' ) . '"</script>';
	}

	add_action( 'wp_enqueue_scripts', 'innovation_ruby_ajax_url' );
}




