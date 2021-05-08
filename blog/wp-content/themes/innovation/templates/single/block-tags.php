<?php
//get tag
$ruby_tags = get_the_tags();
?>
<?php if ( ! empty( $ruby_tags ) && is_array( $ruby_tags ) ) : ?>
	<div class="single-tag-wrap post-title">
		<span class="tags-title"><?php esc_html_e( 'Tags :', 'innovation' ) ?></span>
		<?php
		foreach ( $ruby_tags as $ruby_tag ) {
			$ruby_tag_link = get_tag_link( $ruby_tag->term_id );
			echo '<a href="' . esc_url( $ruby_tag_link ) . '" title="' . esc_attr( strip_tags( $ruby_tag->name ) ) . '">' . esc_attr( $ruby_tag->name ) . '</a>';
		} ?>
	</div>
<?php endif; ?>