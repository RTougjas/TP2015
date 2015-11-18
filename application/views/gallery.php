<div class="container">
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


