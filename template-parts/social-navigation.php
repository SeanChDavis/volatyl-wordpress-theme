<?php // The social navigation used in the footer

$footer_general_color_scheme = 'v-gray-background';
if ( get_theme_mod( 'volatyl_footer_general_color_scheme' ) ) {
	$footer_general_color_scheme = 'v-dark-background';
}
?>

<div class="social-navigation <?php echo $footer_general_color_scheme; ?>">
	<div class="inner">
		<?php dynamic_sidebar( 'Social Media Footer Area' ); ?>
	</div>
</div>