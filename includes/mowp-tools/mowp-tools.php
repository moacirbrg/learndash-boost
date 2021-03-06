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
		include_once dirname( __FILE__ ) . '/utils/security.php';
		include_once dirname( __FILE__ ) . '/utils/template.php';
		include_once dirname( __FILE__ ) . '/integrations/woocommerce/log.php';
		
		if ( is_admin() ) {
			include_once dirname( __FILE__ ) . '/options/components/component.php';
			include_once dirname( __FILE__ ) . '/options/components/component_generic.php';
			include_once dirname( __FILE__ ) . '/options/components/component_ghost.php';
			include_once dirname( __FILE__ ) . '/options/components/button.php';
			include_once dirname( __FILE__ ) . '/options/components/container.php';
			include_once dirname( __FILE__ ) . '/options/components/input.php';
			include_once dirname( __FILE__ ) . '/options/components/textarea.php';
			include_once dirname( __FILE__ ) . '/options/components/label.php';
			include_once dirname( __FILE__ ) . '/options/components/field.php';
			include_once dirname( __FILE__ ) . '/options/components/field-textarea.php';
			include_once dirname( __FILE__ ) . '/options/components/heading.php';
			include_once dirname( __FILE__ ) . '/options/components/hr.php';
			include_once dirname( __FILE__ ) . '/options/components/page-header.php';
			include_once dirname( __FILE__ ) . '/options/components/page-title.php';
			include_once dirname( __FILE__ ) . '/options/components/panel.php';
			include_once dirname( __FILE__ ) . '/options/components/panel-container.php';
			include_once dirname( __FILE__ ) . '/options/components/panel-header.php';
			include_once dirname( __FILE__ ) . '/options/components/panel-footer.php';
			include_once dirname( __FILE__ ) . '/options/components/panel-footer-submit.php';
			include_once dirname( __FILE__ ) . '/options/components/panel-ribbon.php';
			include_once dirname( __FILE__ ) . '/options/components/paragraph.php';
			include_once dirname( __FILE__ ) . '/options/pages/page.php';
			include_once dirname( __FILE__ ) . '/options/pages/simple-page.php';
			include_once dirname( __FILE__ ) . '/options/menu.php';
		}
	}
}
