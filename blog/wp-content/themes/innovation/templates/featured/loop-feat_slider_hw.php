<?php
//featured image
$ruby_featured_attachment = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'innovation_ruby_1400x840' );
?>
<article class="post-wrap is-slider-post post-feat-slider-hw" style="background-image: url(<?php echo esc_url( $ruby_featured_attachment[0] ); ?>)">
	<?php echo innovation_ruby_thumbnail::render_pattern(); ?>
		<div class="is-table">
			<div class="post-header-slider post-header is-cell is-align-bottom">
				<?php innovation_ruby_template_part::post_cate_info( 'is-relative'); ?>
				<?php innovation_ruby_template_part::post_title( 'single-title' ); ?>
				<?php innovation_ruby_template_part::post_meta_info(); ?>
				<?php innovation_ruby_template_part::post_share_bar( 'is-relative', 'is-light-text' ); ?>
			</div>
		</div>
	<?php innovation_ruby_template_part::post_review_info(); ?>
</article><!--#post has wrap slider-->