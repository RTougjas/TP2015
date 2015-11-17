<div class="container">
    <h4>Display Pictures</h4>
    <table>
     <tr>
      <td><strong>Picture Title</strong></td>
	  <td><strong>Picture</strong></td>
    </tr> 
     <?php foreach($pictures as $picture){?>
     <tr>
         <td><?php echo $picture->title;?></td>
		 <td><?php echo '<a href='.site_url("picture/".$picture->id).'>
		 <img src="'.$picture->location.'" alt="borked" height="42" width="42">';?>
		 </a></td>
      </tr>     
     <?php }?> 
	 
     <td><strong>Album ID</strong></td>
  	<td><strong>Album Title</strong></td>
     <?php foreach($albums as $album){?>
     <tr>
         <td><?php echo $album->id;?></td>
		 <td><?php echo $album->title;?></td>
      </tr>     
     <?php }?> 
   </table>
</div>