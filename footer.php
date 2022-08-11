<?php
// Closing body/page markup and site footer elements

// Only display if there is at least one fat footer widget in use
if ( 1 === get_theme_mod( 'volatyl_footer_lead', 0 ) && volatyl_has_footer_lead_content() ) {
	get_template_part( 'template-parts/footer', 'lead' );
}

// Only display if there is at least one fat footer widget in use
if ( 1 === get_theme_mod( 'volatyl_fat_footer', 0 ) && volatyl_has_fat_footer_content() ) {
	get_template_part( 'template-parts/fat', 'footer' );
}

// Intended to be used as a social media icon list
// Technically can be used for any other widget content, but not recommended
if ( is_active_sidebar( 'Social Media Footer Area' ) ) {
	get_template_part( 'template-parts/social', 'navigation' );
}

// Always display the basic site information
get_template_part( 'template-parts/site', 'footer' );
?>

</div><!--#page-->
<?php wp_footer(); ?>
</body>
</html>