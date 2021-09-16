<?php
	$this->set_css($this->default_theme_path.'/gc_theme/css/flexigrid.css');
	$this->set_js_lib($this->default_javascript_path.'/'.grocery_CRUD::JQUERY);

	if ($dialog_forms) {
        $this->set_js_lib($this->default_javascript_path.'/jquery_plugins/jquery.noty.js');
        $this->set_js_lib($this->default_javascript_path.'/jquery_plugins/config/jquery.noty.config.js');
        $this->set_js_lib($this->default_javascript_path.'/common/lazyload-min.js');
    }

    $this->set_js_lib($this->default_javascript_path.'/common/list.js');

	$this->set_js($this->default_theme_path.'/gc_theme/js/cookies.js');
	$this->set_js($this->default_theme_path.'/gc_theme/js/flexigrid.js');

    $this->set_js($this->default_javascript_path.'/jquery_plugins/jquery.form.min.js');

	$this->set_js($this->default_javascript_path.'/jquery_plugins/jquery.numeric.min.js');
	$this->set_js($this->default_theme_path.'/gc_theme/js/jquery.printElement.min.js');

	/** Jquery UI */
	$this->load_js_jqueryui();

?>
<script type='text/javascript'>
	var base_url = '<?php echo base_url();?>';

	var subject = '<?php echo addslashes($subject); ?>';
	var ajax_list_info_url = '<?php echo $ajax_list_info_url; ?>';
	var unique_hash = '<?php echo $unique_hash; ?>';
	var export_url = '<?php echo $export_url; ?>';

	var message_alert_delete = "<?php echo $this->l('alert_delete'); ?>";

</script>
<div id='list-report-error' class='report-div error card card-light-danger'></div>
<div id='list-report-success' class='report-div success report-list card card-tale' <?php if($success_message !== null){?>style="display:block"<?php }?>><?php
if($success_message !== null){?>
	<p><?php echo $success_message; ?></p>
<?php }
?></div>
<div class="row flexigrid" data-unique-hash="<?php echo $unique_hash; ?>">
	<div id="hidden-operations" class="hidden-operations"></div>
	<!-- main-table-box -->
	<div id='main-table-box' class="main-table-box col-md-12">
		<?php if(!$unset_add || !$unset_export || !$unset_print){?>
			<?php if(!$unset_add){?>
	        	<a href='<?php echo $add_url?>' class='add btn btn-success btn-rounded btn-icon-text'>
	        		<i class="ti-plus btn-icon-prepend"></i> Nuevo
	            </a>
			<?php }?>
			<?php if(!$unset_export) { ?>
		    	<a class="export-anchor btn btn-primary btn-rounded btn-icon-text" href="<?php echo $export_url; ?>" download>
		    		<i class="ti-write"></i>
					<span class="export"><?php echo $this->l('list_export');?></span>
		        </a>
			<?php } ?>
			<?php if(!$unset_print) { ?>
		    	<a class="print-anchor btn btn-primary btn-rounded btn-icon-text" data-url="<?php echo $print_url; ?>">
		    		<i class="ti-printer"></i>
					<span class="print"><?php echo $this->l('list_print');?></span>
				</a>
			<?php }?>
	<?php }?>
	</div>
	<!-- main-table-box -->

	<div id='ajax_list' class="ajax_list my-3 col-md-12">
		<?php echo $list_view?>
	</div>

	<?php echo form_open( $ajax_list_url, 'method="post" id="filtering_form" class="filtering_form form my-2 col-md-12" autocomplete = "off" data-ajax-list-info-url="'.$ajax_list_info_url.'"'); ?>
	<div class="sDiv quickSearchBox my-3" id='quickSearchBox'>
		<div class="form-group row p-3">
			<input type="text" class="qsbsearch_fieldox search_text form-control col-md-4" name="search_text" size="30" id='search_text' placeholder="<?php echo $this->l('list_search');?>">
			<div class="col-md-4">
				<select name="search_field" id="search_field" class="form-control">
					<option value=""><?php echo $this->l('list_search_all');?></option>
					<?php foreach($columns as $column){?>
					<option value="<?php echo $column->field_name?>"><?php echo $column->display_as?></option>
					<?php }?>
				</select>
			</div>
			<div class="col-md-2">
				<div class="btn-group">
		            <input type="button" value="<?php echo $this->l('list_search');?>" class="crud_search btn btn-primary btn-icon-text" id='crud_search'>
	        		<input type="button" value="<?php echo $this->l('list_clear_filtering');?>" id='search_clear' class="search_clear btn btn-danger btn-icon-text">
				</div>
        	</div>
		</div>
	</div>
	<!-- paginador -->
	<div class="pDiv row my-2">
			<?php list($show_lang_string, $entries_lang_string) = explode('{paging}', $this->l('list_show_entries')); ?>
			<div class="form group-row">
				<div class="col-md-3">
					<?php echo $show_lang_string; ?>
					<select name="per_page" id='per_page' class="per_page form-control-sm">
						<?php foreach($paging_options as $option){?>
							<option value="<?php echo $option; ?>" <?php if($option == $default_per_page){?>selected="selected"<?php }?>><?php echo $option; ?>&nbsp;&nbsp;</option>
						<?php }?>
					</select>
					<?php echo $entries_lang_string; ?>
					<input type='hidden' name='order_by[0]' id='hidden-sorting' class='hidden-sorting' value='<?php if(!empty($order_by[0])){?><?php echo $order_by[0]?><?php }?>' />
					<input type='hidden' name='order_by[1]' id='hidden-ordering' class='hidden-ordering'  value='<?php if(!empty($order_by[1])){?><?php echo $order_by[1]?><?php }?>'/>
				</div>
				<div class="btn-group">
					<button class="pFirst pButton first-button btn btn-primary">
						<i class="ti-angle-double-left"></i>
					</button>
					<button class="pPrev pButton prev-button btn btn-primary">
						<i class="ti-angle-left"></i>
					</button>

					<span class="pcontrol"><?php echo $this->l('list_page'); ?> <input name='page' type="text" value="1" size="4" id='crud_page' class="crud_page">
				<?php echo $this->l('list_paging_of'); ?>
				<span id='last-page-number' class="last-page-number"><?php echo ceil($total_results / $default_per_page)?></span></span>
					<button class="pNext pButton next-button btn btn-primary" >
						<i class="ti-angle-right"></i>
					</button>
					<button class="pLast pButton last-button  btn btn-primary">
						<i class="ti-angle-double-right"></i>
					</button>
					<button class="pReload pButton ajax_refresh_and_loading btn btn-success" id='ajax_refresh_and_loading'>
						<i class="ti-reload"></i>
					</button>
				</div>
				<div>
					<span class="pPageStat">
						<?php
							$paging_starts_from = "<span id='page-starts-from' class='page-starts-from'>1</span>";
							$paging_ends_to = "<span id='page-ends-to' class='page-ends-to'>". ($total_results < $default_per_page ? $total_results : $default_per_page) ."</span>";
							$paging_total_results = "<span id='total_items' class='total_items'>$total_results</span>";
							echo str_replace( array('{start}','{end}','{results}'),
											  array($paging_starts_from, $paging_ends_to, $paging_total_results),
											$this->l('list_displaying')
										   );
						?>
					</span>
				</div>
			</div>
		</div>
	</div>
	<?php echo form_close(); ?>
	</div>
</div>
