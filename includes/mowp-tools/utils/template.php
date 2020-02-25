<?php
namespace Learndash_Boost\MOWP_Tools\Utils;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Template {
	public static $TPL_FOLDER_PATH = '';

	public static function get_from_file( $filename, $replacements = [] ) {
		$template_filepath = self::$TPL_FOLDER_PATH . "/${filename}";

		if ( ! file_exists( $template_filepath ) ) {
			throw new \Exception( "Template $template_filepath not found." );
		}

		$template_content = file_get_contents( $template_filepath );
		return self::get_from_string( $template_content, $replacements );
	}

	public static function get_from_string( $template_content, $replacements = [] ) {
		foreach ( $replacements as $replacement_name => $replacement_value ) {
			$search = '{{' . $replacement_name . '}}';
			$template_content = str_replace( $search, $replacement_value, $template_content );
		}

		return $template_content;
	}
}