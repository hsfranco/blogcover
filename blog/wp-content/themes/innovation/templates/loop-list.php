<?php
//get settings
$ruby_excerpt                 = innovation_ruby_util::get_theme_option( 'list_excerpt_length' );
$ruby_post_share_bar_enable   = innovation_ruby_util::get_theme_option( 'post_share_bar' );
$ruby_list_share_bar_position = innovation_ruby_util::get_theme_option( 'list_share_bar_position' );
$ruby_smooth_display_enable   = innovation_ruby_util::get_theme_option( 'site_smooth_display' );
$ruby_smooth_display_style    = innovation_ruby_util::get_theme_option( 'site_smooth_display_style' );
$ruby_thumbnails              = innovation_ruby_thumbnail::render( 'innovation_ruby_350x350' );

$ruby_class   = array();
$ruby_class[] = 'post-wrap post-list row';
if ( 'overlay' == $ruby_list_share_bar_position && ! empty( $ruby_post_share_bar_enable ) ) {
	$ruby_class[] = 'is-dark-overlay';
}

if ( ! empty( $ruby_smooth_display_enable ) ) {
	$ruby_class[] = 'ruby-animated-image ' . esc_attr( $ruby_smooth_display_style );
}

if ( empty( $ruby_thumbnails ) ) {
	$ruby_class[] = 'no-featured';
}

$ruby_class = implode( ' ', $ruby_class ); ?>
<article class="<?php echo esc_attr( $ruby_class ); ?>">
	<?php if ( ! empty( $ruby_thumbnails ) ) : ?>
		<div class="is-left-col col-sm-5 col-xs-12">
			<div class="post-thumb-outer">
				<?php echo innovation_ruby_thumbnail::render( 'innovation_ruby_350x350' ); ?>
				<?php get_template_part( 'templates/meta/el', 'post_format' ); ?>
				<?php innovation_ruby_template_part::post_review_info(); ?>
				<?php if ( 'overlay' == $ruby_list_share_bar_position ) : ?>
					<?php innovation_ruby_template_part::post_share_bar( 'is-absolute', 'is-light-text' ); ?>
				<?php endif; ?>
			</div>
		</div>
	<?php endif; ?>
	<div class="is-right-col col-sm-7 col-xs-12">
		<div class="post-header">
			<?php innovation_ruby_template_part::post_cate_info( 'is-relative', 'is-dark-text' ); ?>
			<?php innovation_ruby_template_part::post_title(); ?>
			<?php innovation_ruby_template_part::post_meta_info(); ?>
			<?php if ( 'relative' == $ruby_list_share_bar_position ) : ?>
				<?php innovation_ruby_template_part::post_share_bar( 'is-relative', 'is-dark-text' ); ?>
			<?php endif; ?>
		</div>
		<?php innovation_ruby_template_part::excerpt( $ruby_excerpt ); ?>
		<?php innovation_ruby_template_part::read_more( 'is-small-btn' ); ?>
	</div>
</article>