 <?php
/**
 * Plugin Name:          Woo Fix Integrations
 * Plugin URI:           https://...
 * Description:          Fix WooCommerce Integrations
 * Author:               Moacir Braga
 * Version:              0.1.0
 * License:              Copyright
 * Text Domain:          woo-fix-integrations
 * Domain Path:          /languages
 * WC requires at least: 4.6.0
 * WC tested up to:      5.0.3
 *
 * @package Woo_Fix_Integrations
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'WOO_FIX_INTEGRATIONS_FILE', __FILE__ );

if ( ! class_exists( 'Woo_Fix_Integrations' ) ) {
	include_once dirname( __FILE__ ) . '/includes/class-woo-fix-integrations.php';
	Woo_Fix_Integrations::init();
}