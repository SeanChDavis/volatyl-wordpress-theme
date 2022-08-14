<?php // Closing body/page markup and site footer elements

// Only display if Footer Lead is enabled and there is Footer Lead content
if ( 1 === get_theme_mod( 'volatyl_footer_lead', 0 ) && volatyl_has_footer_lead_content() ) {
	get_template_part( 'template-parts/footer', 'lead' );
}

// Only display if Fat Footer is enabled and there is Fat Footer content
if ( 1 === get_theme_mod( 'volatyl_fat_footer', 0 ) && volatyl_has_fat_footer_content() ) {
	get_template_part( 'template-parts/fat', 'footer' );
}

// Widget area designed as a social media icon list (WordPress icons block)
if ( is_active_sidebar( 'Social Media Footer Area' ) ) {
	get_template_part( 'template-parts/social', 'navigation' );
}

// Persistent site footer with copyright information
get_template_part( 'template-parts/site', 'footer' );
?>

</div>
<?php wp_footer(); ?>
</body>
</html>