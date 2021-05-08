<?php
//get options
$ruby_post_share_bar_enable     = innovation_ruby_util::get_theme_option( 'post_share_bar' );
$ruby_mega_menu_cate_text_style = innovation_ruby_util::get_theme_option( 'mega_menu_cate_text_style' );
$ruby_grid_share_bar_position   = innovation_ruby_util::get_theme_option( 'grid_share_bar_position' );
$ruby_thumbnails                = innovation_ruby_thumbnail::render( 'innovation_ruby_350x200' );

$ruby_class   = array();
$ruby_class[] = 'post-wrap post-mini-grid';
if ( 'overlay' == $ruby_grid_share_bar_position && ! empty( $ruby_post_share_bar_enable ) ) {
	$ruby_class[] = 'is-dark-overlay';
}

$ruby_class[] = esc_attr( $ruby_mega_menu_cate_text_style );

$ruby_class = implode( ' ', $ruby_class );
?>

<article class="<?php echo esc_attr( $ruby_class ); ?>">
	<?php if ( ! empty( $ruby_thumbnails ) ) : ?>
		<div class="post-thumb-outer">
			<?php echo innovation_ruby_thumbnail::render( 'innovation_ruby_350x200' ); ?>
			<?php get_template_part( 'templates/meta/el', 'post_format' ); ?>
			<?php innovation_ruby_template_part::post_review_info(); ?>
			<?php if ( 'overlay' == $ruby_grid_share_bar_position ) : ?>
				<?php innovation_ruby_template_part::post_share_bar( 'is-absolute', 'is-light-text' ); ?>
			<?php endif; ?>
		</div>
	<?php endif; ?>
	<?php innovation_ruby_template_part::post_title( 'is-small-title' ); ?>
</article>

