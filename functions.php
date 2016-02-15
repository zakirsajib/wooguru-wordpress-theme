<?php

define ("THEMENAME", "WooGuru");

$current_path= dirname(__FILE__);	

//require_once($current_path. '/admin/index.php');

add_theme_support( 'title-tag' );	
add_theme_support('post-thumbnails');
add_theme_support( 'automatic-feed-links' );	
	
/**
 * Add SVG capabilities
 */
function wpcontent_svg_mime_type( $mimes = array() ) {
  $mimes['svg']  = 'image/svg+xml';
  $mimes['svgz'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'wpcontent_svg_mime_type' );


/********** Register themes Stylesheet ***********/
function default_theme_styles() {
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
	
	wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
	wp_enqueue_style( 'default-theme-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'default_theme_styles' );




/********** Register themes javascript ***********/

add_action( 'wp_enqueue_scripts', 'load_javascript_files' );
function load_javascript_files(){
	 
	wp_register_script( 'custom', get_template_directory_uri() . '/js/custom.js', array('jquery'),'', true );
	
	
	// use wp native jquery library
	
//	wp_enqueue_script( 'jquery' ); // use wp native jquery
	
	// ----------- Enable as your theme demands --------------// 
	// -------------------------------------------------------//
	
	wp_enqueue_script( 'custom' );
}

/********** Register Custom Menus ***********/

add_action( 'init', 'register_my_menus' );
function register_my_menus() {
	register_nav_menus(
		array(
			'Primary' => __( 'Primary Menu', THEMENAME),
			'Footer' => __( 'Footer Menu', THEMENAME)
		)
	);
}


/********** Register sidebar(s) ***********/

add_action( 'widgets_init', 'my_register_sidebars' );
function my_register_sidebars() {
	
		/*Blog Sidebar*/
		$blog_sidebar=array(
			'id' => 'blog_sidebar',
			'name' => __( 'Blog Right Sidebar' , THEMENAME),
			'description' => __( 'Blog Right Sidebar' , THEMENAME),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
		);
		
		/*Single Blog Sidebar*/
		$single_sidebar=array(
			'id' => 'single_sidebar',
			'name' => __( 'Single Blog Right Sidebar' , THEMENAME),
			'description' => __( 'Single Blog Right Sidebar' , THEMENAME),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
		);
		
		/*Footer sidebar */
		$f_sidebar_one=array(
			'id' => 'f_sidebar_one',
			'name' => __( 'Footer one', THEMENAME),
			'description' => __( 'This sidebar is designed for displaying widgets in footer.', THEMENAME),
			'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
		);
		
		/*Footer sidebar */
		$f_sidebar_two=array(
			'id' => 'f_sidebar_two',
			'name' => __( 'Footer two', THEMENAME),
			'description' => __( 'This sidebar is designed for displaying contact details in footer.', THEMENAME),
			'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
		);
		
		/*Footer sidebar */
		$f_sidebar_three=array(
			'id' => 'f_sidebar_three',
			'name' => __( 'Blog Footer Sidebar', THEMENAME),
			'description' => __( 'This sidebar is designed for displaying widgets in footer.', THEMENAME),
			'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
		);
		
		/*Footer sidebar */
		$f_sidebar_four=array(
			'id' => 'f_sidebar_four',
			'name' => __( 'Contact page Sidebar', THEMENAME),
			'description' => __( 'This sidebar is designed for displaying widgets in footer.', THEMENAME),
			'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
		);

		
				
		
		/* Register the sidebars. */
		register_sidebar( $blog_sidebar );
		register_sidebar( $single_sidebar );
		register_sidebar( $f_sidebar_one );
		register_sidebar( $f_sidebar_two );
		register_sidebar( $f_sidebar_three );
		register_sidebar( $f_sidebar_four );
}

/*********** Displays navigation to next/previous pages when applicable. in SINGLE page***********/

if ( ! function_exists( 'content_nav' ) ) :

function content_nav() {?>
		
	<div class="postnav">
			<div class="item">
				<?php previous_post_link('%link', '&larr; Previous post');?> 
			</div>
			
			<div class="item">				
				<?php next_post_link('%link', 'Next post &rarr;'); ?>
			</div>
	</div>
	<?php
}
endif;
remove_filter( 'the_content', 'wpautop' );
//remove_filter( 'the_excerpt', 'wpautop' );

function php_execute($html){
	if(strpos($html,"<"."?php")!==false){ ob_start(); eval("?".">".$html);
		$html=ob_get_contents();
		ob_end_clean();
	}
	return $html;
}
add_filter('widget_text','php_execute',100);

// Redirect to checkout page directly without cart
add_filter ('woocommerce_add_to_cart_redirect', 'woo_redirect_to_checkout');
function woo_redirect_to_checkout() {
	$checkout_url = WC()->cart->get_checkout_url();
	return $checkout_url;
}

// Remove fields from checkout billing form
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
function custom_override_checkout_fields( $fields ) {
	unset($fields['order']['order_comments']);
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_country']);
    unset($fields['billing']['billing_state']);
    unset($fields['billing']['billing_phone']);
    
    return $fields;
}

// Add new field Website
add_filter( 'woocommerce_checkout_fields' , 'custom_checkout_fields' );
function custom_checkout_fields( $fields ) {
     $fields['billing']['billing_website'] = array(
        'label'     => __('Website', 'woocommerce'),
    'placeholder'   => _x('Website', 'placeholder', 'woocommerce'),
    'required'  => true,
    'class'     => array('form-row-wide'),
    'clear'     => true
     );

     return $fields;
}

// Add css class form-row-wide and etc
add_filter( 'woocommerce_default_address_fields' , 'custom_override_default_address_fields' );
function custom_override_default_address_fields( $address_fields ) {
     $address_fields['first_name']=array(
	     'label'     => __('First Name', 'woocommerce'),
	     'required'  => true, 
     	'class' => array('form-row-wide')
     );
     $address_fields['last_name']=array(
	     'label'     => __('Last Name', 'woocommerce'),
	     'required'  => true, 
     	'class' => array('form-row-wide')
     );
     $address_fields['email']=array(
	     'label'     => __('Email', 'woocommerce'),
	     'required'  => true, 
     	'class' => array('form-row-wide')
     );
     return $address_fields;
}

?>