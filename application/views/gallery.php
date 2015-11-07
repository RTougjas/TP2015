    
    <h4>Display Pictures</h4>
    <table>
     <tr>
      <td><strong>Picture Title</strong></td>
      <td><strong>Picture description</strong></td>
	  <td><strong>Picture</strong></td>
    </tr> 
     <?php foreach($pictures as $picture){?>
     <tr>
         <td><?php echo $picture->title;?></td>
         <td><?php echo $picture->description;?></td>
<<<<<<< HEAD
		 <td><?php echo '<a href='.site_url('picture/photo/'.$picture->id).'>
=======
		 <td><?php echo '<a href="picture/'.$picture->id.'">
>>>>>>> eeab54fccca98b1666c67bd49d12c1350c06465d
		 <img src="'.$picture->location.'" alt="borked" height="42" width="42">';?>
		 </a></td>
      </tr>     
     <?php }?>  
   </table>
