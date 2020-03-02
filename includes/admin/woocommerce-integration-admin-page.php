<?php
namespace Learndash_Boost\Admin;

use Learndash_Boost\MOWP_Tools\Options\Components\Panel;
use Learndash_Boost\MOWP_Tools\Options\Components\Panel_Ribbon;
use Learndash_Boost\MOWP_Tools\Options\Pages\Simple_Page;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Woocommerce_Integration_Admin_Page extends Admin_Page {
	public function __construct() {
		$title = __( 'WooCommerce Integration', LEARNDASH_BOOST_NS );
		$page = new Simple_Page( $title );
		
		$new_customer_title = __( 'New Customers', LEARNDASH_BOOST_NS );
		$new_customer_subtitle = __( 'When an user is created via a new purchase, the following settings will be applied.', LEARNDASH_BOOST_NS );
		$new_customer_panel = new Panel( $new_customer_title, $new_customer_subtitle );
		$new_customer_panel->enable_form();
		$page->append_page_child( $new_customer_panel );

		$new_customer_panel->append_child( new Panel_Ribbon( __( 'A welcome e-mail will be sent', LEARNDASH_BOOST_NS ) ) );

		parent::__construct( $page );
	}
}
