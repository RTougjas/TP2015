<div class="col-lg-5 col-md-4 col-sm-4"></div>
<div class="col-lg-3 col-md-4 col-sm-4">
	<h1><?php echo lang('edit_group_heading');?></h1>
	<p><?php echo lang('edit_group_subheading');?></p>
	<div id="infoMessage"><?php echo $message;?></div>
	
	<?php echo form_open(current_url());?>
	<form>
		<div class="form-group">
			<label><?php echo lang('edit_group_name_label', 'group_name');?></label>
			<input type="text" class="form-control" id="group_name" name="group_name" placeholder="Grupi nimi" value="<?php echo $group->name;?>">
  		</div>
  		<div class="form-group">
			<label><?php echo lang('edit_group_desc_label', 'description');?></label>
			<input type="text" class="form-control" id="group_description" name="group_description" placeholder="Grupi kirjeldus" value="<?php echo $group->description;?>">
   		</div>
  		<button type="submit" class="btn btn-success"><?php echo lang('edit_group_submit_btn');?></button>
	</form>
	<?php echo form_close();?>
</div>
<div class="col-lg-5 col-md-4 col-sm-4"></div>
