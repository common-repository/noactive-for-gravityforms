<?php
/*
 * WPGear.
 * No Active for GravityForms
 * uninstall.php
 */

	// if uninstall.php is not called by WordPress, die
	if (!defined('WP_UNINSTALL_PLUGIN')) {
		die;
	}

	if (!function_exists ('NoActiveGF_Check_Plugin_Installed')) {
		include_once(__DIR__ .'/includes/functions.php');
	}	
	
	if (NoActiveGF_Check_Plugin_Installed ('noactive-for-gravityforms-pro')) {
		// Нельзя удалять некоторые Общие Настройки, т.к. имеется Плагин "No Active for GravityForms PRO"
	} else {	
		// Remove Plugin Options
		delete_option('noactivegf_options');
	}	