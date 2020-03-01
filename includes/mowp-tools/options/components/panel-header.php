<?php
namespace Learndash_Boost\MOWP_Tools\Options\Components;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Panel_Header extends Component {
	public function __construct( $title = null, $subtitle = null ) {
		parent::__construct( 'div', false, null, [ 'panel-header' ] );

		$children = $this->create_children_components( $title, $subtitle );

		foreach ( $children as $child ) {
			$this->append_child( $child );
		}
	}

	private function create_children_components( $title, $subtitle ) {
		$children = [];
		
		if ( isset( $title ) ) {
			array_push( $children, new Heading( 2, $title ) );
		}

		if ( isset( $subtitle ) ) {
			array_push( $children, new Paragraph( $subtitle ) );
		}

		return $children;
	}
}
