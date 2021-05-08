<?php $ruby_count_views = innovation_ruby_post_views::get_views(); ?>
<?php if ( ! empty ( $ruby_count_views ) )  : ?>
	<a href="<?php echo get_permalink() ?>" title="<?php echo esc_attr( get_the_title() ) ?>"><i class="fa fa-eye"></i><span><?php echo esc_html( $ruby_count_views ); ?></span></a>
<?php endif; ?>
