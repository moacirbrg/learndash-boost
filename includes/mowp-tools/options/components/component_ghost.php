<?php
namespace Learndash_Boost\MOWP_Tools\Options\Components;

use Learndash_Boost\MOWP_Tools\Utils\HTML_Element;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Component_Ghost extends HTML_Element {
	public function __construct() {
		parent::__construct( null, false, null, [] );
	}
}
