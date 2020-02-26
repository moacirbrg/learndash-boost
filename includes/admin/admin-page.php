<?php
namespace Learndash_Boost\Admin;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Admin_Page {
	private $page;

	public function __construct( $page ) {
		$this->page = $page;
	}

	public function get_page() {
		return $this->page;
	}
}
