<?php
class EditModel extends CI_Model {
 	
	
	public function __construct() {
		$this->load->database();
	}

	function getPicture($id){
		$this->db->select("title,description,location"); 
		$this->db->from('pictures');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result()[0];
 }
	function editTitle($id, $title){
		$data = array(
               'title' => $title,
            );

			$this->db->where('id', $id);
			$this->db->update('pictures', $data); 
	}
	function editDescription($id, $description){
	$data = array(
               'description' => $description,
            );

			$this->db->where('id', $id);
			$this->db->update('pictures', $data); 
	}
	function getTags($id){
		$tags = array();
		
		
		for($i = 0; $i < $this->db->get_where('pictures_tags', array('picture_id' => $id))-> num_rows(); ++$i){
			array_push($tags, ($this->db->get_where('tags', array('id' => $this->db->get_where('pictures_tags', 
			array('picture_id' => $id))->result()[$i]->tag_id))->result()[0]->tag));
		}
		
		return $tags;
	}
}
?>