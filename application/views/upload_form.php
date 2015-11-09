


<?php echo form_open_multipart('upload/do_upload');?>
<div class = "form-container" >
    Title: <input type="text" name="title">
    Description: <input type="text" name="description">

    <input type="file" name="userfile" size="20" />
<div class = "error_message">
    <?php echo $error;?>
    
    </div>

    <input type="submit" value="upload" />
</div>


</form>