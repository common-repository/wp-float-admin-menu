<?php
/*
Plugin Name: WP Float Admin Menu
Plugin URI:  http://wordpress.org/extend/plugins/wp-float-admin-menu
Description: Re-positions your wordpress admin menu from the side to the top. Have a less cluttered admin area for you or your clients to use
Author: Ola Apata
Version: 2.0.1
Author URI: http://profiles.wordpress.org/rockaja
License: GPLv2 or later
*/

if ( preg_match( '#' . basename( __FILE__ ) . '#', $_SERVER['PHP_SELF'] ) ) {
	die( 'You are not allowed to call this page directly.' );
}
    
require_once ('src/wp-float-admin-menu.php');
new wp_float_admin_menu();