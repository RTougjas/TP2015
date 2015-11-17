<?php
class GalleryModel extends CI_Model {
 
	function getPictures(){
  	  	$this->db->select("id,title,description,location"); 
  	  	$this->db->from('pictures');
  	  	$query = $this->db->get();
  	  	
		return $query->result();
 	}
	
	function getAlbums() {
		$this->db->select("id, title, description, user_id");
		$this->db->from("albums");
		$query = $this->db->get();
		
		return $query->result();
	}
 
}
?>