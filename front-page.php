<?php // Default front page of the site, intelligently display basic information
get_header( null,
		array(
				'is_dark' => get_theme_mod( 'volatyl_front_page_hero_dark', 0 ),
		)
);

// Determine the hero title based on theme settings and site information
$custom_hero_title     = get_theme_mod( 'volatyl_front_page_hero_title' );
$fallback_hero_title   = sprintf( 'Welcome to %1$s', get_bloginfo( 'name' ) );
$front_page_hero_title = get_bloginfo( 'description' ) ?: $fallback_hero_title;
if ( get_theme_mod( 'volatyl_front_page_hero_use_custom_title' ) && ! empty( $custom_hero_title ) ) {
	$front_page_hero_title = $custom_hero_title;
}
?>

	<main id="main">
		<?php
		/**
		 * Build the hero (content header) section arguments
		 */
		get_template_part( 'template-parts/content', 'header', array(
				'title'         => $front_page_hero_title,
				'description'   => get_theme_mod( 'volatyl_front_page_hero_description', '' ),
				'alignment'     => get_theme_mod( 'volatyl_front_page_hero_centered', 0 ),
				'primary_cta'   => array(
						'url'  => get_theme_mod( 'volatyl_front_page_hero_primary_cta_button_url', '' ),
						'text' => get_theme_mod( 'volatyl_front_page_hero_primary_cta_button_text', '' ),
				),
				'secondary_cta' => array(
						'url'  => get_theme_mod( 'volatyl_front_page_hero_secondary_cta_button_url', '' ),
						'text' => get_theme_mod( 'volatyl_front_page_hero_secondary_cta_button_text', '' ),
				),
				'is_dark'       => get_theme_mod( 'volatyl_front_page_hero_dark', 0 ),
		) );

		/**
		 * General front page content from post_content
		 */
		if ( have_posts() && get_theme_mod( 'volatyl_front_page_display_post_content' ) ) :
			while ( have_posts() ) :
				the_post();
				?>
				<section class="front-page-post-content">
					<?php
					if ( get_theme_mod( 'volatyl_front_page_full_width_content' ) ) {
						get_template_part( 'content/content', 'page' );
					} else {
						echo '<div class="inner">';
						get_template_part( 'content/content', 'page' );
						echo '</div>';
					}
					?>
				</section>
				<?php
			endwhile;
		endif;

		/**
		 * Display the blog posts grid if enabled in theme settings
		 */
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
				<div class="inner">
					<span class="v-subdued-title v-margin-bottom-2"><?php echo __( 'From the blog',
								'volatyl' ); ?></span>
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

		/**
		 * Display the featured page section if a valid page is selected in theme settings
		 */
		$featured_page_id = get_theme_mod( 'volatyl_front_page_featured_page_select' );
		if ( false !== get_post_status( $featured_page_id ) && ! empty( $featured_page_id ) ) {
			$featured_page = get_post( $featured_page_id );
			?>
			<article class="featured-page v-gray-background">
				<div class="inner v-medium">
					<div class="v-grid v-grid-columns_2">
						<header class="content-left">
							<h1 class="section-title h3">
								<?php echo $featured_page->post_title; ?>
							</h1>
							<?php if ( ! empty( $featured_page->post_excerpt ) ) { ?>
								<p class="section-description v-margin-bottom-3"><?php echo $featured_page->post_excerpt; ?></p>
							<?php } ?>
						</header>
						<div class="content-right">
							<div class="section-content">
								<?php echo $featured_page->post_content; ?>
							</div>
						</div>
					</div>
				</div>
			</article>
			<?php
		}
		?>
	</main>

<?php
get_footer();