<?php
if ( ! class_exists( 'innovation_ruby_template_composer_loop' ) ) {
	class innovation_ruby_template_composer_loop {

		static function render() {

			global $paged;
			$post_id    = get_the_ID();
			$ruby_paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
			$ruby_page  = get_query_var( 'page' ) ? get_query_var( 'page' ) : 1;

			//get settings
			$ruby_composer_latest_title            = get_post_meta( $post_id, 'innovation_ruby_composer_latest_title', true );
			$ruby_composer_latest_layout           = get_post_meta( $post_id, 'innovation_ruby_composer_latest_layout', true );
			$ruby_composer_big_first               = get_post_meta( $post_id, 'innovation_ruby_composer_big_first', true );
			$ruby_composer_latest_number           = get_post_meta( $post_id, 'innovation_ruby_composer_latest_number', true );
			$ruby_composer_latest_sidebar          = get_post_meta( $post_id, 'innovation_ruby_composer_latest_sidebar', true );
			$ruby_composer_latest_sidebar_position = get_post_meta( $post_id, 'innovation_ruby_composer_latest_sidebar_position', true );

			if ( ! empty( $ruby_composer_big_first ) ) {
				$ruby_composer_big_first = true;
			} else {
				$ruby_composer_big_first = false;
			}

			if ( $ruby_paged > $ruby_page ) {
				$paged = $ruby_paged;
			} else {
				$paged = $ruby_page;
			}

			if ( empty( $ruby_composer_latest_layout ) ) {
				$ruby_composer_latest_layout = 'layout_classic';
			}

			if ( empty( $ruby_composer_latest_number ) ) {
				$ruby_composer_latest_number = get_option( 'posts_per_page' );
			}

			if ( empty( $ruby_composer_latest_sidebar ) ) {
				$ruby_composer_latest_sidebar = 'innovation_ruby_sidebar_default';
			}


			if ( empty( $ruby_composer_latest_sidebar_position ) ) {
				$ruby_composer_latest_sidebar_position = 'right';
			}

			$block_classes = '';
			switch ( $ruby_composer_latest_layout ) {
				case 'grid-layout' :
					$block_classes = 'ruby-block-wrap block-composer-latest-blog block-post-4 gird-layout';
					break;
				case 'list-layout' :
					$block_classes = 'ruby-block-wrap block-composer-latest-blog block-post-5 list-layout';
					break;
				case 'sgrid-layout' :
					$block_classes = 'ruby-block-wrap block-composer-latest-blog block-post-4 sgrid-layout';
					break;
				case 'classic-layout' :
					$block_classes = 'ruby-block-wrap block-composer-latest-blog block-post-7 gird-layout';
					break;
			}

			//query data
			$ruby_args  = array(
				'posts_per_page' => $ruby_composer_latest_number,
				'no_found_rows'  => false,
			);
			$query_data = innovation_ruby_query::get_custom_query( $ruby_args, $paged );


			//render
			$str = '';
			$str .= innovation_ruby_composer_render::open_section_hs( 'ruby-composer-latest-blog', $ruby_composer_latest_sidebar_position );
			$str .= innovation_ruby_composer_render::open_section_hs_content( $ruby_composer_latest_sidebar_position );

			$str .= '<div class="' . esc_attr( $block_classes ) . '">';
			$str .= '<div class="ruby-block-inner">';

			//block title
			if ( ! empty( $ruby_composer_latest_title ) ) {
				$str .= self::render_block_title( $ruby_composer_latest_title );
			}

			//blog content
			if ( true == $ruby_composer_big_first ) {
				$str .= innovation_ruby_block::open_block_content( 'row is-big-first' );
			} else {
				$str .= innovation_ruby_block::open_block_content( 'row' );
			}

			if ( $query_data->have_posts() ) {

				switch ( $ruby_composer_latest_layout ) {
					case 'grid-layout':
						$str .= self::render_layout_grid( $query_data, $ruby_composer_big_first );
						break;
					case 'list-layout' :
						$str .= self::render_layout_list( $query_data, $ruby_composer_big_first );
						break;
					case 'sgrid-layout' :
						$str .= self::render_layout_sgrid( $query_data, $ruby_composer_big_first );
						break;
					case 'classic-layout':
						$str .= self::render_layout_classic( $query_data );
						break;
				}
			}

			$str .= innovation_ruby_template_part::pagination_standard( $query_data, false );

			$str .= '</div><!--#block content-->';
			$str .= '</div><!--#block inner-->';
			$str .= '</div><!--#block wrap-->';

			//reset post data
			wp_reset_postdata();

			$str .= innovation_ruby_composer_render::close_section_hs_content();

			//render sidebar
			$str .= innovation_ruby_composer_render::open_sidebar();
			$str .= innovation_ruby_composer_render::render_sidebar( $ruby_composer_latest_sidebar );
			$str .= innovation_ruby_composer_render::close_sidebar();

			//close section
			$str .= innovation_ruby_composer_render::close_section_hs();

			return $str;

		}


		/**
		 * @param string $block_title
		 *
		 * @return string
		 * render header
		 */
		static function render_block_title( $block_title = '' ) {
			$str = '';
			$str .= '<div class="block-header-wrap">';
			$str .= '<div class="block-header-inner">';
			$str .= '<div class="block-title"><h3>' . esc_html( $block_title ) . '</h3></div>';
			$str .= '</div>';
			$str .= '</div>';

			return $str;
		}


		/**
		 * @param $query_data
		 * @param $big_first
		 * render grid layout
		 */
		static function render_layout_grid( $query_data, $big_first ) {

			$ruby_flag    = true;
			$ruby_counter = 1;

			//render layout
			ob_start();

			if ( false === $big_first ) {
				innovation_ruby_template_part::open_content_inner();
			}

			while ( $query_data->have_posts() ) {
				$query_data->the_post();

				if ( ( true === $ruby_flag ) && ( true === $big_first ) ) {

					echo '<div class="first-post-wrap col-sx-12">';
					get_template_part( 'templates/loop', 'classic' );
					echo '</div>';

					innovation_ruby_template_part::open_content_inner();

					$ruby_flag = false;
					continue;
				}

				//render block
				echo '<div class="post-grid-outer col-sm-6 col-xs-12">';
				get_template_part( 'templates/loop', 'grid' );
				echo '</div><!--#grid outer-->';

				if ( 0 == $ruby_counter % 2 ) {
					innovation_ruby_template_part::render_divider( 'post-grid-outer' );
				}

				$ruby_counter ++;
			}

			innovation_ruby_template_part::close_content_inner();

			return ob_get_clean();
		}


		/**
		 * @param $query_data
		 * @param $big_first
		 *
		 * @return string
		 * render layout list
		 */
		static function render_layout_list( $query_data, $big_first ) {

			$ruby_flag = true;
			ob_start();

			?>
			<?php while ( $query_data->have_posts() ) : ?>
				<?php $query_data->the_post();
				//render first post
				if ( ( true === $ruby_flag ) && ( ! empty( $big_first ) ) ) {

					echo '<div class="first-post-wrap col-sx-12">';
					get_template_part( 'templates/loop', 'classic' );
					echo '</div>';
					$ruby_flag = false;
					continue;
				}

				//render block
				get_template_part( 'templates/loop', 'list' );
				?>

			<?php endwhile; ?>

			<?php

			return ob_get_clean();

		}


		/**
		 * @param $query_data
		 * @param $big_first
		 *
		 * @return string
		 * render layout small grid
		 */
		static function render_layout_sgrid( $query_data, $big_first ) {

			$ruby_flag    = true;
			$ruby_counter = 1;

			ob_start();

			if ( false === $big_first ) {
				innovation_ruby_template_part::open_content_inner();
			}
			?>

			<?php while ( $query_data->have_posts() ) : ?>
				<?php $query_data->the_post();
				//render first post
				if ( ( true === $ruby_flag ) && ( true === $big_first ) ) {
					echo '<div class="first-post-wrap col-sx-12">';
					get_template_part( 'templates/loop', 'classic' );
					echo '</div>';

					innovation_ruby_template_part::open_content_inner();

					$ruby_flag = false;
					continue;
				}

				//render block
				echo '<div class="post-grid-outer col-sm-6 col-xs-12">';
				get_template_part( 'templates/loop', 'small_grid' );
				echo '</div><!--#small grid outer-->';

				if ( 0 == $ruby_counter % 2 ) {
					innovation_ruby_template_part::render_divider( 'post-grid-outer' );
				}

				$ruby_counter ++;

				?>
			<?php endwhile; ?>

			<?php

			innovation_ruby_template_part::close_content_inner();

			return ob_get_clean();
		}


		/**
		 * @param $query_data
		 *
		 * @return string
		 * render classic layout
		 */
		static function render_layout_classic( $query_data ) {
			ob_start();

			?>

			<?php while ( $query_data->have_posts() ) : ?>
				<?php $query_data->the_post();
				get_template_part( 'templates/loop', 'classic' );

				?>
			<?php endwhile; ?>

			<?php

			return ob_get_clean();
		}
	}
}