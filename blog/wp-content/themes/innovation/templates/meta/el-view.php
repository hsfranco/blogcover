<?php
$ruby_count_views = innovation_ruby_post_views::get_views();
?>

<?php if ( ! empty ( $ruby_count_views ) )  : ?>
	<span class="meta-info-el meta-info-view">
		<?php if ( 1 == $ruby_count_views ) : ?>
			<a href="<?php echo get_permalink() ?>" title="<?php echo esc_attr( get_the_title() ) ?>">
				<span><?php esc_html_e( '1 view', 'innovation' ); ?></span>
			</a>
		<?php else : ?>
			<a href="<?php echo get_permalink() ?>" title="<?php echo esc_attr( get_the_title() ) ?>">
				<span><?php echo esc_html( $ruby_count_views ) . ' ' . esc_html__( 'views', 'innovation' ); ?></span>
			</a>
	<?php endif; ?>
	</span><!--#view meta-->
<?php endif; ?>
