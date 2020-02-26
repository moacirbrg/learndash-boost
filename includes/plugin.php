<?php
namespace Learndash_Boost;

use Learndash_Boost\MOWP_Tools\Integrations\Woocommerce\Log;
use Learndash_Boost\MOWP_Tools\Options\Menu;
use Learndash_Boost\MOWP_Tools\Utils\Template;
use Learndash_Boost\Core\Order;
use Learndash_Boost\Admin\Woocommerce_Integration_Page;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Plugin {
	public static function init() {
		self::init_mowp_tools();
		self::includes();

		if ( is_admin() ) {
			self::init_admin();
		}
		// Attach user to the order
		add_action( 'woocommerce_order_status_processing', array( __CLASS__, 'woocommerce_order_status_processing' ), 10, 1 );
	}

	public static function woocommerce_order_status_processing( $order_id ) {
		try {
			Order::attach_user_to_order( $order_id );
		} catch (\Exception $e) {
			Log::error( $e->getMessage() );
		}
	}

	private static function includes() {
		include_once dirname( LEARNDASH_BOOST_ROOT_PATH ) . '/includes/core/user.php';
		include_once dirname( LEARNDASH_BOOST_ROOT_PATH ) . '/includes/core/order.php';

		if ( is_admin() ) {
			include_once dirname( LEARNDASH_BOOST_ROOT_PATH ) . '/includes/admin/admin-page.php';
			include_once dirname( LEARNDASH_BOOST_ROOT_PATH ) . '/includes/admin/woocommerce-integration-page.php';
		}
	}

	private static function init_admin() {
		$woocommerce_integration_page = new Woocommerce_Integration_Page();
		$menu = new Menu( __( 'Learndash Boost', LEARNDASH_BOOST_NS ), LEARNDASH_BOOST_SLUG, $woocommerce_integration_page->get_page() );
		$menu->init();
	}

	private static function init_mowp_tools() {
		Template::$TPL_FOLDER_PATH = dirname( LEARNDASH_BOOST_ROOT_PATH ) . '/templates';
	}
}
