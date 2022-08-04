<?php
/**
 * Displays above the main site footer
 *
 * This file is only reached if at least one of the fat footer areas is in use.
 * See volatyl_has_fat_footer_content().
 *
 * The ".fat-footer-areas.v-grid" element is display: grid, thanks to the
 * .v-grid class. The child elements will adjust to fill the space based
 * on the number of fat footer areas in use. This is done through JavaScript,
 * adding another class of v-grid-columns_# to the element, where # is
 * equal to the number of areas in use.
 *
 * Example:
 *
 * <div class="fat-footer-areas v-grid v-grid-columns_4">
 * ... fat footer areas ...
 * </div>
 *
 * An additional class of "alternate-layout" is added to the same element based
 * on a Customizer setting. This class activates an alternate Fat Footer layout
 * only when either three or four areas are in use.
 */

// Set the classes for the Fat Footer area based on layout
$fat_footer_classes = array( 'fat-footer-areas', 'v-grid' );
if ( 1 == get_theme_mod( 'volatyl_fat_footer_alternate_layout', 0 ) ) {
	$fat_footer_classes[] = 'alternate-layout';
}
?>

<div class="fat-footer">
	<div class="inner">
		<div class="<?php echo implode( ' ', $fat_footer_classes ); ?>">
			<?php
			$fat_footer_areas = array(
				'ff_a1' => array( 'name' => 'fat-footer-area-one' ),
				'ff_a2' => array( 'name' => 'fat-footer-area-two' ),
				'ff_a3' => array( 'name' => 'fat-footer-area-three' ),
				'ff_a4' => array( 'name' => 'fat-footer-area-four' ),
			);
			foreach ( $fat_footer_areas as $area ) {
				if ( is_active_sidebar( $area['name'] ) ) {
					dynamic_sidebar( $area['name'] );
				}
			}
			?>
		</div>
	</div>
</div>