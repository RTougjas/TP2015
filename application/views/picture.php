<div class="container">
<?php echo "(remove after development cycle) ID: ".$picture->id;?><br>
<?php echo "Title: ".$picture->title;?><br>
<?php echo "Description: ".$picture->description;?><br>
<?php echo "Tags: ".implode(', ',$tags);?><br>

<?php echo '<img src="'.$picture->location.'" alt="borked">';?><br>

<?php echo '<a href='.site_url("edit/".$picture->id).'>Edit picture information</a>';?><br><br> <br> 

Comments:<br> <br> 
<?php for($i = 0; $i < count($comments); ++$i){?>
    <?php echo $comments[$i][0].':  '.$comments[$i][1].' '.date("Y-m-d H:i:s", $comments[$i][2]).'<br>';?>
     <?php }?>  
	 

<?php echo form_open('picture/comment/'.$this->uri->segment(2, 1));?>
<br> <br> 
Enter Comment: <input type="text" name="comment"><br>
 
<br /><br />
 
<input type="submit" value="send" />
 
</form>
</div>