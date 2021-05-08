<?php
$ruby_smooth_display_enable = innovation_ruby_util::get_theme_option( 'site_smooth_display' );
$ruby_smooth_display_style  = innovation_ruby_util::get_theme_option( 'site_smooth_display_style' );

$ruby_class   = array();
$ruby_class[] = 'post-wrap post-grid-overlay';
$ruby_class[] = 'is-dark-overlay';

if ( ! empty( $ruby_smooth_display_enable ) ) {
	$ruby_class[] = 'ruby-animated-image ' . esc_attr( $ruby_smooth_display_style );
}

$ruby_class = implode( ' ', $ruby_class );

?>
<article class="<?php echo esc_attr( $ruby_class ) ?>">
	<div class="post-thumb-outer">
		<?php echo innovation_ruby_thumbnail::render( 'innovation_ruby_350x200' ); ?>
		<div class="post-header is-absolute is-light-text">
			<?php innovation_ruby_template_part::post_cate_info( 'is-relative', 'is-light-text' ); ?>
			<?php innovation_ruby_template_part::post_title(); ?>
		</div>
	</div>
</article>