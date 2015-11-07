<?php
class PictureModel extends CI_Model {
 	
	
	public function __construct() {
		$this->load->database();
	}

	function getPicture($id){
		$this->db->select("id, title,description,location"); 
		$this->db->from('pictures');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result()[0];
 }
 
}
?>