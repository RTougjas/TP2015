<div class="container">
<div class="page-header">
  <h1>Albumid <small><?php echo $small_header;?></small></h1>
</div>
<?php for($i = 0; $i < sizeOf($albums); $i++) {?>
	<div class="col-lg-4 col-md-4 col-sm-4">
		<div class="panel panel-default">
		  <div class="panel-heading">
			<?php for($j = 0; $j < sizeOf($pictures_in_albums); $j++) {
				if($pictures_in_albums[$j]->album_id == $albums[$i]->id) {?>
					<?php global $count;
					 $count = $pictures_in_albums[$j]->count; ?>
					<span class="badge" style="float:right"><?php echo $pictures_in_albums[$j]->count;?></span>
			<?php }
			}?>
			<h3 class="panel-title"><a href="<?php echo site_url("gallery/albumPhotos/".$albums[$i]->id."/".rawurlencode($albums[$i]->title));?>">

			<?php echo $albums[$i]->title;?></a></h3>
			<small>
					<?php echo "<a href=".site_url('/profile/'.urlencode($albums[$i]->username)).">"
                    		.$albums[$i]->username."</a>";?>
			</small>
		  </div>
		  <div class="panel-body">
			  	<div class="col-lg-6 col-md-6 col-xs-12">
		  			<?php echo '<a href='.site_url("picture/".$pictures[1]->id).'>
		  			<img src="'.$pictures[1]->location.'" class="img-responsive" alt="borked" height="200" width="200"></a>';?>
			  	</div>
				<div class="col-lg-6 col-md-6 col-xs-12"></div>
		  </div>
		</div>
	</div>
<?php }?>
<?php if($this->uri->segment(3, 0)>0){
				echo '<a href="index.php/gallery/All_albums/'.($this->uri->segment(3, 1)-1).'">Eelmised</a>';
		    } else {
				echo 'Eelmised';
			}
		  if($this->GalleryModel->moreAlbums($this->uri->segment(3, 0))){
				echo '<a href="index.php/gallery/All_albums/'.($this->uri->segment(3, 0)+1).'">Järgmised</a>';
			} else {
				echo 'Järgmised';
			}  ?>
</div>


