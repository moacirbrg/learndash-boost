<?php
namespace Learndash_Boost\MOWP_Tools\Options\Components;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class HR extends Component {
	function __construct( $id = null, $classes = [] ) {
		parent::__construct( 'hr', false, $id, $classes );
	}
}
