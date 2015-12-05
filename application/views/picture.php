<div class="col-md-2 col-sm-4"></div>
<div class="container">
	<div class="panel panel-default">
  	  	<div class="panel-heading">
			<?php echo "<h3>".$picture->title."</h3><br>";?>
			<a class="btn btn-info" href="<?php echo site_url("edit/".$picture->id);?>">Muuda Andmeid</a>
			<a class="btn btn-warning" href="<?php echo $picture->location;?>">Täissuuruses</a>
		</div>
  	  	<div class="panel-body">
				<div class="col-lg-6 col-md-6 col-xs-12"><?php echo 'Kirjeldus: '.$picture->description;?></div>
					<div class="col-lg-7 col-md-6 col-xs-12"><?php echo 'Üleslaaditud: '.date("H:i:s d.m.Y",$picture->created);?></div>
					<?php if($picture->kihelkond != 'Kihelkond'){ ?>
						<div class="col-lg-8 col-md-6 col-xs-12"><?php echo 'Kihelkond: '.$picture->kihelkond;?></div>
						<?php } ?>
						<?php if($picture->koht != ''){ ?>
							<div class="col-lg-9 col-md-6 col-xs-12"><?php echo 'Koht: '.$picture->koht;?></div>
						<?php } ?>	
							<?php if($picture->fotograaf != ''){ ?>
								<div class="col-lg-10 col-md-6 col-xs-12"><?php echo 'Fotograaf: '.$picture->fotograaf;?></div>
							<?php } ?>	
								<?php if($picture->omanik != ''){ ?>
									<div class="col-lg-11 col-md-6 col-xs-12"><?php echo 'Omanik: '.$picture->omanik;?></div>
								<?php } ?>	
									<?php if($picture->varasem_omanik != ''){ ?>
										<div class="col-lg-12 col-md-6 col-xs-12"><?php echo 'Varasem Omanik: '.$picture->varasem_omanik;?></div>
									<?php } ?>	
										<?php if($picture->isikud_fotol != ''){ ?>
											<div class="col-lg-13 col-md-6 col-xs-12"><?php echo 'Isikud fotol: '.$picture->isikud_fotol;?></div>
										<?php } ?>	
											<?php if($picture->kuupaev != ''){ ?>
												<div class="col-lg-14 col-md-6 col-xs-12"><?php echo 'Kuupäev: '.$picture->kuupaev;?></div>
											<?php } ?>	
												<?php if($picture->ligikaudne_aeg != ''){ ?>
													<div class="col-lg-15 col-md-6 col-xs-12"><?php echo 'Ligikaudne aeg: '.$picture->ligikaudne_aeg;?></div>
												<?php } ?>	
													<?php if($picture->colored == 't'){ ?>
														<div class="col-lg-16 col-md-6 col-xs-12"><?php echo 'Värvid: Värvipilt';?></div>
													<?php } else { ?>	
														<div class="col-lg-16 col-md-6 col-xs-12"><?php echo 'Värvid: Mustvalge';?></div>
													<?php } ?>	
														<?php if($picture->digifoto == 't'){ ?>
															<div class="col-lg-17 col-md-6 col-xs-12"><?php echo 'Jäädvustamis viis: Digifoto';?></div>
														<?php } else { ?>	
															<div class="col-lg-17 col-md-6 col-xs-12"><?php echo 'Jäädvustamis viis: Digiteeritud foto';?></div>
														<?php } ?>	
															<div class="col-lg-18 col-md-6 col-xs-12"><?php echo 'Kvaliteet: '.$picture->kvaliteet;?></div>

							
							
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
