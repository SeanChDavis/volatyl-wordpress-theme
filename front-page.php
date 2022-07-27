<?php
get_header();
?>

	<main>

		<section class="recent-posts">

			<div class="inner large">

				<h2 class="recent-posts-title"><?php echo sprintf( __( 'Most recently published', 'volatyl' ), get_bloginfo( 'name' ) ); ?></h2>

				<div class="v-grid v-grid-columns_3">

					<?php
					$args = array(
						'numberposts' => 9,
						'post_status' => 'publish'
					);
					$recent_posts = wp_get_recent_posts( $args );

					foreach ( $recent_posts as $post ) {
						?>
						<div class="v-grid-item-wrapper">
							<article class="v-grid-item-container">
								<figure class="v-grid-item-media">
									<?php if ( has_post_thumbnail( $post['ID'] ) ) { ?>
										<a href="<?php echo get_permalink( $post['ID'] ); ?>"><?php echo get_the_post_thumbnail( $post['ID'], 'v-grid-item-media' ); ?></a>
									<?php } ?>
								</figure>
								<header class="v-grid-item-header">
									<h3 class="h5 v-grid-item-title"><a href="<?php echo get_permalink( $post['ID'] ); ?>"><?php echo $post['post_title']; ?></a></h3>
									<span class="v-grid-item-meta"><?php volatyl_posted_by( $post['ID'] ); ?></span>
								</header>
								<section class="v-grid-item-body">
									<p class="v-grid-item-description"><?php echo get_the_excerpt( $post['ID'] ); ?></p>
								</section>
								<footer class="v-grid-item-footer">
									<p class="read-more"><a class="button" href="<?php echo get_permalink( $post['ID'] ); ?>"><?php _e( 'Keep reading', 'volatyl'); ?></a></p>
								</footer>
							</article>
						</div>
						<?php
					}
					wp_reset_query();
					?>

				</div>

			</div>

		</section>

		<section class="get-in-touch dark-background">

			<div class="inner large">

				<div class="v-grid v-grid-centered-column">
					<div class="v-grid-centered-column-content">
						<p class="h2 section-title"><?php echo sprintf( __( 'Let\'s Connect', 'volatyl' ), get_bloginfo( 'name' ) ); ?></p>
						<p>This is a prompt to send an email to the owner of the site.</p>
						<p class="cta-wrap"><a href="#" class="button">Reach out</a></p>
					</div>
				</div>

			</div>

		</section>

	</main>

<?php
get_footer();