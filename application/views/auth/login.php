<?php
echo form_open("auth/login");
?>

<div class="container">
	<div class="col-xs-5 col-cs-offset-5">
		<h3><?php echo lang('login_heading')?></h3>
			<form>
      			<div class="form-group">
        			<label for="email">Emaili aadress</label>
        			<input type="email" class="form-control" id="identity" name="identity"placeholder="Email">
      	  		</div>
      	  		<div class="form-group">
        			<label for="password">Parool</label>
        			<input type="password" class="form-control" id="password" name="password" placeholder="Password">
     	   		</div>
      	  		<div class="checkbox">
        			<label>
          			<input type="checkbox"> Remember me
        			</label>
      	  		</div>
      	  		<button type="submit" class="btn btn-default">Logi sisse</button>
    		</form>
			<br>
			<p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
			<p><a href="create_user"><?php echo lang('create_user_heading');?></a></p>
	</div>
</div>