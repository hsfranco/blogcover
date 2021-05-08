<?php

/**
 * Class innovation_ruby_hs_block_5
 * render has sidebar block 5 (grid layout)
 */
if ( ! class_exists( 'innovation_ruby_hs_block_5' ) ) {
	class innovation_ruby_hs_block_5 extends innovation_ruby_block {

		/**
		 * @param $block
		 * @return string
		 * render block layout
		 */
		static function render( $block ) {


			//add block data
			$block['block_type']    = 'has_sidebar';
			$block['block_classes'] = 'block-post-5';

			$str = '';
			$str .= parent::open_block( $block );
			$str .= parent::render_header( $block );
			$str .= self::render_content( $block );
			$str .= parent::close_block();

			return $str;
		}

		/**
		 * @param $block
		 * @return string
		 * render block block content
		 */
		static function render_content( $block ) {

			//query data
			$query_data = parent::get_data( $block );
			$ruby_flag  = true;

			if ( ! empty( $block['block_options']['big_first'] ) ) {
				$big_first = true;
			} else {
				$big_first = false;
			}

			//render
			$str = '';
			$str .= parent::open_block_content( 'row' );

			//check empty
			if ( empty( $query_data->post_count ) ) {
				$str .= parent::no_content();
			} else {
				ob_start();

				?>

				<?php while ( $query_data->have_posts() ) : ?>
					<?php $query_data->the_post();
					//render first post
					if ( ( true === $ruby_flag ) && ( ! empty( $big_first ) ) ) {

						echo '<div class="first-post-wrap col-sx-12">';
						get_template_part( 'templates/loop', 'classic' );
						echo '</div>';
						$ruby_flag = false;
						continue;
					}

					//render block
					get_template_part( 'templates/loop', 'list' );
					?>

				<?php endwhile; ?>

				<?php

				$str .= ob_get_clean();
			}

			$str .= parent::close_block_content();

			//reset post data
			wp_reset_postdata();

			return $str;
		}


		/**
		 * @return array
		 * init block options
		 */
		static function block_config() {
			return array(
				'filter' => array(
					'category_id'    => true,
					'category_ids'   => true,
					'tags'           => true,
					'authors'        => true,
					'orderby'        => true,
					'posts_per_page' => 4,
					'offset'         => true,
					'big_first'      => true
				),
				'header' => array(
					'title'     => esc_html__( 'latest posts', 'innovation' ),
					'sub_title' => true,
					'title_url' => true,
					'color'     => '#242424'
				)
			);
		}
	}
}
