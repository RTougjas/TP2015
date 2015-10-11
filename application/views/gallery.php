<!DOCTYPE html>
<html lang="en">
  <head>
  </head>
  <body>
   
 
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
		 <td><?php echo $picture->location;?></td>
      </tr>     
     <?php }?>  
   </table>
 
 
  </body>
</html>