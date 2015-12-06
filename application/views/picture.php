<div class="col-md-2 col-sm-4"></div>
<div class="container">
	<div class="panel panel-default">
  	  	<div class="panel-heading">
			<?php echo "<h3>".$picture->title."</h3><br>";?>
			<a class="btn btn-info" href="<?php echo site_url("edit/".$picture->id);?>">Muuda Andmeid</a>
			<a class="btn btn-warning" href="<?php echo $picture->location;?>">Täissuuruses</a>
		</div>
  	  	<div class="panel-body">
			<div class="col-lg-6 col-md-6 col-xs-12">
				<table class="table">
					<br>
					<ul class="list-group">
						<?php if($picture->omanik != ''){ ?>
							<li class="list-group-item">Omanik <?php echo '<b>'.$picture->omanik.'</b>';?></li>
						<?php } ?>
						<?php if($picture->varasem_omanik != ''){ ?>
							<li class="list-group-item">varasem omanik <?php echo '<b>'.$picture->varasem_omanik.'</b>';?></li>
						<?php } ?>
					  <li class="list-group-item">Laetud <?php echo '<b>'.date("H:i:s d.m.Y",$picture->created).'</b>';?></li>
					</ul>

					<tr>
						<?php if($picture->kihelkond != ''){ ?>
							<td>Kihelkond <?php echo $picture->kihelkond;?></td>
						<?php } ?>
					</tr>
					<tr>
						<?php if($picture->koht != ''){ ?>
							<td>Koht <?php echo '<b>'.$picture->koht.'</b>';?></td>
						<?php } ?>	
					</tr>
					<tr>
						<?php if($picture->fotograaf != ''){ ?>
							<td>Fotograaf <?php echo '<b>'.$picture->fotograaf.'</b>';?></td>
						<?php } ?>
					</tr>
					<tr>
						<?php if($picture->isikud_fotol != ''){ ?>
							<td>Isikud fotol <?php echo '<b>'.$picture->isikud_fotol.'</b>';?></td>
						<?php } ?>
					</tr>
					<tr>
						<?php if($picture->kuupaev != ''){ ?>
							<td>Kuupäev <?php echo '<b>'.$picture->kuupaev.'</b>';?></td>
						<?php } ?>
					</tr>
					<tr>
						<?php if($picture->ligikaudne_aeg != ''){ ?>
							<td>Ligikaudne aeg <?php echo '<b>'.$picture->ligikaudne_aeg.'</b>';?></td>
						<?php } ?>
					</tr>		
					<tr>
						<?php if($picture->colored == 't'){ ?>
							<td><b>Värviline </b>
						<?php } else { ?>	
							<td><b>Mustvalge </b>
						<?php } ?>
						<?php if($picture->digifoto == 't'){ ?>
							<b>Digifoto</b></td>
						<?php } else { ?>	
							<b>Digiteeritud foto</b></td>
						<?php } ?>
					</tr>
					<tr>
						<td>Kvaliteet <?php echo '<b>'.$picture->kvaliteet.'</b>';?></td>
					</tr>
				</table>
				<br>
				<table>
					<tr>
						<th><h4>Kirjeldus</h4></th>
					</tr>
					<tr>
						<td><?php echo $picture->description;?></td>
					</tr>
				</table>
			</div>
				<div class="row">
					<div class="col-lg-6 col-md-6 col-xs-12">
						<br>
						<?php echo '<img src="'.$picture->location.'" class="img-responsive">';?>
						</div>
					</div>
  		</div>
  	  	<div class="panel-footer"><?php echo implode(', ',$tags);?><br></div>
	</div>
	<?php if ($picture->comments_enabled == 't'){?>
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
				  			  	<div class="panel-footer"><?php echo date("H:i:s d.m.Y", $comments[$i][2]); ?></div>
							</div>	
							<?php }?>
					<?php } else { ?>
						<div class="panel-group">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										Kommenteerimine on selle pildi jaoks väljalülitatud.
									</h4>
						</div>					
						<?php }?>
        			</li>
				</ul>
    		</div>
  	  	</div>
	</div>
	<?php if($this->ion_auth->logged_in() && $picture->comments_enabled == 't') {?>
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
