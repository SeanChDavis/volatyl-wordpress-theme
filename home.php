<?php
get_header();
$blog_page_object = get_queried_object();
?>

	<main id="main">

		<div class="inner medium">

				<?php
				if ( have_posts() ) :
					?>

					<h1 class="subdued-title"><?php _e( 'Most recently published', 'volatyl' ); ?></h1>

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