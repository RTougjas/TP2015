
<div class="col-lg-5 col-md-4 col-sm-4"></div>
<div class="col-lg-3 col-md-4 col-sm-4">
	<?php if($this->ion_auth->logged_in()) {?>
		<?php echo form_open_multipart('upload/do_upload');?>
		<h3>Lisa pilt</h3>
			<form>
      			<div class="form-group">
        			<label for="text">Pildi pealkiri</label>
        			<input type="text" class="form-control" id="title" name="title" placeholder="Pealkiri">
      	  		</div>
      	  		<div class="form-group">
        			<label for="text">Pildi kirjeldus</label>
        			<input type="text" class="form-control" id="description" name="description" placeholder="Kirjeldus">
     	   		</div>
      	  		<div class="form-group">
        			<label for="text">Tagid</label>
        			<input type="text" class="form-control" id="description" name="tags" placeholder="Eraldage komaga, ilma tühikuta">
     	   		</div>
      	 		<div class="form-group">
        			<label for="fileInput">Lisa failina</label>
        			<input type="file" id="userfile" name="userfile" size="20">
       				<p class="help-block">.jpg .png .gif</p>
      			</div>
				<p id="selected_album">javascript muudab</p>
				<p id="new" value="pask">javascript</p>
				<div class="dropdown">
			  		<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Lisa albumisse
			  	  	  <span class="caret"></span></button>
			  			<ul class="dropdown-menu">
							<li><a href="#">+</a></li>
				       	 	<?php foreach($albums as $album){?>
				        		<li><a href="#"><?php echo $album->title;?>
				        	<?php }?>
			  	  		</ul>
				</div>
				<br>
      	  		<input type="submit" class="btn btn-primary" value="upload">
    	</form>
	<?php } else {
		redirect('/auth/login');
	}?>
</div>
<div class="col-lg-5 col-md-4 col-sm-4"></div>
