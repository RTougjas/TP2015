
<div class="col-lg-5 col-md-4 col-sm-4"></div>
<div class="col-lg-3 col-md-4 col-sm-4">
    <h3><?php echo lang('create_user_heading');?></h3>
    <div id="infoMessage"><?php echo $message;?></div>
    <?php echo form_open('auth/create_user')?>
        <div class="form-group">
            <label for="text">Kasutajanimi</label>
            <input type="text" class="form-control" id="identity" name="identity" placeholder="kasutajanimi">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="text">Eesnimi</label>
            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Eesnimi">
        </div>
        <div class="form-group">
            <label for="text">Perenimi</label>
            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Perenimi">
        </div>
        <div class="form-group">
            <label for="telephone">Telefoninumber</label>
            <input type="integer" class="form-control" id="telephone" name="telephone" placeholder="Telefoninumber">
        </div>
        <div class="form-group">
            <label for="location">Elukoht</label>
            <input type="text" class="form-control" id="location" name="location" placeholder="Elukoht">
        </div>
        <div class="form-group">
            <label for="password">Parool (Peab olema vähemalt 8 märki pikk)</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Parool">
        </div>
        <div class="form-group">
            <label for="password">Parool uuesti</label>
            <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Parool uuesti">
        </div>
        <?php echo $recaptcha_html; ?> 
        <input type="submit" class="btn btn-primary" value="Loo kasutaja">
</div>
<div class="col-lg-5 col-md-4 col-sm-4"></div>