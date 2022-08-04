<?php
/**
 * The social navigation used in the footer
 */
?>

<div class="social-navigation">
	<div class="inner">
		<nav id="social-navigation">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'social-menu',
					'menu_id'        => 'social-menu',
					'depth'          => 1,
				)
			);
			?>
		</nav>
	</div>
</div>