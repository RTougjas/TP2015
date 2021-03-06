<?php
class PictureModel extends CI_Model {
    
	//stdClass Object ( [user_id] => 0 [comment] => Canceriuo [created] => 1447321029 )
	function getComments($id){
        $this->db->select("id,user_id,comment,created");
        $this->db->from('comments');
        $this->db->where('picture_id', $id);
        $query = $this->db->get();
        $result = $query->result();
        $comments = array();
        //print_r($result[2]->user_id);
        //print_r($result[1]->user_id."on tühi?");
        //print_r(count($result));

        for($i = 0; $i < count($result); ++$i){
            if($result[$i]->user_id == ''){
                $username = 'anonüümne';
            } else {
                $this->db->select('username');
                $this->db->from('users');
                $this->db->where('id', $result[$i]->user_id);
                $query = $this->db->get()->result();
                $username = $query[0]->username;
            }
        array_push($comments, array($username, $result[$i]->comment,$result[$i]->created, $result[$i]->id, $result[$i]->user_id));
        //print_r($query->result()[0]->comment);
        }
        return $comments;
    }
    
	function enterComment($id, $comment){
        if (! $comment == ''){
            //id, picture_id, user_id, comment
            $data = array(
               'user_id' => $this->ion_auth->get_user_id(),
               'comment' => $comment,
               'picture_id' => $id,
               'created' => time()
            );
        $this->db->insert('comments', $data);
        }
    }
    
    public function remove_comment($id){
        return $this->db->delete('comments', array('id' => $id));
    }
    
    public function get_comment_info($id){
        $this->db->from('comments')->where('id', $id);
        return $this->db->get()->result()[0];
    }

	function getPicture($id){
		//$this->db->select("id,title,description,location,comments_enabled"); 
		$this->db->select('*');
		$this->db->from('pictures');
		$this->db->where('id', $id);
		//$this->db->where('publicpic', 't');
		$query = $this->db->get();
		return $query->result()[0];
    }
    
	function getTags($id){
		$tags = array();
		for($i = 0; $i < $this->db->get_where('pictures_tags', array('picture_id' => $id))-> num_rows(); ++$i){
			array_push($tags, ($this->db->get_where('tags', array('id' => $this->db->get_where('pictures_tags', 
			array('picture_id' => $id))->result()[$i]->tag_id))->result()[0]->tag));
		}
		return $tags;
    }
    
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
	
	public function getAlbumsWhereThis($picture_id) {
				
		$this->db->select('picture_id, pictures.title AS picture_title, album_id, albums.title AS album_title');
		$this->db->from('pictures_albums');
		$this->db->join('pictures', 'picture_id = pictures.id', 'inner');
		$this->db->join('albums', 'album_id = albums.id', 'inner');
		$this->db->where('picture_id', $picture_id);
		
		$query = $this->db->get();
		return $query->result();
	}
}

?>