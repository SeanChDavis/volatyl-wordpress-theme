<?php // WordPress template hierarchy basic theme template
get_header();
?>

	<main id="main">
		<div class="inner v-medium">
			<div class="main-content-wrap">
				<div id="primary-content">
					<?php
					if ( have_posts() ) :
						while ( have_posts() ) :
							the_post();
							get_template_part( 'content/content' );
						endwhile;
						the_posts_navigation();
					else :
						get_template_part( 'content/content', 'none' );
					endif;
					?>
				</div>
				<?php get_sidebar(); ?>
			</div>
		</div>
	</main>

<?php
get_footer();