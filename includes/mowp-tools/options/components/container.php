<?php
namespace Learndash_Boost\MOWP_Tools\Options\Components;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Container extends Component {
	public function __construct( $id = null, $classes = [ 'container' ] ) {
		parent::__construct( 'div', false, $id, $classes );

		$this->add_style_bulk( [
			'margin-left' => $this->to_px( $this->get_theme()->layout_page_padding_px ),
			'width' =>  sprintf( 'calc(100%% - %s)', $this->to_px( $this->get_theme()->layout_page_padding_px * 3 ) ),
		] );
	}
}
