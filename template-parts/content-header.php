<?php // Displayed above content. Similar to a hero, but relevant to the content. ?>

<header class="content-header v-gray-background">
	<div class="inner">
		<?php
		if ( is_page() ) {
			?>
			<h1 class="content-title"><?php echo get_the_title(); ?></h1>
			<?php
		} if ( is_single() ) {
			if ( ! empty( get_the_title() ) ) {
				?>
				<h1 class="content-title"><?php echo get_the_title(); ?></h1>
				<?php
			}
			?>
			<div class="content-meta">
				<?php
				volatyl_posted_on();
				volatyl_posted_by( $post->ID );
				?>
			</div>
			<?php
		} if ( is_home() ) {
			$blog_title = get_the_title( get_option( 'page_for_posts' ) );
			if ( get_theme_mod( 'volatyl_blog_title' ) ) {
				$blog_title = get_theme_mod( 'volatyl_blog_title',
					get_the_title( get_option( 'page_for_posts' ) )
				);
			}
			?>
			<div class="content-container">
				<div class="content-primary">
					<h1 class="content-title"><?php echo $blog_title; ?></h1>
					<?php if ( get_theme_mod( 'volatyl_blog_description' ) ) { ?>
						<p class="content-description"><?php echo get_theme_mod( 'volatyl_blog_description' ); ?></p>
					<?php } ?>
				</div>
				<?php if ( get_theme_mod( 'volatyl_blog_search_form', 0 ) ) { ?>
					<div class="content-secondary">
						<?php get_search_form(); ?>
					</div>
				<?php } ?>
			</div>
			<?php
		} if ( is_search() ) {
			?>
			<div class="content-container">
				<div class="content-primary">
					<h1 class="content-title">
						<span class="v-subdued-title v-large">
							<?php printf( esc_html__( 'Search results for:', 'volatyl' ) ); ?>
						</span>
						<?php echo esc_html( get_search_query() ); ?>
					</h1>
				</div>
				<div class="content-secondary">
					<?php get_search_form(); ?>
				</div>
			</div>
			<?php
		} if ( is_archive() ) {
			if ( ! empty( get_the_archive_title() ) ) {
				?>
				<h1 class="content-title archive-title v-margin-bottom-3"><?php echo the_archive_title(); ?></h1>
				<?php
			}
			if ( ! empty( get_the_archive_description() ) ) {
				?>
				<div class="content-description">
					<?php echo the_archive_description(); ?>
				</div>
				<?php
			}
		}
		?>
	</div>
</header>


