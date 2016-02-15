<?php

add_action('init','of_options');

if (!function_exists('of_options'))
{
	function of_options()
	{
		//Access the WordPress Categories via an Array
		$of_categories 		= array();  
		$of_categories_obj 	= get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
		    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
		$categories_tmp 	= array_unshift($of_categories, "Select a category:");    
	       
		//Access the WordPress Pages via an Array
		$of_pages 			= array();
		$of_pages_obj 		= get_pages('sort_column=post_parent,menu_order');    
		foreach ($of_pages_obj as $of_page) {
		    $of_pages[$of_page->ID] = $of_page->post_name; }
		$of_pages_tmp 		= array_unshift($of_pages, "Select a page:");       
	
		//Testing 
		$of_options_select 	= array("one","two","three","four","five"); 
		$of_options_radio 	= array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
		
		//Sample Homepage blocks for the layout manager (sorter)
		$of_options_homepage_blocks = array
		( 
			"disabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_one"		=> "Block One",
				"block_two"		=> "Block Two",
				"block_three"	=> "Block Three",
			), 
			"enabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_four"	=> "Block Four",
			),
		);


		//Stylesheets Reader
		$alt_stylesheet_path = LAYOUT_PATH;
		$alt_stylesheets = array();
		
		if ( is_dir($alt_stylesheet_path) ) 
		{
		    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) 
		    { 
		        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) 
		        {
		            if(stristr($alt_stylesheet_file, ".css") !== false)
		            {
		                $alt_stylesheets[] = $alt_stylesheet_file;
		            }
		        }    
		    }
		}


		//Background Images Reader
		$bg_images_path = get_stylesheet_directory(). '/images/admin/'; // change this to where you store your bg images
		$bg_images_url = get_template_directory_uri().'/images/admin/'; // change this to where you store your bg images
		$bg_images = array();
		
		if ( is_dir($bg_images_path) ) {
		    if ($bg_images_dir = opendir($bg_images_path) ) { 
		        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
		            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
		            	natsort($bg_images); //Sorts the array into a natural order
		                $bg_images[] = $bg_images_url . $bg_images_file;
		            }
		        }    
		    }
		}
		

		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr 		= wp_upload_dir();
		$all_uploads_path 	= $uploads_arr['path'];
		$all_uploads 		= get_option('of_uploads');
		$other_entries 		= array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat 		= array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos 			= array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post"); 


/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();


// General Settings

$of_options[] = array( 	"name" 		=> "General Settings",
						"type" 		=> "heading"
				);


$of_options[] = array( 	"name" 		=> "Favicon",
						"desc" 		=> "You can put url of an ico image that will represent your website's favicon (16px x 16px).",
						"id" 		=> "favicon",
						// Use the shortcodes [site_url] or [site_url_secure] for setting default URLs
						"std" 		=> "",
						"type" 		=> "upload"
				);

$of_options[] = array( "name" => "Apple iPhone Icon Upload",
					"desc" => "Icon for Apple iPhone (57px x 57px)",
					"id" => "iphone_icon",
					"std" => "",
					"type" => "upload");

$of_options[] = array( "name" => "Apple iPhone Retina Icon Upload",
					"desc" => "Icon for Apple iPhone Retina Version (114px x 114px)",
					"id" => "iphone_icon_retina",
					"std" => "",
					"type" => "upload");

$of_options[] = array( "name" => "Apple iPad Icon Upload",
					"desc" => "Icon for Apple iPhone (72px x 72px)",
					"id" => "ipad_icon",
					"std" => "",
					"type" => "upload");

$of_options[] = array( "name" => "Apple iPad Retina Icon Upload",
					"desc" => "Icon for Apple iPad Retina Version (144px x 144px)",
					"id" => "ipad_icon_retina",
					"std" => "",
					"type" => "upload");


					
$url =  ADMIN_DIR . 'assets/images/';
$of_options[] = array( 	"name" 		=> "Main Layout",
						"desc" 		=> "Select main content and sidebar alignment. Choose between 1, 2 or 3 column layout.",
						"id" 		=> "layout",
						"std" 		=> "2c-l-fixed.css",
						"type" 		=> "images",
						"options" 	=> array(
							'1col-fixed.css' 	=> $url . '1col.png',
							'2c-r-fixed.css' 	=> $url . '2cr.png',
							'2c-l-fixed.css' 	=> $url . '2cl.png',
							'3c-fixed.css' 		=> $url . '3cm.png',
							'3c-r-fixed.css' 	=> $url . '3cr.png'
						)
				);
				
