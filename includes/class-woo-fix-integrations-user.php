<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Woo_Fix_Integrations_User {
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

        Woo_Fix_Integrations_Log::error( $e );
        return null;
    }

    public static function create_user_if_not_exists( $email, $first_name, $last_name ) {
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

            $email_template_replacements = array(
                'first_name' => $first_name,
                'url' => get_permalink( get_option('woocommerce_myaccount_page_id') ),
                'email' => $email,
                'username' => $username,
                'password' => htmlspecialchars( $password, ENT_HTML5 ),
                'site_name' => get_bloginfo( 'name' )
            );
            $email_message = Woo_Fix_Integrations_Template::get( 'email-new-user.html', $email_template_replacements );
            $email_headers = array( 'Content-Type: text/html; charset=UTF-8' );
            wp_mail( $email, 'Sua conta foi criada', $email_message, $email_headers );

            return $user_id;
        }
        else {
            $user = get_user_by( 'email', $email );
            return $user->ID;
        }
    }
}