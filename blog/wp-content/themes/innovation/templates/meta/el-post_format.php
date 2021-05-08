<?php
$ruby_enable_post_format_icon = innovation_ruby_util::get_theme_option( 'post_format_icon' );

if ( ! empty( $ruby_enable_post_format_icon ) ) {
	if ( has_post_format( 'video' ) ) {
		echo '<span class="post-format-icon is-video-format"><i class="fa fa-play"></i></span>';
	} elseif ( has_post_format( 'audio' ) ) {
		echo '<span class="post-format-icon is-audio-format"><i class="fa fa-volume-up"></i></span>';
	} elseif ( has_post_format( 'gallery' ) ) {
		echo '<span class="post-format-icon is-gallery-format"><i class="fa fa-camera"></i></span>';
	} elseif ( has_post_format( 'link' ) ) {
		echo '<span class="post-format-icon is-link-format"><i class="fa fa-link"></i></span>';
	}
}
