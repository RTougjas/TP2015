<div class="col lg-3 col-md-3 col-sm-12 col-xs-12"></div>
<div class="col lg-6 col-md-6 col-sm-12 col-xs-12">
	<h1>Albumid <small><?php echo $small_header;?></small></h1>
	<?php for($i = 0; $i < sizeOf($albums); $i++) {?>
		<?php for($j = 0; $j < sizeOf($albums_photo_count); $j++) {?>
			<?php if($albums_photo_count[$j]->album_id == $albums[$i]->id && $albums_photo_count[$j]->count > 0) {?>
				<div class="row">
					<div class="col lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<?php global $count;
								$count = $albums_photo_count[$j]->count; ?>
								<span class="badge" style="float:right"><?php echo $albums_photo_count[$j]->count;?></span>
								<h2 class="panel-title"><a href="<?php echo site_url("gallery/albumPhotos/".$albums[$i]->id."/".rawurlencode($albums[$i]->title));?>">
									<?php echo 'Album: '.$albums[$i]->title;?></a></h2>
									<small>
										<?php echo "<a href=".site_url('/profile/'.urlencode($albums[$i]->username)).">"
			                    		.$albums[$i]->username."</a>";?>
									</small>
									<p><?php echo $albums[$i]->description;?></p>
							</div>
							<div class="panel-body">
								<?php $album_cover = $this->GalleryModel->getAlbumCover($albums[$i]->id); ?>
				    			<a href="<?php echo site_url("gallery/albumPhotos/".$albums[$i]->id."/".rawurlencode($albums[$i]->title));?>" class="thumbnail">
									<img src="<?php echo $album_cover[1];?>" alt="...">
							   	</a>
							</div>
						</div>
					</div>
				</div>
				
			<?php } ?>
		<?php } ?>
	<?php } ?>
<!-- Make sure to change that in some near future -->
<?php if($small_header == 'Kõik albumid') { ?>
	<div class="row">
		<div class="text-center">
			<ul class="pagination">
				<?php if($this->uri->segment(3, 0)>0){ ?>
					<li><a href="<?php echo '/index.php/gallery/getAlbums/'.($this->uri->segment(3, 1)-1).''?>" aria-label="Previous"><span aria-hidden="true">&laquo; eelmised</span></a></li>
				
					<?php } else { ?>
					
						<li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo; eelmised</span></a></li>
				<?php } ?>
			
				<?php if($this->GalleryModel->isMoreAlbums($this->uri->segment(3, 0))) { ?>
			
					<li><a href="<?php echo '/index.php/gallery/getAlbums/'.($this->uri->segment(3, 0)+1).''?>" aria-label="Next"><span aria-hidden="true">järgmised &raquo;</span></a></li>

				<?php } else { ?>
			
					<li class="disabled"><a href="#" aria-label="Next"><span aria-hidden="true">järgmised &raquo;</span></a></li>
				
				<?php } ?>
	  	  	</ul>
		</div>
	</div>
<?php } else if($small_header == 'Otsingu tulemused') { ?>
<?php } else if('allUserAlbums' == $this->uri->segment(2,0)) { ?>
	<div class="row">
		<div class="text-center">
			<ul class="pagination">

				<?php if($this->uri->segment(5, 0)>0){ ?>
			
					<li><a href="<?php echo '/index.php/gallery/albums/'.$this->uri->segment(3, 0).'/'.$this->uri->segment(4, 1).'/'.($this->uri->segment(5, 0)-1);?>" aria-label="Previous"><span aria-hidden="true">&laquo; eelmised</span></a></li>
				
					<?php } else { ?>
					
						<li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo; eelmised</span></a></li>
				<?php } ?>
			
				<?php if($this->GalleryModel->isMoreUserAlbums($id, $this->uri->segment(5, 0))) { ?>
			

					<li><a href="<?php echo '/index.php/gallery/albums/'.$this->uri->segment(3, 0).'/'.$this->uri->segment(4, 1).'/'.($this->uri->segment(5, 0)+1);?>" aria-label="Next"><span aria-hidden="true">järgmised &raquo;</span></a></li>

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
<?php } ?>
</div>
<div class="col lg-3 col-md-3 col-sm-12 col-xs-12"></div>



