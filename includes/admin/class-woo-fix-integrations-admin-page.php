<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Woo_Fix_Integrations_Admin_Page {
    public static function init() {
        add_action( 'admin_menu', array( __CLASS__, 'init_admin_menu' ) );
    }

    public static function init_admin_menu() {
        add_submenu_page(
            'woocommerce',
            __( 'Woo Fix Integrations', WOO_FIX_INTEGRATIONS_NS ),
            __( 'Woo Fix Integrations', WOO_FIX_INTEGRATIONS_NS ),
            'manage_options',
            WOO_FIX_INTEGRATIONS_SLUG,
            array( __CLASS__, 'init_admin_page' ));
    }

    public static function init_admin_page() {
        echo 'Hello world!';
    }
}
