<?php
//get settings
$ruby_excerpt               = innovation_ruby_util::get_theme_option( 'small_grid_excerpt_length' );
$ruby_smooth_display_enable = innovation_ruby_util::get_theme_option( 'site_smooth_display' );
$ruby_smooth_display_style  = innovation_ruby_util::get_theme_option( 'site_smooth_display_style' );
$ruby_thumbnails            = innovation_ruby_thumbnail::render( 'innovation_ruby_105x105' );

$ruby_class   = array();
$ruby_class[] = 'post-wrap post-small-grid';

if ( ! empty( $ruby_smooth_display_enable ) ) {
	$ruby_class[] = 'ruby-animated-image ' . esc_attr( $ruby_smooth_display_style );
}

if ( empty( $ruby_thumbnails ) ) {
	$ruby_class[] = 'no-featured';
}

$ruby_class = implode( ' ', $ruby_class );

?>
<article class="<?php echo esc_attr( $ruby_class ); ?>">
	<div class="post-header">
		<?php innovation_ruby_template_part::post_cate_info( 'is-relative', 'is-dark-text' ); ?>
		<?php innovation_ruby_template_part::post_title(); ?>
		<?php innovation_ruby_template_part::post_meta_info(); ?>
		<?php innovation_ruby_template_part::post_share_bar( 'is-relative', 'is-dark-text' ); ?>
	</div>
	<div class="post-body">
		<?php if ( ! empty( $ruby_thumbnails ) ) : ?>
			<div class="post-thumb-outer">
				<?php echo innovation_ruby_thumbnail::render( 'innovation_ruby_105x105' ); ?>
				<?php get_template_part( 'templates/meta/el', 'post_format' ); ?>
			</div>
		<?php endif; ?>
		<?php innovation_ruby_template_part::excerpt( $ruby_excerpt ); ?>
		<?php innovation_ruby_template_part::read_more( 'is-small-btn' ); ?>
	</div>
</article>
