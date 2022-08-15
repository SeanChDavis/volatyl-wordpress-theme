<?php
/**
 * Template name: Blank - Full-width
 */
get_header();
?>

	<main id="main">
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				get_template_part( 'content/content', 'full-width' );
			endwhile;
		endif;
		?>
	</main>

<?php
get_footer();