$of_options[] = array( 	"name" 		=> "Tracking Code",
						"desc" 		=> "Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.",
						"id" 		=> "google_analytics",
						"std" 		=> "",
						"type" 		=> "textarea"
				);
$of_options[] = array( "name" => "Space before &lt;/head&gt;",
					"desc" => "Add code before the &lt;/head&gt; tag.",
					"id" => "space_head",
					"std" => "",
					"type" => "textarea");

$of_options[] = array( "name" => "Space before &lt;/body&gt;",
					"desc" => "Add code before the &lt;/body&gt; tag.",
					"id" => "space_body",
					"std" => "",
					"type" => "textarea");
				
				

// Header Settings

$of_options[] = array( 	"name" 		=> "Header Settings",
						"type" 		=> "heading"
				);

$of_options[] = array( "name" => "Header Top Margin",
					"desc" => "(in pixels)",
					"id" => "margin_header_top",
					"std" => "0px",
					"type" => "text");

$of_options[] = array( "name" => "Header Bottom Margin",
					"desc" => "(in pixels)",
					"id" => "margin_header_bottom",
					"std" => "0px",
					"type" => "text");



$of_options[] = array( 	"name" 		=> "Logo",
						"desc" 		=> "Upload logo.",
						"id" 		=> "upload_logo",
						// Use the shortcodes [site_url] or [site_url_secure] for setting default URLs
						"std" 		=> get_bloginfo('template_directory')."/images/logo.png",
						"type" 		=> "upload"
				);

$of_options[] = array( "name" => "Logo (Retina Version @2x)",
					"desc" => "Please choose an image file for the retina version of the logo. It should be 2x the size of main logo.",
					"id" => "logo_retina",
					"std" => "",
					"mod" => "",
					"type" => "media");

$of_options[] = array( "name" => "Standard Logo Width for Retina Logo",
					"desc" => "If retina logo is uploaded, please enter the standard logo (1x) version width, do not enter the retina logo width.",
					"id" => "retina_logo_width",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "Standard Logo Height for Retina Logo",
					"desc" => "If retina logo is uploaded, please enter the standard logo (1x) version height, do not enter the retina logo height.",
					"id" => "retina_logo_height",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "Logo Alignment",
					"desc" => "Note: center only works on 5th header layout",
					"id" => "logo_alignment",
					"std" => "Left",
					"type" => "select",
					"options" => array('left' => 'Left', 'center' => 'Center', 'right' => 'Right',));

$of_options[] = array( "name" => "Logo Left Margin",
					"desc" => "(in pixels)",
					"id" => "margin_logo_left",
					"std" => "0px",
					"type" => "text");

$of_options[] = array( "name" => "Logo Right Margin",
					"desc" => "(in pixels)",
					"id" => "margin_logo_right",
					"std" => "0px",
					"type" => "text");

$of_options[] = array( "name" => "Logo Top Margin",
					"desc" => "(in pixels)",
					"id" => "margin_logo_top",
					"std" => "31px",
					"type" => "text");

$of_options[] = array( "name" => "Logo Bottom Margin",
					"desc" => "(in pixels)",
					"id" => "margin_logo_bottom",
					"std" => "0px",
					"type" => "text");
				
					
					
// Home Settings					

$of_options[] = array( 	"name" 		=> "Home Settings",
						"type" 		=> "heading"
				);



$of_options[] = array( 	"name" 		=> "Media Uploader 3.5 min",
						"desc" 		=> "Upload images using native media uploader from Wordpress 3.5+. Min mod",
						"id" 		=> "media_upload_356",
						// Use the shortcodes [site_url] or [site_url_secure] for setting default URLs
						"std" 		=> "",
						"mod"		=> "min",
						"type" 		=> "media"
				);



