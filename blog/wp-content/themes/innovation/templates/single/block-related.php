<?php
//get data
$ruby_single_related_data = innovation_ruby_post_related::get_data();

if ( ! empty( $ruby_single_related_data ) ) :
	?>
	<div class="related-wrap">
		<div class="related-heading widget-title">
			<h3><?php esc_attr_e( 'you might also like', 'innovation' ); ?></h3>
		</div>
		<div class="related-content-wrap row">
			<div class="slider-loading"></div>
			<div id="ruby-related-carousel" class="slider-init">
				<?php foreach ( $ruby_single_related_data as $post ) : ?>
					<?php setup_postdata( $post ); ?>
					<?php get_template_part( 'templates/loop', 'mini_related' ); ?>
				<?php endforeach; ?>
			</div>
		</div>
	</div><!-- related wrap -->
<?php endif; ?>
<?php wp_reset_postdata(); ?>