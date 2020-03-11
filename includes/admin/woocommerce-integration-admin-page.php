<?php
namespace Learndash_Boost\Admin;

use Learndash_Boost\Learndash_Boost_Options;
use Learndash_Boost\MOWP_Tools\Options\Pages\Page;
use Learndash_Boost\MOWP_Tools\Options\Components\Field;
use Learndash_Boost\MOWP_Tools\Options\Components\Field_Textarea;
use Learndash_Boost\MOWP_Tools\Options\Components\Input;
use Learndash_Boost\MOWP_Tools\Options\Components\Panel;
use Learndash_Boost\MOWP_Tools\Options\Components\Panel_Container;
use Learndash_Boost\MOWP_Tools\Options\Components\Panel_Footer_Submit;
use Learndash_Boost\MOWP_Tools\Options\Components\Panel_Ribbon;
use Learndash_Boost\MOWP_Tools\Options\Pages\Simple_Page;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Woocommerce_Integration_Admin_Page extends Admin_Page {
	public function __construct() {
		if ( isset( $_POST[ 'message' ] ) && isset( $_POST[ 'subject' ] ) ) {
			$this->process_form( $_POST[ 'message' ], $_POST[ 'subject' ] );
		}

		$title = __( 'WooCommerce Integration', LEARNDASH_BOOST_NS );
		$page = new Simple_Page( $title, Page::$PAGE_WIDTH_800 );
		
		$new_customer_title = __( 'New Customers', LEARNDASH_BOOST_NS );
		$new_customer_subtitle = __( 'When an user is created via a new purchase, the following settings will be applied.', LEARNDASH_BOOST_NS );
		$new_customer_panel = new Panel( $new_customer_title, $new_customer_subtitle );
		$page->append_page_child( $new_customer_panel );

		$new_customer_panel->activate_form();
		$new_customer_panel->append_child( new Panel_Ribbon( __( 'A welcome e-mail will be sent', LEARNDASH_BOOST_NS ) ) );

		$new_customer_panel_container = new Panel_Container();
		$new_customer_panel->append_child( $new_customer_panel_container );

		$email_subject_field = new Field( 'subject', __( 'Email subject', LEARNDASH_BOOST_NS ), Input::$TYPE_TEXT );
		$email_subject_field->set_value( Learndash_Boost_Options::get_new_customer_email_subject() );
		$new_customer_panel_container->append_child( $email_subject_field );

		$email_message_field = new Field_Textarea( 'message', __( 'Email message', LEARNDASH_BOOST_NS ), 5 );
		$email_message_field->set_value( Learndash_Boost_Options::get_new_customer_email_message() );
		$new_customer_panel_container->append_child( $email_message_field );

		$new_customer_panel->append_child( new Panel_Footer_Submit( __( 'Save changes', LEARNDASH_BOOST_NS ) ) );

		parent::__construct( $page );
	}

	private function process_form( $email_message, $email_subject ) {
		Learndash_Boost_Options::update_new_customer_email_message( stripslashes( $email_message ) );
		Learndash_Boost_Options::update_new_customer_email_subject( stripslashes( $email_subject ) );
	}
}
