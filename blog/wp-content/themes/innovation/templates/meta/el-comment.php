<?php
if ( comments_open() )  :
	$ruby_count_comment = get_comments_number();
	?>

	<span class="meta-info-el meta-info-comment">
	<a href="<?php echo get_comments_link() ?>">
		<?php if ( 0 == $ruby_count_comment ) : ?>
			<?php esc_attr_e( 'add comment', 'innovation' ); ?>
		<?php elseif ( 1 == $ruby_count_comment ) : ?>
			<?php esc_attr_e( '1 comment', 'innovation' ); ?>
		<?php
		else : ?>
			<?php echo esc_attr( $ruby_count_comment ) . ' ' . esc_attr__( 'comments', 'innovation' ); ?>
		<?php endif; ?>
	</a>
</span><!--#comment meta-->
<?php endif; ?>
