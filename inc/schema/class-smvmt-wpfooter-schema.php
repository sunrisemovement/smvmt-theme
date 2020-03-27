<?php
/**
 * Schema markup.
 *
 * @package     smvmt
 * @author      smvmt
 * @copyright   Copyright (c) 2020, smvmt
 * @link        https://wpsmvmt.com/
 * @since       smvmt 2.1.3
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * smvmt CreativeWork Schema Markup.
 *
 * @since 2.1.3
 */
class SMVMT_WPFooter_Schema extends SMVMT_Schema {

	/**
	 * Setup schema
	 *
	 * @since 2.1.3
	 */
	public function setup_schema() {

		if ( true !== $this->schema_enabled() ) {
			return false;
		}

		add_filter( 'SMVMT_attr_footer', array( $this, 'wpfooter_Schema' ) );
	}

	/**
	 * Update Schema markup attribute.
	 *
	 * @param  array $attr An array of attributes.
	 *
	 * @return array       Updated embed markup.
	 */
	public function wpfooter_Schema( $attr ) {
		$attr['itemtype']  = 'https://schema.org/WPFooter';
		$attr['itemscope'] = 'itemscope';

		return $attr;
	}

	/**
	 * Enabled schema
	 *
	 * @since 2.1.3
	 */
	protected function schema_enabled() {
		return apply_filters( 'SMVMT_wpfooter_schema_enabled', parent::schema_enabled() );
	}

}

new SMVMT_WPFooter_Schema();
