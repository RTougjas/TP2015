<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open(uri_string());?>

<div class="col-lg-5 col-md-4 col-sm-4"></div>
<div class="col-lg-3 col-md-4 col-sm-4">
 <h3><?php echo lang('edit_user_heading');?></h3>
 		<div class="form-group">
   			<?php echo lang('edit_user_fname_label', 'first_name');?>
   			<input type="text" class="form-control" id="first_name" name="first_name" placeholder="">
 	  	</div>
 		<div class="form-group">
   			<?php echo lang('edit_user_lname_label', 'last_name');?> 
   			<input type="text" class="form-control" id="last_name" name="last_name" placeholder="">
 	  	</div>
        <div class="form-group">
            <label for="telephone">Telefoni number</label>
            <input type="integer" class="form-control" id="telephone" name="telephone" placeholder="Telefoni number">
        </div>
        <div class="form-group">
            <label for="location">Elukoht</label>
            <input type="text" class="form-control" id="location" name="location" placeholder="Elukoht">
        </div>
 	  	<div class="form-group">
   			<?php echo lang('edit_user_password_label', 'password');?>
   			<input type="password" class="form-control" id="password" placeholder="Password">
	   	</div>
 	  	<div class="form-group">
   			<?php echo lang('edit_user_password_confirm_label', 'password_confirm');?>
   			<input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Re-type Password">
	   	</div>
       	<?php echo form_hidden('id', $user->id);?>
       	<?php echo form_hidden($csrf); ?>
 	  	<button type="submit" class="btn btn-default">Save user</button>
</div>
<div class="col-lg-5 col-md-4 col-sm-4"></div>
