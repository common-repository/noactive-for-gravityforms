<?php
/*
 * WPGear. 
 * No Active for GravityForms
 * admin.php
 */
	
	/* Create Admin-Menu
	----------------------------------------------------------------- */
	function NoActiveGF_create_menu() {
		global $NoActiveGF_plugin_dir;
		
		// Setup Page
		add_options_page(
			'No Active for GForms',
			'No Active for GForms',
			'publish_posts',
			$NoActiveGF_plugin_dir .'includes/admin/options.php',
			''
		);		
	}
	add_action('admin_menu', 'NoActiveGF_create_menu');
	
	/* Admin Console - Styles.
	----------------------------------------------------------------- */	
	function NoActiveGF_admin_style ($hook) {
		global $NoActiveGF_plugin_url;
		
		$screen = get_current_screen();
		$screen_base = $screen->base;			
	
		if ($screen_base == 'noactive-for-gravityforms/includes/admin/options') {
			wp_enqueue_style ('noactivegf_admin', $NoActiveGF_plugin_url .'includes/admin/style.css');
		}
	}
	add_action ('admin_enqueue_scripts', 'NoActiveGF_admin_style' );	