$of_options[] = array( 	"name" 		=> "JQuery UI Slider example 1",
						"desc" 		=> "JQuery UI slider description.<br /> Min: 1, max: 500, step: 3, default value: 45",
						"id" 		=> "slider_example_1",
						"std" 		=> "45",
						"min" 		=> "1",
						"step"		=> "3",
						"max" 		=> "500",
						"type" 		=> "sliderui" 
				);
				
$of_options[] = array( 	"name" 		=> "JQuery UI Slider example 1 with steps(5)",
						"desc" 		=> "JQuery UI slider description.<br /> Min: 0, max: 300, step: 5, default value: 75",
						"id" 		=> "slider_example_2",
						"std" 		=> "75",
						"min" 		=> "0",
						"step"		=> "5",
						"max" 		=> "300",
						"type" 		=> "sliderui" 
				);

$of_options[] = array( 	"name" 		=> "JQuery UI Spinner",
						"desc" 		=> "JQuery UI spinner description.<br /> Min: 0, max: 300, step: 5, default value: 75",
						"id" 		=> "spinner_example_2",
						"std" 		=> "75",
						"min" 		=> "0",
						"step"		=> "5",
						"max" 		=> "300",
						"type" 		=> "spinner" 
				);
				
$of_options[] = array( 	"name" 		=> "Switch 1",
						"desc" 		=> "Switch OFF",
						"id" 		=> "switch_ex1",
						"std" 		=> 0,
						"type" 		=> "switch"
				);   
				
$of_options[] = array( 	"name" 		=> "Switch 2",
						"desc" 		=> "Switch ON",
						"id" 		=> "switch_ex2",
						"std" 		=> 1,
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> "Switch 3",
						"desc" 		=> "Switch with custom labels",
						"id" 		=> "switch_ex3",
						"std" 		=> 0,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> "Switch 4",
						"desc" 		=> "Switch OFF with hidden options. ;)",
						"id" 		=> "switch_ex4",
						"std" 		=> 0,
						"folds"		=> 1,
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> "Hidden option 1",
						"desc" 		=> "This is a sample hidden option controlled by a <strong>switch</strong> button",
						"id" 		=> "hidden_switch_ex1",
						"std" 		=> "Hi, I\'m just a text input - nr 1",
						"fold" 		=> "switch_ex4", /* the switch hook */
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Hidden option 2",
						"desc" 		=> "This is a sample hidden option controlled by a <strong>switch</strong> button",
						"id" 		=> "hidden_switch_ex2",
						"std" 		=> "Hi, I\'m just a text input - nr 2",
						"fold" 		=> "switch_ex4", /* the switch hook */
						"type" 		=> "text"
				);
				
				
$of_options[] = array( 	"name" 		=> "Homepage Layout Manager",
						"desc" 		=> "Organize how you want the layout to appear on the homepage",
						"id" 		=> "homepage_blocks",
						"std" 		=> $of_options_homepage_blocks,
						"type" 		=> "sorter"
				);
					
$of_options[] = array( 	"name" 		=> "Slider Options",
						"desc" 		=> "Unlimited slider with drag and drop sortings.",
						"id" 		=> "pingu_slider",
						"std" 		=> "",
						"type" 		=> "slider"
				);
					
$of_options[] = array( 	"name" 		=> "Background Images",
						"desc" 		=> "Select a background pattern.",
						"id" 		=> "custom_bg",
						"std" 		=> $bg_images_url."bg0.png",
						"type" 		=> "tiles",
						"options" 	=> $bg_images,
				);
					
$of_options[] = array( 	"name" 		=> "Typography",
						"desc" 		=> "Typography option with each property can be called individually.",
						"id" 		=> "custom_type",
						"std" 		=> array('size' => '12px','style' => 'bold italic'),
						"type" 		=> "typography"
				);



// Styling options

$of_options[] = array( 	"name" 		=> "Styling Options",
						"type" 		=> "heading"
				);
				
$of_options[] = array( 	"name" 		=> "Theme Stylesheet",
						"desc" 		=> "Select your themes alternative color scheme.",
						"id" 		=> "alt_stylesheet",
						"std" 		=> "default.css",
						"type" 		=> "select",
						"options" 	=> $alt_stylesheets
				);
				
$of_options[] = array( 	"name" 		=> "Body Background Color",
						"desc" 		=> "Pick a background color for the theme (default: #fff).",
						"id" 		=> "body_background",
						"std" 		=> "",
						"type" 		=> "color"
				);
				
