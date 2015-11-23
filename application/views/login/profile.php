<?php     
if(!$this->session->has_userdata('username')){
    $this->session->set_userdata('referred_from', current_url());
}
?>

<div class="col-lg-4 col-md-4 col-sm-4"></div>
<div class="col-lg-4 col-md-4 col-sm-4">
	<div class="panel panel-default">
	  <div class="panel-heading"><h3>Kasutaja andmed</h3></div>
	  <div class="panel-body">
		  	<table>
				<tr>
					<th>Kasutaja</th>
				</tr>
				<tr>
					<td><?php echo $username;?></td>
				</tr>
				<tr>
					<th>Eesnimi</th>
				</tr>
				<tr>
					<td><?php echo $first_name;?></td>
				</tr>
				<tr>
					<th>Perenimi</th>
				</tr>
				<tr>
					<td><?php echo $last_name;?></td>
				</tr>
				<tr>
					<td>
						<a class="btn btn-primary" href="<?php echo site_url("profile/uploads/".$id."/".rawurlencode($username));?>">Pildid
						<span class="badge"><?php echo $posts;?></span></a>
					</td>
					<td>
						&#160
					</td>
					<td>
						<a class="btn btn-primary" href="<?php echo site_url("gallery/albums/".$id."/".rawurlencode($username));?>">Albumid
						<span class="badge"><?php echo $album_count;?></span></a>
					</td>
				</tr>
			</table>
			<br>
			<?php if($this->ion_auth->logged_in() && $this->session->userdata('user_id') == $id) {?>
                <?php echo form_open('auth/edit_user/'.$id);?>
      				<div class="form-group">
        				<label for="text">Eesnimi</label>
        				<input type="text" class="form-control" id="first_name" name="first_name" placeholder="<?php echo $first_name?>">
      	  			</div>
      				<div class="form-group">
        				<label for="text">Perenimi</label>
        				<input type="text" class="form-control" id="last_name" name="last_name" placeholder="<?php echo $last_name?>">
      	  			</div>
                    <?php echo form_hidden('id', $id);?>
                    <?php echo form_hidden($csrf); ?>
      	  			<button type="submit" class="btn btn-default">Salvesta</button>
					<br>
			<?php } ?>
	  </div>
	</div>
	<?php if($this->ion_auth->logged_in() && $this->session->userdata('user_id') == $id) {?>
		<!-- here comes code for creating album-->
	<?php } ?>	
</div>
<div class="col-lg-4 col-md-4 col-sm-4"></div>




