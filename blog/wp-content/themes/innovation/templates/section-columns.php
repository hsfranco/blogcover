<?php

$ruby_home_column_counter = 0;
$ruby_check_columns       = false;

if ( is_active_sidebar( 'innovation_ruby_home_column_1' ) ) {
	$ruby_home_column_counter ++;
	$ruby_check_columns = true;
};

if ( is_active_sidebar( 'innovation_ruby_home_column_2' ) ) {
	$ruby_home_column_counter ++;
	$ruby_check_columns = true;
};

if ( is_active_sidebar( 'innovation_ruby_home_column_3' ) ) {
	$ruby_home_column_counter ++;
	$ruby_check_columns = true;
};

$ruby_home_column_class_el = array();

$ruby_home_column_class_el[] = 'promo-el';

if ( 1 == $ruby_home_column_counter ) {
	$ruby_home_column_class_el[] = 'col-xs-12';
} elseif ( 2 == $ruby_home_column_counter ) {
	$ruby_home_column_class_el[] = 'col-sm-6 col-xs-12';
} elseif ( 3 == $ruby_home_column_counter ) {
	$ruby_home_column_class_el[] = 'col-sm-4 col-xs-12';
}

$ruby_home_column_class_el = implode( ' ', $ruby_home_column_class_el );
?>

<?php if( true == $ruby_check_columns) : ?>

	<div class="promo-wrap">
		<div class="ruby-container">
			<div class="promo-inner row">
			<?php if ( is_active_sidebar( 'innovation_ruby_home_column_1' ) ) : ?>
			<div class="<?php echo esc_attr($ruby_home_column_class_el); ?>">
				<?php dynamic_sidebar( 'innovation_ruby_home_column_1' ); ?>
			</div>
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'innovation_ruby_home_column_2' ) ) : ?>
				<div class="<?php echo esc_attr($ruby_home_column_class_el); ?>">
					<?php dynamic_sidebar( 'innovation_ruby_home_column_2' ); ?>
				</div>
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'innovation_ruby_home_column_3' ) ) : ?>
				<div class="<?php echo esc_attr($ruby_home_column_class_el); ?>">
					<?php dynamic_sidebar( 'innovation_ruby_home_column_3' ); ?>
				</div>
			<?php endif; ?>
			</div>
		</div>
	</div><!--#promo wrap -->

<?php endif; ?>