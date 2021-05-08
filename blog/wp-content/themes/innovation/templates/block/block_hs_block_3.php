<?php

/**
 * Class innovation_ruby_hs_block_3
 * render has sidebar block 1
 */
if ( ! class_exists( 'innovation_ruby_hs_block_3' ) ) {
	class innovation_ruby_hs_block_3 extends innovation_ruby_block {

		/**
		 * @param $block
		 * @return string
		 * render block layout
		 */
		static function render( $block ) {


			//add block data
			$block['block_type']    = 'has_sidebar';
			$block['block_classes'] = 'block-post-3 col-sm-6 col-sx-12';

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
			$ruby_flag  = true;


			//render
			$str = '';
			$str .= parent::open_block_content( 'row' );

			//check empty
			if ( empty( $query_data->post_count ) || ( $query_data->post_count < 2 ) ) {
				$str .= parent::not_enough_post();
			} else {
				ob_start();
				?>
				<?php while ( $query_data->have_posts() ) : ?>
					<?php $query_data->the_post(); ?>

					<?php if ( true === $ruby_flag ) : ?>
						<div class="is-top-row">
							<?php get_template_part( 'templates/loop', 'grid' ); ?>
						</div><!--#top row-->

						<div class="is-bottom-row">

						<?php $ruby_flag = false; ?>
					<?php else: ?>
						<?php get_template_part( 'templates/loop', 'small_list' ); ?>
					<?php endif; ?>

				<?php endwhile; ?>
				</div><!--#bottom row-->

				<?php
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
					'posts_per_page' => 4,
					'offset'         => true
				),
				'header' => array(
					'title'     => esc_html__( 'latest posts', 'innovation' ),
					'sub_title' => true,
					'title_url' => true,
					'color'     => '#242424',
				)
			);
		}
	}
}