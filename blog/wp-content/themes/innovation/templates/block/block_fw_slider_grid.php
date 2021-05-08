<?php

/**
 * Class innovation_ruby_fw_slider_grid
 * render full width slider grid
 */
if ( ! class_exists( 'innovation_ruby_fw_slider_grid' ) ) {
	class innovation_ruby_fw_slider_grid extends innovation_ruby_block {

		/**
		 * @param $block
		 * @return string
		 * render block layout
		 */
		static function render( $block ) {


			//add block data
			$block['block_type']                     = 'full_width';
			$block['block_classes']                  = 'block-fw-slider-grid';
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


			$str = '';
			$str .= parent::open_block_content();

			//check empty
			if ( empty( $query_data->post_count ) || $query_data->post_count < 3 ) {
				$str .= parent::not_enough_post();
			} else {

				$ruby_num_posts = $query_data->post_count;
				$ruby_counter   = 1;

				ob_start();
				?>

				<div class="feat-wrap feat-grid">
					<div class="ruby-container">
						<div class="feat-inner">
							<?php while ( $query_data->have_posts() ) : ?>
								<?php $query_data->the_post(); ?>

								<?php if ( $ruby_counter <= $ruby_num_posts - 2 ) : ?>

									<?php if ( 1 == $ruby_counter ) : ?>
										<div class="is-left-col col-md-7 col-sm-12">
										<div class="slider-loading"></div>
										<div class="ruby-feat-grid is-light-text slider-init">
									<?php endif; ?>
									<?php get_template_part( 'templates/featured/loop', 'feat_grid' ); ?>
									<?php if ( $ruby_num_posts - 2 == $ruby_counter ) : ?>
										</div>
										</div><!--#left col -->
										<div class="is-right-col col-md-5 col-xs-12">
									<?php endif; ?>

								<?php else: ?>
									<?php if ( $ruby_num_posts - 1 == $ruby_counter ) : ?>
										<?php
										$ruby_featured_attachment = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'innovation_ruby_350x350' );
										?>
										<article class="post-wrap post-feat-grid-small is-light-text">
											<div class="col-md-6 col-xs-3 post-feat-grid-small-image"
											     style="background-image: url(<?php echo esc_url( $ruby_featured_attachment[0] ); ?>)">
												<?php echo innovation_ruby_thumbnail::render_pattern(); ?>
											</div>
											<div class="col-md-6 col-xs-9 post-header">
												<?php innovation_ruby_template_part::post_cate_info( 'is-relative', 'is-light-text' ); ?>
												<?php innovation_ruby_template_part::post_title( 'is-small-title' ); ?>
											</div>
										</article><!--#post featured grid small-->
									<?php endif; ?>

									<?php if ( $ruby_num_posts == $ruby_counter ) : ?>
										<?php
										$ruby_featured_attachment = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'innovation_ruby_350x350' );
										?>
										<article class="post-wrap post-feat-grid-small is-light-text">
											<div class="col-md-6 col-xs-9 post-header">
												<?php innovation_ruby_template_part::post_cate_info( 'is-relative', 'is-light-text' ); ?>
												<?php innovation_ruby_template_part::post_title( 'is-small-title' ); ?>
											</div>
											<div class="col-md-6 col-xs-3 post-feat-grid-small-image"
											     style="background-image: url(<?php echo esc_url( $ruby_featured_attachment[0] ); ?>)">
												<?php echo innovation_ruby_thumbnail::render_pattern(); ?>
											</div>
										</article><!--#post featured grid small-->

										</div><!--#right col-->
									<?php endif; ?>

								<?php endif; ?>
								<?php $ruby_counter ++; ?>
							<?php endwhile; ?>
						</div>
					</div>
				</div><!--#featured area-->
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
				),
			);
		}
	}
}
