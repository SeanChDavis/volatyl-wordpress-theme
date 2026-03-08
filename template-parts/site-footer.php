<?php // Main site footer

$footer_general_color_scheme = 'v-gray-background';
if ( get_theme_mod( 'volatyl_footer_general_color_scheme' ) ) {
	$footer_general_color_scheme = 'v-dark-background';
}?>

<div class="site-footer <?php echo $footer_general_color_scheme; ?>">
	<div class="inner v-padding-top-0 v-padding-bottom-3">
		<div class="site-footer-content v-padding-top-3">
			<div class="site-name">
				<span class="blog-name"><?php echo get_bloginfo( 'name' ); ?><span class="site-copyright"><?php echo ' &copy; ' . date('Y'); ?></span></span>
			</div>
			<div class="site-description">
				<span class="blog-description"><?php echo get_bloginfo( 'description' ); ?></span>
			</div>
		</div>
	</div>
</div>

