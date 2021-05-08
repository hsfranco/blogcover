<?php

//get blog options
$ruby_cate_id   = innovation_ruby_util::get_page_cate_id();
$ruby_cate_name = get_cat_name( $ruby_cate_id );
$ruby_cate_desc =  category_description();
$ruby_header_bg = innovation_ruby_util::get_theme_option( 'category_header_background_' . $ruby_cate_id );
?>

<?php if ( ! empty( $ruby_header_bg['url'] )) : ?>
<div class="archive-page-header is-light-text has-bg-image" style="background-image: url(<?php echo esc_url( $ruby_header_bg['url'] ); ?>)">
<?php echo innovation_ruby_thumbnail::render_pattern(); ?>
<?php else : ?>
<div class="archive-page-header">
<?php endif; ?>
	<div class="archive-title-wrap">
		<h1 class="archive-title post-title">
			<?php echo esc_attr( $ruby_cate_name ); ?>
		</h1>
		<?php if(!empty($ruby_cate_desc)) :  ?>
			<div class="archive-desc">
				<?php echo html_entity_decode( $ruby_cate_desc ); ?>
			</div>
		<?php endif; ?>
	</div>
</div>

