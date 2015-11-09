<?php echo $error;?>

<?php echo form_open_multipart('upload/do_upload');?>

Title: *<input type="text" name="title"><br>
Description: *<input type="text" name="description"><br>
Tags:  <input type="text" name="tags"> (Eemaldage üksteisest komaga ilma tühikuta) <br>

<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="upload" />

</form>