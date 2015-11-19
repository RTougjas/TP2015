<div class="container">
<?php for($i = 0; $i < sizeOf($albums); $i++) {?>
	<div class="col-lg-4 col-md-4 col-sm-4">
		<div class="panel panel-default">
		  <div class="panel-heading">
			<?php for($j = 0; $j < sizeOf($pictures_in_albums); $j++) {
				if($pictures_in_albums[$j]->album_id == $albums[$i]->id) {?>
					<span class="badge" style="float:right"><?php echo $pictures_in_albums[$j]->count;?></span>
			<?php }
			}?>
		    <h3 class="panel-title"><?php echo $albums[$i]->title;?></h3>
			<small>
					<?php echo "<a href=".site_url('/profile/'.urlencode($albums[$i]->username)).">"
                    		.$albums[$i]->username."</a>";?>
			</small>
		  </div>
		  <div class="panel-body">
			  	<div class="col-lg-6 col-md-6 col-xs-12">
		  			<?php echo '<a href='.site_url("picture/".$pictures[6]->id).'>
		  			<img src="'.$pictures[6]->location.'" class="img-responsive" alt="borked" height="200" width="200"></a>';?>
			  	</div>
				<div class="col-lg-6 col-md-6 col-xs-12"></div>
		  </div>
		</div>
	</div>
	
<?php }?>


<?php for($i = 0; $i < sizeOf($pictures); $i++) {?>
	<div class="col-lg-4 col-md-4 col-sm-4">
			<table>
				<tr>
					<th><?php echo $pictures[$i]->title?><th>
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


