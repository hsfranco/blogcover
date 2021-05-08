<?php
//meta box post audio config
if ( ! function_exists( 'innovation_ruby_metabox_post_audio' ) ) {
	function innovation_ruby_metabox_post_audio() {
		return array(
			'id'         => 'innovation_ruby_metabox_audio_options',
			'title'      => esc_attr__( 'AUDIO OPTIONS', 'innovation' ),
			'post_types' => array( 'post' ),
			'priority'   => 'default',
			'context'    => 'normal',
			'fields'     => array(
				array(
					'name' => esc_attr__( 'audio URL', 'innovation' ),
					'desc' => esc_attr__( 'Input link of audio, support: SoundCloud, MixCloud', 'innovation' ),
					'id'   => 'innovation_ruby_single_audio_url',
					'type' => 'text',
				),
				array(
					'id'   => 'innovation_ruby_single_self_host_audio',
					'name' => esc_attr__( 'Self-Hosted Audio', 'innovation' ),
					'desc' => esc_attr__( 'Please upload the mp3, ogg, wma, m4a, wav audio file.', 'innovation' ),
					'type' => 'file_advanced',
					'std'  => ''
				)
			)
		);
	}
}