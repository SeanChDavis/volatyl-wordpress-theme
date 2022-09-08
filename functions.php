<?php // Where it all begins

// Theme Definitions
define( 'THEME_NAME', 'Volatyl' );
define( 'THEME_VERSION', '1.0.0' );
define( 'THEME_URI', 'https://getvolatyl.com' );
define( 'THEME_TEMPLATE_DIR', get_template_directory() );
define( 'THEME_TEMPLATE_DIR_URI', get_template_directory_uri() );
define( 'THEME_STYLESHEET', get_stylesheet_uri() );
define( 'THEME_STYLESHEET_DIR', get_stylesheet_directory_uri() );
define( 'THEME_INCLUDES', THEME_TEMPLATE_DIR . '/includes' );

define( 'DEFAULT_PRIMARY_HUE', 216 );
define( 'DEFAULT_GLOBAL_HUE_SATURATION', 60 );
define( 'DEFAULT_COLOR_SCHEME_TYPE', 'analogous' );

// Theme functions
require_once( THEME_INCLUDES . '/helper-functions.php' );
require_once( THEME_INCLUDES . '/body-class.php' );
require_once( THEME_INCLUDES . '/queries.php' );

require_once( THEME_INCLUDES . '/core-modifications.php' );
require_once( THEME_INCLUDES . '/template-tags.php' );
require_once( THEME_INCLUDES . '/widgets.php' );

require_once( THEME_INCLUDES . '/customizer/customizer.php' );

// Theme setup
function volatyl_setup() {

	// Make theme available for translation
	load_theme_textdomain( 'volatyl', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails
	add_theme_support( 'post-thumbnails' );

	// Hard cropped image size for grid items
	add_image_size( 'v-grid-item-media', 600, 300, true ); // Default size
	add_image_size( 'v-grid-item-media_small', 350, 175, true );
	add_image_size( 'v-grid-item-media_medium', 600, 300, true );
	add_image_size( 'v-grid-item-media_large', 800, 400, true );
	add_image_size( 'v-grid-item-media_full', 1168, 584, true );

	// Register theme nav menus
	register_nav_menus( array(
		'primary-menu' => esc_html__( 'Primary Menu', 'volatyl' )
	) );

	// Switch default core markup to output valid HTML5
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'style',
		'script',
		'navigation-widgets',
	) );

	// Add support for custom logo
	add_theme_support( 'custom-logo', array(
		'height'      => 250,
		'width'       => 250,
		'flex-width'  => true,
		'flex-height' => true,
	) );
}
add_action( 'after_setup_theme', 'volatyl_setup' );

// Enqueue scripts and styles
function volatyl_scripts_styles() {

	// Theme JS
	wp_enqueue_script( 'volatyl-scripts', THEME_STYLESHEET_DIR . '/assets/js/scripts.min.js', array( 'jquery' ), THEME_VERSION, true );

	// Theme styles
	wp_enqueue_style( 'volatyl-style', THEME_STYLESHEET, array(), THEME_VERSION );

	// Google fonts
	wp_enqueue_style( 'google-fonts-red-hat-display', '//fonts.googleapis.com/css2?family=Red+Hat+Display:ital,wght@0,400;0,600;0,700;0,900;1,400;1,700;1,900&family=Red+Hat+Text:ital,wght@0,400;0,600;0,700;1,400;1,700' );
}
add_action( 'wp_enqueue_scripts', 'volatyl_scripts_styles' );