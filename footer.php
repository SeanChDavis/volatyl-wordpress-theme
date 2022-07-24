<?php
/**
 * Closing body tag and full site footers
 */

// Only display if there is at least one fat footer widget in use
if ( volatyl_has_fat_footer_content() ) {
	get_template_part( 'template-parts/fat', 'footer' );
}

// Always display the basic site information
get_template_part( 'template-parts/site', 'footer' );
?>

</div><!--#page-->

<?php wp_footer(); ?>
</body>

</html>