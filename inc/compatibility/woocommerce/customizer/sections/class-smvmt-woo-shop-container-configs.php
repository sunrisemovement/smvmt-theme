<?php
/**
 * Container Options for smvmt theme.
 *
 * @package     smvmt
 * @author      Brainstorm Force
 * @copyright   Copyright (c) 2020, Brainstorm Force
 * @link        https://www.brainstormforce.com
 * @since       smvmt 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'SMVMT_Woo_Shop_Container_Configs' ) ) {

	/**
	 * Customizer Sanitizes Initial setup
	 */
	class SMVMT_Woo_Shop_Container_Configs extends SMVMT_Customizer_Config_Base {

		/**
		 * Register smvmt-WooCommerce Shop Container Settings.
		 *
		 * @param Array                $configurations smvmt Customizer Configurations.
		 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
		 * @since 1.4.3
		 * @return Array smvmt Customizer Configurations with updated configurations.
		 */
		public function register_configuration( $configurations, $wp_customize ) {

			$_configs = array(

				/**
				 * Option: Divider
				 */
				array(
					'name'     => SMVMT_THEME_SETTINGS . '[woocommerce-content-divider]',
					'type'     => 'control',
					'section'  => 'section-container-layout',
					'control'  => 'smvmt-divider',
					'priority' => 85,
					'settings' => array(),
				),

				/**
				 * Option: Shop Page
				 */
				array(
					'name'     => SMVMT_THEME_SETTINGS . '[woocommerce-content-layout]',
					'type'     => 'control',
					'control'  => 'select',
					'default'  => smvmt_get_option( 'woocommerce-content-layout' ),
					'section'  => 'section-container-layout',
					'priority' => 85,
					'title'    => __( 'WooCommerce Layout', 'smvmt' ),
					'choices'  => array(
						'default'                 => __( 'Default', 'smvmt' ),
						'boxed-container'         => __( 'Boxed', 'smvmt' ),
						'content-boxed-container' => __( 'Content Boxed', 'smvmt' ),
						'plain-container'         => __( 'Full Width / Contained', 'smvmt' ),
						'page-builder'            => __( 'Full Width / Stretched', 'smvmt' ),
					),
				),
			);

			return array_merge( $configurations, $_configs );

		}
	}
}

new SMVMT_Woo_Shop_Container_Configs();

