<?php echo $error;?>

<?php echo form_open_multipart('upload/do_upload');?>

  <div class="container">
	  <div class="col-xs-5 col-cs-offset-5">
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
      	  	<input type="submit" class="btn btn-default" value="upload">
    	</form>
	</div>
  </div>
