<?php
$ruby_args = array(
	'blog_id'     => innovation_ruby_util::get_site_blog_id(),
	'orderby'     => 'login',
	'count_total' => false,
	'role__in'    => array( 'administrator', 'author', 'editor' )
);

$ruby_blog_users = get_users( $ruby_args );

$ruby_excepted_author_team_ids = innovation_ruby_util::get_theme_option( 'excepted_author_team_ids' );
if ( ! empty( $ruby_excepted_author_team_ids ) ) {
	$ruby_excepted_author_team_ids = explode( ',', $ruby_excepted_author_team_ids );
}

if ( ! empty( $ruby_blog_users ) ) {
	$ruby_counter = 1;

	echo '<div class="author-team-wrap clearfix">';
	echo '<div class="author-team-inner row">';
	foreach ( $ruby_blog_users as $ruby_user ) {

		$ruby_user_id = $ruby_user->data->ID;
		//check exception user
		if ( ! empty( $ruby_excepted_author_team_ids ) && is_array( $ruby_excepted_author_team_ids ) && in_array( $ruby_user_id, $ruby_excepted_author_team_ids ) ) {
			continue;
		}

		$ruby_blog_user_name   = $ruby_user->data->display_name;
		$ruby_blog_user_email  = $ruby_user->data->user_email;
		$ruby_blog_user_job    = get_the_author_meta( 'job_name', $ruby_user_id );
		$ruby_blog_user_decs   = get_the_author_meta( 'description', $ruby_user_id );
		$ruby_user_social_data = innovation_ruby_social_data::author_data( $ruby_user_id );
		$ruby_user_url         = get_author_posts_url( $ruby_user_id );

		echo '<div class="user-box-wrap col-sm-4 col-xs-12">';
		echo '<div class="user-box-inner">';
		echo '<div class="user-avatar"><a href="' . esc_url( $ruby_user_url ) . '">' . get_avatar( $ruby_blog_user_email, 200, '', $ruby_blog_user_name ) . '</a></div>';
		echo '<div class="user-name post-title"><h3><a href="' . esc_url( $ruby_user_url ) . '">' . esc_attr( $ruby_blog_user_name ) . '</a></h3></div>';
		if ( ! empty( $ruby_blog_user_job ) ) {
			echo '<div class="job-name"><p>' . esc_attr( $ruby_blog_user_job ) . '</p></div>';
		}
		echo innovation_ruby_social_bar::render( $ruby_user_social_data, 'team-social-link-info', true, false );
		if ( ! empty( $ruby_blog_user_decs ) ) {
			echo '<p class="user-desc">' . esc_html( $ruby_blog_user_decs ) . '</p>';
		}
		echo '<div class="user-post-link">';
		echo '<a href="' . esc_url( $ruby_user_url ) . '">' . esc_attr__( 'View More', 'innovation' ) . '</a>';
		echo '</div>';

		echo '</div>';
		echo '</div><!--#user box wrap -->';

		if ( 0 == $ruby_counter % 3 ) {
			echo innovation_ruby_template_part::render_divider();
		}
		$ruby_counter ++;

	}
	echo '</div>';
	echo '</div>';
}
