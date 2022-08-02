<?php

/**
 * Volatyl Settings panel
 */
$wp_customize->add_panel( 'volatyl_settings', array(
	'title'       => sprintf( __( '%s Settings', 'volatyl' ), THEME_NAME ),
	'description' => sprintf( __( 'Thank you for choosing %s. 🎉 All theme customization settings are below. Enjoy.', 'volatyl' ), THEME_NAME ),
	'priority'    => 10,
) );