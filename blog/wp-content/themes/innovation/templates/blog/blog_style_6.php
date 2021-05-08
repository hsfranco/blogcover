<?php
/**
 * @param $ruby_options
 *
 * @return string
 * render list layout
 */
if ( ! class_exists( 'innovation_ruby_list_layout' ) ) {
	class innovation_ruby_list_layout {
		static function render( $ruby_options ) {

			//check first post
			$ruby_flag = true;
			innovation_ruby_template_part::open_page_inner( 'page-layout-inner', $ruby_options['sidebar_position'], 'list-layout', $ruby_options['big_first'] );

			innovation_ruby_template_part::open_ajax_wrap();
			innovation_ruby_template_part::open_content_inner();

			//render
			while ( have_posts() ) {
				the_post();

				//render first post
				if ( ( true === $ruby_flag ) && ( ! empty( $ruby_options['big_first'] ) ) ) {
					echo '<div class="first-post-wrap col-sx-12">';
					get_template_part( 'templates/loop', 'classic' );
					echo '</div>';
					$ruby_flag = false;
					continue;
				}

				//render block
				get_template_part( 'templates/loop', 'list' );
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

			//check first post
			$ruby_flag = true;

			//render
			ob_start();

			innovation_ruby_template_part::open_ajax_wrap();
			innovation_ruby_template_part::open_content_inner();

			while ( $query_data->have_posts() ) {
				$query_data->the_post();

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
			}

			innovation_ruby_template_part::close_content_inner();
			innovation_ruby_template_part::close_ajax_wrap();

			return ob_get_clean();
		}

	}
}
