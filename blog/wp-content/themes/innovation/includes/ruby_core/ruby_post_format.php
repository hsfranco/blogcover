<?php
/**
 * Class innovation_ruby_post_support
 * This file handling video and audio for post

 */
if ( ! class_exists( 'innovation_ruby_post_format' ) ) {
	class innovation_ruby_post_format {


		/**
		 * @return string
		 * check post format
		 */
		static function check_post_format() {
			$post_format = get_post_format();
			$post_id     = get_the_ID();

			if ( 'video' == $post_format ) {
				$url             = get_post_meta( $post_id, 'innovation_ruby_single_video_url', true );
				$self_host_video = get_post_meta( $post_id, 'innovation_ruby_single_self_host_video', true );

				if ( ! empty( $url ) || ! empty( $self_host_video ) ) {
					return 'video';
				} else {
					return 'thumbnail';
				}
			} elseif ( 'audio' == $post_format ) {
				$url             = get_post_meta( $post_id, 'innovation_ruby_single_audio_url', true );
				$self_host_audio = get_post_meta( $post_id, 'innovation_ruby_single_self_host_audio', true );

				if ( ! empty( $url ) || ! empty( $self_host_audio ) ) {
					return 'audio';
				} else {
					return 'thumb';
				}
			} elseif ( 'gallery' == $post_format ) {
				$gallery = get_post_meta( $post_id, 'innovation_ruby_single_gallery_data', false );
				if ( ! empty( $gallery ) ) {
					return 'gallery';
				} else {
					return 'thumb';
				}
			} else {
				return 'thumb';
			}
		}

		/**
		 * @return string
		 * render audio
		 */
		static function audio_embed() {
			//check audio link
			$post_id         = get_the_ID();
			$audio_url       = get_post_meta( $post_id, 'innovation_ruby_single_audio_url', true );
			$self_host_audio = get_post_meta( $post_id, 'innovation_ruby_single_self_host_audio', true );

			if ( ! empty( $self_host_audio ) ) {
				return self::render_self_hosted_audio( $self_host_audio );
			} else {

				if ( ( 'audio' != get_post_format() ) || empty( $audio_url ) ) {
					return false;
				}

				$ruby_embed = wp_oembed_get( $audio_url, array( 'height' => 288, 'width' => 900 ) );

				if ( ! empty( $ruby_embed ) ) {
					return $ruby_embed;
				} else {
					return false;
				}
			}

		}


		/**
		 * @return string
		 * render video
		 */
		static function video_embed() {
			//check video link
			$post_id         = get_the_ID();
			$video_url       = get_post_meta( $post_id, 'innovation_ruby_single_video_url', true );
			$self_host_video = get_post_meta( $post_id, 'innovation_ruby_single_self_host_video', true );

			$protocol = 'http';
			if ( is_ssl() ) {
				$protocol = 'https';
			}

			if ( ! empty( $self_host_video ) ) {
				return self::render_self_hosted_video( $self_host_video );
			} else {

				if ( 'video' != get_post_format() || empty( $video_url ) ) {
					return false;
				}
				//check server
				$server = self::detect_video_url( $video_url );

				$str = '';
				switch ( $server ) {
					case 'youtube':
						$str .= '<iframe id="rubyYoutbePlayer" src="' . $protocol . '://www.youtube.com/embed/' . self::youtube_id( $video_url ) . '?feature=oembed&amp;wmode=opaque' . esc_attr( self::youtube_time( $video_url ) ) . '"></iframe>';
						break;
					case 'vimeo':
						$str .= '<iframe src="' . $protocol . '://player.vimeo.com/video/' . self::vimeo_id( $video_url ) . '"></iframe>';
						break;
					case 'dailymotion':
						$str .= '<iframe src="' . $protocol . '://www.dailymotion.com/embed/video/' . self::dailymotion_id( $video_url ) . '"></iframe>';
						break;
					default :
						$str .= '<p class="ruby-error">' . esc_html__( 'Sorry, the theme don\'t support that video host', 'innovation' ) . '</p>';
						break;
				}

				return $str;
			}
		}


		/**
		 * @param $video_url
		 *
		 * @return bool|string
		 * get url of video
		 */
		static function detect_video_url( $video_url ) {
			$video_url = strtolower( $video_url );

			//youtube
			if ( strpos( $video_url, 'youtube.com' ) !== false or strpos( $video_url, 'youtu.be' ) !== false ) {
				return 'youtube';
			}

			//dailymotion
			if ( strpos( $video_url, 'dailymotion.com' ) !== false ) {
				return 'dailymotion';
			}

			//vimeo
			if ( strpos( $video_url, 'vimeo.com' ) !== false ) {
				return 'vimeo';
			}

			return false;
		}


		/**
		 * @param $video_url
		 *
		 * @return mixed
		 * get youtube id
		 */
		static function youtube_id( $video_url ) {
			$s = array();
			parse_str( parse_url( $video_url, PHP_URL_QUERY ), $s );

			if ( empty( $s["v"] ) ) {
				$youtube_sl_explode = explode( '?', $video_url );

				$youtube_sl = explode( '/', $youtube_sl_explode[0] );
				if ( ! empty( $youtube_sl[3] ) ) {
					return $youtube_sl [3];
				}

				return $youtube_sl [0];

			} else {
				return $s["v"];
			}
		}


		/**
		 * @param $video_url
		 *
		 * @return string
		 * youtube time
		 */
		static function youtube_time( $video_url ) {
			$s = array();
			parse_str( parse_url( $video_url, PHP_URL_QUERY ), $s );

			if ( ! empty( $s["t"] ) ) {
				if ( strpos( $s["t"], 'm' ) ) {
					$explode_m   = explode( 'm', $s["t"] );
					$min         = trim( $explode_m[0] );
					$explode_sec = explode( 's', $explode_m[1] );
					$sec         = trim( $explode_sec[0] );

					$start_time = ( intval( $min ) * 60 ) + intval( $sec );
				} else {
					$explode_s = explode( 's', $s["t"] );
					$sec       = trim( $explode_s[0] );

					$start_time = $sec;
				}

				return '&start=' . $start_time;
			} else {
				return false;
			}
		}


		/**
		 * @param $video_url
		 *
		 * @return mixed
		 * get vimeo id
		 */
		static function vimeo_id( $video_url ) {
			sscanf( parse_url( $video_url, PHP_URL_PATH ), '/%d', $vimeo_id );

			return $vimeo_id;
		}


		/**
		 * @param $video_url
		 *
		 * @return string
		 * get dailymotion id
		 */
		static function dailymotion_id( $video_url ) {
			$id = strtok( basename( $video_url ), '_' );
			if ( strpos( $id, '#video=' ) !== false ) {
				$video_parts = explode( '#video=', $id );
				if ( ! empty( $video_parts[1] ) ) {
					return $video_parts[1];
				}
			}

			return $id;
		}


		/**
		 * @param $video_id
		 *
		 * @return string
		 * render self hosted video
		 */
		static function render_self_hosted_video( $video_id ) {

			$wp_version = floatval( get_bloginfo( 'version' ) );

			if ( $wp_version < "3.6" ) {
				return '<p class="ruby-error">' . esc_html__( 'Current WordPress version do not support self-hosted video, please update WordPress to latest version to display this video', 'innovation' ) . '</p>';
			}
			$self_hosted_url = wp_get_attachment_url( $video_id );

			$params = array(
				'src'    => $self_hosted_url,
				'width'  => 740,
				'height' => 415
			);

			return wp_video_shortcode( $params );
		}


		/**
		 * @param $audio_id
		 *
		 * @return string
		 * render self hosted audio
		 */
		static function render_self_hosted_audio( $audio_id ) {

			$wp_version = floatval( get_bloginfo( 'version' ) );

			if ( $wp_version < "3.6" ) {
				return '<p class="ruby-error">' . esc_html__( 'Current WordPress version do not support self-hosted video, please update WordPress to latest version to display this video', 'innovation' ) . '</p>';
			}
			$self_hosted_url = wp_get_attachment_url( $audio_id );

			$params = array(
				'src' => $self_hosted_url,
			);

			return wp_audio_shortcode( $params );
		}

	}
}
