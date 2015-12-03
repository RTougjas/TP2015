
<div class="col-lg-5 col-md-4 col-sm-4"></div>
<div class="col-lg-3 col-md-4 col-sm-4">
	<?php if($this->ion_auth->logged_in()) {
        if(isset($error)){
            echo $error;
        }?>
		<?php echo validation_errors(); ?>
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
        			<input type="text" class="form-control" id="tags" name="tags" placeholder="Eraldage komaga">
     	   		</div>
      	 		<div class="form-group">
        			<label for="fileInput">Lisa failina</label>
        			<input type="file" id="userfile" name="userfile" size="20">
       				<p class="help-block">.jpg .png .gif</p>
      			</div>
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
				<div class="form-group">
        			<label for="checkbox">Kommentaarid lubatud</label>
        			<input type="checkbox" class="form-control" id="comments" name="comments" value='true' checked>
     	   		</div>
				<div class="form-group">
        			<label for="checkbox">Avalik pilt</label>
        			<input type="checkbox" class="form-control" id="ispublic" name="ispublic" value='true' checked>
     	   		</div>
				<br>
      	  		<input type="submit" class="btn btn-primary" value="upload">
    	</form>
	<?php } else {
		redirect('/auth/login');
	}?>
</div>
<div class="col-lg-5 col-md-4 col-sm-4"></div>
