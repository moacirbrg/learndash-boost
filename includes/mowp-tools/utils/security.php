<?php
namespace Learndash_Boost\MOWP_Tools\Utils;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Security {
	public static function create_guid() {
		return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
	}
}
