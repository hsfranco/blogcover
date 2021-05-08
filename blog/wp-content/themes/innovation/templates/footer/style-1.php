<?php if ( is_active_sidebar( 'innovation_ruby_sidebar_footer_1' ) || is_active_sidebar( 'innovation_ruby_sidebar_footer_2' ) || is_active_sidebar( 'innovation_ruby_sidebar_footer_3' ) || is_active_sidebar( 'innovation_ruby_sidebar_footer_4' ) )  : ?>
	<div class="footer-area-inner">
		<div class="ruby-container row">
			<div class="col-sm-12 col-md-6">
			<div class="sidebar-footer sidebar-wrap col-sm-6 col-xs-12" role="complementary">
				<?php if ( is_active_sidebar( 'innovation_ruby_sidebar_footer_1' ) ) {
					dynamic_sidebar( 'innovation_ruby_sidebar_footer_1' );
				} ?>
			</div>
			<div class="sidebar-footer sidebar-wrap col-sm-6 col-xs-12" role="complementary">
				<?php if ( is_active_sidebar( 'innovation_ruby_sidebar_footer_2' ) ) {
					dynamic_sidebar( 'innovation_ruby_sidebar_footer_2' );
				} ?>
			</div>
			</div>
			<div class="col-sm-12 col-md-6">
			<div class="sidebar-footer sidebar-wrap col-sm-6 col-xs-12" role="complementary">
				<?php if ( is_active_sidebar( 'innovation_ruby_sidebar_footer_3' ) ) {
					dynamic_sidebar( 'innovation_ruby_sidebar_footer_3' );
				} ?>
			</div>

			<div class="sidebar-footer sidebar-wrap col-sm-6 col-xs-12" role="complementary">
				<?php if ( is_active_sidebar( 'innovation_ruby_sidebar_footer_4' ) ) {
					dynamic_sidebar( 'innovation_ruby_sidebar_footer_4' );
				} ?>
			</div>
			</div>
		</div>
	</div>
<?php endif; ?>