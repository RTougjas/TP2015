<div class="col-md-2 col-sm-4"></div>
<div class="container">
	<div class="panel panel-default">
  	  	<div class="panel-heading"><?php echo "<h3>".$picture->title."</h3><br>";?></div>
  	  	<div class="panel-body">
	  	  	<?php echo '<a href='.site_url("edit/".$picture->id).'>Muuda pildi andmeid</a>';?>
					<div class="row">
					  <div class="col-lg-4 col-md-4"><?php echo '<img src="'.$picture->location.'" alt="borked">';?></div>
					  <div class="col-lg-4 col-md-4"><?php echo "Description: ".$picture->description;?></div>
					  <div class="col-lg-4 col-md-4"></div>
					</div>
  		</div>
  	  	<div class="panel-footer"><?php echo implode(', ',$tags);?><br></div>
	</div>
	<div class="panel-group">
  	  	<div class="panel panel-default">
    		<div class="panel-heading">
      		  	<h4 class="panel-title">
        			<a data-toggle="collapse" href="#collapse1">Kommentaarid<?php echo '('.count($comments).')'; ?></a>
      		  	</h4>
   		 	</div>
    		<div id="collapse1" class="panel-collapse collapse">
      		  	<ul class="list-group">
        			<li class="list-group-item">
        				<?php for($i = 0; $i < count($comments); ++$i){?>
							<div class="panel panel-default">
				  			  	<div class="panel-heading">
				    				<h3 class="panel-title"><?php echo $comments[$i][0];?></h3>
				  			  	</div>
				  			  	<div class="panel-body" style="text:word-wrap"><?php echo $comments[$i][1]; ?></div>
				  			  	<div class="panel-footer"><?php echo date("H:m d-m-Y", $comments[$i][2]); ?></div>
							</div>	
						<?php }?>
        			</li>
				</ul>
    		</div>
  	  	</div>
	</div>
	<?php echo form_open('picture/comment/'.$this->uri->segment(2, 1));?>
	<div class="form-group">
		<div class="col-lg-5 col-cs-offset-5">
			<form>
  	  			<label for="comment">Kommenteeri:</label>
  				<textarea class="form-control" type="text" rows="5" id="comment" name="comment"></textarea>
				<input type="submit" class="btn btn-primary" value="kommenteeri">
			</form>
		</div>
	</div>
</div>
<div class="col-md-2 col-sm-4"></div>