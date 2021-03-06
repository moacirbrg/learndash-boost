<?php
namespace Learndash_Boost\Core;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Order {
	public static function attach_user_to_order( $order_id ) {
		$order = wc_get_order( $order_id );
		
		$email = $order->get_billing_email();
		$first_name = $order->get_billing_first_name();
		$last_name = $order->get_billing_last_name();
		$product_name = '';
		
		foreach ( $order->get_items() as $order_item ) {
			$product_name = $order_item->get_name();
		}

		$user_id = User::create_user_if_not_exists( $email, $first_name, $last_name, $product_name );

		if ( $user_id === null ) {
			return false;
		}

		update_post_meta( $order_id, '_customer_user', $user_id );
	}
}