<?php
/**
 * The main site header
 */
?>

<header id="masthead">

	<div class="site-header">

		<div class="inner">

			<div class="site-branding">
				<?php
				if ( has_custom_logo() ) {
					the_custom_logo();
				} else {
					$title_tag = is_front_page() ? 'p' : 'h1';
					?>
					<<?php echo $title_tag ?> class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo get_bloginfo( 'description', 'display' ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></<?php echo $title_tag ?>>
					<?php
				}
				?>
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
