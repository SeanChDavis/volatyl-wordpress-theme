<?php // Default front page of the site, intelligently display basic information
get_header();
?>

	<main id="main">
		<?php
		$blog_grid_name  = 'volatyl_front_page_blog_posts_grid_columns_rows';
		$blog_grid_value = get_theme_mod( $blog_grid_name, '3_1' );
		if ( empty( $blog_grid_value ) ) {
			$blog_grid_post_count = 4;
			$blog_grid_columns    = 2;
		} else {
			$blog_grid_post_count = volatyl_get_posts_per_page( $blog_grid_name );
			$blog_grid_columns    = (int) substr( $blog_grid_value, 0, 1 );
		}
		$recent_posts = wp_get_recent_posts( array(
			'numberposts' => $blog_grid_post_count,
			'post_status' => 'publish'
		) );
		if ( ! empty( $recent_posts ) ) {
			?>
			<section class="blog-posts-featured">
				<div class="inner v-large">
					<span class="v-subdued-title v-margin-bottom-3"><?php echo __( 'From the blog', 'volatyl' ); ?></span>
					<div class="v-grid v-grid-columns_<?php echo $blog_grid_columns; ?>">
						<?php
						foreach ( $recent_posts as $post ) {
							get_template_part( 'content/content', 'grid-items', $post );
						}
						wp_reset_query();
						?>
					</div>
				</div>
			</section>
			<?php
		}
		?>
	</main>

<?php
get_footer();