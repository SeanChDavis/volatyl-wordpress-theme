<?php
get_header();
?>

	<main id="main">

		<?php
		$blog_grid_name  = 'volatyl_front_page_blog_posts_grid_columns_rows';
		$blog_grid_value = get_theme_mod( $blog_grid_name );

		if ( empty( $blog_grid_value ) ) {
			$blog_grid_post_count = 4;
			$blog_grid_columns    = 2;
		} else {
			$blog_grid_post_count = volatyl_get_posts_per_page( $blog_grid_name );
			$blog_grid_columns    = (int) substr( $blog_grid_value, 0, 1 );
		}

		// Query recent posts and display them if at least one exists
		$recent_posts = wp_get_recent_posts( array(
			'numberposts' => $blog_grid_post_count,
			'post_status' => 'publish'
		) );

		if ( ! empty( $recent_posts ) ) {
			?>

			<section class="recent-posts">
				<div class="inner large">
					<span class="subdued-title"><?php echo __( 'From the blog', 'volatyl' ); ?></span>
					<div class="post-type-grid">
						<div class="v-grid v-grid-columns_<?php echo $blog_grid_columns; ?>">
							<?php
							foreach ( $recent_posts as $post ) {
								get_template_part( 'content/content', 'grid-items', $post );
							}
							wp_reset_query();
							?>
						</div>
					</div>
					<?php if ( get_option( 'page_for_posts' ) ) { ?>
						<div class="v-grid v-grid-centered-column">
							<div class="v-grid-centered-column-content">
								<h5 class="subdued-title"><?php printf( __( 'More content from %s', 'volatyl' ), THEME_NAME ); ?></h5>
								<p class="subdued-link-container">
									<a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>"><?php _e( 'Visit the blog', 'volatyl' ); ?></a>
								</p>
							</div>
						</div>
					<?php } ?>
				</div>
			</section>

			<?php
		}
		?>

		<section class="get-in-touch dark-background">
			<div class="inner large">
				<div class="v-grid v-grid-centered-column">
					<div class="v-grid-centered-column-content">
						<p class="h2 section-title"><?php echo sprintf( __( 'Let\'s Connect', 'volatyl' ), get_bloginfo( 'name' ) ); ?></p>
						<p>This is a prompt to send an email to the owner of the site.</p>
						<p class="cta-wrap">
							<a href="#" class="button">Reach out</a></p>
					</div>
				</div>
			</div>
		</section>

	</main>

<?php
get_footer();