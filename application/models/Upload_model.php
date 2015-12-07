<?php

    class Upload_model extends CI_Model {
        
        public function upload($info){
            $this->db->insert('pictures', $info);
			$this->db->select('lastval()');
			$query = $this->db->get();
			return $query->result();
        }
		
		//For getting last photo id. 
		public function retrieveLastPhotoId() {
			$this->db->select('lastval()');
			$query = $this->db->get();
			return $query->result();
		}
		
		public function addPhotoToAlbum($info) {
			return $this->db->insert('pictures_albums', $info);
	
		}
        
        public function get_picture_id($location){
            $this->db->select("id"); 
			$this->db->from('pictures');
			$this->db->where('location', $location);
			$query = $this->db->get();
			return $query->result()[0]->id;
        }
        
        public function tag_exists($tag){
            return !$this->db->get_where('tags', array('tag' => $tag))-> num_rows() == 0;
        }
        
        public function add_tag($tag){
            return $this->db->insert('tags', $tag);
        }
        
        public function get_tag_id($tag){
            $this->db->select('id')->from('tags')->where('tag', $tag); 
            return $this->db->get()->result()[0]->id;
        }
        
        public function check_tag_picture_exists($picture_id, $tag_id){
			$this->db->select("picture_id"); 
			$this->db->from('pictures_tags');
			$this->db->where('picture_id', $picture_id);
			$this->db->where('tag_id', $tag_id);
			return !$this->db->get()->num_rows() == 0;
        }
        
        public function add_tag_to_picture($info){
            return $this->db->insert('pictures_tags', $info);
        }
    }
?>