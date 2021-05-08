<?php

//meta box post video config
if ( ! function_exists( 'innovation_ruby_metabox_post_video' ) ) {
	function innovation_ruby_metabox_post_video() {
		return array(
			'id'         => 'innovation_ruby_metabox_video_options',
			'title'      => esc_attr__( 'VIDEO OPTIONS', 'innovation' ),
			'post_types' => array( 'post' ),
			'priority'   => 'default',
			'context'    => 'normal',
			'fields'     => array(
				array(
					'id'   => 'innovation_ruby_single_video_url',
					'name' => esc_attr__( 'Video URL', 'innovation' ),
					'desc' => esc_attr__( 'Input link of video, support: Youtube, Vimeo, DailyMotion', 'innovation' ),
					'type' => 'text',
				),
				array(
					'id'   => 'innovation_ruby_single_self_host_video',
					'name' => esc_attr__( 'Self-Hosted Video', 'innovation' ),
					'desc' => esc_attr__( 'Please upload the mp4, m4v, webm, ogv, wmv, flv video file.', 'innovation' ),
					'type' => 'file_advanced',
					'std'  => ''
				)
			)
		);
	}
}