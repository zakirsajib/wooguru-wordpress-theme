<!DOCTYPE html>
<html lang="en">

<head profile="http://gmpg.org/xfn/11">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
       
    <?php if(is_page('checkout')):?>
    <link type="text/css" media="all" href="<?php echo get_template_directory_uri()?>/css/autoptimize_5870ebfc958cb1245d15dff5cb285202.css" rel="stylesheet" />
    
    <style>
	    .woocommerce form, 
	    .form-row label{ text-align: left;font-size: 1.5rem;}
	    .woocommerce a.button.alt, 
	    .woocommerce button.button.alt, 
	    .woocommerce input.button.alt, 
	    .woocommerce #respond input#submit.alt{
		    border-radius: 1000px;
		    background-color: #f67310 !important;
		    padding: 15px 50px 20px;
	    }
	</style>
    
    <?php else:?>
    	<link type="text/css" media="all" href="<?php echo get_template_directory_uri()?>/css/autoptimize_4d0d669240bb29cad9ba8e48a2f8a1e4.css" rel="stylesheet" />
    <?php endif?>
    
    <link type="text/css" media="only screen and (max-width: 768px)" href="<?php echo get_template_directory_uri()?>/css/autoptimize_ba77177d5c18bfd408a1b3d372776b66.css" rel="stylesheet" />
    
    <link rel="stylesheet" id="custom-css-css" type="text/css" href="<?php echo get_template_directory_uri()?>/css/woocustom.css" />
    
    
    <style>.inlinemenu{display: none;}</style>
    
    <link type="text/css" media="only screen and (max-width: 860px)" href="<?php echo get_stylesheet_directory_uri()?>/css/autoptimize_57149e457b9b6f34d4855f0b872223ff.css" rel="stylesheet" />

    
<!--
    <script src="https://use.typekit.net/jbt8upz.js"></script>
    <script src="https://load.sumome.com/" data-sumo-site-id="af1a6db98b7234b347288b50a98d418a7c29d030be4388a834f202582054c32f" async="async"></script>
-->
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

<body <?php body_class('fade-in')?>>
        <div class="dark bg-blue-dark  bottom">
        <header class="header clearfix">
            <div class="row">
                <div class="small-12 column">
                    <a href="<?php echo home_url();?>" title="To the homepage" class="left"><img src="<?php echo get_template_directory_uri()?>/images/logo-white.svg" width="90" height="19" alt="WooGuru.net WooCommerce Support"></a>
                    <nav class="nav clearfix">
                        <ul class="inline-list left">
                            <li> <a title="Get awesome WooCommerce help" href="<?php echo home_url();?>#sign-up">Sign-up</a></li>
                            <li> <a href="<?php echo home_url();?>/contact" title="Ask us about a WooCommerce job">Contact</a></li>
                            <li class="hide-for-small"> <a href="#" data-dropdown="drop1" aria-controls="drop1" aria-expanded="false" class="dropdown">Features</a>
                                <ul id="drop1" data-dropdown-content class="f-dropdown" aria-hidden="true">
                                    <li><a href="<?php echo home_url();?>/secure-your-store">Secure your store</a></li>
                                    <li><a href="<?php echo home_url();?>/change-woocommerce-theme-and-design">Change theme &amp; design</a></li>
                                    <li><a href="<?php echo home_url();?>/speed-up-your-store">Speed up your store</a></li>
                                    <li><a href="<?php echo home_url();?>/fix-woocommerce-bugs-and-clashes">Fix bugs &amp; clashes</a></li>
                                    <li><a href="<?php echo home_url();?>/improve-product-copy">Improve product copy</a></li>
                                    <li><a href="<?php echo home_url();?>/improve-woocommerce-seo">Improve SEO</a></li>
                                    <li><a href="<?php echo home_url();?>/grow-your-online-sales">Grow your store</a></li>
                                    <li><a href="<?php echo home_url();?>/integrate-woocommerce-apps">Integrate apps</a></li>
                                </ul>
                            </li>
                            <li class="hide-for-small"> <a href="<?php echo home_url();?>/blog" title="Actionable articles about eCommerce">Blog</a></li>
                            <li class="hide-for-small"> <a href="<?php echo home_url();?>/woocommerce-affiliates" title="WooGuru Affiliate program">Affiliate</a></li>
                            <li class="hide-for-small"> <a href="#" title="eCommerce & Startups Group">Ecommerce Community</a></li>
                        </ul> <a class="right button round white small alt hide-for-small" title="Get great WooCommerce help" href="<?php echo home_url();?>#sign-up">Sign-up</a></nav>
                </div>
            </div>
        </header>
    </div>