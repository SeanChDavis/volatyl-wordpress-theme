<?php
/**
 * Template part for displaying single posts
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php volatyl_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		if ( is_home() || is_search() || is_archive() ) {
			the_excerpt();
		} else {
			the_content(
				sprintf(
					wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'volatyl' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'volatyl' ),
					'after'  => '</div>',
				)
			);
		}
		?>
	</div>

	<footer class="entry-footer">
		<?php volatyl_entry_footer(); ?>
	</footer>

</article>
