<?php

    class Login_model extends CI_Model {
        
        public function __construct(){
            $this->load->database();
        }

        // Insert registration data in database
        public function registration_insert($data) {

            // Query to check whether username already exist or not
            $this->db->select('*');
            $this->db->from('users');
            $this->db->where('username', $data['username']);
            $this->db->limit(1);
            $query = $this->db->get();
            if ($query->num_rows() == 0) {

                // Query to insert data in database
                $this->db->insert('users', $data);
                if ($this->db->affected_rows() > 0) {
                    return true;
                }
            } else {
                return false;
            }
        }

        // Read data using username and password
        public function login($username, $password) {

            $this->db->select('*');
            $this->db->from('users');
            $this->db->where('username', $username);
            $this->db->where('password', $password);
            $this->db->limit(1);
            $query = $this->db->get();

            if ($query->num_rows() == 1) {
                return true;
            } else {
                return false;
            }
        }
    }

?>