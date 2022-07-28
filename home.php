<?php
get_header();
$blog_page_object = get_queried_object();
?>

	<main>

		<div class="inner medium">

			<h1 class="subdued-title"><?php printf( __( 'Most recently published on %s', 'volatyl' ), get_bloginfo( 'name' ) ); ?></h1>

				<?php
				if ( have_posts() ) :
					?>

					<div class="post-type-grid">

						<div class="v-grid v-grid-columns_3">

							<?php
							while ( have_posts() ) :

								the_post();
								get_template_part( 'content/content', 'grid-items' );

							endwhile
							?>

						</div>

					</div>

					<?php
					the_posts_navigation();

				else :

					get_template_part( 'content/content', 'none' );

				endif;
				?>

		</div>

	</main>

<?php
get_footer();