<?php
namespace Learndash_Boost\MOWP_Tools\Options;

use Learndash_Boost\MOWP_Tools\Options\Pages\Page;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Menu {
	private $capability;
	private $page;
	private $slug;
	private $title;

	public function __construct( $title, $slug, Page $page ) {
		$this->capability = 'manage_options';
		$this->page = $page;
		$this->slug = $slug;
		$this->title = $title;
	}

	public function init() {
		add_action( 'admin_menu', array( $this, 'build_menu' ) );
	}

	public function build_menu() {
		add_menu_page(
			$this->title,
			$this->title,
			$this->capability,
			$this->slug,
			array( $this, 'output_page' ),
			'',
			3
		);
	}

	public function output_page() {
		echo $this->page->build_html();
	}
}
