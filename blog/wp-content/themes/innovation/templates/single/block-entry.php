<?php
$ruby_review_box_position = innovation_ruby_post_review::single_box_position();

echo innovation_ruby_single::single_post_ad_top(); ?>
<div class="entry entry-content clearfix">
	<?php if ( 'left_top' == $ruby_review_box_position ) : ?>
		<?php get_template_part( 'templates/single/block', 'left_top_review' ); ?>
	<?php endif; ?>
	<?php the_content(); ?>
	<?php if ( 'bottom' == $ruby_review_box_position ) : ?>
		<?php get_template_part( 'templates/single/block', 'bottom_review' ); ?>
	<?php endif; ?>
	<div class="clearfix"></div>
	<?php
	wp_link_pages(
		array(
			'before'      => '<div class="single-page-links clearfix">' . esc_html__( 'Pages:', 'innovation' ),
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			'echo'        => true
		)
	);    ?>
</div><!--#entry -->
<?php echo innovation_ruby_single::single_post_ad_bottom();
