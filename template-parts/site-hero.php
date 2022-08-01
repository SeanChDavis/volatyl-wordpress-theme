<?php
/**
 * Hero element, nested within the site header, shared by multiple pages.
 *
 * Use conditionals to set different content for the hero based on page.
 * See volatyl_hero().
 */

if ( ( is_front_page() && ! is_home() ) ) {
	volatyl_hero( array(
		'title' => get_bloginfo( 'description' ),
		'subtitle' => 'This is just a bunch of text that I am calling a subtitle for whatever reason. This is just a bunch of text that I am calling a subtitle for whatever reason. This is just a bunch of text that I am calling a subtitle for whatever reason.',
		'primary_cta' => array(
			'url' => 'https://google.com',
			'text' => 'Go to Google',
		),
		'secondary_cta' => array(
			'url' => 'https://duckduckgo.com',
			'text' => 'or DuckDuckGo',
		),
	) );
}