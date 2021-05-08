<?php
$ruby_author_id          = get_the_author_meta( 'ID' );
$ruby_author_social_data = innovation_ruby_social_data::author_data( $ruby_author_id );
$ruby_author_decs        = get_the_author_meta( 'description' );
$ruby_render_social      = innovation_ruby_social_bar::render( $ruby_author_social_data );

if ( empty( $ruby_author_decs ) && empty( $ruby_render_social ) ) {
	return false;
} ?>
<div class="box-author clearfix">
	<div class="author-thumb">
		<?php echo get_avatar( get_the_author_meta( 'user_email' ), 150, '', get_the_author_meta( 'display_name' ) ); ?>
	</div>
	<div class="box-author-content">
		<div class="author-title post-title">
			<h3>
				<span class="meta-info-author-line"><?php esc_attr_e( 'The author', 'innovation' ) ?></span>
				<a href="<?php echo get_author_posts_url( $ruby_author_id ); ?>"><?php echo get_the_author_meta( 'display_name' ) ?></a>
			</h3>
		</div>
		<?php if ( ! empty( $ruby_render_social ) ) : ?>
			<div class="author-social"><?php echo innovation_ruby_social_bar::render( $ruby_author_social_data ); ?></div>
		<?php endif; ?>
		<?php if ( ! empty( $ruby_author_decs ) ) : ?>
			<div class="author-description"><?php echo apply_filters( 'the_content', $ruby_author_decs ); ?></div>
		<?php endif; ?>
	</div>
</div>
