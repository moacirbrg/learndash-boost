<?php
namespace Learndash_Boost\Core;

use Learndash_Boost\Learndash_Boost_Options;
use Learndash_Boost\MOWP_Tools\Integrations\Woocommerce\Log;
use Learndash_Boost\MOWP_Tools\Utils\Template;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class User {
	public static function create_unique_username_by_fullname( $first_name, $last_name ) {
		$first_name = strtolower($first_name);
		$last_name = strtolower($last_name);
		$username = sanitize_title("${first_name}.${last_name}");

		for ($i = 1; $i < 100; $i++) {
			$username .= "-${i}";
			if ( ! username_exists( $username ) ) {
				return $username;
			}
		}

		return null;
	}

	public static function create_user_if_not_exists( $email, $first_name, $last_name, $product_name ) {
		if ( ! email_exists( $email ) ) {
			$username = self::create_unique_username_by_fullname( $first_name, $last_name );
			if ( $username === null ) {
				return null;
			}
			
			$password = wp_generate_password();
			$user_id = wp_create_user( $username, $password, $email );

			wp_update_user([
				'ID' => $user_id,
				'first_name' => $first_name,
				'last_name' => $last_name,
			]);

			$user = get_user_by( 'ID', $user_id );
			$user->remove_role( 'subscriber' );
			$user->add_role( 'customer' );

			$replacements = array(
				'customer_name' => $first_name,
				'email' => $email,
				'login_url' => get_permalink( get_option('woocommerce_myaccount_page_id') ),
				'password' => htmlspecialchars( $password, ENT_HTML5 ),
				'product_name' => $product_name,
				'username' => $username
			);
			
			$email_message = Template::get_from_string( Learndash_Boost_Options::get_new_customer_email_message(), $replacements );
			$email_subject = Template::get_from_string( Learndash_Boost_Options::get_new_customer_email_subject(), $replacements );
			$email_headers = array( 'Content-Type: text/html; charset=UTF-8' );
			wp_mail( $email, $email_subject, $email_message, $email_headers );

			return $user_id;
		}
		else {
			$user = get_user_by( 'email', $email );
			return $user->ID;
		}
	}
}