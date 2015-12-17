<div class="col lg-3 col-md-3 col-sm-12 col-xs-12"></div>
<div class="col lg-6 col-md-6 col-sm-12 col-xs-12">
	<h1>Pildid <small><?php echo $small_header;?></small></h1>
	<?php for($i = 0; $i < sizeOf($pictures); $i++) {?>
		<div class="row">
  	  		<div class="col lg-12 col-md-12 col-sm-12 col-xs-12">
    			<a href="<?php echo site_url("picture/".$pictures[$i]->id);?>" class="thumbnail">
					<img src="<?php echo $pictures[$i]->location;?>" alt="...">
			   	</a>
  			</div>
		</div>
		<?php } ?>
	<?php if($small_header == 'Kõik pildid') { ?>
		<div class="row">
			<div class="text-center">
				<ul class="pagination">
					<?php if($this->uri->segment(3, 0)>0){ ?>
						<li><a href="<?php echo '/index.php/gallery/AllPhotos/'.($this->uri->segment(3, 1)-1).''?>" aria-label="Previous"><span aria-hidden="true">&laquo; eelmised</span></a></li>
					<?php } else { ?>
						<li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo; eelmised</span></a></li>
					<?php } ?>
					<?php if($this->GalleryModel->isMoreAllPhotos($this->uri->segment(3, 0))) { ?>
					<li><a href="<?php echo '/index.php/gallery/AllPhotos/'.($this->uri->segment(3, 0)+1).''?>" aria-label="Next"><span aria-hidden="true">järgmised &raquo;</span></a></li>
					<?php } else { ?>
					<li class="disabled"><a href="#" aria-label="Next"><span aria-hidden="true">järgmised &raquo;</span></a></li>
					<?php } ?>
	  	  	</ul>
		</div>
	</div>
	<?php } else if ($small_header == 'Otsingu tulemused') { ?>
	
	<!-- HERE COMES CODE FOR SEARCH RESULTS -->
	
	<!-- make sure to change this 'albumPhotos' if you change function name in Gallery controller -->
	<?php } else if('albumPhotos' == $this->uri->segment(2,0)) { ?>
		<div class="row">
			<div class="text-center">
				<ul class="pagination">
					<?php if($this->uri->segment(5, 0)>0){ ?>
			
						<li><a href="<?php echo '/index.php/gallery/albumPhotos/'.$this->uri->segment(3, 1).'/Album/'.($this->uri->segment(5, 0)-1);?>" aria-label="Previous"><span aria-hidden="true">&laquo; eelmised</span></a></li>
				
						<?php } else { ?>
					
							<li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo; eelmised</span></a></li>
			
					<?php } ?>
			
					<?php if($this->GalleryModel->isMorePhotosInAlbum($album_id,$this->uri->segment(5, 0))) { ?>
						<li><a href="<?php echo '/index.php/gallery/albumPhotos/'.$this->uri->segment(3, 1).'/Album/'.($this->uri->segment(5, 0)+1);?>" aria-label="Next"><span aria-hidden="true">järgmised &raquo;</span></a></li>
					<?php } else { ?>
						<li class="disabled"><a href="#" aria-label="Next"><span aria-hidden="true">järgmised &raquo;</span></a></li>
					<?php } ?>
		  	  	</ul>
			</div>
		</div>
	<?php } else { ?>
	<div class="row">
		<div class="text-center">
			<ul class="pagination">
				<?php if($this->uri->segment(5, 0)>0){ ?>
					<li><a href="<?php echo '/index.php/profile/uploads/'.$this->uri->segment(3, 0).'/'.$this->uri->segment(4, 1).'/'.($this->uri->segment(5, 0)-1);?>" aria-label="Previous"><span aria-hidden="true">&laquo; eelmised</span></a></li>
				
					<?php } else { ?>
					
						<li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo; eelmised</span></a></li>
			
				<?php } ?>
			
				<?php if($this->Profile_model->moreUserPictures($id,$this->uri->segment(5, 0))) { ?>
					<li><a href="<?php echo '/index.php/profile/uploads/'.$this->uri->segment(3, 0).'/'.$this->uri->segment(4, 1).'/'.($this->uri->segment(5, 0)+1);?>" aria-label="Next"><span aria-hidden="true">järgmised &raquo;</span></a></li>
				<?php } else { ?>
					<li class="disabled"><a href="#" aria-label="Next"><span aria-hidden="true">järgmised &raquo;</span></a></li>
				<?php } ?>
	  	  	</ul>
		</div>
	</div>
<?php } ?>
<div class="col lg-3 col-md-3 col-sm-12 col-xs-12"></div>