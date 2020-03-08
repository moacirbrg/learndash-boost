<?php
namespace Learndash_Boost\Admin;

use Learndash_Boost\MOWP_Tools\Options\Pages\Page;
use Learndash_Boost\MOWP_Tools\Options\Components\Panel;
use Learndash_Boost\MOWP_Tools\Options\Components\Panel_Footer_Submit;
use Learndash_Boost\MOWP_Tools\Options\Components\Panel_Ribbon;
use Learndash_Boost\MOWP_Tools\Options\Pages\Simple_Page;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Woocommerce_Integration_Admin_Page extends Admin_Page {
	public function __construct() {
		$title = __( 'WooCommerce Integration', LEARNDASH_BOOST_NS );
		$page = new Simple_Page( $title, Page::$PAGE_WIDTH_800 );
		
		$new_customer_title = __( 'New Customers', LEARNDASH_BOOST_NS );
		$new_customer_subtitle = __( 'When an user is created via a new purchase, the following settings will be applied.', LEARNDASH_BOOST_NS );
		$new_customer_panel = new Panel( $new_customer_title, $new_customer_subtitle );
		$page->append_page_child( $new_customer_panel );

		$new_customer_panel->activate_form();
		$new_customer_panel->append_child( new Panel_Ribbon( __( 'A welcome e-mail will be sent', LEARNDASH_BOOST_NS ) ) );



		$new_customer_panel->append_child( new Panel_Footer_Submit( __( 'Save changes', LEARNDASH_BOOST_NS ) ) );

		parent::__construct( $page );
	}
}
