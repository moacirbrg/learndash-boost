<?php
namespace Learndash_Boost\Admin;

use Learndash_Boost\MOWP_Tools\Options\Components\Panel;
use Learndash_Boost\MOWP_Tools\Options\Pages\Simple_Page;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Woocommerce_Integration_Admin_Page extends Admin_Page {
	public function __construct() {
		$title = __( 'WooCommerce Integration', LEARNDASH_BOOST_NS );
		$page = new Simple_Page( $title );
		
		$new_customer_panel = new Panel( 'New Customers', 'Bla bla bla bla bla bla' );
		$page->append_page_child( $new_customer_panel );

		parent::__construct( $page );
	}
}
