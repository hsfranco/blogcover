<?php
$featured_attachment = '';
if ( has_post_thumbnail() ) {
	$featured_attachment = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'innovation_ruby_1400x840' );
}

?>
<?php if ( ! empty( $featured_attachment[0] )) : ?>
<div class="single-page-header single-header-fw is-light-text has-bg-image" style="background-image: url(<?php echo esc_url( $featured_attachment[0] ); ?>)">
	<?php echo innovation_ruby_thumbnail::render_pattern(); ?>
	<?php else : ?>
	<div class="single-page-header single-header-fw is-color-bg">
		<?php endif; ?>
		<div class="ruby-container is-table">
			<div class="post-title single-title entry-title page-title is-align-middle is-cell is-center-text">
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
	</div><!--#page header -->