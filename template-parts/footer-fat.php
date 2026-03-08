<?php // Widgetized footer area
$fat_footer_classes = array( 'fat-footer-areas', 'v-grid', 'v-padding-top-0' );
if ( 1 == get_theme_mod( 'volatyl_fat_footer_alternate_layout', 0 ) ) {
	$fat_footer_classes[] = 'alternate-layout';
}

$footer_general_color_scheme = 'v-gray-background';
if ( get_theme_mod( 'volatyl_footer_general_color_scheme' ) ) {
	$footer_general_color_scheme = 'v-dark-background';
}
?>

<div class="fat-footer <?php echo $footer_general_color_scheme; ?>">
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