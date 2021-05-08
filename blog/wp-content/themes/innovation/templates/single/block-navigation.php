<?php
$ruby_post_previous = get_adjacent_post( false, '', true );
$ruby_post_next     = get_adjacent_post( false, '', false );
?>
<div class="single-nav row" role="navigation">
	<?php if ( ! empty( $ruby_post_previous ) ) : ?>
		<div class="col-sm-6 col-xs-12 nav-el nav-left">
			<div class="nav-arrow">
				<i class="fa fa-angle-left"></i>
				<span class="nav-sub-title"><?php esc_html_e( 'previous article', 'innovation' ) ?></span>
			</div>
			<h3 class="post-title medium">
				<a href="<?php echo get_permalink($ruby_post_previous->ID) ?>" rel="bookmark" title="<?php echo esc_attr( strip_tags( get_the_title($ruby_post_previous->ID) ) ) ?>">
				<?php echo get_the_title($ruby_post_previous->ID); ?>
				</a>
			</h3><!--#module title-->
		</div><!--# left nav -->
	<?php endif; ?>

	<?php if ( ! empty( $ruby_post_next ) ) : ?>
		<div class="col-sm-6 col-xs-12 nav-el nav-right">
			<div class="nav-arrow">
				<span class="nav-sub-title"><?php esc_html_e( 'next article', 'innovation' ) ?></span>
				<i class="fa fa-angle-right"></i>
			</div>
			<h3 class="post-title medium">
				<a href="<?php echo get_permalink($ruby_post_next->ID) ?>" rel="bookmark" title="<?php echo esc_attr( strip_tags( get_the_title($ruby_post_next->ID) ) ) ?>">
					<?php echo get_the_title($ruby_post_next->ID); ?>
				</a>
			</h3><!--#module title-->
		</div><!--# right nav -->
	<?php endif; ?>
</div><!--#nav wrap -->
<?php wp_reset_postdata();