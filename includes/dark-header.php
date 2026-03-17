<?php

/**
 * Per-page dark header meta box.
 *
 * Registers post meta and adds a meta box to all public post types, allowing
 * editors to enable the dark header on a per-post/page basis without a plugin.
 */

/**
 * Register the dark header post meta for all post types.
 */
function volatyl_register_dark_header_meta() {

	register_post_meta( '', '_volatyl_dark_header', array(
		'show_in_rest' => true,
		'single'       => true,
		'type'         => 'boolean',
	) );
}
add_action( 'init', 'volatyl_register_dark_header_meta' );

/**
 * Add the meta box to all public post types.
 */
function volatyl_add_dark_header_meta_box() {

	$post_types = array_values( get_post_types( array( 'public' => true ), 'names' ) );

	add_meta_box(
		'volatyl_dark_header',
		__( 'Page Header', 'volatyl' ),
		'volatyl_dark_header_meta_box_html',
		$post_types,
		'side',
		'default'
	);
}
add_action( 'add_meta_boxes', 'volatyl_add_dark_header_meta_box' );

/**
 * Render the meta box.
 *
 * @param WP_Post $post
 */
function volatyl_dark_header_meta_box_html( $post ) {

	$is_dark = (bool) get_post_meta( $post->ID, '_volatyl_dark_header', true );
	wp_nonce_field( 'volatyl_dark_header_save', 'volatyl_dark_header_nonce' );
	?>
	<label>
		<input type="checkbox" name="volatyl_dark_header" value="1" <?php checked( $is_dark ); ?>>
		<?php esc_html_e( 'Enable dark header', 'volatyl' ); ?>
	</label>
	<?php
}

/**
 * Save the meta box value.
 *
 * @param int $post_id
 */
function volatyl_save_dark_header_meta( $post_id ) {

	if ( ! isset( $_POST['volatyl_dark_header_nonce'] ) ) {
		return;
	}

	if ( ! wp_verify_nonce( $_POST['volatyl_dark_header_nonce'], 'volatyl_dark_header_save' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	if ( isset( $_POST['volatyl_dark_header'] ) ) {
		update_post_meta( $post_id, '_volatyl_dark_header', 1 );
	} else {
		delete_post_meta( $post_id, '_volatyl_dark_header' );
	}
}
add_action( 'save_post', 'volatyl_save_dark_header_meta' );