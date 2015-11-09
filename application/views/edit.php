<?php echo "Title: ".$picture->title;?><br>
<?php echo "Description: ".$picture->description;?>

<?php echo '<img src="'.$picture->location.'" alt="borked">';?>

<?php echo form_open_multipart('edit/do_edit/'.$this->uri->segment(2, 1));?>

Title: <input type="text" name="title"><br>
Description: <input type="text" name="description"><br>
Tags: <input type="tags" name="tags"> (Eralda komaga, ilma tühikuteta)<br>
<br /><br />

<input type="submit" value="edit" />

</form>