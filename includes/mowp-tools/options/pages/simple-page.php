<?php
namespace Learndash_Boost\MOWP_Tools\Options\Pages;

use Learndash_Boost\MOWP_Tools\Options\Components\Page_Title;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Simple_Page {
	public function build_html() {
		$page_title = new Page_Title( 'My first title' );
		return $page_title->build_html();
	}
}