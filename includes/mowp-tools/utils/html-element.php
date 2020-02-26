<?php
namespace Learndash_Boost\MOWP_Tools\Utils;

use Learndash_Boost\MOWP_Tools\Settings;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class HTML_Element {
	private $theme;
	private $attributes = [];
	private $classes = [];
	private $children = [];
	private $content;
	private $self_closed_tag;
	private $styles = [];
	private $tag_name;

	public function __construct( $tag_name, $self_closed_tag, $id = null, $classes = [] ) {
		$this->content = '';
		$this->tag_name = $tag_name;
		$this->theme = new HTML_Theme();
		$this->self_closed_tag = $self_closed_tag;

		if ( $id !== null ) {
			$this->add_attribute( 'id', $id );
		}

		foreach ( $classes as $class_name ) {
			$this->add_class( $class_name );
		}
	}

	public function add_attribute( $name, $value ) {
		$this->attributes[ $name ] = $value;
	}

	public function add_class( $class_name ) {
		array_push( $this->classes, $class_name );
	}

	public function add_style( $property, $value ) {
		$this->styles[ $property ] = $value;
	}

	public function add_style_bulk( $bulk ) {
		foreach ( $bulk as $property => $value ) {
			$this->add_style( $property, $value );
		}
	}

	public function append_child( $component ) {
		array_push( $this->children, $component );
	}

	public function build_html() {
		if ( $this->self_closed_tag === true ) {
			return $this->build_self_closed_html();
		} else {
			return $this->build_html_non_self_closed();
		}
	}

	public function get_content() {
		return $this->content;
	}

	public function get_theme() {
		return $this->theme;
	}

	public function set_content( $content ) {
		$this->content = $content;
	}

	public function to_px( $measure ) {
		return  $measure . 'px';
	}

	protected function create_id( $id ) {
		return Settings::$ID_PREFIX . $id;
	}

	private function build_html_attributes() {
		$html = '';
		
		foreach ( $this->attributes as $name => $value ) {
			if ( $html !== '' ) {
				$html .= ' ';
			}
			$html .= "$name=\"$value\"";
		}

		return $html;
	}

	private function build_html_classes() {
		$html = '';
		
		foreach ( $this->classes as $class_name ) {
			if ( $html !== '' ) {
				$html .= ' ';
			}
			$html .= $class_name;
		}

		if ( $html !== '' ) {
			return "class=\"${html}\"";
		} else {
			return '';
		}
	}

	private function build_html_non_self_closed() {
		$attributes = $this->build_html_attributes();
		$styles     = $this->build_html_styles();
		$classes    = $this->build_html_classes();
		$html       = "<$this->tag_name $classes $attributes $styles>";
		$html      .= $this->content;

		foreach ( $this->children as $child ) {
			$html .= $child->build_html();
		}

		$html .= "</$this->tag_name>";

		return $html;
	}

	private function build_html_self_closed() {
		$attributes = $this->build_html_attributes();
		$styles = $this->build_html_styles();
		$classes = $this->build_html_classes();
		return "<$this->tag_name $attributes $classes $styles />";
	}

	private function build_html_styles() {
		$html = '';
		
		foreach ( $this->styles as $property => $value ) {
			if ( $html !== '' ) {
				$html .= ';';
			}
			$html .= "$property:$value";
		}

		if ( $html !== '' ) {
			return "style=\"$html\"";
		} else {
			return '';
		}
	}
}
