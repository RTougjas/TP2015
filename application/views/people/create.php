
<div class="col-lg-5 col-md-4 col-sm-4"></div>
<div class="col-lg-3 col-md-4 col-sm-4">
    <?php if(isset($error) && strlen($error) > 0){ ?>
		<div class="alert alert-danger" role="alert">
			<?php echo $error;?>
		</div>
	<?php } else if(isset($success)) { ?>
		<div class="alert alert-success" role="alert">
			<?php echo $success;?>
		</div>
    <?php }?>
		<?php $kihelkonnad = array('Alutaguse kihelkond','Ambla kihelkond','Anna kihelkond','Anseküla kihelkond','Audru kihelkond','Avinurme kihelkond','Emmaste kihelkond','Haapsalu kihelkond','Hageri kihelkond','Haljala kihelkond','Halliste kihelkond','Hanila kihelkond','Hargla kihelkond','Harju-Jaani kihelkond','Harju-Madise kihelkond','Helme kihelkond','Häädemeeste kihelkond','Iisaku kihelkond','Jaani kihelkond','Juuru kihelkond','Jõelähtme kihelkond','Jõhvi kihelkond','Jämaja kihelkond','Järva-Jaani kihelkond','Järva-Madise kihelkond','Jüri kihelkond','Kaarma kihelkond','Kadrina kihelkond','Kambja kihelkond','Kanepi kihelkond','Karja kihelkond','Karksi kihelkond','Karula kihelkond','Karuse kihelkond','Keila kihelkond','Kihelkonna kihelkond','Kodavere kihelkond','Koeru kihelkond','Kolga-Jaani kihelkond','Kose kihelkond','Kullamaa kihelkond','Kursi kihelkond','Kuusalu kihelkond','Kõpu kihelkond','Käina kihelkond','Kärla kihelkond','Laiuse kihelkond','Lemestvere kihelkond','Lihula kihelkond','Loppegunde kihelkond','Luke kihelkond','Lääne-Nigula kihelkond','Lüganuse kihelkond','Maarja-Magdaleena kihelkond','Martna kihelkond','Mihkli kihelkond','Muhu kihelkond','Mustjala kihelkond','Märjamaa kihelkond','Nissi kihelkond','Noarootsi kihelkond','Nõo kihelkond','Otepää kihelkond','Paide kihelkond','Paistu kihelkond','Palamuse kihelkond','Peetri kihelkond','Pilistvere kihelkond','Puhja kihelkond','Põltsamaa kihelkond','Põlva kihelkond','Pärnu-Jaagupi kihelkond','Pöide kihelkond','Pühalepa kihelkond','Rakvere kihelkond','Rannu kihelkond','Rapla kihelkond','Reigi kihelkond','Risti kihelkond','Ruhnu kihelkond','Rõngu kihelkond','Rõuge kihelkond','Räpina kihelkond','Saarde kihelkond','Sangaste kihelkond','Simuna kihelkond','Suure-Jaani kihelkond','Tartu-Maarja kihelkond','Tori kihelkond','Torma kihelkond','Tõstamaa kihelkond','Türi kihelkond','Urvaste kihelkond','Vaivara kihelkond','Valjala kihelkond','Varbla kihelkond','Vastseliina kihelkond','Vigala kihelkond','Viljandi kihelkond','Viru-Jaagupi kihelkond','Viru-Nigula kihelkond','Vormsi kihelkond','Võnnu kihelkond','Väike-Maarja kihelkond','Vändra kihelkond','Äksi kihelkond'); ?>
    <?php echo form_open('profile/create_person');?>
    <h3>Loo isik</h3>
        <div class="form-group">
            <label for="name">Nimi</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nimi" <?php if(isset($name)){ echo "value=".$name;} ?>>
        </div>

        <div class="form-group">
            <label for="birthday">Sünniaeg</label>
            <input type="text" class="form-control" id="birthday" name="birthday" placeholder="AAAA-KK-PP" <?php if(isset($birthday)){ echo "value=".$birthday;} ?>>
        </div>
    
        <div class="form-group">
            <select class="form-control" name="location">
            <?php echo '<option value="">Kihelkond</option>' ?>
            <?php foreach($kihelkonnad as $kihelkond){?>
            <?php echo '<option value="'.$kihelkond.'">'.$kihelkond.'</option>'?>
            <?php } ?>
            </select>
        </div>

		<div class="form-group">
            <label for="life">Elulugu:</label>
            <textarea class="form-control" type="text" rows="5" id="life" name="life" <?php if(isset($life)){ echo "value=".$life;} ?>></textarea>
        </div>
        <div class="row">
            <table class="table">
                <tr>
                    <td>Luba eluloo lisamine</td>
                    <td><input type="checkbox" id="comments" name="comments" value='true' checked></td>
                </tr>
            </table>
        </div>

        <br>
        <input type="submit" class="btn btn-primary" value="Loo isik">
        <br>
    </form>
    <br>
</div>
<div class="col-lg-5 col-md-4 col-sm-4"></div>
