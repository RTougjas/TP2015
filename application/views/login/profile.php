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
					<td>
						<a class="btn btn-primary" href="<?php echo site_url("profile/uploads/".$id);?>">Photos
						<span class="badge"><?php echo $posts;?></span></a>
					</td>
					<td>
						&#160
					</td>
					<td>
						<a class="btn btn-primary" href="<?php echo site_url("gallery/albums/".$id);?>">Albums
						<span class="badge"><?php echo $album_count;?></span></a>
					</td>
				</tr>
			</table>
			<?php if($this->ion_auth->logged_in() && $this->session->userdata('user_id') == $id) {?>
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
			<?php } ?>
	  </div>
	</div>
	<?php if($this->ion_auth->logged_in() && $this->session->userdata('user_id') == $id) {?>
		<!-- Here comes code for creating new album -->
	<?php } ?>	
</div>
<div class="col-lg-4 col-md-4 col-sm-4"></div>




