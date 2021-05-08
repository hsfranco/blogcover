<?php
/**
 * this file create chema makup for theme
 */
if ( ! class_exists( 'innovation_ruby_schema' ) ) {
	class innovation_ruby_schema {

		/**
		 * @param $context
		 * @param $ruby_echo
		 * @return bool|string
		 * schema makeup, good for search engine
		 */
		static function makeup( $context, $ruby_echo = true ) {

			$str  = '';
			$data = array();

			$ruby_http = 'http';

			if ( is_ssl() ) {
				$ruby_http = 'https';
			}

			switch ( $context ) {
				case 'body' :
					$data['itemscope'] = true;
					$data['itemtype']  = $ruby_http . '://schema.org/WebPage';
					break;

				case 'article' :
					$data['itemscope'] = true;
					$data['itemtype']  = $ruby_http . '://schema.org/NewsArticle';
					break;

				case 'review' :
					$data['itemscope'] = true;
					$data['itemtype']  = $ruby_http . '://schema.org/Review';
					break;

				case 'menu':
					$data['role']      = 'navigation';
					$data['itemscope'] = true;
					$data['itemtype']  = $ruby_http . '://schema.org/SiteNavigationElement';
					break;

				case 'header':
					$data['role']      = 'banner';
					$data['itemscope'] = true;
					$data['itemtype']  = $ruby_http . '://schema.org/WPHeader';
					break;

				case 'sidebar':
					$data['role']      = 'complementary';
					$data['itemscope'] = true;
					$data['itemtype']  = $ruby_http . '://schema.org/WPSideBar';
					break;

				case 'footer':
					$data['itemscope'] = true;
					$data['itemtype']  = $ruby_http . '://schema.org/WPFooter';
					break;

				case 'logo' :
					$data['itemscope'] = true;
					$data['itemtype']  = $ruby_http . '://schema.org/Organization';
					break;
			};

			if ( empty( $data ) ) {
				return false;
			}

			foreach ( $data as $k => $v ) {
				if ( true === $v ) {
					$str .= ' ' . $k . ' ';
				} else {
					$str .= ' ' . $k . '="' . $v . '" ';
				}
			}

			//check & return
			if ( true === $ruby_echo ) {
				echo html_entity_decode( $str );
			} else {
				return $str;
			}
		}
	}
}