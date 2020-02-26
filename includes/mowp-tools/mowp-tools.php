<?php
namespace Learndash_Boost\MOWP_Tools;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class MOWP_Tools {
	public static function init() {
		include_once dirname( __FILE__ ) . '/settings.php';
		include_once dirname( __FILE__ ) . '/utils/html-element.php';
		include_once dirname( __FILE__ ) . '/utils/html-theme.php';
		include_once dirname( __FILE__ ) . '/utils/template.php';
		include_once dirname( __FILE__ ) . '/integrations/woocommerce/log.php';
		
		if ( is_admin() ) {
			include_once dirname( __FILE__ ) . '/options/components/component.php';
			include_once dirname( __FILE__ ) . '/options/components/hr.php';
			include_once dirname( __FILE__ ) . '/options/components/page-header.php';
			include_once dirname( __FILE__ ) . '/options/components/page-title.php';
			include_once dirname( __FILE__ ) . '/options/pages/simple-page.php';
		}
	}
}