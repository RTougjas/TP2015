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
				<div class="col-lg-6 col-md-6 col-xs-12">
					<?php echo '<img src="'.$picture->location.'" class="img-responsive">';?> 
					<br>
					<?php if($this->ion_auth->logged_in() && $owner) { ?>
						<table class="table">
							<tr>
								<td>Kommentaarid Lubatud</td>
				   					<?php if($picture->comments_enabled == 't') { ?>
										<td><input type="checkbox" name="comments" value="true" checked><br /></td>
								<?php } else { ?>
										<td><input type="checkbox" name="comments" value="true"><br /></td>
								<?php } ?>
							</tr>
							<tr>
							<td>Avalik Pilt</td>
								<?php if($picture->publicpic == 't') { ?>
										<td><input type="checkbox" name="publicpic" value="true" checked><br /></td>
								<?php } else { ?>
										<td><input type="checkbox" name="publicpic" value="true"><br /></td>
								<?php } ?>	
						</table>
					<?php } ?>
					<br>
			  		<div class="form-group">
			  			<label for="text">Description</label>
						<textarea class="form-control" type="text" rows="5" name="description" placeholder="<?php echo $picture->description;?>"></textarea>
			    	</div>		
				</div>
				
				<div class="col-lg-6 col-md-6 col-xs-6">
					<?php if($owner) {?>
						<table class="table">
							<tr>
								<th><h3>Asub Sinu albumites</h3></th>
							</tr>
							<?php for($i = 0; $i < sizeOf($albums); $i++) {?>
								<input type="hidden" name="allUserAlbums[]" value="<?php echo $albums[$i]->id;?>">
								<tr>
									<td>
										<?php echo $albums[$i]->title;?>
									</td>
									<?php if(sizeOf($photo_in_albums) > 0) {?> 
										<?php for($j = 0; $j < sizeOf($photo_in_albums); $j++) { ?>
											<?php if($photo_in_albums[$j]->album_id == $albums[$i]->id) { ?>
												<td>
													<input type="checkbox" name="albumsChecked[]" value="<?php echo $albums[$i]->id;?>" checked>
												</td>
												</tr>
												<?php break?>
											<?php } ?>
											<!-- for cases when there will be no break out of this loop. -->
											<?php if($j == sizeOf($photo_in_albums) - 1) {?>
												<td>
													<input type="checkbox" name="albumsChecked[]" value="<?php echo $albums[$i]->id;?>" >
												</td>
											<?php } ?>
										<?php } ?>
									<?php } else {?>
										<td>
											<input type="checkbox" name="albumsChecked[]" value="<?php echo $albums[$i]->id;?>" >
										</td>
									<?php } ?> <!-- } else { -->
							<?php }?> <!-- for( ; sizeOf($albums); )-->
						</table>
				<?php } ?> <!-- if(owner) -->
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
	</div>
	<button type="submit" class="btn btn-primary">Salvesta</button>
</div>
<div class="col-md-2 col-sm-4"></div>

