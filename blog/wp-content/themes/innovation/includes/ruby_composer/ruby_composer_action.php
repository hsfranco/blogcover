<?php
if ( ! class_exists( 'innovation_ruby_composer_action' ) ) {
	class innovation_ruby_composer_action {

		protected static $instance = null;

		/**
		 * init composer action
		 */
		public function __construct() {
			add_action( 'save_post', array( $this, 'init_composer_data'), 99 );
			add_action( 'current_screen', array( $this, 'init' ) );
		}

		static function get_instance() {
			if ( null == self::$instance ) {
				self::$instance = new self;
			}

			return self::$instance;
		}

		//  init action
		public function init() {
			global $pagenow;
			if ( 'post.php' == $pagenow || 'post-new.php' == $pagenow && get_current_screen()->post_type == 'page' ) {
				add_action( 'admin_head', array( $this, 'backend_composer_data' ) );
			}
		}


		/**
		 * init composer data
		 */
		function init_composer_data() {

			if ( empty( $_POST['post_ID'] ) ) {
				return false;
			}

			$post_id     = esc_attr( $_POST['post_ID'] );
			$is_autosave = wp_is_post_autosave( $post_id );
			$is_revision = wp_is_post_revision( $post_id );

			$is_valid_nonce = ( isset( $_POST['rb_meta_nonce'] ) && wp_verify_nonce( $_POST['rbc_meta_nonce'], basename( __FILE__ ) ) ) ? 'true' : 'false';
			if ( $is_autosave || $is_revision || ! $is_valid_nonce ) {
				return false;
			}

			if ( empty( $_POST['post_type'] ) || 'page' != $_POST['post_type'] || ( ! empty( $_POST['action'] ) && 'inline-save' == $_POST['action'] ) ) {
				return false;
			}

			if ( empty( $_POST['rbc_js_loaded'] ) ) {
				return false;
			}


			$ruby_composer_data = array();

			if ( ! isset( $_POST['innovation_ruby_section_order'] ) ) {
				if ( 'page-composer.php' == get_post_meta( $post_id, '_wp_page_template', true ) ) {
					delete_post_meta( $post_id, 'innovation_ruby_composer_page_data' );
				}

				return false;
			};

			if ( ! array( $_POST['innovation_ruby_section_order'] ) ) {
				return false;
			}

			foreach ( $_POST['innovation_ruby_section_order'] as $id ) {

				// sanitize id
				$id = sanitize_text_field( $id );

				// get section type
				if ( ! isset( $_POST[ 'innovation_ruby_section_' . $id ] ) ) {
					return false;
				}

				$section_type = sanitize_text_field( $_POST[ 'innovation_ruby_section_' . $id ] );

				// add sidebar option
				if ( $section_type == 'section_has_sidebar' ) {

					// default value
					$section_sidebar          = '';
					$section_sidebar_position = '';

					if ( ! empty ( $_POST[ 'innovation_ruby_sidebar_' . $id ] ) ) {
						$section_sidebar = sanitize_text_field( $_POST[ 'innovation_ruby_sidebar_' . $id ] );
					}
					if ( ! empty( $_POST[ 'innovation_ruby_sidebar_position_' . $id ] ) ) {
						$section_sidebar_position = sanitize_text_field( $_POST[ 'innovation_ruby_sidebar_position_' . $id ] );
					}

					$ruby_composer_data[ $id ]['section_sidebar']          = $section_sidebar;
					$ruby_composer_data[ $id ]['section_sidebar_position'] = $section_sidebar_position;
				}

				$ruby_composer_data[ $id ]['section_type'] = $section_type;
				$ruby_composer_data[ $id ]['section_id']   = $id;


				// get child block
				if ( ! isset( $_POST['innovation_ruby_block_order'][ $id ] ) ) {
					continue;
				}

				$blocks_of_section = array_map( 'sanitize_text_field', $_POST['innovation_ruby_block_order'][ $id ] );

				// get all option and block
				$blocks = array();
				if ( is_array( $blocks_of_section ) ) {
					foreach ( $blocks_of_section as $block ) {
						$block_name = 'innovation_ruby_block_' . $block;

						// get block name
						$name                           = sanitize_text_field( $_POST[ $block_name ] );
						$blocks[ $block ]['block_name'] = $name;
						$blocks[ $block ]['block_id']   = $block;

						if ( isset( $_POST['innovation_ruby_block_option'][ $block_name ] ) ) {
							$block_options = $_POST['innovation_ruby_block_option'][ $block_name ];

							// get block option
							foreach ( $block_options as $option_name => $option ) {
								$option_name                                       = sanitize_text_field( $option_name );
								$option                                            = $this->sanitize_input( $option_name, $option );
								$blocks[ $block ]['block_options'][ $option_name ] = $option;
							}
						}
					}
				}

				$ruby_composer_data[ $id ]['blocks'] = $blocks;
			}

			// save composer data
			$this->save_composer_data( $post_id, $ruby_composer_data );
		}


		/**
		 * @param $page_id
		 * @param $composer_data
		 * save page composer to database
		 */
		public function save_composer_data( $page_id, $composer_data ) {
			delete_post_meta( $page_id, 'innovation_ruby_composer_page_data' );
			update_post_meta( $page_id, 'innovation_ruby_composer_page_data', $composer_data );
		}


		/**
		 * @param $page_id
		 *
		 * @return mixed
		 * get page composer as array value
		 */
		static function get_composer_data( $page_id ) {
			return get_post_meta( $page_id, 'innovation_ruby_composer_page_data', true );
		}


		/**
		 * get data for backend
		 */
		public function backend_composer_data() {

			global $post;

			if ( isset( $post->ID ) && 'page-composer.php' == get_post_meta( $post->ID, '_wp_page_template', true ) ) {
				$page_composer_data = self::get_composer_data( $post->ID );
				$page_composer_data = stripslashes_deep( $page_composer_data );
			}

			if ( empty( $page_composer_data ) ) {
				$page_composer_data = array();
			}

			wp_localize_script( 'innovation_ruby_composer_script', 'innovation_ruby_composer_page_data', $page_composer_data );
		}


		/**
		 * @param string $option_name
		 * @param string $option
		 *
		 * @return string
		 * sanitize tn page composer
		 */
		function  sanitize_input( $option_name = '', $option = '' ) {
			switch ( $option_name ) {
				case 'custom_html' :
				case 'short_code' :
				case 'ad_script' :
					return addslashes( $option );
				case 'title_url'  :
				case 'image_url'  :
				case 'image_link' :
					return esc_url( $option );
				case 'category_ids' :
					$options = array();
					if ( is_array( $option ) ) {
						foreach ( $option as $option_el ) {
							$options[] = sanitize_text_field( $option_el );
						}
					}

					return $options;
				default :
					return sanitize_text_field( $option );
			}
		}
	}
}

innovation_ruby_composer_action::get_instance();