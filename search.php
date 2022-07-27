<?php
get_header();
?>

	<main>

		<header class="jumbo-header">

			<div class="inner">

				<h1 class="archive-title">
				<?php
				/* translators: %s: search query. */
				printf( esc_html__( 'Search: %s', 'volatyl' ), '<span>' . get_search_query() . '</span>' );
				?>
				</h1>

			</div>

		</header>

		<div class="inner">

			<div class="post-type-grid">

				<div class="v-grid v-grid-columns_3">

					<?php
					if ( have_posts() ) :

						while ( have_posts() ) :

							the_post();
							get_template_part( 'template-parts/content', 'grid-items' );

						endwhile;

						the_posts_navigation();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>

				</div>

			</div>

		</div>

	</main>

<?php
get_footer();