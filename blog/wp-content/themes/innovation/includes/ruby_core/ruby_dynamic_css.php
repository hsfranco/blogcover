<?php
/**
 * @return string
 * this file get options and create css code as string
 */
if ( ! function_exists( 'innovation_ruby_dynamic_css' ) ) {
	function innovation_ruby_dynamic_css() {

		//get cache
		$cache = get_option( 'innovation_ruby_dynamic_style_cache', '' );

		if ( empty( $cache ) ) {
			$str = '';

			/************************MAX SITE WIDTH**********************************/
			$ruby_max_width_site = innovation_ruby_util::get_theme_option( 'site_container_width' );

			if ( ! empty( $ruby_max_width_site ) && 1200 != $ruby_max_width_site ) {
				$str .= '.ruby-container { max-width :' . esc_attr( $ruby_max_width_site ) . 'px;}';
				$str .= '.is-boxed .main-site-outer { max-width :' . esc_attr( intval( $ruby_max_width_site ) + 30 ) . 'px;}';
			}

			/************************HEADER & NAVIGATION**********************************/
			$ruby_navigation_height           = innovation_ruby_util::get_theme_option( 'main_navigation_height' );
			$ruby_sticky_navigation_height    = innovation_ruby_util::get_theme_option( 'main_sticky_navigation_height' );
			$ruby_navigation_background       = innovation_ruby_util::get_theme_option( 'main_nav_background' );
			$ruby_header_second_bottom_margin = innovation_ruby_util::get_theme_option( 'header_second_bottom_margin' );


			$str .= '.main-nav-wrap ul.main-nav-inner > li > a, .nav-right-col {';
			$str .= 'line-height: ' . $ruby_navigation_height . 'px;';
			$str .= '}';

			$str .= '.mobile-nav-button, .header-style-1 .logo-inner img';
			$str .= '{ height: ' . $ruby_navigation_height . 'px;}';


			$str .= '.ruby-is-stick .main-nav-wrap ul.main-nav-inner > li > a, .ruby-is-stick .nav-right-col { ';
			$str .= 'line-height: ' . $ruby_sticky_navigation_height . 'px;';
			$str .= '}';

			$str .= '.ruby-is-stick .mobile-nav-button';
			$str .= '{ height: ' . $ruby_sticky_navigation_height . 'px;}';

			$str .= '.header-style-1 .ruby-is-stick .logo-inner img';
			$str .= '{ height:' . $ruby_sticky_navigation_height . 'px;}';

			$str .= '@media only screen and (max-width: 991px) {';
			$str .= '.header-style-1 .nav-bar-wrap .main-nav-wrap ul.main-nav-inner > li > a, .header-style-1 .nav-bar-wrap .nav-right-col';
			$str .= '{line-height: ' . $ruby_sticky_navigation_height . 'px;}';
			$str .= '.header-style-1 .nav-bar-wrap .logo-inner img, .header-style-1 .nav-bar-wrap .mobile-nav-button';
			$str .= '{ height:' . $ruby_sticky_navigation_height . 'px;}';
			$str .= '}';

			if ( ! empty( $ruby_header_second_bottom_margin ) ) {
				$str .= '.home .header-style-2';
				$str .= '{ margin-bottom: ' . $ruby_header_second_bottom_margin . 'px }';
			}


			if ( ! empty( $ruby_navigation_background ) ) {
				$str .= '.nav-bar-wrap';
				$str .= '{ background-color: ' . $ruby_navigation_background . '!important; }';
			}


			/***************************SUB NAVIGATION*******************************/
			$ruby_main_sub_shadow         = innovation_ruby_util::get_theme_option( 'main_sub_nav_shadow' );
			$ruby_main_sub_nav_background = innovation_ruby_util::get_theme_option( 'main_sub_nav_background' );


			if ( ! empty( $ruby_main_sub_shadow ) ) {
				$str .= '.is-sub-menu';
				$str .= '{ -webkit-box-shadow: 0 1px 10px 1px rgba(0, 0, 0, 0.08); box-shadow: 0 1px 10px 1px rgba(0, 0, 0, 0.08); }';
			}

			if ( ! empty( $ruby_main_sub_nav_background ) ) {
				$str .= '.is-sub-menu, .main-nav-wrap ul.main-nav-inner > li.current-menu-item > a,';
				$str .= '.main-nav-wrap ul.main-nav-inner > li:hover, .main-nav-wrap ul.main-nav-inner > li:focus';
				$str .= '{ background-color : ' . $ruby_main_sub_nav_background . '}';
			}


			/************************MAIN THEME COLOR**********************************/
			$ruby_main_site_color = innovation_ruby_util::get_theme_option( 'main_theme_color' );

			if ( ! empty( $ruby_main_site_color ) && ( '#29bfad' != strtolower( $ruby_main_site_color ) ) ) {

				$str .= '.main-nav-wrap ul.main-nav-inner > li.current-menu-item > a, .main-nav-wrap ul.main-nav-inner > li:hover > a,';
				$str .= '.main-nav-wrap ul.main-nav-inner > li:focus > a, .is-sub-menu li.menu-item a:hover, .is-sub-menu li.menu-item a:focus,';
				$str .= '.mobile-nav-wrap a:hover, .meta-info-el a:hover, .meta-info-el a:focus, .twitter-content.post-excerpt a,';
				$str .= '.entry a:not(button):hover, .entry a:not(button):focus, .entry blockquote:before, .logged-in-as a:hover, .logged-in-as a:focus,';
				$str .= '.user-name h3 a:hover, .user-name h3 a:focus, .cate-info-style-4 .cate-info-el,';
				$str .= '.cate-info-style-1 .cate-info-el, .cate-info-style-2 .cate-info-el';
				$str .= '{ color :' . $ruby_main_site_color . ';}';

				$str .= 'button[type="submit"], input[type="submit"], .page-numbers.current, a.page-numbers:hover, a.page-numbers:focus, .nav-bar-wrap,';
				$str .= '.btn:hover, .btn:focus, .is-light-text .btn:hover, .is-light-text .btn:focus, .widget_mc4wp_form_widget form,';
				$str .= '#ruby-back-top i:hover:before, #ruby-back-top i:hover:after, .single-page-links > *:hover, .single-page-links > *:focus, .single-page-links > span,';
				$str .= '.entry blockquote:after, .author-title a, .single-tag-wrap a:hover, .single-tag-wrap a:focus, #cancel-comment-reply-link:hover, #cancel-comment-reply-link:focus,';
				$str .= 'a.comment-reply-link:hover, a.comment-reply-link:focus, .comment-edit-link:hover, .comment-edit-link:focus, .top-footer-wrap .widget_mc4wp_form_widget,';
				$str .= '.related-wrap .ruby-related-slider-nav:hover, .related-wrap .ruby-related-slider-nav:focus, .close-aside-wrap a:hover, .ruby-close-aside-bar a:focus,';
				$str .= '.archive-page-header .author-social a:hover, .archive-page-header .author-social a:hover:focus, .user-post-link a, .number-post, .btn-load-more,';
				$str .= '.is-light-text.cate-info-style-4 .cate-info-el, .cate-info-style-3 .cate-info-el:first-letter, .cate-info-style-1 .cate-info-el:before,';
				$str .= '.cate-info-style-2 .cate-info-el:before';
				$str .= '{ background-color :' . $ruby_main_site_color . ';}';

				$str .= '.cate-info-style-3 .cate-info-el:after';
				$str .= '{ border-color: ' . $ruby_main_site_color . ';}';
			}

			$ruby_review_icon_color = innovation_ruby_util::get_theme_option( 'review_icon_color' );
			if ( ! empty( $ruby_review_icon_color ) && ( '#feec98' != strtolower( $ruby_review_icon_color ) ) ) {
				$str .= '.post-review-info .review-info-score:before,';
				$str .= '.review-box-wrap .review-title h3:before, .review-el .review-info-score';
				$str .= '{ color :' . $ruby_review_icon_color . ';}';

				$str .= '.score-bar';
				$str .= '{ background-color :' . $ruby_review_icon_color . ';}';
			}


			/************************NAVIGATION COLOR**********************************/
			$ruby_main_navigation_text_color           = innovation_ruby_util::get_theme_option( 'main_nav_text_color' );
			$ruby_main_navigation_text_color_hover     = innovation_ruby_util::get_theme_option( 'main_nav_text_color_hover' );
			$ruby_main_navigation_border_color         = innovation_ruby_util::get_theme_option( 'main_nav_el_border' );
			$ruby_main_sub_navigation_text_color       = innovation_ruby_util::get_theme_option( 'main_nav_sub_level_text_color' );
			$ruby_main_sub_navigation_text_color_hover = innovation_ruby_util::get_theme_option( 'main_nav_sub_level_text_color_hover' );
			$ruby_header_logo_section_height           = innovation_ruby_util::get_theme_option( 'header_second_logo_section_height' );

			if ( ! empty( $ruby_main_navigation_text_color ) ) {
				$str .= '.ruby-trigger .icon-wrap, .ruby-trigger .icon-wrap:before, .ruby-trigger .icon-wrap:after';
				$str .= '{ background-color: ' . $ruby_main_navigation_text_color . ';}';

				$str .= '.main-nav-wrap ul.main-nav-inner > li > a, .nav-right-col';
				$str .= '{color: ' . $ruby_main_navigation_text_color . ';}';
			}

			if ( ! empty( $ruby_main_sub_navigation_text_color ) ) {
				$str .= '.is-sub-menu li.menu-item,.mega-menu-wrap .is-sub-menu:before,';
				$str .= '.main-nav-wrap ul.main-nav-inner > li.current-menu-item > a,';
				$str .= '.main-nav-wrap ul.main-nav-inner > li:hover > a, .main-nav-wrap ul.main-nav-inner > li:focus > a';
				$str .= '{ color: ' . $ruby_main_sub_navigation_text_color . ';}';
			}

			if ( ! empty( $ruby_main_sub_navigation_text_color_hover ) ) {
				$str .= ' .is-sub-menu li.menu-item a:hover,  .is-sub-menu li.menu-item a:focus';
				$str .= '{ color: ' . $ruby_main_sub_navigation_text_color_hover . ';}';
			}

			if ( ! empty( $ruby_main_navigation_text_color_hover ) ) {
				$str .= '.main-nav-wrap ul.main-nav-inner > li.current-menu-item > a,';
				$str .= '.main-nav-wrap ul.main-nav-inner > li > a:hover, .main-nav-wrap ul.main-nav-inner > li > a:focus';
				$str .= '{ color : ' . $ruby_main_navigation_text_color_hover . ';}';
			}

			if ( ! empty( $ruby_main_navigation_border_color['rgba'] ) ) {
				$str .= '.left-mobile-nav-button.mobile-nav-button, .nav-right-col, .main-nav-wrap ul.main-nav-inner > li:first-child > a, .main-nav-wrap ul.main-nav-inner > li > a, .nav-right-col > *';
				$str .= '{border-color: ' . $ruby_main_navigation_border_color['rgba'] . ';}';
			} else {
				$str .= '.left-mobile-nav-button.mobile-nav-button, .nav-right-col, .main-nav-wrap ul.main-nav-inner > li:first-child > a, .main-nav-wrap ul.main-nav-inner > li > a, .nav-right-col > *';
				$str .= '{border: none;}';
			}

			//header style 2
			if ( ! empty( $ruby_header_logo_section_height ) ) {
				$str .= '.header-style-2 .logo-inner img { max-height: ' . esc_attr( intval( $ruby_header_logo_section_height ) - 20 ) . 'px;}';

				if ( intval( $ruby_header_logo_section_height ) < 180 ) {
					$str .= '.header-style-2 .logo-section-wrap { height:' . esc_attr( $ruby_header_logo_section_height ) . 'px !important; }';
				}
			}


			/************************CATEGORY ICON**********************************/
			$ruby_color_all_category = get_categories( array( 'hide_empty' => 0 ) );
			if ( ! empty( $ruby_color_all_category ) && is_array( $ruby_color_all_category ) ) {
				foreach ( $ruby_color_all_category as $ruby_category ) {
					$ruby_category_color = innovation_ruby_util::get_theme_option( 'category_icon_color_' . $ruby_category->term_id );
					if ( ! empty( $ruby_category_color ) ) {

						$str .= '.cate-info-style-1 .cate-info-el.is-cate-' . $ruby_category->term_id . ',';
						$str .= '.cate-info-style-2 .cate-info-el.is-cate-' . $ruby_category->term_id . ',';
						$str .= '.cate-info-style-4 .cate-info-el.is-cate-' . $ruby_category->term_id . '';
						$str .= '{ color :' . $ruby_category_color . ';}';

						$str .= '.cat-item-' . $ruby_category->term_id . ' .number-post,';
						$str .= '.cate-info-style-1 .cate-info-el.is-cate-' . $ruby_category->term_id . ':before,';
						$str .= '.cate-info-style-2 .cate-info-el.is-cate-' . $ruby_category->term_id . ':before,';
						$str .= '.cate-info-style-3 .cate-info-el.is-cate-' . $ruby_category->term_id . ':first-letter,';
						$str .= '.is-light-text.cate-info-style-4 .cate-info-el.is-cate-' . $ruby_category->term_id . '';
						$str .= '{ background-color :' . $ruby_category_color . ';}';

						$str .= '.cate-info-el.is-cate-' . $ruby_category->term_id . ',';
						$str .= '.cate-info-style-3 .cate-info-el.is-cate-' . $ruby_category->term_id . ':after';

						$str .= '{ border-color :' . $ruby_category_color . ';}';
					}
				}
			}

			/************************SOCIAL SHARE ICON**********************************/
			$ruby_color_social_icon = innovation_ruby_util::get_theme_option( 'social_icon_color' );
			if ( ! empty( $ruby_color_social_icon ) ) {
				$str .= '.box-share.is-color-icon > ul > li.box-share-el,';
				$str .= '.box-share-aside.is-color-icon > ul > li.box-share-el i, .box-share-aside.is-color-icon > ul > li.box-share-el span ';
				$str .= '{ background-color: ' . $ruby_color_social_icon . ' }';
			}

			/************************REVIEW ICON**********************************/
			$ruby_review_icon_color = innovation_ruby_util::get_theme_option( 'review_icon_color' );
			if ( ! empty( $ruby_review_icon_color ) ) {

			}

			/****************************HEADER TEXT CENTER******************************/
			$ruby_header_text_align_center = innovation_ruby_util::get_theme_option( 'post_header_center_text' );
			if ( ! empty( $ruby_header_text_align_center ) ) {
				$str .= '.post-wrap, .single-header, .post-feat-grid-small .post-title,';
				$str .= '.post-feat-grid-small:last-child .post-header, .block-title';
				$str .= '{ text-align: center;}';

				$str .= '.share-bar-right';
				$str .= '{float: none; margin-left: 7px;}';

				$str .= '.share-bar-right > *:first-child:before';
				$str .= '{content: "/"; display: inline-block; margin-right: 7px;}';
			}


			/************************SINGLE CONTENT WIDTH**********************************/
			$ruby_single_post_max_content_width = innovation_ruby_util::get_theme_option( 'single_max_content_width' );
			if ( ! empty( $ruby_single_post_max_content_width ) && 800 != $ruby_single_post_max_content_width ) {
				$str .= '.single .content-without-sidebar .entry > *, .single .single-layout-feat-fw .content-without-sidebar .box-share';
				$str .= '{ max-width: ' . esc_attr( $ruby_single_post_max_content_width ) . 'px;}';
			}


			/************************PAGE CONTENT WIDTH**********************************/
			$ruby_single_page_max_content_width = innovation_ruby_util::get_theme_option( 'page_max_content_width' );
			if ( ! empty( $ruby_single_page_max_content_width ) && 800 != $ruby_single_page_max_content_width ) {
				$str .= '.page .content-without-sidebar .entry > *';
				$str .= '{ max-width: ' . esc_attr( $ruby_single_page_max_content_width ) . 'px;}';
			}


			/************************CUSTOM TITLE FONT**********************************/
			$ruby_post_font                   = innovation_ruby_util::get_theme_option( 'medium_post_title_font' );
			$ruby_big_post_title_font         = innovation_ruby_util::get_theme_option( 'big_post_title_font_size' );
			$ruby_small_post_title_font       = innovation_ruby_util::get_theme_option( 'small_post_title_font_size' );
			$ruby_single_post_title_font_size = innovation_ruby_util::get_theme_option( 'single_post_title_font_size' );
			$ruby_post_excerpt_font_size      = innovation_ruby_util::get_theme_option( 'post_excerpt_font_size' );

			//entry h tag font
			if ( ! empty( $ruby_post_font['font-family'] ) ) {
				$str .= '.entry h1, .entry h2, .entry h3, .entry h4, .entry h5, .entry h6';
				$str .= '{ font-family :' . $ruby_post_font['font-family'] . ';}';
			}

			if ( ! empty( $ruby_post_font['font-weight'] ) ) {
				$str .= '.entry h1, .entry h2, .entry h3, .entry h4, .entry h5, .entry h6';
				$str .= '{ font-weight :' . $ruby_post_font['font-weight'] . ';}';
			}

			if ( ! empty( $ruby_post_font['font-style'] ) ) {
				$str .= '.entry h1, .entry h2, .entry h3, .entry h4, .entry h5, .entry h6';
				$str .= '{ font-style :' . $ruby_post_font['font-style'] . ';}';
			}

			if ( ! empty( $ruby_post_font['text-transform'] ) ) {
				$str .= '.entry h1, .entry h2, .entry h3, .entry h4, .entry h5, .entry h6';
				$str .= '{ text-transform :' . $ruby_post_font['text-transform'] . ';}';
			}

			if ( ! empty( $ruby_post_font['letter-spacing'] ) ) {
				$str .= '.entry h1, .entry h2, .entry h3, .entry h4, .entry h5, .entry h6';
				$str .= '{ letter-spacing :' . $ruby_post_font['letter-spacing'] . ';}';
			}

			if ( ! empty( $ruby_post_font['color'] ) ) {
				$str .= '.entry h1, .entry h2, .entry h3, .entry h4, .entry h5, .entry h6';
				$str .= '{ color :' . $ruby_post_font['color'] . ';}';
			}

			//post tile font size
			if ( ! empty( $ruby_big_post_title_font ) ) {
				$str .= '.post-title.is-big-title { font-size :' . $ruby_big_post_title_font . 'px; }';
			}

			if ( ! empty( $ruby_small_post_title_font ) ) {
				$str .= '.post-title.is-small-title { font-size :' . $ruby_small_post_title_font . 'px; }';
			}

			if ( ! empty( $ruby_single_post_title_font_size ) ) {
				$str .= '.post-title.single-title { font-size :' . $ruby_single_post_title_font_size . 'px; }';
			}

			if ( ! empty( $ruby_post_excerpt_font_size ) ) {
				$str .= '.post-excerpt, .entry.post-excerpt { font-size :' . $ruby_post_excerpt_font_size . 'px; }';
			}


			/***************************COPYRIGHT BACKGROUND*******************************/
			$ruby_copyright_background_color = innovation_ruby_util::get_theme_option( 'site_copyright_bg_color' );
			if ( ! empty( $ruby_copyright_background_color ) ) {
				$str .= '#footer-copyright.is-background-color';
				$str .= '{ background-color: ' . $ruby_copyright_background_color . ';}';
			}


			/***************************WOOCOMMERCE COLOR*******************************/

			if ( class_exists( 'Woocommerce' ) ) {
				$ruby_woocommerce_color = innovation_ruby_util::get_theme_option( 'innovation_ruby_woocommerce_color' );
				if ( ! empty( $ruby_woocommerce_color ) ) {
					$str .= '.woocommerce ul.products li.product .star-rating,.woocommerce .star-rating, .comment-form-rating .stars';
					$str .= '{ color :' . $ruby_woocommerce_color . ' !important;}';

					$str .= '.woocommerce span.onsale, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,';
					$str .= '.woocommerce a.added_to_cart, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button:focus,';
					$str .= '.woocommerce #payment #place_order:hover, .woocommerce-page #payment #place_order:hover, .woocommerce #payment #place_order:focus, .woocommerce-page #payment #place_order:focus';
					$str .= '{ background-color :' . $ruby_woocommerce_color . ' !important;}';
				} else {
					if ( ! empty( $ruby_main_site_color ) ) {
						$str .= '.woocommerce ul.products li.product .star-rating,.woocommerce .star-rating, .comment-form-rating .stars';
						$str .= '{ color :' . $ruby_main_site_color . ' !important;}';

						$str .= '.woocommerce span.onsale, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,';
						$str .= '.woocommerce a.added_to_cart, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button:focus';
						$str .= '{ background-color :' . $ruby_main_site_color . ' !important;}';
					}
				}
			}


			/***************************COLOR BAR CSS*******************************/
			$ruby_composer_pages = get_pages( array(
				'meta_key'   => '_wp_page_template',
				'meta_value' => 'page-composer.php'
			) );

			if ( is_array( $ruby_composer_pages ) && ! empty( $ruby_composer_pages ) ) {
				foreach ( $ruby_composer_pages as $ruby_composer_page ) {
					$page_id = $ruby_composer_page->ID;

					$ruby_page_composer_data = innovation_ruby_composer_action::get_composer_data( $page_id );
					if ( ! empty( $ruby_page_composer_data ) && is_array( $ruby_page_composer_data ) ) {
						foreach ( $ruby_page_composer_data as $ruby_section ) {
							if ( ! empty( $ruby_section['blocks'] ) && is_array( $ruby_section['blocks'] ) ) {
								foreach ( $ruby_section['blocks'] as $block_id => $block ) {
									if ( ! empty( $block['block_options']['color'] ) && '#242424' != $block['block_options']['color'] ) {
										$str .= '[id="' . $block_id . '"] .block-title';
										$str .= '{ border-color : ' . esc_attr( $block['block_options']['color'] ) . ';}';
										$str .= '[id="' . $block_id . '"] .block-title h3';
										$str .= '{ background-color : ' . esc_attr( $block['block_options']['color'] ) . ';}';
									}
								}
							}
						}
					}
				}
			}


			/************************USER CUSTOM CSS**********************************/
			$ruby_custom_css = innovation_ruby_util::get_theme_option( 'custom_css' );

			if ( ! empty( $ruby_custom_css ) ) {
				$str .= $ruby_custom_css;
			}

			//save to database
			$cache = addslashes( $str );
			delete_option( 'innovation_ruby_dynamic_style_cache' );
			add_option( 'innovation_ruby_dynamic_style_cache', $cache );

			wp_add_inline_style( 'look_ruby_responsive_style', $str );

		} else {
			$str = stripslashes( $cache );
		}

		wp_add_inline_style( 'innovation-ruby-responsive-style', $str );
	}
}


if ( ! is_admin() ) {
	add_action( 'wp_enqueue_scripts', 'innovation_ruby_dynamic_css', 99 );
}

if ( ! function_exists( 'innovation_ruby_delete_dynamic_css_cache' ) ) {
	function innovation_ruby_delete_dynamic_css_cache() {
		delete_option( 'innovation_ruby_dynamic_style_cache' );
	}
}

// delete css cache
add_action( 'redux/options/innovation_ruby_theme_options/saved', 'innovation_ruby_delete_dynamic_css_cache' );
add_action( 'redux/options/innovation_ruby_theme_options/reset', 'innovation_ruby_delete_dynamic_css_cache' );
add_action( 'redux/options/innovation_ruby_theme_options/section/reset', 'innovation_ruby_delete_dynamic_css_cache' );
add_action( 'save_post', 'innovation_ruby_delete_dynamic_css_cache' );