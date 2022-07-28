<?php
get_header();
?>

	<main>

		<section class="recent-posts">

			<div class="inner large">

				<span class="subdued-title"><?php echo sprintf( __( 'From the blog', 'volatyl' ), get_bloginfo( 'name' ) ); ?></span>

				<div class="post-type-grid">

					<div class="v-grid v-grid-columns_3">

						<?php
						$args = array(
							'numberposts' => 9,
							'post_status' => 'publish'
						);
						$recent_posts = wp_get_recent_posts( $args );

						foreach ( $recent_posts as $post ) {
							get_template_part( 'content/content', 'grid-items', $post );
						}
						wp_reset_query();
						?>

					</div>

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