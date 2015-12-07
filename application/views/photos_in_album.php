<div class="container">
<div class="page-header">
  <h1>Pildid <small><?php echo $small_header;?></small></h1>
    <?php if(isset($album_id) && $this->ion_auth->get_user_id() == $this->GalleryModel->get_album_owner($album_id)[0]->user_id){?>
		<a class="btn btn-success" href="<?php echo site_url("/upload");?>">Lae albumisse pilt</a>
		<a class="btn btn-danger" href=<?php echo site_url('gallery/remove_album/'.$album_id);?>>Kustuta album</a>
    <?php }?>
  
</div>
<?php for($i = 0; $i < sizeOf($pictures); $i++) {?>
	<div class="col-lg-3 col-md-3 col-sm-6">
			<table>
				<tr>
					<th><?php echo rawurldecode($pictures[$i]->title)?><th>
				</tr>
				<tr>
					<td><?php
						$description = $pictures[$i]->description;
						
						if(strlen($description) < 25) {
							echo $description;
						}else {
							echo substr($description, 0, 25).'...';
						}?>
					<td>
				</tr>
				<tr>
					<td><?php echo '<a href='.site_url("picture/".$pictures[$i]->id).'>
						 <img src="'.$pictures[$i]->location.'" class="img-rounded" alt="borked" height="200" width="200">';?></td>
				</tr>
			</table>
			<br>
		</div>
	<?php } ?>
</div>
<div class="row">
	<div class="text-center">
		<ul class="pagination">
			<?php if($this->uri->segment(5, 0)>0){ ?>
			
				<li><a href="<?php echo '/index.php/gallery/albumPhotos/'.$this->uri->segment(3, 1).'/Album/'.($this->uri->segment(5, 0)-1);?>" aria-label="Previous"><span aria-hidden="true">&laquo; eelmised</span></a></li>
				
				<?php } else { ?>
					
					<li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo; eelmised</span></a></li>
			
			<?php } ?>
			
			<?php if($this->GalleryModel->moreAlbumPhotos($album_id,$this->uri->segment(5, 0))) { ?>
				<li><a href="<?php echo '/index.php/gallery/albumPhotos/'.$this->uri->segment(3, 1).'/Album/'.($this->uri->segment(5, 0)+1);?>" aria-label="Next"><span aria-hidden="true">järgmised &raquo;</span></a></li>
			<?php } else { ?>
				<li class="disabled"><a href="#" aria-label="Next"><span aria-hidden="true">järgmised &raquo;</span></a></li>
			<?php } ?>
  	  	</ul>
	</div>
</div>
