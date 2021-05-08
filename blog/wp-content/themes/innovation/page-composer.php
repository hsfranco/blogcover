<?php
/*
Template Name: Ruby Page Composer
*/

get_header();

echo innovation_ruby_composer_render::render_page();

$innovation_ruby_composer_blog = get_post_meta( get_the_ID(), 'innovation_ruby_composer_latest', true );
if ( 1 == $innovation_ruby_composer_blog ) {
	echo innovation_ruby_template_composer_loop::render();
}

get_footer();