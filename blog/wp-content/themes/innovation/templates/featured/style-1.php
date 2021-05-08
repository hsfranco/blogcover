<?php
//get post data
$ruby_featured_data = innovation_ruby_featured::get_data();

if ( $ruby_featured_data->have_posts() ) : ?>
	<?php
	$ruby_num_posts = $ruby_featured_data->post_count;
	$ruby_counter   = 1;

	if ( $ruby_num_posts < 3 ) : ?>

		<div class="ruby-error is-center-text"><?php esc_attr_e( 'No enough post for this block, try to select another query', 'innovation' ); ?></div>

	<?php else : ?>

		<div class="feat-wrap feat-grid">
			<div class="ruby-container">
				<div class="feat-inner">
					<?php while ( $ruby_featured_data->have_posts() ) : ?>
						<?php $ruby_featured_data->the_post(); ?>
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
									<div class="col-md-6 col-xs-3 post-feat-grid-small-image" style="background-image: url(<?php echo esc_url( $ruby_featured_attachment[0] ); ?>)">
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
									<div class="col-md-6 col-xs-3 post-feat-grid-small-image" style="background-image: url(<?php echo esc_url( $ruby_featured_attachment[0] ); ?>)">
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
	<?php endif; ?>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
