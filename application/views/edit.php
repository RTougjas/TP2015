<div class="container">
<?php echo "Title: ".$picture->title;?><br>
<?php echo "Description: ".$picture->description;?><br>
<?php echo "Tags: ".implode(', ',$tags);?><br>

<?php echo '<img src="'.$picture->location.'" alt="borked">';?>

<?php echo form_open('edit/do_edit/'.$this->uri->segment(2, 1));?>

Title: <input type="text" name="title"><br>
Description: <input type="text" name="description"><br>
Add Tags: <input type="tags" name="tags"> (Eralda komaga, ilma tühikuteta)<br>
<br /><br />

<?php echo "Delete tags";?><br><br>

 <?php for($i = 0; $i < count($tags); ++$i){?>
    <?php echo $tags[$i].'<input type="checkbox" name="tag[]" value="'.$tags[$i].'">';?>
     <?php }?>  
<input type="submit" value="edit" />

</form>
</div>

