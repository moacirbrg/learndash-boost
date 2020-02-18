<?php
namespace WooFixIntegrations;

use WooFixIntegrations\Admin\Integrations_Page;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Plugin {
    public static function init() {
        self::includes();

        // Attach user to the order
        add_action( 'woocommerce_order_status_processing', array( __CLASS__, 'woocommerce_order_status_processing' ), 10, 1 );
    }

    public static function includes() {
        include_once dirname( WOO_FIX_INTEGRATIONS_FILE ) . '/includes/log.php';
        include_once dirname( WOO_FIX_INTEGRATIONS_FILE ) . '/includes/template.php';
        include_once dirname( WOO_FIX_INTEGRATIONS_FILE ) . '/includes/user.php';
        include_once dirname( WOO_FIX_INTEGRATIONS_FILE ) . '/includes/order.php';

        if ( is_admin() ) {
            include_once dirname( WOO_FIX_INTEGRATIONS_FILE ) . '/includes/admin/integrations-page.php';
            Integrations_Page::init();
        }
    }

    public static function woocommerce_order_status_processing( $order_id ) {
        Order::attach_user_to_order( $order_id );
    }
}
