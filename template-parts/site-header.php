<?php // The main site header

$front_page_hero_color_scheme = 'v-gray-background';
if ( ( is_front_page() && ! is_home() ) && get_theme_mod( 'volatyl_front_page_hero_dark', 0 ) ) {
	$front_page_hero_color_scheme = 'v-dark-background';
}
?>

<header id="masthead" class="<?php echo $front_page_hero_color_scheme; ?>">
	<div class="inner v-padding-y-4">
		<div class="site-header">
			<div class="site-branding">
				<?php
				if ( has_custom_logo() ) {
					the_custom_logo();
				} else {
					$title_tag = is_front_page() ? 'p' : 'h1';
					?>
					<<?php echo $title_tag ?> class="site-title v-margin-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo get_bloginfo( 'description', 'display' ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></<?php echo $title_tag ?>>
					<?php
				}
				?>
			</div>
			<?php
			if ( has_nav_menu( 'primary-menu' ) ) {
				get_template_part( 'template-parts/site', 'navigation' );
			}
			?>
		</div>
	</div>
	<?php get_template_part( 'template-parts/site', 'hero' ); ?>
</header>
