<?php
    class Profile extends CI_Controller {
        public function __construct() {
            parent::__construct();
            
            $this->load->helper(array('url', 'form'));
            $this->load->library(array('session', 'ion_auth', 'form_validation'));
            $this->load->model('Profile_model');
        }
        
        public function show_user_info($username){
            $username = urldecode($username);
            $result = $this->Profile_model->read_user_information($username);
            if($result != false){
                $data = array(
                    'id' => $result[0]->id,
                    'username' =>$result[0]->username,
                    'first_name' =>$result[0]->first_name,
                    'last_name' =>$result[0]->last_name,
                    'posts' => $this->Profile_model->count_posts($result[0]->id)
                );
                $this->load->view('templates/header');
                $this->load->view('login/profile', $data);
                $this->load->view('templates/footer');
            }
        }
        
        public function uploads($id){
            $this->data['pictures'] = $this->Profile_model->get_user_pictures($id);
            $this->load->view('templates/header');
            $this->load->view('gallery', $this->data); 
            $this->load->view('templates/footer');
        }
    }
?>