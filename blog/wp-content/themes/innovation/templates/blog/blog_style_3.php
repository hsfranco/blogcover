<?php
/**
 * @param $ruby_options
 *
 * @return string
 * render classic small grid layout
 */
if ( ! class_exists( 'innovation_ruby_classic_sgrid_layout' ) ) {
	class innovation_ruby_classic_sgrid_layout {

		/**
		 * @param $ruby_options
		 * render layout
		 */
		static function render( $ruby_options ) {

			$ruby_counter         = 0;
			$ruby_divider_counter = 1;

			innovation_ruby_template_part::open_page_inner( 'page-layout-inner', $ruby_options['sidebar_position'], 'classic-sgrid-layout', $ruby_options['big_first'] );

			innovation_ruby_template_part::open_ajax_wrap();
			innovation_ruby_template_part::open_content_inner();

			while ( have_posts() ) {
				the_post();

				//render block
				if ( 0 == $ruby_counter % 5 ) {
					echo '<div class="post-classic-grid-outer col-xs-12">';
					get_template_part( 'templates/loop', 'classic' );
					echo '</div><!--#small grid outer-->';
					innovation_ruby_template_part::render_divider( 'post-classic-grid-outer' );
				} else {
					echo '<div class="post-classic-grid-outer col-sm-6 col-xs-12">';
					get_template_part( 'templates/loop', 'small_grid' );
					echo '</div><!--#list layout-->';
					if ( 0 == $ruby_divider_counter % 2 ) {
						innovation_ruby_template_part::render_divider( 'post-classic-grid-outer' );
						$ruby_divider_counter = 0;
					}
					$ruby_divider_counter ++;
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
		 *
		 * @return string
		 * ajax render
		 */
		static function ajax_render( $query_data ) {

			$ruby_counter         = 0;
			$ruby_divider_counter = 1;

			//render
			ob_start();

			innovation_ruby_template_part::open_ajax_wrap();
			innovation_ruby_template_part::open_content_inner();

			while ( $query_data->have_posts() ) {
				$query_data->the_post();

				//render block
				if ( 0 == $ruby_counter % 5 ) {
					echo '<div class="post-classic-grid-outer col-xs-12">';
					get_template_part( 'templates/loop', 'classic' );
					echo '</div><!--#small grid outer-->';
					innovation_ruby_template_part::render_divider( 'post-classic-grid-outer' );
				} else {
					echo '<div class="post-classic-grid-outer col-sm-6 col-xs-12">';
					get_template_part( 'templates/loop', 'small_grid' );
					echo '</div><!--#list layout-->';
					if ( 0 == $ruby_divider_counter % 2 ) {
						innovation_ruby_template_part::render_divider( 'post-classic-grid-outer' );
						$ruby_divider_counter = 0;
					}
					$ruby_divider_counter ++;
				}
				$ruby_counter ++;
			}

			innovation_ruby_template_part::close_content_inner();
			innovation_ruby_template_part::close_ajax_wrap();

			return ob_get_clean();
		}
	}
}
