<?php
/**
 * Template name: Blank - Page-width
 */
get_header();
?>

	<main id="main">
		<div class="inner v-medium">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					get_template_part( 'content/content', 'full-width' );
				endwhile;
			endif;
			?>
		</div>
	</main>

<?php
get_footer();