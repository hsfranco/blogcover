<?php

/**
 * Class innovation_ruby_layout
 * This file render layout for page
 */
if ( ! class_exists( 'innovation_ruby_blog_layout' ) ) {
	class innovation_ruby_blog_layout {

		static function render( $options = array() ) {

			//check page layout
			if ( empty( $options['page_layout'] ) ) {
				$options['page_layout'] = 'classic-layout';
			}

			$class_name   = array();
			$class_name[] = 'page-layout-wrap';
			$class_name[] = 'is-' . esc_attr( $options['page_layout'] );
			if ( ! empty( $options['big_first'] ) ) {
				$class_name[] = 'has-big-first';
			} else {
				$class_name[] = 'no-big-first';
			}
			$class_name = implode( ' ', $class_name );

			//render
			if ( have_posts() ) {

				innovation_ruby_template_part::open_page_wrap( $class_name, $options['sidebar_position'] );

				switch ( $options['page_layout'] ) {
					case 'list-sgrid-layout' :
						innovation_ruby_list_sgrid_layout::render( $options );
						break;
					case 'list-grid-layout' :
						innovation_ruby_list_grid_layout::render( $options );
						break;
					case 'classic-grid-layout' :
						innovation_ruby_classic_grid_layout::render( $options );
						break;
					case 'classic-sgrid-layout' :
						innovation_ruby_classic_sgrid_layout::render( $options );
						break;
					case 'sgrid-layout' :
						innovation_ruby_sgrid_layout::render( $options );
						break;
					case 'grid-layout' :
						innovation_ruby_grid_layout::render( $options );
						break;
					case 'list-layout' :
						innovation_ruby_list_layout::render( $options );
						break;
					default :
						innovation_ruby_classic_layout::render( $options );
						break;
				}

				//render sidebar
				if ( ! empty( $options['sidebar_position'] ) && 'none' != $options['sidebar_position'] ) {
					innovation_ruby_template_part::sidebar( $options['sidebar_name'] );
				}

				innovation_ruby_template_part::close_page_wrap();
			} else {
				get_template_part( 'templates/section', 'no_content' );
			}
		}
	}
}