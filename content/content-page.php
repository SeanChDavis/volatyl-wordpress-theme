<?php // Template part for displaying single pages ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( has_post_thumbnail() && ! is_front_page() ) { ?>
		<header class="entry-header v-margin-bottom-2">
			<?php volatyl_post_thumbnail(); ?>
		</header>
	<?php } ?>
	<div class="entry-content">
		<?php
		the_content(
				sprintf(
						wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Read more<span class="screen-reader-text"> "%s"</span>', 'volatyl' ),
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
		?>
	</div>
	<footer class="entry-footer v-margin-bottom-5">
		<?php volatyl_entry_footer(); ?>
	</footer>
</article>
