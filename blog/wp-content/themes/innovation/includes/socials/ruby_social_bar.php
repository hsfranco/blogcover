<?php

if ( ! class_exists( 'innovation_ruby_social_bar' ) ) {
	class innovation_ruby_social_bar {

		/**
		 * @param      $social_data
		 * @param      $class
		 * @param bool $new_tab
		 * @param bool $enable_color
		 *
		 * @return string
		 * render social bar
		 */
		static function render( $social_data, $class = '', $new_tab = true, $enable_color = false ) {
			//check empty
			if ( empty( $social_data ) ) {
				return false;
			}

			if ( $new_tab == true ) {
				$newtab = 'target="_blank"';
			} else {
				$newtab = '';
			}

			extract( shortcode_atts( array(
				'website'     => '',
				'facebook'    => '',
				'twitter'     => '',
				'youtube'     => '',
				'pinterest'   => '',
				'bloglovin'   => '',
				'linkedin'    => '',
				'flickr'      => '',
				'skype'       => '',
				'tumblr'      => '',
				'vkontakte'   => '',
				'vimeo'       => '',
				'instagram'   => '',
				'snapchat'    => '',
				'viadeo'      => '',
				'reddit'      => '',
				'rss'         => '',
			), $social_data ) );

			$str        = '';
			$str_social = '';

			if ( ! empty( $website ) ) {
				$str_social .= '<a class="color-website" title="Website" href="' . esc_url( $website ) . '" ' . $newtab . '><i class="fa fa-link"></i></a>';
			}
			if ( ! empty( $facebook ) ) {
				$str_social .= '<a class="color-facebook" title="Facebook" href="' . esc_url( $facebook ) . '" ' . $newtab . '><i class="fa fa-facebook"></i></a>';
			}
			if ( ! empty( $twitter ) ) {
				$str_social .= '<a class="color-twitter" title="Twitter" href="' . esc_url( $twitter ) . '" ' . $newtab . '><i class="fa fa-twitter"></i></a>';
			}
			if ( ! empty( $pinterest ) ) {
				$str_social .= '<a class="color-pinterest" title="Pinterest" href="' . esc_url( $pinterest ) . '" ' . $newtab . '><i class="fa fa-pinterest"></i></a>';
			}
			if ( ! empty( $bloglovin ) ) {
				$str_social .= '<a class="color-bloglovin" title="Bloglovin" href="' . esc_url( $bloglovin ) . '" ' . $newtab . '><i class="fa fa-heart"></i></a>';
			}
			if ( ! empty( $instagram ) ) {
				$str_social .= '<a class="color-instagram" title="Instagram" href="' . esc_url( $instagram ) . '" ' . $newtab . '><i class="fa fa-instagram"></i></a>';
			}
			if ( ! empty( $youtube ) ) {
				$str_social .= '<a class="color-youtube" title="Youtube" href="' . esc_url( $youtube ) . '" ' . $newtab . '><i class="fa fa-youtube"></i></a>';
			}
			if ( ! empty( $vimeo ) ) {
				$str_social .= '<a class="color-vimeo" title="Vimeo" href="' . esc_url( $vimeo ) . '" ' . $newtab . '><i class="fa fa-vimeo-square"></i></a>';
			}
			if ( ! empty( $linkedin ) ) {
				$str_social .= '<a class="color-linkedin" title="LinkedIn" href="' . esc_url( $linkedin ) . '" ' . $newtab . '><i class="fa fa-linkedin"></i></a>';
			}
			if ( ! empty( $tumblr ) ) {
				$str_social .= '<a class="color-tumblr" title="Tumblr" href="' . esc_url( $tumblr ) . '" ' . $newtab . '><i class="fa fa-tumblr"></i></a>';
			}
			if ( ! empty( $vkontakte ) ) {
				$str_social .= '<a class="color-vk" title="vkontakte" href="' . esc_url( $vkontakte ) . '" ' . $newtab . '><i class="fa fa-vk"></i></a>';
			}
			if ( ! empty( $flickr ) ) {
				$str_social .= '<a class="color-flickr" title="Flickr" href="' . esc_url( $flickr ) . '" ' . $newtab . '><i class="fa fa-flickr"></i></a>';
			}
			if ( ! empty( $skype ) ) {
				$str_social .= '<a class="color-skype" title="Skype" href="' . esc_url( $skype ) . '" ' . $newtab . '><i class="fa fa-skype"></i></a>';
			}
			if ( ! empty( $snapchat ) ) {
				$str_social .= '<a class="color-snapchat" title="Snapchat" href="' . esc_url( $snapchat ) . '" ' . $newtab . '><i class="fa fa-snapchat-ghost"></i></a>';
			}
			if ( ! empty( $viadeo ) ) {
				$str_social .= '<a class="color-viadeo" title="Viadeo" href="' . esc_url( $viadeo ) . '" ' . $newtab . '><i class="fa fa-viadeo"></i></a>';
			}
			if ( ! empty( $reddit ) ) {
				$str_social .= '<a class="color-reddit" title="Reddit" href="' . esc_url( $reddit ) . '" ' . $newtab . '><i class="fa fa-reddit-alien"></i></a>';
			}
			if ( ! empty( $rss ) ) {
				$str_social .= '<a class="color-rss" title="Rss" href="' . esc_url( $rss ) . '" ' . $newtab . '><i class="fa fa-rss"></i></a>';
			}
			if ( ! empty( $str_social ) ) {

				$class_name = array();

				$class_name[] = 'social-link-info clearfix';
				if ( ! empty( $class ) ) {
					$class_name[] = $class;
				}

				if ( ! empty( $enable_color ) ) {
					$class_name[] = 'is-color';
				}

				$class_name = implode( ' ', $class_name );

				$str .= '<div class="' . esc_attr( $class_name ) . '">';
				$str .= $str_social;
				$str .= '</div>';
			}

			return $str;
		}
	}
}
