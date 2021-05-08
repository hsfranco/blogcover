<?php
$ruby_size    = 'innovation_ruby_840x500';
$ruby_gallery = get_post_meta( get_the_ID(), 'innovation_ruby_single_gallery_data', false );

$ruby_class   = array();
$ruby_class[] = 'post-thumb is-gallery is-slider';
if ( is_single() ) {
	$ruby_class[] = 'single-thumb';
}

$ruby_class = implode(' ',$ruby_class); ?>
<div class="post-thumb-outer">
	<div class="<?php echo esc_attr($ruby_class); ?>">
		<div class="slider-loading"></div>
		<div class="post-thumb-gallery-slider slider-init">
			<?php foreach ( $ruby_gallery as $ruby_image_id ) : ?>
				<?php if ( ! empty( $ruby_image_id ) ) :
					$ruby_image_full = wp_get_attachment_image_src( $ruby_image_id, 'full' );
					$ruby_caption    = get_post_field( 'post_excerpt', $ruby_image_id );
					?>
					<div class="thumb-gallery-slider-el">
						<a href="<?php echo esc_url( $ruby_image_full[0] ); ?>"><?php echo wp_get_attachment_image( $ruby_image_id, $ruby_size ); ?></a>
						<?php if ( ! empty( $ruby_caption ) ) : ?>
							<span class="thumb-caption"><i class="fa fa-camera"></i><span><?php echo esc_attr( $ruby_caption ); ?></span></span>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
		<div class="post-thumb-gallery-slider-nav slider-init">
			<?php foreach ( $ruby_gallery as $ruby_nav_image_id ) : ?>
				<?php if ( ! empty( $ruby_nav_image_id ) ) : ?>
					<div><?php echo wp_get_attachment_image( $ruby_nav_image_id, $ruby_size ); ?></div>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
	</div>
</div>