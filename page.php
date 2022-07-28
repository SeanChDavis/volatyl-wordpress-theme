<?php
get_header();
?>

	<main>

		<header class="jumbo-header">

			<div class="inner">

				<?php if ( ! empty( get_the_title() ) ) { ?>
					<h1 class="singular-title"><?php echo get_the_title(); ?></h1>
				<?php } ?>

			</div>

		</header>

		<div class="inner">

			<div class="main-content-wrap">

				<div id="primary-content">

					<?php
					if ( have_posts() ) :

						while ( have_posts() ) :

							the_post();
							get_template_part( 'content/content', 'page' );

						endwhile;

						the_posts_navigation();

						// If comments are open or we have at least one comment, load up the comment template.
//						if ( comments_open() || get_comments_number() ) :
//							comments_template();
//						endif;

					else :

						get_template_part( 'content/content', 'none' );

					endif;
					?>

				</div>

				<?php dynamic_sidebar( 'Single Page Sidebar' ); ?>

			</div>

		</div>

	</main>

<?php
get_footer();