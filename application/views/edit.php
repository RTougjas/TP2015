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