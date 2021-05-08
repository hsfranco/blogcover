<?php
//get options
$ruby_copyright_text = innovation_ruby_util::get_theme_option( 'site_copyright' );
$ruby_copyright_bg   = innovation_ruby_util::get_theme_option( 'site_copyright_bg_color' );

$ruby_copyright_class   = array();
$ruby_copyright_class[] = 'copyright-wrap';

if ( ! empty( $ruby_copyright_bg ) ) {
	$ruby_copyright_class[] = 'is-background-color';
}
$ruby_copyright_class = implode( ' ', $ruby_copyright_class );
?>

<?php if ( ! empty( $ruby_copyright_text ) ) : ?>
	<div id="footer-copyright" class="<?php echo esc_attr( $ruby_copyright_class ); ?>">
		<div class="ruby-container">
			<div class="copyright-inner">
				<p><?php echo html_entity_decode( esc_html( $ruby_copyright_text ) ) ?></p>
			</div>
			<!--#copyright inner -->
		</div>
	</div><!--#copyright wrap -->
<?php endif; ?>