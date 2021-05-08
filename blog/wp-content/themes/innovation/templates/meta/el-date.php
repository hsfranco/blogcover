<?php
$ruby_date_unix = get_the_time( 'U', get_the_ID() );
?>
<span class="meta-info-el meta-info-date">
	<span class="meta-info-decs"><?php esc_attr_e( 'on', 'innovation' ); ?></span>
	<time class="date updated" datetime="<?php echo date( DATE_W3C, $ruby_date_unix ); ?>"><?php echo get_the_date( '', get_the_ID() ) ?></time>
</span><!--#date meta-->

