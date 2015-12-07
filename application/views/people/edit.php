<?php if($this->ion_auth->is_admin()) { ?>
<?php $kihelkonnad = array('Alutaguse kihelkond','Ambla kihelkond','Anna kihelkond','Anseküla kihelkond','Audru kihelkond','Avinurme kihelkond','Emmaste kihelkond','Haapsalu kihelkond','Hageri kihelkond','Haljala kihelkond','Halliste kihelkond','Hanila kihelkond','Hargla kihelkond','Harju-Jaani kihelkond','Harju-Madise kihelkond','Helme kihelkond','Häädemeeste kihelkond','Iisaku kihelkond','Jaani kihelkond','Juuru kihelkond','Jõelähtme kihelkond','Jõhvi kihelkond','Jämaja kihelkond','Järva-Jaani kihelkond','Järva-Madise kihelkond','Jüri kihelkond','Kaarma kihelkond','Kadrina kihelkond','Kambja kihelkond','Kanepi kihelkond','Karja kihelkond','Karksi kihelkond','Karula kihelkond','Karuse kihelkond','Keila kihelkond','Kihelkonna kihelkond','Kodavere kihelkond','Koeru kihelkond','Kolga-Jaani kihelkond','Kose kihelkond','Kullamaa kihelkond','Kursi kihelkond','Kuusalu kihelkond','Kõpu kihelkond','Käina kihelkond','Kärla kihelkond','Laiuse kihelkond','Lemestvere kihelkond','Lihula kihelkond','Loppegunde kihelkond','Luke kihelkond','Lääne-Nigula kihelkond','Lüganuse kihelkond','Maarja-Magdaleena kihelkond','Martna kihelkond','Mihkli kihelkond','Muhu kihelkond','Mustjala kihelkond','Märjamaa kihelkond','Nissi kihelkond','Noarootsi kihelkond','Nõo kihelkond','Otepää kihelkond','Paide kihelkond','Paistu kihelkond','Palamuse kihelkond','Peetri kihelkond','Pilistvere kihelkond','Puhja kihelkond','Põltsamaa kihelkond','Põlva kihelkond','Pärnu-Jaagupi kihelkond','Pöide kihelkond','Pühalepa kihelkond','Rakvere kihelkond','Rannu kihelkond','Rapla kihelkond','Reigi kihelkond','Risti kihelkond','Ruhnu kihelkond','Rõngu kihelkond','Rõuge kihelkond','Räpina kihelkond','Saarde kihelkond','Sangaste kihelkond','Simuna kihelkond','Suure-Jaani kihelkond','Tartu-Maarja kihelkond','Tori kihelkond','Torma kihelkond','Tõstamaa kihelkond','Türi kihelkond','Urvaste kihelkond','Vaivara kihelkond','Valjala kihelkond','Varbla kihelkond','Vastseliina kihelkond','Vigala kihelkond','Viljandi kihelkond','Viru-Jaagupi kihelkond','Viru-Nigula kihelkond','Vormsi kihelkond','Võnnu kihelkond','Väike-Maarja kihelkond','Vändra kihelkond','Äksi kihelkond'); ?>
<div class="col-md-2 col-sm-4"></div>
<div class="container">
	<div class="panel panel-default">
  		<div class="panel-heading">
			<?php echo form_open('edit/edit_person/'.$this->uri->segment(3, 1));?>
			<div class="form-group">
				<label for="name">Nimi</label>
				<input type="text" class="form-control" name="name" placeholder="<?php echo $person->name;?>" <?php if(isset($name)){ echo "value=".$name;} ?>>
  			</div>
            <?php if(isset($error)){
                echo $error;
            }?>
		</div>
  	  	<div class="panel-body">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-xs-12">

            <div class="form-group">
            <label for="birthday">Sünniaeg</label>
               <?php echo '<input type="text" class="form-control" id="birthday" name="birthday" placeholder="AAAA-KK-PP"';?> <?php if(isset($person->birthday)){ echo "value=".$person->birthday;} ?>>
            </div>


            <div class="form-group">
                <label for="location">Elukoht</label>
                <select class="form-control" name="location">
                    <?php echo '<option value="">Kihelkond</option>';
                    foreach($kihelkonnad as $kihelkond){
                        if($person->location == $kihelkond){
                            echo '<option value="'.$kihelkond.'" selected="selected">'.$kihelkond.'</option>';
                        } else {
                            echo '<option value="'.$kihelkond.'">'.$kihelkond.'</option>';
                        } 
                    } ?>
                </select>
            </div>
            <table class="table">
                <tr>
                    <td>Luba eluloo lisamist</td>
                        <?php if($person->enabled == 't') { ?>
                            <td><input type="checkbox" name="enabled" value="true" checked><br /></td>
                    <?php } else { ?>
                            <td><input type="checkbox" name="enabled" value="true"><br /></td>
                    <?php } ?>
                </tr>
            </table>
        </div>
		<button type="submit" class="btn btn-success btn-block">Salvesta</button>
	</div>
</div>
<div class="col-md-2 col-sm-4"></div>
<?php } ?>