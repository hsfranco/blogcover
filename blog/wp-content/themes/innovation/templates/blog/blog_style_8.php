<?php
/**
 * @param $ruby_options
 *
 * @return string
 * render classic layout
 */
if ( ! class_exists( 'innovation_ruby_classic_layout' ) ) {
	class innovation_ruby_classic_layout {

		/**
		 * @param $ruby_options
		 * render
		 */
		static function render( $ruby_options ) {

			innovation_ruby_template_part::open_page_inner( 'page-layout-inner', $ruby_options['sidebar_position'], 'classic-layout', false );

			innovation_ruby_template_part::open_ajax_wrap();
			innovation_ruby_template_part::open_content_inner();

			//render
			while ( have_posts() ) {
				the_post();
				//render post
				get_template_part( 'templates/loop', 'classic' );
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
		 *  ajax render
		 */
		static function ajax_render( $query_data ) {

			//render
			ob_start();

			innovation_ruby_template_part::open_ajax_wrap();
			innovation_ruby_template_part::open_content_inner();

			while ( $query_data->have_posts() ) {
				$query_data->the_post();
				//render post
				get_template_part( 'templates/loop', 'classic' );
			}

			innovation_ruby_template_part::close_content_inner();
			innovation_ruby_template_part::close_ajax_wrap();

			return ob_get_clean();

		}
	}
}

