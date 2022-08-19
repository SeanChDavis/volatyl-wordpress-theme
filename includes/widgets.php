<?php
// Unique sidebar data
$sidebars = array(

	// Sidebars
	'post'    => array(
		'name'        => esc_html__( 'Single Post Sidebar', 'volatyl' ),
		'id'          => 'single-post-sidebar',
		'location'    => 'sidebar',
		'description' => esc_html__( 'This sidebar only displays while viewing a single blog post, or a post type that inherits single the single blog post template.', 'volatyl' ),
	),
	'page'    => array(
		'name'        => esc_html__( 'Single Page Sidebar', 'volatyl' ),
		'id'          => 'single-page-sidebar',
		'location'    => 'sidebar',
		'description' => esc_html__( 'This sidebar only displays while viewing a single page using the default template.', 'volatyl' ),
	),
	'default' => array(
		'name'        => esc_html__( 'Default Sidebar', 'volatyl' ),
		'id'          => 'default-sidebar',
		'location'    => 'sidebar',
		'description' => esc_html__( 'Fallback for templates that do not have their own specific sidebar.', 'volatyl' ),
	),
);

// Register all unique sidebars
function volatyl_sidebars() {
	global $sidebars;

	foreach ( $sidebars as $key => $value ) {
		register_sidebar( array(
			'name'           => $value['name'],
			'id'             => $value['id'],
			'description'    => $value['description'],
			'class'          => $value['location'],
			'before_sidebar' => '<div class="%2$s %1$s">',
			'after_sidebar'  => '</div>',
			'before_widget'  => '<section class="widget %2$s">',
			'after_widget'   => '</section>',
			'before_title'   => '<h5 class="widget-title">',
			'after_title'    => '</h5>',
		) );
	}
}
add_action( 'widgets_init', 'volatyl_sidebars' );

// Unique fat footer area data
$fat_footer_areas = array(

	// Fat Footer
	'ff_a1' => array(
		'name'        => esc_html__( 'Fat Footer - Area One', 'volatyl' ),
		'id'          => 'fat-footer-area-one',
		'location'    => 'fat-footer-area',
		'description' => esc_html__( 'The first fat footer widgetized area.', 'volatyl' ),
	),
	'ff_a2' => array(
		'name'        => esc_html__( 'Fat Footer - Area Two', 'volatyl' ),
		'id'          => 'fat-footer-area-two',
		'location'    => 'fat-footer-area',
		'description' => esc_html__( 'The second fat footer widgetized area.', 'volatyl' ),
	),
	'ff_a3' => array(
		'name'        => esc_html__( 'Fat Footer - Area Three', 'volatyl' ),
		'id'          => 'fat-footer-area-three',
		'location'    => 'fat-footer-area',
		'description' => esc_html__( 'The third fat footer widgetized area.', 'volatyl' ),
	),
	'ff_a4' => array(
		'name'        => esc_html__( 'Fat Footer - Area Four', 'volatyl' ),
		'id'          => 'fat-footer-area-four',
		'location'    => 'fat-footer-area',
		'description' => esc_html__( 'The fourth fat footer widgetized area.', 'volatyl' ),
	),
);

// Register all fat footer areas
function volatyl_fat_footer_areas() {
	global $fat_footer_areas;

	foreach ( $fat_footer_areas as $key => $value ) {
		register_sidebar( array(
			'name'           => $value['name'],
			'id'             => $value['id'],
			'description'    => $value['description'],
			'class'          => $value['location'],
			'before_sidebar' => '<div class="%2$s %1$s">',
			'after_sidebar'  => '</div>',
			'before_widget'  => '<section class="widget %2$s">',
			'after_widget'   => '</section>',
			'before_title'   => '<h5 class="widget-title">',
			'after_title'    => '</h5>',
		) );
	}
}
add_action( 'widgets_init', 'volatyl_fat_footer_areas' );

// Register footer widget area intended for social media icons
function volatyl_social_media_footer_area() {
	register_sidebar( array(
		'name'           => esc_html__( 'Social Media Footer Area', 'volatyl' ),
		'id'             => 'social-media-footer-area',
		'description'    => esc_html__( 'Intended to display social media icons above the persistent site footer, below the Fat Footer (if in use).', 'volatyl' ),
		'before_sidebar' => '<div class="%2$s %1$s">',
		'after_sidebar'  => '</div>',
		'before_widget'  => '<section class="widget %2$s">',
		'after_widget'   => '</section>',
		'before_title'   => '<h5 class="widget-title">',
		'after_title'    => '</h5>',
	) );
}
add_action( 'widgets_init', 'volatyl_social_media_footer_area' );