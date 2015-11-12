<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open(uri_string());?>

  <div class="container">
	  <div class="container">
    	 <h3>Accound settings</h3>
		 <form>
      		<div class="form-group">
        		<label for="text">First Name</label>
        		<input type="text" class="form-control" id="first_name" name="first_name" placeholder="">
      	  	</div>
      		<div class="form-group">
        		<label for="text">Last Name</label>
        		<input type="text" class="form-control" id="last_name" name="last_name" placeholder="">
      	  	</div>
      	  	<div class="form-group">
        		<label for="password">Parool</label>
        		<input type="password" class="form-control" id="password" placeholder="Password">
     	   	</div>
      	  	<div class="form-group">
        		<label for="password">Parool</label>
        		<input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Re-type Password">
     	   	</div>
      	  	<button type="submit" class="btn btn-default">Save user</button>
    	</form>
	</div>
  </div>

