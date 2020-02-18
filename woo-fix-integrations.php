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
use WooFixIntegrations\Plugin;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'WOO_FIX_INTEGRATIONS_FILE', __FILE__ );
define( 'WOO_FIX_INTEGRATIONS_NS', 'woo-fix-integrations' );
define( 'WOO_FIX_INTEGRATIONS_SLUG', 'woo-fix-integrations' );

if ( ! class_exists( 'Woo_Fix_Integrations' ) ) {
	include_once dirname( __FILE__ ) . '/includes/plugin.php';
	Plugin::init();
}
