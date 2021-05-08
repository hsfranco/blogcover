<?php
/**
 * Class innovation_ruby_template_parts
 * This file render some part template for theme
 */

if ( ! class_exists( 'innovation_ruby_template_part' ) ) {
	class innovation_ruby_template_part {

		/**
		 * render archive title
		 */
		static function archive_title() {

			if ( is_category() ) :
				return single_cat_title( '', false );
			elseif ( is_tag() ) :
				return single_tag_title( '', false );
			elseif ( is_author() ) :
				return get_the_author();
			elseif ( is_day() ) :
				return get_the_date();
			elseif ( is_month() ) :
				return get_the_date( 'F Y' );
			elseif ( is_year() ) :
				return get_the_date( 'Y' );
			elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
				return esc_html__( 'Asides', 'innovation' );
			elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
				return esc_html__( 'Galleries', 'innovation' );
			elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
				return esc_html__( 'Images', 'innovation' );
			elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
				return esc_html__( 'Videos', 'innovation' );
			elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
				return esc_html__( 'Quotes', 'innovation' );
			elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
				return esc_html__( 'Links', 'innovation' );
			elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
				return esc_html__( 'Statuses', 'innovation' );
			elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
				return esc_html__( 'Audios', 'innovation' );
			elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
				return esc_html__( 'Chats', 'innovation' );
			else :
				return esc_html__( 'Archives', 'innovation' );
			endif;
		}


		/**
		 * @param array $override
		 * @param bool  $primary
		 * render post meta information bar
		 */
		static function post_meta_info( $override = array(), $primary = true ) {
			$post_meta_info_manager = innovation_ruby_util::get_theme_option( 'post_meta_info_manager' );

			// override default setting
			if ( ! empty( $override ) ) {
				$post_meta_info_manager['enabled'] = $override;
			}

			if ( ! empty( $post_meta_info_manager['enabled']['placebo'] ) ) {
				unset ( $post_meta_info_manager['enabled']['placebo'] );
			}

			// check
			if ( empty( $post_meta_info_manager['enabled'] ) || ! is_array( $post_meta_info_manager['enabled'] ) ) {
				return false;
			}

			// create wrap class
			$ruby_classes   = array();
			$ruby_classes[] = 'post-meta-info';
			$ruby_classes   = implode( ' ', $ruby_classes );

			// render
			echo '<div class="' . esc_attr( $ruby_classes ) . '">';
			foreach ( $post_meta_info_manager['enabled'] as $key => $val ) {
				switch ( $key ) {
					case 'date' :
						get_template_part( 'templates/meta/el', 'date' );
						break;
					case 'author' :
						get_template_part( 'templates/meta/el', 'author' );
						break;
					case 'cate' :
						innovation_ruby_meta_el_cat( $primary );
						break;
					case 'tag' :
						get_template_part( 'templates/meta/el', 'tag' );
						break;
					case 'view' :
						get_template_part( 'templates/meta/el', 'view' );
						break;
					case 'comment' :
						get_template_part( 'templates/meta/el', 'comment' );
						break;
				};
			}
			echo '</div><!--#meta info bar-->';

		}

		/**
		 * @param string $class
		 * render post title
		 */
		static function post_title( $classes = 'is-medium-title' ) {

			// render
			echo '<h3 class="post-title ' . esc_attr( $classes ) . '">';
			echo '<a href="' . get_permalink() . '" rel="bookmark" title="' . esc_attr( strip_tags( get_the_title() ) ) . '">';
			the_title();
			echo '</a></h3><!--#post title-->';
		}


		/**
		 * @param string $position
		 * @param string $style
		 * @param bool   $primary
		 * render display category info bar
		 */
		static function post_cate_info( $position = 'is-absolute', $style = 'is-light-text', $primary = true ) {

			// check
			$category_bar = innovation_ruby_util::get_theme_option( 'category_bar' );


			if ( empty( $category_bar ) ) {
				return false;
			}

			$ruby_categories = get_the_category();
			if ( empty( $ruby_categories ) ) {
				return false;
			}

			$ruby_primary_category = get_post_meta( get_the_ID(), 'innovation_ruby_single_primary_category', true );
			$category_bar_style    = innovation_ruby_util::get_theme_option( 'category_bar_style' );
			if ( empty( $category_bar_style ) ) {
				$category_bar_style = 1;
			}

			// create class
			$ruby_classes   = array();
			$ruby_classes[] = 'post-cate-info';
			$ruby_classes[] = $style;
			$ruby_classes[] = $position;
			$ruby_classes[] = 'cate-info-style-' . esc_attr( $category_bar_style );

			$ruby_classes = implode( ' ', $ruby_classes );

			// render
			echo '<div class="' . esc_attr( $ruby_classes ) . '">';

			if ( empty( $ruby_primary_category ) || false === $primary ) {

				if ( ! empty( $ruby_categories ) && array( $ruby_categories ) ) {
					foreach ( $ruby_categories as $ruby_category ) {

						$ruby_classes  = 'cate-info-el is-cate-' . $ruby_category->term_id;
						$category_name = $ruby_category->name;

						echo '<a class="' . esc_attr( $ruby_classes ) . '" href="' . get_category_link( $ruby_category->term_id ) . '" title="' . esc_attr( $ruby_category->name ) . '">';
						echo esc_html( $category_name );
						echo '</a>';
					}
				}
			} else {

				$ruby_primary_category_name = get_cat_name( $ruby_primary_category );
				$ruby_classes               = 'cate-info-el is-cate-' . $ruby_primary_category;

				echo '<a class="' . esc_attr( $ruby_classes ) . '" href="' . get_category_link( $ruby_primary_category ) . '" title="' . esc_attr( $ruby_primary_category_name ) . '">';
				echo esc_attr( $ruby_primary_category_name );
				echo '</a>';

			};

			echo '</div><!--post cate info-->';

		}

		/**
		 * @param string $position
		 * @param string $style
		 * post review information
		 */
		static function post_review_info( $position = 'is-absolute', $style = 'is-light-text' ) {

			// check and return
			$ruby_enable_review_icon = innovation_ruby_util::get_theme_option( 'review_score_icon' );
			if ( false === innovation_ruby_post_review::has_review() || empty( $ruby_enable_review_icon ) ) {
				return false;
			};

			$ruby_total_score        = get_post_meta( get_the_ID(), 'innovation_ruby_as', true );
			$ruby_review_score_intro = innovation_ruby_util::get_theme_option( 'review_score_intro' );

			$ruby_classes   = array();
			$ruby_classes[] = 'post-review-info';
			$ruby_classes[] = $position;
			$ruby_classes[] = $style;

			$ruby_classes = implode( ' ', $ruby_classes );

			echo '<div class="' . $ruby_classes . '">';
			echo '<a href="' . get_permalink() . '" title="' . esc_attr( get_the_title() ) . '">';
			echo '<span class="review-info-score">' . esc_html( $ruby_total_score ) . '</span>';
			if ( ! empty( $ruby_review_score_intro ) ) {
				echo '<span class="review-info-intro">' . innovation_ruby_post_review::render_intro( $ruby_total_score ) . '</span>';
			}
			echo '</a>';
			echo '</div><!--#post review info-->';
		}


		/**
		 * @param string $position
		 * @param string $style
		 * render social share bar
		 */
		static function post_share_bar( $position = 'is-relative', $style = 'is-dark-text' ) {

			$ruby_enable_post_share_bar = innovation_ruby_util::get_theme_option( 'post_share_bar' );
			// check * return
			if ( empty( $ruby_enable_post_share_bar ) ) {
				return false;
			}

			$ruby_classes   = array();
			$ruby_classes[] = 'post-share-bar';
			$ruby_classes[] = $position;
			$ruby_classes[] = $style;

			$ruby_categories = get_the_category();
			if ( ! empty( $ruby_categories[0]->term_id ) ) {
				$ruby_classes[] = 'is-cate-' . $ruby_categories[0]->term_id;
			};

			$ruby_classes = implode( ' ', $ruby_classes );

			$ruby_right_share_bar = innovation_ruby_util::get_theme_option( 'right_social_bar_el' );

			echo '<div class="' . esc_attr( $ruby_classes ) . '">';
			if ( class_exists( 'innovation_ruby_social_share_post' ) ) {
				echo '<span class="share-bar-decs">';
				echo esc_html__( 'share', 'innovation' );
				echo '</span>';
				echo innovation_ruby_social_share_post::render_post_share_bar();
			}
			echo '<div class="share-bar-right">';
			if ( 'comment' == $ruby_right_share_bar ) {
				get_template_part( 'templates/meta/el', 'share_bar_comment' );
			} elseif ( 'view' == $ruby_right_share_bar ) {
				get_template_part( 'templates/meta/el', 'share_bar_view' );
			}
			echo '</div>';
			echo '</div>';

		}


		/**
		 * @param      $excerpt_length
		 * @param bool $display_short_code
		 * excerpt
		 */
		static function excerpt( $excerpt_length, $display_short_code = false ) {

			// check
			if ( empty( $excerpt_length ) ) {
				return false;
			}

			// render
			global $post;

			if ( ! empty( $post->post_excerpt ) ) {
				echo '<div class="post-excerpt">' . $post->post_excerpt . '</div><!--#entry-->';
			} else {
				$post_content = $post->post_content;
				if ( ! $display_short_code ) {
					$post_content = preg_replace( '`\[[^\]]*\]`', '', $post->post_content );
				}
				$post_content = stripslashes( wp_filter_nohtml_kses( $post_content ) );

				echo '<div class="post-excerpt">' . wp_trim_words( $post_content, $excerpt_length, '' ) . '</div><!--#entry-->';
			}
		}


		/**
		 * @param string $ruby_classes
		 * render read more button
		 */
		static function read_more( $ruby_classes = 'is-medium-btn' ) {

			// check option
			$read_more_text = innovation_ruby_util::get_theme_option( 'site_readmore_text' );
			if ( empty( $read_more_text ) ) {
				return false;
			}

			// create wrap class
			$class   = array();
			$class[] = 'post-btn';
			$class[] = esc_attr( $ruby_classes );
			$class   = implode( ' ', $class );

			// render
			echo '<div class="' . esc_attr( $class ) . '">';
			echo '<a class="btn" href="' . get_permalink() . '" rel="bookmark" title="' . esc_attr( get_the_title() ) . '">';
			echo esc_html( $read_more_text );
			echo '</a>';
			echo '</div><!--#read more button -->';

		}


		/**
		 * render page pagination as html
		 */
		static function pagination() {

			$ruby_pagination_style = innovation_ruby_util::get_theme_option( 'page_pagination_style' );

			// check search page
			if ( is_search() || ( is_archive() && ! is_category() ) ) {
				$ruby_pagination_style = 'standard';
			}

			switch ( $ruby_pagination_style ) {
				case 'load_more' :
					self::pagination_load_more();
					break;
				case 'infinite_scroll' :
					self::pagination_infinite_scroll();
					break;
				default :
					self::pagination_standard();
					break;
			}
		}


		/**
		 * @param null $custom_query
		 * @param bool $echo
		 *
		 * @return string
		 * render pagination standard
		 */
		static function pagination_standard( $custom_query = null, $echo = true ) {
			global $wp_query, $wp_rewrite;

			if ( ! empty( $custom_query ) ) {
				$ruby_query = $custom_query;
			} else {
				$ruby_query = $wp_query;
			}

			if ( is_single() || ( $ruby_query->max_num_pages < 2 ) ) {
				return false;
			}

			$ruby_enable_simple_pagination = innovation_ruby_util::get_theme_option( 'simple_page_pagination' );


			// render pagination
			$str = '';
			$str .= '<div class="ruby-overflow"></div><!--#ruby overflow-->';
			$str .= '<div class="pagination-wrap clearfix">';
			if ( empty( $ruby_enable_simple_pagination ) ) {
				$str .= '<div class="pagination-num">';
				$ruby_query->query_vars['paged'] > 1 ? $current = $ruby_query->query_vars['paged'] : $current = 1;
				$pagination = array(
					'base'      => @add_query_arg( 'paged', '%#%' ),
					'format'    => '',
					'total'     => $ruby_query->max_num_pages,
					'current'   => $current,
					'prev_text' => '<i class="fa fa-angle-double-left"></i>',
					'next_text' => '<i class="fa fa-angle-double-right"></i>',
					'type'      => 'plain'
				);
				if ( $wp_rewrite->using_permalinks() ) {
					$pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );
				}
				if ( ! empty( $ruby_query->query_vars['s'] ) ) {
					$pagination['add_args'] = array( 's' => urlencode( get_query_var( 's' ) ) );
				}
				$str .= paginate_links( $pagination );
				$str .= '</div><!--#pagination number-->';
				$str .= '<div class="pagination-text"><span>' . esc_html__( 'Page', 'innovation' ) . ' ' . $pagination['current'] . esc_html__( ' of ', 'innovation' ) . $pagination['total'] . '</span></div><!--#pagination text-->';

			} else {
				$str .= '<div class="older">' . get_next_posts_link( esc_attr__( 'Older Posts', 'innovation' ) . '<i class="fa fa-angle-double-right"></i>', $ruby_query->max_num_pages ) . '</div>';
				$str .= '<div class="newer">' . get_previous_posts_link( '<i class="fa fa-angle-double-left"></i>' . esc_attr__( 'Newer Posts', 'innovation' ), $ruby_query->max_num_pages ) . '</div>';

			}
			$str .= '</div><!--#pagination-wrap-->';

			if ( true === $echo ) {
				echo html_entity_decode( $str );
			} else {
				return $str;
			}
		}


		/**
		 * render pagination load more
		 */
		static function pagination_load_more() {
			// render pagination
			$str = '';
			$str .= '<div class="ruby-overflow"></div><!--#ruby overflow-->';
			$str .= '<div class="pagination-wrap pagination-load-more clearfix">';
			$str .= '<a href="#" class="btn-load-more">';
			$str .= '<span>' . esc_attr__( 'load more', 'innovation' ) . '</span>';
			$str .= '</a>';
			$str .= '<div class="load-more-animation"><span class="loading-icon"></span></div>';
			$str .= '</div><!--#pagination-wrap-->';

			echo html_entity_decode( $str );
		}


		/**
		 * render pagination infinite load
		 */
		static function pagination_infinite_scroll() {
			// render pagination
			$str = '';
			$str .= '<div class="ruby-overflow"></div><!--#ruby overflow-->';
			$str .= '<div class="pagination-wrap pagination-infinite-scroll clearfix">';
			$str .= '<div class="load-more-animation"><span class="loading-icon"></span></div>';
			$str .= '</div><!--#pagination-wrap-->';

			echo html_entity_decode( $str );
		}


		/**
		 * @param $blog_layout
		 * @param $big_first
		 *
		 * @return string
		 * render ajax holder data
		 */
		static function render_ajax_data_params( $blog_layout, $big_first ) {

			// check & return
			if ( empty( $blog_layout ) || is_singular() ) {
				return false;
			}

			$pagination_type = innovation_ruby_util::get_theme_option( 'page_pagination_style' );
			if ( 'standard' == $pagination_type ) {
				return false;
			}

			$str         = '';
			$ruby_params = array();

			global $wp_query;

			if ( get_query_var( 'paged' ) ) {
				$paged = get_query_var( 'paged' );
			} elseif ( get_query_var( 'page' ) ) {
				$paged = get_query_var( 'page' );
			} else {
				$paged = 1;
			}

			$ruby_params['data-post-num']    = get_option( 'posts_per_page' );
			$ruby_params['data-page-max']    = $wp_query->max_num_pages;
			$ruby_params['data-page-next']   = $paged + 1;
			$ruby_params['data-blog-layout'] = $blog_layout;

			if ( ! empty( $big_first ) ) {
				$ruby_params['data-big-first'] = 1;
			} else {
				$ruby_params['data-big-first'] = 0;
			}

			if ( is_category() ) {
				$ruby_params['data-cate-id'] = innovation_ruby_util::get_page_cate_id();
			} else {
				$ruby_params['data-cate-id'] = 0;
			}

			// foreach
			foreach ( $ruby_params as $k => $v ) {
				if ( ! empty( $k ) ) {
					$str .= esc_attr( $k ) . '= ' . esc_attr( $v ) . ' ';
				}
			}

			return $str;

		}


		/**
		 * @param string $classes
		 * @param string $sidebar_position
		 * @param bool   $disable_wrapper
		 * open page wrap
		 */
		static function open_page_wrap( $classes = '', $sidebar_position = '', $disable_wrapper = false ) {

			// create wrap class
			$ruby_classes   = array();
			$ruby_classes[] = 'ruby-page-wrap ruby-section row';
			$ruby_classes[] = esc_attr( $classes );
			$ruby_classes[] = 'is-sidebar-' . esc_attr( $sidebar_position );
			if ( false === $disable_wrapper ) {
				$ruby_classes[] = 'ruby-container';
			}
			$ruby_classes = implode( ' ', $ruby_classes );

			// render
			echo '<div class="' . esc_attr( $ruby_classes ) . '">';

		}


		/**
		 * @param string $classes
		 * @param string $sidebar_position
		 * @param string $blog_layout
		 * @param bool   $big_first
		 * open page inner
		 */
		static function open_page_inner( $classes = '', $sidebar_position = '', $blog_layout = '', $big_first = false ) {

			// create wrap class
			$ruby_classes   = array();
			$ruby_classes[] = 'ruby-content-wrap';
			$ruby_classes[] = esc_attr( $classes );
			if ( 'none' == $sidebar_position ) {
				$ruby_classes[] = 'content-without-sidebar col-xs-12';
			} else {
				$ruby_classes[] = 'col-md-8 col-sm-12 content-with-sidebar';
			};

			$ajax_params = self::render_ajax_data_params( $blog_layout, $big_first );
			if ( ! empty( $ajax_params ) ) {
				$ruby_classes[] = 'ruby-pagination-ajax';
			}
			$ruby_classes = implode( ' ', $ruby_classes );

			// render
			echo '<div class="' . esc_attr( $ruby_classes ) . '" ' . esc_html( $ajax_params ) . '>';
		}

		/**
		 * @return string
		 * open content inner
		 */
		static function open_ajax_wrap() {
			echo '<div class="ruby-ajax-wrap">';
		}

		/**
		 * @return string
		 * open content inner
		 */
		static function open_content_inner() {
			echo '<div class="row ruby-content-inner">';
		}


		/**
		 * close page inner
		 */
		static function close_page_inner() {
			echo '</div><!--#page inner-->';
		}


		/**
		 * close page wrap
		 */
		static function close_page_wrap() {
			echo '</div><!--#page wrap-->';
		}


		/**
		 * close content inner
		 */
		static function close_content_inner() {
			echo '</div><!--#content inner-->';
		}

		/**
		 * close page inner
		 */
		static function close_ajax_wrap() {
			echo '</div><!--#blog ajax wrap-->';
		}


		/**
		 * @param      $name
		 * @param bool $disable_makeup
		 * render sidebar
		 */
		static function sidebar( $name, $disable_makeup = false ) {

			// sticky config
			$sticky = innovation_ruby_util::get_theme_option( 'sticky_sidebar' );

			if ( empty( $name ) ) {
				$name = 'innovation_ruby_sidebar_default';
			}

			// makeup
			if ( false === $disable_makeup ) {
				$makeup = innovation_ruby_schema::makeup( 'sidebar', false );
			} else {
				$makeup = '';
			}

			$class_name = 'sidebar-wrap col-md-4 col-sm-12 clearfix';
			if ( ! empty( $sticky ) ) {
				$class_name = 'sidebar-wrap col-md-4 col-sm-12 clearfix ruby-sidebar-sticky';
			}

			echo '<div id="sidebar" class="' . $class_name . '" ' . $makeup . '>';
			echo '<div class="sidebar-inner">';
			if ( is_active_sidebar( $name ) ) {
				dynamic_sidebar( $name );
			}
			echo '</div><!--#sidebar inner-->';
			echo '</div><!--#close sidebar -->';
		}


		/**
		 * @param string $class
		 *
		 * @return string
		 * render divider
		 */
		static function render_divider( $classes = '' ) {
			echo '<div class="' . esc_attr( $classes ) . ' is-divider"></div><!--#divider-->';
		}
	}
}