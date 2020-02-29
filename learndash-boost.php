 <?php
/**
 * Plugin Name:		Learndash Boost
 * Plugin URI:		https://...
 * Description:		Improve your e-learning with automations and massive operations.
 * Author:			Moacir Braga
 * Version:			0.1.0
 * License:			Copyright
 * Text Domain:		learndash-boost
 * Domain Path:		/languages
 * 
 * WC requires at least:	4.6.0
 * WC tested up to:			5.0.3
 *
 * @package Learndash_Boost
 */
use Learndash_Boost\MOWP_Tools\MOWP_Tools;
use Learndash_Boost\Learndash_Boost;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'LEARNDASH_BOOST_ROOT_PATH', __FILE__ );
define( 'LEARNDASH_BOOST_NS', 'learndash-boost' );
define( 'LEARNDASH_BOOST_SLUG', 'learndash-boost' );

if ( ! class_exists( '\Learndash_Boost\Learndash_Boost' ) ) {
	include_once dirname( LEARNDASH_BOOST_ROOT_PATH ) . '/includes/mowp-tools/mowp-tools.php';
	include_once dirname( LEARNDASH_BOOST_ROOT_PATH ) . '/includes/learndash-boost.php';

	MOWP_Tools::init();
	Learndash_Boost::init();
}
