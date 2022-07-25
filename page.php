<?php
get_header();
?>

	<main>
		<div class="inner">

			<div class="main-content-wrap">

				<div id="primary-content">

					<?php
					if ( have_posts() ) :

						while ( have_posts() ) :

							the_post();
							get_template_part( 'template-parts/content' );

						endwhile;

						the_posts_navigation();

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>

				</div>

				<?php dynamic_sidebar( 'Single Page Sidebar' ); ?>

			</div>

		</div>
	</main>

<?php
get_footer();