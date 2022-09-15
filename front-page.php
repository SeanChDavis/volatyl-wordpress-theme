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
				<div class="inner v-medium">
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

		$featured_page_id = get_theme_mod( 'volatyl_front_page_featured_page_select' );
		if ( false !== get_post_status( $featured_page_id ) && ! empty( $featured_page_id ) ) {
			$featured_page = get_post( $featured_page_id );
			?>
			<section class="featured-page v-gray-background">
				<div class="inner v-medium">
					<div class="v-grid v-grid-columns_2">
						<div class="content-left">
							<span class="section-title h3">
								<?php echo $featured_page->post_title; ?>
							</span>
							<?php if ( ! empty( $featured_page->post_excerpt ) ) { ?>
								<p class="section-description"><?php echo $featured_page->post_excerpt; ?></p>
							<?php } ?>
						</div>
						<div class="content-right">
							<div class="section-content">
								<?php echo $featured_page->post_content; ?>
							</div>
						</div>
					</div>
				</div>
			</section>
			<?php
		}
		?>
	</main>

<?php
get_footer();