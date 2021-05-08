<?php
//get blog options
$ruby_cate_id   = innovation_ruby_util::get_page_cate_id();
$ruby_cate_name = get_cat_name( $ruby_cate_id );
$ruby_cate_desc =  category_description();
?>
<div class="archive-page-header-small ruby-container">
	<h1 class="archive-title post-title">
		<?php echo esc_attr( $ruby_cate_name ); ?>
	</h1>
	<?php if(!empty($ruby_cate_desc)) :  ?>
		<div class="archive-desc">
			<?php echo html_entity_decode( $ruby_cate_desc ); ?>
		</div>
	<?php endif; ?>
</div>