<?php
/**
 * Bits of intelligent markup used throughout the theme
 */

// Site hero markup template
if ( ! function_exists( 'volatyl_hero' ) ) :

	function volatyl_hero( $args = array() ) {

		$default_args = array(
			'title'         => ! empty( $args['title'] ) ? $args['title'] : get_the_title(),
			'subtitle'      => ! empty( $args['subtitle'] ) ? $args['subtitle'] : '',
			'alignment'     => 1 === $args['alignment'] ? 1 : 0,
			'primary_cta'   => array(
				'text' => '',
				'url'  => '',
			),
			'secondary_cta' => array(
				'text' => '',
				'url'  => '',
			),
		);

		$new_args = array_merge( $default_args, $args );

		$title              = $new_args['title'];
		$subtitle           = $new_args['subtitle'];
		$alignment          = $new_args['alignment'];
		$primary_cta_text   = $new_args['primary_cta']['text'];
		$primary_cta_url    = $new_args['primary_cta']['url'];
		$secondary_cta_text = $new_args['secondary_cta']['text'];
		$secondary_cta_url  = $new_args['secondary_cta']['url'];
		?>

		<div class="site-hero">

			<div class="inner v-large">

				<div class="hero<?php echo $alignment ? ' v-content-centered' : ''; ?>">
					<h1 class="hero-title"><?php echo $title; ?></h1>
					<?php if ( ! empty( $subtitle ) ) { ?>
						<p class="hero-subtitle"><?php echo $subtitle; ?></p>
					<?php } ?>
					<?php if ( ! empty( $primary_cta_url ) && ! empty( $primary_cta_text ) ) { ?>
						<p class="primary-cta-container">
							<a href="<?php echo $primary_cta_url; ?>" class="button v-large"><?php echo $primary_cta_text; ?></a>
						</p>
					<?php } ?>
					<?php if ( ! empty( $secondary_cta_url ) && ! empty( $secondary_cta_text ) ) { ?>
						<p class="secondary-cta-container">
							<a href="<?php echo $secondary_cta_url; ?>" class="secondary-cta"><?php echo $secondary_cta_text; ?></a>
						</p>
					<?php } ?>
				</div>

			</div>

		</div>

		<?php
	}
endif;

// The current post date and time
if ( ! function_exists( 'volatyl_posted_on' ) ) :

	function volatyl_posted_on() {

		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		$time_string = sprintf( $time_string, esc_attr( get_the_date( DATE_W3C ) ), esc_html( get_the_date() ) );

		$posted_on = sprintf( /* translators: %s: post date. */ esc_html_x( 'Posted on %s', 'post date', 'volatyl' ), '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>' );

		echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
endif;

// The current post author
if ( ! function_exists( 'volatyl_posted_by' ) ) :

	function volatyl_posted_by( $id ) {

		$post_author_id = get_post_field( 'post_author', $id );

		$byline = sprintf( /* translators: %s: post author. */ esc_html_x( 'by %s', 'post author', 'volatyl' ), '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( $post_author_id ) ) . '">' . esc_html( get_the_author_meta( 'display_name', $post_author_id ) ) . '</a></span>' );

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

			<div class="post-thumbnail v-margin-bottom-3">
				<?php the_post_thumbnail(); ?>
			</div>

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
				the_post_thumbnail( 'post-thumbnail', array(
					'alt' => the_title_attribute( array(
						'echo' => false,
					) ),
				) );
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

		edit_post_link( sprintf( wp_kses( /* translators: %s: Name of current post. Only visible to screen readers */ __( 'Edit <span class="screen-reader-text">%s</span>', 'volatyl' ), array(
			'span' => array(
				'class' => array(),
			),
		) ), wp_kses_post( get_the_title() ) ), '<span class="edit-link">', '</span>' );
	}
endif;

// Check for wp_body_open() before using it. Needed for WP older than 5.2.
if ( ! function_exists( 'wp_body_open' ) ) :
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;