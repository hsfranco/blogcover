<div class="post-thumb-outer">
	<?php if ( is_singular() && ! is_page_template( 'page-composer.php' ) ) : ?>
		<?php echo innovation_ruby_thumbnail::render( 'innovation_ruby_840x500', 'single-thumb' ); ?>
		<?php echo innovation_ruby_thumbnail::render_feat_credit(); ?>
	<?php else : ?>
		<?php echo innovation_ruby_thumbnail::render( 'innovation_ruby_840x500' ); ?>
		<?php $ruby_classic_share_bar_position = innovation_ruby_util::get_theme_option( 'classic_share_bar_position' ); ?>
		<?php get_template_part( 'templates/meta/el', 'post_format' ); ?>
		<?php innovation_ruby_template_part::post_review_info(); ?>
		<?php if ( 'overlay' == $ruby_classic_share_bar_position ) : ?>
			<?php innovation_ruby_template_part::post_share_bar( 'is-absolute', 'is-light-text' ); ?>
		<?php endif; ?>
	<?php endif; ?>
</div>