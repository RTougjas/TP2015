<?php
class GalleryModel extends CI_Model {
 
	function getPictures($offset){
  	  	$this->db->select("id,title,description,location"); 
  	  	$this->db->from('pictures');
		$this->db->where('publicpic', 't');
		$this->db->order_by('id','asc');
		$this->db->limit(12, $offset*12); 
  	  	$query = $this->db->get();
  	  	
		return $query->result();
		}
	
	function morePictures($offset){
		$this->db->select("id,title,description,location"); 
  	  	$this->db->from('pictures');
		$this->db->where('publicpic', 't');
		$this->db->limit(12, ($offset+1)*12); 
  	  	$query = $this->db->get();
  	  	if($query->num_rows() > 0){
			return true;
		} else {
			return false;
		}
	
	}
	public function getAlbumCover($album_id){
		$this->db->select('picture_id');
		$this->db->from('pictures_albums');
		$this->db->where('album_id', $album_id);
		$query = $this->db->get();
		$picture_id = $query->result()[0]->picture_id;

		$this->db->select('location');
		$this->db->from('pictures');
		$this->db->where('id', $picture_id);
		$query = $this->db->get();
		$picture_location = $query->result()[0]->location;
		return array($picture_id, $picture_location);
	}
	
	
	function getAllAlbums() { 
		$this->db->select('albums.id, albums.title, albums.description, albums.user_id, users.username');
		$this->db->from('albums');
		$this->db->join('users', 'albums.user_id = users.id', 'inner');
		$query = $this->db->get();
		return $query->result();
	}
	
	
	function getAlbums($offset) { 
		$this->db->select('albums.id, albums.title, albums.description, albums.user_id, users.username');
		$this->db->from('albums');
		$this->db->join('users', 'albums.user_id = users.id', 'inner');
		$this->db->limit(12, ($offset)*12);
		$query = $this->db->get();
		return $query->result();
	}
	
	function moreAlbums($offset) { 
		$this->db->select('albums.id, albums.title, albums.description, albums.user_id, users.username');
		$this->db->from('albums');
		$this->db->join('users', 'albums.user_id = users.id', 'inner');
		$this->db->limit(12, ($offset+1)*12);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return true;
		} else {
			return false;
		}
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
	
	public function getAlbumPhotos($album_id) {
		$this->db->select('id, title, description, location');
		$this->db->from('pictures');
		$this->db->join('pictures_albums', 'id = picture_id', 'inner');
		$this->db->where('album_id', $album_id);
		$query = $this->db->get();
		
		return $query->result();
	}

	public function getAlbumDetails($album_id) {
		
		$this->db->select('albums.id, albums.title, albums.description, created, albums.varasem_omanik, albums.kihelkond, albums.koht, albums.ligikaudne_aeg, albums.user_id, users.username, COUNT(picture_id) AS count');
		$this->db->from('albums');
		$this->db->join('users', 'albums.user_id = users.id', 'inner');
		$this->db->join('v_pictures_in_albums', 'albums.id = album_id', 'inner');
		$this->db->where('albums.id', $album_id);
		$this->db->group_by(array('users.username', 'albums.id'));

		$query = $this->db->get();
		
		return $query->result();
	}
    
    public function create_album($info){
        return $this->db->insert('albums', $info);
    }
    
    public function remove_album($id){
        return $this->db->delete('albums', array('id' => $id));
    }
    
    public function get_album_owner($album_id){
        return $this->db->select('user_id')->where('id', $album_id)->from('albums')->get()->result();
    }
}
?>