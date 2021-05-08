<?php
$ruby_tags = get_the_tags();
?>

<?php if ( ! empty( $ruby_tags ) || is_array( $ruby_tags ) ) : ?>
	<span class="meta-info-el meta-info-tag">
	<i class="fa fa-tags"></i>
	<span>
		<?php foreach ( $ruby_tags as $ruby_tag ) : ?>
			<?php $ruby_tag_link = get_tag_link( $ruby_tag->term_id ); ?>
			<a href="<?php echo esc_url($ruby_tag_link); ?>" title="<?php esc_attr( $ruby_tag->name ) ?>"><?php echo esc_html( $ruby_tag->name ); ?></a>
		<?php endforeach; ?>
	</span>
</span><!--#tag meta-->
<?php endif; ?>