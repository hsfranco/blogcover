<?php
/**
 * Class innovation_ruby_template_parts
 * This file render some part template for theme
 */

if ( ! class_exists( 'innovation_ruby_single_layout' ) ) {
	class innovation_ruby_single_layout {

		/**
		 * @param string $class
		 * @param bool   $review
		 * render open single tag
		 */
		static function open_single_wrap( $class = '', $review = false ) {

			if ( false === $review ) {
				echo '<article class="' . implode( ' ', get_post_class( $class ) ) . '" ' . innovation_ruby_schema::makeup( 'article', false ) . '>';
			} else {
				echo '<article class="' . implode( ' ', get_post_class( $class ) ) . '" ' . innovation_ruby_schema::makeup( 'review', false ) . '>';
			}
		}


		/**
		 * render close single tag
		 */
		static function close_single_wrap() {
			echo '</article><!--#single post wrap -->';
		}

		/**
		 * render single post title
		 */
		static function single_post_title() {
			echo '<div class="post-title single-title entry-title">';
			echo '<h1>';
			the_title();
			echo '</h1>';
			echo '</div><!--#single title -->';
		}


		/**
		 * render single tag bar
		 */
		static function single_post_meta_info() {
			$enable_tag = innovation_ruby_util::get_theme_option( 'single_post_meta_info_manager' );
			//render
			innovation_ruby_template_part::post_meta_info( $enable_tag['enabled'], false );
		}


		/**
		 * @param string $class
		 * render single header
		 */
		static function open_single_header( $class = '' ) {
			echo '<div class="single-header ' . $class . '">';
		}


		/**
		 * close single header
		 */
		static function close_single_header() {
			echo '</div><!--#single header -->';
		}


		/**
		 * @param bool $disable_makeup
		 * render single sidebar
		 */
		static function single_sidebar( $disable_makeup = false ) {

			//check
			$sidebar_position = innovation_ruby_single::get_sidebar_position();
			if ( 'none' == $sidebar_position ) {
				return false;
			}

			$all_sidebar = innovation_ruby_theme_config::sidebar_name( true );

			//single sidebar name
			$sidebar_name = get_post_meta( get_the_ID(), 'innovation_ruby_sidebar_name', true );
			if ( ! array_key_exists( $sidebar_name, $all_sidebar ) ) {
				$sidebar_name = 'innovation_ruby_default_from_theme_options';
			}

			if ( 'innovation_ruby_default_from_theme_options' == $sidebar_name || empty( $sidebar_name ) ) {
				$sidebar_name = innovation_ruby_util::get_theme_option( 'default_single_post_sidebar' );
			}

			if ( empty( $sidebar_name ) ) {
				$sidebar_name = 'innovation_ruby_sidebar_default';
			}

			//render
			innovation_ruby_template_part::sidebar( $sidebar_name, $disable_makeup );
		}


		/**
		 * render single schema makeup
		 */
		static function single_schema_makeup() {
			if ( ! is_single() ) {
				return false;
			};

			$ruby_http = 'http';
			if ( is_ssl() ) {
				$ruby_http = 'https';
			}

			$ruby_publisher = get_bloginfo( 'name' );
			if ( ! empty( $ruby_publisher ) ) {
				$ruby_publisher = get_the_author_meta( 'display_name' );
			}

			//publisher logo
			$ruby_logo = innovation_ruby_util::get_theme_option( 'header_first_site_logo' );
			if ( empty( $ruby_logo['url'] ) ) {
				$ruby_logo = innovation_ruby_util::get_theme_option( 'header_second_site_logo' );
				if ( ! empty( $ruby_logo['url'] ) ) {
					$ruby_publisher_logo = esc_url( $ruby_logo['url'] );
				}
			} else {
				$ruby_publisher_logo = esc_url( $ruby_logo['url'] );
			}

			$ruby_post_date   = get_the_time( 'U' );
			$ruby_post_update = get_the_modified_time( 'U' );

			$ruby_full_image_attachment = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );

			$str = '';
			$str .= '<meta itemscope itemprop="mainEntityOfPage" itemType="' . $ruby_http . '://schema.org/WebPage" itemid="' . get_permalink() . '"/>';

			//headline
			$str .= '<meta itemprop="headline" content="' . esc_attr( strip_tags( get_the_title() ) ) . '">';

			//author
			$str .= '<span style="display: none;" itemprop="author" itemscope itemtype="' . $ruby_http . '://schema.org/Person">';
			$str .= '<meta itemprop="name" content="' . esc_attr( get_the_author_meta( 'display_name' ) ) . '">';
			$str .= '</span>';

			//image
			$str .= '<span style="display: none;" itemprop="image" itemscope itemtype="' . $ruby_http . '://schema.org/ImageObject">';
			$str .= '<meta itemprop="url" content="' . $ruby_full_image_attachment[0] . '">';
			$str .= '<meta itemprop="width" content="' . $ruby_full_image_attachment[1] . '">';
			$str .= '<meta itemprop="height" content="' . $ruby_full_image_attachment[2] . '">';
			$str .= '</span>';

			//publisher
			$str .= '<span style="display: none;" itemprop="publisher" itemscope itemtype="' . $ruby_http . '://schema.org/Organization">';
			$str .= '<span style="display: none;" itemprop="logo" itemscope itemtype="' . $ruby_http . '://schema.org/ImageObject">';
			if ( ! empty( $ruby_publisher_logo ) ) {
				$str .= '<meta itemprop="url" content="' . $ruby_publisher_logo . '">';
			}
			$str .= '</span>';
			$str .= '<meta itemprop="name" content="' . $ruby_publisher . '">';
			$str .= '</span>';

			$str .= '<meta itemprop="datePublished" content="' . date( DATE_W3C, $ruby_post_date ) . '"/>';
			$str .= '<meta itemprop="dateModified" content="' . date( DATE_W3C, $ruby_post_update ) . '"/>';

			//review
			$ruby_enable_review = innovation_ruby_post_review::has_review();
			if ( ! empty( $ruby_enable_review ) ) {
				$ruby_as             = get_post_meta( get_the_ID(), 'innovation_ruby_as', true );
				$ruby_review_summary = get_post_meta( get_the_ID(), 'innovation_ruby_review_summary', true );

				$str .= '<span itemprop="itemReviewed" itemscope itemtype="' . $ruby_http . '://schema.org/Thing">';
				$str .= '<meta itemprop="name " content = "' . esc_attr( strip_tags( get_the_title() ) ) . '">';
				$str .= '</span>';

				$str .= '<meta itemprop="reviewBody" content = "' . esc_attr( strip_tags( $ruby_review_summary ) ) . '">';

				//ratting
				$str .= '<span style="display: none;" itemprop="reviewRating" itemscope itemtype="' . $ruby_http . '://schema.org/Rating">';
				$str .= '<meta itemprop="worstRating" content = "1">';
				$str .= '<meta itemprop="bestRating" content = "10">';
				$str .= '<meta itemprop="ratingValue" content = "' . $ruby_as . '">';
				$str .= '</span>';

			}

			echo html_entity_decode( $str );

		}
	}
}