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
					
					<table class="table">
						<tr>
							<td>Kommentaarid Lubatud</td>
								<?php if($this->ion_auth->logged_in() && $owner) { ?>
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
						<?php } ?>
					</table>
					<br>
			  		<div class="form-group">
			  			<label for="text">Description</label>
						<textarea class="form-control" type="text" rows="5" name="description" placeholder="<?php echo $picture->description;?>"></textarea>
			    	</div>		
				</div>
				
				<div class="col-lg-6 col-md-6 col-xs-6">
				<br>
				</div>
			</div>
  		</div>
  	  	<div class="panel-footer">
	  		<div class="form-group">
	  			<label for="text">Tags(Eralda komaga, ilma tühikuta)</label>
	  			<input type="text" class="form-control" name="tags" placeholder="<?php echo implode(', ',$tags);?>">
	    	</div>
			<div class="table-responsive">
				<table class="table">
					<tr>
						<th>Kustuta tagid<th>
					<tr>
				    <?php for($i = 0; $i < count($tags); ++$i){?>
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

