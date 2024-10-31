<?php
/*
 * WPGear. 
 * No Active for GravityForms
 * functions.php
 */

	/* Get Options
	----------------------------------------------------------------- */
	function NoActiveGF_Get_Options () {
		$Options = get_option("noactivegf_options", array(
			'adminonly' => 1,
			'msg_default' => 'Form not Active!',
			)
		);		

		return $Options;
	}
	
	/* Check Plugin Installed
	----------------------------------------------------------------- */		
	function NoActiveGF_Check_Plugin_Installed ($Plugin_Slug = null) {
		$Result = false;
		
		if ($Plugin_Slug) {
			if (! function_exists ('get_plugins')) {
				require_once ABSPATH .'wp-admin/includes/plugin.php';
			}
			
			$Plugins = get_plugins();
			
			foreach ($Plugins as $Plugin) {
				$Plugin_TextDomain = $Plugin['TextDomain'];
				if ($Plugin_TextDomain == $Plugin_Slug) {
					$Result = true;
				}
			}			
		}	
		
		return $Result;
	}	