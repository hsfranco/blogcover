<?php
$ruby_search_title = get_search_query();
$ruby_header_bg    = innovation_ruby_util::get_theme_option( 'search_header_background' );
?>

<?php if ( ! empty( $ruby_header_bg['url'] )) : ?>
<div class="archive-page-header is-light-text has-bg-image" style="background-image: url(<?php echo esc_url( $ruby_header_bg['url'] ); ?>)">
<?php echo innovation_ruby_thumbnail::render_pattern(); ?>
<?php else : ?>
<div class="archive-page-header">
<?php endif; ?>
	<div class="archive-title-wrap">
		<h1 class="archive-title post-title">
			<?php echo esc_html__( 'search for: ', 'innovation' ) . esc_attr( $ruby_search_title ); ?>
		</h1>
	</div>
</div>