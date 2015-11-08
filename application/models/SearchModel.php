<?php
class SearchModel extends CI_Model {
 
 function getPictureData(){
  $this->db->select("id,title,description,location"); 
  $this->db->from('pictures');
  $query = $this->db->get();
  return $query->result();
 }
 
 function getSearchResults($search_key) {
     $this->db->select("id, title, description, location"); 
     $this->db->from('pictures');
	 $query_string = "title = '$search_key' OR description = '$search_key'";
	 $this->db->where($query_string);
     $query = $this->db->get();
     return $query->result();
 }
 
}
?>