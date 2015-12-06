<?php
class EditModel extends CI_Model {
    
	function checkUserOwner($id, $user_id){
		$this->db->select("title"); 
		$this->db->from('pictures');	
		$this->db->where('id',$id);
		$this->db->where('user_id', $user_id);
		$query = $this->db->get();
		if ($query->num_rows() > 0){
			return true;
		} else {
			return false;
		}
		}
	
		function checkIfPhotoInAlbum($picture_id, $album_id) {
			$this->db->select("*");
			$this->db->from('pictures_album');
			$this->db->where('picture_id', $picture_id);
			$this->db->where('album_id', $album_id);
			$query = $this->db->get();
			if ($query->num_rows() > 0){
				return true;
			} else {
				return false;
			}
		}
	
		
	function getPicture($id){
		$this->db->from('pictures');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result()[0];
    }
    
	function commentsEnabled($id, $value){
		if ($value){
			$this->db->update('pictures', array('comments_enabled' => 'true'), 'id ='.$id);
		} else {
			$this->db->update('pictures', array('comments_enabled' => 'false'), 'id ='.$id);
		}
	}
	
	function publicPicture($id, $value){
		if ($value){
			$this->db->update('pictures', array('publicpic' => 'true'), 'id ='.$id);
		} else {
			$this->db->update('pictures', array('publicpic' => 'false'), 'id ='.$id);
		}
	}
	
	function editTitle($id, $title){
		$data = array(
               'title' => $title,
            );

			$this->db->where('id', $id);
			$this->db->update('pictures', $data); 
	}
	
	function editFotograaf($id, $fotograaf){
		$this->db->where('id', $id);
		$this->db->update('pictures', array('fotograaf' => $fotograaf));
	}
	
	function editOmanik($id, $omanik){
		$this->db->where('id', $id);
		$this->db->update('pictures', array('omanik' => $omanik));
	}
	
	function editVarasem_omanik($id, $varasem_omanik){
		$this->db->where('id', $id);
		$this->db->update('pictures', array('varasem_omanik' => $varasem_omanik));
	}
	
	function editIsikud_fotol($id, $isikud_fotol){
		$this->db->where('id', $id);
		$this->db->update('pictures', array('isikud_fotol' => $isikud_fotol));
	}
	
	function editKuupaev($id, $kuupaev){
		$this->db->where('id', $id);
		$this->db->update('pictures', array('kuupaev' => $kuupaev));
	}
	
	function editLigikaudne_aeg($id, $ligikaudne_aeg){
		$this->db->where('id', $id);
		$this->db->update('pictures', array('ligikaudne_aeg' => $ligikaudne_aeg));
	}
	
	function editKihelkond($id, $kihelkond){
		$this->db->where('id', $id);
		$this->db->update('pictures', array('kihelkond' => $kihelkond));
	}
	
	function editKoht($id, $koht){
		$this->db->where('id', $id);
		$this->db->update('pictures', array('koht' => $koht));
	}
	
	function editKvaliteet($id, $kvaliteet){
		$this->db->where('id', $id);
		$this->db->update('pictures', array('kvaliteet' => $kvaliteet));
	}
	function editColored($id, $colored){
		$this->db->where('id', $id);
		$this->db->update('pictures', array('colored' => $colored));
	}
	function editDigifoto($id, $digifoto){
		$this->db->where('id', $id);
		$this->db->update('pictures', array('digifoto' => $digifoto));
	}
	
	
	
	
    
	public function editDescription($id, $description){
        $data = array(
            'description' => $description,
        );

        $this->db->where('id', $id);
        $this->db->update('pictures', $data); 
	}
    
	public function getTags($id){
		$tags = array();
		
		
		for($i = 0; $i < $this->db->get_where('pictures_tags', array('picture_id' => $id))-> num_rows(); ++$i){
			array_push($tags, ($this->db->get_where('tags', array('id' => $this->db->get_where('pictures_tags', 
			array('picture_id' => $id))->result()[$i]->tag_id))->result()[0]->tag));
		}
		
		return $tags;
	}
    
    public function remove_tag($tag_id, $picture_id){
        $this->db->where('picture_id', $picture_id);
        $this->db->where('tag_id', $tag_id);
        return $this->db->delete('pictures_tags'); 
    }
	
	public function remove_from_album($picture_id, $album_id) {
		$this->db->where('picture_id', $picture_id);
		$this->db->where('album_id', $album_id);
		
		return $this->db->delete('pictures_albums');
	}
	
	public function add_to_album($picture_id, $album_id) {
		
		$query = 'INSERT INTO pictures_albums(picture_id, album_id) SELECT '.$picture_id.','.$album_id.' WHERE NOT EXISTS (SELECT picture_id, album_id FROM pictures_albums WHERE picture_id = '.$picture_id.' AND album_id = '.$album_id.')';
		
		$this->db->query($query);
		
	}
	
	public function getAlbums($picture_id) {
		
		$this->db->select('album_id');
		$this->db->from('pictures_albums');
		$this->db->where('picture_id', $picture_id);
		$query = $this->db->get();
		
		return $query->result();
	}
}
?>


