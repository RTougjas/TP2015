<div class="container">
<div class="page-header">
  <h1>Pildid <small><?php echo $small_header;?></small></h1>
    <?php if(isset($album_id)){?>
        <a class="btn btn-info" href=<?php echo site_url('gallery/remove_album/'.$album_id);?>>Delete album</a>
    <?php }?>
  
</div>
	<?php for($i = 0; $i < sizeOf($pictures); $i++) {?>
		<div class="col-lg-4 col-md-4 col-sm-4">
			<table>
				<tr>
					<th><h4><?php echo rawurldecode($pictures[$i]->title)?></h4><th>
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


