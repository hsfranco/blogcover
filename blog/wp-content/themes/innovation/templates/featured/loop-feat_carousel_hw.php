<?php
//featured image
$ruby_featured_attachment = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'innovation_ruby_1400x840' );
$ruby_featured            = innovation_ruby_thumbnail::render( 'innovation_ruby_300x450' );

$ruby_class   = array();
$ruby_class[] = 'post-wrap post-feat-carousel-hw is-slider-post';
if ( empty( $ruby_featured ) ) {
	$ruby_class[] = 'no-featured';
}

$ruby_class = implode( ' ', $ruby_class );
?>
<article class="<?php echo esc_attr( $ruby_class ); ?>">
	<div class="post-thumb-outer">
		<?php echo innovation_ruby_thumbnail::render( 'innovation_ruby_300x450' ); ?>
		<?php echo innovation_ruby_thumbnail::render_pattern(); ?>
		<?php innovation_ruby_template_part::post_review_info(); ?>
	</div>
	<div class="post-header is-absolute">
		<?php innovation_ruby_template_part::post_cate_info( 'is-relative' ); ?>
		<?php innovation_ruby_template_part::post_title(); ?>
		<div class="post-feat-carousel-hw-meta">
			<?php innovation_ruby_template_part::post_meta_info(); ?>
			<?php innovation_ruby_template_part::post_share_bar( 'is-relative', 'is-light-text' ); ?>
		</div>
	</div>
</article>