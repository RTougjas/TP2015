Siia tuleb siis basic galerii alguses.

<img src="/uploads/Swedistan.png" alt="Swedistan"> 

<ul>
<?php foreach ($upload_data as $item => $value):?>
<li><?php echo $item;?>: <?php echo $value;?></li>
<?php endforeach; ?>
</ul>