<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Woo_Fix_Integrations {
    public static function init() {
        self::includes();

        // Attach user to the order
        add_action( 'woocommerce_order_status_processing', array( __CLASS__, 'woocommerce_order_status_processing' ), 10, 1 );
    }

    public static function includes() {
        include_once dirname( WOO_FIX_INTEGRATIONS_FILE ) . '/includes/class-woo-fix-integrations-log.php';
        include_once dirname( WOO_FIX_INTEGRATIONS_FILE ) . '/includes/class-woo-fix-integrations-template.php';
        include_once dirname( WOO_FIX_INTEGRATIONS_FILE ) . '/includes/class-woo-fix-integrations-user.php';
        include_once dirname( WOO_FIX_INTEGRATIONS_FILE ) . '/includes/class-woo-fix-integrations-order.php';

        if ( is_admin() ) {
            include_once dirname( WOO_FIX_INTEGRATIONS_FILE ) . '/includes/admin/class-woo-fix-integrations-admin-page.php';
            Woo_Fix_Integrations_Admin_Page::init();
        }
    }

    public static function woocommerce_order_status_processing( $order_id ) {
        Woo_Fix_Integrations_Order::attach_user_to_order( $order_id );
    }
}