$of_options[] = array( 	"name" 		=> "Header Background Color",
						"desc" 		=> "Pick a background color for the header (default: #fff).",
						"id" 		=> "header_background",
						"std" 		=> "",
						"type" 		=> "color"
				);
				
$of_options[] = array( 	"name" 		=> "Footer Background Color",
						"desc" 		=> "Pick a background color for the footer (default: #fff).",
						"id" 		=> "footer_background",
						"std" 		=> "",
						"type" 		=> "color"
				);
				
$of_options[] = array( 	"name" 		=> "Body Font",
						"desc" 		=> "Specify the body font properties",
						"id" 		=> "body_font",
						"std" 		=> array('size' => '12px','face' => 'arial','style' => 'normal','color' => '#000000'),
						"type" 		=> "typography"
				);  
				
$of_options[] = array( 	"name" 		=> "Custom CSS",
						"desc" 		=> "Quickly add some CSS to your theme by adding it to this block.",
						"id" 		=> "custom_css",
						"std" 		=> "",
						"type" 		=> "textarea"
				);


// Footer options


$of_options[] = array( "name" => "Footer Options",
					"type" => "heading");

$of_options[] = array( "name" => "Footer Widgets Area",
					"desc" => "",
					"id" => "footer_widgets_area_title",
					"std" => "<h3 style='margin: 0;'>Footer Widgets Area Options</h3>",
					"icon" => true,
					"type" => "info");

$of_options[] = array( "name" => "Footer Widgets",
					"desc" => "Show footer widgets",
					"id" => "footer_widgets",
					"std" => 1,
					"type" => "checkbox");

$of_options[] = array( "name" => "Number of Footer Columns",
					"desc" => "",
					"id" => "footer_widgets_columns",
					"std" => "4",
					"options" => array('1' => '1', '2' => '2', '3' => '3', '4' => '4'),
					"type" => "select");
 
 $of_options[] = array( "name" => "Background Image For Footer Area",
					"desc" => "Please choose an image or insert an image url to use for the footer widget area backgroud.",
					"id" => "footerw_bg_image",
					"std" => "",
					"mod" => "",
					"type" => "media");

$of_options[] = array( "name" => "100% Background Image",
					"desc" => "Have footer background image always at 100% in width and height and scale according to the browser size.",
					"id" => "footerw_bg_full",
					"std" => 0,
					"type" => "checkbox");

$of_options[] = array( "name" => "Background Repeat",
					"desc" => "",
					"id" => "footerw_bg_repeat",
					"std" => "",
					"type" => "select",
					"options" => array('repeat' => 'repeat', 'repeat-x' => 'repeat-x', 'repeat-y' => 'repeat-y', 'no-repeat' => 'no-repeat'));

$of_options[] = array( "name" => "Copyright Area / Social Icons Options",
					"desc" => "",
					"id" => "copyright_area_title",
					"std" => "<h3 style='margin: 0;'>Copyright Area / Social Icons Options</h3>",
					"icon" => true,
					"type" => "info");

$of_options[] = array( "name" => "Copyright Bar",
					"desc" => "Show copyright bar",
					"id" => "footer_copyright",
					"std" => 1,
					"type" => "checkbox");

$of_options[] = array( "name" => "Copyright Text",
                    "desc" => "",
                    "id" => "footer_text",
                    "std" => "",
                    "type" => "textarea");

$of_options[] = array( "name" => "Display social icons on footer of the page:",
					"desc" => "Select the checkbox to show social media icons on the footer of the page.",
					"id" => "icons_footer",
					"std" => 1,
					"type" => "checkbox");

$of_options[] = array( "name" => "Open social icons on footer in a new window",
					"desc" => "Select the checkbox to allow social icons to open in a new window",
					"id" => "icons_footer_new",
					"std" => 0,
					"type" => "checkbox");


// Example options
				
$of_options[] = array( 	"name" 		=> "Example Options",
						"type" 		=> "heading"
				);
				
$of_options[] = array( 	"name" 		=> "Typography",
						"desc" 		=> "This is a typographic specific option.",
						"id" 		=> "typography",
						"std" 		=> array(
											'size'  => '12px',
											'face'  => 'verdana',
											'style' => 'bold italic',
											'color' => '#123456'
										),
						"type" 		=> "typography"
				);  
				
