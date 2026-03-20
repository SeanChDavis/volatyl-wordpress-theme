<?php
/**
 * Template name: Canvas - Page-width
 */
get_header();
?>

	<main id="main">
		<?php
		if ( get_post_meta( get_queried_object_id(), '_volatyl_show_page_header', true ) ) {
			get_template_part( 'template-parts/content', 'header', array(
				'jumbo_title' => (bool) get_post_meta( get_queried_object_id(), '_volatyl_jumbo_title', true ),
			) );
		}
		?>
		<div class="inner">
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