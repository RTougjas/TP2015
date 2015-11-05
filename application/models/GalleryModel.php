<?php
class GalleryModel extends CI_Model {
 
 function getPictures(){
  $this->db->select("id,title,description,location"); 
  $this->db->from('pictures');
  $query = $this->db->get();
  return $query->result();
 }
 
}
?>