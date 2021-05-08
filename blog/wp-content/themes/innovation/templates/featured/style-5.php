<?php
//get post data
$ruby_featured_data = innovation_ruby_featured::get_data();

if ( $ruby_featured_data->have_posts() ) : ?>
	<div class="feat-wrap is-feat-carousel-fw">
		<div class="feat-inner">
			<div class="slider-loading"></div>
			<div class="ruby-feat-carousel-fw is-light-text slider-init">
				<?php while ( $ruby_featured_data->have_posts() ) : ?>
					<?php $ruby_featured_data->the_post(); ?>
					<?php get_template_part( 'templates/featured/loop', 'feat_carousel_fw' ); ?>
				<?php endwhile; ?>
			</div>
		</div>
	</div><!--#featured area-->
<?php endif; ?>
<?php wp_reset_postdata(); ?>
