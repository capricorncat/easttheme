<?php

include('inc/easttheme-lib.php');

function easttheme_head_meta() { ?>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<?php }
add_action('wp_head', 'easttheme_head_meta');

/* *
 * ACF Options Pages
 **/
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Options',
		'menu_title'	=> 'Options',
		'menu_slug' 	=> 'theme-options',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Header Options',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-options'
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer Options',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-options'
	));

}

/* *
 * Theme setup
 */
function easttheme_setup() {

	load_theme_textdomain( 'easttheme', get_template_directory() . '/languages' );

  // Enable plugins to manage the document title
  // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
  add_theme_support( 'title-tag' );

  // Register wp_nav_menu() menus
  // http://codex.wordpress.org/Function_Reference/register_nav_menus
  register_nav_menus([
    'primary_navigation' => __( 'Primary Navigation', 'easttheme' )
  ]);

	// Enable Automatic Feed Links to enable post and comment RSS feeds
	// https://developer.wordpress.org/themes/basics/theme-functions/
	// https://developer.wordpress.org/reference/functions/add_theme_support/
	add_theme_support( 'automatic-feed-links' );

  // Enable post thumbnails
  // http://codex.wordpress.org/Post_Thumbnails
  // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
  // http://codex.wordpress.org/Function_Reference/add_image_size
  add_theme_support( 'post-thumbnails' );

  // Enable post formats
  // http://codex.wordpress.org/Post_Formats
  add_theme_support( 'post-formats',
  ['aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio'] );

  // Enable HTML5 markup support
  // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
  add_theme_support( 'html5',
  ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form'] );
}
add_action( 'after_setup_theme', 'easttheme_setup' );

/* *
 * Register sidebars
 */
function easttheme_widgets_init() {

  register_sidebar([
    'name'          => __( 'Header', 'easttheme' ),
    'id'            => 'sidebar-header',
    'before_widget' => '<div class="item %1$s %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="sr-only">',
    'after_title'   => '</h3>'
  ]);

  register_sidebar([
    'name'          => __('Footer', 'easttheme'),
    'id'            => 'sidebar-footer',
    'before_widget' => '<div class="widget %1$s %2$s ui column">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="sr-only">',
    'after_title'   => '</h3>'
  ]);

  register_sidebar([
    'name'          => __('Page Sidebar', 'easttheme'),
    'id'            => 'sidebar-page',
    'before_widget' => '<div class="widget %1$s %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="sr-only">',
    'after_title'   => '</h3>'
  ]);
}
add_action('widgets_init', 'easttheme_widgets_init');

/* *
 * Theme assets
 */
function easttheme_enqueues() {
  // local paths
  $theme_path   = '/wp-content/themes/easttheme-dev/';

  $styles_path  = $theme_path . 'dist/styles/';
  $scripts_path = $theme_path . 'dist/scripts/';
  $ui_path      = $theme_path . 'inc/semantic/dist/';

		$maincss  		= $styles_path  . "main.css";
		$jqueryjs 		= $scripts_path . "jquery.js";
		$mainjs   		= $scripts_path . "main.js";
		$uicss    		= $ui_path  		. "semantic.css";
		$uijs     		= $ui_path 			. "semantic.js";

		wp_deregister_script( 'jquery' );

		wp_enqueue_style ( 	'uicss'   , $uicss 										);
		wp_enqueue_style ( 	'maincss' ,	$maincss 	, [ 'uicss'		] );
		wp_enqueue_script( 	'jquery'  , $jqueryjs 								);
		wp_enqueue_script( 	'uijs'    , $uijs			, [ 'jquery' 	] );
		wp_enqueue_script( 	'mainjs'  , $mainjs		, [ 'uijs' 		] );

}
add_action( 'wp_enqueue_scripts'    , 'easttheme_enqueues' );
//add_action( 'admin_enqueue_scripts' , 'easttheme_enqueues' );
//add_action( 'login_enqueue_scripts' , 'easttheme_enqueues' );

 ?>
