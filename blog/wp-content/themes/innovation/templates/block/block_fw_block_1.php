<?php

/**
 * Class innovation_ruby_fw_block_1
 * render has fullwidth block 1 (grid layout)
 */
if ( ! class_exists( 'innovation_ruby_fw_block_1' ) ) {
	class innovation_ruby_fw_block_1 extends innovation_ruby_block {

		/**
		 * @param $block
		 * @return string
		 * render block layout
		 */
		static function render( $block ) {


			//add block data
			$block['block_type']    = 'full_width';
			$block['block_classes'] = 'block-fw-post-1';

			$str = '';
			$str .= parent::open_block( $block );
			$str .= parent::render_header( $block );
			$str .= self::render_content( $block );
			$str .= parent::close_block();

			return $str;
		}

		/**
		 * @param $block
		 * @return string
		 * render block block content
		 */
		static function render_content( $block ) {

			//query data
			$query_data = parent::get_data( $block );

			$ruby_counter = 1;

			//render
			$str = '';

			$str .= parent::open_block_content( 'row' );

			//check empty
			if ( empty( $query_data->post_count ) ) {
				$str .= parent::no_content();
			} else {
				ob_start();

				innovation_ruby_template_part::open_content_inner();
				?>

				<?php while ( $query_data->have_posts() ) : ?>
					<?php $query_data->the_post();

					//render block
					echo '<div class="post-grid-outer col-sm-4 col-xs-12">';
					get_template_part( 'templates/loop', 'grid' );
					echo '</div><!--#grid outer-->';

					if ( 0 == $ruby_counter % 3 ) {
						innovation_ruby_template_part::render_divider( 'post-grid-outer' );
					}

					$ruby_counter ++;
					?>
				<?php endwhile; ?>

				<?php

				innovation_ruby_template_part::close_content_inner();

				$str .= ob_get_clean();
			}

			$str .= parent::close_block_content();

			//reset post data
			wp_reset_postdata();

			return $str;
		}


		/**
		 * @return array
		 * init block options
		 */
		static function block_config() {
			return array(
				'filter' => array(
					'category_id'    => true,
					'category_ids'   => true,
					'tags'           => true,
					'authors'        => true,
					'orderby'        => true,
					'posts_per_page' => 6,
					'offset'         => true
				),
				'header' => array(
					'title'     => esc_html__( 'latest posts', 'innovation' ),
					'sub_title' => true,
					'title_url' => true,
					'color'     => '#242424',
				),
			);
		}
	}
}
