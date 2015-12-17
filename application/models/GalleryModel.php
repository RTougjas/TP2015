<?php

/*
	GalleryModel is responsible of album related queyies. 
	This means, creating album, displaying albums, deleting albums, displaying all photos.  
*/
class GalleryModel extends CI_Model {
 	
	// creates album, inserts key-value pairs stored in $info
    public function create_album($info){
        return $this->db->insert('albums', $info);

    }
    
	// deletes album where id == $id
    public function remove_album($id){
        return $this->db->delete('albums', array('id' => $id));
    }
    
	// returns the owner's id from album specified by album ID. 
    public function get_album_owner($album_id){
        return $this->db->select('user_id')->where('id', $album_id)->from('albums')->get()->result();
    }
	
	// Returns all albums and associated data. 
	public function getAllAlbums() {
		$this->db->select('albums.id, albums.title, albums.description, albums.user_id, users.username, 
albums.created, albums.varasem_omanik, albums.kihelkond, albums.koht, albums.ligikaudne_aeg');
		$this->db->from('albums');
		$this->db->join('users', 'albums.user_id = users.id', 'inner');
		$query = $this->db->get();
		
		return $query->result();
	}
	
	// returns all albums, limits result. 
	public function getAllAlbumsOffset($offset) {
		$this->db->select('albums.id, albums.title, albums.description, albums.user_id, users.username, 
albums.created, albums.varasem_omanik, albums.kihelkond, albums.koht, albums.ligikaudne_aeg');
		$this->db->from('albums');
		$this->db->join('users', 'albums.user_id = users.id', 'inner');
		$this->db->limit(24, $offset * 24);
		$query = $this->db->get();
		
		return $query->result();
	}
	
	public function isMoreAlbums($offset) {
		$this->db->select('*');
		$this->db->from('albums');
		$this->db->limit(24, ($offset + 1) * 24);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return true;
		} else {
			return false;
		}
		
	}
	
	// returns all albums associated to one particular user specified by user ID.
	public function getAllUserAlbums($user_id) {
		$this->db->select('*');
		$this->db->from('albums');
		$this->db->where('user_id', $user_id);
		$query = $this->db->get();
		
		return $query->result();
	}
	// return all albums associated to one particular user specified by user ID. 
	// limits query result. 
	public function getAllUserAlbumsOffset($user_id, $offset) {
		$this->db->select('albums.id, albums.title, albums.description, albums.user_id, users.username, 
albums.created, albums.varasem_omanik, albums.kihelkond, albums.koht, albums.ligikaudne_aeg');
		$this->db->from('albums');
		$this->db->join('users', 'albums.user_id = users.id', 'inner');
		$this->db->where('albums.user_id', $user_id);
		$this->db->limit(24, $offset * 24);
		$query = $this->db->get();
		
		return $query->result();
		
	}
	
	// returns boolean value representing if there are more albumus associated to particular user, 
	// than query limit. 
	public function isMoreUserAlbums($user_id, $offset) {
		$this->db->select('*');
		$this->db->from('albums');
		$this->db->where('user_id', $user_id);
		$this->db->limit(24, ($offset + 1) * 24);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return true;
		} else {
			return false;
		}
	}
	
	// Queryies count of public photos in all albums. 
	public function getAllAlbumsPhotoCount() {
			$this->db->select('album_id, COUNT(id) AS count');
			$this->db->from('v_pictures_in_albums');
			$this->db->where('publicpic', 't');
			$this->db->group_by('album_id', 'album_title');
			$query = $this->db->get();
		
			return $query->result();
	}
	
	// Queryies cover photo for specific album, determined by album ID.
	// This photo has to be public. 
	public function getAlbumCover($album_id) {
		
		$this->db->select('picture_id');
		$this->db->from('pictures_albums');
		$this->db->join('pictures', 'pictures_albums.picture_id = pictures.id', 'inner');
		$this->db->where('album_id', $album_id);
		$this->db->where('publicpic', 't');
		$query = $this->db->get();
		$picture_id = $query->result()[0]->picture_id;
		
		$this->db->select('location');
		$this->db->from('pictures');
		$this->db->where('id', $picture_id);
		$query = $this->db->get();
		$picture_location = $query->result()[0]->location;
		return array($picture_id, $picture_location);
		
	}
	// returns all PUBLIC photos belonging to that particular album, specified by album ID.
	public function getAlbumPhotos($album_id) {
		$owner = $this->get_album_owner($album_id);
		if($this->ion_auth->get_user_id() == $owner[0]->user_id) {
			$this->db->select('*');
			$this->db->from('v_pictures_in_albums');
			$this->db->where('album_id', $album_id);
			//$this->db->where('publicpic', 't');
			$query = $this->db->get();
		
			return $query->result();
		}
		else {
			$this->db->select('*');
			$this->db->from('v_pictures_in_albums');
			$this->db->where('album_id', $album_id);
			$this->db->where('publicpic', 't');
			$query = $this->db->get();
		
			return $query->result();
		}
	}
	
	/* 	returns all public photos belonging to that particular album, which is specified by album ID.
		Limits query results to 12. 
	*/
	public function getAlbumPhotosOffset($album_id, $offset) {
		$owner = $this->get_album_owner($album_id);
		if($this->ion_auth->get_user_id() == $owner[0]->user_id) {
			$this->db->select('*');
			$this->db->from('v_pictures_in_albums');
			$this->db->where('album_id', $album_id);
			$this->db->limit(24, $offset * 24);
			$query = $this->db->get();
		
			return $query->result();
		}
		else {
			$this->db->select('*');
			$this->db->from('v_pictures_in_albums');
			$this->db->where('album_id', $album_id);
			$this->db->where('publicpic', 't');
			$this->db->limit(24, $offset * 24);
			$query = $this->db->get();
		
			return $query->result();
		}
	}
	
	// returns boolean value, representing if there is more than X number of photos in that specific album. 
	public function isMorePhotosInAlbum($album_id, $offset) {
		$this->db->select('*');
		$this->db->from('v_pictures_in_albums');
		$this->db->where('album_id', $album_id);
		$this->db->where('publicpic', 't');
		$this->db->limit(24, ($offset + 1) * 24);
		$query = $this->db->get();
  	  	if($query->num_rows() > 0){
			return true;
		} else {
			return false;
		}
	}
	//returns all PUBLIC photos. 
	public function getAllPhotos() {
		
		$this->db->select('*');
		$this->db->from('pictures');
		$this->db->where('publicpic', 't');
		$query = $this->db->get();
		
		return $query->result();
		
	}
	
	public function getAllPhotosOffset($offset) {
		$this->db->select('*');
		$this->db->from('pictures');
		$this->db->where('publicpic', 't');
		$this->db->limit(24, $offset * 24);
		$query = $this->db->get();
		
		return $query->result();
	}
	
	public function isMoreAllPhotos($offset) {
		$this->db->select('*');
		$this->db->from('pictures');
		$this->db->where('publicpic', 't');
		$this->db->limit(24, ($offset + 1) * 24);
		$query = $this->db->get();
  	  	if($query->num_rows() > 0){
			return true;
		} else {
			return false;
		}
	}
	// returns all user photos. 
	// When user is the same, that is logged in, it returns all photos, otherwise only public photos. 
	public function getAllUserPhotos($user_id) {
		if($this->ion_auth->get_user_id() == $user_id) {
			$this->db->select('*');
			$this->db->from('pictures');
			$this->db->where('user_id', $user_id);
			$query = $this->db->get();
			
			return $query->result();
		}
		else {
			$this->db->select('*');
			$this->db->from('pictures');
			$this->db->where('publicpic', 't');
			$this->db->where('user_id', $user_id);
			$query = $this->db->get();
		
			return $query->result();
		}
	}
	// returns all user photos, but limits query results. 
	public function getAllUserPhotosOffset($user_id, $offset) {
		if($this->ion_auth->get_user_id() == $user_id) {
			$this->db->select('*');
			$this->db->from('pictures');
			$this->db->where('user_id', $user_id);
			$this->db->limit(24, $offset * 24);
			$query = $this->db->get();
		
			return $query->result();
		}
		else {
			$this->db->select('*');
			$this->db->from('pictures');
			$this->db->where('publicpic', 't');
			$this->db->where('user_id', $user_id);
			$this->db->limit(24, $offset * 24);
			$query = $this->db->get();
		
			return $query->result();
		}
	}
	
	public function isMoreAllUserPhotos($user_id, $offset) {
		if($this->ion_auth->get_user_id() == $user_id) {
			$this->db->select('*');
			$this->db->from('pictures');
			$this->db->where('user_id', $user_id);
			$this->db->limit(24, $offset * 24);
			$query = $this->db->get();
	  	  	
			if($query->num_rows() > 0){
				return true;
			} else {
				return false;
			}
		}
		else {
			$this->db->select('*');
			$this->db->from('pictures');
			$this->db->where('publicpic', 't');
			$this->db->where('user_id', $user_id);
			$this->db->limit(24, $offset * 24);
			$query = $this->db->get();
	  	  	
			if($query->num_rows() > 0){
				return true;
			} else {
				return false;
			}
		}
	}
	
  	public function getAlbumDetails($album_id) {
		
		$this->db->select('albums.id, albums.title, albums.description, created, albums.varasem_omanik, albums.kihelkond, albums.koht, albums.ligikaudne_aeg, albums.user_id, users.username, COUNT(albums.id) AS count');
		$this->db->from('albums');
		$this->db->join('users', 'albums.user_id = users.id', 'inner');
		$this->db->join('v_pictures_in_albums', 'albums.id = album_id', 'inner');
		$this->db->where('albums.id', $album_id);
		$this->db->group_by(array('users.username', 'albums.id'));
		$query = $this->db->get();
		
		return $query->result();
	}
}
?>