<?php
/*
Plugin Name: Vendégkönyv
Description: Alap vendégkönyv, minimális funkciókkal
Version:     20170830
Author:      Hoffmann Ágnes
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: portfolio_guestbook

Vendégkönyv is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Vendégkönyv is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Vendégkönyv. If not, see {URI to Plugin License}.
*/

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**********************
* global variables
**********************/
$prtf_prefix = 'prtf_';
$prtf_plugin_name = 'portfolio-guestbook';

/**********************
* includes
**********************/

include ('includes/scripts.php'); //this contols all JS/CSS
include ('includes/data-processing.php'); //this contols all saving data
include ('includes/functions.php'); //load functions
include ('includes/admin-page.php'); //the plugin admin page
include ('includes/front-form.php'); //the plugin admin page

// run the install scripts upon plugin activation
register_activation_hook(__FILE__,'prtf_plugin_activation');
// function to create the DB / Options / Defaults
function prtf_plugin_activation() {
   	global $wpdb;
  	global $your_db_name;
    $table_name = $wpdb->prefix . 'guestbook';
	// create the database table
	if($wpdb->get_var("show tables like '$table_name'") != $table_name)
	{
		$sql = "CREATE TABLE " . $table_name . " (
		`id` mediumint(9) NOT NULL AUTO_INCREMENT,
		`username` varchar(30) NOT NULL,
		`email` varchar(30) NOT NULL,
		`comment` tinytext NOT NULL,
		UNIQUE KEY id  (id)
		);";

		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);

	}

}

//drop table when plugin deactivated
function prtf_plugin_remove_database() {


	 global $wpdb;
	 $table_name = $wpdb->prefix . 'guestbook';
	 $sql = "DROP TABLE IF EXISTS $table_name;";
	 $wpdb->query($sql);
	 $page = get_page_by_path( 'vendegkonyv' );
   wp_delete_post($page->ID);
}

register_deactivation_hook( __FILE__, 'prtf_plugin_remove_database' );
