<?php
namespace Learndash_Boost\Core;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Woocommerce_Integration {
	public static function init() {
		self::init_actions();
	}

	public static function init_actions() {
		add_action( 'woocommerce_order_status_processing', array( __CLASS__, 'action_woocommerce_order_status_processing' ), 10, 1 );
	}

	/* Attach user (identified by email) to the order.
	 * If the user doesn't exist, it will be created automatically. */
	public static function action_woocommerce_order_status_processing( $order_id ) {
		try {
			Order::attach_user_to_order( $order_id );
		} catch (\Exception $e) {
			Log::error( $e->getMessage() );
		}
	}
}
