<?php
// check & return
$ruby_enable_review = innovation_ruby_post_review::has_review();

if ( true == $ruby_enable_review ) : ?>

	<?php
	$post_id               = get_the_ID();
	$ruby_review_summary     = get_post_meta( $post_id, 'innovation_ruby_review_summary', true );
	$ruby_as                 = get_post_meta( $post_id, 'innovation_ruby_as', true );
	$ruby_review_score_intro = innovation_ruby_util::get_theme_option( 'review_score_intro' );

	$ruby_review_data = array(
		array(
			'innovation_ruby_cd' => get_post_meta( $post_id, 'innovation_ruby_cd1', true ),
			'innovation_ruby_cs' => get_post_meta( $post_id, 'innovation_ruby_cs1', true ),
		),
		array(
			'innovation_ruby_cd' => get_post_meta( $post_id, 'innovation_ruby_cd2', true ),
			'innovation_ruby_cs' => get_post_meta( $post_id, 'innovation_ruby_cs2', true ),
		),
		array(
			'innovation_ruby_cd' => get_post_meta( $post_id, 'innovation_ruby_cd3', true ),
			'innovation_ruby_cs' => get_post_meta( $post_id, 'innovation_ruby_cs3', true ),
		),
		array(
			'innovation_ruby_cd' => get_post_meta( $post_id, 'innovation_ruby_cd4', true ),
			'innovation_ruby_cs' => get_post_meta( $post_id, 'innovation_ruby_cs4', true ),
		),
		array(
			'innovation_ruby_cd' => get_post_meta( $post_id, 'innovation_ruby_cd5', true ),
			'innovation_ruby_cs' => get_post_meta( $post_id, 'innovation_ruby_cs5', true ),
		),
		array(
			'innovation_ruby_cd' => get_post_meta( $post_id, 'innovation_ruby_cd6', true ),
			'innovation_ruby_cs' => get_post_meta( $post_id, 'innovation_ruby_cs6', true ),
		),
	);
	?>

	<div class="review-box-wrap is-bottom">
		<div class="review-box-inner">

			<div class="review-title widget-title"><h3><?php esc_attr_e( 'Review overview', 'innovation' ) ?></h3></div>

			<div class="review-content-wrap">
				<?php foreach ( $ruby_review_data as $data ) : ?>
					<?php if ( ! empty( $data['innovation_ruby_cd'] ) ) : ?>
						<div class="review-el">
							<div class="review-el-inner">
								<span class="review-description"><?php echo esc_attr( $data['innovation_ruby_cd'] ); ?></span>
								<span class="review-info-score"><?php echo esc_attr( $data['innovation_ruby_cs'] ); ?></span>
							</div>
							<div class="score-bar-wrap">
								<div class="score-bar" style="width:<?php echo esc_attr( $data['innovation_ruby_cs'] * 10 ) ?>%"></div>
							</div>
							<!--#review el inner-->
						</div><!--#review el wrap-->
					<?php endif; ?>
				<?php endforeach; ?>

				<div class="review-summary-wrap">
					<div class="review-summary-inner">
						<h3><?php esc_attr_e( 'Summary', 'innovation' ) ?></h3>
						<p class="review-summary-desc post-excerpt">
							<span class="post-review-info">
								<span class="review-info-score"><?php echo esc_attr( $ruby_as )?></span>
								<?php if ( ! empty( $ruby_review_score_intro ) ) : ?>
									<span class="review-info-intro"><?php echo innovation_ruby_post_review::render_intro( $ruby_as ) ?></span>
								<?php endif; ?>
							</span><!--#reivew bar wrap-->
							<?php echo esc_attr( $ruby_review_summary ); ?>
						</p>
					</div>
				</div>

			</div>
		</div>
	</div>
<?php endif;
