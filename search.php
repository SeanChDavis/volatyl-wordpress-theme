<?php
get_header();
?>

	<main>

		<header class="jumbo-header">

			<div class="inner">

				<div class="search-content-container">

					<div class="search-content-left">
						<h1 class="archive-title"><span class="subdued-title no-spacing"><?php printf( esc_html__( 'Search results for:', 'volatyl' ) ); ?></span><?php echo esc_html( get_search_query() ); ?></h1>
					</div>

					<div class="search-content-right">
						<?php get_search_form(); ?>
					</div>

				</div>

			</div>

		</header>

		<div class="inner">

			<div class="post-type-grid">

				<div class="v-grid v-grid-columns_3 v-gap-2">

					<?php
					if ( have_posts() ) :

						while ( have_posts() ) :

							the_post();
							get_template_part( 'content/content', 'grid-items' );

						endwhile;

						the_posts_navigation();

					else :

						get_template_part( 'content/content', 'none' );

					endif;
					?>

				</div>

			</div>

		</div>

	</main>

<?php
get_footer();