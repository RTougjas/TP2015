<?php for($i = 0; $i < sizeOf($pictures); $i++) {?>
	<div class="col-lg-2 col-md-4 col-sm-4">
			<table>
				<tr>
					<th><?php echo $pictures[$i]->title?><th>
				</tr>
				<tr>
					<td><?php echo $pictures[$i]->description?><td>
				</tr>
				<tr>
					<td><?php echo '<a href='.site_url("picture/".$pictures[$i]->id).'>
						 <img src="'.$pictures[$i]->location.'" alt="borked" height="200" width="200">';?></td>
				</tr>
			</table>
		</div>
<?php } ?>


