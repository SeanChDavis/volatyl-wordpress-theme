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

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>

				</div>

				<?php dynamic_sidebar( 'Post Archive Sidebar' ); ?>

			</div>

		</div>
	</main>

<?php
get_footer();