
<div class="col-lg-5 col-md-4 col-sm-4"></div>
<div class="col-lg-3 col-md-4 col-sm-4">
	<?php if($this->ion_auth->logged_in()) {
        if(isset($error)){
            echo $error;
        }?>
		<?php $kihelkonnad = array('Alutaguse kihelkond','Ambla kihelkond','Anna kihelkond','Anseküla kihelkond','Audru kihelkond','Avinurme kihelkond','Emmaste kihelkond','Haapsalu kihelkond','Hageri kihelkond','Haljala kihelkond','Halliste kihelkond','Hanila kihelkond','Hargla kihelkond','Harju-Jaani kihelkond','Harju-Madise kihelkond','Helme kihelkond','Häädemeeste kihelkond','Iisaku kihelkond','Jaani kihelkond','Juuru kihelkond','Jõelähtme kihelkond','Jõhvi kihelkond','Jämaja kihelkond','Järva-Jaani kihelkond','Järva-Madise kihelkond','Jüri kihelkond','Kaarma kihelkond','Kadrina kihelkond','Kambja kihelkond','Kanepi kihelkond','Karja kihelkond','Karksi kihelkond','Karula kihelkond','Karuse kihelkond','Keila kihelkond','Kihelkonna kihelkond','Kodavere kihelkond','Koeru kihelkond','Kolga-Jaani kihelkond','Kose kihelkond','Kullamaa kihelkond','Kursi kihelkond','Kuusalu kihelkond','Kõpu kihelkond','Käina kihelkond','Kärla kihelkond','Laiuse kihelkond','Lemestvere kihelkond','Lihula kihelkond','Loppegunde kihelkond','Luke kihelkond','Lääne-Nigula kihelkond','Lüganuse kihelkond','Maarja-Magdaleena kihelkond','Martna kihelkond','Mihkli kihelkond','Muhu kihelkond','Mustjala kihelkond','Märjamaa kihelkond','Nissi kihelkond','Noarootsi kihelkond','Nõo kihelkond','Otepää kihelkond','Paide kihelkond','Paistu kihelkond','Palamuse kihelkond','Peetri kihelkond','Pilistvere kihelkond','Puhja kihelkond','Põltsamaa kihelkond','Põlva kihelkond','Pärnu-Jaagupi kihelkond','Pöide kihelkond','Pühalepa kihelkond','Rakvere kihelkond','Rannu kihelkond','Rapla kihelkond','Reigi kihelkond','Risti kihelkond','Ruhnu kihelkond','Rõngu kihelkond','Rõuge kihelkond','Räpina kihelkond','Saarde kihelkond','Sangaste kihelkond','Simuna kihelkond','Suure-Jaani kihelkond','Tartu-Maarja kihelkond','Tori kihelkond','Torma kihelkond','Tõstamaa kihelkond','Türi kihelkond','Urvaste kihelkond','Vaivara kihelkond','Valjala kihelkond','Varbla kihelkond','Vastseliina kihelkond','Vigala kihelkond','Viljandi kihelkond','Viru-Jaagupi kihelkond','Viru-Nigula kihelkond','Vormsi kihelkond','Võnnu kihelkond','Väike-Maarja kihelkond','Vändra kihelkond','Äksi kihelkond'); ?>
		<?php echo validation_errors(); ?>
		<?php echo form_open_multipart('upload/do_upload');?>
		<h3>Lisa pilt</h3>
			<form>
      			<div class="form-group">
        			<label for="text">Pildi pealkiri</label>
        			<input type="text" class="form-control" id="title" name="title" placeholder="Pealkiri">
      	  		</div>
				
      	  		<div class="form-group">
        			<label for="text">Pildi kirjeldus</label>
        			<input type="text" class="form-control" id="description" name="description" placeholder="Kirjeldus">
     	   		</div>
				
				<div class="form-group">
        			<label for="text">Fotograaf</label>
        			<input type="text" class="form-control" id="fotograaf" name="fotograaf" placeholder="Fotograaf">
     	   		</div>
				
				<div class="form-group">
        			<label for="text">Pildi Omanik</label>
        			<input type="text" class="form-control" id="omanik" name="omanik" placeholder="Omanik">
     	   		</div>
				
				<div class="form-group">
        			<label for="text">Varasem Omanik</label>
        			<input type="text" class="form-control" id="varasem_omanik" name="varasem_omanik" placeholder="Varasem Omanik">
     	   		</div>
				
				<div class="form-group">
        			<label for="text">Isikud fotol</label>
        			<input type="text" class="form-control" id="isikud_fotol" name="isikud_fotol" placeholder="Eraldage komaga">
     	   		</div>
				
				<div class="form-group">
        			<label for="text">Kuupäev</label>
        			<input type="text" class="form-control" id="kuupaev" name="kuupaev" placeholder="AAAA või AAAA-KK või AAAA-KK-PP">
     	   		</div>
				
				<div class="form-group">
        			<label for="text">Ligikaudne aeg</label>
        			<input type="text" class="form-control" id="ligikaudne_aeg" name="ligikaudne_aeg" placeholder="Aeg omasõnadega">
     	   		</div>
				
				<div class="form-group">
				<select class="form-control" name="kihelkond">
				<?php echo '<option value="">Kihelkond</option>' ?>
				<?php foreach($kihelkonnad as $kihelkond){?>
				<?php echo '<option value="'.$kihelkond.'">'.$kihelkond.'</option>'?>
				<?php } ?>
				</select>
				</div>
				
				<div class="form-group">
        			<label for="text">Koht</label>
        			<input type="text" class="form-control" id="koht" name="koht" placeholder="Koht">
     	   		</div>
				
      	  		<div class="form-group">
        			<label for="text">Märksõnad</label>
        			<input type="text" class="form-control" id="tags" name="tags" placeholder="Eraldage komaga">
     	   		</div>
				
				<div class="form-group">
				<select class="form-control" name="kvaliteet">
				<option value="">Kvaliteet</option>
				<option value="hea">Hea</option>
				<option value="keskmine">Keskmine</option>
				<option value="halb">Halb</option>
				</select>
				</div>
				
				<div class="form-group">
				<select class="form-control" name="colored">
				<option value="true">Värvifoto</option>
				<option value="false">Mustvalge foto</option>
				</select>
				</div>
				
				<div class="form-group">
				<select class="form-control" name="digifoto">
				<option value="true">Digifoto</option>
				<option value="false">Digiteeritud foto</option>
				</select>
				</div>
				
      	 		<div class="form-group">
        			<label for="fileInput">Lisa failina</label>
        			<input type="file" id="userfile" name="userfile" size="20">
       				<p class="help-block">.jpg .png .gif .tif .tiff</p>
      			</div>
				<div class="row">
					<table class="table">
						<tr>
							<td>kommentaarid lubatud</td>
							<td><input type="checkbox" id="comments" name="comments" value='true' checked></td>
						</tr>
						<tr>
							<td>Avalik pilt</td>
							<td><input type="checkbox" id="ispublic" name="ispublic" value='true' checked></td>
						</tr>
					</table>
				</div>
				<br>
      	  		<input type="submit" class="btn btn-primary" value="Lae pilt">
				<br>
    	</form>
		<br>
	<?php } else {
		$this->session->set_flashdata('uploadAttempt', uri_string());
		redirect('/auth/login');
	}?>
</div>
<div class="col-lg-5 col-md-4 col-sm-4"></div>
