<?php // Call to action displayed inside the blog posts grid
$cta_area        = get_theme_mod( 'volatyl_blog_grid_cta' );
$cta_title       = get_theme_mod( 'volatyl_blog_grid_cta_title' );
$cta_description = get_theme_mod( 'volatyl_blog_grid_cta_description' );
$cta_button_url  = get_theme_mod( 'volatyl_blog_grid_cta_button_url' );
$cta_button_text = get_theme_mod( 'volatyl_blog_grid_cta_button_text' );

$cta_color_scheme = 'v-gray-background';
if ( get_theme_mod( 'volatyl_blog_grid_cta_color_scheme' ) ) {
	$cta_color_scheme = 'v-dark-background';
}
$cta_classes = array( 'blog-grid-cta', 'v-padding-x-4', 'v-text-align-center', $cta_color_scheme );

if ( $cta_area & ( ( $cta_title || $cta_description ) || ( $cta_button_url && $cta_button_text ) ) ) {
	?>
	<div class="<?php echo implode( ' ', $cta_classes ); ?>">
		<?php if ( $cta_title ) { ?>
			<span class="h3 cta-title"><?php echo $cta_title; ?></span>
		<?php } ?>
		<?php if ( $cta_description ) { ?>
			<p class="cta-description v-margin-bottom-0"><?php echo $cta_description; ?></p>
		<?php } ?>
		<?php if ( $cta_button_url && $cta_button_text ) { ?>
			<div class="cta-action">
				<a href="<?php echo $cta_button_url; ?>" class="v-button v-large"><?php echo $cta_button_text; ?></a>
			</div>
		<?php } ?>
	</div>
	<?php
}

