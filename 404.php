<?php // When there's no relevant content to display
get_header();
?>

	<main id="main">
		<?php
		get_template_part( 'template-parts/content', 'header', array(
			'title' => esc_html__( 'Nothing Found', 'volatyl' ),
			'description' => esc_html__( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'volatyl' ),
			'has_search_form' => true,
		) );
		?>
		<div class="inner">
			<?php get_template_part( 'content/content', 'none' ); ?>
		</div>
	</main>

<?php
get_footer();