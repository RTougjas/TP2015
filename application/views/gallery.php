<div class="container">
<div class="page-header">
	<h1>Albumid <small><?php echo $small_header;?></small></h1>
</div>


<?php for($i = 0; $i < sizeOf($albums); $i++) {?>
	<?php for($j = 0; $j < sizeOf($pictures_in_albums); $j++) {
		if($pictures_in_albums[$j]->album_id == $albums[$i]->id && $pictures_in_albums[$j]->count > 0) {?>
			<div class="col-lg-3 col-md-3 col-sm-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<?php global $count;
						$count = $pictures_in_albums[$j]->count; ?>
						<span class="badge" style="float:right"><?php echo $pictures_in_albums[$j]->count;?></span>
						<h3 class="panel-title"><a href="<?php echo site_url("gallery/albumPhotos/".$albums[$i]->id."/".rawurlencode($albums[$i]->title));?>">
						<?php echo $albums[$i]->title;?></a></h3>
						<small>
							<?php echo "<a href=".site_url('/profile/'.urlencode($albums[$i]->username)).">"
		                    		.$albums[$i]->username."</a>";?>
						</small>
					</div>
					<div class="panel-body">
						<div class="col-lg-12 col-md-12 col-xs-12">
						
							<?php $album_cover = $this->GalleryModel->getAlbumCover($albums[$i]->id); ?>
							<?php echo '<a href='.site_url("picture/".$album_cover[0]).'><img src="'.$album_cover[1].'" class="img-responsive" alt="borked" height="200" width="200"></a>';?>
							
						</div>
					</div>
				</div>
			</div>
		<?php } 
	}?>
<?php }?>
</div>
<div class="row">
	<div class="text-center">
		<ul class="pagination">
		
			<?php if($this->uri->segment(3, 0)>0){ ?>
			
				<li><a href="<?php echo '/index.php/gallery/All_albums/'.($this->uri->segment(3, 1)-1).''?>" aria-label="Previous"><span aria-hidden="true">&laquo; eelmised</span></a></li>
				
				<?php } else { ?>
					
					<li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo; eelmised</span></a></li>
			<?php } ?>
			
			<?php if($this->GalleryModel->moreAlbums($this->uri->segment(3, 0))) { ?>
			
				<li><a href="<?php echo '/index.php/gallery/All_albums/'.($this->uri->segment(3, 0)+1).''?>" aria-label="Next"><span aria-hidden="true">järgmised &raquo;</span></a></li>

			<?php } else { ?>
			
				<li class="disabled"><a href="#" aria-label="Next"><span aria-hidden="true">järgmised &raquo;</span></a></li>
				
			<?php } ?>
  	  	</ul>
	</div>
</div>


