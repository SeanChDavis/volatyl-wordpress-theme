<?php // The single post template
get_header();
?>

	<main id="main">
		<?php get_template_part( 'template-parts/content', 'header' ); ?>
		<div class="inner v-medium">
			<div class="main-content-wrap">
				<div id="primary-content">
					<?php
					if ( have_posts() ) :
						while ( have_posts() ) :
							the_post();
							get_template_part( 'content/content', 'single' );
							the_posts_navigation();
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
						endwhile;
					endif;
					?>
				</div>
				<?php get_sidebar(); ?>
			</div>
		</div>
	</main>

<?php
get_footer();