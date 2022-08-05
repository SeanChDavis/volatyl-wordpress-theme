<?php
get_header();
?>

	<main id="main">
		<header class="jumbo-header gray-background">
			<div class="inner">
				<div class="search-content-container">
					<div class="search-content-left">
						<h1 class="archive-title"><span class="subdued-title no-spacing"><?php printf( esc_html__( 'Search results for:', 'volatyl' ) ); ?></span><?php echo esc_html( get_search_query() ); ?></h1>
					</div>
					<div class="search-content-right">
						<?php get_search_form(); ?>
					</div>
				</div>
			</div>
		</header>
		<div class="inner medium">
			<?php
			if ( have_posts() ) :
				?>
				<div class="post-type-grid">
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