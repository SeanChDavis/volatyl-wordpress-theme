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

define( 'DEFAULT_PRIMARY_HUE', 260 );
define( 'DEFAULT_PALETTE_VIBRANCY', 80 );
define( 'DEFAULT_BACKGROUND_TINT', 35 );
define( 'DEFAULT_COLOR_SCHEME_TYPE', 'analogous' );
define( 'DEFAULT_BORDER_RADIUS', 10 );
define( 'DEFAULT_BUTTON_RADIUS', 10 );

// Theme functions
require_once( THEME_INCLUDES . '/helper-functions.php' );
require_once( THEME_INCLUDES . '/page-layout.php' );
require_once( THEME_INCLUDES . '/body-class.php' );
require_once( THEME_INCLUDES . '/color-schemes.php' );
require_once( THEME_INCLUDES . '/queries.php' );
require_once( THEME_INCLUDES . '/core-modifications.php' );
require_once( THEME_INCLUDES . '/template-tags.php' );
require_once( THEME_INCLUDES . '/widgets.php' );

require_once( THEME_INCLUDES . '/gutenberg/styles.php' );

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

	// Hard cropped image size for grid items (16:9)
	add_image_size( 'v-grid-item-media', 600, 338, true ); // Default size
	add_image_size( 'v-grid-item-media_small', 350, 197, true );
	add_image_size( 'v-grid-item-media_medium', 600, 338, true );
	add_image_size( 'v-grid-item-media_large', 800, 450, true );
	add_image_size( 'v-grid-item-media_full', 1168, 657, true );

	// Add support for editor styles
	add_theme_support( 'editor-styles' );

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
		'search-form',
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
	wp_enqueue_script( 'volatyl-scripts', THEME_STYLESHEET_DIR . '/assets/js/scripts.min.js', array(), filemtime( get_template_directory() . '/assets/js/scripts.min.js' ), true );

	// Theme styles
	wp_enqueue_style( 'volatyl-style', THEME_STYLESHEET, array(), filemtime( get_template_directory() . '/style.css' ) );

	// Google fonts
	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css2?family=Cal+Sans&family=Red+Hat+Text:ital,wght@0,400;0,600;0,700;1,400;1,700&display=swap' );
}
add_action( 'wp_enqueue_scripts', 'volatyl_scripts_styles' );