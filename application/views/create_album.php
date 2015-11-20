
<div class="col-lg-5 col-md-4 col-sm-4"></div>
<div class="col-lg-3 col-md-4 col-sm-4">
	<?php if($this->ion_auth->logged_in()) {?>
		<?php echo form_open('gallery/create_album');?>
		<h3>Lisa album</h3>
            <div class="form-group">
                <label for="text">Albumi pealkiri</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Pealkiri">
            </div>
            <div class="form-group">
                <label for="text">Albumi kirjeldus</label>
                <input type="text" class="form-control" id="description" name="description" placeholder="Kirjeldus">
            </div>
            <br>
            <input type="submit" class="btn btn-primary" value="create">
	<?php } else {
		redirect('/auth/login');
	}?>
</div>
<div class="col-lg-5 col-md-4 col-sm-4"></div>