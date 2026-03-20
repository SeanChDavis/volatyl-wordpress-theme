<?php

/**
 * Page Layout meta box.
 *
 * Registers post meta and adds a "Page Layout" meta box to all public post types,
 * giving editors per-page control over the header and footer without a plugin.
 *
 * Controls:
 * - Show page header  — opt-in content header for Canvas templates
 * - Enable dark header — applies to all post types
 * - Minimal footer    — hides Footer Lead and Fat Footer on any post/page
 */

/**
 * Register all page layout post meta.
 */
function volatyl_register_page_layout_meta() {

	$shared = array(
		'show_in_rest'  => true,
		'single'        => true,
		'type'          => 'boolean',
		'auth_callback' => function( $allowed, $meta_key, $post_id ) {
			return current_user_can( 'edit_post', $post_id );
		},
	);

	register_post_meta( '', '_volatyl_dark_header',      $shared );
	register_post_meta( '', '_volatyl_show_page_header', $shared );
	register_post_meta( '', '_volatyl_minimal_footer',   $shared );
}
add_action( 'init', 'volatyl_register_page_layout_meta' );

/**
 * Add the meta box to all public post types.
 */
function volatyl_add_page_layout_meta_box() {

	$post_types = array_values( get_post_types( array( 'public' => true ), 'names' ) );

	add_meta_box(
		'volatyl_page_layout',
		__( 'Page Layout', 'volatyl' ),
		'volatyl_page_layout_meta_box_html',
		$post_types,
		'side',
		'default'
	);
}
add_action( 'add_meta_boxes', 'volatyl_add_page_layout_meta_box' );

/**
 * Render the meta box.
 *
 * @param WP_Post $post
 */
function volatyl_page_layout_meta_box_html( $post ) {

	$show_page_header = (bool) get_post_meta( $post->ID, '_volatyl_show_page_header', true );
	$is_dark          = (bool) get_post_meta( $post->ID, '_volatyl_dark_header', true );
	$minimal_footer   = (bool) get_post_meta( $post->ID, '_volatyl_minimal_footer', true );

	wp_nonce_field( 'volatyl_page_layout_save', 'volatyl_page_layout_nonce' );
	?>

	<fieldset style="margin-bottom: 12px;">
		<legend style="font-weight: 600; margin-bottom: 6px;"><?php esc_html_e( 'Header', 'volatyl' ); ?></legend>
		<p style="margin: 4px 0;">
			<label>
				<input type="checkbox" name="volatyl_show_page_header" value="1" <?php checked( $show_page_header ); ?>>
				<?php esc_html_e( 'Show page header', 'volatyl' ); ?>
			</label>
			<br><span class="description"><?php esc_html_e( 'Canvas templates only.', 'volatyl' ); ?></span>
		</p>
		<p style="margin: 4px 0;">
			<label>
				<input type="checkbox" name="volatyl_dark_header" value="1" <?php checked( $is_dark ); ?>>
				<?php esc_html_e( 'Enable dark header', 'volatyl' ); ?>
			</label>
		</p>
	</fieldset>

	<fieldset>
		<legend style="font-weight: 600; margin-bottom: 6px;"><?php esc_html_e( 'Footer', 'volatyl' ); ?></legend>
		<p style="margin: 4px 0;">
			<label>
				<input type="checkbox" name="volatyl_minimal_footer" value="1" <?php checked( $minimal_footer ); ?>>
				<?php esc_html_e( 'Minimal footer', 'volatyl' ); ?>
			</label>
			<br><span class="description"><?php esc_html_e( 'Hides the Footer Lead and Fat Footer.', 'volatyl' ); ?></span>
		</p>
	</fieldset>

	<?php
}

/**
 * Save all page layout meta values.
 *
 * @param int $post_id
 */
function volatyl_save_page_layout_meta( $post_id ) {

	if ( ! isset( $_POST['volatyl_page_layout_nonce'] ) ) {
		return;
	}

	if ( ! wp_verify_nonce( $_POST['volatyl_page_layout_nonce'], 'volatyl_page_layout_save' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$fields = array( 'volatyl_show_page_header', 'volatyl_dark_header', 'volatyl_minimal_footer' );

	foreach ( $fields as $field ) {
		$meta_key = '_' . $field;
		if ( isset( $_POST[ $field ] ) ) {
			update_post_meta( $post_id, $meta_key, 1 );
		} else {
			delete_post_meta( $post_id, $meta_key );
		}
	}
}
add_action( 'save_post', 'volatyl_save_page_layout_meta' );
