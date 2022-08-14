<?php // Default blog page of the site
get_header();
?>

	<main id="main">
		<div class="inner v-medium">
			<?php
			if ( have_posts() ) :
				?>
				<span class="v-subdued-title v-margin-bottom-3"><?php _e( 'Most recently published', 'volatyl' ); ?></span>
				<div class="v-post-type-grid">
					<?php
					$blog_grid_value = get_theme_mod( 'volatyl_blog_posts_grid_columns_rows' );
					if ( empty( $blog_grid_value ) || 'default' === $blog_grid_value ) {
						$blog_grid_columns = 3;
					} else {
						$blog_grid_columns = (int) substr( $blog_grid_value, 0, 1 );
					}
					?>
					<div class="v-grid v-grid-columns_<?php echo $blog_grid_columns; ?>">
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