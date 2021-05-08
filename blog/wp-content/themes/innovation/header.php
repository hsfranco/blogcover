<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="http://gmpg.org/xfn/11"/>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"/>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); innovation_ruby_schema::makeup( 'body' ); ?>>
<?php get_template_part( 'templates/header/block', 'aside' ); ?>
<div class="main-site-outer">
	<?php get_template_part( 'templates/section', 'header' ); ?>
	<div class="main-site-wrap">
		<div class="side-area-mask"></div>
		<div class="site-wrap-outer">
			<div id="ruby-site-wrap" class="clearfix">