<?php // The archive template - taxonomy terms, dates, authors, etc.
get_header();
?>

	<main id="main">
		<?php get_template_part( 'template-parts/content', 'header' ); ?>
		<div class="inner v-medium">
			<?php
			if ( have_posts() ) :
				?>
				<div class="v-margin-bottom-4">
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