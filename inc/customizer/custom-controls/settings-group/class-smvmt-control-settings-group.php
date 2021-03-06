<?php
/**
 * Customizer Control: Settings Group
 *
 * @package     smvmt
 * @author      smvmt
 * @copyright   Copyright (c) 2020, smvmt
 * @link        https://smvmt.org/
 * @since       2.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'SMVMT_Control_Settings_Group' ) && class_exists( 'WP_Customize_Control' ) ) :

	/**
	 * A Settings group control.
	 */
	class SMVMT_Control_Settings_Group extends WP_Customize_Control {


		/**
		 * The control type.
		 *
		 * @access public
		 * @var string
		 */
		public $type = 'smvmt-settings-group';

		/**
		 * The text to display.
		 *
		 * @access public
		 * @var string
		 */
		public $text = '';

		/**
		 * The control name.
		 *
		 * @access public
		 * @var string
		 */
		public $name = '';

		/**
		 * The control value.
		 *
		 * @access public
		 * @var string
		 */
		public $tab = '';

		/**
		 * The fields for group.
		 *
		 * @access public
		 * @var string
		 */
		public $smvmt_fields = '';

		/**
		 * The control type.
		 *
		 * @access public
		 * @var string
		 */
		public $help = '';

		/**
		 * Refresh the parameters passed to the JavaScript via JSON.
		 *
		 * @see WP_Customize_Control::to_json()
		 */
		public function to_json() {
			parent::to_json();

			$this->json['label'] = esc_html( $this->label );
			$this->json['text']  = $this->text;
			$this->json['help']  = $this->help;
			$this->json['name']  = $this->name;

			$config = array();

			if ( isset( SMVMT_Customizer::$group_configs[ $this->name ]['tabs'] ) ) {
				$tab = array_keys( SMVMT_Customizer::$group_configs[ $this->name ]['tabs'] );

				foreach ( $tab as $key => $value ) {

					$config['tabs'][ $value ] = wp_list_sort( SMVMT_Customizer::$group_configs[ $this->name ]['tabs'][ $value ], 'priority' );
				}
			} else {
				if ( isset( SMVMT_Customizer::$group_configs[ $this->name ] ) ) {
					$config = wp_list_sort( SMVMT_Customizer::$group_configs[ $this->name ], 'priority' );
				}
			}

			$this->json['smvmt_fields'] = $config;
		}

		/**
		 * An Underscore (JS) template for this control's content (but not its container).
		 *
		 * Class variables for this control class are available in the `data` JS object;
		 * export custom variables by overriding {@see WP_Customize_Control::to_json()}.
		 *
		 * @see WP_Customize_Control::print_template()
		 *
		 * @access protected
		 */
		protected function content_template() {
			?>

		<div class="smvmt-toggle-desc-wrap">
			<label class="customizer-text">
				<# if ( data.label ) { #>
					<span class="customize-control-title">{{{ data.label }}}</span>
					<# } #>
						<# if ( data.help ) { #>
							<span class="smvmt-description">{{{ data.help }}}</span>
							<# } #>
								<span class="smvmt-adv-toggle-icon dashicons" data-control="{{ data.name }}"></span>
			</label>
		</div>
		<div class="smvmt-field-settings-wrap">
		</div>
			<?php
		}

		/**
		 * Render the control's content.
		 *
		 * @see WP_Customize_Control::render_content()
		 */
		protected function render_content() {}
	}

endif;
