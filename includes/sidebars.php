<?php
/**
 * Unique sidebar data
 */
$sidebars = array(
	'post'    => array(
		'name'        => esc_html__( 'Single Post Sidebar', 'volatyl' ),
		'id'          => 'single-post-sidebar',
		'description' => esc_html__( 'This sidebar only displays while viewing a single blog post, or a post type that inherits single the single blog post template.', 'volatyl' ),
	),
	'page'    => array(
		'name'        => esc_html__( 'Single Page Sidebar', 'volatyl' ),
		'id'          => 'single-page-sidebar',
		'description' => esc_html__( 'This sidebar only displays while viewing a single page using the default template.', 'volatyl' ),
	),
	'archive' => array(
		'name'        => esc_html__( 'Post Archive Sidebar Sidebar', 'volatyl' ),
		'id'          => 'post-archive-sidebar',
		'description' => esc_html__( 'Used on archives such as the blog, search results, and taxonomy terms.', 'volatyl' ),
	),
	'default' => array(
		'name'        => esc_html__( 'Default Sidebar', 'volatyl' ),
		'id'          => 'sidebar',
		'description' => esc_html__( 'Fallback for templates that do not have their own specific sidebar.', 'volatyl' ),
	),
);

/**
 * Register all theme sidebars
 */
function volatyl_sidebars() {
	global $sidebars;

	foreach ( $sidebars as $key => $value ) {
		register_sidebar( array(
			'name'           => $value['name'],
			'id'             => $value['id'],
			'description'    => $value['description'],
			'class'          => 'sidebar',
			'before_sidebar' => '<div id="%1$s" class="%2$s">',
			'after_sidebar'  => '</div>',
			'before_widget'  => '<section class="widget %2$s">',
			'after_widget'   => '</section>',
			'before_title'   => '<h2 class="widget-title">',
			'after_title'    => '</h2>',
		));
	}
}
add_action( 'widgets_init', 'volatyl_sidebars' );