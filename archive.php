<?php
get_header();
?>

	<main id="main">
		<header class="jumbo-header gray-background">
			<div class="inner">
				<?php if ( ! empty( get_the_archive_title() ) ) { ?>
					<h1 class="archive-title"><?php echo the_archive_title(); ?></h1>
				<?php } ?>

				<div class="archive-description">
					<?php ! empty( the_archive_description() ) ? the_archive_description() : ''; ?>
				</div>
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