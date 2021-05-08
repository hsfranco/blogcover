<?php
$ruby_post_format                = innovation_ruby_post_format::check_post_format();
$ruby_post_share_bar_enable      = innovation_ruby_util::get_theme_option( 'post_share_bar' );
$ruby_classic_share_bar_position = innovation_ruby_util::get_theme_option( 'classic_share_bar_position' );
$ruby_classic_summary_type       = innovation_ruby_util::get_theme_option( 'classic_summary_type' );
$ruby_classic_excerpt_length     = innovation_ruby_util::get_theme_option( 'classic_excerpt_length' );
$ruby_smooth_display_enable      = innovation_ruby_util::get_theme_option( 'site_smooth_display' );
$ruby_smooth_display_style       = innovation_ruby_util::get_theme_option( 'site_smooth_display_style' );

$ruby_class   = array();
$ruby_class[] = 'post-wrap post-classic';
if ( 'overlay' == $ruby_classic_share_bar_position && ! empty( $ruby_post_share_bar_enable ) ) {
	$ruby_class[] = 'is-dark-overlay';
}

if ( ! empty( $ruby_smooth_display_enable ) ) {
	$ruby_class[] = 'ruby-animated-image ' . esc_attr($ruby_smooth_display_style);
}

$ruby_class = implode( ' ', $ruby_class );

$ruby_classic_share_checked = true;
if ( 'gallery' == $ruby_post_format || 'video' == $ruby_post_format || 'audio' == $ruby_post_format ) {
	$ruby_classic_share_checked = false;
} ?>
<article <?php post_class($ruby_class) ?>>
	<div class="post-header">
		<?php innovation_ruby_template_part::post_cate_info( 'is-relative', 'is-dark-text' ); ?>
		<?php innovation_ruby_template_part::post_title( 'is-big-title' ); ?>
		<?php innovation_ruby_template_part::post_meta_info(); ?>
		<?php if ( 'relative' == $ruby_classic_share_bar_position || false === $ruby_classic_share_checked ) : ?>
			<?php innovation_ruby_template_part::post_share_bar( 'is-relative', 'is-dark-text' ); ?>
		<?php endif; ?>
	</div>
	<div class="post-body">
		<?php switch ( $ruby_post_format ) {
			case 'gallery' :
				get_template_part( 'templates/post', 'gallery' );
				break;
			case 'video':
				get_template_part( 'templates/post', 'video' );
				break;
			case 'audio' :
				get_template_part( 'templates/post', 'audio' );
				break;
			default :
				get_template_part( 'templates/post', 'thumbnail' );
				break;
		} ?>

		<?php if ( ! empty( $ruby_classic_summary_type ) ) : ?>
			<?php get_template_part( 'templates/post', 'content' ); ?>
		<?php else : ?>
			<?php innovation_ruby_template_part::excerpt( $ruby_classic_excerpt_length ); ?>
		<?php endif; ?>

		<?php innovation_ruby_template_part::read_more( 'is-medium-btn' ); ?>
	</div>
</article>
