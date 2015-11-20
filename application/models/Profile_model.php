<?php

    class Profile_model extends CI_Model {

        public function read_user_information($username) {

            $this->db->select('*');
            $this->db->from('users');
            $this->db->where('username', $username);
            $this->db->limit(1);
            $query = $this->db->get();

            if ($query->num_rows() == 1) {
                return $query->result();
            } else {
                return false;
            }
        }
		
		public function count_albums($id) {
			$this->db->select('count(albums.id) AS album_count');
			$this->db->from('albums');
			$this->db->where('albums.user_id', $id);
			$query = $this->db->get();
            if ($query->num_rows() == 1) {
                return $query->result()[0]->album_count;
            } else {
                return 0;
            }
		}
        
        public function count_posts($id){
            $this->db->select('count(*) as posts');
            $this->db->from('pictures');
            $this->db->where('user_id', $id);
            
            $query = $this->db->get();
            if ($query->num_rows() == 1) {
                return $query->result()[0]->posts;
            } else {
                return 0;
            }
        }
        
        public function get_user_pictures($id){
            return $this->db->select('*')->from('pictures')->where('user_id', $id)->get()->result(); 
        }
    }

?>