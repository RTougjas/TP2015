
<div class="col-lg-5 col-md-4 col-sm-4"></div>
<div class="col-lg-3 col-md-4 col-sm-4">
    <h3><?php echo lang('change_password_heading');?></h3>

    <div id="infoMessage"><?php echo $message;?></div>

    <?php echo form_open("auth/change_password");?>
        <div class="form-group">
            <label for="old_password"><?php echo lang('change_password_old_password_label', 'old_password');?></label>
            <input type="password" class="form-control" id="old" name="old">
        </div>
        <div class="form-group">
            <label for="new_password"><?php echo sprintf(lang('change_password_new_password_label'), $min_password_length);?></label>
            <input type="password" class="form-control" id="new" name="new">
        </div>
        <div class="form-group">
            <label for="new_password_confirm"><?php echo lang('change_password_new_password_confirm_label', 'new_password_confirm');?></label>
            <input type="password" class="form-control" id="new_confirm" name="new_confirm">
        </div>
        <?php echo form_input($user_id);?>
        <input type="submit" class="btn btn-primary" value="Muuda parool">

    <?php echo form_close();?>
</div>
<div class="col-lg-5 col-md-4 col-sm-4"></div>
