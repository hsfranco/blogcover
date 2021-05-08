<?php
$ruby_class   = array();
$ruby_class[] = 'post-thumb';
$ruby_class[] = 'is-video';
$ruby_class[] = 'video-iframe';

if ( is_single() ) {
	$ruby_class[] = 'single-thumb';
}

$ruby_class = implode( ' ', $ruby_class ); ?>
<div class="post-thumb-outer">
	<div class="<?php echo esc_attr( $ruby_class ); ?>">
		<?php echo innovation_ruby_post_format::video_embed(); ?>
	</div>
</div>

