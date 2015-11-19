<?php     
if(!$this->session->has_userdata('username')){
    $this->session->set_userdata('referred_from', current_url());
}
?>

<?php echo form_open(uri_string());?>
<div class="col-lg-4 col-md-4 col-sm-4"></div>
<div class="col-lg-4 col-md-4 col-sm-4">
	<div class="panel panel-default">
	  <div class="panel-heading">Account details</div>
	  <div class="panel-body">
		  	<table>
				<tr>
					<td><small>Photos</small><td>
					<td><?php echo "<a href=".site_url("profile/uploads/".$id).">".$posts."</a>";?></td>
				</tr>
				<tr>
					<td><small>Albums created</small><td>
					<td><?php echo "<a href=".site_url("profile/uploads/".$id).">".$posts."</a>";?></td>
				</tr>
			</table>
		 	<form>
      			<div class="form-group">
        			<label for="text">First Name</label>
        			<input type="text" class="form-control" id="first_name" name="first_name" placeholder="<?php echo $first_name?>">
      	  		</div>
      			<div class="form-group">
        			<label for="text">Last Name</label>
        			<input type="text" class="form-control" id="last_name" name="last_name" placeholder="<?php echo $last_name?>">
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
				<br>
    		</form>
	  </div>
	</div>
</div>
<div class="col-lg-4 col-md-4 col-sm-4"></div>




