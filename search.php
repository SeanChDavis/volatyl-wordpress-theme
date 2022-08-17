<?php // The search results template
get_header();
?>

	<main id="main">
		<?php
		if ( ! empty( get_search_query() ) ) {
			get_template_part( 'template-parts/content', 'header' );
		}
		?>
		<div class="inner v-medium">
			<?php
			if ( have_posts() && ! empty( get_search_query() ) ) :
				?>
				<div class="v-margin-bottom-4">
					<div class="v-grid v-grid-columns_3">
						<?php
						while ( have_posts() ) :
							the_post();
							get_template_part( 'content/content', 'grid-items' );
						endwhile;
						?>
					</div>
				</div>
				<?php
			else :
				get_template_part( 'content/content', 'none' );
			endif;
			?>
		</div>
	</main>

<?php
get_footer();