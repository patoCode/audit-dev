<?php
$this->set_css($this->default_theme_path.'/gc_theme/css/flexigrid.css');
$this->set_js_lib($this->default_theme_path.'/gc_theme/js/jquery.form.js');
$this->set_js_lib($this->default_javascript_path.'/jquery_plugins/jquery.form.min.js');
$this->set_js_config($this->default_theme_path.'/gc_theme/js/flexigrid-add.js');

$this->set_js_lib($this->default_javascript_path.'/jquery_plugins/jquery.noty.js');
$this->set_js_lib($this->default_javascript_path.'/jquery_plugins/config/jquery.noty.config.js');
?>
<div class="row">
	<div class="card " style='width: 100%;' data-unique-hash="<?php echo $unique_hash; ?>">
		<div class="card-header">
			<?php echo $this->l('form_add'); ?> <?php echo $subject?>
		</div>
	<div id='main-table-box' class="card-body">
		<?php echo form_open( $insert_url, 'class="form" method="post" id="crudForm"  enctype="multipart/form-data"'); ?>
			<div class='form-div'>
				<?php
				$counter = 0;
					foreach($fields as $field)
					{
						$even_odd = $counter % 2 == 0 ? 'odd' : 'even';
						$counter++;
				?>
				<div class='form-field-box ' id="<?php echo $field->field_name; ?>_field_box">
					<div class='form-display-as-box' id="<?php echo $field->field_name; ?>_display_as_box">
						<?php echo $input_fields[$field->field_name]->display_as; ?><?php echo ($input_fields[$field->field_name]->required)? "<span class='required'>*</span> " : ""; ?> :
					</div>
					<div class='form-input-box' id="<?php echo $field->field_name; ?>_input_box">
						<?php echo $input_fields[$field->field_name]->input?>
					</div>
				</div>
				<?php }?>
				<!-- Start of hidden inputs -->
					<?php
						foreach($hidden_fields as $hidden_field){
							echo $hidden_field->input;
						}
					?>
				<!-- End of hidden inputs -->
				<?php if ($is_ajax) { ?><input type="hidden" name="is_ajax" value="true" /><?php }?>

				<div id='report-error' class='report-div error alert alert-danger my-2'></div>
				<div id='report-success' class='report-div success alert alert-success my-2'></div>
			</div>
			<div class="btn-group my-3">
				<input id="form-button-save" type='submit' value='<?php echo $this->l('form_save'); ?>'  class="btn btn-sm btn-success"/>
			<?php 	if(!$this->unset_back_to_list) { ?>
				<input type='button' value='<?php echo $this->l('form_save_and_go_back'); ?>' id="save-and-go-back-button"  class="btn btn-sm btn-primary"/>
				<input type='button' value='<?php echo $this->l('form_cancel'); ?>' class="btn btn-sm btn-secondary" id="cancel-button" />
			<?php 	} ?>
			</div>
			<div class='small-loading' id='FormLoading'><?php echo $this->l('form_insert_loading'); ?></div>
			<?php echo form_close(); ?>
	</div>
	</div>
</div>
<script>
	var validation_url = '<?php echo $validation_url?>';
	var list_url = '<?php echo $list_url?>';

	var message_alert_add_form = "<?php echo $this->l('alert_add_form')?>";
	var message_insert_error = "<?php echo $this->l('insert_error')?>";
</script>