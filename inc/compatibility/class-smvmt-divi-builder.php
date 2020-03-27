<?php
/**
 * Divi Builder File.
 *
 * @package smvmt
 */

// If plugin - 'Divi Builder' not exist then return.
if ( ! class_exists( 'ET_Builder_Plugin' ) ) {
	return;
}

/**
 * smvmt Divi Builder
 */
if ( ! class_exists( 'SMVMT_Divi_Builder' ) ) :

	/**
	 * smvmt Divi Builder
	 *
	 * @since 1.4.0
	 */
	class SMVMT_Divi_Builder {

		/**
		 * Member Variable
		 *
		 * @var object instance
		 */
		private static $instance;

		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {
			add_filter( 'smvmt_theme_assets', array( $this, 'add_styles' ) );
		}

		/**
		 * Add assets in theme
		 *
		 * @param array $assets list of theme assets (JS & CSS).
		 * @return array List of updated assets.
		 * @since 1.4.0
		 */
		public function add_styles( $assets ) {
			$assets['css']['smvmt-divi-builder'] = 'compatibility/divi-builder';
			return $assets;
		}

	}

endif;

/**
 * Kicking this off by calling 'get_instance()' method
 */
SMVMT_Divi_Builder::get_instance();
