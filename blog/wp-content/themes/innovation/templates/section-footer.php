<?php
//get options
$ruby_footer_bg           = innovation_ruby_util::get_theme_option( 'footer_background' );
$ruby_fixed_footer        = innovation_ruby_util::get_theme_option( 'fixed_footer' );
$ruby_fixed_footer_mobile = innovation_ruby_util::get_theme_option( 'fixed_footer_mobile' );
$ruby_footer_style        = innovation_ruby_util::get_theme_option( 'footer_style' );
$ruby_footer_text_style   = innovation_ruby_util::get_theme_option( 'footer_text_style' );

//create class
$ruby_class   = array();
$ruby_class[] = 'footer-wrap';
$ruby_class[] = 'footer-style-' . $ruby_footer_style;
$ruby_class[] = $ruby_footer_text_style;
if ( ! empty( $ruby_fixed_footer ) ) {
	$ruby_class[] = 'is-fixed';

	if ( ! empty( $ruby_fixed_footer_mobile ) ) {
		$ruby_class[] = 'enable-fixed-mobile';
	}else {
		$ruby_class[] = 'disable-fixed-mobile';
	}
}
if ( ! empty( $ruby_footer_bg['background-image'] ) ) {
	$ruby_class[] = 'has-bg-image';
}
$ruby_class = implode( ' ', $ruby_class ); ?>

<footer id="footer" class="<?php echo esc_attr( $ruby_class ); ?>" <?php innovation_ruby_schema::makeup( 'footer' ); ?>>

	<?php get_template_part( 'templates/footer/block', 'top_footer' ); ?>

	<?php if ( 'none' != $ruby_footer_style ) : ?>
		<div class="footer-area">
			<?php get_template_part( 'templates/footer/style', esc_attr( $ruby_footer_style ) ); ?>
			<?php get_template_part( 'templates/footer/module', 'copyright' ); ?>
		</div><!--#footer area-->
	<?php endif; ?>

</footer><!--#footer -->