<?php if ( comments_open() )  : ?>
	<a href="<?php echo get_comments_link() ?>"><i class="fa fa-comments-o"></i><span><?php echo esc_attr( get_comments_number() ); ?></span></a>
<?php endif; ?>
