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
 * Extends controls class to add a textarea with a description
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

/**
 * Hex-to-hue helper control — renders a color input + swatch in the controls
 * pane. Not bound to any real setting; JavaScript handles the conversion and
 * pushes the extracted hue to the volatyl_primary_hue range control.
 */
class Volatyl_Hex_To_Hue_Control extends WP_Customize_Control {
	public function render_content() {
		?>
		<span class="customize-control-title"><?php esc_html_e( 'Set hue from a brand color', 'volatyl' ); ?></span>
		<p class="description customize-control-description"><?php esc_html_e( 'Enter any color that contains your brand hue. The theme uses only the hue — lightness and vibrancy are controlled by the sliders below.', 'volatyl' ); ?></p>
		<div class="volatyl-hex-to-hue">
			<div class="volatyl-hex-input-row">
				<span class="volatyl-hex-swatch" id="volatyl-hex-swatch"></span>
				<input type="text" id="volatyl-hex-input" class="volatyl-hex-input" placeholder="#0057B7" maxlength="7" autocomplete="off" spellcheck="false" />
			</div>
			<button type="button" id="volatyl-hex-apply" class="button button-secondary volatyl-hex-apply"><?php esc_html_e( 'Extract Hue', 'volatyl' ); ?></button>
			<p class="volatyl-hex-warning" id="volatyl-hex-warning"><?php esc_html_e( 'This color is too neutral to extract a reliable hue. Try a more saturated version of your brand color.', 'volatyl' ); ?></p>
		</div>
		<?php
	}
}

/**
 * Extends controls class to add a text field with a description
 */
class Volatyl_WP_Customize_Text_Control extends WP_Customize_Control {
	public $type = 'text';
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
			<input type="text" style="width:98%;" <?php $this->link(); ?> value="<?php echo esc_attr( $this->value() ); ?>" />
		</label>
		<?php
	}
}
