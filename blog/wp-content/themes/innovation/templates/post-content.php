<?php
if ( is_single() ) {
	$ruby_class = 'entry entry-content clearfix';
} else {
	$ruby_class = 'entry entry-content post-excerpt clearfix';
} ?>
<div class="<?php echo esc_attr( $ruby_class ); ?>">
	<?php the_content(); ?>
</div>
