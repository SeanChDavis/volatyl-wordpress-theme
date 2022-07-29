<?php
/**
 * Bits of intelligent markup used throughout the theme
 */

// The current post date and time
if ( ! function_exists( 'volatyl_posted_on' ) ) :

	function volatyl_posted_on() {

		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'volatyl' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
endif;

// The current post author
if ( ! function_exists( 'volatyl_posted_by' ) ) :

	function volatyl_posted_by( $id ) {

		$post_author_id = get_post_field( 'post_author', $id );

		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'volatyl' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author_meta( 'display_name', $post_author_id ) ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
endif;

// The current post thumbnail
if ( ! function_exists( 'volatyl_post_thumbnail' ) ) :

	function volatyl_post_thumbnail() {

		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div>

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
				the_post_thumbnail(
					'post-thumbnail',
					array(
						'alt' => the_title_attribute(
							array(
								'echo' => false,
							)
						),
					)
				);
				?>
			</a>

		<?php
		endif;
	}
endif;

// The current categories, tags, and comments
if ( ! function_exists( 'volatyl_entry_footer' ) ) :

	function volatyl_entry_footer() {

		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'volatyl' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<div class="entry-categories"><span class="cat-links">' . esc_html__( 'Posted in %1$s', 'volatyl' ) . '</span></div>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'volatyl' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<div class="entry-tags"><span class="tags-links">' . esc_html__( 'Tagged %1$s', 'volatyl' ) . '</span></div>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
					/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'volatyl' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'volatyl' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

// Check for wp_body_open() before using it. Needed for WP older than 5.2.
if ( ! function_exists( 'wp_body_open' ) ) :
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;