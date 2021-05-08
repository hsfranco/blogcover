<?php
//Color Set
if ( ! function_exists( 'innovation_ruby_theme_options_color' ) ) {
	function innovation_ruby_theme_options_color() {
		return array(
			'id'     => 'innovation_ruby_theme_ops_section_color',
			'title'  => esc_html__( 'Color Options', 'innovation' ),
			'desc'   => esc_html__( 'Select color for theme. Leave blank if you want set default of theme.', 'innovation' ),
			'icon'   => 'el el-tint',
			'fields' => array(

				//Theme color
				array(
					'id'     => 'section_start_theme_color',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Main Color', 'innovation' ),
					'indent' => true
				),
				array(
					'id'          => 'main_theme_color',
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
					'title'       => esc_html__( 'Main Theme Color', 'innovation' ),
					'subtitle'    => esc_html__( 'Select main theme color.  Leave blank if you want set to default', 'innovation' ),
				),
				array(
					'id'          => 'review_icon_color',
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
					'title'       => esc_html__( 'Review Icon Color', 'innovation' ),
					'subtitle'    => esc_html__( 'Select color for review icon. Leave blank if you want set to default', 'innovation' ),
				),
				array(
					'id'          => 'social_icon_color',
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
					'title'       => esc_html__( 'Social Share Icons Color', 'innovation' ),
					'subtitle'    => esc_html__( 'Select color for social social share icons. Leave blank if you want set to default', 'innovation' ),
				),
				array(
					'id'     => 'section_end_theme_color',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
			)
		);
	}
}
