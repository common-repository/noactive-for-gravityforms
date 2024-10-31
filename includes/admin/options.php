<?php
/*
 * WPGear. 
 * No Active for GravityForms
 * options.php
 */
	
	$NoActiveGF_Options = NoActiveGF_Get_Options();
	
	$NoActiveGF_Option_Setup_AdminOnly 	= (isset($NoActiveGF_Options['adminonly'])) ? intval($NoActiveGF_Options['adminonly']) : 1;
	$NoActiveGF_Option_Setup_MsgDefault = $NoActiveGF_Options['msg_default'];
	
	if ($NoActiveGF_Option_Setup_AdminOnly) {
		if (!current_user_can('edit_dashboard')) {
			?>
			<div class="noactivegf_options_warning">
				Sorry, you are not allowed to view this page.
			</div>
			<?php
			
			return;
		}		
	}
	
	$NoActiveGF_Action = isset($_REQUEST['action']) ? sanitize_text_field ($_REQUEST['action']) : null; 
	
	if ($NoActiveGF_Action == 'update') {
		// Save Options.
		$NoActiveGF_Option_Setup_AdminOnly 	= (isset($_REQUEST['noactivegf_option_adminonly'])) ? 1 : 0;
		$NoActiveGF_Option_Setup_MsgDefault = (isset($_REQUEST['noactivegf_option_msg_default'])) ? sanitize_text_field($_REQUEST['noactivegf_option_msg_default']) : '';
		
		$NoActiveGF_Options = array(
			'adminonly' => $NoActiveGF_Option_Setup_AdminOnly,	
			'msg_default' => $NoActiveGF_Option_Setup_MsgDefault,	
		);	
		
		update_option ('noactivegf_options', $NoActiveGF_Options);		
	}		

	?>
	<div class="wrap">
		<h2>No Active for GravityForms.</h2>
		<hr>
		
		<div style="margin-left: 20px;">			
			<form name="form_NoActiveGF_Options" method="post" style="margin-top: 20px;">
				<div style="margin-top: 10px;">
					<label for="noactivegf_option_adminonly" title="On/Off">
						Enable this Page for Admin only
					</label>
					<input id="noactivegf_option_adminonly" name="noactivegf_option_adminonly" type="checkbox" <?php if($NoActiveGF_Option_Setup_AdminOnly) {echo 'checked';} ?>>
				</div>	
				
				<div style="margin-top: 10px;">
					<label for="noactivegf_option_msg_default" title="Default Message for all Gforms.">
						Default Message for all Gforms
					</label>
					<input id="noactivegf_option_msg_default" name="noactivegf_option_msg_default" type="text" style="width: calc(100% - 194px);" value="<?php echo $NoActiveGF_Option_Setup_MsgDefault; ?>">
				</div>				


				<div style="margin-top: 10px; margin-bottom: 5px; text-align: right;">
					<input id="noactivegf_btn_options_save" type="submit" class="button button-primary" style="margin-right: 5px;" value="Save">
				</div>
				<input id="action" name="action" type="hidden" value="update">			
			</form>
		</div>			
	</div>
