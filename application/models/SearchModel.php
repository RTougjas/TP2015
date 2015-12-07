<?php
class SearchModel extends CI_Model {
 
 function getPictureData(){
  $this->db->select("id,title,description,location"); 
  $this->db->from('pictures');
  $query = $this->db->get();
  return $query->result();
 }
 
 function getSearchResults($keywords, $offset) {
     $this->db->distinct();
	 $this->db->select('id');
	 $this->db->from('v_photo_search');

	 if(sizeOf($keywords) > 0) {
		 for($i = 0; $i < sizeOf($keywords); $i++) {
			 if(strlen($keywords[$i]) > 2) {
				$this->db->like('lower(title)', $keywords[$i]);
				$this->db->or_like('lower(description)', $keywords[$i]);
				$this->db->or_like('lower(tag)', $keywords[$i]);
			 }
		 }
	 }
	 
     $query = $this->db->get();
	 $result = $query->result();
	 
	 if(sizeOf($result) > 0) {
	 	$this->db->select();
	 	$this->db->from('pictures');
	 	$first = true;
	 
	 	foreach ($result as $row) {
		 	if($first) {
			 	$this->db->where('id', $row->id);
			 	$first = false;
		 	}
		 	else {
			 	$this->db->or_where('id', $row->id);
		 	}
	 	}
		//$this->db->limit(9, $offset*9); 
	 	$q = $this->db->get();
	 	return $q->result();
 	}
	else {
		$this->db->select();
		$this->db->from('pictures');
		//produces emty result set. Necessary, because we want empty search result.
		$this->db->where('1 = 0');
		$q = $this->db->get();
		return $q->result();
	}
 }
	function morePictures($keywords, $offset) {
     $this->db->distinct();
	 $this->db->select('id');
	 $this->db->from('v_photo_search');

	 if(sizeOf($keywords) > 0) {
		 for($i = 0; $i < sizeOf($keywords); $i++) {
			 if(strlen($keywords[$i]) > 2) {
				$this->db->like('lower(title)', $keywords[$i]);
				$this->db->or_like('lower(description)', $keywords[$i]);
				$this->db->or_like('lower(tag)', $keywords[$i]);
			 }
		 }
	 }
	 
     $query = $this->db->get();
	 $result = $query->result();
	 
	 if(sizeOf($result) > 0) {
	 	$this->db->select();
	 	$this->db->from('pictures');
	 	$first = true;
	 
	 	foreach ($result as $row) {
		 	if($first) {
			 	$this->db->where('id', $row->id);
			 	$first = false;
		 	}
		 	else {
			 	$this->db->or_where('id', $row->id);
		 	}
	 	}
		$this->db->limit(9, ($offset+1)*9); 
	 	$q = $this->db->get();
	
		if($q->num_rows() > 0){
			return true;
		} else {
			return false;
		}
 }
}
}
?>