<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="pingback" href="xmlrpc.php.html" />
<!--     <link type="text/css" media="all" href="<?php echo get_template_directory_uri()?>/css/autoptimize_4d0d669240bb29cad9ba8e48a2f8a1e4.css" rel="stylesheet" /> -->
    
    
        
    <?php if(is_single()):?>
    	<link type="text/css" media="all" href="<?php echo get_stylesheet_directory_uri()?>/css/autoptimize_861e95d1eaf7456c67e7587519097cdd.css" rel="stylesheet" />
    	
	<?php else:?>
		<link type="text/css" media="all" href="<?php echo get_stylesheet_directory_uri()?>/css/autoptimize_57149e457b9b6f34d4855f0b872223ff.css" rel="stylesheet" />

	<?php endif;?>
	
	<link rel='stylesheet' id='orca_fonts-css' href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600%7CMontserrat:400,700&ver=1.4.2' type='text/css' media='all' />
    
    <link type="text/css" media="all" href="<?php echo get_stylesheet_directory_uri()?>/css/blog.css" rel="stylesheet" />
    
    
<!--     <link type="text/css" media="only screen and (max-width: 768px)" href="<?php echo get_template_directory_uri()?>/css/autoptimize_ba77177d5c18bfd408a1b3d372776b66.css" rel="stylesheet" /> -->
    
    
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri()?>/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri()?>/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri()?>/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri()?>/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri()?>/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri()?>/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri()?>/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri()?>/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri()?>/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo get_template_directory_uri()?>/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri()?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_template_directory_uri()?>/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri()?>/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri()?>/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    
    <?php wp_head();?>
</head>

<body <?php body_class('home')?>>
    
	    <nav class="mainnav">
	        <a id="top"></a>
	        <div class="navwrap">
	            <?php
					wp_nav_menu( array(
						'theme_location' => 'Primary'
					 ) );
				?>
	            <div class="toggle"><i class="fa fa-bars"></i></div>
	        </div>
	    </nav>
