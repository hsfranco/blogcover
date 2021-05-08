<?php
//get data
$ruby_featured_data = innovation_ruby_featured::get_data();

if ( $ruby_featured_data->have_posts() ) : ?>
	<div class="feat-wrap feat-layout-slider-fw">
		<div class="feat-inner">
			<div class="slider-loading"></div>
			<div class="ruby-feat-slider-fw is-light-text slider-init">
				<?php while ( $ruby_featured_data->have_posts() ) : ?>
					<?php $ruby_featured_data->the_post(); ?>
					<?php get_template_part( 'templates/featured/loop', 'feat_slider_fw' ); ?>
				<?php endwhile; ?>
			</div>
		</div>
	</div><!--#featured area-->
<?php endif; ?>
<?php wp_reset_postdata(); ?>
