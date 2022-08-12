<?php
get_header();
?>

	<main id="main">
		<header class="jumbo-header v-gray-background">
			<div class="inner">
				<?php if ( ! empty( get_the_archive_title() ) ) { ?>
					<h1 class="archive-title v-margin-bottom-3"><?php echo the_archive_title(); ?></h1>
				<?php } ?>
				<?php if ( ! empty( get_the_archive_description() ) ) { ?>
					<div class="archive-description">
						<?php echo the_archive_description(); ?>
					</div>
				<?php } ?>
			</div>
		</header>
		<div class="inner v-medium">
			<?php
			if ( have_posts() ) :
				?>
				<div class="v-post-type-grid">
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