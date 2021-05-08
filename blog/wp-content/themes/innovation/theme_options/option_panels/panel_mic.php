<?php
//custom script tab config
if ( ! function_exists( 'innovation_ruby_theme_options_custom_script' ) ) {
	function innovation_ruby_theme_options_custom_script() {
		return array(
			'id'     => 'innovation_ruby_theme_ops_section_custom_code',
			'title'  => esc_html__( 'Custom Code', 'innovation' ),
			'icon'   => 'el el-graph',
			'desc'   => esc_html__( 'Custom CSS will be added at end of all other customizations and thus can be used to overwrite rules', 'innovation' ),
			'fields' => array(
				array(
					'id'       => 'custom_css',
					'type'     => 'ace_editor',
					'title'    => esc_html__( 'CSS Code', 'innovation' ),
					'subtitle' => esc_html__( 'Enter your CSS code here.', 'innovation' ),
					'mode'     => 'css',
					'theme'    => 'monokai',
					'options' => array(
						'minLines' => 20
					),
					'default'  => ""
				),
			),
		);
	}
}

//Import & export tab config
if ( ! function_exists( 'innovation_ruby_theme_options_import_export' ) ) {
	function innovation_ruby_theme_options_import_export() {
		return array(
			'id'     => 'innovation_ruby_theme_ops_section_import_export',
			'title'  => esc_html__( 'Import / Export', 'innovation' ),
			'desc'   => esc_html__( 'Import and Export your settings from file, text or URL.', 'innovation' ),
			'icon'   => 'el el-inbox',
			'fields' => array(
				array(
					'id'         => 'ruby-import-export',
					'type'       => 'import_export',
					'title'      => 'Import Export',
					'subtitle'   => esc_html__('Save and restore your options, click 2 times on button when you import setting.','innovation'),
					'full_width' => false,
				),
			),
		);
	}
}

