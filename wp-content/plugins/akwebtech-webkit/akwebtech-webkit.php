<?php
/*
Plugin Name: Alaska Web Technologies - Web Kit
Plugin URI: http://webkit.akwebtech.com/features.php
Description: Web Kit and Toolbox for Wordpress and WP Properties
Version: 1.0
Author: Daniel Brown
Author URI: http://akwebtech.com
*/
session_start();
ini_set('memory_limit','256m');

include_once('classes.php');
include_once("rentalAppTable.php");

class akwebkit {
	
	var $webkit;
	
	function __construct(){
		$this->webkit = new webkit();
		}
	
	function init() {
		if(is_admin()) add_action('admin_menu', array(&$this, 'add_menu_items'));
		}
		

	function add_menu_items () {
		$pageTitle = "Alaska Web Technologies ";
		add_menu_page('AKWT Web Kit', 'AKWT Web Kit', 'manage_options', 'akwebkit' , array(&$this->webkit, 'howtosPage'), WP_PLUGIN_URL.'/akwebtech-webkit/images/icon.png', 45);
		add_submenu_page('akwebkit', $pageTitle.'How To Files', 'How To Files', 'manage_options', 'akwebkit', array(&$this->webkit, 'howtosPage'));
		add_submenu_page('akwebkit', $pageTitle.'Showcase Listings', 'Showcase Listings', 'manage_options', 'showcase', array(&$this->webkit,'showCaseListings'));
		add_submenu_page('akwebkit', $pageTitle.'AKWT eFlyers', 'AKWT eFlyers', 'manage_options', 'eflyer', array(&$this->webkit,'showEFlyer'));
		add_submenu_page('akwebkit', $pageTitle.'Rental Applications', 'Rental Applications', 'manage_options', 'charges', array(&$this->webkit,'showCharges'));
		add_submenu_page('akwebkit', $pageTitle.'Settings', 'Settings', 'manage_options', 'setting', array(&$this->webkit,'showSettings'));
		add_submenu_page('akwebkit', $pageTitle.'Property Queries', 'Property Queries', 'manage_options', 'propqueries', array(&$this->webkit,'showPropQueries'));
		add_submenu_page('akwebkit', $pageTitle.'Test Page', 'Test Page', 'manage_options', 'akwebtest', array(&$this->webkit,'akwebtest'));
		}
	}

global $akts;
$akts = new akwebkit();

add_action('init', array(&$akts,'init'));


function removeUpdateNag(){
	remove_action( 'admin_notices', 'update_nag', 3 );
	}
add_action( 'admin_init', 'removeUpdateNag' );

?>