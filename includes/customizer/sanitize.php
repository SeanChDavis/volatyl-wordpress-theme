<?php

/**
 * Sanitize checkbox options
 */
function volatyl_sanitize_checkbox( $input ) {
	return 1 == $input ? 1 : 0;
}

/**
 * Sanitize integer input
 */
function volatyl_sanitize_integer( $input ) {
	return absint( $input );
}

/**
 * Placeholder sanitization callback for custom HTML that has no actual settings
 */
function volatyl_sanitize_arbitrary_html() {
	// nothing to see here
}

/**
 * Sanitize text input
 */
function volatyl_sanitize_text( $input ) {
	return strip_tags( stripslashes( $input ) );
}

/**
 * Sanitize textarea
 */
function volatyl_sanitize_textarea( $input ) {
	$allowed = array(
		's'         => array(),
		'br'        => array(),
		'em'        => array(),
		'i'         => array(),
		'strong'    => array(),
		'b'         => array(),
		'a'         => array(
			'href'          => array(),
			'title'         => array(),
			'class'         => array(),
			'id'            => array(),
			'style'         => array(),
			'target'        => array(),
		),
		'form'      => array(
			'id'            => array(),
			'class'         => array(),
			'action'        => array(),
			'method'        => array(),
			'autocomplete'  => array(),
			'style'         => array(),
		),
		'input'     => array(
			'type'          => array(),
			'name'          => array(),
			'class'         => array(),
			'id'            => array(),
			'value'         => array(),
			'placeholder'   => array(),
			'tabindex'      => array(),
			'style'         => array(),
		),
		'img'       => array(
			'src'           => array(),
			'alt'           => array(),
			'class'         => array(),
			'id'            => array(),
			'style'         => array(),
			'height'        => array(),
			'width'         => array(),
		),
		'span'      => array(
			'class'         => array(),
			'id'            => array(),
			'style'         => array(),
		),
		'p'         => array(
			'class'         => array(),
			'id'            => array(),
			'style'         => array(),
		),
		'div'       => array(
			'class'         => array(),
			'id'            => array(),
			'style'         => array(),
		),
		'blockquote' => array(
			'cite'          => array(),
			'class'         => array(),
			'id'            => array(),
			'style'         => array(),
		),
	);
	return wp_kses( $input, $allowed );
}

/**
 * Sanitize textarea lite
 */
function volatyl_sanitize_textarea_lite( $input ) {
	$allowed = array(
		'em'        => array(),
		'strong'    => array(),
		'a'         => array(
			'href'          => array(),
			'title'         => array(),
			'class'         => array(),
			'id'            => array(),
			'style'         => array(),
			'target'        => array(),
		),
		'span'      => array(
			'class'         => array(),
			'id'            => array(),
			'style'         => array(),
		),
		'i'      => array(
			'class'         => array(),
		),
	);
	return wp_kses( $input, $allowed );
}

/**
 * Sanitize select menus
 */
function volatyl_sanitize_select( $input, $setting ) {
	$input   = sanitize_key( $input );
	$choices = $setting->manager->get_control( $setting->id )->choices;
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}