<?php
if ( ! function_exists( 'innovation_ruby_theme_options_woocommerce' ) ) {
	function innovation_ruby_theme_options_woocommerce() {

		//woocommerce config
		return array(
			'id'     => 'innovation_ruby_theme_ops_section_woocommerce',
			'title'  => esc_html__( 'Woocommerce', 'innovation' ),
			'desc'   => html_entity_decode( esc_html__( 'Select options for Wocommerce pages.<br/><br/><strong>Note: </strong> Page options custom fields in page editor is not available in shop page. Please, Settings in here.', 'innovation' ) ),
			'icon'   => 'el el-shopping-cart',
			'fields' => array(
				array(
					'id'     => 'section_start_woocommerce_main_color',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Woocommerce Main Color', 'innovation' ),
					'indent' => true
				),
				array(
					'id'          => 'innovation_ruby_woocommerce_color',
					'type'        => 'color',
					'transparent' => false,
					'title'       => esc_html__( 'WooCommerce Global Color', 'innovation' ),
					'subtitle'    => esc_html__( 'Select main color for Woocommerce', 'innovation' ),
					'validate'    => 'color',
					'default'     => '',
				),
				array(
					'id'     => 'section_end_woocommerce_main_color',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//shop page config
				array(
					'id'     => 'section_start_woocommerce_shop_page',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Woocommerce Shop Page Options', 'innovation' ),
					'indent' => true
				),
				array(
					'id'       => 'innovation_ruby_woocommerce_title_shop',
					'type'     => 'switch',
					'title'    => esc_html__( 'Shop Page Title', 'innovation' ),
					'subtitle' => esc_html__( 'enable or disable shop page title', 'innovation' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'innovation_ruby_woocommerce_sidebar_shop',
					'type'     => 'select',
					'title'    => esc_html__( 'Shop Pages Sidebar', 'innovation' ),
					'subtitle' => esc_html__( 'Select sidebar for Woocommerce pages. This option effect all Woocommerce pages, excepted product page.', 'innovation' ),
					'options'  => innovation_ruby_theme_config::sidebar_name(),
					'default'  => 'innovation_ruby_sidebar_default',
				),
				array(
					'id'       => 'innovation_ruby_woocommerce_sidebar_position_shop',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Shop Sidebar Position', 'innovation' ),
					'subtitle' => esc_html__( 'Select sidebar position for this page. This option will override default sidebar position setting.', 'innovation' ),
					'options'  => innovation_ruby_theme_config::sidebar_position( false ),
					'default'  => 'none'
				),
				array(
					'id'     => 'section_end_woocommerce_shop_page',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//product page config
				array(
					'id'     => 'section_start_woocommerce_product_page',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Woocommerce product page settings', 'innovation' ),
					'indent' => true
				),
				array(
					'id'       => 'innovation_ruby_woocommerce_sidebar_product',
					'type'     => 'select',
					'title'    => esc_html__( 'Product Page Sidebar', 'innovation' ),
					'subtitle' => esc_html__( 'Select sidebar for author page', 'innovation' ),
					'options'  => innovation_ruby_theme_config::sidebar_name(),
					'default'  => 'innovation_ruby_sidebar_default',
				),
				array(
					'id'       => 'innovation_ruby_woocommerce_sidebar_position_product',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Product Sidebar Position', 'innovation' ),
					'subtitle' => esc_html__( 'Select sidebar position for product page. This option will override default sidebar position setting.', 'innovation' ),
					'options'  => innovation_ruby_theme_config::sidebar_position( false ),
					'default'  => 'none'
				),
				array(
					'id'       => 'innovation_ruby_woocommerce_comment_box',
					'type'     => 'switch',
					'title'    => esc_html__( 'Show Review Box', 'innovation' ),
					'subtitle' => esc_html__( 'Enable or disable the review box on the woocommerce pages, Default this option is enable', 'innovation' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'     => 'section_end_woocommerce_product_page',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),

			)
		);
	}
}