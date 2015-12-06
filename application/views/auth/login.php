<?php
echo form_open("auth/login");
?>
<div class="col-lg-5 col-md-4 col-sm-4"></div>
<?php $this->session->keep_flashdata('uploadAttempt'); ?>
<div class="col-lg-3 col-md-4 col-sm-4">
	<h3><?php echo lang('login_heading')?></h3>
		<form>
  			<div class="form-group">
    			<label for="email">Emaili aadress</label>
    			<input type="email" class="form-control" id="identity" name="identity"placeholder="Email">
  	  		</div>
  	  		<div class="form-group">
    			<label for="password">Parool</label>
    			<input type="password" class="form-control" id="password" name="password" placeholder="Parool">
 	   		</div>
  	  		<div class="checkbox">
    			<label>
      			<input type="checkbox"> Jäta meelde
    			</label>
  	  		</div>
  	  		<button type="submit" class="btn btn-primary">Logi sisse</button>
		</form>
		<br>
		<p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
		<p><a href="create_user"><?php echo lang('create_user_heading');?></a></p>
</div>
<div class="col-lg-5 col-md-4 col-sm-4"></div>
