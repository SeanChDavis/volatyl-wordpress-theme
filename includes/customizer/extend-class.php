<?php

/** ===============
 * Allow arbitrary HTML controls
 */
class Volatyl_Customizer_HTML extends WP_Customize_Control {

	public $content = '';

	public function render_content() {
		if ( isset( $this->label ) ) {
			echo '<hr><h3 class="settings-heading">' . $this->label . '</h3>';
		}
		if ( isset( $this->description ) ) {
			echo '<div class="description customize-control-description settings-description">' . $this->description . '</div>';
		}
	}
}