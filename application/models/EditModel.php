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
		
	function getPicture($id){
		$this->db->select("title,description,location,comments_enabled,publicpic"); 
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
        
}
?>


