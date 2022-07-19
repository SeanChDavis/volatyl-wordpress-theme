<?php
/**
 * Standard singular content structure
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="content-header">

		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="content-title">', '</h1>' );
		else :
			the_title( '<h2 class="content-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="content-meta">
				<?php
				// volatyl_posted_on();
				// volatyl_posted_by();
				?>
			</div><!-- .content-meta -->
		<?php endif; ?>

	</header><!-- .content-header -->

	<?php // volatyl_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		if ( ! is_archive() && ! is_search() && ! is_home() ) {
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
	</div><!-- .entry-content -->

</article>
