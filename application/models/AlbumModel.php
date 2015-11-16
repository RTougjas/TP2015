<?php
class AlbumModel extends CI_Model {
 
 function getAlbums(){
  $this->db->select("id,title,description,user_id"); 
  $this->db->from('albums');
  $query = $this->db->get();
  return $query->result();
 }
 
}
?>