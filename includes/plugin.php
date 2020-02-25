<?php
namespace Learndash_Boost;

use Learndash_Boost\MOWP_Tools\Integrations\Woocommerce\Log;
use Learndash_Boost\MOWP_Tools\Utils\Template;
use Learndash_Boost\Core\Order;
use Learndash_Boost\Admin\Integrations_Page;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Plugin {
	public static function init() {
		self::init_mowp_tools();
		self::includes();

		// Attach user to the order
		add_action( 'woocommerce_order_status_processing', array( __CLASS__, 'woocommerce_order_status_processing' ), 10, 1 );
	}

	public static function init_mowp_tools() {
		Template::$TPL_FOLDER_PATH = dirname( LEARNDASH_BOOST_ROOT_PATH ) . '/templates';
	}

	public static function includes() {
		include_once dirname( LEARNDASH_BOOST_ROOT_PATH ) . '/includes/core/user.php';
		include_once dirname( LEARNDASH_BOOST_ROOT_PATH ) . '/includes/core/order.php';

		if ( is_admin() ) {
			include_once dirname( LEARNDASH_BOOST_ROOT_PATH ) . '/includes/admin/integrations-page.php';
			Integrations_Page::init();
		}
	}

	public static function woocommerce_order_status_processing( $order_id ) {
		try {
			Order::attach_user_to_order( $order_id );
		} catch (\Exception $e) {
			Log::error( $e->getMessage() );
		}
	}
}
