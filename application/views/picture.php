<div class="col-md-2 col-sm-4"></div>
<div class="container">
	<div class="panel panel-default">
  	  	<div class="panel-heading"><?php echo "<h3>".$picture->title."</h3><br>";?></div>
  	  	<div class="panel-body">
					<div class="row">
					  <div class="col-lg-6 col-md-6 col-xs-12">
						  	<?php echo '<img src="'.$picture->location.'" class="img-responsive">';?>
					  		<br>
							<a class="btn btn-info" href="<?php echo site_url("edit/".$picture->id);?>">Andmed</a>
							<a class="btn btn-warning" href="<?php echo $picture->location;?>">Täismõõdus</a>
							<a class="btn btn-danger" href="#">Kustuta</a>
					  </div>
					  <div class="col-lg-6 col-md-6 col-xs-6"><?php echo "<br>Description: ".$picture->description;?></div>
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
								<h3 class="panel-title">
								<?php if ($comments[$i][0] == 'anonüümne'){?>
									<?php echo $comments[$i][0];?></h3>
								<?php } else { ?>
				    				<a href="<?php echo site_url('/profile/'.urlencode($comments[$i][0]));?>">
									<?php echo $comments[$i][0];?></a></h3>
							<?php }?>
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
	<?php if($this->ion_auth->logged_in()) {?>
		<?php echo form_open('picture/comment/'.$this->uri->segment(2, 1));?>
		<div class="form-group">
			<div class="col-lg-5 col-cs-offset-5">
				<form>
  	  				<label for="comment">Kommenteeri:</label>
  					<textarea class="form-control" type="text" rows="5" id="comment" name="comment"></textarea>
					<br>
					<input type="submit" class="btn btn-primary" value="kommenteeri">
				</form>
			</div>
		</div>
	<?php } ?>
</div>
<div class="col-md-2 col-sm-4"></div>
