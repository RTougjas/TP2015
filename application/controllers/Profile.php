<?php
    class Profile extends CI_Controller {
        public function __construct() {
            parent::__construct();
            
            $this->load->helper(array('url', 'form'));
            $this->load->library(array('form_validation'));
            $this->load->model('Profile_model');
        }
        
        public function show_user_info($username){
            $username = rawurldecode($username);
            $result = $this->Profile_model->read_user_information($username);
            if($result != false){
                $data = array(
                    'id' => $result[0]->id,
                    'username' =>$result[0]->username,
                    'first_name' =>$result[0]->first_name,
                    'last_name' =>$result[0]->last_name,
                    'posts' => $this->Profile_model->count_posts($result[0]->id),
					'album_count' => $this->Profile_model->count_albums($result[0]->id)
                );
                $this->load->view('templates/header');
                $this->load->view('login/profile', $data);
                $this->load->view('templates/footer');
            }
        }
        
        public function uploads($id, $username){
            $this->data['pictures'] = $this->Profile_model->get_user_pictures($id);
            $username = rawurldecode($username);
			if($username == "0") {
				$this->data['small_header'] = "";
			}
			else {
				$this->data['small_header'] = $username;
			}
            $this->load->view('templates/header');
            $this->load->view('album_photos', $this->data); 
            $this->load->view('templates/footer');
        }
    }
?>