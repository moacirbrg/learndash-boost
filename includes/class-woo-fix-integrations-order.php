<?php

class Woo_Fix_Integrations_Order {
    public static function attach_user_to_order( $order_id ) {
        $order = wc_get_order( $order_id );
        
        $email = $order->get_billing_email();
        $first_name = $order->get_billing_first_name();
        $last_name = $order->get_billing_last_name();

        $user_id = Woo_Fix_Integrations_User::create_user_if_not_exists( $email, $first_name, $last_name );

        if ( $user_id === null ) {
            return false;
        }

        update_post_meta( $order_id, '_customer_user', $user_id );
    }
}