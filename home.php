<?php
get_header();
$blog_page_object = get_queried_object();
?>

	<main>

		<header class="jumbo-header">

			<div class="inner">

				<h1 class="singular-title"><?php printf( __( 'The latest from %s', 'volatyl' ), get_bloginfo( 'name' ) ); ?></h1>

			</div>

		</header>

		<div class="inner medium">

				<?php
				if ( have_posts() ) :
					?>

					<div class="post-type-grid">

						<div class="v-grid v-grid-columns_3">

							<?php
							while ( have_posts() ) :

								the_post();
								get_template_part( 'template-parts/content', 'grid-items' );

							endwhile
							?>

						</div>

					</div>

					<?php
					the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>

		</div>

	</main>

<?php
get_footer();