<?php
/**
 * Override default customizer panels, sections, settings or controls.
 *
 * @package     smvmt
 * @author      smvmt
 * @copyright   Copyright (c) 2020, smvmt
 * @link        https://wpsmvmt.com/
 * @since       smvmt 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Override Sections
 */
$wp_customize->get_section( 'title_tagline' )->priority = 5;

/**
 * Override Settings
 */
$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

/**
 * Override Controls
 */
$wp_customize->get_control( 'custom_logo' )->priority      = 5;
$wp_customize->get_control( 'blogname' )->priority         = 7;
$wp_customize->get_control( 'blogdescription' )->priority  = 10;
$wp_customize->get_control( 'header_textcolor' )->priority = 9;
$wp_customize->get_control( 'site_icon' )->priority        = 6;

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'blogname',
		array(
			'selector'            => '.main-header-bar .site-title a,  .smvmt-small-footer-wrap .smvmt-footer-site-title',
			'container_inclusive' => false,
			'render_callback'     => array( 'SMVMT_Customizer_Partials', 'render_partial_site_title' ),
		)
	);
}

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'blogdescription',
		array(
			'selector'            => '.main-header-bar .site-description',
			'container_inclusive' => false,
			'render_callback'     => array( 'SMVMT_Customizer_Partials', 'render_partial_site_tagline' ),
		)
	);
}

/*
 * Modify WooCommerce default section priorities
*/
if ( class_exists( 'WooCommerce' ) ) {
	$wp_customize->get_section( 'woocommerce_store_notice' )->priority    = 9;
	$wp_customize->get_section( 'woocommerce_product_catalog' )->priority = 11;
	$wp_customize->get_section( 'woocommerce_checkout' )->priority        = 21;
	$wp_customize->get_panel( 'woocommerce' )->priority                   = 70;
}



