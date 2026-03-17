<?php // Main site footer

$footer_general_color_scheme = 'v-gray-background';
if ( get_theme_mod( 'volatyl_footer_general_color_scheme' ) ) {
	$footer_general_color_scheme = 'v-dark-background';
}?>

<div class="site-footer <?php echo esc_attr( $footer_general_color_scheme ); ?>">
	<div class="inner v-padding-top-0 v-padding-bottom-3">
		<div class="site-footer-content v-padding-top-3">
			<div class="site-name">
				<span class="blog-name"><?php echo esc_html( get_bloginfo( 'name' ) ); ?><span class="site-copyright"><?php echo ' &copy; ' . esc_html( wp_date( 'Y' ) ); ?></span></span>
			</div>
			<div class="site-description">
				<span class="blog-description"><?php echo esc_html( get_bloginfo( 'description' ) ); ?></span>
			</div>
		</div>
	</div>
</div>

