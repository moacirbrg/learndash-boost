<?php
namespace Learndash_Boost;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Learndash_Boost_Utils {
	public static function add_option( $option_name, $value ) {
		return add_option( LEARNDASH_BOOST_NS . '-' . $option_name, $value );
	}

	public static function get_option( $option_name ) {
		return get_option( LEARNDASH_BOOST_NS . '-' . $option_name );
	}

	public static function delete_option( $option_name ) {
		return delete_option( LEARNDASH_BOOST_NS . '-' . $option_name );
	}

	public static function update_option( $option_name, $value ) {
		return update_option( LEARNDASH_BOOST_NS . '-' . $option_name, $value );
	}
}
