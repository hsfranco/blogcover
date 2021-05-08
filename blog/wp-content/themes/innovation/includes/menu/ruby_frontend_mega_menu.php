<?php


/**
 * Class innovation_ruby_Walker
 * this file display front end mega menu
 */
class Innovation_Ruby_Walker extends Walker_Nav_Menu {

	public function start_el( &$output, $object, $depth = 0, $args = array(), $id = 0 ) {

		$ruby_enable_category_megamenu  = $object->rubymegamenu_category;
		$ruby_enable_column_megamenu    = $object->rubymegamenu_column;
		$ruby_enable_column_megamenu_bg = $object->rubymegamenu_column_bg;
		$ruby_current_classes           = $object->classes;

		$ruby_has_children                 = '';
		$str_category_meta               = '';
		$ruby_mega_query                   = array();
		$ruby_mega_query['posts_per_page'] = 4;
		$ruby_mega_query['no_found_rows']  = true;

		//check current menu
		if ( is_array( $ruby_current_classes ) ) {
			if ( in_array( 'menu-item-has-children', $ruby_current_classes ) ) {
				$ruby_has_children = 'has-sub-menu';
			}
		}

		//add class
		if ( ( 1 == $ruby_enable_category_megamenu ) && ( 0 == $object->menu_item_parent ) ) {
			$object->classes[] = 'is-cate-mega-menu is-mega-menu';
			if ( 'has-sub-menu' == $ruby_has_children ) {
				$object->classes[] = 'has-sub-menu';
			}
		}

		if ( ( 1 == $ruby_enable_column_megamenu ) && ( 0 == $object->menu_item_parent ) ) {
			$object->classes[] = 'is-col-mega-menu is-mega-menu';
		}

		//render
		parent::start_el( $output, $object, $depth, $args );

		if ( ( 'category' == $object->object ) && ( 1 == $ruby_enable_category_megamenu ) && ( 0 == $object->menu_item_parent ) ) {

			//query data
			$ruby_mega_query ['category_id'] = $object->object_id;
			$query_data                    = innovation_ruby_query::get_custom_query( $ruby_mega_query );

			//render
			$output .= '<div class="mega-category-menu mega-menu-wrap sub-menu-wrap is-sub-menu">';
			if ( $query_data->have_posts() ) {
				while ( $query_data->have_posts() ) {
					$query_data->the_post();
					$str_category_meta .= '<div class="col-xs-3 mega-category-el">';
					ob_start();
					get_template_part( 'templates/loop', 'mini_grid' );
					$str_category_meta .= ob_get_clean();
					$str_category_meta .='</div><!--#mega el-->';
				}
			}
			wp_reset_postdata();
			$output .= '<div class="mega-category-wrap row">';
			$output .= $str_category_meta;
			$output .= '</div><!--#mega category posts-->';
		}

		if ( ( 'custom' == $object->object ) && ( 1 == $ruby_enable_column_megamenu ) ) {
			if ( empty( $ruby_enable_column_megamenu_bg ) ) {
				$output .= '<div class="mega-col-menu mega-menu-wrap is-sub-menu">';
			} else {
				$output .= '<div class="mega-col-menu mega-menu-wrap is-sub-menu" style="background-image: url(' . esc_url( $ruby_enable_column_megamenu_bg ) . ')">';
			}
		}

		if ( empty( $ruby_has_children ) && ( ( 1 == $ruby_enable_category_megamenu ) || ( 1 == $ruby_enable_column_megamenu ) ) ) {
			$output .= '</div><!--#mega menu -->';
		}
	}


	public function end_el( &$output, $object, $depth = 0, $args = array() ) {

		$ruby_enable_category_megamenu = $object->rubymegamenu_category;
		$ruby_enable_column_megamenu   = $object->rubymegamenu_column;
		$ruby_current_classes          = $object->classes;

		if ( is_array( $ruby_current_classes ) ) {
			if ( in_array( 'menu-item-has-children', $ruby_current_classes ) ) {
				$ruby_has_children = 'has-sub-menu';
			}
		}

		if ( ! empty( $ruby_has_children ) && ( ( 1 == $ruby_enable_category_megamenu ) || ( 1 == $ruby_enable_column_megamenu ) ) ) {
			$output .= '</div><!--#mega menu -->';
		}

		$output .= '</li>';
	}


	//start of the sub menu wrap
	function start_lvl( &$output, $depth = 0, $args = array() ) {

		if ( $depth >= 2 ) {
			$output .= '<ul class="sub-sub-menu-wrap is-sub-menu is-mega-hide">';
		}
		if ( $depth == 1 ) {
			$output .= '<ul class="sub-sub-menu-wrap is-sub-menu">';
		}
		if ( $depth == 0 ) {
			$output .= '<div class="sub-menu-wrap is-sub-menu"><ul class="sub-menu-inner">';
		}
	}

	function end_lvl( &$output, $depth = 0, $args = array() ) {

		if ( $depth >= 2 ) {
			$output .= '</ul><!--#sub menu-->';
		}
		if ( $depth == 1 ) {
			$output .= '</ul><!--#sub menu-->';
		}
		if ( $depth == 0 ) {
			$output .= '</ul></div><!--#sub menu wrap -->';
		}
	}
}



/**
 * add category class into menu
 */
if ( ! function_exists( 'innovation_ruby_category_nav_class' ) ) {
	function innovation_ruby_category_nav_class( $classes, $item ) {
		if ( 'category' == $item->object ) {
			$classes[] = 'is-category-' . $item->object_id;
		}

		return $classes;
	}
}
add_filter( 'nav_menu_css_class', 'innovation_ruby_category_nav_class', 10, 2 );


/**
 * fallback navigation
 */
if ( ! function_exists( 'innovation_ruby_navigation_fallback' ) ) {
	function innovation_ruby_navigation_fallback() {

		echo '<div class="no-menu is-error">';
		echo esc_attr__( 'Please assign a menu to the primary menu location under ', 'innovation' ) . '<a href="' . get_admin_url( get_current_blog_id(), 'nav-menus.php' ) . '">' . esc_attr__( 'menu', 'innovation' ) . '</a>';
		echo '</div>';

	}
}
