
<?php echo "Title: ".$picture->title;?><br>
<?php echo "Description: ".$picture->description;?><br>

<?php echo '<img src="'.$picture->location.'" alt="borked">';?><br>

<?php echo '<a href='.site_url("edit/".$picture->id).'>Edit picture information</a>';?>
