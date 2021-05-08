<?php
//display comment
if ( post_password_required() ) {
    return false;
}; ?>
<div id="comments" class="comments-area">
    <?php if ( have_comments() ) : ?>
        <div class="comment-title widget-title block-title-wrap">
            <h3>
                <?php comments_number( esc_html__('No Comments', 'innovation')); ?>
            </h3>
        </div>
        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		    <nav id="comment-nav-above" class="comment-navigation" role="navigation">
			    <h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'innovation' ); ?></h1>
			    <div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'innovation' ) ); ?></div>
			    <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'innovation' ) ); ?></div>
		    </nav><!-- #comment-nav-above -->
        <?php endif; ?>
	    <ol class="comment-list entry">
		    <?php
		    wp_list_comments(
			    array(
				    'style'       => 'ol',
				    'short_ping'  => true,
				    'avatar_size' => 75,
			    )
		    );  ?>
        </ol>
        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		    <nav id="comment-nav-below" class="comment-navigation" role="navigation">
			    <h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'innovation' ); ?></h1>
			    <div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'innovation' ) ); ?></div>
			    <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'innovation' ) ); ?></div>
		    </nav>
        <?php endif; ?>
    <?php endif; ?>

    <?php
    // If comments are closed and there are comments, let's leave a little note, shall we?
    if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
        ?>
        <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'innovation' ); ?></p>
    <?php endif;

    if ( ! function_exists( 'innovation_ruby_comment_fields' ) ) {
	    function innovation_ruby_comment_fields( $fields ) {
		    $req      = get_option( 'require_name_email' );
		    $aria_req = ( $req ? " aria-required='true'" : '' );

		    $enable_website_form = innovation_ruby_util::get_theme_option( 'enable_website_comment_box' );

		    if ( ! empty( $enable_website_form ) ) {
			    $fields['author'] = '<p class="comment-form-author col-sm-4 col-xs-12"><label for="author" >' . esc_html__( 'Name', 'innovation' ) . '</label><input id="author" name="author" type="text" placeholder="' . esc_attr__( 'Name', 'innovation' ) . '..." size="30" ' . $aria_req . ' /></p>';
			    $fields['email']  = '<p class="comment-form-email col-sm-4 col-xs-12"><label for="email" >' . esc_html__( 'Email', 'innovation' ) . '</label><input id="email" name="email" type="text" placeholder="' . esc_attr__( 'Email', 'innovation' ) . '..." ' . $aria_req . ' /></p>';
			    $fields['url']    = '<p class="comment-form-url col-sm-4 col-xs-12"><label for="url">' . esc_html__( 'Website', 'innovation' ) . '</label>' . '<input id="url" name="url" type="text" placeholder="' . esc_attr__( 'Website', 'innovation' ) . '..." ' . $aria_req . ' /></p>';
		    } else {
			    $fields['email']  = '<p class="comment-form-email col-sm-6 col-xs-12"><label for="email" >' . esc_html__( 'Email', 'innovation' ) . '</label><input id="email" name="email" type="text" placeholder="' . esc_attr__( 'Email', 'innovation' ) . '..." ' . $aria_req . ' /></p>';
			    $fields['author'] = '<p class="comment-form-author col-sm-6 col-xs-12"><label for="author" >' . esc_html__( 'Name', 'innovation' ) . '</label><input id="author" name="author" type="text" placeholder="' . esc_attr__( 'Name', 'innovation' ) . '..." size="30" ' . $aria_req . ' /></p>';
			    unset( $fields['url'] );
		    }

		    return $fields;
	    }

	    add_filter( 'comment_form_default_fields', 'innovation_ruby_comment_fields' );
    }



    if ( is_user_logged_in() ) {
	    $current_user = wp_get_current_user();
	    $args         = array(
		    'title_reply'          => esc_html__( 'Leave a Response', 'innovation' ),
		    'comment_notes_before' => '',
		    'comment_notes_after'  => '',
		    'comment_field'        => '<p class="comment-form-comment"><label for="comment" >' . esc_html__( 'Comment', 'innovation' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="' . esc_html__( 'Write your comment here...', 'innovation' ) . '"></textarea></p>',
		    'id_submit'            => 'comment-submit',
		    'class_submit'         => 'clearfix',
		    'label_submit'         => esc_html__( 'Leave a comment', 'innovation' )
	    );
    } else {
	    $args = array(
		    'title_reply'          => esc_html__( 'Leave a Response', 'innovation' ),
		    'comment_notes_before' => '',
		    'comment_notes_after'  => '',
		    'comment_field'        => '<p class="comment-form-comment"><label for="comment" >' . esc_html__( 'Comment', 'innovation' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="' . esc_html__( 'Write your comment here...', 'innovation' ) . '"></textarea></p>',
		    'id_submit'            => 'comment-submit',
		    'class_submit'         => 'clearfix',
		    'label_submit'         => esc_html__( 'Leave a comment', 'innovation' )
	    );
    };

    comment_form( $args ); ?>
</div>
