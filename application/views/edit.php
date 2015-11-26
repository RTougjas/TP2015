<div class="col-md-2 col-sm-4"></div>
<div class="container">
	<div class="panel panel-default">
  		<div class="panel-heading">
			<?php echo form_open('edit/do_edit/'.$this->uri->segment(2, 1));?>
			<div class="form-group">
				<label for="text">Title</label>
				<input type="text" class="form-control" name="title" placeholder="<?php echo $picture->title;?>">
  			</div>
		</div>
  	  	<div class="panel-body">
			<div class="row">
				
				<div class="col-lg-6 col-md-6 col-xs-6">
					<?php if($owner) {?>
						<table class="table">
							<tr>
								<th><h3>Asub Sinu albumites</h3></th>
							</tr>
							<?php for($i = 0; $i < sizeOf($albums); $i++) {?>
								<tr>
									<td>
										<?php echo $albums[$i]->title;?>
									</td>
									<?php if(sizeOf($photo_in_albums) > 0) {?> 
										<?php for($j = 0; $j < sizeOf($photo_in_albums); $j++) { ?>
											<?php if($photo_in_albums[$j]->album_id == $albums[$i]->id) { ?>
												<td>
													<?php echo '<input type="checkbox" name="albums[]" value="'.$albums[$i]->id.'" checked>';?>
												</td>
												</tr>
												<?php break?>
											<?php } ?>
											<!-- for cases when there will be no break out of this loop. -->
											<?php if($j == sizeOf($photo_in_albums) - 1) {?>
												<td>
													<?php echo '<input type="checkbox" name="albums[]" value="'.$albums[$i]->id.'">';?>
												</td>
											<?php } ?>
										<?php } ?>
									<?php } else {?>
										<td>
											<?php echo '<input type="checkbox" name="albums[]" value="'.$albums[$i]->id.'" checked>';?>
										</td>
									<?php } ?> <!-- } else { -->
							<? }?> <!-- for( ; sizeOf($albums); )-->
						</table>
					<? } ?> <!-- if(owner) -->
				</div>
			</div>
  		</div>
  	  	<div class="panel-footer">
	  		<div class="form-group">
	  			<label for="text">Tags(Eralda komaga, ilma tühikuta)</label>
	  			<input type="text" class="form-control" name="tags" placeholder="<?php echo implode(', ',$tags);?>">
	    	</div>
				  <?php for($i = 0; $i < count($tags); ++$i){?>
						
						<!-- This makes it the table totally invisible, if there are no tags for photo-->
						<?php if($i == 0) {?>
							<div class="table-responsive">
								<table class="table">
									<tr>
										<th>Kustuta tagid<th>
									<tr>
						<?php }?>
						<tr>
							<td>
								<?php echo $tags[$i];?>
							</td>
							<td>
								<?php echo '<input type="checkbox" name="tag[]" value="'.$tags[$i].'">';?>
							</td>
						</tr>
				   <?php }?>
				</table>
			</div>
		</div>
		<br>
		<button type="submit" class="btn btn-primary">Salvesta</button>
	</div>
</div>
<div class="col-md-2 col-sm-4"></div>