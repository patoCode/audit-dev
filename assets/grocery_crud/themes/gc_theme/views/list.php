<?php
	$column_width = (int)(80/count($columns));
	if(!empty($list)){
?>
		<table class="table table-bordered table-hover" id="flex1">
		<thead class="thead-dark">
			<tr>

				<?php if(!$unset_delete || !$unset_edit || !$unset_read || !$unset_clone || !empty($actions)){?>
				<th align="left" abbr="tools" axis="col1" class="" width='20%'>
					<div class="text-right">
						<?php echo $this->l('list_actions'); ?>
					</div>
				</th>
				<?php }?>
				<?php foreach($columns as $column){?>
				<th width='<?php echo $column_width?>%'>
					<div class="text-left field-sorting <?php if(isset($order_by[0]) &&  $column->field_name == $order_by[0]){?><?php echo $order_by[1]?><?php }?>"
						rel='<?php echo $column->field_name?>'>
						<?php echo $column->display_as?>
					</div>
				</th>
				<?php }?>
			</tr>
		</thead>
		<tbody>
		<?php foreach($list as $num_row => $row){ ?>
		<tr  <?php if($num_row % 2 == 1){?>class="erow"<?php }?>>
			<?php if(!$unset_delete || !$unset_edit || !$unset_read || !empty($actions)){?>
			<td width='20%'>
					<?php if(!$unset_delete){?>
                    	<a href='<?php echo $row->delete_url?>' title='<?php echo $this->l('list_delete')?> <?php echo $subject?>' class="delete-row btn btn-danger" >
                    			<i class="ti-eraser"></i>
                    	</a>
                    <?php }?>
                    <?php if(!$unset_edit){?>
						<a href='<?php echo $row->edit_url?>' class="edit_button btn btn-dark">
							<i class="ti-pencil"></i>
						</a>
					<?php }?>
                    <!-- <?php if(!$unset_clone){?>
                        <a href='<?php echo $row->clone_url?>' title='<?php echo $this->l('list_clone')?> <?php echo $subject?>' class="clone_button btn btn-primary">
                        	<i class="ti-pencil-alt"></i>
                        </a>
                    <?php }?> -->
					<?php if(!$unset_read){?>
						<a href='<?php echo $row->read_url?>' title='<?php echo $this->l('list_view')?> <?php echo $subject?>' class="edit_button btn btn-primary">
							<i class="ti-info"></i>
						</a>
					<?php }?>
					<?php
					if(!empty($row->action_urls)){
						foreach($row->action_urls as $action_unique_id => $action_url){
							$action = $actions[$action_unique_id];
					?>
							<a href="<?php echo $action_url; ?>" class="<?php echo $action->css_class; ?> crud-action" title="<?php echo $action->label?>"><?php
								if(!empty($action->image_url))
								{
									?><img src="<?php echo $action->image_url; ?>" alt="<?php echo $action->label?>" /><?php
								}
							?></a>
					<?php }
					}
					?>
			</td>
			<?php }?>
			<?php foreach($columns as $column){?>
			<td width='<?php echo $column_width?>%' class='<?php if(isset($order_by[0]) &&  $column->field_name == $order_by[0]){?>sorted<?php }?>'>
				<?php echo $row->{$column->field_name} != '' ? $row->{$column->field_name} : '&nbsp;' ; ?>
			</td>
			<?php }?>

		</tr>
<?php } ?>
		</tbody>
		</table>

<?php }else{?>
	<p class="alert alert-warning">
		<?php echo $this->l('list_no_items'); ?>
	</p>

<?php }?>
