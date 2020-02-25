<?php
namespace Learndash_Boost\Admin;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Integrations_Page {
	public static function init() {
		add_action( 'admin_menu', array( __CLASS__, 'init_admin_menu' ) );
	}

	public static function init_admin_menu() {
		add_submenu_page(
			'woocommerce',
			__( 'Learndash Boost', LEARNDASH_BOOST_NS ),
			__( 'Learndash Boost', LEARNDASH_BOOST_NS ),
			'manage_options',
			LEARNDASH_BOOST_SLUG,
			array( __CLASS__, 'init_admin_page' ));
	}

	public static function init_admin_page() {
		echo 'Hello world!';
	}
}
