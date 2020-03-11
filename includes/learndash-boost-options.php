<?php
namespace Learndash_Boost;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Learndash_Boost_Options {
	public static function get_new_customer_email_message() {
		return Learndash_Boost_Utils::get_option( 'new-customer-email-message' );
	}
	
	public static function get_new_customer_email_subject() {
		return Learndash_Boost_Utils::get_option( 'new-customer-email-subject' );
	}

	public static function on_activate() {
		if ( false === self::get_new_customer_email_subject() ) {
			$subject = __( '{{customer_name}}, your credentials to access {{product_name}}', LEARNDASH_BOOST_NS );
			Learndash_Boost_Utils::add_option( 'new-customer-email-subject', $subject );
		}

		if ( false === self::get_new_customer_email_message() ) {
			$message  = sprintf( '<p>%s</p>%s', __( 'Thank you for your subscrition to {{product_name}}!', LEARNDASH_BOOST_NS ), PHP_EOL );
			$message .= sprintf( '<p>%s</p>%s', __( 'It is everything ready for you access to your new training.', LEARNDASH_BOOST_NS ), PHP_EOL );
			$message .= sprintf( '<p>%s', PHP_EOL );
			$message .= sprintf( '  %s<br/>%s', __( 'You can access the content using the following credentials:', LEARNDASH_BOOST_NS ), PHP_EOL );
			$message .= sprintf( '  <strong>%s</strong> <a href="{{login_url}}">{{login_url}}</a><br/>%s', __( 'Access link:', LEARNDASH_BOOST_NS ), PHP_EOL );
			$message .= sprintf( '  <strong>%s</strong> {{username}}<br/>%s', __( 'Login:', LEARNDASH_BOOST_NS ), PHP_EOL );
			$message .= sprintf( '  <strong>%s</strong> {{password}}<br/>%s', __( 'Password:', LEARNDASH_BOOST_NS ), PHP_EOL );
			$message .= sprintf( '</p>%s', PHP_EOL );
			$message .= sprintf( '<p>%s</p>%s', __( 'Enjoy your training!', LEARNDASH_BOOST_NS ), PHP_EOL );
			$message .= sprintf( '<p>%s', PHP_EOL );
			$message .= sprintf( '  %s<br/>%s', __( 'Thank you so much,', LEARNDASH_BOOST_NS ), PHP_EOL );
			$message .= sprintf( '  %s%s', __( 'Your name', LEARNDASH_BOOST_NS ), PHP_EOL );
			$message .= sprintf( '</p>' );
			Learndash_Boost_Utils::add_option( 'new-customer-email-message', $message );
		}
	}

	public static function on_deactivate() {
		Learndash_Boost_Utils::delete_option( 'new-customer-email-subject' );
		Learndash_Boost_Utils::delete_option( 'new-customer-email-message' );
	}

	public static function update_new_customer_email_message( $value ) {
		Learndash_Boost_Utils::update_option( 'new-customer-email-message', $value );
	}

	public static function update_new_customer_email_subject( $value ) {
		Learndash_Boost_Utils::update_option( 'new-customer-email-subject', $value );
	}
}