$of_options[] = array( 	"name" 		=> "Border",
						"desc" 		=> "This is a border specific option.",
						"id" 		=> "border",
						"std" 		=> array(
											'width' => '2',
											'style' => 'dotted',
											'color' => '#444444'
										),
						"type" 		=> "border"
				);
				
$of_options[] = array( 	"name" 		=> "Colorpicker",
						"desc" 		=> "No color selected.",
						"id" 		=> "example_colorpicker",
						"std" 		=> "",
						"type" 		=> "color"
					); 
					
$of_options[] = array( 	"name" 		=> "Colorpicker (default #2098a8)",
						"desc" 		=> "Color selected.",
						"id" 		=> "example_colorpicker_2",
						"std" 		=> "#2098a8",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> "Input Text",
						"desc" 		=> "A text input field.",
						"id" 		=> "test_text",
						"std" 		=> "Default Value",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Input Checkbox (false)",
						"desc" 		=> "Example checkbox with false selected.",
						"id" 		=> "example_checkbox_false",
						"std" 		=> 0,
						"type" 		=> "checkbox"
				);
				
$of_options[] = array( 	"name" 		=> "Input Checkbox (true)",
						"desc" 		=> "Example checkbox with true selected.",
						"id" 		=> "example_checkbox_true",
						"std" 		=> 1,
						"type" 		=> "checkbox"
				);
				
$of_options[] = array( 	"name" 		=> "Normal Select",
						"desc" 		=> "Normal Select Box.",
						"id" 		=> "example_select",
						"std" 		=> "three",
						"type" 		=> "select",
						"options" 	=> $of_options_select
				);
				
$of_options[] = array( 	"name" 		=> "Mini Select",
						"desc" 		=> "A mini select box.",
						"id" 		=> "example_select_2",
						"std" 		=> "two",
						"type" 		=> "select",
						"mod" 		=> "mini",
						"options" 	=> $of_options_radio
				); 
				
$of_options[] = array( 	"name" 		=> "Google Font Select",
						"desc" 		=> "Some description. Note that this is a custom text added added from options file.",
						"id" 		=> "g_select",
						"std" 		=> "Select a font",
						"type" 		=> "select_google_font",
						"preview" 	=> array(
										"text" => "This is my preview text!", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						),
						"options" 	=> array(
										"none" => "Select a font",//please, always use this key: "none"
										"Lato" => "Lato",
										"Loved by the King" => "Loved By the King",
										"Tangerine" => "Tangerine",
										"Terminal Dosis" => "Terminal Dosis"
						)
				);
				
$of_options[] = array( 	"name" 		=> "Google Font Select2",
						"desc" 		=> "Some description.",
						"id" 		=> "g_select2",
						"std" 		=> "Select a font",
						"type" 		=> "select_google_font",
						"options" 	=> array(
										"none" => "Select a font",//please, always use this key: "none"
										"Lato" => "Lato",
										"Loved by the King" => "Loved By the King",
										"Tangerine" => "Tangerine",
										"Terminal Dosis" => "Terminal Dosis"
									)
				);
				
$of_options[] = array( 	"name" 		=> "Input Radio (one)",
						"desc" 		=> "Radio select with default of 'one'.",
						"id" 		=> "example_radio",
						"std" 		=> "one",
						"type" 		=> "radio",
						"options" 	=> $of_options_radio
				);
				
$url =  ADMIN_DIR . 'assets/images/';
$of_options[] = array( 	"name" 		=> "Image Select",
						"desc" 		=> "Use radio buttons as images.",
						"id" 		=> "images",
						"std" 		=> "warning.css",
						"type" 		=> "images",
						"options" 	=> array(
											'warning.css' 	=> $url . 'warning.png',
											'accept.css' 	=> $url . 'accept.png',
											'wrench.css' 	=> $url . 'wrench.png'
										)
				);
				
$of_options[] = array( 	"name" 		=> "Textarea",
						"desc" 		=> "Textarea description.",
						"id" 		=> "example_textarea",
						"std" 		=> "Default Text",
						"type" 		=> "textarea"
				);
				
