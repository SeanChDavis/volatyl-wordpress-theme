<?php // The standard WordPress page template
get_header();
?>

	<main id="main">
		<?php if ( ! empty( get_the_title() ) ) { ?>
			<header class="jumbo-header v-gray-background">
				<div class="inner">
					<h1 class="singular-title"><?php echo get_the_title(); ?></h1>
				</div>
			</header>
		<?php } ?>
		<div class="inner v-medium">
			<div class="main-content-wrap">
				<div id="primary-content">
					<?php
					if ( have_posts() ) :
						while ( have_posts() ) :
							the_post();
							get_template_part( 'content/content', 'page' );
							the_posts_navigation();
							// only allow comments if chosen in theme customizer
							if ( 1 == get_theme_mod( 'volatyl_page_comments' ) && ( comments_open() || get_comments_number() ) ) :
								comments_template();
							endif;
						endwhile;
					else :
						get_template_part( 'content/content', 'none' );
					endif;
					?>
				</div>
				<?php get_sidebar(); ?>
			</div>
		</div>
	</main>

<?php
get_footer();