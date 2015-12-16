<?php $kihelkonnad = array('Alutaguse kihelkond','Ambla kihelkond','Anna kihelkond','Anseküla kihelkond','Audru kihelkond','Avinurme kihelkond','Emmaste kihelkond','Haapsalu kihelkond','Hageri kihelkond','Haljala kihelkond','Halliste kihelkond','Hanila kihelkond','Hargla kihelkond','Harju-Jaani kihelkond','Harju-Madise kihelkond','Helme kihelkond','Häädemeeste kihelkond','Iisaku kihelkond','Jaani kihelkond','Juuru kihelkond','Jõelähtme kihelkond','Jõhvi kihelkond','Jämaja kihelkond','Järva-Jaani kihelkond','Järva-Madise kihelkond','Jüri kihelkond','Kaarma kihelkond','Kadrina kihelkond','Kambja kihelkond','Kanepi kihelkond','Karja kihelkond','Karksi kihelkond','Karula kihelkond','Karuse kihelkond','Keila kihelkond','Kihelkonna kihelkond','Kodavere kihelkond','Koeru kihelkond','Kolga-Jaani kihelkond','Kose kihelkond','Kullamaa kihelkond','Kursi kihelkond','Kuusalu kihelkond','Kõpu kihelkond','Käina kihelkond','Kärla kihelkond','Laiuse kihelkond','Lemestvere kihelkond','Lihula kihelkond','Loppegunde kihelkond','Luke kihelkond','Lääne-Nigula kihelkond','Lüganuse kihelkond','Maarja-Magdaleena kihelkond','Martna kihelkond','Mihkli kihelkond','Muhu kihelkond','Mustjala kihelkond','Märjamaa kihelkond','Nissi kihelkond','Noarootsi kihelkond','Nõo kihelkond','Otepää kihelkond','Paide kihelkond','Paistu kihelkond','Palamuse kihelkond','Peetri kihelkond','Pilistvere kihelkond','Puhja kihelkond','Põltsamaa kihelkond','Põlva kihelkond','Pärnu-Jaagupi kihelkond','Pöide kihelkond','Pühalepa kihelkond','Rakvere kihelkond','Rannu kihelkond','Rapla kihelkond','Reigi kihelkond','Risti kihelkond','Ruhnu kihelkond','Rõngu kihelkond','Rõuge kihelkond','Räpina kihelkond','Saarde kihelkond','Sangaste kihelkond','Simuna kihelkond','Suure-Jaani kihelkond','Tartu-Maarja kihelkond','Tori kihelkond','Torma kihelkond','Tõstamaa kihelkond','Türi kihelkond','Urvaste kihelkond','Vaivara kihelkond','Valjala kihelkond','Varbla kihelkond','Vastseliina kihelkond','Vigala kihelkond','Viljandi kihelkond','Viru-Jaagupi kihelkond','Viru-Nigula kihelkond','Vormsi kihelkond','Võnnu kihelkond','Väike-Maarja kihelkond','Vändra kihelkond','Äksi kihelkond'); ?>
<div class="col-lg-5 col-md-4 col-sm-4"></div>
<div class="col-lg-3 col-md-4 col-sm-4">
	<?php if($this->ion_auth->logged_in()) {?>
		<?php if(sizeOf($this->session->flashdata('info')) > 0) {?>
			<div class="alert alert-success" role="alert">
				<?php echo $this->session->flashdata('info'); ?>
			</div>
		<?php } ?>
		<?php echo form_open('gallery/create_album');?>
		<h3>Lisa album</h3>
            <div class="form-group">
                <label for="text">Albumi pealkiri</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Pealkiri">
            </div>
            <div class="form-group">
                <label for="text">Albumi kirjeldus</label>
                <input type="text" class="form-control" id="description" name="description" placeholder="Kirjeldus">
            </div>
	        <div class="form-group">
	            <label for="ligikaudne_aeg">Ligikaudne aeg</label>
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
	            <label for="koht">Koht</label>
	            <input type="text" class="form-control" id="koht" name="koht" placeholder="Koht">
	        </div>
	        <div class="form-group">
	            <label for="varasem_omanik">Albumi varasem Omanik</label>
	            <input type="text" class="form-control" id="albumi_varasem_omanik" name="albumi_varasem_omanik" placeholder="Albumi varasem Omanik">
	        </div>
            <br>
            <input type="submit" class="btn btn-primary" value="Loo album">
	<?php } else {
		redirect('/auth/login');
	}?>
</div>
<div class="col-lg-5 col-md-4 col-sm-4"></div>