<?php
namespace Learndash_Boost\MOWP_Tools\Options\Pages;

use Learndash_Boost\MOWP_Tools\Options\Components\Page_Header;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Simple_Page extends Page {
	public function __construct( $title ) {
		parent::__construct( 'div', false, null, ['page'] );

		$children = $this->create_children_components( $title );

		foreach ( $children as $child ) {
			$this->append_child( $child );
		}
	}

	private function create_children_components( $title ) {
		$children = [];

		$page_title = new Page_Header( $title );
		array_push( $children, $page_title );

		return $children;
	}
}
