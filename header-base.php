<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<meta name="viewport" content="width=device-width, minimum-scale=1.0">
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Varela+Round|Merriweather">
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/normalize.css">
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/base.css" media="screen, handheld">
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/mobile.css" media="only screen and (min-width: 320px)">
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/desktop.css" media="only screen and (min-width: 720px)">

	<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div class="wrap">
		<header role="banner">
			<h1><a href="<?php bloginfo( 'url' ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			<nav role="navigation">
				<h1>Navigation</h1>
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav>
		</header>
		<div role="main">
