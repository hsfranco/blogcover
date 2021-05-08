<?php
/**
* This file display 404 page
*/

get_header(); ?>
<div class="ruby-page-wrap clearfix page-404">
    <div class="ruby-container">
        <div class="content-404-inner">
            <div class="icon-wrap">
	            <div class="icon-inner">
		            <i class="fa fa-cog icon-one"></i>
		            <i class="fa fa-cog icon-two"></i>
		            <i class="fa fa-cog icon-three"></i>
	            </div>
            </div>
            <div class="content-404">
                <div class="logo-404 post-title"><h1><?php esc_html_e('404', 'innovation'); ?></h1></div>
                <h3 class="title-404 post-title"><?php esc_html_e('It looks like nothing was found at this location.', 'innovation'); ?></h3>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();