<?php
/**
 * @param $ruby_options
 *
 * @return string
 * render grid layout
 */
if ( ! class_exists( 'innovation_ruby_grid_layout' ) ) {
	class innovation_ruby_grid_layout {

		/**
		 * @param $ruby_options
		 * render layout
		 */
		static function render( $ruby_options ) {

			//check first post
			$ruby_flag    = true;
			$ruby_counter = 1;

			//render
			innovation_ruby_template_part::open_page_inner( 'page-layout-inner', $ruby_options['sidebar_position'], 'grid-layout', $ruby_options['big_first'] );

			innovation_ruby_template_part::open_ajax_wrap();

			if ( empty( $ruby_options['big_first'] ) ) {
				innovation_ruby_template_part::open_content_inner();
			}

			while ( have_posts() ) {
				the_post();

				//render first post
				if ( ( true === $ruby_flag ) && ( ! empty( $ruby_options['big_first'] ) ) ) {
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
		 * render ajax
		 */
		static function ajax_render( $query_data, $big_first ) {

			//check 1st post
			$ruby_flag    = true;
			$ruby_counter = 1;

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
				echo '</div><!--#small grid outer-->';

				if ( 0 == $ruby_counter % 2 ) {
					innovation_ruby_template_part::render_divider( 'post-grid-outer' );
				}

				$ruby_counter ++;
			}

			innovation_ruby_template_part::close_content_inner();
			innovation_ruby_template_part::close_ajax_wrap();

			return ob_get_clean();
		}


	}
}
