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
 
}
?>