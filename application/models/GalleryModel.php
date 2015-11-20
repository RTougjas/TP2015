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
	
	function getAlbumPhotoCount() {
		$this->db->select('album_id, COUNT(picture_id) AS count');
		$this->db->from('v_pictures_in_albums');
		$this->db->group_by('album_id', 'album_title');
		$query = $this->db->get();
		
		return $query->result();
	}
		
	public function getUserAlbums($user_id) {
		$this->db->select('albums.id, albums.title, albums.description, users.username');
		$this->db->from('albums');
		$this->db->join('users', 'albums.user_id = users.id', 'inner');
		$this->db->where('albums.user_id', $user_id);
		$query = $this->db->get();
	
		return $query->result();
	}
}
?>