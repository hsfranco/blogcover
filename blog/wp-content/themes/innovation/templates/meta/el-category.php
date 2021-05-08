<?php
if ( ! function_exists( 'innovation_ruby_meta_el_cat' ) ) {
	function innovation_ruby_meta_el_cat( $primary = true ) {
		$ruby_categories       = get_the_category();
		$ruby_primary_category = get_post_meta( get_the_ID(), 'innovation_ruby_single_primary_category', true );

		echo '<span class="meta-info-el meta-info-cate">';
		if ( empty( $ruby_primary_category ) || false === $primary ) {
			if ( empty( $ruby_categories ) || array( $ruby_categories ) ) {
				foreach ( $ruby_categories as $ruby_category ) {
					echo '<a href="' . get_category_link( $ruby_category->term_id ) . '" title="' . esc_attr( $ruby_category->name ) . '">';
					echo esc_html( $ruby_category->cat_name );
					echo '</a>';
				}
			}
		} else {

			$ruby_primary_category_name = get_cat_name( $ruby_primary_category );

			echo '<a href="' . get_category_link( $ruby_primary_category ) . '" title="' . esc_attr( $ruby_primary_category_name ) . '">';
			echo esc_html( $ruby_primary_category_name );
			echo '</a>';
		}

		echo '</span><!--category meta-->';
	}
}

