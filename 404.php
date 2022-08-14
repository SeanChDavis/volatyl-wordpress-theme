<?php // When there's no relevant content to display
get_header();
?>

	<main id="main">
		<div class="inner v-medium">
			<?php get_template_part( 'content/content', 'none' ); ?>
		</div>
	</main>

<?php
get_footer();