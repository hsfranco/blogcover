<?php

/**
 * Class innovation_ruby_hs_block_6
 * render has sidebar block 6 (small grid layout)
 */
if ( ! class_exists( 'innovation_ruby_hs_block_6' ) ) {
	class innovation_ruby_hs_block_6 extends innovation_ruby_block {

		/**
		 * @param $block
		 * @return string
		 * render block layout
		 */
		static function render( $block ) {


			//add block data
			$block['block_type']    = 'has_sidebar';
			$block['block_classes'] = 'block-post-4 block-post-6';

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
			$query_data   = parent::get_data( $block );
			$ruby_flag    = true;
			$ruby_counter = 1;
			if ( ! empty( $block['block_options']['big_first'] ) ) {
				$big_first = true;
			} else {
				$big_first = false;
			}


			//render
			$str = '';

			if ( true == $big_first ) {
				$str .= parent::open_block_content( 'row is-big-first' );
			} else {
				$str .= parent::open_block_content( 'row' );
			}

			//check empty
			if ( empty( $query_data->post_count ) ) {
				$str .= parent::no_content();
			} else {
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
					'offset'         => true,
					'big_first'      => true
				),
				'header' => array(
					'title'     => esc_html__( 'latest posts', 'innovation' ),
					'sub_title' => true,
					'title_url' => true,
					'color'     => '#242424'
				)
			);
		}
	}
}
