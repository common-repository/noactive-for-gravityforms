<?php
/*
Plugin Name: No Active for GravityForms
Plugin URI: wpgear.xyz/noactive-for-gravityforms
Description: Displays a Message that the Form is not Active, instead of a blank page. Read about <a href="http://wpgear.xyz/noactive-for-gravityforms-pro/">PRO Version</a> for Separate Messages & Control for each Forms.
Version: 1.1
Author: WPGear
Author URI: http://wpgear.xyz
License: GPLv2
*/

	$NoActiveGF_plugin_url = plugin_dir_url( __FILE__);		// со слэшем на конце
	$NoActiveGF_plugin_dir = plugin_dir_path( __FILE__);	// со слэшем на конце
	
	include_once(__DIR__ .'/includes/functions.php');
	include_once(__DIR__ .'/includes/admin/admin.php');

	/* ShortCode [gravityform] filter.
	----------------------------------------------------------------- */		
	function NoActiveGF_shortcode_gform_noactive ($shortcode_string, $attributes, $content) {
		$NoActiveGF_Options = NoActiveGF_Get_Options();
		
		$NoActiveGF_Option_Setup_MsgDefault = $NoActiveGF_Options['msg_default'];
		
		$Form_ID = $attributes['id'];

		$Form = GFAPI::get_form( $Form_ID );
		
		$Form_Active = $Form['is_active'];
		
		if (! $Form_Active) {
			$shortcode_string = "<div class='noactivegf_warning'>$NoActiveGF_Option_Setup_MsgDefault</div>";
		}
		
		return $shortcode_string;
	}
	add_filter ('gform_shortcode_form', 'NoActiveGF_shortcode_gform_noactive', 10, 3);