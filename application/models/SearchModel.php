<?php
class SearchModel extends CI_Model {
 
 function getPictureData(){
  $this->db->select("id,title,description,location"); 
  $this->db->from('pictures');
  $query = $this->db->get();
  return $query->result();
 }
 
 function getSearchResults($keywords) {
     $this->db->select("id, title, description, location"); 
     $this->db->from('pictures');
	 $query_string = "";
	 if(sizeOf($keywords) > 0) {
		 for($i = 0; $i < sizeOf($keywords); $i++) {
			 if(strlen($keywords[$i]) > 2) {
			 
				 if(strlen($query_string) == 0) {
					 $query_string = "title = '$keywords[$i]' OR description = '$keywords[$i]'";
				 }
				 else {
					 $query_string = $query_string."OR title = '$keywords[$i]' OR description = '$keywords[$i]'";
				 }
			 }
		 }
	 
		 $this->db->where($query_string);
	     $query = $this->db->get();
	 
		 return $query->result();
	 }
	 
	 /*
	 if(strlen($search_key) > 2) {
	     $this->db->select("id, title, description, location"); 
	     $this->db->from('pictures');
		 $query_string = "title = '$search_key' OR description = '$search_key'";
		 $this->db->where($query_string);
	     $query = $this->db->get();
	     return $query->result();
	 }
	 */
 }

}
?>