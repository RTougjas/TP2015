<?php if($this->ion_auth->logged_in() && $owner) { ?>
<?php $kihelkonnad = array('Alutaguse kihelkond','Ambla kihelkond','Anna kihelkond','Anseküla kihelkond','Audru kihelkond','Avinurme kihelkond','Emmaste kihelkond','Haapsalu kihelkond','Hageri kihelkond','Haljala kihelkond','Halliste kihelkond','Hanila kihelkond','Hargla kihelkond','Harju-Jaani kihelkond','Harju-Madise kihelkond','Helme kihelkond','Häädemeeste kihelkond','Iisaku kihelkond','Jaani kihelkond','Juuru kihelkond','Jõelähtme kihelkond','Jõhvi kihelkond','Jämaja kihelkond','Järva-Jaani kihelkond','Järva-Madise kihelkond','Jüri kihelkond','Kaarma kihelkond','Kadrina kihelkond','Kambja kihelkond','Kanepi kihelkond','Karja kihelkond','Karksi kihelkond','Karula kihelkond','Karuse kihelkond','Keila kihelkond','Kihelkonna kihelkond','Kodavere kihelkond','Koeru kihelkond','Kolga-Jaani kihelkond','Kose kihelkond','Kullamaa kihelkond','Kursi kihelkond','Kuusalu kihelkond','Kõpu kihelkond','Käina kihelkond','Kärla kihelkond','Laiuse kihelkond','Lemestvere kihelkond','Lihula kihelkond','Loppegunde kihelkond','Luke kihelkond','Lääne-Nigula kihelkond','Lüganuse kihelkond','Maarja-Magdaleena kihelkond','Martna kihelkond','Mihkli kihelkond','Muhu kihelkond','Mustjala kihelkond','Märjamaa kihelkond','Nissi kihelkond','Noarootsi kihelkond','Nõo kihelkond','Otepää kihelkond','Paide kihelkond','Paistu kihelkond','Palamuse kihelkond','Peetri kihelkond','Pilistvere kihelkond','Puhja kihelkond','Põltsamaa kihelkond','Põlva kihelkond','Pärnu-Jaagupi kihelkond','Pöide kihelkond','Pühalepa kihelkond','Rakvere kihelkond','Rannu kihelkond','Rapla kihelkond','Reigi kihelkond','Risti kihelkond','Ruhnu kihelkond','Rõngu kihelkond','Rõuge kihelkond','Räpina kihelkond','Saarde kihelkond','Sangaste kihelkond','Simuna kihelkond','Suure-Jaani kihelkond','Tartu-Maarja kihelkond','Tori kihelkond','Torma kihelkond','Tõstamaa kihelkond','Türi kihelkond','Urvaste kihelkond','Vaivara kihelkond','Valjala kihelkond','Varbla kihelkond','Vastseliina kihelkond','Vigala kihelkond','Viljandi kihelkond','Viru-Jaagupi kihelkond','Viru-Nigula kihelkond','Vormsi kihelkond','Võnnu kihelkond','Väike-Maarja kihelkond','Vändra kihelkond','Äksi kihelkond'); ?>
<div class="col-md-2 col-sm-4"></div>
<div class="container">
	<div class="panel panel-default">
  		<div class="panel-heading">
			<?php echo form_open('edit/do_edit/'.$this->uri->segment(2, 1));?>
			<div class="form-group">
				<label for="text">Pealkiri</label>
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
					<div class="form-group">
            <label for="fotograaf">Fotograaf</label>
               <?php echo '<input type="text" class="form-control" id="fotograaf" name="fotograaf" placeholder="'.$picture->fotograaf.'"';?> <?php if(isset($fotograaf)){ echo "value=".$fotograaf;} ?>>
            </div>

            <div class="form-group">
                <label for="omanik">Pildi Omanik</label>
                <?php echo '<input type="text" class="form-control" id="omanik" name="omanik" placeholder="'.$picture->omanik.'"';?> <?php if(isset($omanik)){ echo "value=".$omanik;} ?>>
            </div>

            <div class="form-group">
                <label for="varasem_omanik">Varasem Omanik</label>
                <?php echo '<input type="text" class="form-control" id="varasem_omanik" name="varasem_omanik" placeholder="'.$picture->varasem_omanik.'"';?> <?php if(isset($varasem_omanik)){ echo "value=".$varasem_omanik;} ?>>
            </div>

            <div class="form-group">
                <label for="isikud_fotol">Isikud fotol</label>
                <?php echo '<input type="text" class="form-control" id="isikud_fotol" name="isikud_fotol" placeholder="'.$picture->isikud_fotol.'"';?> <?php if(isset($isikud_fotol)){ echo "value=".$isikud_fotol;} ?>>
            </div>

            <div class="form-group">
                <label for="kuupaev">Kuupäev</label>
                <?php echo '<input type="text" class="form-control" id="kuupaev" name="kuupaev" placeholder='.$picture->kuupaev;?> <?php if(isset($kuupaev)){ echo "value=".$kuupaev;} ?>>
            </div>

            <div class="form-group">
                <label for="ligikaudne_aeg">Ligikaudne aeg</label>
                <?php echo '<input type="text" class="form-control" id="ligikaudne_aeg" name="ligikaudne_aeg" placeholder="'.$picture->ligikaudne_aeg.'"';?> <?php if(isset($ligikaudne_aeg)){ echo "value=".$ligikaudne_aeg;} ?>>
            </div>

            <div class="form-group">
            	<select class="form-control" name="kihelkond">
            		<?php echo '<option value="">Kihelkond</option>' ;?>
            		<?php foreach($kihelkonnad as $kihelkond){?>
						<?php if($picture->kihelkond == $kihelkond){?>
            				<?php echo '<option value="'.$kihelkond.'" selected="selected">'.$kihelkond.'</option>'?>
						<?php } else { ?>
							<?php echo '<option value="'.$kihelkond.'">'.$kihelkond.'</option>';?>
            			<?php } ?>
					<?php } ?>
            	</select>
            </div>
            <div class="form-group">
                <label for="koht">Koht</label>
                <?php echo '<input type="text" class="form-control" id="koht" name="koht" placeholder="'.$picture->koht.'"';?> <?php if(isset($koht)){ echo "value=".$koht;} ?>
            </div>
		</div>
			
            <div class="form-group">
				<label for="kvaliteet">Kvaliteet</label>
            	<select class="form-control" name="kvaliteet">
            <option value="">Kvaliteet</option>
            <?php if($picture->kvaliteet == 'hea' || $picture->kvaliteet == 'Hea') { ?>
					 <option value="Hea" selected="selected">Hea</option>
				<?php } else { ?>
					<option value="Hea">Hea</option>
			<?php } ?>	
			<?php if($picture->kvaliteet == 'keskmine' || $picture->kvaliteet == 'Keskmine') { ?>
					 <option value="Keskmine" selected="selected">Keskmine</option>
				<?php } else { ?>
					<option value="Keskmine">Keskmine</option>
			<?php } ?>	
			<?php if($picture->kvaliteet == 'halb' || $picture->kvaliteet == 'Halb') { ?>
					 <option value="Halb" selected="selected">Halb</option>
				<?php } else { ?>
					<option value="Halb">Halb</option>
			<?php } ?>	
            </select>
            </div>

            <div class="form-group">
            <select class="form-control" name="colored">
			<?php if($picture->colored == 'true') { ?>
					 <option value="true" selected="selected">Värvifoto</option>
				<?php } else { ?>
					<option value="true">Värvifoto</option>
			<?php } ?>
			<?php if($picture->colored == 'false') { ?>
					 <option value="false" selected="selected">Mustvalge foto</option>
				<?php } else { ?>
					<option value="false">Mustvalge foto</option>
			<?php } ?>	
            </select>
            </div>

            <div class="form-group">
            <select class="form-control" name="digifoto">
			<?php if($picture->digifoto == 'true') { ?>
					 <option value="true" selected="selected">Digifoto</option>
				<?php } else { ?>
					<option value="true">Digifoto</option>
			<?php } ?>
			<?php if($picture->digifoto == 'false') { ?>
					 <option value="false" selected="selected">Digiteeritud foto</option>
				<?php } else { ?>
					<option value="false">Digiteeritud foto</option>
			<?php } ?>
            </select>
            </div>

					<br>
			  		<div class="form-group">
			  			<label for="text">Pildi kirjeldus</label>
						<textarea class="form-control" type="text" rows="5" name="description" ><?php echo $picture->description;?></textarea>
			    	</div>		
				</div>
				<div class="col-lg-6 col-md-6 col-xs-12">
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
												</tr>
											<?php } ?>
										<?php } ?>
									<?php } else {?>
										<td>
											<input type="checkbox" name="albumsChecked[]" value="<?php echo $albums[$i]->id;?>" >
										</td>
										</tr>
									<?php } ?> <!-- } else { -->
							<?php }?> <!-- for( ; sizeOf($albums); )-->
						</table>
					<?php } ?> <!-- if(owner) -->

				</div>
			</div>
  		</div>
  	  	<div class="panel-footer">
	  		<div class="form-group">
	  			<label for="text">Märksõnad (Eralda komaga)</label>
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
			</div> <!-- div class=table-responsive -->
		</div>
		<button type="submit" class="btn btn-success btn-block">Salvesta</button>
	</div>
</div>
<div class="col-md-2 col-sm-4"></div>
<?php } ?>