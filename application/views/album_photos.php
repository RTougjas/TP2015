<div class="container">
<div class="page-header">
  <h1>Pildid <small><?php echo $small_header;?></small></h1>
    <?php if(isset($album_id) && $this->ion_auth->get_user_id() == $this->GalleryModel->get_album_owner($album_id)[0]->user_id){?>
		<a class="btn btn-success" href="#">Add Photo(Ei tööta hetkel)</a>
		<a class="btn btn-danger" href=<?php echo site_url('gallery/remove_album/'.$album_id);?>>Delete album</a>
    <?php }?>
  
</div>
	<?php for($i = 0; $i < sizeOf($pictures); $i++) {?>
		<div class="col-lg-4 col-md-4 col-sm-4">
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
	<?php if($this->uri->segment(3, 0)>0){
				echo '<a href="/index.php/gallery/AllPhotos/'.($this->uri->segment(3, 1)-1).'">Eelmised</a>';
		    } else {
				echo 'Eelmised';
			}
		  if($this->GalleryModel->morePictures($this->uri->segment(3, 0))){
				echo '<a href="/index.php/gallery/AllPhotos/'.($this->uri->segment(3, 0)+1).'">Järgmised</a>';
			} else {
				echo 'Järgmised';
			}  ?>
</div>

