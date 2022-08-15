<?php // The template for displaying search results
get_header();
?>

	<main id="main">
		<?php if ( ! empty( get_search_query() ) ) { ?>
			<header class="jumbo-header v-gray-background">
				<div class="inner">
					<div class="search-content-container">
						<div class="search-content-left">
							<h1 class="archive-title">
							<span class="v-subdued-title v-large">
								<?php printf( esc_html__( 'Search results for:', 'volatyl' ) ); ?>
							</span>
								<?php echo esc_html( get_search_query() ); ?>
							</h1>
						</div>
						<div class="search-content-right">
							<?php get_search_form(); ?>
						</div>
					</div>
				</div>
			</header>
		<?php } ?>
		<div class="inner v-medium">
			<?php
			if ( have_posts() && ! empty( get_search_query() ) ) :
				?>
				<div class="v-margin-bottom-4">
					<div class="v-grid v-grid-columns_3 v-gap-2">
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