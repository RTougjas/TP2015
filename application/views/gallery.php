    
    <h4>Display Pictures</h4>
    <table>
     <tr>
      <th><strong>Picture Title</strong></th>
      <th><strong>Picture description</strong></th>
	  <th><strong>Picture</strong></th>
    </tr> 
     <?php foreach($pictures as $picture){?>
     <tr>
         <td><?php echo $picture->title;?></td>
         <td><?php echo $picture->description;?></td>
		 <td><?php echo '<a href='.site_url("picture/".$picture->id).'>
		 <img src="'.$picture->location.'" alt="borked" height="100" width="100">';?>
		 </a></td>
      </tr>     
     <?php }?>  
   </table>
