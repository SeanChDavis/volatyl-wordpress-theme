<?php
get_header();
?>

	<main>

		<header class="hero">

			<div class="inner medium">

				<?php if ( ! empty( get_the_title() ) ) { ?>
					<h1 class="hero-title"><?php echo bloginfo( 'description' ); ?></h1>
				<?php } ?>

			</div>

		</header>

		<section class="recent-posts">

			<div class="inner medium">

				<h2 class="h5"><?php echo sprintf( '%s\'s latest blog posts', get_bloginfo( 'name' ) ); ?></h2>

				<div class="volatyl-grid-items volatyl-grid volatyl-grid-columns_3">

					<?php
					$args = array(
						'numberposts' => 3,
						'post_status' => 'publish'
					);
					$recent_posts = wp_get_recent_posts( $args );

					foreach ( $recent_posts as $post ) {
						?>
						<div class="volatyl-grid-item-wrapper">
							<article class="volatyl-grid-item">
								<h3><?php echo $post['post_title']; ?></h3>
								<span><?php volatyl_posted_by( $post['ID'] ); ?></span>
							</article>
						</div>
						<?php
					}
					wp_reset_query();
					?>

				</div>

			</div>

		</section>

	</main>

<?php
get_footer();