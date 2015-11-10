    
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
   </table>
