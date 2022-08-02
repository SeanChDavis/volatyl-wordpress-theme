<?php

/**
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

/**
 * Extends controls class to add textarea with description
 */
class Volatyl_WP_Customize_Textarea_Control extends WP_Customize_Control {
	public $type = 'textarea';
	public $description = '';
	public function render_content() {
		?>

		<label>
			<span class="customize-control-title">
				<?php echo esc_html( $this->label ); ?>
				<span class="volatyl-toggle-wrap">
					<?php if ( ! empty( $this->description ) ) { ?>
						<a href="#" class="volatyl-toggle-description">?</a>
					<?php } ?>
				</span>
			</span>
			<div class="control-description volatyl-control-description"><?php echo esc_html( $this->description ); ?></div>
			<textarea rows="3" style="width:98%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
		</label>

		<?php
	}
}