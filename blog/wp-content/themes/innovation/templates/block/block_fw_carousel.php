<?php

/**
 * Class innovation_ruby_fw_carousel
 * render full width carousel
 */
if ( ! class_exists( 'innovation_ruby_fw_carousel' ) ) {
	class innovation_ruby_fw_carousel extends innovation_ruby_block {

		/**
		 * @param $block
		 * @return string
		 * render block layout
		 */
		static function render( $block ) {

			//add block data
			$block['block_type']                     = 'full_width';
			$block['block_classes']                  = 'block-fw-carousel';
			$block['block_options']['wrap_mode']     = 1;
			$block['block_options']['no_found_rows'] = true;

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
			$str .= parent::open_block_content();

			//check empty
			if ( empty( $query_data->post_count ) ) {
				$str .= parent::no_content();
			} else {
				ob_start();
				?>

				<div class="feat-wrap is-feat-carousel-fw">
					<div class="feat-inner">
						<div class="slider-loading"></div>
						<div class="ruby-feat-carousel-fw is-light-text slider-init">
							<?php while ( $query_data->have_posts() ) : ?>
								<?php $query_data->the_post(); ?>
								<?php get_template_part( 'templates/featured/loop', 'feat_carousel_fw' ); ?>
							<?php endwhile; ?>
						</div>
					</div>
				</div><!--#fw carousel-->

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
					'posts_per_page' => 6,
					'offset'         => true
				),
				'header' => array(
					'title'     => '',
					'sub_title' => true,
					'title_url' => true,
					'color'     => '#242424'
				)
			);
		}
	}
}