$of_options[] = array( 	"name" 		=> "Multicheck",
						"desc" 		=> "Multicheck description.",
						"id" 		=> "example_multicheck",
						"std" 		=> array("three","two"),
						"type" 		=> "multicheck",
						"options" 	=> $of_options_radio
				);
				
$of_options[] = array( 	"name" 		=> "Select a Category",
						"desc" 		=> "A list of all the categories being used on the site.",
						"id" 		=> "example_category",
						"std" 		=> "Select a category:",
						"type" 		=> "select",
						"options" 	=> $of_categories
				);
				
//Advanced Settings
$of_options[] = array( 	"name" 		=> "Advanced Settings",
						"type" 		=> "heading"
				);
				
$of_options[] = array( 	"name" 		=> "Folding Checkbox",
						"desc" 		=> "This checkbox will hide/show a couple of options group. Try it out!",
						"id" 		=> "offline",
						"std" 		=> 0,
						"folds" 	=> 1,
						"type" 		=> "checkbox"
				);
				
$of_options[] = array( 	"name" 		=> "Hidden option 1",
						"desc" 		=> "This is a sample hidden option 1",
						"id" 		=> "hidden_option_1",
						"std" 		=> "Hi, I\'m just a text input",
						"fold" 		=> "offline", /* the checkbox hook */
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Hidden option 2",
						"desc" 		=> "This is a sample hidden option 2",
						"id" 		=> "hidden_option_2",
						"std" 		=> "Hi, I\'m just a text input",
						"fold" 		=> "offline", /* the checkbox hook */
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Hello there!",
						"desc" 		=> "",
						"id" 		=> "introduction_2",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Grouped Options.</h3>
						You can group a bunch of options under a single heading by removing the 'name' value from the options array except for the first option in the group.",
						"icon" 		=> true,
						"type" 		=> "info"
				);
				
				$of_options[] = array( 	"name" 		=> "Some pretty colors for you",
										"desc" 		=> "Color 1.",
										"id" 		=> "example_colorpicker_3",
										"std" 		=> "#2098a8",
										"type" 		=> "color"
								);
								
				$of_options[] = array( 	"name" 		=> "",
										"desc" 		=> "Color 2.",
										"id" 		=> "example_colorpicker_4",
										"std" 		=> "#2098a8",
										"type" 		=> "color"
								);
								
				$of_options[] = array( 	"name" 		=> "",
										"desc" 		=> "Color 3.",
										"id" 		=> "example_colorpicker_5",
										"std" 		=> "#2098a8",
										"type" 		=> "color"
								);
								
				$of_options[] = array( 	"name" 		=> "",
										"desc" 		=> "Color 4.",
										"id" 		=> "example_colorpicker_6",
										"std" 		=> "#2098a8",
										"type" 		=> "color"
								);

// Social sharing links

$of_options[] = array( "name" => "Social Sharing Links",
					"type" => "heading");
					
$of_options[] = array( "name" => "Facebook",
					"desc" => "Place the link you want and facebook icon will appear. To remove it, just leave it blank.",
					"id" => "facebook_link",
					"std" => "",
					"type" => "text"); 

$of_options[] = array( "name" => "Flickr",
					"desc" => "Place the link you want and flickr icon will appear. To remove it, just leave it blank.",
					"id" => "flickr_link",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "RSS",
					"desc" => "Place the link you want and rss icon will appear. To remove it, just leave it blank.",
					"id" => "rss_link",
					"std" => "",
					"type" => "text"); 

