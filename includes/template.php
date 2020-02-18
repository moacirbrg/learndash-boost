<?php
namespace WooFixIntegrations;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Template {
    public static function get( $filename, $replacements = [] ) {
        $template_filepath = dirname( WOO_FIX_INTEGRATIONS_FILE ) . "/templates/${filename}";
        $template_content = file_get_contents( $template_filepath );

        foreach ( $replacements as $replacement_name => $replacement_value ) {
            $search = '{{' . $replacement_name . '}}';
            $template_content = str_replace( $search, $replacement_value, $template_content );
        }

        return $template_content;
    }
}