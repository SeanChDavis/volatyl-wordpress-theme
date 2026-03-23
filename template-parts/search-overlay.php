<?php // Search overlay — rendered when volatyl_header_search is enabled ?>

<div id="search-overlay" role="dialog" aria-label="<?php esc_attr_e( 'Search', 'volatyl' ); ?>" aria-hidden="true">
	<div class="search-overlay-inner">
		<?php get_search_form(); ?>
	</div>
	<button class="search-overlay-close" aria-label="<?php esc_attr_e( 'Close search', 'volatyl' ); ?>">
		<?php esc_html_e( 'Close', 'volatyl' ); ?>
	</button>
</div>
