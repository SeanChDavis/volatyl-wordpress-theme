<?php // Template part for displaying posts ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header v-margin-bottom-5">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				volatyl_posted_on();
				volatyl_posted_by( $post->ID );
				?>
			</div>
		<?php endif; ?>
	</header>
	<?php volatyl_post_thumbnail(); ?>
	<div class="entry-content v-margin-bottom-3">
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
	<footer class="entry-footer v-margin-bottom-5">
		<?php volatyl_entry_footer(); ?>
	</footer>
</article>
