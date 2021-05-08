<?php
$ruby_class   = array();
$ruby_class[] = 'post-thumb';
$ruby_class[] = 'is-audio';
$ruby_class[] = 'audio-iframe';

if ( is_single() ) {
	$ruby_class[] = 'single-thumb';
}

$ruby_self_host_audio = get_post_meta( get_the_ID(), 'innovation_ruby_single_self_host_audio', true );
if ( ! empty( $ruby_self_host_audio ) ) {
	$ruby_class[] = 'is-self-hosted';
}

$ruby_class = implode( ' ', $ruby_class );
?>

<div class="post-thumb-outer">
	<div class="<?php echo esc_attr( $ruby_class ); ?>">
		<?php echo innovation_ruby_post_format::audio_embed(); ?>
	</div>
</div>

