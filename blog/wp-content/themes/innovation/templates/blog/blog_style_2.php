<?php
/**
 * @param $ruby_options
 *
 * @return string
 * render list and grid layout
 */

if ( ! class_exists( 'innovation_ruby_list_grid_layout' ) ) {
	class innovation_ruby_list_grid_layout {
		static function render( $ruby_options ) {

			//check 1st post
			$ruby_flag            = true;
			$ruby_divider_counter = 1;
			if ( ! empty( $ruby_options['big_first'] ) ) {
				$ruby_counter = 1;
			} else {
				$ruby_counter = 0;
			}

			innovation_ruby_template_part::open_page_inner( 'page-layout-inner', $ruby_options['sidebar_position'], 'list-grid-layout', $ruby_options['big_first'] );

			innovation_ruby_template_part::open_ajax_wrap();

			if ( empty( $ruby_options['big_first'] ) ) {
				innovation_ruby_template_part::open_content_inner();
			}

			//render
			while ( have_posts() ) {
				the_post();

				//render first post
				if ( ( true === $ruby_flag ) && ( ! empty( $ruby_options['big_first'] ) ) ) {

					echo '<div class="first-post-wrap">';
					get_template_part( 'templates/loop', 'classic' );
					echo '</div>';

					innovation_ruby_template_part::open_content_inner();
					$ruby_flag = false;
					continue;
				}

				//render block
				if ( 0 != $ruby_counter % 3 ) {
					echo '<div class="post-list-grid-outer col-sm-6 col-xs-12">';
					get_template_part( 'templates/loop', 'grid' );
					echo '</div><!--#small grid outer-->';
					if ( 0 == $ruby_divider_counter % 2 ) {
						innovation_ruby_template_part::render_divider( 'post-list-grid-outer' );
						$ruby_divider_counter = 0;
					}
					$ruby_divider_counter ++;
				} else {
					echo '<div class="post-list-grid-outer col-xs-12">';
					get_template_part( 'templates/loop', 'list' );
					echo '</div><!--#list layout-->';
				}

				$ruby_counter ++;
			}
			innovation_ruby_template_part::close_content_inner();
			innovation_ruby_template_part::close_ajax_wrap();

			//pagination
			innovation_ruby_template_part::pagination();

			innovation_ruby_template_part::close_page_inner();

		}


		/**
		 * @param $query_data
		 * @param $big_first
		 *
		 * @return string
		 * ajax render
		 */
		static function ajax_render( $query_data, $big_first ) {

			//check 1st post
			$ruby_flag            = true;
			$ruby_divider_counter = 1;
			if ( ! empty( $big_first ) ) {
				$ruby_counter = 1;
			} else {
				$ruby_counter = 0;
			}


			//render
			ob_start();

			innovation_ruby_template_part::open_ajax_wrap();


			if ( empty( $big_first ) ) {
				innovation_ruby_template_part::open_content_inner();
			}

			while ( $query_data->have_posts() ) {
				$query_data->the_post();

				//render first post
				if ( ( true === $ruby_flag ) && ( ! empty( $big_first ) ) ) {
					echo '<div class="first-post-wrap">';
					get_template_part( 'templates/loop', 'classic' );
					echo '</div>';

					innovation_ruby_template_part::open_content_inner();
					$ruby_flag = false;
					continue;
				}

				//render block
				if ( 0 != $ruby_counter % 3 ) {
					echo '<div class="post-list-grid-outer col-sm-6 col-xs-12">';
					get_template_part( 'templates/loop', 'grid' );
					echo '</div><!--#small grid outer-->';
					if ( 0 == $ruby_divider_counter % 2 ) {
						innovation_ruby_template_part::render_divider( 'post-list-grid-outer' );
						$ruby_divider_counter = 0;
					}
					$ruby_divider_counter ++;
				} else {
					echo '<div class="post-list-grid-outer col-xs-12">';
					get_template_part( 'templates/loop', 'list' );
					echo '</div><!--#list layout-->';
				}

				$ruby_counter ++;
			}

			innovation_ruby_template_part::close_content_inner();
			innovation_ruby_template_part::close_ajax_wrap();

			return ob_get_clean();

		}
	}
}
