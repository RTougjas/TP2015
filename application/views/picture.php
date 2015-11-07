
<?php echo "Title: ".$picture->title;?><br>
<?php echo "Description: ".$picture->description;?>

<?php echo '<img src="'.$picture->location.'" alt="borked">';?>
<?php echo '<a href='.site_url("edit/".$picture->id).'>Edit picture information</a>';?>
