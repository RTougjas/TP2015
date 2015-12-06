
<div class="col-lg-5 col-md-4 col-sm-4"></div>
<div class="col-lg-3 col-md-4 col-sm-4">
	<?php if($this->ion_auth->logged_in()) {?>
		<?php if(sizeOf($this->session->flashdata('info')) > 0) {?>
			<div class="alert alert-success" role="alert">
				<?php echo $this->session->flashdata('info'); ?>
			</div>
		<?php } ?>
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
	        <div class="form-group">
	            <label for="ligikaudne_aeg">Ligikaudne aeg</label>
	            <input type="text" class="form-control" id="ligikaudne_aeg" name="ligikaudne_aeg" placeholder="Aeg omasõnadega">
	        </div>
	        <div class="form-group">
	        <select class="form-control" name="kihelkond">
	        	<?php echo '<option value="">Kihelkond</option>' ?>
	        	<?php foreach($kihelkonnad as $kihelkond){?>
	        		<?php echo '<option value="'.$kihelkond.'">'.$kihelkond.'</option>'?>
	        		<?php } ?>
	        </select>
	        </div>
	        <div class="form-group">
	            <label for="koht">Koht</label>
	            <input type="text" class="form-control" id="koht" name="koht" placeholder="Koht">
	        </div>
	        <div class="form-group">
	            <label for="varasem_omanik">Albumi varasem Omanik</label>
	            <input type="text" class="form-control" id="albumi_varasem_omanik" name="albumi_varasem_omanik" placeholder="Albumi varasem Omanik">
	        </div>
            <br>
            <input type="submit" class="btn btn-primary" value="create">
	<?php } else {
		redirect('/auth/login');
	}?>
</div>
<div class="col-lg-5 col-md-4 col-sm-4"></div>