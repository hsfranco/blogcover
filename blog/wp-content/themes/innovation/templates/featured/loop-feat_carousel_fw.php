<?php
//featured image
$ruby_featured_attachment = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'innovation_ruby_1400x840' );
?>

<article class="post-wrap is-slider-post post-feat-carousel-fw" style="background-image: url(<?php echo esc_url( $ruby_featured_attachment[0] ); ?>)">
	<?php echo innovation_ruby_thumbnail::render_pattern(); ?>
		<div class="ruby-container is-table">
			<div class="post-header-slider post-header is-center-text is-cell is-align-middle">
				<?php innovation_ruby_template_part::post_cate_info( 'is-relative'); ?>
				<?php innovation_ruby_template_part::post_title( 'single-title' ); ?>
				<?php innovation_ruby_template_part::post_meta_info(); ?>
				<?php innovation_ruby_template_part::post_share_bar( 'is-relative', 'is-light-text' ); ?>
			</div>
			<?php innovation_ruby_template_part::post_review_info(); ?>
		</div>

</article><!--#post carousel full width-->