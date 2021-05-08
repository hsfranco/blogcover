<?php
add_action( 'after_setup_theme', 'bk_setup_page_builder' );

//pagebuilder_classic_editor
function pagebuilder_classic_editor() {
    wp_enqueue_script( 'therex-pagebuilder-classic-init', get_template_directory_uri().'/js/pagebuilder-classic-init.js', array('jquery-ui-sortable'), '', true );
}

//pagebuilder_gutenberg_editor
function pagebuilder_gutenberg_editor() {
	wp_enqueue_script( 'therex-pagebuilder-gutenberg-init', get_template_directory_uri().'/js/pagebuilder-gutenberg-init.js', array('jquery-ui-sortable'), '', true );
}


function bk_setup_page_builder() {
    global $wp_version;
	if ( function_exists( 'bk_init_sections' ) ) {
	   add_action( 'admin_enqueue_scripts', 'bk_init_sections' );
    }
    
    if((is_admin())) {
        if ( version_compare( $wp_version, '5.0', '>=' ) ) {
            if ( !class_exists( 'Classic_Editor' ) ) {
                add_action( 'enqueue_block_assets', 'bk_page_builder_temp' );   
                add_action('admin_enqueue_scripts', 'pagebuilder_gutenberg_editor');
            }else {
                add_action( 'edit_form_after_title', 'bk_page_builder_temp' );    
                add_action('admin_enqueue_scripts', 'pagebuilder_classic_editor');
                add_action( 'save_post', 'bk_classic_save_page' );
            }
        }else {
            if(!function_exists('gutenberg_pre_init')) {
                add_action( 'edit_form_after_title', 'bk_page_builder_temp' );    
                add_action('admin_enqueue_scripts', 'pagebuilder_classic_editor');
                add_action( 'save_post', 'bk_classic_save_page' );
            }else {
                add_action( 'enqueue_block_assets', 'bk_page_builder_temp' );   
                add_action('admin_enqueue_scripts', 'pagebuilder_gutenberg_editor');
            }
        }
    }              
}