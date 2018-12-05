<?php
/**
 * The radio image customize control extends the WP_Customize_Control class.  This class allows
 * developers to create a list of image radio inputs.
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return;
}

/**
 * Image Radio Button Custom Control
 */
class VW_Themes_Image_Radio_Button_Custom_Control extends WP_Customize_Control {
	/**
	 * The type of control being rendered
	 */
		public $type = 'image_radio_button';
	/**
	 * Enqueue our scripts and styles
	 */
		public function enqueue() {
		wp_enqueue_style( 'vwthemes-image-radio-style', VWTHEMES_CUSTOMIZER_PLUGIN_URL. 'vwthemes/customizer-radio-image/css/customizer-image-radio.css', null, '1.0.0' );
		}
	/**
	 * Render the control in the customizer
	 */
		public function render_content() {
		?>
		<div class="image_radio_button_control">
			<?php if( !empty( $this->label ) ) { ?>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php } ?>
			<?php if( !empty( $this->description ) ) { ?>
				<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
			<?php } ?>

			<?php foreach ( $this->choices as $key => $value ) { ?>
				<label class="radio-button-label">
					<input type="radio" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $key ); ?>" <?php $this->link(); ?> <?php checked( esc_attr( $key ), $this->value() ); ?>/>
					<img src="<?php echo esc_attr( $value['image'] ); ?>" alt="<?php echo esc_attr( $value['name'] ); ?>" title="<?php echo esc_attr( $value['name'] ); ?>" />
				</label>
			<?php	} ?>
		</div>
		<?php
		}
	}