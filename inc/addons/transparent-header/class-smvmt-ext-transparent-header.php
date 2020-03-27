<?php
/**
 * Sticky Header Extension
 *
 * @package smvmt Addon
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'SMVMT_THEME_TRANSPARENT_HEADER_DIR', SMVMT_THEME_DIR . 'inc/addons/transparent-header/' );
define( 'SMVMT_THEME_TRANSPARENT_HEADER_URI', SMVMT_THEME_URI . 'inc/addons/transparent-header/' );

if ( ! class_exists( 'SMVMT_Ext_Transparent_Header' ) ) {

	/**
	 * Sticky Header Initial Setup
	 *
	 * @since 1.0.0
	 */
	class SMVMT_Ext_Transparent_Header {

		/**
		 * Member Variable
		 *
		 * @var instance
		 */
		private static $instance;

		/**
		 *  Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Constructor function that initializes required actions and hooks
		 */
		public function __construct() {

			require_once SMVMT_THEME_TRANSPARENT_HEADER_DIR . 'classes/class-smvmt-ext-transparent-header-loader.php';
			require_once SMVMT_THEME_TRANSPARENT_HEADER_DIR . 'classes/class-smvmt-ext-transparent-header-markup.php';

			// Include front end files.
			if ( ! is_admin() ) {
				require_once SMVMT_THEME_TRANSPARENT_HEADER_DIR . 'classes/dynamic-css/dynamic.css.php';
				require_once SMVMT_THEME_TRANSPARENT_HEADER_DIR . 'classes/dynamic-css/header-sections-dynamic.css.php';
			}
		}
	}

	/**
	 *  Kicking this off by calling 'get_instance()' method
	 */
	SMVMT_Ext_Transparent_Header::get_instance();

}
