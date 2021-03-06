<?php
/**
 * smvmt Theme Customizer Callback
 *
 * @package smvmt Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Customizer Callback
 */
if ( ! class_exists( 'SMVMT_Customizer_Callback' ) ) :

	/**
	 * Customizer Callback
	 */
	class SMVMT_Customizer_Callback {

		/**
		 * Sidebar Archive
		 *
		 * @return boolean Return the sidebar status for Home, Archive & Search pages.
		 */
		public static function _sidebar_archive() { // phpcs:ignore PSR2.Methods.MethodDeclaration.Underscore

			if ( is_home() || is_archive() || is_search() ) {
				return true;
			} else {
				return false;
			}
		}

		/**
		 * Sidebar Single
		 *
		 * @return boolean Return the sidebar status for Single Post.
		 */
		public static function _sidebar_single() { // phpcs:ignore PSR2.Methods.MethodDeclaration.Underscore

			if ( is_single() ) {
				return true;
			} else {
				return false;
			}
		}

		/**
		 * Sidebar Page
		 *
		 * @return boolean Return the sidebar status for Single Page / Custom post type & 404.
		 */
		public static function _sidebar_page() { // phpcs:ignore PSR2.Methods.MethodDeclaration.Underscore

			if ( is_page() || is_404() ) {
				return true;
			} else {
				return false;
			}
		}
	}

endif;
