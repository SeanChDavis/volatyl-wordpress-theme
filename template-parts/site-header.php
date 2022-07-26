<?php
/**
 * The main site header
 */
?>

<header id="masthead">

	<div class="site-header">

		<div class="inner">

			<div class="site-branding">
				<?php the_custom_logo(); ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo get_bloginfo( 'description', 'display' ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			</div>
			<?php
			// Only display if a menu is assigned to this location
			if ( has_nav_menu( 'primary-menu' ) ) {
				get_template_part( 'template-parts/site', 'navigation' );
			}
			?>

		</div>

	</div>

	<?php get_template_part( 'template-parts/site', 'hero' ); ?>

</header>
