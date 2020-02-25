<?php
namespace Learndash_Boost\MOWP_Tools\Integrations\Woocommerce;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Log {
	public static $source = 'learndash-boost';

	public static function debug( $message ) {
		$logger = wc_get_logger();
		$logger->debug( $message, array( 'source' => self::$source ) );
	}

	public static function error( $message ) {
		$logger = wc_get_logger();
		$logger->error( $message, array( 'source' => self::$source ) );
	}
}