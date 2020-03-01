<?php
namespace Learndash_Boost;

use Learndash_Boost\MOWP_Tools\Integrations\Woocommerce\Log;
use Learndash_Boost\MOWP_Tools\Options\Menu;
use Learndash_Boost\MOWP_Tools\Utils\Template;
use Learndash_Boost\Core\Woocommerce_Integration;
use Learndash_Boost\Admin\Woocommerce_Integration_Admin_Page;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Learndash_Boost {
	public static function init() {
		self::init_mowp_tools();

		self::include_frontend_dependencies();
		self::init_frontend();
		
		if ( is_admin() ) {
			add_action( 'plugins_loaded', function() {
				load_plugin_textdomain( LEARNDASH_BOOST_NS, FALSE, basename( dirname( LEARNDASH_BOOST_ROOT_PATH ) ) . '/languages/' );
			} );
	
			add_action( 'init', function() {
				self::include_admin_dependencies();
				self::init_admin();
			} );
		}
	}

	private static function include_admin_dependencies() {
		include_once dirname( LEARNDASH_BOOST_ROOT_PATH ) . '/includes/admin/admin-page.php';
		include_once dirname( LEARNDASH_BOOST_ROOT_PATH ) . '/includes/admin/woocommerce-integration-admin-page.php';
	}

	private static function include_frontend_dependencies() {
		include_once dirname( LEARNDASH_BOOST_ROOT_PATH ) . '/includes/core/user.php';
		include_once dirname( LEARNDASH_BOOST_ROOT_PATH ) . '/includes/core/order.php';
		include_once dirname( LEARNDASH_BOOST_ROOT_PATH ) . '/includes/core/woocommerce-integration.php';
	}

	private static function init_admin() {
		$woocommerce_integration_admin_page = new Woocommerce_Integration_Admin_Page();
		$menu = new Menu( __( 'Learndash Boost', LEARNDASH_BOOST_NS ), LEARNDASH_BOOST_SLUG, $woocommerce_integration_admin_page->get_page() );
		$menu->init();
	}

	private static function init_frontend() {
		Woocommerce_Integration::init();
	}

	private static function init_mowp_tools() {
		Template::$TPL_FOLDER_PATH = dirname( LEARNDASH_BOOST_ROOT_PATH ) . '/templates';
	}
}
