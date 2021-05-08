<?php

/**
 * Class innovation_ruby_hs_block_8
 * render has sidebar block 8 (3 column post)
 */
if ( ! class_exists( 'innovation_ruby_hs_block_8' ) ) {
	class innovation_ruby_hs_block_8 extends innovation_ruby_block {

		/**
		 * @param $block
		 * @return string
		 * render block layout
		 */
		static function render( $block ) {


			//add block data
			$block['block_type']    = 'has_sidebar';
			$block['block_classes'] = 'block-post-8';

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

			//render
			$str = '';
			$str .= parent::open_block_content( 'row' );

			//check empty
			if ( empty( $query_data->post_count ) ) {
				$str .= parent::no_content();

			} else {

				ob_start();
				?>
				<div class="ruby-block-post-8-carousel-outer">
					<div class="slider-loading"></div>
					<div class="ruby-block-post-8-carousel slider-init">
						<?php while ( $query_data->have_posts() ) : ?>
							<?php $query_data->the_post(); ?>
							<?php get_template_part( 'templates/loop', 'mini_related' ); ?>
						<?php endwhile; ?>
					</div>
				</div>
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
					'posts_per_page' => 3,
					'offset'         => true
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