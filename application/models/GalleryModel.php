<?php
class GalleryModel extends CI_Model {
 
	function getPictures(){
  	  	$this->db->select("id,title,description,location"); 
  	  	$this->db->from('pictures');
  	  	$query = $this->db->get();
  	  	
		return $query->result();
 	}

	function getAlbums() { 
		$this->db->select('albums.id, albums.title, albums.description, albums.user_id, users.username');
		$this->db->from('albums');
		$this->db->join('users', 'albums.user_id = users.id', 'inner');
		$query = $this->db->get();
		
		return $query->result();
	}
	
	function getAlbumData($id) {
		$this->db->select("title, description, user_id");
		$this->db->from("albums");
		$this->db->where("id", $id);
		$query = $this->db->get();
		
		return $query->result();
		
	}
 
}
?>