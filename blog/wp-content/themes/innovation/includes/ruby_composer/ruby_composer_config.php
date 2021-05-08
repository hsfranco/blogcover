<?php

if ( ! class_exists( 'innovation_ruby_composer_config' ) ) {
	class innovation_ruby_composer_config {

		protected static $instance = null;

		/**
		 * init page composer
		 */
		public function __construct() {
			add_action( 'current_screen', array( $this, 'init' ) );
		}


		static function get_instance() {
			if ( null == self::$instance ) {
				self::$instance = new self;
			}

			return self::$instance;
		}

		// init composer
		public function init() {

			if ( ! function_exists( 'innovation_register_composer_meta' ) ) {
				return false;
			}

			global $pagenow;
			if ( ( 'post.php' == $pagenow || 'post-new.php' == $pagenow ) && get_current_screen()->post_type == 'page' ) {
				add_action( 'admin_footer', array( $this, 'composer_js_template' ) );
				add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_composer_scripts' ) );
			}
		}


		// enqueue_script_gutenberg
		public function enqueue_composer_scripts() {

			wp_enqueue_style( 'innovation_ruby_composer_style', get_template_directory_uri() . '/includes/ruby_composer/assets/composer-style.css', array(), INNOVATION_THEME_VERSION, 'all' );
			wp_register_script( 'innovation_ruby_composer_script', get_template_directory_uri() . '/includes/ruby_composer/assets/composer-script.js', array(
				'jquery',
				'wp-util'
			), INNOVATION_THEME_VERSION, true );
			wp_localize_script( 'innovation_ruby_composer_script', 'composer_params', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
			$this->page_composer_template();
			innovation_ruby_composer_setup::get_instance();

			wp_enqueue_script( 'innovation_ruby_composer_script' );
		}

		// js template
		public function composer_js_template() {
			?>
			<script type="text/html" id="tmpl-innovation-composer-switch-btn">
				<?php $this->switch_mode_button(); ?>
			</script>
			<script type="text/html" id="tmpl-innovation-composer-panel">
				<?php $this->composer_panel(); ?>
			</script>
			<script type="text/html" id="tmpl-rbc-js-loaded">
				<input type="hidden" class="ruby-field" name="rbc_js_loaded" value="1">
			</script>
		<?php
		}


		// switch mode button
		public function switch_mode_button() {
			$str = '';
			$str .= '<div id="innovation-composer-switch-mode" class="innovation-composer-switch-mode">';
			$str .= '<a id="innovation_ruby_switch_mode" title="Switch to Ruby Composer" class="ruby-composer-switch-btn" href="#"><i class="dashicons dashicons-migrate"></i>';
			$str .= esc_html__( 'Ruby Composer', 'innovation' );
			$str .= '</a></div>';

			echo html_entity_decode( $str );

		}


		// composer panel
		public function composer_panel() {
			$str = '';

			$str .= '<div id="innovation_ruby_composer_editor" class="ruby-composer-editor ruby-composer-gutenberg is-hidden">';
			$str .= '<div class="ruby-composer-title"><h3>' . esc_html__( 'Ruby Composer', 'innovation' ) . '</h3></div>';
			$str .= '<div class="ruby-composer-loading"></div>';
			$str .= '<div class="ruby-toolbox"><a href="#" id="page_composer_section_select" class="add-section-select">' . esc_html__( 'select your section', 'innovation' ) . '</a>';
			$str .= '<div id="innovation_ruby_section_select" class="section-select-wrap"></div>';
			$str .= '</div>';
			$str .= '<div class="ruby-sections-wrap">';
			$str .= '<div class="ruby-section-empty">' . esc_html__( 'Click on <strong>"SECTION"</strong> images to create a new section.', 'innovation' ) . '</div>';
			$str .= '</div>';
			$str .= '</div>';

			echo html_entity_decode( $str );
		}


		/**
		 * create page composer field data
		 */
		public function page_composer_template() {
			$template = array();


			$str = '';
			$str .= '<div class="ruby-block-item">';
			$str .= '<input type="hidden" class="ruby-block-order">';
			$str .= '<input type="hidden" class="ruby-block-name">';
			$str .= '<div class="ruby-block-bar">';
			$str .= '<i class="ruby-block-move">#</i>';
			$str .= '<div class="ruby-block-label"></div>';
			$str .= '<div class="ruby-block-toolbox">';
			$str .= '<a class="ruby-block-open-option" href="#">+</a>';
			$str .= '<a class="ruby-block-delete" href="#">x</a>';
			$str .= '</div>';
			$str .= '</div>';
			$str .= '<div class="ruby-block-options-wrap hidden">';
			$str .= '<div class="ruby-block-description"></div>';
			$str .= '<div class="ruby-filter-link"></div>';
			$str .= '<div class="ruby-block-content"></div>';
			$str .= '</div>';
			$str .= '</div>';
			$template['block'] = $str;

			// block option
			$str = '';
			$str .= '<div class="ruby-block-option">';
			$str .= '<div class="ruby-block-option-label-wrap">';
			$str .= '<label class="ruby-block-option-label"></label>';
			$str .= '<div class="ruby-block-option-description"></div>';
			$str .= '</div>';
			$str .= '<div class="ruby-block-option-inner"></div>';
			$str .= '</div>';
			$template['block_option'] = $str;

			// Fields Input
			$template['input']['text']         = '<input class="ruby-field" type="text">'; // text
			$template['input']['num']          = '<input class="ruby-field" type="number" name="quantity" min="1">'; // number
			$template['input']['textarea']     = '<textarea class="ruby-field" rows="9"></textarea>'; // text area
			$template['input']['color']        = '<input class="ruby-field" type="text">'; // text
			$template['input']['date']         = '<input class="ruby-field" type="text" name="datepicker"/>'; // text
			$template['input']['category']     = innovation_ruby_theme_config::category_dropdown_select();// category
			$template['input']['categories']   = innovation_ruby_theme_config::categories_dropdown_select();
			$template['input']['show_options'] = '<select class="ruby-field" ><option  selected  value="0">' . esc_attr__( 'Disable', 'innovation' ) . '</option><option value="1">' . esc_attr__( 'Enable', 'innovation' ) . '</option></select>';
			$template['input']['authors']      = innovation_ruby_theme_config::author_dropdown_select();// author
			$template['input']['orderby']      = '<select class="ruby-field">' . innovation_ruby_theme_config::orderby_dropdown_select() . '</select>';// sorted

			// pagination
			$template['input']['pagination']['none']      = '<option value="0">' . esc_attr__( 'No Pagination', 'innovation' ) . '</option>';
			$template['input']['pagination']['load_more'] = '<option selected class="next_prev" value="next_prev">' . esc_attr__( 'Next Prev', 'innovation' ) . '</option>';
			$template['input']['pagination']['next_prev'] = '<option class="load_more" value="load_more">' . esc_attr__( 'Load More', 'innovation' ) . '</option>';
			$template['input']['block_style']             = '<select class="ruby-field" ><option selected value="0">' . esc_attr__( 'Default', 'innovation' ) . '</option><option value="1">' . esc_attr__( 'Dark', 'innovation' ) . '</option></select>';
			// code box
			$template['input']['wrap_mode'] = '<select class="ruby-field" ><option value="0" selected>' . esc_attr__( 'Has Wrapper', 'innovation' ) . '</option><option value="1">' . esc_attr__( 'Full Width', 'innovation' ) . '</option></select>';

			// Fields Title
			$template['title']['title']                 = esc_attr__( 'Title', 'innovation' );
			$template['title']['title_url']             = esc_attr__( 'Title Url', 'innovation' );
			$template['title']['sub_title']             = esc_attr__( 'Sub Title', 'innovation' );
			$template['title']['color']                 = esc_attr__( 'Title bar color', 'innovation' );
			$template['title']['category_id']           = esc_attr__( 'Category Filter', 'innovation' );
			$template['title']['child_category']        = esc_attr__( 'Show Child Categories', 'innovation' );
			$template['title']['num_of_child_category'] = esc_attr__( 'Number of Child Category', 'innovation' );
			$template['title']['category_ids']          = esc_attr__( 'Multiple Categories Filter', 'innovation' );
			$template['title']['tags']                  = esc_attr__( 'Filter By Tags Slug', 'innovation' );
			$template['title']['authors']               = esc_attr__( 'Authors Filter', 'innovation' );
			$template['title']['posts_per_page']        = esc_attr__( 'Number Of Posts', 'innovation' );
			$template['title']['num_of_slider']         = esc_attr__( 'Number Of Slider', 'innovation' );
			$template['title']['offset']                = esc_attr__( 'Post Offset', 'innovation' );
			$template['title']['orderby']               = esc_attr__( 'Sort Order', 'innovation' );
			$template['title']['excerpt']               = esc_attr__( 'Posts Excerpt', 'innovation' );
			$template['title']['pagination']            = esc_attr__( 'Pagination', 'innovation' );
			$template['title']['readmore']              = esc_attr__( 'Read More Button', 'innovation' );
			$template['title']['block_style']           = esc_attr__( 'Block Style', 'innovation' );
			$template['title']['big_first']             = esc_attr__( '1st Classic Post', 'innovation' );

			// block static image
			$template['title']['content']      = esc_attr__( 'Content', 'innovation' );
			$template['title']['image_url']    = esc_attr__( 'Image URL', 'innovation' );
			$template['title']['image_link']   = esc_attr__( 'Image Link', 'innovation' );
			$template['title']['button_title'] = esc_attr__( 'Button Title', 'innovation' );

			// block code box
			$template['title']['wrap_mode']   = esc_attr__( 'Block Wrapper Mode', 'innovation' );
			$template['title']['custom_html'] = esc_attr__( 'Custom HTML', 'innovation' );
			$template['title']['short_code']  = esc_attr__( 'ShortCodes', 'innovation' );

			// block ads
			$template['title']['ad_title']  = esc_attr__( 'Ad title', 'innovation' );
			$template['title']['ad_url']    = esc_attr__( 'Ad URL', 'innovation' );
			$template['title']['ad_image']  = esc_attr__( 'Ad Attachment URL', 'innovation' );
			$template['title']['ad_script'] = esc_attr__( 'Adsense Script', 'innovation' );

			// Fields Description
			$template['desc']['title']                 = esc_attr__( 'Optional - input title for this block', 'innovation' );
			$template['desc']['title_url']             = esc_attr__( 'Optional - custom url for this block (when the module title is clicked)', 'innovation' );
			$template['desc']['sub_title']             = esc_attr__( 'Optional - display sub title of block', 'innovation' );
			$template['desc']['color']                 = esc_attr__( 'Select color for title bar (in HEX format ie: #333333)', 'innovation' );
			$template['desc']['category_id']           = esc_attr__( 'Select the category for this block', 'innovation' );
			$template['desc']['child_category']        = esc_attr__( 'This will show a menu at the top of the block that contains the child categories of the selected category. To Use ajax in child categories go to Theme Setting -> General -> Ajax Sub Category', 'innovation' );
			$template['desc']['num_of_child_category'] = esc_attr__( 'How many child categories you want to show', 'innovation' );
			$template['desc']['category_ids']          = esc_attr__( 'To filter multiple categories, Input the category IDs separated by commas (example: 1,2,3). This option will override on "category filter" setting', 'innovation' );
			$template['desc']['tags']                  = esc_attr__( 'To filter multiple tag slug, enter here the tag slugs separated by commas (example: tag1,tag2,tag3)', 'innovation' );
			$template['desc']['authors']               = esc_attr__( 'filter by authors', 'innovation' );
			$template['desc']['posts_per_page']        = esc_attr__( 'How many posts you want to show at once', 'innovation' );
			$template['desc']['num_of_slider']         = esc_attr__( 'How many slides you want to show', 'innovation' );
			$template['desc']['offset']                = esc_attr__( 'Number of post to displace or pass over', 'innovation' );
			$template['desc']['orderby']               = esc_attr__( 'Select sort type for this block', 'innovation' );
			$template['desc']['excerpt']               = esc_attr__( 'Select length of excerpt for this, leave blank or set is 0 if you want disable excerpt', 'innovation' );
			$template['desc']['pagination']            = esc_attr__( 'Select pagination type for this block', 'innovation' );
			$template['desc']['readmore']              = esc_attr__( 'Enable or disable "Read More" button for this block', 'innovation' );
			$template['desc']['block_style']           = esc_attr__( 'Select Style for this Block', 'innovation' );
			$template['desc']['big_first']             = esc_attr__( 'display classic post at top of posts list', 'innovation' );

			// block static image
			$template['desc']['content']      = esc_attr__( 'Enter the content for this block', 'innovation' );
			$template['desc']['image_url']    = esc_attr__( 'Enter the image URL', 'innovation' );
			$template['desc']['image_link']   = esc_attr__( 'Leave blank to output the image without link', 'innovation' );
			$template['desc']['button_title'] = esc_attr__( 'Enter the button title', 'innovation' );

			// block code box
			$template['desc']['wrap_mode']   = esc_attr__( 'Display content in full width or has max width...', 'innovation' );
			$template['desc']['custom_html'] = esc_attr__( 'Supports text, HTML code, JS code and video embed code...', 'innovation' );
			$template['desc']['short_code']  = esc_attr__( 'Input your short code. It is priority than custom html content...', 'innovation' );


			// block ads
			$template['desc']['ad_title']  = esc_attr__( 'Input ad title', 'innovation' );
			$template['desc']['ad_url']    = esc_attr__( 'Input destination URL of ads', 'innovation' );
			$template['desc']['ad_image']  = esc_attr__( 'Input image attachment URL of ads. This option will override on AdSense. Leave blank if you want to use AdSense', 'innovation' );
			$template['desc']['ad_script'] = esc_attr__( 'Input Google ad script or custom HTML', 'innovation' );

			// sidebar
			$str = '';
			$str .= '<div class="ruby-template-field-sidebar-label"><label>' . esc_html__( 'Select Sidebar Options', 'innovation' ) . '</label>';
			$str .= '<div class="ruby-sidebar-select-wrap">';
			$str .= '<div class="ruby-sidebar-select-el">';
			$str .= '<div class="sidebar-label">' . esc_html__( 'Sidebar Name', 'innovation' ) . '</div>';
			$str .= '<select class ="ruby-sidebar-select">';

			// sidebar select
			$data_sidebar = innovation_ruby_theme_config::get_all_sidebar();
			if ( is_array( $data_sidebar ) ) {
				foreach ( $data_sidebar as $sidebar ) {
					if ( ! empty( $sidebar['id'] ) && ! empty( $sidebar['name'] ) ) {
						switch ( $sidebar['id'] ) {
							case 'innovation_ruby_sidebar_navigation' :
							case 'innovation_ruby_blog_column_1' :
							case 'innovation_ruby_blog_column_2' :
							case 'innovation_ruby_blog_column_3' :
							case 'innovation_ruby_sidebar_footer_fullwidth':
							case 'innovation_ruby_sidebar_footer_1' :
							case 'innovation_ruby_sidebar_footer_2' :
							case 'innovation_ruby_sidebar_footer_3' :
							case 'innovation_ruby_sidebar_footer_4' :
								break;
							default:
								$str .= '<option value="' . esc_attr( $sidebar['id'] ) . '">' . ucwords( $sidebar['name'] ) . '</option>';
								break;
						}
					}
				};
			}


			$str .= '</select>';
			$str .= '</div>';
			$str .= '<div class="ruby-sidebar-select-el">';
			$str .= '<div class="sidebar-label">' . esc_html__( 'Sidebar Position', 'innovation' ) . '</div>';
			$str .= '<select class="ruby-sidebar-position">';
			$str .= '<option selected value ="right">' . esc_html__( 'Right', 'innovation' ) . '</option>';
			$str .= '<option  value ="left">' . esc_html__( 'Left', 'innovation' ) . '</option>';
			$str .= '</select>';
			$str .= '</div>';
			$str .= '</div></div>';
			$template['input']['sidebar'] = $str;

			// full width section
			$str = '';
			$str .= '<div class="ruby-section fullwidth-section">';
			$str .= '<div class="ruby-section-bar">';
			$str .= '<i class="ruby-section-move">#</i>';
			$str .= '<div class="ruby-section-label"></div>';
			$str .= '<div class="ruby-section-toolbox">';
			$str .= '<a class="ruby-section-open-option" href="#">+</a>';
			$str .= '<a class="ruby-section-delete" href="#">x</a>';
			$str .= '</div>';
			$str .= '</div>';
			$str .= '<div class="ruby-block-wrap clearfix">';
			$str .= '<div class="section-menu-wrap">';
			$str .= '<div class="ruby-toolbox"><a href="#" class="add-block-select">' . esc_html__( 'Add Block', 'innovation' ) . '</a>';
			$str .= '<div class="block-select-wrap"></div>';
			$str .= '</div>';
			$str .= '</div>';
			$str .= '<div class="ruby-block fullwidth-block">';
			$str .= '<input type="hidden" class="ruby-section-order" name="innovation_ruby_section_order[]">';
			$str .= '<input type="hidden" class="ruby-section-type">';
			$str .= '<div class="ruby-section-empty">' . esc_html__( 'Click on " <strong>BLOCK</strong> " images to add a new block.', 'innovation' ) . '</div>';
			$str .= '<div class="ruby-section-loading">' . esc_html__( 'Loading ...', 'innovation' ) . '</div>';
			$str .= '</div>';
			$str .= '</div>';
			$str .= '</div>';
			$template['section_full_width'] = $str;

			// has sidebar section
			$str = '';
			$str .= '<div class="ruby-section has-sidebar-section">';
			$str .= '<div class="ruby-section-bar">';
			$str .= '<i class="ruby-section-move">#</i>';
			$str .= '<div class="ruby-section-label"></div>';
			$str .= '<div class="ruby-section-toolbox">';
			$str .= '<a class="ruby-section-open-option" href="#">+</a>';
			$str .= '<a class="ruby-section-delete" href="#">x</a>';
			$str .= '</div>';
			$str .= '</div>';
			$str .= '<div class="ruby-block-wrap clearfix">';
			$str .= '<div class="section-menu-wrap">';
			$str .= '<div class="ruby-section-sidebar">';
			$str .= '</div>';
			$str .= '<div class="ruby-toolbox"><a href="#" class="add-block-select">' . esc_html__( 'Add Block', 'innovation' ) . '</a>';
			$str .= '<div class="block-select-wrap"></div>';
			$str .= '</div>';
			$str .= '</div>';
			$str .= '<div class="ruby-block content-block">';
			$str .= '<input type="hidden" class="ruby-section-order" name="innovation_ruby_section_order[]">';
			$str .= '<input type="hidden" class="ruby-section-type">';
			$str .= '<div class="ruby-section-empty">' . html_entity_decode( esc_html__( 'Click on " <strong>BLOCK</strong> " images to add a new block.', 'innovation' ) ) . '</div>';
			$str .= '<div class="ruby-section-loading">' . esc_html__( 'Loading ...', 'innovation' ) . '</div>';
			$str .= '</div>';

			$str .= '</div>';
			$str .= '</div>';

			$template['section_has_sidebar']    = $str;
			$template['confirm_section_delete'] = esc_html__( 'Are you sure delete this section?', 'innovation' );

			wp_localize_script( 'innovation_ruby_composer_script', 'innovation_ruby_composer_template', $template );
		}
	}
}


innovation_ruby_composer_config::get_instance();