<?php
//check and return
$ruby_author_name          = get_the_author_meta( 'display_name' );
$ruby_header_bg            = innovation_ruby_util::get_theme_option( 'author_header_background' );
$ruby_author_social_data   = innovation_ruby_social_data::author_data( get_the_author_meta( 'ID' ) );
$ruby_render_author_social = innovation_ruby_social_bar::render( $ruby_author_social_data );
?>

<?php if ( ! empty( $ruby_header_bg['url'] )) : ?>
<div class="archive-page-header is-light-text has-bg-image" style="background-image: url(<?php echo esc_url( $ruby_header_bg['url'] ); ?>)">
<?php echo innovation_ruby_thumbnail::render_pattern(); ?>
<?php else : ?>
<div class="archive-page-header">
	<?php endif; ?>
	<div class="archive-title-wrap">
		<h1 class="archive-title post-title">
			<?php echo esc_html( $ruby_author_name ) ?>
		</h1>
		<?php if ( ! empty( $ruby_render_author_social ) ) : ?>
			<div class="author-social">
				<?php echo innovation_ruby_social_bar::render( $ruby_author_social_data ); ?>
			</div><!--author-social-->
		<?php endif; ?>
	</div>
</div>
