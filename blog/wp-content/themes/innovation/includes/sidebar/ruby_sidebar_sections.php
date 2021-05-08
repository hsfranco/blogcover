<?php

//registering sidebar sections
if ( ! function_exists( 'innovation_ruby_register_sidebars' ) ) {
	function innovation_ruby_register_sidebars() {

		//default sidebar
		register_sidebar( array(
			'id'            => 'innovation_ruby_sidebar_default',
			'name'          => esc_html__( 'Default Sidebar', 'innovation' ),
			'description'   => esc_html__( 'Off canvas section', 'innovation' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<div class="widget-title"><h3>',
			'after_title'   => '</h3></div>'
		) );

		//custom sidebar
		$multi_sidebar = get_option( 'innovation_ruby_custom_multi_sidebars', false );
		if ( ! empty( $multi_sidebar ) && is_array( $multi_sidebar ) ) {
			foreach ( $multi_sidebar as $current_sidebar ) {
				register_sidebar( array(
					'name'          => $current_sidebar['name'],
					'id'            => $current_sidebar['id'],
					'before_widget' => '<aside id="%1$s" class="widget %2$s">',
					'after_widget'  => '</aside>',
					'before_title'  => '<div class="widget-title"><h3>',
					'after_title'   => '</h3></div>',
				) );
			};
		};

		register_sidebar( array(
			'id'            => 'innovation_ruby_sidebar_off_canvas',
			'name'          => esc_html__( 'Off Canvas Section', 'innovation' ),
			'description'   => esc_html__( 'Off canvas section', 'innovation' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<div class="widget-title"><h3>',
			'after_title'   => '</h3></div>'
		) );

		//blog home section
		register_sidebar( array(
			'id'            => 'innovation_ruby_home_column_1',
			'name'          => esc_html__( 'Blog Page First Column', 'innovation' ),
			'description'   => esc_html__( 'One of column at top of latest blog page', 'innovation' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<div class="widget-title"><h3>',
			'after_title'   => '</h3></div>'
		) );

		register_sidebar( array(
			'id'            => 'innovation_ruby_home_column_2',
			'name'          => esc_html__( 'Blog Page Second Column', 'innovation' ),
			'description'   => esc_html__( 'One of column at top of latest last blog page', 'innovation' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<div class="widget-title"><h3>',
			'after_title'   => '</h3></div>'
		) );

		register_sidebar( array(
			'id'            => 'innovation_ruby_home_column_3',
			'name'          => esc_html__( 'Blog Page Third Column', 'innovation' ),
			'description'   => esc_html__( 'One of column at top of home page', 'innovation' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<div class="widget-title"><h3>',
			'after_title'   => '</h3></div>'
		) );


		//footer sections
		register_sidebar( array(
			'id'            => 'innovation_ruby_sidebar_footer_fullwidth',
			'name'          => esc_html__( 'Full Width Top Footer', 'innovation' ),
			'description'   => esc_html__( 'Full width area at top of footer area. Allow [TOP FOOTER] Widget as instagram grid & and social counter widgets', 'innovation' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<div class="widget-title"><h3>',
			'after_title'   => '</h3></div>'
		) );

		register_sidebar( array(
			'id'            => 'innovation_ruby_sidebar_footer_1',
			'name'          => esc_html__( 'Footer 1', 'innovation' ),
			'description'   => esc_html__( 'One of column of footer area', 'innovation' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<div class="widget-title"><h3>',
			'after_title'   => '</h3></div>'
		) );

		register_sidebar( array(
			'id'            => 'innovation_ruby_sidebar_footer_2',
			'name'          => esc_html__( 'Footer 2', 'innovation' ),
			'description'   => esc_html__( 'One of column of footer area', 'innovation' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<div class="widget-title"><h3>',
			'after_title'   => '</h3></div>'
		) );

		register_sidebar( array(
			'id'            => 'innovation_ruby_sidebar_footer_3',
			'name'          => esc_html__( 'Footer 3', 'innovation' ),
			'description'   => esc_html__( 'One of column of footer area', 'innovation' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<div class="widget-title"><h3>',
			'after_title'   => '</h3></div>'
		) );

		register_sidebar( array(
			'id'            => 'innovation_ruby_sidebar_footer_4',
			'name'          => esc_html__( 'Footer 4', 'innovation' ),
			'description'   => esc_html__( 'One of column of footer area', 'innovation' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<div class="widget-title"><h3>',
			'after_title'   => '</h3></div>'
		) );
	}

}

add_action( 'widgets_init', 'innovation_ruby_register_sidebars' );