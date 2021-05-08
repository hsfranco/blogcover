<?php //grid thumb size
$ruby_size      = 'innovation_ruby_350x350';
$ruby_full_size = 'full';
$ruby_gallery   = get_post_meta( get_the_ID(), 'innovation_ruby_single_gallery_data', false );

$ruby_class = array();
$ruby_class[] = 'post-thumb is-gallery is-grid';
if(is_single()){
	$ruby_class[] = 'single-thumb';
}
$ruby_class = implode(' ',$ruby_class);

?>
<div class="post-thumb-outer">
	<div class="<?php echo esc_attr( $ruby_class ); ?>">
		<div class="slider-loading"></div>
		<div class="post-thumb-gallery-grid slider-init">
			<?php foreach ( $ruby_gallery as $ruby_image_id ) : ?>
				<?php if ( ! empty( $ruby_image_id ) ) :
					$ruby_image_full = wp_get_attachment_image_src( $ruby_image_id, $ruby_full_size );
					$ruby_caption    = get_post_field( 'post_excerpt', $ruby_image_id );
					$ruby_image      = wp_get_attachment_image_src( $ruby_image_id, $ruby_size );
					?>
					<a class="thumb-gallery-grid-el" href="<?php echo esc_url( $ruby_image_full[0] ); ?>">
						<img alt="<?php echo esc_attr( $ruby_caption ); ?>" src="<?php echo esc_url( $ruby_image[0] ); ?>">
						<?php if ( ! empty( $ruby_caption ) ) : ?>
						<span class="thumb-caption"><i class="fa fa-camera"></i><span><?php echo esc_attr( $ruby_caption ); ?></span></span>
						<?php endif; ?>
					</a>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
	</div>
</div>