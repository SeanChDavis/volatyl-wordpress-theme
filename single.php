<?php // The single post template
get_header();
?>

	<main id="main">
		<?php get_template_part( 'template-parts/content', 'header' ); ?>
		<div class="inner">
			<div class="main-content-wrap">
				<div id="primary-content">
					<?php
					if ( have_posts() ) :
						while ( have_posts() ) :
							the_post();
							get_template_part( 'content/content', 'single' );
							the_post_navigation( array(
							'prev_text' => '<span class="nav-subtitle">&#8592; ' . esc_html__( 'Previous Post', 'volatyl' ) . '</span><span class="nav-label">%title</span>',
							'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next Post', 'volatyl' ) . ' &#8594;</span><span class="nav-label">%title</span>',
						) );
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