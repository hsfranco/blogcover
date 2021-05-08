<?php
if ( ! class_exists( 'innovation_ruby_social_data' ) ) {
	class innovation_ruby_social_data {
		static function author_data( $author_id ) {

			if ( empty( $author_id ) ) {
				return false;
			}

			$data_social               = array();
			$data_social['website']    = get_the_author_meta( 'user_url', $author_id );
			$data_social['facebook']   = get_the_author_meta( 'facebook', $author_id );
			$data_social['twitter']    = get_the_author_meta( 'twitter', $author_id );
			$data_social['instagram']  = get_the_author_meta( 'instagram', $author_id );
			$data_social['pinterest']  = get_the_author_meta( 'pinterest', $author_id );
			$data_social['linkedin']   = get_the_author_meta( 'linkedin', $author_id );
			$data_social['tumblr']     = get_the_author_meta( 'tumblr', $author_id );
			$data_social['flickr']     = get_the_author_meta( 'flickr', $author_id );
			$data_social['skype']      = get_the_author_meta( 'skype', $author_id );
			$data_social['snapchat']   = get_the_author_meta( 'snapchat', $author_id );
			$data_social['myspace']    = get_the_author_meta( 'myspace', $author_id );
			$data_social['youtube']    = get_the_author_meta( 'youtube', $author_id );
			$data_social['bloglovin']  = get_the_author_meta( 'bloglovin', $author_id );
			$data_social['digg']       = get_the_author_meta( 'digg', $author_id );
			$data_social['dribbble']   = get_the_author_meta( 'dribbble', $author_id );
			$data_social['soundcloud'] = get_the_author_meta( 'soundcloud', $author_id );
			$data_social['vimeo']      = get_the_author_meta( 'vimeo', $author_id );
			$data_social['reddit']     = get_the_author_meta( 'reddit', $author_id );
			$data_social['vkontakte']  = get_the_author_meta( 'vkontakte', $author_id );
			$data_social['whatsapp']   = get_the_author_meta( 'whatsapp', $author_id );
			$data_social['rss']        = get_the_author_meta( 'rss', $author_id );

			return $data_social;
		}


		static function web_data() {
			$data_social = array();


			if ( 1 == innovation_ruby_util::get_theme_option( 'site_social' ) ) {
				$data_social['facebook']    = innovation_ruby_util::get_theme_option( 'innovation_ruby_facebook' );
				$data_social['twitter']     = innovation_ruby_util::get_theme_option( 'innovation_ruby_twitter' );
				$data_social['pinterest']   = innovation_ruby_util::get_theme_option( 'innovation_ruby_pinterest' );
				$data_social['bloglovin']   = innovation_ruby_util::get_theme_option( 'innovation_ruby_bloglovin' );
				$data_social['instagram']   = innovation_ruby_util::get_theme_option( 'innovation_ruby_instagram' );
				$data_social['youtube']     = innovation_ruby_util::get_theme_option( 'innovation_ruby_youtube' );
				$data_social['vimeo']       = innovation_ruby_util::get_theme_option( 'innovation_ruby_vimeo' );
				$data_social['flickr']      = innovation_ruby_util::get_theme_option( 'innovation_ruby_flickr' );
				$data_social['linkedin']    = innovation_ruby_util::get_theme_option( 'innovation_ruby_linkedin' );
				$data_social['tumblr']      = innovation_ruby_util::get_theme_option( 'innovation_ruby_tumblr' );
				$data_social['vkontakte']   = innovation_ruby_util::get_theme_option( 'innovation_ruby_vkontakte' );
				$data_social['skype']       = innovation_ruby_util::get_theme_option( 'innovation_ruby_skype' );
				$data_social['snapchat']    = innovation_ruby_util::get_theme_option( 'innovation_ruby_snapchat' );
				$data_social['viadeo']      = innovation_ruby_util::get_theme_option( 'innovation_ruby_viadeo' );
				$data_social['reddit']      = innovation_ruby_util::get_theme_option( 'innovation_ruby_reddit' );
				$data_social['rss']         = innovation_ruby_util::get_theme_option( 'innovation_ruby_rss' );
			}

			return $data_social;
		}

	}
}