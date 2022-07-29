<?php
get_header();
?>

	<main id="main">

		<header class="jumbo-header gray-background">

			<div class="inner">

				<?php if ( ! empty( get_the_title() ) ) { ?>
					<h1 class="singular-title"><?php echo get_the_title(); ?></h1>
				<?php } ?>
				<div class="entry-meta">
					<?php
					volatyl_posted_on();
					volatyl_posted_by( $post->ID );
					?>
				</div>

			</div>

		</header>

		<div class="inner">

			<div class="main-content-wrap">

				<div id="primary-content">

					<?php
					if ( have_posts() ) :
						while ( have_posts() ) :
							the_post();
							get_template_part( 'content/content', 'single' );
							the_posts_navigation();
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
						endwhile;
					endif;
					?>

				</div>

				<?php get_sidebar(); ?>

			</div>

		</div>
	</main>

<?php
get_footer();