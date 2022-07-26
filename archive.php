<?php
get_header();
?>

	<main>

		<header class="jumbo-header">

			<div class="inner">

				<?php if ( ! empty( get_the_title() ) ) { ?>
					<h1 class="archive-title"><?php echo the_archive_title(); ?></h1>
				<?php } ?>

				<div class="archive-description">
					<?php ! empty( the_archive_description() ) ? the_archive_description() : ''; ?>
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