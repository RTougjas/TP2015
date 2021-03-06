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
            $this->db->where('publicpic', 't');
            $query = $this->db->get();
            if ($query->num_rows() == 1) {
                return $query->result()[0]->posts;
            } else {
                return 0;
            }
        }
        //Displays user photos from profile => 'kasutaja pildid' from top navbar.
        public function get_user_pictures($id, $offset){
			if($this->ion_auth->get_user_id() == $id) {
				return $this->db->select('*')->from('pictures')->where('user_id', $id)->limit(24, $offset * 24)->get()->result();
			}
			else {
				return $this->db->select('*')->from('pictures')->where('user_id', $id)->where('publicpic', 't')->limit(24, $offset * 24)->get()->result();
			}
        }
		//displays user albums from profle => 'kasutaja albumid' From top navbar. 
		public function get_user_albums($id, $offset) {
				$this->db->select('*');
				$this->db->from('albums');
				$this->db->where('user_id', $id);
				$this->db->limit(24, $offset * 24);
				$query = $this->db->get();
				
				return $query->result();
		}
        
        function moreUserPictures($id, $offset) { 
            $query = $this->db->select('*')->from('pictures')->where('user_id', $id)->limit(24, ($offset + 1) * 24)->get(); 
            if($query->num_rows() > 0){
                return true;
            } else {
                return false;
            }
        }
		
		public function moreUserAlbums($id, $offset) {
            $query = $this->db->select('*')->from('albums')->where('user_id', $id)->limit(24, ($offset + 1) * 24)->get(); 
            if($query->num_rows() > 0){
                return true;
            } else {
                return false;
            }
		}
        
        public function insert_person($info){
			
           	return $this->db->insert('people', $info);
        }
        
        public function get_people(){
            return $this->db->from('people')->get()->result();
        }
        
        public function get_person($id){
            return $this->db->from('people')->where('id', $id)->get()->result();
        }
        
        public function add_story($info){
            return $this->db->insert('lifestory', $info);
        }
        
        public function get_story($id){
            return $this->db->from('lifestory')->where('person_id', $id)->get()->result();
        }

    }

?>