$of_options[] = array( "name" => "Twitter",
					"desc" => "Place the link you want and twitter icon will appear. To remove it, just leave it blank.",
					"id" => "twitter_link",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "Vimeo",
					"desc" => "Place the link you want and vimeo icon will appear. To remove it, just leave it blank.",
					"id" => "vimeo_link",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "Youtube",
					"desc" => "Place the link you want and youtube icon will appear. To remove it, just leave it blank.",
					"id" => "youtube_link",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "Pinterest",
					"desc" => "Place the link you want and pinterest icon will appear. To remove it, just leave it blank.",
					"id" => "pinterest_link",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "Tumblr",
					"desc" => "Place the link you want and tumblr icon will appear. To remove it, just leave it blank.",
					"id" => "tumblr_link",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "Google Plus",
					"desc" => "Place the link you want and g+ icon will appear. To remove it, just leave it blank.",
					"id" => "google_link",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "Dribbble",
					"desc" => "Place the link you want and dribbble icon will appear. To remove it, just leave it blank.",
					"id" => "dribbble_link",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "Digg",
					"desc" => "Place the link you want and digg icon will appear. To remove it, just leave it blank.",
					"id" => "digg_link",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "LinkedIn",
					"desc" => "Place the link you want and linkedin icon will appear. To remove it, just leave it blank.",
					"id" => "linkedin_link",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "Blogger",
					"desc" => "Place the link you want and blogger icon will appear. To remove it, just leave it blank.",
					"id" => "blogger_link",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "Skype",
					"desc" => "Place the link you want and skype icon will appear. To remove it, just leave it blank.",
					"id" => "skype_link",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "Forrst",
					"desc" => "Place the link you want and forrst icon will appear. To remove it, just leave it blank.",
					"id" => "forrst_link",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "Myspace",
					"desc" => "Place the link you want and myspace icon will appear. To remove it, just leave it blank.",
					"id" => "myspace_link",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "Deviantart",
					"desc" => "Place the link you want and deviantart icon will appear. To remove it, just leave it blank.",
					"id" => "deviantart_link",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "Yahoo",
					"desc" => "Place the link you want and yahoo icon will appear. To remove it, just leave it blank.",
					"id" => "yahoo_link",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "Reddit",
					"desc" => "Place the link you want and reddit icon will appear. To remove it, just leave it blank.",
					"id" => "reddit_link",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "Custom Icon Name",
					"desc" => "This is the icon name that shows in the hover tooltip",
					"id" => "custom_icon_name",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "Custom Icon Image",
					"desc" => "Please choose an image file for your custom icon",
					"id" => "custom_icon_image",
					"std" => "",
					"mod" => "",
					"type" => "media");

$of_options[] = array( "name" => "Custom Icon Image Retina",
					"desc" => "Please choose an image file for the retina version of the icon. It should be 2x the size of main icon.",
					"id" => "custom_icon_image_retina",
					"std" => "",
					"mod" => "",
					"type" => "media");

$of_options[] = array( "name" => "Standard Icon Width for Retina Icon",
					"desc" => "If retina icon is added, please enter the standard icon (1x) version width, do not enter the retina icon width.",
					"id" => "retina_icon_width",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "Standard Icon Height for Retina Icon",
					"desc" => "If retina icon is added, please enter the standard icon (1x) version height, do not enter the retina icon height.",
					"id" => "retina_icon_height",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "Custom Icon Link",
					"desc" => "Insert a link for your custom icon",
					"id" => "custom_icon_link",
					"std" => "",
					"type" => "text");


// Custom css

$of_options[] = array( "name" => "Custom CSS",
					"type" => "heading");

$of_options[] = array( "name" => "Advanced CSS Customizations",
					"desc" => "",
					"id" => "advanced_css_intro",
					"std" => "<h3 style='margin: 0;'>Advanced CSS Customizations</h3><p style='margin-bottom:0;'>Paste your css code. Do not include <stlye></stlye> tags or any html tag in this field.</p>",
					"icon" => true,
					"type" => "info");

$of_options[] = array( "name" => "CSS Code",
                    "desc" => "Any custom CSS from the user should go in this field, it will override the theme CSS",
                    "id" => "custom_css",
                    "std" => "",
                    "type" => "textarea");



				
// Backup Options
$of_options[] = array( 	"name" 		=> "Backup Options",
						"type" 		=> "heading",
						"icon"		=> ADMIN_IMAGES . "icon-slider.png"
				);
				
$of_options[] = array( 	"name" 		=> "Backup and Restore Options",
						"id" 		=> "of_backup",
						"std" 		=> "",
						"type" 		=> "backup",
						"desc" 		=> 'You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.',
				);
				
$of_options[] = array( 	"name" 		=> "Transfer Theme Options Data",
						"id" 		=> "of_transfer",
						"std" 		=> "",
						"type" 		=> "transfer",
						"desc" 		=> 'You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".',
				);
				
	}//End function: of_options()
}//End chack if function exists: of_options()
?>
